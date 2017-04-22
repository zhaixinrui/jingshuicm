var TableEditable = function () {

    return {
        init: function () {
            var oTable = $('#applyList_edit').dataTable({
                "aLengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 10,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "每页_MENU_ 条记录",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });
           
            function commentPass(oTable, userId, nRow) {
                var data = {
                    "id"        : nRow.id,
                    'userId'    : userId,
                    "status"    : 1,
                    'userRole'  : 1,
                };
                $.ajax({
                    url: "/main/index.php?r=apply/auditApply",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        if(result.errno==0){
                            oTable.fnUpdate('通过', nRow, 5, false);
                            var d = new Date(),str = '';
                            str += d.getFullYear()+'-';
                            str  += d.getMonth() + 1+'-';
                            str  += d.getDate()+' ';
                            str += d.getHours()+':';
                            str  += d.getMinutes()+':';
                            str+= d.getSeconds();
                            oTable.fnUpdate(str, nRow, 7, false);
                            var html = '<a class="commitCancel" userId="'+userId+'" href="javascript:;">取消</a>'; 
                            oTable.fnUpdate(html, nRow, 8, false);
                            oTable.fnDraw();
                        }
                        else if(result.errno==1){
                            showMsg("您没有权限");
                        }
                        else if(result.errno==2){
                            showMsg("提交参数不能为空,请填写后重新提交");
                        }
                        else if(result.errno==3){
                            showMsg("状态只能设置为 0 或者 1，请检查！");
                            showMsg("评论不存在，请检查！");
                        }
                        else if(result.errno==4){
                            showMsg("用户角色设置错误 只能为 1(代表商家) 或 2(代表普通用户)");
                        }
                        else if(result.errno==5){
                            showMsg("此申请不存在，请检查！");
                        }
                        else if(result.errno==6){
                            showMsg("审核通过失败");
                        }
                        else if(result.errno==7){
                            showMsg("用户不存在，请检查！");
                        }
                        else if(result.errno==8){
                            showMsg("用户角色设置失败");
                        }
                    },
                    error: function(obj, err) {
                        showMsg("系统异常，请稍后重试！");     
                    },
                });
            }

            function commentCancel(oTable, userId, nRow) {
                var data = {
                    "id"        : nRow.id,
                    'userId'    : userId,
                    "status"    : 0,
                    'userRole'  : 2,
                };
                $.ajax({
                    url: "/main/index.php?r=apply/auditApply",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        if(result.errno==0){
                            oTable.fnUpdate('未通过', nRow, 5, false);
                            var d = new Date(),str = '';
                            str += d.getFullYear()+'-';
                            str  += d.getMonth() + 1+'-';
                            str  += d.getDate()+' ';
                            str += d.getHours()+':';
                            str  += d.getMinutes()+':';
                            str+= d.getSeconds();
                            oTable.fnUpdate(str, nRow, 7, false);
                            var html = '<a class="commitPass" userId="'+userId+'" href="javascript:;">通过</a>'; 
                            oTable.fnUpdate(html, nRow, 8, false);
                            oTable.fnDraw();
                        }
                        else if(result.errno==1){
                            showMsg("您没有权限");
                        }
                        else if(result.errno==2){
                            showMsg("提交参数不能为空,请填写后重新提交");
                        }
                        else if(result.errno==3){
                            showMsg("状态只能设置为 0 或者 1，请检查！");
                            showMsg("评论不存在，请检查！");
                        }
                        else if(result.errno==4){
                            showMsg("用户角色设置错误 只能为 1(代表商家) 或 2(代表普通用户)");
                        }
                        else if(result.errno==5){
                            showMsg("此申请不存在，请检查！");
                        }
                        else if(result.errno==6){
                            showMsg("审核通过失败");
                        }
                        else if(result.errno==7){
                            showMsg("用户不存在，请检查！");
                        }
                        else if(result.errno==8){
                            showMsg("用户角色设置失败");
                        }
                    },
                    error: function(obj, err) {
                        showMsg("系统异常，请稍后重试！");     
                    },
                });
            }


            $('.commitPass').live('click', function (e) {
                e.preventDefault();
                var userId = $(this).attr('userId');
                var nRow = $(this).parents('tr')[0];
                commentPass(oTable, userId, nRow);
            });
            $('.commitCancel').live('click', function (e) {
                e.preventDefault();
                var userId = $(this).attr('userId');
                var nRow = $(this).parents('tr')[0];
                commentCancel(oTable, userId, nRow);
            });
        }
    };

}();
$(document).ready(function(){
    TableEditable.init();
});
