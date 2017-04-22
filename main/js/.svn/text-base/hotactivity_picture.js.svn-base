$(document).ready(function(){
  // 设置上传图片控件
  // 每张图片一个控件  
  var initUploadPicWidget = function(){
    var button = '<div class="control-group"> <div class="controls"> <input type="submit" value="上传" class="btn btn-info"></div></div>';
    // 用户只能上传一张缩略图
    var num = $("#hotactivity-thumbnail .span4").size();
    if( 0 == num){
      $("#ThumbnailForm").prepend(button); 
      var widgetHtml = '<div class="control-group"> <label class="control-label">上传热门活动缩略图</label> <div class="controls"> <input name="thumbnail" type="file" /> </div> </div>';
      $("#ThumbnailForm").prepend(widgetHtml); 
    }
  }

  // 删除图片
  $(".delet-pic-button").click(function(event) {
    var inputObj = $(this);
    $.ajax({
      url: '/main/index.php?r=hotActivity/deletePicture',
      type: 'POST',
      dataType: "json",
      data: {'pictureId': inputObj.attr("data-id")},
    })
    .done(function(result) {
      if(result.errno==0){
        inputObj.parent().remove();
        initUploadPicWidget();
      }
      else{
        showMsg("系统异常！");
      }
    })
    .fail(function() {
      showMsg("系统异常！");
    });    
  });

  // 初始化上传按钮控件
  initUploadPicWidget();
  
});

