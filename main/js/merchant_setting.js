function showMsg(msg){
    $(".alert-error").removeClass("hide");
    $("#error-text").html(msg);
}

function setting(){
    data = {};
    data["name"]         = $("#name").val();
    data["category"]     = $("#category").val();
    data["phone"]        = $("#phone").val();
    data["address"]      = $("#address").val();
    data["coordinate"]   = $("#coordinate").val();
    data["introduction"] = $("#introduction").val();
    if (data["name"] == "" || data["coordinate"] == ""){
        showMsg("请填写完整！");
        return;
    }
    $.ajax({
        url: "/main/index.php?r=merchant/setting",
        type: 'POST',
        data: data,
        dataType: "json",
        success: function(result){
            if(result.errno==0){
                alert("修改成功！");
            }
            else{
                showMsg("系统异常！");
            }
        },
        error: function(obj, err) {
            showMsg("系统异常！");     
        },
    });
}

function claerInput(){
    $("#name").val("");
    $("#category").val(0);
    $("#phone").val("");
    $("#address").val("");
    $("#coordinate").val("");
    $("#introduction").val("");    
}

function uploadMerchantLogo(){
    $.ajaxFileUpload({
        url: '/main/index.php?r=merchant/uploadpicture',
        secureuri: false,  
        fileElementId: 'merchantLogo', //上传控件ID  
        dataType: 'json',  
        success: function(data, status) {
            console.log(data.url);
            url=data.url.replace(/amp;/ig,""); 
            $("#logopic").attr("src", url);
        },  
        error: function(data, status, e) {  
            showMsg("系统异常！");         
        }  
    });  
}