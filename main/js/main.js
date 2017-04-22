 String.prototype.endWith=function(s){
     if(s==null||s==""||this.length==0||s.length>this.length)
          return false;
     if(this.substring(this.length-s.length)==s)
          return true;
     else
          return false;
     return true;
}

String.prototype.startWith=function(s){
    if(s==null||s==""||this.length==0||s.length>this.length)
        return false;
    if(this.substr(0,s.length)==s)
        return true;
    else
        return false;
    return true;
}

function showMsg(msg){
    $(".alert-error").removeClass("hide");
    $("#error-text").html(msg);
}

// 设置导航栏的活动链接
$(document).ready(function(){
  var this_href = window.location.pathname + window.location.search;
  $(".sidebar-menu li").each(function(){
      var href = $(this).find("a").attr('href');
      if(this_href.startWith(href)){
          $(this).addClass("active");
      }
  });
});
