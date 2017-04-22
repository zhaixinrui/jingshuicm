<?php /* Smarty version Smarty-3.1.16, created on 2014-05-11 00:55:53
         compiled from "/root/jingshuicm/main/protected/views/tpl/activity_picture.tpl" */ ?>
<?php /*%%SmartyHeaderCode:353901377536e5a19e4e865-59182435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccb40b92cf1780f67b52665e434d1d4cd18f1f71' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/activity_picture.tpl',
      1 => 1398605286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '353901377536e5a19e4e865-59182435',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pictures' => 0,
    'picture' => 0,
    'activityId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_536e5a19e79ca7_58587126',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e5a19e79ca7_58587126')) {function content_536e5a19e79ca7_58587126($_smarty_tpl) {?><!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     活动管理
     <small>活动图片设置</small>
   </h3>
   <ul class="breadcrumb">
    <li>
     <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
   </li>
   <li>
     <a href="/main/index.php?r=activity/setting">活动管理</a> <span class="divider">&nbsp;</span>
   </li>
  <li>
    <a href="#">活动图片设置</a><span class="divider-last">&nbsp;</span>
  </li>
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
      <h4><i class="icon-camera-retro"></i>活动照片列表</h4>
      <span class="tools">
        <a href="javascript:;" class="icon-chevron-down"></a>
        <a href="javascript:;" class="icon-remove"></a>
      </span>
    </div>
    <div class="widget-body">
      <div class="portlet-body">
        <div class="alert alert-error hide"> 
          <a class="close" data-dismiss="alert" href="#">×</a>
          <div id="error-text"> </div>
        </div> 
        <!-- BEGIN PAGE PICTURE-->
        <div class="row-fluid" id="activity-picture">
          <?php  $_smarty_tpl->tpl_vars['picture'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['picture']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pictures']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['picture']->key => $_smarty_tpl->tpl_vars['picture']->value) {
$_smarty_tpl->tpl_vars['picture']->_loop = true;
?>      
          <div class="span4">
            <div class="thumbnail">
              <div class="item">
                <a class="fancybox-button" data-rel="fancybox-button" title="商品照片" href="<?php echo $_smarty_tpl->tpl_vars['picture']->value['url'];?>
">
                  <div class="zoom">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['picture']->value['url'];?>
" alt="商品照片" />
                    <div class="zoom-icon"></div>
                  </div>
                </a>
              </div>
            </div>
            <input type="submit" value="删除此照片" class="btn btn-danger delet-pic-button" data-id=<?php echo $_smarty_tpl->tpl_vars['picture']->value['id'];?>
 onclick="javascript:;"> 
          </div>
          <?php } ?> 
        </div>                
        <hr class="clearfix" />          
        <div class="row-fluid">
          <div class="span12">      
            <form action="/main/index.php?r=activity/uploadPicture&activityId=<?php echo $_smarty_tpl->tpl_vars['activityId']->value;?>
" class="form-horizontal" enctype="multipart/form-data" method="post" name="upform">
              <div class="control-group">
                <div class="controls">
                  <input type="submit" value="上传" class="btn btn-info">
                </div>
              </div>                                           
            </form>       
          </div>
        </div>
        <!-- END PAGE PICTURE-->
      </div>
    </div>
    <!-- END PAGE CONTAINER-->          
  </div>
</div>
</div>
<!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->



<script src='js/activity_picture.js'></script>
<script>

// $(document).ready(function(){
//   var num = 3 - $("#activity-picture .span4").size();
//   for(var i=0; i < num; i++){
//     var widgetHtml = '<div class="control-group"> <label class="control-label">上传活动图片</label> <div class="controls"> <input name="upfile'+ i +'" type="file" /> </div> </div>';
//     $("form").prepend(widgetHtml);      
//   }
// });
</script>







<?php }} ?>
