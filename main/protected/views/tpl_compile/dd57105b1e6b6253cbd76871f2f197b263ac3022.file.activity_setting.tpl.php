<?php /* Smarty version Smarty-3.1.16, created on 2014-05-02 07:52:10
         compiled from "/root/jingshuicm/main/protected/views/tpl/activity_setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19175813895362de2abbd996-80930575%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd57105b1e6b6253cbd76871f2f197b263ac3022' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/activity_setting.tpl',
      1 => 1398605286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19175813895362de2abbd996-80930575',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'name' => 0,
    'phone' => 0,
    'address' => 0,
    'period' => 0,
    'introduction' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5362de2ac1b046_72995338',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5362de2ac1b046_72995338')) {function content_5362de2ac1b046_72995338($_smarty_tpl) {?><!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
    <div class="span12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
        活动管理
        <small>设置活动信息</small>
      </h3>
      <ul class="breadcrumb">
        <li>
          <a href="/main/index.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
        </li>
        <li>
          <a href="#">活动管理</a> <span class="divider">&nbsp;</span>
        </li>
        <li><a href="#">设置活动信息</a><span class="divider-last">&nbsp;</span></li>
      </ul>
      <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
  </div>
  <!-- END PAGE HEADER-->
  <!-- BEGIN PAGE CONTENT-->
  <div class="row-fluid" >
    <div class="span12">
      <div class="widget">
        <div class="widget-title">
          <h4><i class="icon-reorder"></i>活动信息修改</h4>
        </div>        
        <div class="widget-body">
          <div class="row-fluid" >
            <div class="span12">
              <div class="alert alert-error hide"> 
                <a class="close" data-dismiss="alert" href="#">×</a>
                <div id="error-text"></div>
              </div>                
              <form class="form-horizontal">
                <fieldset>
                  <?php if ($_smarty_tpl->tpl_vars['id']->value!='') {?>
                  <div class="control-group">
                    <label class="control-label" >活动编号</label>
                    <div class="controls">
                      <input type="text"  class="input-xlarge" disabled value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                    </div>
                  </div>                 
                  <?php }?>                  
                  <div class="control-group">
                    <!-- Text input-->
                    <label class="control-label" >活动名称</label>
                    <div class="controls">
                      <input type="text" placeholder="请输入活动名称" class="input-xlarge" id="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
                    </div>
                  </div>
                  <div class="control-group">
                    <!-- Text input-->
                    <label class="control-label" for="input01">联系方式</label>
                    <div class="controls">
                      <input type="text" placeholder="请输入活动报名手机号" class="input-xlarge" id="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
                      <p class="help-block"></p>
                    </div>
                  </div>
                  <div class="control-group">
                    <!-- Text input-->
                    <label class="control-label" for="input01">活动地址</label>
                    <div class="controls">
                      <input type="text" placeholder="请输入活动地址" class="input-xlarge" id="address"  value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
">
                      <p class="help-block"></p>
                    </div>
                  </div>
                  <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />                
                  <div class="control-group">
                    <label class="control-label">活动起止日期</label>
                    <div class="controls">
                      <div class="input-prepend">
                        <span class="add-on"><i class="icon-calendar"></i></span><input type="text" class=" m-ctrl-medium date-range" style="width:244px" id="period" value="<?php echo $_smarty_tpl->tpl_vars['period']->value;?>
"/>
                      </div>
                    </div>
                  </div>                
                  <div class="control-group">
                    <!-- Textarea -->
                    <label class="control-label">活动详情</label>
                    <div class="controls">
                      <div class="textarea">
                        <textarea type="" class="" style="width:270px" id="introduction"><?php echo $_smarty_tpl->tpl_vars['introduction']->value;?>
</textarea>
                      </div>
                    </div>
                  </div>              
                  <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                      <button type="button" name="submit" class="btn btn-info" onclick="setting()">确认修改</button>
                      <button type="button" name="submit" class="btn btn-warning" onclick="claerInput()">重置</button>
                      <?php if ($_smarty_tpl->tpl_vars['id']->value!='') {?>
                          <a type="button" href="/main/index.php?r=activity/picture&activityId=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="btn btn-info">设置图片</a>
                      <?php } else { ?>
                          <a type="button" href="#" onclick="alert('请先保存活动信息后再修改图片')" class="btn btn-info">设置图片</a>                      
                      <?php }?> 
                    </div>
                  </div>
                </fieldset>
              </form>             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->
<!DOCTYPE html>
<script src="js/activity_setting.js"></script> <?php }} ?>
