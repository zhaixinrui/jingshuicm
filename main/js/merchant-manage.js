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
                // jqTds[0].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[0] + '">';
                // jqTds[1].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[1] + '">';
                // jqTds[2].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[2] + '">';
                jqTds[5].innerHTML = '<input type="text" class="m-wrap small" value="' + aData["level"] + '">';
                jqTds[6].innerHTML = '<a class="edit" href="">保存</a>';
                //jqTds[7].innerHTML = '<a class="cancel" href="">取消</a>';
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                var id = $(nRow).children('td')[0].innerHTML;
                //alert(nRow.parents().attr('data-id'));
                var data = {
                    "merchantId"        : id,
                    // "name"           : jqInputs[0].value,                    
                    // "price"          : jqInputs[1].value,
                    // "promotionPrice" : jqInputs[2].value,
                    "merchantLevel"     : jqInputs[0].value,
                };
                $.ajax({
                    url: "/main/index.php?r=merchant/setMerchantLevel",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        //alert(result.errno);
                        if(result.errno==0){
                            // nRow.id = result.data;
                            // oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                            // oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                            // oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                            oTable.fnUpdate(jqInputs[0].value, nRow, 5, false);
                            oTable.fnUpdate('<a class="edit" href="javascript:;">级别设置</a>', nRow, 6, false);
                            // oTable.fnUpdate('<a class="delete" href="">删除</a>', nRow, 5, false);
                            oTable.fnDraw();
                            nEditing = null;
                        }
                        else if(result.errno==1){
                            showMsg("提交参数不能为空,请填写后重新提交");
                        }
                        else if(result.errno==2){
                            showMsg("商家不存在，请检查！");
                        }
                        else if(result.errno==3){
                            showMsg("您没有权限");
                        }
                        else if(result.errno==4){
                            showMsg("商家级别只能设置为1 2 3");
                        }
                    },
                    error: function(obj, err) {
                        showMsg("系统异常，请稍后重试！");     
                    },
                });                
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                // oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                // oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                // oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
                oTable.fnUpdate('<a class="edit" href="javascript:;">级别设置</a>', nRow, 6, false);
                oTable.fnDraw();
            }

            var dataid;
            var oTable = $('#merchantlist_editable').dataTable({
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/main/index.php?r=merchant/list",
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
                    { "sClass": "center", "mDataProp": "name" },
                    { "sClass": "center", "mDataProp": "username" },
                    { "sClass": "center", "mDataProp": "phone" },
                    { "sClass": "center", "mDataProp": "address" },
                    { "sClass": "center", "mDataProp": "level" },
                    { "sClass": "center", "mDataProp": "setlevel", "sDefaultContent" : '<a class="edit" href="javascript:;">级别设置</a>'},
                    { "sClass": "center", "mDataProp": "delete", "sDefaultContent" : '<a class="delete" href="javascript:;">删除</a>'},
                ], 
            });

            jQuery('#merchantlist_editable_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#merchantlist_editable_wrapper .dataTables_length select').addClass("m-wrap xsmall"); // modify table per page dropdown

            var nEditing = null;

            $('#merchantlist_editable_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                        '<a class="edit" href="">编辑</a>', '<a class="cancel" data-mode="new" href="">取消</a>', ''
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#merchantlist_editable a.delete').live('click', function (e) {
                e.preventDefault();
                if (confirm("确定要删除本商品吗?") == false) {
                    return;
                }
                var nRow = $(this).parents('tr')[0];
                var id   = $(nRow).children('td')[0].innerHTML;
                var data = {"merchantId":id};
                if("" == data["merchantId"]){
                    // merchantId为空表示该行是新建的，并没有在数据库存在，直接本地删除即可
                    oTable.fnDeleteRow(nRow);
                    return;
                }
                $.ajax({
                    url: "/main/index.php?r=merchant/delete",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        if(result.errno==0){
                            oTable.fnDeleteRow(nRow);
                        }
                        else if(result.errno==1){
                            showMsg("商户不存在！");
                        }   
                        else if(result.errno==2){
                            showMsg("请求参数错误！");
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

            $('#merchantlist_editable a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#merchantlist_editable a.picture').live('click', function (e) {
                e.preventDefault();
                var ranklistId = $(this).parents('tr')[0].id;
                window.location.href = "/main/index.php?r=ranklist/picture&ranklistId=" + ranklistId;
                //$("#modal-container-picture").modal()
            });            

            $('#merchantlist_editable a.edit').live('click', function (e) {
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
