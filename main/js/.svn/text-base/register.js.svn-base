function showMsg(msg){
    $(".alert-error").removeClass("hide");
    $("#error-text").html(msg);
}

function register(){
    url = window.location.href;
    data = {};
    data["username"]   = $("#username").val();
    data["password"]   = $("#password").val();
    data["password2"] = $("#password2").val();
    if (data["username"] == "" || data["password"] == "" || data["password2"] == ""){
        showMsg("请填写完整！");
        return;
    }
    if(data["password"] != data["password2"]){
        showMsg("两次输入的密码不一致，请重新输入！");
        return;
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        dataType: "json",
        success: function(result){
            if(result.errno==0){
                window.location.href = "/main/index.php";
            }
            else if (result.errno==-2){
                showMsg("用户名已存在！");
            }
        },
        error: function(obj, err) {
            showMsg("系统异常！");     
        },
    });
}
