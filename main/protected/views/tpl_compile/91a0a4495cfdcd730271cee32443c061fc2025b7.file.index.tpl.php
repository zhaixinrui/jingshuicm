<?php /* Smarty version Smarty-3.1.16, created on 2014-04-27 23:14:53
         compiled from "/root/jingshuicm/main/protected/views/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:657700715535d1eed0c0440-27839481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91a0a4495cfdcd730271cee32443c061fc2025b7' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/index.tpl',
      1 => 1398605286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '657700715535d1eed0c0440-27839481',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userRole' => 0,
    'pageTpl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_535d1eed0fdc89_76477361',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535d1eed0fdc89_76477361')) {function content_535d1eed0fdc89_76477361($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
  <?php if ($_smarty_tpl->tpl_vars['userRole']->value==0) {?>
  <?php echo $_smarty_tpl->getSubTemplate ('sidebar_admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <?php } else { ?>
  <?php echo $_smarty_tpl->getSubTemplate ('sidebar_merchant.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <?php }?>
  <!-- BEGIN PAGE -->  
  <div id="main-content">
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['pageTpl']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  </div>
  <!-- END PAGE -->  
</div>
<!-- END CONTAINER -->
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
