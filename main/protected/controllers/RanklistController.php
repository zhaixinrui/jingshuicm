<?php

class RanklistController extends Controller
{
    // 初始化用户信息，包括权限检查
	public function initUserInfo()
	{
        $this->title = '易人宜家 - 排行榜管理';
        if('Guest' === Yii::app()->user->name){
            // 游客需要登录
            $this->redirect(Yii::app()->user->loginUrl);
        }else{
            $this->userModel = User::model()->find("username=:name", array(':name' => Yii::app()->user->name)); 
            if(UserIdentity::USER_ROLE_ADMIN !== intval($this->userModel->role)){
                // 用户角色非商家的跳转到登录
                $this->redirect(Yii::app()->user->loginUrl);
            }
        }        
    }

    // 查看排行榜
    public function actionManage(){
        $this->initUserInfo();
        $rankListModels = RankList::model()->findAll();
        $ranklist = array();
        foreach ($rankListModels as $rankListModel) {
            $ranklist[] = $rankListModel->attributes;
        }
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('username', $this->userModel->username);
        $this->smarty->assign('userRole', $this->userModel->role);
        $this->smarty->assign('ranklist', $ranklist);
        // var_export($ranklist);
        // Yii::app()->end();
        $this->smarty->assign('pageTpl', 'ranklist_manage.tpl');
        $this->smarty->display('index.tpl');
    }

    // 修改排行榜
    public function actionSetting(){ 
        $this->initUserInfo();
        if(!isset($_POST['id']) || !isset($_POST['merchantId']))        {
            echo json_encode(array('errno' => 1, 'msg' => "parameter error: merchantId and id cannot be null", 'data' => null)); 
            Yii::app()->end();
        }
        $rankListModel = RankList::model()->findByPk(intval($_POST['id']));
        if(empty($rankListModel)){
            echo json_encode(array('errno' => 2, 'msg' => "id does not exsit", 'data' => $_POST['id']));                    
            Yii::app()->end();
        }
        $merchantModel = Merchant::model()->findByPk(intval($_POST['merchantId']));
        if(empty($merchantModel)){
            echo json_encode(array('errno' => 3, 'msg' => "merchantId does not exsit", 'data' => $_POST['merchantId']));                    
            Yii::app()->end();  
        }          
        $rankListModel->merchantId = intval($_POST['merchantId']);
        if($rankListModel->save()){
            echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => null));       
        }else{
            echo json_encode(array('errno' => 4, 'msg' => "update db fail:".$rankListModel->error, 'data' => null));       
        }
    }

    /**
     * 获取排行榜
     */    
    public function actionGetrank()
    {
        if(!isset($_GET['type']) || !isset($_GET['category']))        {
            echo json_encode(array('errno' => 1, 'msg' => "parameter error: type and category cannot be null", 'data' => null)); 
            Yii::app()->end();
        }
        $rankListModels = RankList::model()->findAll("type=:type and category=:category", array(":type"=>$_GET['type'], ":category"=>$_GET['category']));
        if(empty($rankListModels)){
            echo json_encode(array('errno' => 2, 'msg' => "ranklist does not exsit", 'data' => null));                    
            Yii::app()->end();
        }
        $ranklist = array();
        foreach ($rankListModels as $rankListModel) {
            $rankitem = $rankListModel->attributes;
            // 查找对应商家的信息
            $merchantModel = Merchant::model()->findByPk($rankListModel->merchantId);
            if(empty($merchantModel)){
                $rankitem['merchantName'] = null;
                $rankitem['merchantIntroduction'] = null;
                $rankitem['merchantPicUrls'] = array();
            }else{
                $rankitem['merchantName'] = $merchantModel->name;
                $rankitem['merchantIntroduction'] = $merchantModel->introduction;
                $rankitem['merchantPicUrls'] = $this->getPicUrls('Merchant', $merchantModel->id);
            }
            $ranklist[] = $rankitem;
        }
        echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $ranklist));       
    }      
}
