<?php /* Smarty version Smarty-3.1.16, created on 2014-05-11 01:41:45
         compiled from "/root/jingshuicm/main/protected/views/tpl/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:777587167536e64d9bef716-35205460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec6e505c10bc1703eb59c82b6b48e686773575ec' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/error.tpl',
      1 => 1398605286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '777587167536e64d9bef716-35205460',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errMsg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_536e64d9c07287_05103158',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e64d9c07287_05103158')) {function content_536e64d9c07287_05103158($_smarty_tpl) {?>         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Error Page
                     <small>error page</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Extra</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Error Page</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid" >
               <div class="span12">
                   <div class="space20"></div>
                   <div class="space20"></div>
                   <div class="widget-body">
                       <div class="error-page" style="min-height: 800px">
                           <img src="img/404.png" alt="404 error">
                           <h1>
                               <?php echo $_smarty_tpl->tpl_vars['errMsg']->value;?>

                           </h1>
                       </div>
                   </div>
               </div>
            </div>
            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
<?php }} ?>
