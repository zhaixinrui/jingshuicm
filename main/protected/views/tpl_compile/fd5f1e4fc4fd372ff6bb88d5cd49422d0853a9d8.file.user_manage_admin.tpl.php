<?php /* Smarty version Smarty-3.1.16, created on 2014-07-15 10:24:48
         compiled from "/root/jingshuicm/main/protected/views/tpl/user_manage_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6786588765362de7c12f497-89776597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd5f1e4fc4fd372ff6bb88d5cd49422d0853a9d8' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/user_manage_admin.tpl',
      1 => 1405391054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6786588765362de7c12f497-89776597',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5362de7c163720_23797237',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5362de7c163720_23797237')) {function content_5362de7c163720_23797237($_smarty_tpl) {?><!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                用户管理
                <small>用户列表</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">用户管理</a> <span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">用户列表</a><span class="divider-last">&nbsp;</span>
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
                    <table class="table table-striped table-bordered"  id="user_editable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>用户名</th>
                                <th>昵称</th>
                                <th>电话</th>
                                <th>邮箱</th>
                                <th>角色</th>
                                <th>状态</th>
                                <th>注册时间</th>
                                <th>密码</th>
                                <th style="min-width:60px">修改密码</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- END comments TABLE widget-->
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->

<script src="js/user-manage.js"></script>
<?php }} ?>
