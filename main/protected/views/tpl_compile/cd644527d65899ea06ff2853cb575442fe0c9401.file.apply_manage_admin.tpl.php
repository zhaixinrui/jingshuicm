<?php /* Smarty version Smarty-3.1.16, created on 2014-07-09 20:55:12
         compiled from "/root/jingshuicm/main/protected/views/tpl/apply_manage_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1371258614536e63bfad3ef6-24038586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd644527d65899ea06ff2853cb575442fe0c9401' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/apply_manage_admin.tpl',
      1 => 1404910509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1371258614536e63bfad3ef6-24038586',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_536e63bfb1f303_46040973',
  'variables' => 
  array (
    'applies' => 0,
    'apply' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e63bfb1f303_46040973')) {function content_536e63bfb1f303_46040973($_smarty_tpl) {?>
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                用户申请管理
                <small>申请列表</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">用户申请管理</a> <span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">申请列表</a><span class="divider-last">&nbsp;</span>
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
                    <h4><i class="icon-reorder"></i>申请列表</h4>
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
                    <table class="table table-striped table-bordered"  id="applyList_edit">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>申请人</th>
                                <th>申请理由</th>
                                <th>E-Mail</th>
                                <th>联系电话</th>
                                <th>状态</th>
                                <th>申请时间</th>
                                <th>审核时间</th>
                                <th style="min-width:30px">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['apply'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['apply']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['applies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ay']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['apply']->key => $_smarty_tpl->tpl_vars['apply']->value) {
$_smarty_tpl->tpl_vars['apply']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ay']['iteration']++;
?>
                        <tr id="<?php echo $_smarty_tpl->tpl_vars['apply']->value['id'];?>
">
                            <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['ay']['iteration'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['apply']->value['username'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['apply']->value['content'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['apply']->value['email'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['apply']->value['phone'];?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['apply']->value['status']==0) {?>
                            <td>未通过</td>
                            <?php } elseif ($_smarty_tpl->tpl_vars['apply']->value['status']==1) {?>
                            <td>通过</td>
                            <?php }?>
                            <td><?php echo $_smarty_tpl->tpl_vars['apply']->value['createTime'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['apply']->value['updateTime'];?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['apply']->value['status']==0) {?>
                            <td><a class="commitPass" userId="<?php echo $_smarty_tpl->tpl_vars['apply']->value['userId'];?>
" href="javascript:;">通过</a></td>
                            <?php } else { ?>
                            <td><a class="commitCancel" userId="<?php echo $_smarty_tpl->tpl_vars['apply']->value['userId'];?>
" href="javascript:;">取消</a></td>
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

<script src="js/apply-manage.js"></script>
<?php }} ?>
