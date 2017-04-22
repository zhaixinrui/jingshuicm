<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     热门活动管理
     <small>管理图片</small>
   </h3>
   <ul class="breadcrumb">
    <li>
     <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
   </li>
   <li>
     <a href="/main/index.php?r=hotActivity/manage">热门活动</a> <span class="divider">&nbsp;</span>
   </li>
   <li>
    <a href="/main/index.php?r=hotActivity/manage">活动列表</a><span class="divider">&nbsp;</span>
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
        <{if $thumbnail}>
        <div class="row-fluid" id="hotactivity-thumbnail">
          <div class="span4">
            <div class="thumbnail">
              <div class="item">
                <a class="fancybox-button" data-rel="fancybox-button" title="热门活动缩略图" href="<{$thumbnail.url}>">
                  <div class="zoom">
                    <img src="<{$thumbnail.url}>" alt="活动照片" />
                    <div class="zoom-icon"></div>
                  </div>
                </a>
              </div>
            </div>
            <input type="submit" value="删除此照片" class="btn btn-danger delet-pic-button" data-id=<{$thumbnail.id}> onclick="javascript:;"> 
          </div>
        </div>  
        <{/if}>             
        <hr class="clearfix" />          
        <div class="row-fluid">
          <div class="span12">      
            <form id="ThumbnailForm"  action="/main/index.php?r=hotActivity/uploadPicture&hotActivityId=<{$hotActivityId}>" class="form-horizontal" enctype="multipart/form-data" method="post" name="thumbnailupform">
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



<script src='js/hotactivity_picture.js'></script>
<script>

// $(document).ready(function(){
//   var num = 3 - $("#goods-picture .span4").size();
//   for(var i=0; i < num; i++){
//     var widgetHtml = '<div class="control-group"> <label class="control-label">上传活动图片</label> <div class="controls"> <input name="upfile'+ i +'" type="file" /> </div> </div>';
//     $("form").prepend(widgetHtml);      
//   }
// });
</script>
