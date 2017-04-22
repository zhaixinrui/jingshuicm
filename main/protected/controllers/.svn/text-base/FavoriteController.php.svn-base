<?php

class FavoriteController extends Controller
{

    private $allType;
    private $type;
    private $id;

    public function __construct()
    {
        $this->allType = array('Activity', 'Goods', 'Merchant');
    }

    // 检查类型是否合法
    private function isTypeLegal($type){
        return in_array($type, $this->allType);
    }

    // 检查用户数据的type和id是否合法
    private function checkInput(){
        if(!isset($_POST['type']) || !isset($_POST['id'])){
            echo json_encode(array('errno' => 3, 'msg' => "parameter error: type and id cannot be null", 'data' => $_POST)); 
            Yii::app()->end();            
        }
        $this->type = $_POST['type'];
        $this->id   = $_POST['id'];
        if(!$this->isTypeLegal($this->type)){
            echo json_encode(array('errno' => 8, 'msg' => "parameter error: type should be 'Activity' or 'Goods' or 'Merchant'", 'data' => $_POST)); 
            Yii::app()->end();            
        }
    }

    // 用户添加收藏
    public function actionFavorite(){
        $this->initMobileUserInfo();
        $this->checkInput();
        // 检查是否已经收藏过
        $favoriteModel = Favorite::model()->find('userId=:userId and foreignKey=:id and type=:type', array(':userId' => $this->userModel->id, ':id' => $this->id, ':type' => $this->type));
        if($favoriteModel){
            echo json_encode(array('errno' => 9, 'msg' => "you have favorited before", 'data' => $_POST)); 
            Yii::app()->end();               
        }
        // 检查被收藏对象是否存在
        if(null === $this->getModelAttributes($this->type, $this->id)){
            echo json_encode(array('errno' => 10, 'msg' => "the {$this->type} you favorite does not exsit", 'data' => $_POST)); 
            Yii::app()->end();    
        }
        // 开始添加
        $favoriteModel = new Favorite();
        unset($_POST['username']);
        $favoriteModel->userId = $this->userModel->id;
        $favoriteModel->type   = $this->type;
        $favoriteModel->foreignKey = $this->id;
        try{
            if($favoriteModel->save()){
                echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $favoriteModel->id)); 
            }else{
                echo json_encode(array('errno' => 5, 'msg' => $favoriteModel->errors, 'data' => $_POST)); 
            }
        }catch(Exception $e){
            echo json_encode(array('errno' => 6, 'msg' => $e, 'data' => $_POST)); 
        }
    }
    
    // 用户取消收藏
    public function actionCancelFavorite(){
        $this->initMobileUserInfo();
        $this->checkInput();
        Favorite::model()->deleteAll('userId=:userId and foreignKey=:id and type=:type', array(':userId' => $this->userModel->id, ':id' => $this->id, ':type' => $this->type));
        echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => null)); 
    }

    // 取到被收藏的对象的属性
    private function getModelAttributes($type, $id){
        if(!$this->isTypeLegal($type)){
            return null;
        }
        $model = $type::model()->find('id=:id',array(':id' => $id));
        if($model){
            return $model->attributes;
        }else{
            return null;
        }
    }

    // 查询用户的收藏
    public function actionGetFavorites(){
        $this->initMobileUserInfo();
        if(empty($_GET['type'])){
            echo json_encode(array('errno' => 3, 'msg' => "parameter error: type cannot be null", 'data' => $_GET)); 
            Yii::app()->end();               
        }
        $type = $_GET['type'];
        if(!$this->isTypeLegal($type)){
            echo json_encode(array('errno' => 8, 'msg' => "parameter error: type should be 'Activity' or 'Goods' or 'Merchant'", 'data' => $_POST)); 
            Yii::app()->end();            
        }  
        $page_index = empty($_GET['page_index']) ? 1  : intval($_GET['page_index']);
        $page_size  = empty($_GET['page_size'])  ? 10 : intval($_GET['page_size']);
        $data       = array();
        $total = Favorite::model()->count('userId=:userId and type=:type', 
            array(':userId' => $_GET['userId'], ':type' => $type));
        $start = $page_index*$page_size-$page_size;        
        $favoriteModels = Favorite::model()->findAll('userId=:userId and type=:type limit :start,:page_size', 
            array(':userId' => $_GET['userId'], ':type' => $type, ':start'=>$start, ':page_size' => $page_size));
        foreach ($favoriteModels as $favoriteModel) {
            $favorite = $this->getModelAttributes($type, $favoriteModel->foreignKey);
            if($favorite)
                $favorite['picUrls'] = $this->getPicUrls($type, $favorite['id']);
                $data[] = $favorite;
        }
        $result = array(
            'errno' => 0,
            'msg'   => "success",
            'data'  => array(
                'total'     => $total,
                'favorites' => $data,
            ),
        );
        echo json_encode($result);  
    }
}
