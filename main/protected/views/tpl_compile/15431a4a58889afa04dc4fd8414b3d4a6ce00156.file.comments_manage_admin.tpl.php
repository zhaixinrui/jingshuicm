<?php /* Smarty version Smarty-3.1.16, created on 2014-07-09 20:54:11
         compiled from "/root/jingshuicm/main/protected/views/tpl/comments_manage_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1695834245362deab470e15-69327866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15431a4a58889afa04dc4fd8414b3d4a6ce00156' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/comments_manage_admin.tpl',
      1 => 1404910443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1695834245362deab470e15-69327866',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5362deab4db002_56416622',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5362deab4db002_56416622')) {function content_5362deab4db002_56416622($_smarty_tpl) {?><!-- BEGIN PAGE CONTAINER-->
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
                    <h4><i class="icon-reorder"></i>对商店的评论</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                     <div class="alert alert-error hide">
                        <a class="close" data-dismiss="alert" href="#">×</a>
                        <div id="error-text"> </div>
                    </div>
                    <table class="table table-striped table-bordered"  id="merchantCommentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>商家名称</th>
                                <th>商家级别</th>
                                <th>评论内容</th>
                                <th>评论状态</th>
                                <th>提交时间</th>
                                <th>审核时间</th>
                                <th style="min-width:60px">操作</th>
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
                        <tr id="<?php echo $_smarty_tpl->tpl_vars['merchantComment']->value['id'];?>
">
                            <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['mc']['iteration'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['merchantComment']->value['merchant']['name'];?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['merchantComment']->value['merchant']['level']==0) {?>
                            <td>未付费会员</td>
                            <?php } elseif ($_smarty_tpl->tpl_vars['merchantComment']->value['merchant']['level']==1) {?>
                            <td>一级会员</td>
                            <?php } elseif ($_smarty_tpl->tpl_vars['merchantComment']->value['merchant']['level']==2) {?>
                            <td>二级会员</td>
                            <?php }?>
                            <td><?php echo $_smarty_tpl->tpl_vars['merchantComment']->value['comment'];?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['merchantComment']->value['status']==0) {?>
                            <td>未通过</td>
                            <?php } elseif ($_smarty_tpl->tpl_vars['merchantComment']->value['status']==1) {?>
                            <td>通过</td>
                            <?php }?>
                            <td><?php echo $_smarty_tpl->tpl_vars['merchantComment']->value['createTime'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['merchantComment']->value['updateTime'];?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['merchantComment']->value['status']==0) {?>
                            <td><a class="commitPass" id="<?php echo $_smarty_tpl->tpl_vars['merchantComment']->value['id'];?>
" 
                                table="merchantCommentTable" href="javascript:;">通过</a></td>
                            <?php } else { ?>
                            <td><a class="commitCancel" id="<?php echo $_smarty_tpl->tpl_vars['merchantComment']->value['id'];?>
" 
                                table="merchantCommentTable" href="javascript:;">取消通过</a></td>
                            <?php }?>
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
                    <h4><i class="icon-reorder"></i>对商店商品的评论</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                   <div class="alert alert-error hide">
                        <a class="close" data-dismiss="alert" href="#">×</a>
                        <div id="error-text"> </div>
                    </div>
                    <table class="table table-striped table-bordered"  id="goodsCommentTable">
                        <thead>
                            <tr>
                               <th>#</th>
                               <th>商品名称</th>
                               <th>所属商店</th>
                               <th>评论内容</th>
                               <th>评论状态</th>
                               <th>提交时间</th>
                               <th>审核时间</th>
                               <th style="min-width:60px">操作</th>
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
                        <tr id="<?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['id'];?>
">
                            <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['gc']['iteration'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['goods']['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['merchant']['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['comment'];?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['goodsComment']->value['status']==0) {?>
                            <td>未通过</td>
                            <?php } elseif ($_smarty_tpl->tpl_vars['goodsComment']->value['status']==1) {?>
                            <td>通过</td>
                            <?php }?>
                            <td><?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['createTime'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['updateTime'];?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['goodsComment']->value['status']==0) {?>
                            <td><a class="commitPass" id="<?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['id'];?>
" 
                                table="goodsCommentTable" href="javascript:;">通过</a></td>
                            <?php } else { ?>
                            <td><a class="commitCancel" id="<?php echo $_smarty_tpl->tpl_vars['goodsComment']->value['id'];?>
" 
                                table="goodsCommentTable" href="javascript:;">取消通过</a></td>
                            <?php }?>
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
                    <h4><i class="icon-reorder"></i>对商店活动的评论</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <div class="alert alert-error hide">
                        <a class="close" data-dismiss="alert" href="#">×</a>
                        <div id="error-text"> </div>
                    </div>
                    <table class="table table-striped table-bordered"  id="activityCommentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>活动名称</th>
                                <th>所属商店</th>
                                <th>评论内容</th>
                                <th>评论状态</th>
                                <th>提交时间</th>
                                <th>审核时间</th>
                                <th style="min-width:60px">操作</th>
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
                        <tr id="<?php echo $_smarty_tpl->tpl_vars['activityComment']->value['id'];?>
">
                            <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['ac']['iteration'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activityComment']->value['activity']['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activityComment']->value['merchant']['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activityComment']->value['comment'];?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['activityComment']->value['status']==0) {?>
                            <td>未通过</td>
                            <?php } elseif ($_smarty_tpl->tpl_vars['activityComment']->value['status']==1) {?>
                            <td>通过</td>
                            <?php }?>
                            <td><?php echo $_smarty_tpl->tpl_vars['activityComment']->value['createTime'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activityComment']->value['updateTime'];?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['activityComment']->value['status']==0) {?>
                            <td><a class="commitPass" id="<?php echo $_smarty_tpl->tpl_vars['activityComment']->value['id'];?>
" 
                                table="activityCommentTable" href="javascript:;">通过</a></td>
                            <?php } else { ?>
                            <td><a class="commitCancel" id="<?php echo $_smarty_tpl->tpl_vars['activityComment']->value['id'];?>
" 
                                table="activityCommentTable" href="javascript:;">取消通过</a></td>
                            <?php }?>
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

<script src="js/comment-manage.js"></script>
<?php }} ?>
