<?php

class OrderGoodsController extends Controller
{
    // 用户订购商品
    public function actionOrder(){
        $goodsModel = Goods::model()->find('id=:id', array(':id' => $_POST['goodsId']));
        if(!$goodsModel){
            echo json_encode(array('errno' => 3, 'msg' => "goods does not exsit", 'data' => $_POST)); 
            Yii::app()->end();
        }
        $orderGoodsModel = OrderGoods::model()->find('goodsId=:goodsId and userId=:userId', array(':goodsId' => $_POST['goodsId'], ':userId' => $_POST['userId']));
        if($orderGoodsModel){
            echo json_encode(array('errno' => 4, 'msg' => "has ordered before", 'data' => $orderGoodsModel->id)); 
            Yii::app()->end();
        }
        $orderGoodsModel = new OrderGoods;
        unset($_POST['username']);
        $orderGoodsModel->attributes = $_POST;
        $orderGoodsModel->status = 0;
        try{
            if($orderGoodsModel->save()){
                echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $orderGoodsModel->id)); 
            }else{
                echo json_encode(array('errno' => 5, 'msg' => $orderGoodsModel->errors, 'data' => $_POST)); 
            }
        }catch(Exception $e){
            echo json_encode(array('errno' => 6, 'msg' => $e, 'data' => $_POST)); 
        }
    }    

    // 查询用户已经订购的商品
    public function actionGetOrderGoods(){
        $this->initMobileUserInfo();
        $data = array();
        $page_index = empty($_GET['page_index']) ? 1  : intval($_GET['page_index']);
        $page_size  = empty($_GET['page_size'])  ? 10 : intval($_GET['page_size']);
        $total = OrderGoods::model()->count('userId=:userId', array(':userId' => $_GET['userId']));
        $start = $page_index*$page_size-$page_size;        
        $orderGoodsModels = OrderGoods::model()->findAll('userId=:userId limit :start,:page_size', 
            array(':userId' => $_GET['userId'], ':start'=>$start, ':page_size' => $page_size));
        foreach ($orderGoodsModels as $orderGoodsModel) {
            $good = $orderGoodsModel->goods->attributes;
            $good['picUrls'] = $this->getPicUrls('Goods', $orderGoodsModel->goods->id);
            $good['merchant'] = $orderGoodsModel->goods->merchant->attributes;
            $data[] = $good;
        }
        $result = array(
            'errno' => 0,
            'msg'   => "success",
            'data'  => array(
                'total'    => $total,
                'orderGoods' => $data,
            ),
        );
        echo json_encode($result);        
    }    

}
