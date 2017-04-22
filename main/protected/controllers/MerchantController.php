<?php

class MerchantController extends Controller
{
    private $merchantModel;
    public function __construct(){
        $this->title = '易人宜家 - 商家管理';
    }

    public function initUserInfo() {
        if ('Guest' === Yii::app()->user->name) {
            // 游客需要登录
            $this->redirect(Yii::app()->user->loginUrl);
        } else {
            $this->userModel = User::model()->find("username=:name", 
                array(':name' => Yii::app()->user->name));
            if (UserIdentity::USER_ROLE_NORMAL === intval($this->userModel->role)) {
                // 用户角色非商家和管理员的跳转到登录
                $this->redirect(Yii::app()->user->loginUrl);
            } else {
                if (UserIdentity::USER_ROLE_MERCHANT === intval($this->userModel->role)) {
                    $this->merchantModel = Merchant::model()->find("userId=:id",
                        array(':id' => $this->userModel->id));
                } else {
                    $this->merchantModel = null;
                }
            }
        }
    }
    
    // 商家设置店铺信息
    public function actionSetting()
    {
        $this->title = '易人宜家 - 店铺管理';
        if('Guest' === Yii::app()->user->name){
            // 游客需要登录
            $this->redirect(Yii::app()->user->loginUrl);
        }else{
            $this->userModel = User::model()->find("username=:name", array(':name' => Yii::app()->user->name)); 
            if(UserIdentity::USER_ROLE_MERCHANT !== intval($this->userModel->role)){
                // 用户角色非商家的跳转到登录
                $this->redirect(Yii::app()->user->loginUrl);
            }
        }        
        if(isset($_POST['name'])){
            $this->updateSetting();
        }else{
            $this->checkSetting();
        }
    }

    // 查看店铺信息
    private function checkSetting(){
        if('Guest' === Yii::app()->user->name){
            $this->redirect(Yii::app()->user->loginUrl);
        }else{
            $userModel = User::model()->find("username=:name", array(':name' => Yii::app()->user->name));
            $merchantModel = Merchant::model()->find("userId=:id", array(':id' => $userModel->id));
            $this->smarty->assign('title', '易人宜家 - 店铺管理');
            $this->smarty->assign('username', Yii::app()->user->name);
            $this->smarty->assign('userRole', $userModel->role);
            $this->smarty->assign('pageTpl', 'merchant_setting.tpl');
            // 是否已经创建店铺
            $merchantModel = Merchant::model()->find("userId=:id", array(':id' => $userModel->id));
            if(empty($merchantModel)){
                $this->smarty->assign('id', null);
                $this->smarty->assign('name', "");
                $this->smarty->assign('category', 0);
                $this->smarty->assign('phone', "");
                $this->smarty->assign('address', "");
                $this->smarty->assign('coordinate', "");
                $this->smarty->assign('introduction', "");
                $this->smarty->assign('logo', "");
                $this->smarty->assign('merchantLevel', 1);
            }else{
                $this->smarty->assign('id', $merchantModel->id);
                $this->smarty->assign('name', $merchantModel->name);
                $this->smarty->assign('category', $merchantModel->category);
                $this->smarty->assign('phone', $merchantModel->phone);
                $this->smarty->assign('address', $merchantModel->address);
                $this->smarty->assign('coordinate', $merchantModel->coordinate);
                $this->smarty->assign('introduction', $merchantModel->introduction);
                $this->smarty->assign('logo', $this->getPicUrlByName($merchantModel->logo));
                $this->smarty->assign('merchantLevel', $merchantModel->level);
            }
            $this->smarty->display('index.tpl');
        } 
    }

    // 修改店铺信息
    private function updateSetting(){
        if('Guest' === Yii::app()->user->name){
            $this->redirect(Yii::app()->user->loginUrl);
        }else{
            $userModel = User::model()->find("username=:name", array(':name' => Yii::app()->user->name));
            $merchantModel = Merchant::model()->find("userId=:id", array(':id' => $userModel->id));
            if(empty($merchantModel)){
                $merchantModel = new Merchant;
                $merchantModel->userId = $userModel->id;
            }
            $merchantModel->attributes=$_POST;
            // 同时修改商家发布的商品和活动的类型
            foreach ($merchantModel->goods as $goodsModel) {
                $goodsModel->category = $merchantModel->category;
                $goodsModel->save();
            }
            foreach ($merchantModel->activities as $activitiesModel) {
                $activitiesModel->category = $merchantModel->category;
                $activitiesModel->save();
            }
            if($merchantModel->save()){
                $ret = $this->syncLbs($merchantModel);
                echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => $ret));
            }else{
                echo json_encode(array('errno' => 2, 'msg' => $merchantModel->errors, 'data' => null));
            }
        }
    }

    public function actionUploadPicture() {
        $this->initUserInfo();
        if (empty($this->merchantModel) || $this->merchantModel->level == 3) {
            echo json_encode(array('errno' => 1, 'msg' => 'you have no right'));
            //$this->smarty->showErrPage($this->title, '您没有权限上传！', $this->userModel->role);
        }
        if (!isset($_FILES['merchantLogo']['tmp_name']) 
            || '' === $_FILES['merchantLogo']['tmp_name']) {
            echo json_encode(array('errno' => 2, 'msg' => 'upload failed'));
                //$this->smarty->showErrPage($this->title, '图片上传失败，请重试！', $this->userModel->role);
        }
        $srcFile = $_FILES['merchantLogo']['tmp_name'];
        $destFile  = Yii::app()->bcs->uploadFile($srcFile);
        if ($destFile) {
            $this->merchantModel->logo = $destFile;
            $this->merchantModel->save();
            $this->syncLbs($this->merchantModel);
            echo json_encode(array(
                'errno' => 0, 
                'msg' => 'success', 
                //'url' => $destFile,
                'url' => $this->getPicUrlByName($destFile),
                ));
        } else {
            echo json_encode(array('errno' => 2, 'msg' => 'upload failed'));
                    //$this->smarty->showErrPage($this->title, '图片上传失败，请重试！', $this->userModel->role);
        }
}



    // 同步店家的信息到lbs
    private function syncLbs($merchantModel){
        $mylbs = new MyLbs();
        $coordinate = explode(',', $merchantModel->coordinate);
        $logo = '';
        if (1 == $merchantModel->level){
            $logo = $this->getPicUrlByName('defaultlogo.png');
        }else if ( 2 == $merchantModel->level){
            $logo = $this->getPicUrlByName($merchantModel->logo);
        }
        $lbsConf = array(
            'title' => $merchantModel->name,
            'address' => $merchantModel->address,
            'longitude' => floatval($coordinate[0]),
            'latitude' => floatval($coordinate[1]),
            'category' => $merchantModel->category,
            'merchantId' => $merchantModel->id,
            'level'      => $merchantModel->level,
            'logo'       => $logo,
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
     * 获取商家详情
     */    
    public function actionDetail()
    {
        if(isset($_GET['merchantId']))
        {
            $merchantModel = Merchant::model()->find("id=:id", array(':id' => intval($_GET['merchantId'])));
            if(empty($merchantModel)){
                echo json_encode(array('errno' => 1, 'msg' => "merchant does not exsit", 'data' => null));                    
            }else{
                $merchant = array(
                    'name'         => $merchantModel->name,
                    'category'     => $merchantModel->category,
                    'phone'        => $merchantModel->phone,
                    'address'      => $merchantModel->address,
                    'coordinate'   => $merchantModel->coordinate,
                    'introduction' => $merchantModel->introduction,
                    'activities'   => array(),
                    'goods'        => array(),
                    );
                foreach ($merchantModel->activities as $activityModel) {
                    $activity = $activityModel->attributes;
                    $activity['picUrls'] = $this->getPicUrls('Activity', $activityModel->id);
                    $merchant['activities'][] = $activity;
                }                
                $i = 0;
                foreach ($merchantModel->goods as $goodsModel) {
                    //只返回9个商品
                    if($i>=9) break;
                    $i++;
                    $goods = $goodsModel->attributes;
                    $goods['picUrls'] = $this->getPicUrls('GoodsThumbnail', $goodsModel->id);
                    if(empty($goods['picUrls'])){
                        $goods['picUrls'] = $this->getPicUrls('Goods', $goodsModel->id);
                    }
                    $merchant['goods'][] = $goods;
                }
                echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $merchant)); 
            }
        }else{
            echo json_encode(array('errno' => 2, 'msg' => "parameter error: merchantId cannot be null", 'data' => null)); 
        }
    }

    // 同步所有商家信息到lbs
    // 执行同步前请先执行如下语句
    // insert into Comment(userId,merchantId,type,comment) values(1,0,'SyncLbs',1);
    public function actionSyncLbs()
    {
        $merchantModels = Merchant::model()->findAll();
        $tagModel = Comment::model()->find("type='SyncLbs'");
        $arrRet = array();
        foreach ($merchantModels as $merchantModel) {
            // 之前同步过的不在同步，只同步比标记位大的商家
            if(intval($merchantModel->id) > intval($tagModel->merchantId)){
                $arrRet[$merchantModel->id] = $this->syncLbs($merchantModel);
                // 同步完成后更新标记位
                $tagModel->merchantId = intval($merchantModel->id);
                $tagModel->save();
                usleep(100000);
            }
        }
        echo json_encode($arrRet);
    }    

    // 删除lbs中所有商家的标注
    public function actionDeleteLbs()
    {
        $merchantModels = Merchant::model()->findAll();
        $arrRet = array();
        $mylbs = new MyLbs();
        foreach ($merchantModels as $merchantModel) {
            $arrRet[$merchantModel->id] = $mylbs->deleleMerchant($merchantModel->id);
            usleep(100000);
        }
        echo json_encode($arrRet);
    }

    // // 删除商家的全部信息
    // public function actionDeleteAll() {
    //     $merchants = Merchant::model()->findAll("name like '%Merchant_%'");
    //     foreach ($merchants as $merchant) {
    //         $this->actionDelete($merchant->id);
    //         sleep(1);
    //     }
    // }
    // 删除商家的全部信息
    public function actionDelete() {
        $this->initUserInfo();       
        if(!isset($_POST['merchantId'])){
            echo json_encode(array('errno' => 2, 'msg' => "parameter error: merchantId cannot be null", 'data' => null)); 
            return;
        }
        $merchantId = intval($_POST['merchantId']); 
        $merchantModel = Merchant::model()->find("id=:id", array(':id' => $merchantId));
        if(empty($merchantModel)){
            echo json_encode(array('errno' => 1, 'msg' => "merchant does not exsit", 'data' => null)); 
            return;                   
        }
        // 删除评论
        Comment::model()->deleteAll("merchantId=:merchantId", array(':merchantId' => $merchantId));
        //Favorite::model()->deleteAll("type=Merchant and foreignKey=:id", array(':id' => $merchantId));
        RankList::model()->deleteAll("merchantId=:id", array(':id' => $merchantId));
        // 删除相关活动
        foreach ($merchantModel->activities as $activityModel) {
            //Favorite::model()->deleteAll("type=Activity and foreignKey=:id", array(':id' => $activityModel->id));
            JoinActivity::model()->deleteAll("activityId=:id", array(':id' => $activityModel->id));
            $activityModel->delete();
        }            
        // 删除相关商品    
        foreach ($merchantModel->goods as $goodsModel) {
            //Favorite::model()->deleteAll("type=Goods and foreignKey=:id", array(':id' => $goodsModel->id));
            // 删除商品预订
            OrderGoods::model()->deleteAll("goodsId=:id", array(':id' => $goodsModel->id));
            $goodsModel->delete();
        }
        // 删除关注
        Favorite::model()->deleteAll("foreignKey=:merchantId and type='Merchant'", array(':merchantId' => $merchantId));
        // 删除地图标注
        $mylbs = new MyLbs();
        $mylbs->deleleMerchant($merchantId);
        // 删除商家
        $merchantModel->delete();
        echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => null));       
    }
    
    public function actionSetMerchantLevel() {
        $this->initUserInfo();
        if (!empty($this->merchantModel)) {
            echo json_encode(array('errno' => 3, 'msg' => "you have no this rights"));
            return;
        }
        $merchantId    = intval($_POST['merchantId']);
        $merchantLevel = intval($_POST['merchantLevel']);
        if (!isset($merchantId)
            || !isset($merchantLevel)) {
            echo json_encode(array('errno' => 1, 'msg' => "param merchantId and merchantLevel can not be null"));
            return;
        }
        if ($merchantLevel > 3 || $merchantLevel < 1) {
            echo json_encode(array('errno' => 4, 'msg' => "param error, merchantLevel must in （1，2，3）"));
            return;
        }
        $merchantModel = Merchant::model()->find("id=:merchantId", array(':merchantId' => $merchantId));
        if (empty($merchantModel)) {
            echo json_encode(array('errno' => 2, 'msg' => "merchant is not exist"));
            return;
        }
        $merchantModel->level = $merchantLevel;
        $merchantModel->save();
        echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $merchantModel));
    }
    
    //管理员商家管理,展示商家列表
    public function actionManage() {
        // 校验权限
        $this->initUserInfo();
        if (null !== $this->merchantModel) {
            //商家不能查看
            $this->smarty->showErrPage($this->title, '您无权限查看此内容!', $this->userModel->role);
        }

        // $merchants = array();
        // $merchantsObj = Merchant::model()->findAll();
        // if (!empty($merchantsObj)) {
        //     foreach ($merchantsObj as $merchantObj) {
        //         $merchant = $merchantObj->attributes;
        //         $user = User::model()->find('id=:userId',
        //             array(':userId'=> $merchant['userId']));
        //         $merchant['username'] = $user['username'];
        //         $merchants[] = $merchant;
        //     }
        // }

        $this->smarty->assign('title',    $this->title);
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $this->userModel->role);
        // $this->smarty->assign('merchants',$merchants);
        $this->smarty->assign('pageTpl',  'merchant_manage_admin.tpl');
        $this->smarty->display('index.tpl');
    }

    //管理员商家管理,展示商家列表,http接口
    public function actionList() {
        // 校验权限
        $this->initUserInfo();
        if (null !== $this->merchantModel) {
            //商家不能查看
            echo json_encode(array());
            return;
        }
        $start     = empty($_GET['iDisplayStart']) ? 0  : intval($_GET['iDisplayStart']);
        $start     = $start < 0 ? 0 : $start;
        $page_size = empty($_GET['iDisplayLength']) ? 10 : intval($_GET['iDisplayLength']);
        $page_size = $page_size <= 0 ? 10 : $page_size;
        $merchants = array();
        $total     = 0;
        $orderOption = "";
        $limitOption = "limit $start,$page_size";
        if(!empty($_GET['iSortCol_0']) and intval($_GET['iSortCol_0']) > 0){
            $columnIndex = $_GET['iSortCol_0'];
            $columnName  = $_GET["mDataProp_$columnIndex"];
            $orderMode   = $_GET['sSortDir_0'];
            $orderOption = " order by $columnName $orderMode ";
        }
        if(empty($_GET['sSearch'])){
            $total        = Merchant::model()->count();
            $merchantsObj = Merchant::model()->findAll("1=1 $orderOption $limitOption");           
        }else{
            $sSearch      = $_GET['sSearch'];
            $total        = Merchant::model()->count('name like :sSearch or phone like :sSearch or address like :sSearch or level like :sSearch',
                            array(':sSearch' => "%$sSearch%"));
            $merchantsObj = Merchant::model()->findAll("name like :sSearch or phone like :sSearch or address like :sSearch or level like :sSearch $orderOption $limitOption", 
                            array(':sSearch' => "%$sSearch%"));      
        }
        if (!empty($merchantsObj)){
            foreach ($merchantsObj as $merchantObj) {
                $merchant = $merchantObj->attributes;
                $user = User::model()->find('id=:userId',
                    array(':userId'=> $merchant['userId']));
                $merchant['username'] = $user['username'];
                $merchants[] = $merchant;
            }
        }
        echo json_encode(array(
            'sEcho'         => $_GET['sEcho'],
            'iTotalRecords' => $total,
            'iTotalDisplayRecords' => $total,//data.Count(),
            'aaData'        => $merchants,
        ));
    }     
}
