<?php

class HotActivityController extends Controller
{
    private $merchantModel;
    public function __construct(){
        $this->title = '易人宜家 - 热门活动';       
    }

    // 校验权限，同时初始化用户信息
    public function initUserInfo(){
        if ('Guest' === Yii::app()->user->name){
            // 游客需要登录
            $this->redirect(Yii::app()->user->loginUrl);
        } else {
            $this->userModel = User::model()->find("username=:name", array(':name' => Yii::app()->user->name)); 
            if (UserIdentity::USER_ROLE_ADMIN !== intval($this->userModel->role)) {
                // 只有管理员有权限进入此页面 
                $this->smarty->showErrPage($this->title, '对不起，您没有权限！', $this->userModel->role);
            }
        } 
    }

    // 管理热门活动,展示热门活动列表
    public function actionManage() {
        // 校验权限
        $this->initUserInfo();
        $hotActivityModels = HotActivity::model()->findAll();
        $hotActivities = array();
        foreach ($hotActivityModels as $hotActivityModel) {
            $hotActivities[] = $hotActivityModel->attributes;
        }   
        // 渲染界面
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('hotActivities', $hotActivities);
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $this->userModel->role);
        $this->smarty->assign('pageTpl', 'hotactivity_manage_admin.tpl');
        $this->smarty->display('index.tpl');
    }

    public function actionSetting() {
        $this->initUserInfo();
        $id = $_POST['id'];
        $activityId = $_POST['activityId'];
        

        if (isset($activityId)
            && isset($id)) {
            $hotActivityModel = HotActivity::model()->find('id=:id',array(':id' => intval($id)));
            $activityModel = Activity::model()->find('id=:id',array(':id' => intval($activityId)));
            if (empty($activityModel) ||
                empty($hotActivityModel)) {
                echo json_encode(array('errno' => 1, 'msg' => "活动不存在，请重新填写已存在的活动号", 'data' => null));
                return;
            }
        }
        $hotActivityModel->activityId = $activityId;
        if ($hotActivityModel->save()) {
            echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $activityModel->id));
        } else {
            echo json_encode(array('errno' => 2, 'msg' => $activityModel->errors, 'data' => null));
        } 
    }

    private function uploadPic($srcFile,$id) {
        // 给图片改名，防止命名重复导致的覆盖
        $destFile = sprintf('%s.%s.%s', md5(Yii::app()->user->name), time(), md5($srcFile));
        // 上传到bcs
        $destFile = Yii::app()->bcs->uploadFile($srcFile);
        if ($destFile) {
            //上传成功后把图片名$destFile插入数据库，然后展示配置
            $this->setActivityPic($id, $destFile);
        } else {
            //上传失败后跳错误页，输出错误信息
            $this->smarty->showErrPage($this->title, '图片上传失败，请重试！', $this->userModel->role);
        }
    }

    // 设置热门活动图片
    private function setActivityPic($activityId, $picName){
        $pictureModel = Picture::model()->find('foreignKey=:id and type=:type', 
            array(':id' => $activityId, ':type' => "HotActivityThumbnail"));
        if (empty($pictureModel)) {
            $pictureModel = new Picture;
            $pictureModel->foreignKey = $activityId;
            $pictureModel->type = "HotActivityThumbnail";
        }
        $pictureModel->name = $picName;
        
        return $pictureModel->save();
    }     

    // 上传活动图片，推送图片到LBS，并把照片的name保存到数据库
    public function actionUploadPicture(){
        // 校验权限
        $this->initUserInfo();
        $hotActivityId = $_GET['hotActivityId'];
        if (isset($hotActivityId)) {
            $hotActivityModel = HotActivity::model()->find('id=:id',array(':id' => intval($hotActivityId)));
            if (empty($hotActivityModel)) {
                // 活动不存在
                $this->smarty->showErrPage($this->title, '此热门活动不存在无法设置图片！', $this->userModel->role);
            }
        } else {
            $this->smarty->showErrPage($this->title, '您输入的参数有误，请重试', $this->userModel->role);
        }
        // 上传文件名列表
        if(isset($_FILES['thumbnail']['tmp_name']) && '' !== $_FILES['thumbnail']['tmp_name']){
            $this->uploadPic($_FILES['thumbnail']['tmp_name'],$hotActivityId);
        }
        // 跳到上传页面
        $this->redirect("/main/index.php?r=hotActivity/picture&hotActivityId=".$hotActivityId);
    }

    // 删除商品图片
    public function actionDeletePicture(){
        // 校验权限
        $this->initUserInfo();   
        // 删除记录
        if (isset($_POST['pictureId'])) {
            $ret = Picture::model()->deleteByPk(intval($_POST['pictureId']));
            echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => $ret));            
        } else {
            echo json_encode(array('errno' => 2, 'msg' => "parameter error: id cannot be null", 'data' => null)); 
        } 
    }

    // 查看热门活动图片信息
    public function actionPicture() {
        // 校验权限
        $this->initUserInfo();
        $hotActivityId = $_GET['hotActivityId'];
        if (isset($hotActivityId)) {
            $hotActivityModel = HotActivity::model()->find('id=:id',array(':id' => intval($hotActivityId)));
            if (empty($hotActivityModel)) {
                // 热门活动不存在
                $this->smarty->showErrPage($this->title, '此热门活动不存在，无法添加图片！', $this->userModel->role);
            }
        } else {
            $this->smarty->showErrPage($this->title, '您输入的参数有误，请重试', $this->userModel->role);
        }
        // 读取商品图片列表，最多3个
        $pictureModel = Picture::Model()->find('foreignKey=:id and type=:type', 
            array('id' => intval($hotActivityId), 'type' => 'HotActivityThumbnail'));
        // 渲染界面
        $thumbnail = null;
        if (!empty($pictureModel)) {
            $thumbnail = array(
                'id'  => $pictureModel->id,
                'url' => Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='.$pictureModel->name,
            );
        }
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('thumbnail', $thumbnail);    
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $this->userModel->role);
        $this->smarty->assign('hotActivityId', $hotActivityId);
        $this->smarty->assign('pageTpl', 'hotactivity_picture.tpl');                          
        $this->smarty->display('index.tpl');      
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

}
