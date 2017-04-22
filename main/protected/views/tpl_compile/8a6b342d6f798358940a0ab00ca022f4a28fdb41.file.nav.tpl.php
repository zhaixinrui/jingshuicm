<?php /* Smarty version Smarty-3.1.16, created on 2014-05-11 11:17:45
         compiled from "/root/jingshuicm/main/protected/views/tpl/nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2040056014536eea72970f19-38327083%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a6b342d6f798358940a0ab00ca022f4a28fdb41' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/nav.tpl',
      1 => 1399778263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2040056014536eea72970f19-38327083',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_536eea72980ef3_95489368',
  'variables' => 
  array (
    'username' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536eea72980ef3_95489368')) {function content_536eea72980ef3_95489368($_smarty_tpl) {?><div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="pull-left brand" href="#">易人宜家</a>
                        <ul class="nav pull-right">
                            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">欢迎您： <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
 <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li> <a href="/main/index.php?r=site/passwd">修改密码</a> </li>
                                <li> <a href="/main/index.php?r=site/logout">退出</a> </li>
                            </ul>
                            </li>
                         </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }} ?>
