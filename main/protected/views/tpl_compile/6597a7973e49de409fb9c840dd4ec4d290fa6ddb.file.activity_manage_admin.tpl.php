<?php /* Smarty version Smarty-3.1.16, created on 2014-08-13 19:39:23
         compiled from "/root/jingshuicm/main/protected/views/tpl/activity_manage_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12823358035374e5d5d012a4-77369390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6597a7973e49de409fb9c840dd4ec4d290fa6ddb' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/activity_manage_admin.tpl',
      1 => 1407929938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12823358035374e5d5d012a4-77369390',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5374e5d5d45bd7_25519795',
  'variables' => 
  array (
    'activities' => 0,
    'activity' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5374e5d5d45bd7_25519795')) {function content_5374e5d5d45bd7_25519795($_smarty_tpl) {?>
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                活动管理
                <small>活动列表</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">活动管理</a> <span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">活动列表</a><span class="divider-last">&nbsp;</span>
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
                    <h4><i class="icon-reorder"></i>活动管理</h4>
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

                    <table class="table table-striped table-bordered"  id="activitylist_editable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>活动名称</th>
                                <th>活动类型</th>
                                <th>发起商家</th>
                                <th>联系电话</th>
                                <th>有效时间</th>
                                <th>创建时间</th>
                                <th style="min-width:60px">推广费用</th>
                                <th style="min-width:75px">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['activity'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['activity']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['activity']->key => $_smarty_tpl->tpl_vars['activity']->value) {
$_smarty_tpl->tpl_vars['activity']->_loop = true;
?>
                        <tr id="<?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['merchant']['category'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['merchant']['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['phone'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['period'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['createTime'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['promotionExpenses'];?>
</td>
                            <td><a class="edit" href="javascript:;">设置推广费</a></td>
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

<script src="js/activity-manage.js"></script>
<?php }} ?>
