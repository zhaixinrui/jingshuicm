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
                jqTds[2].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '<a class="edit" href="">保存</a> | <a class="cancel" href="">取消</a>' ;
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                
                var data = {
                    "id"         : nRow.id,
                    "activityId" : jqInputs[0].value,
                };
                $.ajax({
                    url: "/main/index.php?r=hotActivity/setting",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        var item = '<a class="edit" href="javascript:;">设置活动ID</a> | ' +
                        '<a class="picManage" href="/main/index.php?r=hotActivity/picture&hotActivityId=' + nRow.id +
                        '">管理图片</a>';
                        if(result.errno==0){
                            oTable.fnUpdate(jqInputs[0].value, nRow, 2, false);
                            oTable.fnUpdate(item, nRow, 3, false);
                            oTable.fnDraw();
                            nEditing = null;
                        }
                        else if(result.errno==1){
                            showMsg("活动不存在，请重新填写已存在的活动号");
                        } else {
                            showMsg("系统异常，请稍后重试！");
                        }
                    },
                    error: function(obj, err) {
                        showMsg("系统异常，请稍后重试！");     
                    },
                });
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                var item = '<a class="edit" href="javascript:;">设置活动ID</a> | ' +
                '<a class="picManage" href="javascript:;">管理图片</a>';
                oTable.fnUpdate(item, nRow, 3, false);
                oTable.fnDraw();
            }

            var dataid;
            var oTable = $('#activitylist_editable').dataTable({
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

            jQuery('#activitylist_editable_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#activitylist_editable_wrapper .dataTables_length select').addClass("m-wrap xsmall"); // modify table per page dropdown

            var nEditing = null;

            $('#activitylist_editable_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                        '<a class="edit" href="">编辑</a>', '<a class="cancel" data-mode="new" href="">取消</a>', ''
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#activitylist_editable a.delete').live('click', function (e) {
                e.preventDefault();
                if (confirm("确定要删除本商品吗?") == false) {
                    return;
                }
                var nRow = $(this).parents('tr')[0];
                var data = {"id":nRow.id};
                if("" == data[""]){
                    // id为空表示该行是新建的，并没有在数据库存在，直接本地删除即可
                    oTable.fnDeleteRow(nRow);
                    return;
                }
                $.ajax({
                    url: "/main/index.php?r=ranklist/delete",
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

            $('#activitylist_editable a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#activitylist_editable a.picture').live('click', function (e) {
                e.preventDefault();
                var ranklistId = $(this).parents('tr')[0].id;
                window.location.href = "/main/index.php?r=ranklist/picture&ranklistId=" + ranklistId;
                //$("#modal-container-picture").modal()
            });            

            $('#activitylist_editable a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];
                //alert(nRow.id);
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
