
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                用户申请管理
                <small>申请列表</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">用户申请管理</a> <span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">申请列表</a><span class="divider-last">&nbsp;</span>
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
                    <h4><i class="icon-reorder"></i>申请列表</h4>
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
                    <table class="table table-striped table-bordered"  id="applyList_edit">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>申请人</th>
                                <th>申请理由</th>
                                <th>E-Mail</th>
                                <th>联系电话</th>
                                <th>状态</th>
                                <th>申请时间</th>
                                <th>审核时间</th>
                                <th style="min-width:30px">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <{foreach from=$applies item=apply name=ay}>
                        <tr id="<{$apply.id}>">
                            <td><{$smarty.foreach.ay.iteration}></td>
                            <td><{$apply.username}></td>
                            <td><{$apply.content}></td>
                            <td><{$apply.email}></td>
                            <td><{$apply.phone}></td>
                            <{if $apply.status eq 0}>
                            <td>未通过</td>
                            <{else if $apply.status eq 1}>
                            <td>通过</td>
                            <{/if}>
                            <td><{$apply.createTime}></td>
                            <td><{$apply.updateTime}></td>
                            <{if $apply.status eq 0}>
                            <td><a class="commitPass" userId="<{$apply.userId}>" href="javascript:;">通过</a></td>
                            <{else}>
                            <td><a class="commitCancel" userId="<{$apply.userId}>" href="javascript:;">取消</a></td>
                            <{/if}>
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

<script src="js/apply-manage.js"></script>
