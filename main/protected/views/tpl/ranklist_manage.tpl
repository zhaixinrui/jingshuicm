
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->
  <div class="row-fluid">
   <div class="span12">
     <!-- BEGIN THEME CUSTOMIZER-->
     <div id="theme-change" class="hidden-phone">
       <i class="icon-cogs"></i>
       <span class="settings">
        <span class="text">Theme:</span>
        <span class="colors">
          <span class="color-default" data-style="default"></span>
          <span class="color-gray" data-style="gray"></span>
          <span class="color-purple" data-style="purple"></span>
          <span class="color-navy-blue" data-style="navy-blue"></span>
        </span>
      </span>
    </div>
    <!-- END THEME CUSTOMIZER-->
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
    <h3 class="page-title">
     排行榜管理
     <small>排行榜列表</small>
   </h3>
   <ul class="breadcrumb">
     <li>
       <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
     </li>
     <li>
       <a href="#">排行榜管理</a> <span class="divider">&nbsp;</span>
     </li>
     <li><a href="#">排行榜列表</a><span class="divider-last">&nbsp;</span></li>
   </ul>
   <!-- END PAGE TITLE & BREADCRUMB-->
 </div>
</div>
<!-- END PAGE HEADER-->

<!-- BEGIN ADVANCED TABLE widget-->
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN EXAMPLE TABLE widget-->
    <div class="widget">
      <div class="widget-title">
        <h4><i class="icon-reorder"></i>排行榜列表</h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
        </span>
      </div>
      <div class="widget-body">
        <div class="portlet-body">
          <div class="alert alert-error hide"> 
            <a class="close" data-dismiss="alert" href="#">×</a>
            <div id="error-text"></div>
          </div> 
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="ranklist_editable">
            <thead>
              <tr>
                <th>排名</th>
                <th>品类</th>
                <th>排序依据</th>                
                <th>商家编号</th>
                <th style="min-width:30px">编辑</th>
              </tr>
            </thead>
            <tbody>
              <{foreach from=$ranklist item=rankItem}>
              <tr id="<{$rankItem.id}>">
                <td><{$rankItem.rank}></td>
                <td><{$rankItem.category}></td>
                <td><{$rankItem.type}></td>             
                <td><{$rankItem.merchantId}></td>
                <td><a class="edit" href="javascript:;">编辑</a></td>
              </tr>
              <{/foreach}>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- END EXAMPLE TABLE widget-->
  </div>
</div>

<!-- END ADVANCED TABLE widget-->

<!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->


<script src="js/ranklist-table-editable.js"></script>
