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
     <li><a href="#">评论列表</a><span class="divider-last">&nbsp;</span></li>
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
    <h4><i class="icon-reorder"></i>发表评论客户列表</h4>
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
       <th>用户名</th>
       <th>评论类型</th>
       <th>评论对象</th>
       <th>评论内容</th>
       <th>评分</th>
       <th>提交时间</th>
     </tr>
   </thead>
   <tbody>
    <{foreach from=$joinActivitys item=joinActivity name=foo}>
    <tr>
     <td><{$smarty.foreach.foo.iteration}></td>
     <td><{$joinActivity.name}></td>
     <td><{$joinActivity.phone}></td>
     <td><{$joinActivity.address}></td>
     <td><{$joinActivity.houseArea}></td>
     <td><{$joinActivity.createTime}></td>
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
