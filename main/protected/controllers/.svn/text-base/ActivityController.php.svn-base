<?php

class ActivityController extends Controller
{
    private $merchantModel;
    public function __construct(){
        $this->title = '易人宜家 - 活动管理';       
    }

    // 校验权限，同时初始化用户信息
    public function initUserInfo(){
        if('Guest' === Yii::app()->user->name){
            // 游客需要登录
            $this->redirect(Yii::app()->user->loginUrl);
        }else{
            $this->userModel = User::model()->find("username=:name", array(':name' => Yii::app()->user->name)); 
            if(UserIdentity::USER_ROLE_MERCHANT !== intval($this->userModel->role)
                && UserIdentity::USER_ROLE_ADMIN !== intval($this->userModel->role)){
                // 用户角色非商家和管理员的跳转到登录
                $this->redirect(Yii::app()->user->loginUrl);
            }else{
                $this->merchantModel = Merchant::model()->find("userId=:id", array(':id' => $this->userModel->id));
                if(empty($this->merchantModel) && 
                    UserIdentity::USER_ROLE_ADMIN !== intval($this->userModel->role)){
                    // 还没创建店铺，显示错误页
                    $this->smarty->showErrPage($this->title, '对不起，您还没有开通店铺，不能管理活动！', $this->userModel->role);
                }
            }
        } 
    }

    // 商家设置活动信息
    public function actionSetting()
    {
        $this->initUserInfo();
        //$merchantModel = Merchant::model()->find("userId=:id", array(':id' => $this->userModel->id));
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', UserIdentity::USER_ROLE_MERCHANT);            
        // 找到属于本店铺的活动
        $activityModel = Activity::model()->find("merchantId=:id", array(':id' => $this->merchantModel->id));
        if(empty($activityModel)){
            // 还没创建活动，显示空白页
            $this->smarty->assign('id', "");
            $this->smarty->assign('name', "");
            $this->smarty->assign('phone', "");
            $this->smarty->assign('address', "");
            $this->smarty->assign('period', "");
            $this->smarty->assign('introduction', "");
        }else{
            // 已经创建活动，列出活动详细信息
            $this->smarty->assign('id', $activityModel->id);
            $this->smarty->assign('name', $activityModel->name);
            $this->smarty->assign('phone', $activityModel->phone);
            $this->smarty->assign('address', $activityModel->address);
            $this->smarty->assign('period', $activityModel->period);
            $this->smarty->assign('introduction', $activityModel->introduction);
            // 显示活动图片
            //$this->smarty->assign('picUrl', $this->getPicUrl('Activity', $activityModel->id));
        }
        $this->smarty->assign('pageTpl', 'activity_setting.tpl');                          
        $this->smarty->display('index.tpl');            
        // if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //     if(isset($_POST['name'])){
        //         $this->updateSetting();
        //     }
        //     else if (is_uploaded_file($_FILES["upfile"]["tmp_name"])){
        //         $this->uploadPic();
        //     }
        //     else{
        //         //跳错误页
        //         $this->smarty->showErrPage($this->title, '系统错误，请刷新重试！', $this->userModel->role);
        //     }       
        // }else{
        //     $this->checkSetting();
        // }
    }

    // // 商家上传活动图片
    // private function uploadPic(){
    //     $activityModel = Activity::model()->find("merchantId=:id", array(':id' => $this->merchantModel->id));
    //     if(empty($activityModel)){
    //         $this->smarty->showErrPage($this->title, '请先设置活动名称等信息后再尝试上传活动图片！', $this->userModel->role);
    //     }
    //     $srcFile  = $_FILES["upfile"]['tmp_name'];
    //     // 给图片改名，防止命名重复导致的覆盖
    //     //$destFile = sprintf('%s.%s.%s', md5(Yii::app()->user->name), time(), md5($srcFile));
    //     // 上传到bcs
    //     $destFile    = Yii::app()->bcs->uploadFile($srcFile);
    //     //$ret = true;
    //     if($destFile){
    //         //上传成功后把图片名$destFile插入数据库，然后展示配置
    //         $this->setActivityPic($activityModel->id, $destFile);
    //         $this->checkSetting();
    //         //echo 'http://jingshuicm.duapp.com/main/index.php?r=image/view&sign='.$destFile;   
    //     }else{
    //         //上传失败后跳错误页，输出错误信息  
    //         $this->smarty->showErrPage($this->title, '图片上传失败，请重试！', $this->userModel->role);
    //     }
    // }   



    // 设置商家活动图片
    private function setActivityPic($activityId, $picName){
        $PictureModel = Picture::Model()->find('foreignKey=:id and type=:type', array(':id' => $activityId, ':type' => "Activity"));
        if(empty($PictureModel)){
            $PictureModel = new Picture;
            $PictureModel->foreignKey = $activityId;
            $PictureModel->type = "Activity";
        }
        $PictureModel->name = $picName;
        return $PictureModel->save();
        // if($PictureModel->save()){
        //     echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => null));
        // }else{
        //     echo json_encode(array('errno' => 2, 'msg' => $PictureModel->errors, 'data' => null));
        // }
    }     

    // 查看活动信息
    private function checkSetting(){
        //$userModel = User::model()->find("username=:name", array(':name' => Yii::app()->user->name));
        $merchantModel = Merchant::model()->find("userId=:id", array(':id' => $this->userModel->id));
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', UserIdentity::USER_ROLE_MERCHANT);            
        // 找到属于本店铺的活动
        $activityModel = Activity::model()->find("merchantId=:id", array(':id' => $this->merchantModel->id));
        if(empty($activityModel)){
            // 还没创建活动，显示空白页
            $this->smarty->assign('name', "");
            $this->smarty->assign('phone', "");
            $this->smarty->assign('address', "");
            $this->smarty->assign('period', "");
            $this->smarty->assign('introduction', "");
        }else{
            // 已经创建活动，列出活动详细信息
            $this->smarty->assign('name', $activityModel->name);
            $this->smarty->assign('phone', $activityModel->phone);
            $this->smarty->assign('address', $activityModel->address);
            $this->smarty->assign('period', $activityModel->period);
            $this->smarty->assign('introduction', $activityModel->introduction);
            // 显示活动图片
            //$this->smarty->assign('picUrl', $this->getPicUrl('Activity', $activityModel->id));
        }
        $this->smarty->assign('pageTpl', 'activity_setting.tpl');                          
        $this->smarty->display('index.tpl');    
    }



    // 修改活动信息
    public function actionUpdateSetting(){
        $this->initUserInfo();
        // 找到属于本店铺的活动
        $activityModel = Activity::model()->find("merchantId=:id", array(':id' => $this->merchantModel->id));
        if(empty($activityModel)){
            $activityModel = new Activity;
            $activityModel->merchantId = $this->merchantModel->id;
        }
        $activityModel->attributes = $_POST;
        $activityModel->category   = $this->merchantModel->category;
        if($activityModel->save()){
            echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $activityModel->id));
        }else{
            echo json_encode(array('errno' => 2, 'msg' => $activityModel->errors, 'data' => null));
        }             
    }

    // 查看活动图片信息
    public function actionPicture(){
        // 校验权限
        $this->initUserInfo();        
        if(isset($_GET['activityId'])){
            $activityModel = Activity::model()->find('id=:id',array(':id' => intval($_GET['activityId'])));
            if(empty($activityModel) || $this->merchantModel->id !== $activityModel->merchantId){
                // 商品不存在或者商品不属于该用户，跳权限错误页
                $this->smarty->showErrPage($this->title, '您管理的商品不存在或者所有者不是您！', $this->userModel->role);
            }
        }else{
            $this->smarty->showErrPage($this->title, '您输入的参数有误，请重试', $this->userModel->role);
        }         
        // 读取商品图片列表，最多3个
        $PictureModels = Picture::Model()->findAll('foreignKey=:id and type=:type', array('id' => intval($_GET['activityId']), 'type' => "Activity"));
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
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('pictures', $pictures);      
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $this->userModel->role);
        $this->smarty->assign('activityId', $_GET['activityId']);
        $this->smarty->assign('pageTpl', 'activity_picture.tpl');                          
        $this->smarty->display('index.tpl');      
    }

    /**
     * 获取活动详情
     */    
    public function actionDetail()
    {
        if(isset($_GET['activityId']))
        {
            $activityModel = Activity::model()->find("id=:id", array(':id' => intval($_GET['activityId'])));
            if(empty($activityModel)){
                echo json_encode(array('errno' => 1, 'msg' => "activity does not exsit", 'data' => null));                    
            }else{
                $activity = array(
                    'name'         => $activityModel->name,
                    'introduction' => $activityModel->introduction,
                    'address'      => $activityModel->address,
                    'period'       => $activityModel->period,
                    'phone'        => $activityModel->phone,
                    'createTime'   => $activityModel->createTime,
                    'picUrls' => $this->getPicUrls('Activity', $activityModel->id),
                    );
                echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $activity)); 
            }
        }else{
            echo json_encode(array('errno' => 2, 'msg' => "parameter error: activityId cannot be null", 'data' => $_GET)); 
        }
    }

    // 上传活动图片，推送图片到LBS，并把照片的name保存到数据库
    public function actionUploadPicture(){
        // 校验权限
        $this->initUserInfo();        
        if(isset($_GET['activityId'])){
            $activityModel = Activity::model()->find('id=:id',array(':id' => intval($_GET['activityId'])));
            if(empty($activityModel) || $this->merchantModel->id !== $activityModel->merchantId){
                // 商品不存在或者商品不属于该用户，跳权限错误页
                $this->smarty->showErrPage($this->title, '您管理的活动不存在或者所有者不是您！', $this->userModel->role);
            }
        }else{
            $this->smarty->showErrPage($this->title, '您输入的参数有误，请重试', $this->userModel->role);
        }
        // 上传文件名列表
        $upfileNames = array('upfile0','upfile1','upfile2');
        foreach ($upfileNames as $upfileName) {
            if(isset($_FILES[$upfileName]['tmp_name']) && '' !== $_FILES[$upfileName]['tmp_name']){
                $this->uploadPic($_FILES[$upfileName]['tmp_name']);
            }
        }
        // 跳到上传页面
        $this->redirect("/main/index.php?r=activity/picture&activityId=".$_GET['activityId']);
        //$this->redirect(array('/main/index.php?r=activity/picture','activityId'=>$_GET['activityId']));
        //$this->actionPicture();
    }

    // 上传商品图片到BCS，同时更新数据库
    private function uploadPic($srcFile){       
        // 上传到bcs
        $destFile    = Yii::app()->bcs->uploadFile($srcFile);
        if($destFile){
            //上传成功后把图片名$destFile插入数据库，然后展示配置
            $this->addActivityPic($_GET['activityId'], $destFile);
        }else{
            //上传失败后跳错误页，输出错误信息  
            $this->smarty->showErrPage($this->title, '图片上传失败，请重试！', $this->userModel->role);
        }
    } 

    // 设置商品图片，直接插入一条新纪录
    private function addActivityPic($activityId, $picName){
        $PictureModel = new Picture;
        $PictureModel->foreignKey = $activityId;
        $PictureModel->type = "Activity";
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

    // 活动排行
    public function actionTop(){
        if( empty($_GET['category'])){
            echo json_encode(array('errno' => 1, 'msg' => "parameter error: category cannot be null", 'data' => null)); 
            Yii::app()->end();
        }
        $data = array('total' => 0, 'activities' => array());
        // 获取各个品类排名第一的活动
        if ( 'all' === $_GET['category'] ){
            //$connection = Yii::app()->db;
            //$sql = "select a.* from Activity a, (select category, max(promotionExpenses) as promotionExpenses from Activity group by category) b where a.category = b.category and a.promotionExpenses = b.promotionExpenses;";
            //$command = $connection->createCommand($sql);
            //$result = $command->queryAll();
            //foreach ($result as $rec) {
            //    $rec['picUrls'] = $this->getPicUrls('Activity', $rec['id']);
            //    // 为了保证门排在第一个，类别是门的话追加到数组的开头，其他类型的直接追加到末尾
            //    if($rec['category'] == "门"){
            //        array_unshift($data['activities'], $rec);
            //    }else{
            //        array_push($data['activities'], $rec);
            //        //$data['activities'][] = $rec;
            //    }
            //}
            $activities = array();
            $hotActivityModels = HotActivity::model()->findAll();
            if (!empty($hotActivityModels)) {
                foreach ($hotActivityModels as $hotActivity) {
                    if (!empty($hotActivity->activityId)) {
                        $pictureModel = Picture::model()->find('foreignKey=:id and type=:type',
                            array(':id' => $hotActivity->id, ':type' => "HotActivityThumbnail"));
                        //$pictureArr = $this->getPicUrls('HotActivityThumbnail', $hotActivity->id);
                        if (!empty($pictureModel)) {
                            $activityModel = Activity::model()->find('id=:id', array(':id' => $hotActivity->activityId));
                            if (!empty($activityModel)) {
                                $activity = $activityModel->attributes;
                                $url = Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='
                                    . $pictureModel->name;
                                $activity['picUrls'] = array($url);
                                $activities[] = $activity;
                            }
                        }
                    }
                }
            }
            $data['activities'] = $activities;
            $data['total'] = count($data['activities']);
        // 获取单个品类排名靠前的活动
        }else{
            $page_index = empty($_GET['page_index']) ? 1  : intval($_GET['page_index']);
            $page_size  = empty($_GET['page_size'])  ? 10 : intval($_GET['page_size']);
            $total = Activity::model()->count('category=:category', array(':category' => $_GET['category']));
            $data['total'] = $total;
            $start = $page_index*$page_size-$page_size;        
            $activityModels = Activity::model()->findAll('category=:category order by promotionExpenses desc limit :start,:page_size', 
                array(':category' => $_GET['category'], ':start'=>$start, ':page_size' => $page_size));
            foreach ($activityModels as $activityModel) {
                $rec = $activityModel->attributes;
                $rec['picUrls'] = $this->getPicUrls('Activity', $rec['id']);
                $data['activities'][] = $rec;
            }
        }
        echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => $data)); 
    }

    public function actionSetPromotionExpenses() {
        $this->initUserInfo();
        if (!empty($this->merchantModel)) {
            echo json_encode(array('errno' => 3, 'msg' => "you have no this rights"));
            return;
        }
        $activityId        = intval($_POST['activityId']);
        $promotionExpenses = intval($_POST['promotionExpenses']);
        if (!isset($activityId)
            || !isset($promotionExpenses)) {
            echo json_encode(array('errno' => 1, 'msg' => "param activityId and promotionExpenses can not be null"));
            return;
        }
        if ($promotionExpenses < 0) {
            echo json_encode(array('errno' => 4, 'msg' => "param error, promotionExpenses can not lower than 0"));
            return;
        }
        $activityModel = Activity::model()->find("id=:activityId", array(':activityId' => $activityId));
        if (empty($activityModel)) {
            echo json_encode(array('errno' => 2, 'msg' => "activity is not exist"));
            return;
        }
        $activityModel->promotionExpenses = $promotionExpenses;
        $activityModel->save();
        echo json_encode(array('errno' => 0, 'msg' => "success"));
    }

    public function actionManage() {
        // 校验权限
        $this->initUserInfo();

        if (null !== $this->merchantModel) {
            //商家不能查看
            $this->smarty->showErrPage($this->title, '您无权限查看此内容!', $this->userModel->role);
        }

        $activities = array();

        $activitiesObj = Activity::model()->findAll();
        if (!empty($activitiesObj)) {
            foreach ($activitiesObj as $activityObj) {
                $activity = $activityObj->attributes;
                $merchant = Merchant::model()->find('id=:merchantId',
                    array(':merchantId'=> $activity['merchantId']));
                if(!$merchant){
                    continue;
                }
                $activity['merchant'] = $merchant->attributes;
                $activities[] = $activity;
            }
        }

        $this->smarty->assign('title',      $this->title);
        $this->smarty->assign('username',   Yii::app()->user->name);
        $this->smarty->assign('userRole',   $this->userModel->role);
        $this->smarty->assign('activities', $activities);
        $this->smarty->assign('pageTpl',    'activity_manage_admin.tpl');
        $this->smarty->display('index.tpl');
    }
}
