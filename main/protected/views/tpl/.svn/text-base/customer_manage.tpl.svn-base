<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
   <div class="span12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title">
     客户管理
     <small>客户列表</small>
   </h3>
   <ul class="breadcrumb">
     <li>
       <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
     </li>
     <li>
       <a href="#">客户管理</a> <span class="divider">&nbsp;</span>
     </li>
     <li><a href="#">客户列表</a><span class="divider-last">&nbsp;</span></li>
   </ul>
   <!-- END PAGE TITLE & BREADCRUMB-->
 </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid" >
 <div class="span12">
  <!-- BEGIN joinActivity TABLE widget-->
  <div class="widget">
   <div class="widget-title">
    <h4><i class="icon-reorder"></i>参加活动客户列表</h4>
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
       <th>客户称呼</th>
       <th>联系方式</th>
       <th>家庭住址</th>
       <th>房屋面积</th>
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
<!-- END joinActivity TABLE widget-->

  <!-- BEGIN OrderGoods TABLE widget-->
  <div class="widget">
   <div class="widget-title">
    <h4><i class="icon-reorder"></i>订购商品客户列表</h4>
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
       <th>客户称呼</th>
       <th>联系方式</th>
       <th>家庭住址</th>
       <th>房屋面积</th>
       <th>提交时间</th>
     </tr>
   </thead>
   <tbody>
    <{foreach from=$orderGoods item=orderGood name=og}>
    <tr>
     <td><{$smarty.foreach.og.iteration}></td>
     <td><{$orderGood.goodsName}></td>
     <td><{$orderGood.name}></td>
     <td><{$orderGood.phone}></td>
     <td><{$orderGood.address}></td>
     <td><{$orderGood.houseArea}></td>
     <td><{$orderGood.createTime}></td>
   </tr>
   <{/foreach}>
 </tbody>
</table>
</div>
</div>
<!-- END OrderGoods TABLE widget-->
</div>
</div>
<!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->
