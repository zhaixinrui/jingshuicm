<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $layout='//layouts/column1';
	public $menu=array();
	public $breadcrumbs=array();
	public $smarty = '';
    public $userModel;
    public $title;
    
    // 查询图片的url，只返回一张图片，取消，全部返回数组的形式
	// public function getPicUrl($type, $id){
	// 	$picUrls = array();
 //        $picModel = Picture::model()->find('type=:type and foreignKey=:id', array(':type' => $type, ':id' => intval($id)));
 //        if(!empty($picModel)){
 //        	$picUrls[] = Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='. $picModel->name;
 //        }else{
 //            // 返回模板图片，测试用
 //            $picUrls[] = Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='.'5a105e8b9d40e1329780d62ea2265d8a.1397822370.fc97a4b388d8a57b3830a7121a1cb284.jpg';            
 //        }
 //        return $picUrls;
	// }

    // 查询图片的url，返回所有图片
	public function getPicUrls($type, $id){
		$picModels = Picture::model()->findAll('type=:type and foreignKey=:id', array(':type' => $type, ':id' => intval($id)));
        $picUrls = array();
		foreach ($picModels as $picModel) {
			$picUrls[] = Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='. $picModel->name;
		}
        //返回模板图片，测试用
        if(0 === count($picUrls)){
            $picUrls[] = Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='.'f6f4061a1bddc1c04d8109b39f581270.1407939046.23a6a9a38e3b013b02eeb1321769d709.jpg';
            //$picUrls[] = Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='.'5a105e8b9d40e1329780d62ea2265d8a.1397822379.3ca4b4e5b08a695c22e10b5cc52590cd.jpg';
            //$picUrls[] = Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='.'5a105e8b9d40e1329780d62ea2265d8a.1397822380.4f7e647eaab00b3dbbf4e7eac553e2db.jpg';
        }

		return $picUrls;
	}	

    public function getPicUrlByName($name){
        return Yii::app()->request->hostInfo.Yii::app()->homeUrl.'?r=image/view&sign='.$name;
    }

	public function init() {
		$this->smarty = Yii::app()->smarty;
	}    

    // 初始化用户信息，包括权限检查，移动端调用
	public function initMobileUserInfo() {
        $userId = Yii::app()->request->getParam('userId');
        $username = Yii::app()->request->getParam('username');
        if (!$userId || !$username) {
            $result =  array(
                'errno' => 1,
                'msg'   => "parameter error: userId and username cannot be null",
                'data'  => null
            );
            echo json_encode($result); 
            Yii::app()->end();
        } else {
            $this->userModel = User::model()->find("id=:id and username=:name", 
                array(':id' => $userId, ':name' => $username));             
            if (null === $this->userModel 
                || UserIdentity::USER_ROLE_NORMAL !== intval($this->userModel->role)) 
            {
                 $result =  array(
                     'errno' => 2,
                     'msg'   => "auth error, user did not exist or did not normal user",
                     'data'  => null,
                 );
                echo json_encode($result); 
                Yii::app()->end();
            }
        } 
    }

}
