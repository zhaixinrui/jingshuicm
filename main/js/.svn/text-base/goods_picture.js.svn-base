$(document).ready(function(){
  // 设置上传图片控件
  // 每张图片一个控件  
  var initUploadPicWidget = function(){
    var button = '<div class="control-group"> <div class="controls"> <input type="submit" value="上传" class="btn btn-info"></div></div>';
    //$("#PictureForm").html(button);      
      // 用户只能上传3张照片，所以3减去当前已经上传的照片数即为用户还可以上传的照片张数
    var num = 3 - $("#goods-picture .span4").size();
    if(num > 0){
      $("#PictureForm").prepend(button); 
    } 
    for(var i=0; i < num; i++){
      var widgetHtml = '<div class="control-group"> <label class="control-label">上传商品图片</label> <div class="controls"> <input name="upfile'+ i +'" type="file" /> </div> </div>';
      $("#PictureForm").prepend(widgetHtml);      
    }   
    // 用户只能上传一张缩略图
    var num = $("#goods-thumbnail .span4").size();
    if( 0 == num){
      $("#ThumbnailForm").prepend(button); 
      var widgetHtml = '<div class="control-group"> <label class="control-label">上传商品缩略图</label> <div class="controls"> <input name="thumbnail" type="file" /> </div> </div>';
      $("#ThumbnailForm").prepend(widgetHtml); 
    }
  }

  // 删除图片
  $(".delet-pic-button").click(function(event) {
    var inputObj = $(this);
    $.ajax({
      url: '/main/index.php?r=goods/deletepicture',
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

