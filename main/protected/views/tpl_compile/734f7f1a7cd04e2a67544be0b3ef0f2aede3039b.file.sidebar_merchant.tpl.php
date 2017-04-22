<?php /* Smarty version Smarty-3.1.16, created on 2014-04-27 23:14:53
         compiled from "/root/jingshuicm/main/protected/views/tpl/sidebar_merchant.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2102734805535d1eed1163c4-95888808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '734f7f1a7cd04e2a67544be0b3ef0f2aede3039b' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/sidebar_merchant.tpl',
      1 => 1398605286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2102734805535d1eed1163c4-95888808',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_535d1eed1194b0_52621133',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535d1eed1194b0_52621133')) {function content_535d1eed1194b0_52621133($_smarty_tpl) {?>      <!-- BEGIN SIDEBAR -->
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
              <li><a class="" href="/main/index.php?r=merchant/setting">
                <span class="icon-box"><i class="icon-thumbs-up"></i></span>   店铺管理<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=goods/manage">
                <span class="icon-box"><i class="icon-gift"></i></span>  商品管理<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=activity/setting">
                <span class="icon-box"><i class="icon-star"></i></span>  活动管理<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=customer/manage">
                <span class="icon-box"><i class="icon-user"></i></span>  客户管理<span class="arrow"></span></a>
              </li>
              <li><a class="" href="/main/index.php?r=comment/manage">
                <span class="icon-box"><i class="icon-comment"></i></span>  评论管理<span class="arrow"></span></a>
              </li>              
              <li><a class="" href="/main/index.php?r=site/logout">
                <span class="icon-box"><i class="icon-key"></i></span>  退出<span class="arrow"></span></a>
              </li>
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR --><?php }} ?>
