<?php /* Smarty version Smarty-3.1.16, created on 2014-04-28 17:43:57
         compiled from "/root/jingshuicm/main/protected/views/tpl/customer_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1573471175535e22ddefd369-96378327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c364b587c598fe07f36b94596cc34bd6d86a050' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/customer_manage.tpl',
      1 => 1398605286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1573471175535e22ddefd369-96378327',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'joinActivitys' => 0,
    'joinActivity' => 0,
    'orderGoods' => 0,
    'orderGood' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_535e22de004b38_13865926',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535e22de004b38_13865926')) {function content_535e22de004b38_13865926($_smarty_tpl) {?><!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     客户管理
     <small>客户列表</small>
   </h3>
   <ul class="breadcrumb">
     <li>
       <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
     </li>
     <li>
       <a href="#">客户管理</a> <span class="divider">&nbsp;</span>
     </li>
     <li><a href="#">客户列表</a><span class="divider-last">&nbsp;</span></li>
   </ul>
   <!-- END PAGE TITLE & BREADCRUMB-->
 </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid" >
 <div class="span12">
  <!-- BEGIN joinActivity TABLE widget-->
  <div class="widget">
   <div class="widget-title">
    <h4><i class="icon-reorder"></i>参加活动客户列表</h4>
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
       <th>客户称呼</th>
       <th>联系方式</th>
       <th>家庭住址</th>
       <th>房屋面积</th>
       <th>提交时间</th>
     </tr>
   </thead>
   <tbody>
    <?php  $_smarty_tpl->tpl_vars['joinActivity'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['joinActivity']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['joinActivitys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['joinActivity']->key => $_smarty_tpl->tpl_vars['joinActivity']->value) {
$_smarty_tpl->tpl_vars['joinActivity']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']++;
?>
    <tr>
     <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['joinActivity']->value['name'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['joinActivity']->value['phone'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['joinActivity']->value['address'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['joinActivity']->value['houseArea'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['joinActivity']->value['createTime'];?>
</td>
   </tr>
   <?php } ?>
 </tbody>
</table>
</div>
</div>
<!-- END joinActivity TABLE widget-->

  <!-- BEGIN OrderGoods TABLE widget-->
  <div class="widget">
   <div class="widget-title">
    <h4><i class="icon-reorder"></i>订购商品客户列表</h4>
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
       <th>客户称呼</th>
       <th>联系方式</th>
       <th>家庭住址</th>
       <th>房屋面积</th>
       <th>提交时间</th>
     </tr>
   </thead>
   <tbody>
    <?php  $_smarty_tpl->tpl_vars['orderGood'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['orderGood']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orderGoods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['og']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['orderGood']->key => $_smarty_tpl->tpl_vars['orderGood']->value) {
$_smarty_tpl->tpl_vars['orderGood']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['og']['iteration']++;
?>
    <tr>
     <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['og']['iteration'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['orderGood']->value['goodsName'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['orderGood']->value['name'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['orderGood']->value['phone'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['orderGood']->value['address'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['orderGood']->value['houseArea'];?>
</td>
     <td><?php echo $_smarty_tpl->tpl_vars['orderGood']->value['createTime'];?>
</td>
   </tr>
   <?php } ?>
 </tbody>
</table>
</div>
</div>
<!-- END OrderGoods TABLE widget-->
</div>
</div>
<!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->
<?php }} ?>
