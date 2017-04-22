
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                活动管理
                <small>活动列表</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">活动管理</a> <span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">活动列表</a><span class="divider-last">&nbsp;</span>
                </li>
            </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->

    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid" >
        <div class="span12">
            <!-- BEGIN comments TABLE widget-->
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i>活动管理</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <div class="alert alert-error hide">
                        <a class="close" data-dismiss="alert" href="#">×</a>
                        <div id="error-text"> </div>
                    </div>

                    <table class="table table-striped table-bordered"  id="activitylist_editable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>活动名称</th>
                                <th>活动类型</th>
                                <th>发起商家</th>
                                <th>联系电话</th>
                                <th>有效时间</th>
                                <th>创建时间</th>
                                <th style="min-width:60px">推广费用</th>
                                <th style="min-width:75px">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <{foreach from=$activities item=activity name=ac}>
                        <tr id="<{$activity.id}>">
                            <td><{$activity.id}></td>
                            <td><{$activity.name}></td>
                            <td><{$activity.merchant.category}></td>
                            <td><{$activity.merchant.name}></td>
                            <td><{$activity.phone}></td>
                            <td><{$activity.period}></td>
                            <td><{$activity.createTime}></td>
                            <td><{$activity.promotionExpenses}></td>
                            <td><a class="edit" href="javascript:;">设置推广费</a></td>
                        </tr>
                        <{/foreach}>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END comments TABLE widget-->
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->

<script src="js/activity-manage.js"></script>
