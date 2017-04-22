function showMsg(msg){
    $(".alert-error").removeClass("hide");
    $("#error-text").html(msg);
}

function setting(){
    data = {};
    data["name"]         = $("#name").val();
    data["phone"]        = $("#phone").val();
    data["address"]      = $("#address").val();
    data["period"]       = $("#period").val();
    data["introduction"] = $("#introduction").val();
    // if (data["name"] == "" || data["period"] == "" || data["period"] == "" || data["period"] == "" || data["period"] == ""){
    //     showMsg("请填写完整！");
    //     return;
    // }
    var validation = true;
    $.each(data, function(n, value){
        if("" == value){
            validation = false;
            return false;
        }
    });
    if(false == validation){
        showMsg("请填写完整！");
        return;
    }
    var reg_period = /^(\d{2})\/(\d{2})\/(\d{4}) - (\d{2})\/(\d{2})\/(\d{4})$/;     
    var r = data["period"].match(reg_period);     
    if(r==null) {
        showMsg('对不起，您输入的日期格式不正确!');      
        return;
    }
    $.ajax({
        url: "/main/index.php?r=activity/updatesetting",
        type: 'POST',
        data: data,
        dataType: "json",
        success: function(result){
            if(result.errno==0){
                $('a').attr('href', '/main/index.php?r=activity/picture&activityId='+result.data);
                $('a').removeAttr('onclick');
                alert("修改成功！");
            }
            else if (result.errno==1){
                showMsg("您还没有开通店铺，请先开通！");
            }else{
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
    $("#phone").val("");
    $("#address").val("");
    $("#period").val("");
    $("#introduction").val("");    
}

function stop(){
    if(confirm('确定要删除本活动吗?')){
        $.ajax({
            url: "/main/index.php?r=activity/delete",
            type: 'POST',
            data: data,
            dataType: "json",
            success: function(result){
                if(result.errno==0){
                    alert("删除成功！");
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
}