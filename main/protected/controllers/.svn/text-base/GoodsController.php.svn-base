<?php

class GoodsController extends Controller
{
    private $merchantModel;
    const   GOODS_ORIGINAL_PICTURE = 0;
    const   GOODS_THUMBNAIL        = 1;
    public function __construct(){
        $this->title = '易人宜家 - 商品管理';       
    }

    // 校验权限，同时初始化用户信息
    public function initUserInfo(){
        if('Guest' === Yii::app()->user->name){
            // 游客需要登录
            $this->redirect(Yii::app()->user->loginUrl);
        }else{
            $this->userModel = User::model()->find("username=:name", array(':name' => Yii::app()->user->name)); 
            if(UserIdentity::USER_ROLE_MERCHANT !== intval($this->userModel->role)){
                // 用户角色非商家的跳转到登录
                $this->redirect(Yii::app()->user->loginUrl);
            }else{
                $this->merchantModel = Merchant::model()->find("userId=:id", array(':id' => $this->userModel->id));
                if(empty($this->merchantModel)){
                    // 还没创建店铺，显示错误页
                    $this->smarty->showErrPage($this->title, '对不起，您还没有开通店铺，不能管理商品！', $this->userModel->role);
                }
            }
        } 
    }

    // 管理商品,展示商品列表
    public function actionManage()
    {
        // 校验权限
        $this->initUserInfo();
        // 找到属于本店铺的商品
        $goodsModels = Goods::model()->findAll("merchantId=:id", array(':id' => $this->merchantModel->id));
        $goods = array();
        if(!empty($goodsModels)){
            foreach ($goodsModels as $goodsModel) {
                $goods[] = $goodsModel->attributes;
            }
        }
        // 渲染界面
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('goods', $goods);      
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $this->userModel->role);
        $this->smarty->assign('pageTpl', 'goods_manage.tpl');                          
        $this->smarty->display('index.tpl');
    }

    // 列出店铺内商品, 给手机端开放的api
    public function actionListGoods(){
        if(isset($_GET['merchantId'])){
            $merchantId = $_GET['merchantId'];
            // 找到属于本店铺的商品
            $goodsModels = Goods::model()->findAll("merchantId=:id", array(':id' => $merchantId));
            $goods = array();
            if(!empty($goodsModels)){
                foreach ($goodsModels as $goodsModel) {
                    $goods[] = $goodsModel->attributes;
                }
            }
            echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $goods)); 
        }else{
            echo json_encode(array('errno' => 2, 'msg' => "parameter error: merchantId cannot be null", 'data' => null)); 
        }
    }

    // 修改商品信息，根据用户提交的信息修改数据库
    public function actionSetting(){
        // 校验权限
        $this->initUserInfo();
        // 设置
        if(isset($_POST['id']) && !empty($_POST['id'])){
            $goodsModel = Goods::model()->find('id=:id', array(':id' => intval($_POST['id'])));
        }else{
            // 新增商品时检查是否已经超过9个，超过则不能添加
            $cnt = Goods::model()->count('merchantId=:id', array(':id' => $this->merchantModel->id));
            if($cnt >= 9){
                echo json_encode(array('errno' => 2, 'msg' => 'cannot add goods more than 9', 'data' => null));
                return;
            }
            $goodsModel = new Goods;
        }
        // unset($_POST['id']);
        $goodsModel->attributes = $_POST;
        $goodsModel->merchantId = $this->merchantModel->id;
        $goodsModel->category   = $this->merchantModel->category;
        if($goodsModel->save()){
            echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => $goodsModel->id));
        }else{
            echo json_encode(array('errno' => 1, 'msg' => $goodsModel->errors, 'data' => null));
        }        
    }

    // 上传商品图片，推送图片到LBS，并把照片的name保存到数据库
    public function actionUploadPicture(){
        // 校验权限
        $this->initUserInfo();        
        if(isset($_GET['goodsId'])){
            $goodsModel = Goods::model()->find('id=:id',array(':id' => intval($_GET['goodsId'])));
            if(empty($goodsModel) || $this->merchantModel->id !== $goodsModel->merchantId){
                // 商品不存在或者商品不属于该用户，跳权限错误页
                $this->smarty->showErrPage($this->title, '您管理的商品不存在或者所有者不是您！', $this->userModel->role);
            }
        }else{
            $this->smarty->showErrPage($this->title, '您输入的参数有误，请重试', $this->userModel->role);
        }
        // 上传文件名列表
        $upfileNames = array('upfile0','upfile1','upfile2');
        foreach ($upfileNames as $upfileName) {
            if(isset($_FILES[$upfileName]['tmp_name']) && '' !== $_FILES[$upfileName]['tmp_name']){
                $this->uploadPic($_FILES[$upfileName]['tmp_name'], GoodsController::GOODS_ORIGINAL_PICTURE);
            }
        }
        // 跳到上传页面
        $this->redirect("/main/index.php?r=goods/picture&goodsId=".$_GET['goodsId']);
        //$this->redirect(array('/main/index.php?r=goods/picture','goodsId'=>$_GET['goodsId']));
        //$this->actionPicture();
    }

    // 上传商品缩略图图片，只传一张，推送图片到LBS，并把照片的name保存到数据库
    public function actionUploadThumbnail(){
        // 校验权限
        $this->initUserInfo();        
        if(isset($_GET['goodsId'])){
            $goodsModel = Goods::model()->find('id=:id',array(':id' => intval($_GET['goodsId'])));
            if(empty($goodsModel) || $this->merchantModel->id !== $goodsModel->merchantId){
                // 商品不存在或者商品不属于该用户，跳权限错误页
                $this->smarty->showErrPage($this->title, '您管理的商品不存在或者所有者不是您！', $this->userModel->role);
            }
        }else{
            $this->smarty->showErrPage($this->title, '您输入的参数有误，请重试', $this->userModel->role);
        }
        // 上传缩略图文件名
        $upfileName = 'thumbnail';
        if(isset($_FILES[$upfileName]['tmp_name']) && '' !== $_FILES[$upfileName]['tmp_name']){
            $this->uploadPic($_FILES[$upfileName]['tmp_name'], GoodsController::GOODS_THUMBNAIL);
        }
        // 跳到上传页面
        $this->redirect("/main/index.php?r=goods/picture&goodsId=".$_GET['goodsId']);
        //$this->redirect(array('/main/index.php?r=goods/picture','goodsId'=>$_GET['goodsId']));
        //$this->actionPicture();
    }

    // 上传商品图片到BCS，同时更新数据库
    private function uploadPic($srcFile, $type){       
        // 上传到bcs
        $destFile    = Yii::app()->bcs->uploadFile($srcFile);
        if($destFile){
            //上传成功后把图片名$destFile插入数据库，然后展示配置
            if($type === GoodsController::GOODS_ORIGINAL_PICTURE){
                $this->addGoodsPic($_GET['goodsId'], $destFile);
            }else if ($type === GoodsController::GOODS_THUMBNAIL){
                $this->addGoodsThumbnail($_GET['goodsId'], $destFile);
            }
        }else{
            //上传失败后跳错误页，输出错误信息  
            $this->smarty->showErrPage($this->title, '图片上传失败，请重试！', $this->userModel->role);
        }
    } 

    // 设置商品图片，直接插入一条新纪录
    private function addGoodsPic($goodsId, $picName){
        $PictureModel = new Picture;
        $PictureModel->foreignKey = $goodsId;
        $PictureModel->type = "Goods";
        $PictureModel->name = $picName;
        return $PictureModel->save();
    }  

    // 设置商品图片缩略图，直接插入一条新纪录
    private function addGoodsThumbnail($goodsId, $picName){
        $PictureModel = new Picture;
        $PictureModel->foreignKey = $goodsId;
        $PictureModel->type = "GoodsThumbnail";
        $PictureModel->name = $picName;
        return $PictureModel->save();
    } 

    // 删除商品图片
    public function actionDeletePicture(){
        // 校验权限
        $this->initUserInfo();   
        // 删除记录
        if(isset($_POST['pictureId']))
        {
            $ret = Picture::model()->deleteByPk(intval($_POST['pictureId']));
            echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => $ret));            
        }else{
            echo json_encode(array('errno' => 2, 'msg' => "parameter error: id cannot be null", 'data' => null)); 
        } 
    }

    // 查看商品图片信息
    public function actionPicture(){
        // 校验权限
        $this->initUserInfo();        
        if(isset($_GET['goodsId'])){
            $goodsModel = Goods::model()->find('id=:id',array(':id' => intval($_GET['goodsId'])));
            if(empty($goodsModel) || $this->merchantModel->id !== $goodsModel->merchantId){
                // 商品不存在或者商品不属于该用户，跳权限错误页
                $this->smarty->showErrPage($this->title, '您管理的商品不存在或者所有者不是您！', $this->userModel->role);
            }
        }else{
            $this->smarty->showErrPage($this->title, '您输入的参数有误，请重试', $this->userModel->role);
        }         
        // 读取商品图片列表，最多3个
        $PictureModels = Picture::Model()->findAll('foreignKey=:id and type=:type', array('id' => intval($_GET['goodsId']), 'type' => "Goods"));
        $pictures = array();
        if(!empty($PictureModels)){
            foreach ($PictureModels as $PictureModel) {
                $pictures[] = array(
                    'id' => $PictureModel->id,
                    'url' => Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='.$PictureModel->name,
                );
            }
        }        
        // 渲染界面
        $thumbnailModel = Picture::Model()->find('foreignKey=:id and type=:type', array('id' => intval($_GET['goodsId']), 'type' => "GoodsThumbnail"));
        $thumbnail = null;
        if(!empty($thumbnailModel)){
            $thumbnail = array(
                'id'  => $thumbnailModel->id,
                'url' => Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='.$thumbnailModel->name,
            );
        }
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('pictures', $pictures);    
        $this->smarty->assign('thumbnail', $thumbnail);  
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $this->userModel->role);
        $this->smarty->assign('goodsId', $_GET['goodsId']);
        $this->smarty->assign('pageTpl', 'goods_picture.tpl');                          
        $this->smarty->display('index.tpl');      
    }

    // 删除商品
    public function actionDelete(){
        // 校验权限
        $this->initUserInfo();
        // 删除记录
        if(isset($_POST['id']))
        {
            $ret = Goods::model()->deleteByPk(intval($_POST['id']));
            echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => $ret));            
        }else{
            echo json_encode(array('errno' => 2, 'msg' => "parameter error: id cannot be null", 'data' => null)); 
        }       
    }    

    // 同步店家的信息到lbs
    private function syncLbs($merchantModel){
        $mylbs = new MyLbs();
        $coordinate = explode(',', $merchantModel->coordinate);
        $lbsConf = array(
            'title' => $merchantModel->name,
            'address' => $merchantModel->address,
            'longitude' => floatval($coordinate[0]),
            'latitude' => floatval($coordinate[1]),
            'category' => $merchantModel->category,
            'merchantId' => $merchantModel->id,
            'level'      => $merchantModel->level,
            'promotionExpenses' => $merchantModel->promotionExpenses,
            'coord_type' => 3,
            );
        // 在百度地图新建标注
        $ret = $mylbs->addMerchant($lbsConf);
        if(3002 === $ret['errno']){
            // 标注已经存在，修改之
            return $mylbs->updateMerchant($merchantModel->id, $lbsConf);            
        }else{
            return $ret;
        }
    }

    /**
     * 获取商品详情
     */    
    public function actionDetail()
    {
        if(isset($_GET['goodsId']))
        {
            $goodsModel = Goods::model()->findByPk(intval($_GET['goodsId']));
            if(empty($goodsModel)){
                echo json_encode(array('errno' => 1, 'msg' => "goods does not exsit", 'data' => null)); 
            }else{
                $goods = $goodsModel->attributes;
                $goods['picUrls'] = $this->getPicUrls('Goods', $goodsModel->id);
                $goods['comments'] = array();
                $commentModels = Comment::model()->findAll('type=:type and foreignKey=:foreignKey and status=1 order by createTime DESC limit 10', array('type'=>'Goods', 'foreignKey'=>$goodsModel->id));
                foreach ($commentModels as $commentModel) {
                     $comment = $commentModel->attributes;
                     $comment['username'] = $commentModel->user->username;
                     $goods['comments'][] = $comment;
                }
                $goods['merchant'] = $goodsModel->merchant->attributes;
                echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $goods)); 
            }
        }else{
            echo json_encode(array('errno' => 2, 'msg' => "parameter error: goodsId cannot be null", 'data' => null)); 
        }
    }

}
