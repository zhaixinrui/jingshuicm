<?php /* Smarty version Smarty-3.1.16, created on 2014-07-09 20:54:52
         compiled from "/root/jingshuicm/main/protected/views/tpl/ranklist_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12584909905362deae79a132-93368521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '446d57cb3e209ca80e2461b4fdcb0c75eea22357' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/ranklist_manage.tpl',
      1 => 1404910484,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12584909905362deae79a132-93368521',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5362deae7c8aa8_87940194',
  'variables' => 
  array (
    'ranklist' => 0,
    'rankItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5362deae7c8aa8_87940194')) {function content_5362deae7c8aa8_87940194($_smarty_tpl) {?>
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
     排行榜管理
     <small>排行榜列表</small>
   </h3>
   <ul class="breadcrumb">
     <li>
       <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
     </li>
     <li>
       <a href="#">排行榜管理</a> <span class="divider">&nbsp;</span>
     </li>
     <li><a href="#">排行榜列表</a><span class="divider-last">&nbsp;</span></li>
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
        <h4><i class="icon-reorder"></i>排行榜列表</h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
        </span>
      </div>
      <div class="widget-body">
        <div class="portlet-body">
          <div class="alert alert-error hide"> 
            <a class="close" data-dismiss="alert" href="#">×</a>
            <div id="error-text"></div>
          </div> 
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="ranklist_editable">
            <thead>
              <tr>
                <th>排名</th>
                <th>品类</th>
                <th>排序依据</th>                
                <th>商家编号</th>
                <th style="min-width:30px">编辑</th>
              </tr>
            </thead>
            <tbody>
              <?php  $_smarty_tpl->tpl_vars['rankItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rankItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ranklist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rankItem']->key => $_smarty_tpl->tpl_vars['rankItem']->value) {
$_smarty_tpl->tpl_vars['rankItem']->_loop = true;
?>
              <tr id="<?php echo $_smarty_tpl->tpl_vars['rankItem']->value['id'];?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['rankItem']->value['rank'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rankItem']->value['category'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rankItem']->value['type'];?>
</td>             
                <td><?php echo $_smarty_tpl->tpl_vars['rankItem']->value['merchantId'];?>
</td>
                <td><a class="edit" href="javascript:;">编辑</a></td>
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


<script src="js/ranklist-table-editable.js"></script>
<?php }} ?>
