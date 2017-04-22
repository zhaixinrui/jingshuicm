
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                热门活动管理
                <small>活动列表</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">热门活动管理</a> <span class="divider">&nbsp;</span>
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
                    <h4><i class="icon-reorder"></i>热门活动管理</h4>
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
                                <th>编号</th>
                                <th>活动类型</th>
                                <th>活动Id</th>
                                <th style="min-width:160px">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <{foreach from=$hotActivities item=activity name=hac}>
                        <tr id="<{$activity.id}>">
                            <td><{$activity.id}></td>
                            <td><{$activity.category}></td>
                            <td><{$activity.activityId}></td>
                            <td>
                                <a class="edit" href="javascript:;">设置活动ID</a> |
                                <a class="picManage" 
                                href="/main/index.php?r=hotActivity/picture&hotActivityId=<{$activity.id}>">管理图片</a>
                            </td>
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

<script src="js/hotactivity_manage.js"></script>
