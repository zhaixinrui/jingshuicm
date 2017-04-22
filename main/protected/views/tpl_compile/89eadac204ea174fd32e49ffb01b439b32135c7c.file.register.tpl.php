<?php /* Smarty version Smarty-3.1.16, created on 2014-05-11 11:39:11
         compiled from "/root/jingshuicm/main/protected/views/tpl/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1828276307536ef0df547325-01793371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89eadac204ea174fd32e49ffb01b439b32135c7c' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/register.tpl',
      1 => 1398605286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1828276307536ef0df547325-01793371',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_536ef0df54fbb0_66508483',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536ef0df54fbb0_66508483')) {function content_536ef0df54fbb0_66508483($_smarty_tpl) {?><!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.3
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>注册账号</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/style_responsive.css" rel="stylesheet" />
  <link href="css/style_default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
  <div class="login-header">
    <!-- BEGIN LOGO -->
    <div id="logo" class="center">
      <img src="img/logo.png" alt="logo" class="center" />
    </div>
    <!-- END LOGO -->
  </div>

  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form class="form-vertical no-padding no-margin" action="">
      <div class="lock">
        <i class="icon-lock"></i>
      </div>
      <div class="control-wrap">
        <h4>注册账号</h4>
        <div class="alert alert-error hide"> 
          <a class="close" data-dismiss="alert" href="#">×</a>
          <div id="error-text"></div>
        </div>         
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-user"></i></span><input id="username" type="text" placeholder="请输入用户名" />
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-key"></i></span><input id="password" type="password" placeholder="请输入密码" />
            </div>       
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-key"></i></span><input id="password2" type="password" placeholder="请再次输入密码" />
            </div>
          </div>
          <div class="clearfix space5"></div>
        </div>        
      </div>
      <button type="button" name="submit" class="btn btn-info btn-block" onclick="register()">注册</button>
    </form>
    <!-- END LOGIN FORM -->        
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
    2013 &copy; Admin Lab Dashboard.
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery.blockui.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/register.js"></script>  
  <script>
  // jQuery(document).ready(function() {     
  //   App.initLogin();
  // });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html><?php }} ?>
