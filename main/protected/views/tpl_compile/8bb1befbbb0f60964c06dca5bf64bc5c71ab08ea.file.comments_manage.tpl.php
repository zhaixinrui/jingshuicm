<?php /* Smarty version Smarty-3.1.16, created on 2014-04-28 17:43:46
         compiled from "/root/jingshuicm/main/protected/views/tpl/comments_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153503036535e22d213c318-06421783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bb1befbbb0f60964c06dca5bf64bc5c71ab08ea' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/comments_manage.tpl',
      1 => 1398605286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153503036535e22d213c318-06421783',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'merchantComments' => 0,
    'merchantComment' => 0,
    'goodsComments' => 0,
    'goodsComment' => 0,
    'activityComments' => 0,
    'activityComment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_535e22d2190451_71613768',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535e22d2190451_71613768')) {function content_535e22d2190451_71613768($_smarty_tpl) {?><!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                评论管理
                <small>评论列表</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">评论管理</a> <span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">评论列表</a><span class="divider-last">&nbsp;</span>
                </li>
            </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->

    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid" >
        <div class="span12">
            <!-- BEGIN comments TABLE widget-->
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i>对本商店的评论</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-bordered"  id="sample_1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>评论内容</th>
                                <th>评论状态</th>
                                <th>提交时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['merchantComment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['merchantComment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['merchantComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mc']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['merchantComment']->key => $_smarty_tpl->tpl_vars['merchantComment']->value) {
$_smarty_tpl->tpl_vars['merchantComment']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mc']['iteration']++;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['mc']['iteration'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['merchantComment']->value['comment'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['merchantComment']->value['status'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['merchantComment']->value['createTime'];?>
</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END comments TABLE widget-->
            <!-- BEGIN comments TABLE widget-->
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i>对本商店商品的评论</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-bordered"  id="sample_2">
                        <thead>
                            <tr>
                                <th>#</th>
                               <th>商品名称</th>
                               <th>评论内容</th>
                               <th>评论状态</th>
                               <th>提交时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['goodsComment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['goodsComment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['goodsComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['gc']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['goodsComment']->key => $_smarty_tpl->tpl_vars['goodsComment']->value) {
$_smarty_tpl->tpl_vars['goodsComment']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['gc']['iteration']++;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['gc']['iteration'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['goods']['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['comment'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['status'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['createTime'];?>
</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END comments TABLE widget-->
            <!-- BEGIN comments TABLE widget-->
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i>对本商店活动的评论</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-bordered"  id="sample_3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>活动名称</th>
                                <th>评论内容</th>
                                <th>评论状态</th>
                                <th>提交时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['activityComment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['activityComment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activityComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ac']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['activityComment']->key => $_smarty_tpl->tpl_vars['activityComment']->value) {
$_smarty_tpl->tpl_vars['activityComment']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ac']['iteration']++;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['ac']['iteration'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activityComment']->value['activity']['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activityComment']->value['comment'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activityComment']->value['status'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activityComment']->value['createTime'];?>
</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END comments TABLE widget-->
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->
<?php }} ?>
