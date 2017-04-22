
function showMsg(msg){
    $(".alert-error").removeClass("hide");
    $("#error-text").html(msg);
}

function register(){
    url = window.location.href;
    data = {};
    data["password_old"]  = $("#password_old").val();
    data["password_new"]  = $("#password_new").val();
    data["password_new2"] = $("#password_new2").val();
    if (data["password_old"] == "" || data["password_new"] == "" || data["password_new2"] == ""){
        showMsg("请填写完整");
        return;
    }
    if(data["password_new"] != data["password_new2"]){
        showMsg("两次输入的新密码不一致，请重新输入！");
        return;
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        dataType: "json",
        success: function(result){
            if(result.errno==0){
                showMsg("修改成功！");
                window.location.href = result.data.returnUrl;
            }
            else if (result.errno==-1){
                showMsg("密码不正确，请重新输入！");
            }
        },
        error: function(obj, err) {
            showMsg("系统异常！");     
        },
    });
}