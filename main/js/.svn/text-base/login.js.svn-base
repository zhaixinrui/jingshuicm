function showMsg(msg){
    $(".alert-error").removeClass("hide");
    $("#error-text").html(msg);
}

function login(){
    url = window.location.href;
    data = {};
    data["username"]   = $("#username").val();
    data["password"]   = $("#password").val();
    data["rememberMe"] = $("#rememberMe").is(':checked')? 1:0;
    if (data["username"] == "" || data["password"] == ""){
        showMsg("用户名或密码不能为空！");
        return;
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        dataType: "json",
        success: function(result){
            if(result.errno==0){
                window.location.href = result.data.returnUrl;
            }
            else if (result.errno==-1){
                showMsg("用户名或密码错误！");
            }
        },
        error: function(obj, err) {
            showMsg("系统异常！");     
        },
    });
}
