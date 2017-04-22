<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex()
	{
        //当前域名
        //echo Yii::app()->request->hostInfo;
        //除域名外的URL
        //echo Yii::app()->request->getUrl();
        //除域名外的首页地址
        //echo Yii::app()->user->returnUrl;
        //除域名外的根目录地址
        //echo Yii::app()->homeUrl;
        //echo Yii::app()->request->baseUrl;
        if('/' === Yii::app()->request->getUrl()){
            $this->redirect(Yii::app()->request->hostInfo.Yii::app()->homeUrl);
        }
        if('Guest' === Yii::app()->user->name){
            $this->redirect(Yii::app()->user->loginUrl);
        }else{
            $userModel = User::model()->find("username=:name", array(':name' => Yii::app()->user->name));
            if(UserIdentity::USER_ROLE_MERCHANT == $userModel->role)
                //$this->redirect("/main/index.php?r=merchant/setting");
                Yii::app()->runController("merchant/setting"); 
            else if(UserIdentity::USER_ROLE_ADMIN == $userModel->role)
                //$this->redirect("/main/index.php?r=ranklist/manage");
                Yii::app()->runController("ranklist/manage"); 
            else if(UserIdentity::USER_ROLE_NORMAL == $userModel->role)
                Yii::app()->runController("ranklist/manage");    

            // $this->smarty->assign('rootUrl', Yii::app()->request->hostInfo.Yii::app()->homeUrl);
            // $this->smarty->assign('title', '易人宜家 - 首页');
            // $this->smarty->assign('username', Yii::app()->user->name);
            // $this->smarty->assign('userRole', $userModel->role);
            // $this->smarty->assign('pageTpl', 'page.tpl');
            // $this->smarty->display('index.tpl');
        }
	}

	public function actionError()
	{
        $this->actionIndex();
	}

	public function actionLogin()
	{
		if(isset($_POST['username']) && isset($_POST['password']))
        {
            // 提交登陆信息
		    $model=new LoginForm;
			$model->attributes=$_POST;
            // 用户名密码正确
			//if($model->validate() && $model->login()){
			if($model->login()){
                echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => array('returnUrl' => Yii::app()->user->returnUrl)));
            // 用户名密码错误
            }else{
                echo json_encode(array('errno' => -1, 'msg' => 'invalidate username or password', 'data' => null));
            }
        }else{
            // 请求登陆页
            $this->smarty->assign('title', '易人宜家 - 登录');
            $this->smarty->assign('username', '游客');
            $this->smarty->display('login.tpl');
        }
	}

    // 移动端登陆
    public function actionMobileLogin()
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            // 提交登陆信息
            $model=new LoginForm;
            $model->attributes=$_POST;
            // 用户名密码正确
            //if($model->validate() && $model->login()){
            if($model->login()){
                echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => array('userId' => Yii::app()->user->id)));
            // 用户名密码错误
            }else{
                echo json_encode(array('errno' => 1, 'msg' => 'invalidate username or password', 'data' => null));
            }
        }else{
            echo json_encode(array('errno' => 2, 'msg' => 'username and password can not bu null', 'data' => null));
        }
    }    

    public function actionMobileLogout()
    {
        echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => null));
    }

    // 移动端注册，默认用户角色为普通用户
    public function actionMobileRegister()
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $newUser = new User;
            $newUser->username = $_POST['username'];
            $newUser->password = md5($_POST['password']);            
            $newUser->role     = UserIdentity::USER_ROLE_NORMAL;
            try{
                if ($newUser->save() == false) {
                    echo json_encode(array('errno' => 1, 'msg' => $newUser->errors, 'data' => null));
                }else{
                    echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => array('userId' => $newUser->id)));
                }
            }catch(Exception $e){
                echo json_encode(array('errno' => 2, 'msg' => 'username has exsit', 'data' => $e->getMessage()));
            }
        }else{
            echo json_encode(array('errno' => 3, 'msg' => 'username and password can not be null', 'data' => null));
        }
    }

    // 移动端修改密码操作
    public function actionMobilePasswd()
    {
        if(isset($_POST['password_old']) && isset($_POST['password_new']) && isset($_POST['username']))
        {
            $user = User::model()->find(array(
                'select'=>'id,password,username,role,status',
                'condition'=>'username=:username',
                'params'=>array(':username'=>$_POST['username']),
            ));
            if($user === null){
                 echo json_encode(array('errno' => 4, 'msg' => 'nonexistent user', 'data' => null));
            }else if(md5($_POST['password_old']) === $user->password){
                // 原密码正确
                $user->password = md5($_POST['password_new']);
                try{
                    if ($user->save()) {
                        echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => null));
                    }else{
                        echo json_encode(array('errno' => 3, 'msg' => $user->errors, 'data' => null));
                    }
                }catch(Exception $e){
                    echo json_encode(array('errno' => 2, 'msg' => $e->getMessage(), 'data' => null));
                }
            }else{
                echo json_encode(array('errno' => 1, 'msg' => "password wrong", 'data' => null));
            }
        }else{
            echo json_encode(array('errno' => 5, 'msg' => 'password_old，password_new，username can not be null', 'data' => null));
        }
    }

    // pc端注册，默认用户角色为商家，注册成功后直接登录
	public function actionRegister()
	{
		if(isset($_POST['username']) && isset($_POST['password']))
        {
            $newUser = new User;
            $newUser->username = $_POST['username'];
            $newUser->password = md5($_POST['password']);
            $newUser->role     = UserIdentity::USER_ROLE_MERCHANT;
            try{
                if ($newUser->save() == false) {
                    echo json_encode(array('errno' => -1, 'msg' => $newUser->errors, 'data' => null));
                }else{
		            $model=new LoginForm;
			        $model->attributes=$_POST;
                    $model->login();
                    echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => array('returnUrl' => Yii::app()->user->returnUrl)));
                }
            }catch(Exception $e){
                echo json_encode(array('errno' => -2, 'msg' => $e->getMessage(), 'data' => null));
            }
        }else{
            // 请求注册页
            $this->smarty->assign('title', '易人宜家 - 注册');
            $this->smarty->assign('username', '游客');
            $this->smarty->display('register.tpl');
        }
	}

    // PC端修改密码操作
	public function actionPasswd()
	{
		if(isset($_POST['password_old']) && isset($_POST['password_new']))
        {
            $user = User::model()->find(array(
                'select'=>'id,password,username,role,status',
                'condition'=>'username=:username',
                'params'=>array(':username'=>Yii::app()->user->name),
            ));
            if($user === null){
                 echo json_encode(array('errno' => -4, 'msg' => 'nonexistent user', 'data' => null));
            }else if(md5($_POST['password_old']) === $user->password){
                // 原密码正确
                $user->password = md5($_POST['password_new']);
                try{
                    if ($user->save()) {
                        echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => array('returnUrl' => Yii::app()->user->returnUrl)));
                    }else{
                        echo json_encode(array('errno' => -3, 'msg' => $user->errors, 'data' => null));
                    }
                }catch(Exception $e){
                    echo json_encode(array('errno' => -2, 'msg' => $e->getMessage(), 'data' => null));
                }
            }else{
                echo json_encode(array('errno' => -1, 'msg' => "password wrong", 'data' => null));
            }
        }else{
            $this->smarty->assign('title', '易人宜家 - 修改密码');
            $this->smarty->assign('username', Yii::app()->user->name);
            $this->smarty->display('passwd.tpl');          
        }
	}

    // PC端管理员设置用户密码操作
	public function actionSetPasswd()
	{
		if(isset($_POST['password']) && isset($_POST['id']))
        {
            $user = User::model()->find(array(
                'select'=>'id,password,username,role,status',
                'condition'=>'username=:username',
                'params'=>array(':username'=>Yii::app()->user->name),
            ));
            if(UserIdentity::USER_ROLE_ADMIN !== intval($user->role)){
                 echo json_encode(array('errno' => 1, 'msg' => 'you are not admin', 'data' => null));
                 Yii::app()->end();
            }
            $user = User::model()->findByPk(intval($_POST['id']));
            if($user === null){
                 echo json_encode(array('errno' => 2, 'msg' => 'nonexistent user', 'data' => null));
                 Yii::app()->end();
            }
            $user->password = md5($_POST['password']);
            try{
                if ($user->save()) {
                    echo json_encode(array('errno' => 0, 'msg' => 'success', 'data' => null));
                }else{
                    echo json_encode(array('errno' => 3, 'msg' => $user->errors, 'data' => null));
                }
            }catch(Exception $e){
                echo json_encode(array('errno' => 4, 'msg' => $e->getMessage(), 'data' => null));
            }
        }else{
            echo json_encode(array('errno' => 5, 'msg' => "password and id should not bu null", 'data' => null));
        }
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
