<?php /* Smarty version Smarty-3.1.16, created on 2014-07-21 22:54:52
         compiled from "/root/jingshuicm/main/protected/views/tpl/merchant_manage_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10767910525362de8ef15ca1-51163666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f71a8736709349e5bb3aa719aa6e6768afa2ed19' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/merchant_manage_admin.tpl',
      1 => 1405954488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10767910525362de8ef15ca1-51163666',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5362de8f000337_25772630',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5362de8f000337_25772630')) {function content_5362de8f000337_25772630($_smarty_tpl) {?>
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                商家管理
                <small>商家列表</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">商家管理</a> <span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">商家列表</a><span class="divider-last">&nbsp;</span>
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
                    <h4><i class="icon-reorder"></i>详情列表</h4>
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
                    <table class="table table-striped table-bordered"  id="merchantlist_editable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>商店名称</th>
                                <th>所有人帐户</th>
                                <th>商户电话</th>
                                <th>商户地址</th>
                                <th>商户级别</th>
                                <th style="min-width:60px">操作</th>
                                <th style="min-width:30px">删除</th>
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

<script src="js/merchant-manage.js"></script>
<?php }} ?>
