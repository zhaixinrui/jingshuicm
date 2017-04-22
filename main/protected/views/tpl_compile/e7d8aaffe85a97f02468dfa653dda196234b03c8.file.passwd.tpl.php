<?php /* Smarty version Smarty-3.1.16, created on 2014-05-11 11:37:15
         compiled from "/root/jingshuicm/main/protected/views/tpl/passwd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1177448530536ee9062fa818-83790342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7d8aaffe85a97f02468dfa653dda196234b03c8' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/passwd.tpl',
      1 => 1399779431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1177448530536ee9062fa818-83790342',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_536ee906313661_33840585',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536ee906313661_33840585')) {function content_536ee906313661_33840585($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<style> 
#register-form {
    margin-top:200px;
}
</style>
<script src="/main/js/passwd.js" type="text/javascript"></script>
<div class="container" id="register-form"> 
    <div class="row"> 
        <div class="span4 offset4 well">
            <legend>修改密码</legend> 
            <div class="alert alert-error hide"> 
                <a class="close" data-dismiss="alert" href="#">×</a>
                <div id="error-text"> </div>
            </div> 
            <form accept-charset="UTF-8" action="" method="post"> 
                <input class="span4" id="password_old" name="password_old" placeholder="请输入当前密码" type="text"> 
                <input class="span4" id="password_new" name="password_new" placeholder="请输入新密码" type="password">  
                <input class="span4" id="password_new2" name="password_new2" placeholder="请再次输入新密码" type="password">  
                <button type="button" name="submit" class="btn btn-info btn-block" onclick="register()">修改</button> 
            </form> 
        </div> 
    </div> 
</div> 
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
