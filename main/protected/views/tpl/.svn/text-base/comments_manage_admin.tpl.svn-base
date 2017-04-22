<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                评论管理
                <small>评论列表</small>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">评论管理</a> <span class="divider">&nbsp;</span>
                </li>
                <li>
                    <a href="#">评论列表</a><span class="divider-last">&nbsp;</span>
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
                    <h4><i class="icon-reorder"></i>对商店的评论</h4>
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
                    <table class="table table-striped table-bordered"  id="merchantCommentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>商家名称</th>
                                <th>商家级别</th>
                                <th>评论内容</th>
                                <th>评论状态</th>
                                <th>提交时间</th>
                                <th>审核时间</th>
                                <th style="min-width:60px">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <{foreach from=$merchantComments item=merchantComment name=mc}>
                        <tr id="<{$merchantComment.id}>">
                            <td><{$smarty.foreach.mc.iteration}></td>
                            <td><{$merchantComment.merchant.name}></td>
                            <{if $merchantComment.merchant.level eq 0}>
                            <td>未付费会员</td>
                            <{else if $merchantComment.merchant.level eq 1}>
                            <td>一级会员</td>
                            <{else if $merchantComment.merchant.level eq 2}>
                            <td>二级会员</td>
                            <{/if}>
                            <td><{$merchantComment.comment}></td>
                            <{if $merchantComment.status eq 0}>
                            <td>未通过</td>
                            <{else if $merchantComment.status eq 1}>
                            <td>通过</td>
                            <{/if}>
                            <td><{$merchantComment.createTime}></td>
                            <td><{$merchantComment.updateTime}></td>
                            <{if $merchantComment.status eq 0}>
                            <td><a class="commitPass" id="<{$merchantComment.id}>" 
                                table="merchantCommentTable" href="javascript:;">通过</a></td>
                            <{else}>
                            <td><a class="commitCancel" id="<{$merchantComment.id}>" 
                                table="merchantCommentTable" href="javascript:;">取消通过</a></td>
                            <{/if}>
                        </tr>
                        <{/foreach}>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END comments TABLE widget-->
            <!-- BEGIN comments TABLE widget-->
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i>对商店商品的评论</h4>
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
                    <table class="table table-striped table-bordered"  id="goodsCommentTable">
                        <thead>
                            <tr>
                               <th>#</th>
                               <th>商品名称</th>
                               <th>所属商店</th>
                               <th>评论内容</th>
                               <th>评论状态</th>
                               <th>提交时间</th>
                               <th>审核时间</th>
                               <th style="min-width:60px">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <{foreach from=$goodsComments item=goodsComment name=gc}>
                        <tr id="<{$goodsComment.id}>">
                            <td><{$smarty.foreach.gc.iteration}></td>
                            <td><{$goodsComment.goods.name}></td>
                            <td><{$goodsComment.merchant.name}></td>
                            <td><{$goodsComment.comment}></td>
                            <{if $goodsComment.status eq 0}>
                            <td>未通过</td>
                            <{else if $goodsComment.status eq 1}>
                            <td>通过</td>
                            <{/if}>
                            <td><{$goodsComment.createTime}></td>
                            <td><{$goodsComment.updateTime}></td>
                            <{if $goodsComment.status eq 0}>
                            <td><a class="commitPass" id="<{$goodsComment.id}>" 
                                table="goodsCommentTable" href="javascript:;">通过</a></td>
                            <{else}>
                            <td><a class="commitCancel" id="<{$goodsComment.id}>" 
                                table="goodsCommentTable" href="javascript:;">取消通过</a></td>
                            <{/if}>
                        </tr>
                        <{/foreach}>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END comments TABLE widget-->
            <!-- BEGIN comments TABLE widget-->
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i>对商店活动的评论</h4>
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
                    <table class="table table-striped table-bordered"  id="activityCommentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>活动名称</th>
                                <th>所属商店</th>
                                <th>评论内容</th>
                                <th>评论状态</th>
                                <th>提交时间</th>
                                <th>审核时间</th>
                                <th style="min-width:60px">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <{foreach from=$activityComments item=activityComment name=ac}>
                        <tr id="<{$activityComment.id}>">
                            <td><{$smarty.foreach.ac.iteration}></td>
                            <td><{$activityComment.activity.name}></td>
                            <td><{$activityComment.merchant.name}></td>
                            <td><{$activityComment.comment}></td>
                            <{if $activityComment.status eq 0}>
                            <td>未通过</td>
                            <{else if $activityComment.status eq 1}>
                            <td>通过</td>
                            <{/if}>
                            <td><{$activityComment.createTime}></td>
                            <td><{$activityComment.updateTime}></td>
                            <{if $activityComment.status eq 0}>
                            <td><a class="commitPass" id="<{$activityComment.id}>" 
                                table="activityCommentTable" href="javascript:;">通过</a></td>
                            <{else}>
                            <td><a class="commitCancel" id="<{$activityComment.id}>" 
                                table="activityCommentTable" href="javascript:;">取消通过</a></td>
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

<script src="js/comment-manage.js"></script>
