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
                jqTds[0].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[0] + '">';
                jqTds[1].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[2] + '">';
                //jqTds[3].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[3] + '">';
                jqTds[3].innerHTML = '<textarea type="" class="input-xlarge">' + aData[3] + '</textarea>';
                jqTds[4].innerHTML = '<a class="edit" href="">保存</a>';
                jqTds[5].innerHTML = '<a class="cancel" href="">取消</a>';
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                var jqTextarea = $('textarea', nRow);
                //alert(nRow.parents().attr('data-id'));
                var data = {
                    "id"             : nRow.id,
                    "name"           : jqInputs[0].value,                    
                    "price"          : jqInputs[1].value,
                    "promotionPrice" : jqInputs[2].value,
                    "introduction"   : jqTextarea[0].value,
                };
                $.ajax({
                    url: "/main/index.php?r=goods/setting",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        if(result.errno==0){
                            nRow.id = result.data;
                            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                            oTable.fnUpdate(jqTextarea[0].value, nRow, 3, false);
                            oTable.fnUpdate('<a class="edit" href="">编辑</a>', nRow, 4, false);
                            oTable.fnUpdate('<a class="delete" href="">删除</a>', nRow, 5, false);
                            oTable.fnUpdate('<a class="picture" href="/main/index.php?r=goods/picture">管理图片</a>', nRow, 6, false);
                            oTable.fnDraw();
                            nEditing = null;
                        }else if(result.errno==1){
                            showMsg("数据格式不正确，请检查！");
                        }else if(result.errno==2){
                            showMsg("最多只能添加9个商品！");
                        }else{
                            showMsg("操作失败，请重试！");
                        }
                    },
                    error: function(obj, err) {
                        showMsg("系统异常，请稍后重试！");     
                    },
                });                
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate('<a class="edit" href="">编辑</a>', nRow, 4, false);
                oTable.fnDraw();
            }

            var dataid;
            var oTable = $('#goods_editable').dataTable({
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

            jQuery('#goods_editable_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#goods_editable_wrapper .dataTables_length select').addClass("m-wrap xsmall"); // modify table per page dropdown

            var nEditing = null;

            $('#goods_editable_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                        '<a class="edit" href="">编辑</a>', '<a class="cancel" data-mode="new" href="">取消</a>', ''
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#goods_editable a.delete').live('click', function (e) {
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
                    url: "/main/index.php?r=goods/delete",
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    success: function(result){
                        if(result.errno==0){
                            oTable.fnDeleteRow(nRow);
                        }
                        else if(result.errno==1){
                            showMsg("数据格式不正确，请检查！");
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

            $('#goods_editable a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#goods_editable a.picture').live('click', function (e) {
                e.preventDefault();
                var goodsId = $(this).parents('tr')[0].id;
                window.location.href = "/main/index.php?r=goods/picture&goodsId=" + goodsId;
                //$("#modal-container-picture").modal()
            });            

            $('#goods_editable a.edit').live('click', function (e) {
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
