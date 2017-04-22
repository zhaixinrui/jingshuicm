<?php

class JoinActivityController extends Controller
{
    // 用户参加活动
    public function actionJoin(){
        $this->initMobileUserInfo();
        $activityModel = Activity::model()->find('id=:id', array(':id' => $_POST['activityId']));
        if(!$activityModel){
            echo json_encode(array('errno' => 3, 'msg' => "activity does not exsit", 'data' => $_POST)); 
            Yii::app()->end();
        }
        $joinActivityModel = JoinActivity::model()->find('activityId=:activityId and userId=:userId', array(':activityId' => $_POST['activityId'], ':userId' => $_POST['userId']));
        if($joinActivityModel){
            echo json_encode(array('errno' => 4, 'msg' => "has joined before", 'data' => $joinActivityModel->id)); 
            Yii::app()->end();
        }
        $joinActivityModel = new JoinActivity;
        unset($_POST['username']);
        $joinActivityModel->attributes = $_POST;
        $joinActivityModel->status = 0;
        try{
            if($joinActivityModel->save()){
                echo json_encode(array('errno' => 0, 'msg' => "success", 'data' => $joinActivityModel->id)); 
            }else{
                echo json_encode(array('errno' => 5, 'msg' => $joinActivityModel->errors, 'data' => $_POST)); 
            }
        }catch(Exception $e){
            echo json_encode(array('errno' => 6, 'msg' => $e, 'data' => $_POST)); 
        }
    }
    
    // 查询用户已经参加的活动
    public function actionGetJoinActivities(){
        $this->initMobileUserInfo();
        $data = array();
        $page_index = empty($_GET['page_index']) ? 1  : intval($_GET['page_index']);
        $page_size  = empty($_GET['page_size'])  ? 10 : intval($_GET['page_size']);
        $total = JoinActivity::model()->count('userId=:userId', array(':userId' => $_GET['userId']));
        $start = $page_index*$page_size-$page_size;        
        $joinActivityModels = JoinActivity::model()->findAll('userId=:userId limit :start,:page_size', 
            array(':userId' => $_GET['userId'], ':start'=>$start, ':page_size' => $page_size));
        foreach ($joinActivityModels as $joinActivityModel) {
            $activityModel = $joinActivityModel->activity;
            $activity = $activityModel->attributes;
            $activity['picUrls'] = $this->getPicUrls('Activity', $activity['id']);
            $activity['merchant'] = $activityModel->merchant->attributes;
            $data[] = $activity;
        }
        $result = array(
            'errno' => 0,
            'msg'   => "success",
            'data'  => array(
                'total'    => $total,
                'joinActivities' => $data,
            ),
        );
        echo json_encode($result);
    }
}
