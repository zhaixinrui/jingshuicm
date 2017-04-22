<?php /* Smarty version Smarty-3.1.16, created on 2014-07-13 22:51:43
         compiled from "/root/jingshuicm/main/protected/views/tpl/goods_picture.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1376113520535e22c64dab20-13387064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42cf61f8dba70e1173dfa02696d5ad2a9ee9702f' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/goods_picture.tpl',
      1 => 1405263102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1376113520535e22c64dab20-13387064',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_535e22c652de43_70851363',
  'variables' => 
  array (
    'pictures' => 0,
    'picture' => 0,
    'goodsId' => 0,
    'thumbnail' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535e22c652de43_70851363')) {function content_535e22c652de43_70851363($_smarty_tpl) {?><!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     商品管理
     <small>商品列表</small>
   </h3>
   <ul class="breadcrumb">
    <li>
     <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
   </li>
   <li>
     <a href="/main/index.php?r=goods/manage">商品管理</a> <span class="divider">&nbsp;</span>
   </li>
   <li>
    <a href="/main/index.php?r=goods/manage">商品列表</a><span class="divider">&nbsp;</span>
  </li>
  <li>
    <a href="#">图片管理</a><span class="divider-last">&nbsp;</span>
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
      <h4><i class="icon-camera-retro"></i>商品照片列表</h4>
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
        <div class="row-fluid" id="goods-picture">
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
            <form id="PictureForm" action="/main/index.php?r=goods/uploadPicture&goodsId=<?php echo $_smarty_tpl->tpl_vars['goodsId']->value;?>
" class="form-horizontal" enctype="multipart/form-data" method="post" name="upform">                                  
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
<div class="row-fluid" >
 <div class="span12">
  <div class="widget">
    <div class="widget-title">
      <h4><i class="icon-camera-retro"></i>商品缩略图</h4>
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
        <?php if ($_smarty_tpl->tpl_vars['thumbnail']->value) {?>
        <div class="row-fluid" id="goods-thumbnail">
          <div class="span4">
            <div class="thumbnail">
              <div class="item">
                <a class="fancybox-button" data-rel="fancybox-button" title="商品缩略图" href="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['url'];?>
">
                  <div class="zoom">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['url'];?>
" alt="商品照片" />
                    <div class="zoom-icon"></div>
                  </div>
                </a>
              </div>
            </div>
            <input type="submit" value="删除此照片" class="btn btn-danger delet-pic-button" data-id=<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['id'];?>
 onclick="javascript:;"> 
          </div>
        </div>  
        <?php }?>             
        <hr class="clearfix" />          
        <div class="row-fluid">
          <div class="span12">      
            <form id="ThumbnailForm"  action="/main/index.php?r=goods/uploadThumbnail&goodsId=<?php echo $_smarty_tpl->tpl_vars['goodsId']->value;?>
" class="form-horizontal" enctype="multipart/form-data" method="post" name="thumbnailupform">
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



<script src='js/goods_picture.js'></script>
<script>

// $(document).ready(function(){
//   var num = 3 - $("#goods-picture .span4").size();
//   for(var i=0; i < num; i++){
//     var widgetHtml = '<div class="control-group"> <label class="control-label">上传活动图片</label> <div class="controls"> <input name="upfile'+ i +'" type="file" /> </div> </div>';
//     $("form").prepend(widgetHtml);      
//   }
// });
</script>







<?php }} ?>
