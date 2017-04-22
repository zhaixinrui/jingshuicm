var TableEditable = function () {

    return {
        init: function () {
            var merchantCommentTable = $('#merchantCommentTable').dataTable({
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
           
            var activityCommentTable = $('#activityCommentTable').dataTable({
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

            var goodsCommentTable = $('#goodsCommentTable').dataTable({
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


            function commentPass(table, id, nRow) {
                var oTable;
                if (table == 'merchantCommentTable') {
                    oTable = merchantCommentTable;
                } else if (table == 'goodsCommentTable') {
                    oTable = goodsCommentTable;
                } else if (table == 'activityCommentTable') {
                   oTable = activityCommentTable;
                }
                var data = {
                    "id"        : id,
                    "status"    : 1,
                };
                $.ajax({
                    url: "/main/index.php?r=comment/auditComment",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        if(result.errno==0){
                            oTable.fnUpdate('通过', nRow, 4, false);
                            var d = new Date(),str = '';
                            str += d.getFullYear()+'-';
                            str  += d.getMonth() + 1+'-';
                            str  += d.getDate()+' ';
                            str += d.getHours()+':';
                            str  += d.getMinutes()+':';
                            str+= d.getSeconds();
                            oTable.fnUpdate(str, nRow, 6, false);
                            var html = '<a class="commitCancel" id="'+id+'" table="'+table+'" href="javascript:;">取消通过</a>'; 
                            oTable.fnUpdate(html, nRow, 7, false);
                            oTable.fnDraw();
                        }
                        else if(result.errno==1){
                            showMsg("提交参数不能为空,请填写后重新提交");
                        }
                        else if(result.errno==2){
                            showMsg("评论不存在，请检查！");
                        }
                        else if(result.errno==3){
                            showMsg("您没有权限");
                        }
                        else if(result.errno==4){
                            showMsg("状态值设置错误 只能为 0 或 1");
                        }
                    },
                    error: function(obj, err) {
                        showMsg("系统异常，请稍后重试！");     
                    },
                });
            }

            function commentCancel(table, id, nRow) {
                var oTable;
                if (table == 'merchantCommentTable') {
                    oTable = merchantCommentTable;
                } else if (table == 'goodsCommentTable') {
                    oTable = goodsCommentTable;
                } else if (table == 'activityCommentTable') {
                   oTable = activityCommentTable;
                }
                var data = {
                    "id"        : id,
                    "status"    : 0,
                };
                $.ajax({
                    url: "/main/index.php?r=comment/auditComment",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        if(result.errno==0){
                            oTable.fnUpdate('未通过', nRow, 4, false);
                            var d = new Date(),str = '';
                            str += d.getFullYear()+'-';
                            str  += d.getMonth() + 1+'-';
                            str  += d.getDate()+' ';
                            str += d.getHours()+':';
                            str  += d.getMinutes()+':';
                            str+= d.getSeconds();
                            oTable.fnUpdate(str, nRow, 6, false);
                            var html = '<a class="commitPass" id="'+id+'" table="'+table+'" href="javascript:;">通过</a>'; 
                            oTable.fnUpdate(html, nRow, 7, false);
                            oTable.fnDraw();
                        }
                        else if(result.errno==1){
                            showMsg("提交参数不能为空,请填写后重新提交");
                        }
                        else if(result.errno==2){
                            showMsg("评论不存在，请检查！");
                        }
                        else if(result.errno==3){
                            showMsg("您没有权限");
                        }
                        else if(result.errno==4){
                            showMsg("评论状态值设置错误 只能为 0 或 1");
                        }
                    },
                    error: function(obj, err) {
                        showMsg("系统异常，请稍后重试！");     
                    },
                });
            }


            $('.commitPass').live('click', function (e) {
                e.preventDefault();
                var id = $(this).attr('id');
                var table = $(this).attr('table');
                var nRow = $(this).parents('tr')[0];
                commentPass(table, id, nRow);
            });
            $('.commitCancel').live('click', function (e) {
                e.preventDefault();
                var id = $(this).attr('id');
                var table = $(this).attr('table');
                var nRow = $(this).parents('tr')[0];
                commentCancel(table, id, nRow);
            });
        }
    };

}();
$(document).ready(function(){
    TableEditable.init();
});
