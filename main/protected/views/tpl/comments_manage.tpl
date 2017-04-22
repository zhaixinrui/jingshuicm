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
                    <h4><i class="icon-reorder"></i>对本商店的评论</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-bordered"  id="sample_1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>评论内容</th>
                                <th>评论状态</th>
                                <th>提交时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <{foreach from=$merchantComments item=merchantComment name=mc}>
                        <tr>
                            <td><{$smarty.foreach.mc.iteration}></td>
                            <td><{$merchantComment.comment}></td>
                            <td><{$merchantComment.status}></td>
                            <td><{$merchantComment.createTime}></td>
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
                    <h4><i class="icon-reorder"></i>对本商店商品的评论</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-bordered"  id="sample_2">
                        <thead>
                            <tr>
                                <th>#</th>
                               <th>商品名称</th>
                               <th>评论内容</th>
                               <th>评论状态</th>
                               <th>提交时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <{foreach from=$goodsComments item=goodsComment name=gc}>
                        <tr>
                            <td><{$smarty.foreach.gc.iteration}></td>
                            <td><{$goodsComment.goods.name}></td>
                            <td><{$goodsComment.comment}></td>
                            <td><{$goodsComment.status}></td>
                            <td><{$goodsComment.createTime}></td>
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
                    <h4><i class="icon-reorder"></i>对本商店活动的评论</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-bordered"  id="sample_3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>活动名称</th>
                                <th>评论内容</th>
                                <th>评论状态</th>
                                <th>提交时间</th>
                            </tr>
                        </thead>
                        <tbody>
                        <{foreach from=$activityComments item=activityComment name=ac}>
                        <tr>
                            <td><{$smarty.foreach.ac.iteration}></td>
                            <td><{$activityComment.activity.name}></td>
                            <td><{$activityComment.comment}></td>
                            <td><{$activityComment.status}></td>
                            <td><{$activityComment.createTime}></td>
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
