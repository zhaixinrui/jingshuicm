<?php /* Smarty version Smarty-3.1.16, created on 2014-08-13 10:36:16
         compiled from "/root/jingshuicm/main/protected/views/tpl/sidebar_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4675872135362de72b0a291-95464992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd93cd2d16a1a1707ba7e7f775c18bf23b483682' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/sidebar_admin.tpl',
      1 => 1407897248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4675872135362de72b0a291-95464992',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5362de72b11cc9_19167279',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5362de72b11cc9_19167279')) {function content_5362de72b11cc9_19167279($_smarty_tpl) {?>      <!-- BEGIN SIDEBAR -->
      <div id="sidebar" class="nav-collapse collapse">

         <div class="sidebar-toggler hidden-phone"></div>   

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li><a class="" href="/main/index.php?r=user/manage">
                <span class="icon-box"><i class="icon-thumbs-up"></i></span>   用户管理<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=merchant/manage">
                <span class="icon-box"><i class="icon-gift"></i></span>  商家管理<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=activity/manage">
                <span class="icon-box"><i class="icon-user"></i></span>  活动管理<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=hotActivity/manage">
                <span class="icon-box"><i class="icon-user"></i></span>  热门活动<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=comment/manageadmin">
                <span class="icon-box"><i class="icon-user"></i></span>  评论管理<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=ranklist/manage">
                <span class="icon-box"><i class="icon-user"></i></span>  排行管理<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=apply/manage">
                <span class="icon-box"><i class="icon-user"></i></span>  申请管理<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=site/logout">
                <span class="icon-box"><i class="icon-key"></i></span>  退出<span class="arrow"></span></a>
              </li>
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
<?php }} ?>
