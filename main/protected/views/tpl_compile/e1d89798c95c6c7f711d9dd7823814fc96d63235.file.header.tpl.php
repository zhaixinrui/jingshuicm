<?php /* Smarty version Smarty-3.1.16, created on 2014-05-16 00:04:19
         compiled from "/root/jingshuicm/main/protected/views/tpl/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:775751329535d1eed10c623-44264788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1d89798c95c6c7f711d9dd7823814fc96d63235' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/header.tpl',
      1 => 1400072379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '775751329535d1eed10c623-44264788',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_535d1eed114338_40278549',
  'variables' => 
  array (
    'username' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535d1eed114338_40278549')) {function content_535d1eed114338_40278549($_smarty_tpl) {?><!-- BEGIN BODY -->
<body class="fixed-top">
 <!-- BEGIN HEADER -->
 <div id="header" class="navbar navbar-inverse navbar-fixed-top">
   <!-- BEGIN TOP NAVIGATION BAR -->
   <div class="navbar-inner">
     <div class="container-fluid">
       <!-- BEGIN LOGO -->
       <a class="brand" href="/main/index.php">
         <img src="img/logo.png" alt="易人宜家后台管理" />
       </a>
       <!-- END LOGO -->
       <!-- BEGIN RESPONSIVE MENU TOGGLER -->
       <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="arrow"></span>
       </a>
       <!-- END RESPONSIVE MENU TOGGLER -->
       <div id="top_menu" class="nav notify-row">
         <!-- BEGIN NOTIFICATION -->
         <ul class="nav top-menu">
           <!-- BEGIN SETTINGS -->
           <li class="dropdown">
             <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Settings">
               <i class="icon-cog"></i>
             </a>
           </li>
           <!-- END SETTINGS -->
           <!-- BEGIN INBOX DROPDOWN -->
           <li class="dropdown">
             <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Messages">
               <i class="icon-envelope-alt"></i>
             </a>
           </li>   
           <!-- END INBOX DROPDOWN -->        
           <!-- BEGIN NOTIFICATION DROPDOWN -->
           <li class="dropdown">
             <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Notification">
               <i class="icon-bell-alt"></i>
             </a>
           </li> 
           <!-- END NOTIFICATION DROPDOWN -->

         </ul>
       </div>
       <!-- END  NOTIFICATION -->
       <div class="top-nav ">
         <ul class="nav pull-right top-menu" >
           <!-- BEGIN SUPPORT -->
           <li class="dropdown mtop5">

             <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
               <i class="icon-comments-alt"></i>
             </a>
           </li>
           <li class="dropdown mtop5">
             <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
               <i class="icon-headphones"></i>
             </a>
           </li>
           <!-- END SUPPORT -->
           <!-- BEGIN USER LOGIN DROPDOWN -->
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="img/avatar1_small.jpg" alt="">
               <span class="username"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span>
               <b class="caret"></b>
             </a>
             <ul class="dropdown-menu">
              <li><a href="/main/index.php?r=site/passwd"><i class="icon-user"></i> 修改密码</a></li>
              <li><a href="/main/index.php?r=site/logout"><i class="icon-key"></i>退出</a></li>
            </ul>
          </li>
          <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
      </div>
    </div>
  </div>
  <!-- END TOP NAVIGATION BAR -->
</div>
   <!-- END HEADER --><?php }} ?>
