<?php /* Smarty version Smarty-3.1.16, created on 2014-07-09 20:28:20
         compiled from "/root/jingshuicm/main/protected/views/tpl/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:552780723535d1ee59fb418-59330682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13a9f5b96641067e7b45a9298b83d207e0454876' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/login.tpl',
      1 => 1402975871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '552780723535d1ee59fb418-59330682',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_535d1ee5a3cb31_31012753',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535d1ee5a3cb31_31012753')) {function content_535d1ee5a3cb31_31012753($_smarty_tpl) {?><!DOCTYPE html>
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
  <title>登录</title>
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
        <h4>请登录</h4>
        <div class="alert alert-error hide"> 
          <a class="close" data-dismiss="alert" href="#">×</a>
          <div id="error-text">用户名或密码不正确! </div>
        </div>         
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-user"></i></span><input id="username" type="text" placeholder="Username" />
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-key"></i></span><input id="password" type="password" placeholder="Password" />
            </div>
            <div class="mtop10">
              <div class="block-hint pull-left small">
                <input type="checkbox" id="rememberMe"> 十天内免登录
              </div>
              <div class="block-hint pull-right">
                <a href="/main/index.php?r=site/register">注册账号</a> | 
                <a onclick="alert('请联系管理员重置密码:wuchaoyan@jingshuimedia.com');">找回密码</a>
              </div>
            </div>

            <div class="clearfix space5"></div>
          </div>

        </div>
      </div>
      <button type="button" name="submit" class="btn btn-info btn-block" onclick="login()">登录</button>
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
  <script src="js/login.js"></script>  
  <script>
  // jQuery(document).ready(function() {     
  //   App.initLogin();
  // });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
<?php }} ?>
