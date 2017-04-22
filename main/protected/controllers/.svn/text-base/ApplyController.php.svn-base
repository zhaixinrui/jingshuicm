<?php

class ApplyController extends Controller
{
    private $merchantModel;
    public function __construct(){
        $this->title = '易人宜家 - 申请管理';
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
 
    // 用户参加活动
    public function actionApply(){
        $this->initMobileUserInfo();
        $applyModel = Apply::model()->find('userId=:userId', array(':userId' => $this->userModel->id));
        if($applyModel){
            echo json_encode(array('errno' => 3, 'msg' => "you hasa applyed before, please wait", 'data' => $_POST)); 
            Yii::app()->end();
        }
        $applyModel = new Apply();
        unset($_POST['username']);
        $applyModel->attributes = $_POST;
        try{
            if($applyModel->save()){
                echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $applyModel->id)); 
            }else{
                echo json_encode(array('errno' => 4, 'msg' => $applyModel->errors, 'data' => $_POST)); 
            }
        }catch(Exception $e){
            echo json_encode(array('errno' => 5, 'msg' => $e, 'data' => $_POST)); 
        }
    }
    
    // 查询用户的申请状态
    public function actionGetApplyState(){
        $this->initMobileUserInfo();
        $data = array();
        $applyModel = Apply::model()->find('userId=:userId', array(':userId' => $_GET['userId']));
        if($applyModel){
            echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $applyModel->attributes)); 
        }else{
            echo json_encode(array('errno' => 6, 'msg' => "you don't hava any apply", 'data' => null));
        }
    }

    //审核申请
    public function actionAuditApply() {
        //校验权限
        $this->initUserInfo();
        if (UserIdentity::USER_ROLE_ADMIN !== intval($this->userModel->role)) {
            echo json_encode(array('errno' => 1, 'msg' => "UR dangerous user"));
            return;
        }
        $id     = intval($_POST['id']); 
        $status = intval($_POST['status']);
        $userId = intval($_POST['userId']);
        $userRole = intval($_POST['userRole']);
        if (!isset($status) || !isset($id) || !isset($userId) || !isset($userRole)) {
            echo json_encode(array('errno' => 2, 
                    'msg' => "param error, id , status , userId and userRole can no be null"));
            return;
        }
        if ($status !== 0 && $status !== 1) {
            echo json_encode(array('errno' => 3, 'msg' => "status just can be 0 and 1"));
            return;
        }
        if ($userRole !== UserIdentity::USER_ROLE_MERCHANT 
            && $userRole !== UserIdentity::USER_ROLE_NORMAL) {
            echo json_encode(array('errno' => 4, 
                'msg' => "userRole just can be ". UserIdentity::USER_ROLE_NORMAL ." and ".UserIdentity::USER_ROLE_MERCHANT));
        }
        $applyModel = Apply::model()->findByPk($id);
        if (empty($applyModel)) {
            echo json_encode(array('errno' => 5, 'msg' => "apply did not exist"));
            return;
        }
        $applyModel->status = $status;
        $applyModel->updateTime = date('Y-m-d H:i:s',time());
        $result = $applyModel->save();
        if (!$result) {
            echo json_encode(array('errno' => 6, 'msg' => "apply audit failed"));
            return;
        }
        $userModel = User::model()->findByPk($userId);
        if (empty($userModel)) {
            echo json_encode(array('errno' => 7, 'msg' => "user did not exist"));
            return;
        }
        $userModel->role = $userRole;
        $userModel->updateTime = date('Y-m-d H:i:s',time());
        $result = $userModel->save();
        if (!$result) {
           echo json_encode(array('errno' => 8, 'msg' => "user role audit failed"));
           return;
        }
        
        echo json_encode(array('errno' => 0, 'msg' => "success")); 
    }

    //管理员用户申请管理,展示申请列表
    public function actionManage() {
        // 校验权限
        $this->initUserInfo();
        if (null !== $this->merchantModel) {
            //商家不能查看
            $this->smarty->showErrPage($this->title, '您无权限查看此内容!', $this->userModel->role);
        }

        $applies= array();
        $appliesObj = Apply::model()->findAll();
        if (!empty($appliesObj)) {
            foreach ($appliesObj as $applyObj) {
                $apply = $applyObj->attributes;
                $user = User::model()->find('id=:userId',
                    array(':userId'=> $apply['userId']));
                $apply['username'] = $user['username'];
                $apply['userId']   = $user['id'];
                $applies[] = $apply;
            }
        }

        $this->smarty->assign('title',    $this->title);
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $this->userModel->role);
        $this->smarty->assign('applies',  $applies);
        $this->smarty->assign('pageTpl',  'apply_manage_admin.tpl');
        $this->smarty->display('index.tpl');
    }
}
