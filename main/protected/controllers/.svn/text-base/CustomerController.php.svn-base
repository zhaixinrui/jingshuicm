<?php

class CustomerController extends Controller
{
    private $merchantModel;
    // public function actions()
    // {
    //     return array(
    //         'index'=>'application.controllers.customer.IndexAction',
    //         );
    // }

    // 列出参加活动的客户信息
    public function actionManage()
    {
        $this->title = '易人宜家 - 客户管理';
        if('Guest' === Yii::app()->user->name){
            // 游客需要登录
            $this->redirect(Yii::app()->user->loginUrl);
        }else{
            $this->userModel = User::model()->find("username=:name", array(':name' => Yii::app()->user->name)); 
            if(UserIdentity::USER_ROLE_MERCHANT !== intval($this->userModel->role)){
                // 用户角色非商家的跳转到登录
                $this->redirect(Yii::app()->user->loginUrl);
            }else{
                $this->merchantModel = Merchant::model()->find("userId=:id", array(':id' => $this->userModel->id));
                if(empty($this->merchantModel)){
                    // 还没创建店铺，显示错误页
                    $this->smarty->showErrPage($this->title, '对不起，您还没有开通店铺！', $this->userModel->role);
                }
            }
        }       
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', UserIdentity::USER_ROLE_MERCHANT);            
        // 找到参加活动的用户
        $joinActivitys = array();
        foreach ($this->merchantModel->activities as $activity) {
            foreach ($activity->joinActivities as $joinActivity) {
                $joinActivitys[] = $joinActivity->attributes;
            }
        }
        // 找到订购本店铺商品的用户
        $orderGoods = array();
        foreach ($this->merchantModel->goods as $good) {
            foreach ($good->orderGoods as $orderGood) {
                $arr = $orderGood->attributes;
                $arr['goodsName'] = $good->name;
                $orderGoods[] = $arr;
            }
        }        
        $this->smarty->assign('joinActivitys', $joinActivitys);
        $this->smarty->assign('orderGoods', $orderGoods);
        $this->smarty->assign('pageTpl', 'customer_manage.tpl');                          
        $this->smarty->display('index.tpl'); 
    }

}
