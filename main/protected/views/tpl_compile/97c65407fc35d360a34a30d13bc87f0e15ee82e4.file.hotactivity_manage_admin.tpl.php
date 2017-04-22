<?php /* Smarty version Smarty-3.1.16, created on 2014-08-13 10:36:19
         compiled from "/root/jingshuicm/main/protected/views/tpl/hotactivity_manage_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190660842653eacf234a2663-11066368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c65407fc35d360a34a30d13bc87f0e15ee82e4' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/hotactivity_manage_admin.tpl',
      1 => 1407897248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190660842653eacf234a2663-11066368',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hotActivities' => 0,
    'activity' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53eacf234d69b7_56165470',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53eacf234d69b7_56165470')) {function content_53eacf234d69b7_56165470($_smarty_tpl) {?>
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                热门活动管理
                <small>活动列表</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">热门活动管理</a> <span class="divider">&nbsp;</span>
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
                    <h4><i class="icon-reorder"></i>热门活动管理</h4>
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
                                <th>编号</th>
                                <th>活动类型</th>
                                <th>活动Id</th>
                                <th style="min-width:160px">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['activity'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['activity']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hotActivities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['activity']->key => $_smarty_tpl->tpl_vars['activity']->value) {
$_smarty_tpl->tpl_vars['activity']->_loop = true;
?>
                        <tr id="<?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['category'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['activity']->value['activityId'];?>
</td>
                            <td>
                                <a class="edit" href="javascript:;">设置活动ID</a> |
                                <a class="picManage" 
                                href="/main/index.php?r=hotActivity/picture&hotActivityId=<?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
">管理图片</a>
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

<script src="js/hotactivity_manage.js"></script>
<?php }} ?>
