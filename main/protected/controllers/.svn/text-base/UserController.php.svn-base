<?php

class UserController extends Controller
{
    /**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

    public function __construct(){
        $this->title = '易人宜家 - 用户管理';
    }
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			//array('deny',  // deny all users
			//	'users'=>array('*'),
			//),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    //用户管理,展示用户列表
    public function actionManage() {
        // 校验权限
        $this->userModel = User::model()->find("username=:name",
             array(':name' => Yii::app()->user->name));
        if (UserIdentity::USER_ROLE_ADMIN !== intval($this->userModel->role)) {
            $this->redirect(Yii::app()->user->loginUrl);
        }
        
        //$users = array();
        // $usersObj = User::model()->findAll();
        // if (!empty($usersObj)) {
        //     foreach ($usersObj as $userObj) {
        //         $user = $userObj->attributes;
        //         $users[] = $user;
        //     }
        // }

        $this->smarty->assign('title',    $this->title);
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $this->userModel->role);
        //$this->smarty->assign('users',    $users);
        $this->smarty->assign('pageTpl',  'user_manage_admin.tpl');
        $this->smarty->display('index.tpl');
    }

    //用户管理,展示用户列表
    public function actionList() {
        // 校验权限
        $this->userModel = User::model()->find("username=:name",
            array(':name' => Yii::app()->user->name));
        if (UserIdentity::USER_ROLE_ADMIN !== intval($this->userModel->role)) {
            echo json_encode(array());
            return;
        }
        $start     = empty($_GET['iDisplayStart']) ? 0  : intval($_GET['iDisplayStart']);
        $start     = $start < 0 ? 0 : $start;
        $page_size = empty($_GET['iDisplayLength']) ? 10 : intval($_GET['iDisplayLength']);
        $page_size = $page_size <= 0 ? 10 : $page_size;
        $users     = array();
        $total     = 0;
        if(empty($_GET['sSearch'])){
        	$total = User::model()->count();
        	$usersObj = User::model()->findAll('1=1 limit :start,:page_size', 
            			array(':start'=>$start, ':page_size' => $page_size));        	
        }else{
        	$sSearch = $_GET['sSearch'];
        	$total = User::model()->count('username like :username',
        				array(':username' => "%$sSearch%"));
            $usersObj = User::model()->findAll('username like :username limit :start,:page_size', 
            			array(':username' => "%$sSearch%", ':start'=>$start, ':page_size' => $page_size));    	
        }
        if (!empty($usersObj)){
	        foreach ($usersObj as $userObj) {
	            $user = $userObj->attributes;
	            unset($user['password']);
	            $users[] = $user;
	        }
        }
        echo json_encode(array(
        	'sEcho'         => $_GET['sEcho'],
            'iTotalRecords' => $total,
            'iTotalDisplayRecords' => $total,//data.Count(),
            'aaData'   => $users,
        ));
    }    
}
