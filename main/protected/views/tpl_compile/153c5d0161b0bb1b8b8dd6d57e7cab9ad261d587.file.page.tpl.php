<?php /* Smarty version Smarty-3.1.16, created on 2014-04-27 23:14:53
         compiled from "/root/jingshuicm/main/protected/views/tpl/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1164733988535d1eed11af51-11433959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '153c5d0161b0bb1b8b8dd6d57e7cab9ad261d587' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/page.tpl',
      1 => 1398605286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1164733988535d1eed11af51-11433959',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_535d1eed11eb14_20541459',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535d1eed11eb14_20541459')) {function content_535d1eed11eb14_20541459($_smarty_tpl) {?>         <!-- BEGIN PAGE CONTAINER-->
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
                     Error Page
                     <small>error page sample</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Extra</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">404 Error Page</a><span class="divider-last">&nbsp;</span></li>
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
                               <strong>404</strong> <br/>
                               Page Not Found
                           </h1>
                           <p>We're sorry, the page you were looking for doesn't exist anymore.</p>
                       </div>
                   </div>
               </div>
            </div>
            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
<?php }} ?>
