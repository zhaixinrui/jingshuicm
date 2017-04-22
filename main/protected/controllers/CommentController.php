<?php

class CommentController extends Controller
{
    private $merchantModel;
    private $allType;
    private $id;
    private $type;

    public function __construct(){
        $this->title = '易人宜家 - 评论管理';
        $this->allType = array('Activity', 'Goods', 'Merchant');
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
                    if(empty($this->merchantModel)){
                        // 还没创建店铺，显示错误页
                        $this->smarty->showErrPage($this->title, '对不起，您还没有开通店铺！', $this->userModel->role);
                    }   
                } else {
                    $this->merchantModel = null;
                }
            }
        }
    }
    
    // 检查type类型是否合法
    private function isTypeLegal($type) {
       return in_array($type, $this->allType);
    }

    // 取到被评论的对象的属性
    private function getModelAttributes($type, $id){
        if (!$this->isTypeLegal($type)) {
            return null;
        }
        $model = $type::model()->find('id=:id',array(':id' => $id));
        if ($model) {
            return $model->attributes;
        } else {
            return null;
        }   
    }

    /** 
      *  提交评论  INPUT
      *  $_POST = array(
      *    'type'     => ('Activity', 'Goods', 'Merchant')
      *    'id'       => xxx
      *    'comment'  => string
      *    'userId'   => xxx
      *    'username' => string
      *    'merchantId' => xxx
      *  );
     **/
    public function actionAddComment() {
        //校验权限
        $this->initMobileUserInfo();

        //输入数据检查
        if (empty($_POST['type']) 
            || empty($_POST['comment'])
            || empty($_POST['id']) 
            || empty($_POST['merchantId'])) 
        {
            $result = array(
                'errno' => 3,
                'msg' => "parameter error: type, comment, id(foreignKey), merchantId cannot be null",
                'data' => $_POST,
            );
            echo json_encode($result);
            Yii::app()->end();    
        }
        $this->id   = $_POST['id'];
        $this->type = $_POST['type'];
        $queryParam =  array(
            ':userId' => $this->userModel->id,
            ':id'     => $this->id,
            ':type'   => $this->type,
        );
        $commentModel = Comment::model()->find('userId=:userId and foreignKey=:id and type=:type', $queryParam); 
        if ($commentModel) {
            $result = array(
                'errno' => 4,
                'msg'   => "you have comment this before", 
                'data'  => $_POST,
            );
            echo json_encode($result);
            Yii::app()->end();
        }

        // 检查被评论对象是否存在
        if (null === $this->getModelAttributes($this->type, $this->id)) {
            $result = array(
                'errno' => 5,
                'msg' => "the {$this->type} you comment does not exsit",
                'data' => $_POST,
            );
            echo json_encode($result);
            Yii::app()->end();
        }

        $commentModel = new Comment();
        $commentModel->attributes = $_POST;
        $commentModel->foreignKey = $this->id;
        $commentModel->userId = $this->userModel->id;
        $result = $commentModel->save();
        if (!$result) {
            $result = array(
                'errno' => 6, 
                'msg' => "comment commit failed"
            );
            echo json_encode($result);
            return;
        }
        
        $result = array(
            'errno' => 0, 
            'msg' => "comment commit success", 
            'data' => $commentModel->id
        );
        echo json_encode($result); 
    }


    /** 
      *  根据类型查询已经通过的评论  INPUT
      *  $_GET = array(
      *    'type'       => ('Activity', 'Goods', 'Merchant')
      *    'id'         => xxx
      *    'username'   => string
      *    'userId'     => xxx
      *    'page_index' => xxx  (非必须)
      *    'page_size'  => xxx （非必须）
      *  );
     **/
    public function actionGetComments() {
        // 校验权限
        $this->initMobileUserInfo();
        //输入数据检查
        if (empty($_GET['type']) || empty($_GET['id'])) {
            $result = array(
                'errno' => 3,
                'msg' => "parameter error: type and id cannot be null",
                'data' => $_GET,
            );
            echo json_encode($result); 
            Yii::app()->end();
        }
        $type = $_GET['type'];
        $id   = $_GET['id'];
        if (!$this->isTypeLegal($type)) {
            $result = array(
                'errno' => 8,
                'msg' => "parameter error: type should be 'Activity' or 'Goods' or 'Merchant'",
                'data' => $_POST,
            );
            echo json_encode($result); 
            Yii::app()->end();            
        }  
        
        $page_index = empty($_GET['page_index']) ? 1  : intval($_GET['page_index']);
        $page_size  = empty($_GET['page_size'])  ? 10 : intval($_GET['page_size']);
        $data       = array();
        $total = Comment::model()->count('foreignKey=:id and type=:type and status=1', 
            array(':id' => $id, ':type' => $type));
        $start = $page_index * $page_size - $page_size; 
        $commentModels = Comment::model()->findAll('foreignKey=:id and type=:type and status=1 order by createTime DESC limit :start,:page_size', 
            array(':id' => $id, ':type' => $type, ':start'=>$start, ':page_size' => $page_size));
        foreach ($commentModels as $commentModel) {
            $comment = $commentModel->attributes;
            $user = User::model()->find('id=:userId',array(':userId' => $comment['userId']));
            if (!empty($user)) {
                $user = $user->attributes;
                $comment['username'] = $user['username']; 
            }
            unset($comment['userId']);
            $data[] = $comment;
        }
        $result = array(
            'errno' => 0,
            'msg'   => "success",
            'data'  => array(
                'total'    => $total,
                'comments' => $data,
            ),
        );
        echo json_encode($result);  
    }

    /** 
      *  用户查询自己提交的评论  INPUT
      *  $_GET = array(
      *    'username'   => string
      *    'userId'     => xxx
      *    'page_index' => xxx  (非必须)
      *    'page_size'  => xxx （非必须）
      *  );
     **/
    public function actionGetMyComments() {
        // 校验权限
        $this->initMobileUserInfo();
        $page_index = empty($_GET['page_index']) ? 1  : intval($_GET['page_index']);
        $page_size  = empty($_GET['page_size'])  ? 10 : intval($_GET['page_size']);
        $data       = array();
        $total = Comment::model()->count('userId=:userId', 
            array(':userId' => $_GET['userId']));
        $start = $page_index*$page_size-$page_size;        
        $commentModels = Comment::model()->findAll('userId=:userId order by createTime DESC limit :start,:page_size', 
            array(':userId' => $_GET['userId'], ':start'=>$start, ':page_size' => $page_size));
        foreach ($commentModels as $commentModel) {
            $comment = $this->getModelAttributes($commentModel->type, $commentModel->foreignKey);
            if ($comment) {
                $data[] = array('comment' => $commentModel->attributes, 'commented' => $comment);
            }
        }
        $result = array(
            'errno' => 0,
            'msg'   => "success",
            'data'  => array(
                'total'    => $total,
                'comments' => $data,
            ),
        );
        echo json_encode($result); 
    }

    //审核评论
    public function actionAuditComment() {
        //校验权限
        $this->initUserInfo();
        if (UserIdentity::USER_ROLE_ADMIN !== intval($this->userModel->role)) {
            echo json_encode(array('errno' => 3, 'msg' => "UR dangerous user"));
            return;
        }
        $id     = intval($_POST['id']); 
        $status = intval($_POST['status']);
        if (!isset($status) || !isset($id)) {
            echo json_encode(array('errno' => 1, 'msg' => "param error, id and status can no be null"));
            return;
        }
        $commentModel = Comment::model()->findByPk($id);
        if (empty($commentModel)) {
            echo json_encode(array('errno' => 2, 'msg' => "comment did not exist"));
            return;
        }
        $commentModel->status = $status;
        $commentModel->updateTime = date('Y-m-d H:i:s',time());
        $result = $commentModel->save();
        if (!$result) {
            echo json_encode(array('errno' => 4, 'msg' => "comment audit failed"));
            return;
        }
        
        echo json_encode(array('errno' => 0, 'msg' => "success")); 
    }


    //管理商家评论,展示评论列表
    public function actionManage()
    {
        // 校验权限
        $this->initUserInfo();
         
        $goodsComments    = array();
        $activityComments = array();
        $merchantComments = array();

        if (null === $this->merchantModel) {
            // 调到管理员界面
            $this->redirect("/main/index.php?r=comment/manageadmin");
        }
        // 找到属于本店铺的商品的评论
        $goodsCommentsObj = Comment::model()->findAll("merchantId=:merchantId and type='Goods'", 
            array(':merchantId' => $this->merchantModel->id));
        if (!empty($goodsCommentsObj)) {
            foreach ($goodsCommentsObj as $goodsCommentObj) {
                $goodsComment = $goodsCommentObj->attributes;
                $goods = Goods::model()->find('id=:goodsId',
                    array(':goodsId' => $goodsComment['foreignKey']));
                $goodsComment['goods'] = $goods->attributes;
                $goodsComments[] = $goodsComment;
            }
        }
        // 找到属于本店铺活动的评论
        $activityCommentsObj = Comment::model()->findAll("merchantId=:merchantId and type='Activity'",
            array(':merchantId' => $this->merchantModel->id));
        if (!empty($activityCommentsObj)) {
            foreach ($activityCommentsObj as $activityCommentObj) {
                $activityComment = $activityCommentObj->attributes;
                $activity = Activity::model()->find('id=:activityId',
                    array(':activityId' => $activityComment['foreignKey']));
                $activityComment['activity'] = $activity->attributes;
                $activityComments[] = $activityComment;
            }
        }

        // 找到属于本店铺本身的评论
        $merchantCommentsObj = Comment::model()->findAll("foreignKey=:merchantId and type='Merchant'",
            array(':merchantId' => $this->merchantModel->id));
        if (!empty($merchantCommentsObj)) {
            foreach ($merchantCommentsObj as $merchantCommentObj) {
                $merchantComment = $merchantCommentObj->attributes;
                $merchantComments[] = $merchantComment;
            }
        }
         
        // 渲染界面
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $this->userModel->role);
        $this->smarty->assign('pageTpl', 'comments_manage.tpl');
        $this->smarty->assign('goodsComments',    $goodsComments);
        $this->smarty->assign('activityComments', $activityComments);
        $this->smarty->assign('merchantComments', $merchantComments);
        $this->smarty->display('index.tpl');
    }

    //管理员评论管理,展示评论列表
    public function actionManageAdmin()
    {
        // 校验权限
        $this->initUserInfo();
        
        if (null !== $this->merchantModel) {
            //商家不能查看
            $this->smarty->showErrPage($this->title, '您无权限查看此内容！', $this->userModel->role);
        }

        $goodsComments    = array();
        $activityComments = array();
        $merchantComments = array();

        // 找到所有店铺的商品的评论
        $goodsCommentsObj = Comment::model()->findAll("type='Goods'"); 
        if (!empty($goodsCommentsObj)) {
            foreach ($goodsCommentsObj as $goodsCommentObj) {
                $goodsComment = $goodsCommentObj->attributes;
                $goods = Goods::model()->find('id=:goodsId',
                    array(':goodsId' => $goodsComment['foreignKey']));
                $merchant = Merchant::model()->find('id=:merchantId',
                    array(':merchantId'=> $goodsComment['merchantId']));
                //如果商品或者商家不存在则跳过这条无效评论
                if(!$goods || !$merchant) continue;
                $goodsComment['goods']    = $goods->attributes;
                $goodsComment['merchant'] = $merchant->attributes;
                $goodsComments[] = $goodsComment;
            }
        }
        // 找到所有店铺活动的评论
        $activityCommentsObj = Comment::model()->findAll("type='Activity'");
        if (!empty($activityCommentsObj)) {
            foreach ($activityCommentsObj as $activityCommentObj) {
                $activityComment = $activityCommentObj->attributes;
                $activity = Activity::model()->find('id=:activityId',
                    array(':activityId' => $activityComment['foreignKey']));
                $merchant = Merchant::model()->find('id=:merchantId',
                    array(':merchantId'=> $activityComment['merchantId']));
                //如果活动或者商家不存在则跳过这条无效评论
                if(!$activity || !$merchant) continue;                
                $activityComment['activity'] = $activity->attributes;
                $activityComment['merchant'] = $merchant->attributes; 
                $activityComments[] = $activityComment;
            }
        }

        // 找到所有关于店铺本身的评论
        $merchantCommentsObj = Comment::model()->findAll("type='Merchant'");
        if (!empty($merchantCommentsObj)) {
            foreach ($merchantCommentsObj as $merchantCommentObj) {
                $merchantComment = $merchantCommentObj->attributes;
                $merchant = Merchant::model()->find('id=:merchantId',
                    array(':merchantId'=> $merchantComment['merchantId']));
                //如果商家不存在则跳过这条无效评论
                if(!$merchant) continue;                
                $merchantComment['merchant'] = $merchant->attributes;
                $merchantComments[] = $merchantComment;
            }
        }
        
        // 渲染界面
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $this->userModel->role);
        $this->smarty->assign('pageTpl', 'comments_manage_admin.tpl');
        $this->smarty->assign('goodsComments',    $goodsComments);
        $this->smarty->assign('activityComments', $activityComments);
        $this->smarty->assign('merchantComments', $merchantComments);
        $this->smarty->display('index.tpl');
    }
}
