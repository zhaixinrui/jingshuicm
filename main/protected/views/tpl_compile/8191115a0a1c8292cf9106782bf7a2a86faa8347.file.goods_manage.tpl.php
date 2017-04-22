<?php /* Smarty version Smarty-3.1.16, created on 2014-07-09 20:59:55
         compiled from "/root/jingshuicm/main/protected/views/tpl/goods_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1314224233535d1ef794d622-85080046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8191115a0a1c8292cf9106782bf7a2a86faa8347' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/goods_manage.tpl',
      1 => 1401979823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1314224233535d1ef794d622-85080046',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_535d1ef7980467_39490933',
  'variables' => 
  array (
    'goods' => 0,
    'good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535d1ef7980467_39490933')) {function content_535d1ef7980467_39490933($_smarty_tpl) {?>
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->
  <div class="row-fluid">
   <div class="span12">
     <!-- BEGIN THEME CUSTOMIZER-->
     <div id="theme-change" class="hidden-phone">
       <i class="icon-cogs"></i>
       <span class="settings">
        <span class="text">Theme:</span>
        <span class="colors">
          <span class="color-default" data-style="default"></span>
          <span class="color-gray" data-style="gray"></span>
          <span class="color-purple" data-style="purple"></span>
          <span class="color-navy-blue" data-style="navy-blue"></span>
        </span>
      </span>
    </div>
    <!-- END THEME CUSTOMIZER-->
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
    <h3 class="page-title">
     商品管理
     <small>商品列表</small>
   </h3>
   <ul class="breadcrumb">
     <li>
       <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
     </li>
     <li>
       <a href="#">商品管理</a> <span class="divider">&nbsp;</span>
     </li>
     <li><a href="#">商品列表</a><span class="divider-last">&nbsp;</span></li>
   </ul>
   <!-- END PAGE TITLE & BREADCRUMB-->
 </div>
</div>
<!-- END PAGE HEADER-->

<!-- BEGIN ADVANCED TABLE widget-->
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN EXAMPLE TABLE widget-->
    <div class="widget">
      <div class="widget-title">
        <h4><i class="icon-reorder"></i>商品列表</h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
        </span>
      </div>
      <div class="widget-body">
        <div class="portlet-body">
          <div class="alert alert-error hide"> 
            <a class="close" data-dismiss="alert" href="#">×</a>
            <div id="error-text">用户名或密码不正确! </div>
          </div> 
          <div class="clearfix">
            <div class="btn-group">
              <button id="goods_editable_new" class="btn green">
                新增商品 <i class="icon-plus"></i>
              </button>
            </div>
            <div class="btn-group pull-right">
              <button class="btn dropdown-toggle" data-toggle="dropdown">工具 <i class="icon-angle-down"></i>
              </button>
              <ul class="dropdown-menu pull-right">
                <li><a href="#">打印</a></li>
                <li><a href="#">保存为PDF格式</a></li>
                <li><a href="#">导出Excel表格</a></li>
              </ul>
            </div>
          </div>
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="goods_editable">
            <thead>
              <tr>
                <th>商品名称</th>
                <th>原价</th>
                <th>促销价</th>
                <th>商品简介</th>
                <th style="min-width:30px">编辑</th>
                <th style="min-width:30px">删除</th>
                <th style="min-width:60px">管理图片</th>
              </tr>
            </thead>
            <tbody>
              <?php  $_smarty_tpl->tpl_vars['good'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['good']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['good']->key => $_smarty_tpl->tpl_vars['good']->value) {
$_smarty_tpl->tpl_vars['good']->_loop = true;
?>
              <tr id="<?php echo $_smarty_tpl->tpl_vars['good']->value['id'];?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['good']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['good']->value['price'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['good']->value['promotionPrice'];?>
</td>
                <td class="center"><?php echo $_smarty_tpl->tpl_vars['good']->value['introduction'];?>
</td>
                <td><a class="edit" href="javascript:;">编辑</a></td>
                <td><a class="delete" href="javascript:;">删除</a></td>
                <td><a class="picture" href="javascript:;">管理图片</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- END EXAMPLE TABLE widget-->
  </div>
</div>

<!-- END ADVANCED TABLE widget-->

<!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->


<script src="js/goods-table-editable.js"></script>
<?php }} ?>
