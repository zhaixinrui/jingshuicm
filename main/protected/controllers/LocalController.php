<?php

class LocalController extends Controller
{
    private $_ret ;
    private $_myLbs;

    public function __construct(){
        // 默认返回值
        $this->_ret = array('errno' => ErrorNo::UNKOWN_ERROR, 'msg' => 'unknown error', 'data' => array());
        $this->_myLbs = new MyLbs();
    }

    // 首屏的查找，只需要坐标和当前城市，列出十公里以内的商家
    public function actionNearby()
    {
        // 输入坐标进行查询，query为可选字段，
        if (isset($_GET['location'])){
            // $query = isset($_GET['query']) ? $_GET['query'] : null;
            // $result = $this->_myLbs->searchNearby($_GET['location'], $query);
            $result = $this->_myLbs->searchNearby($_GET);
            echo json_encode($result);
        }else{
            echo json_encode(array('errno' => ErrorNo::PARAMETER_ERROR, 'msg' => 'parameter error', 'data' => array()));
        }
    }

    public function actionRegion()
    {
        // 输入城市进行查询，query为可选字段，
        if (isset($_GET['region'])){
            $_GET['region'] = trim($_GET['region'], '=');
            $result = $this->_myLbs->searchRegion($_GET);
            echo json_encode($result); 
        }else{
            echo json_encode(array('errno' => ErrorNo::PARAMETER_ERROR, 'msg' => 'parameter error', 'data' => array()));
        }
    }

    public function actionAddMerchant()
    {
        $arrData = array(
            "merchantId" => 1024,
            "address"    => "完全不知道",
            "title"      => "未知title",
            "latitude"   => "21.2342",
            "longitude"  => "123.23234",
            "coord_type" => "1",                
            );
        $result = $this->_myLbs->addMerchant($arrData);
        echo json_encode($result);
    }    
}
?>
