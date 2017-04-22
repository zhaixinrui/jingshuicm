var TableEditable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[8].innerHTML = '<input type="text" class="m-wrap small" value="">';
                jqTds[9].innerHTML = '<a class="edit" href="">保存</a> <a class="cancel" href="">取消</a>';
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                var data = {
                    "id"       : $(nRow).children('td')[0].innerHTML,
                    "password" : jqInputs[0].value,
                };
                if(data.password === ''){
                    showMsg("密码不能为空！");
                    return;
                }
                $.ajax({
                    url: "/main/index.php?r=site/SetPasswd",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        if(result.errno==0){
                            oTable.fnUpdate('******', nRow, 8, false);
                            oTable.fnUpdate('<a class="edit" href="">修改密码</a>', nRow, 9, false);
                            oTable.fnDraw();
                            nEditing = null;
                        }else if(result.errno==1){
                            showMsg("您不是管理员！");
                        }else if(result.errno==2){
                            showMsg("用户不存在！");
                        }else if(result.errno==3){
                            showMsg("更新数据库出错，请刷新后重试！");
                        }else if(result.errno==4){
                            showMsg("更新数据库出错，请刷新后重试！");
                        }else if(result.errno==5){
                            showMsg("提交参数错误！");
                        }                        
                    },
                    error: function(obj, err) {
                        showMsg("系统异常，请稍后重试！");     
                    },
                });                
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate('******', nRow, 8, false);
                oTable.fnUpdate('<a class="edit" href="">修改密码</a>', nRow, 9, false);
                oTable.fnDraw();
            }

            var dataid;
            var oTable = $('#user_editable').dataTable({
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/main/index.php?r=user/list",
                "aLengthMenu": [
                    [5, 10, 20],
                    [5, 10, 20,] // change per page values here
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
                ],
                "aoColumns": [
                    { "sClass": "center", "mDataProp": "id" },
                    { "sClass": "center", "mDataProp": "username" },
                    { "sClass": "center", "mDataProp": "nickname" },
                    { "sClass": "center", "mDataProp": "phone" },
                    { "sClass": "center", "mDataProp": "email" },
                    { "sClass": "center", "mDataProp": "role" },
                    { "sClass": "center", "mDataProp": "status" },
                    { "sClass": "center", "mDataProp": "createTime" },
                    { "sClass": "center", "mDataProp": "password", "sDefaultContent" : "******"},
                    { "sClass": "center", "mDataProp": "setpassword", "sDefaultContent" : '<a class="edit" href="javascript:;">修改密码</a>'},
                ],              
            });


            jQuery('#user_editable_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#user_editable_wrapper .dataTables_length select').addClass("m-wrap xsmall"); // modify table per page dropdown

            var nEditing = null;

            $('#user_editable_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                        '<a class="edit" href="">编辑</a>', '<a class="cancel" data-mode="new" href="">取消</a>', ''
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#user_editable a.delete').live('click', function (e) {
                e.preventDefault();
                if (confirm("确定要删除本商品吗?") == false) {
                    return;
                }
                var nRow = $(this).parents('tr')[0];
                var data = {"id":$(nRow).children('td')[0].innerHTML};
                if("" == data[""]){
                    // id为空表示该行是新建的，并没有在数据库存在，直接本地删除即可
                    oTable.fnDeleteRow(nRow);
                    return;
                }
                $.ajax({
                    url: "/main/index.php?r=user/delete",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        if(result.errno==0){
                            oTable.fnDeleteRow(nRow);
                        }
                        else if(result.errno==1){
                            showMsg("操作失败，请刷新后重试！");
                        }                        
                        else{
                            showMsg("操作失败，请重试！");
                        }
                    },
                    error: function(obj, err) {
                        showMsg("系统异常，请稍后重试！");     
                    },
                });
            });

            $('#user_editable a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#user_editable a.picture').live('click', function (e) {
                e.preventDefault();
                var userId = $(this).parents('tr')[0].id;
                window.location.href = "/main/index.php?r=user/picture&userId=" + userId;
                //$("#modal-container-picture").modal()
            });            

            $('#user_editable a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];
                var id = $(nRow).children('td')[0].innerHTML;
                //alert(id);
                //dataid = $(this).parent().parent().attr('data-id');
                //alert(dataid);

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "保存") {
                    /* Editing this row and want to save it */
                    saveRow(oTable, nEditing);
                    //alert("Updated! Do not forget to do some ajax to sync with backend :)");
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }

    };

}();
$(document).ready(function(){
    TableEditable.init();
});
