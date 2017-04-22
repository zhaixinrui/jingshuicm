<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
    <div class="span12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
        活动管理
        <small>设置活动信息</small>
      </h3>
      <ul class="breadcrumb">
        <li>
          <a href="/main/index.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
        </li>
        <li>
          <a href="#">活动管理</a> <span class="divider">&nbsp;</span>
        </li>
        <li><a href="#">设置活动信息</a><span class="divider-last">&nbsp;</span></li>
      </ul>
      <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
  </div>
  <!-- END PAGE HEADER-->
  <!-- BEGIN PAGE CONTENT-->
  <div class="row-fluid" >
    <div class="span12">
      <div class="widget">
        <div class="widget-title">
          <h4><i class="icon-reorder"></i>活动信息修改</h4>
        </div>        
        <div class="widget-body">
          <div class="row-fluid" >
            <div class="span12">
              <div class="alert alert-error hide"> 
                <a class="close" data-dismiss="alert" href="#">×</a>
                <div id="error-text"></div>
              </div>                
              <form class="form-horizontal">
                <fieldset>
                  <{if $id ne ""}>
                  <div class="control-group">
                    <label class="control-label" >活动编号</label>
                    <div class="controls">
                      <input type="text"  class="input-xlarge" disabled value="<{$id}>">
                    </div>
                  </div>                 
                  <{/if}>                  
                  <div class="control-group">
                    <!-- Text input-->
                    <label class="control-label" >活动名称</label>
                    <div class="controls">
                      <input type="text" placeholder="请输入活动名称" class="input-xlarge" id="name" value="<{$name}>">
                    </div>
                  </div>
                  <div class="control-group">
                    <!-- Text input-->
                    <label class="control-label" for="input01">联系方式</label>
                    <div class="controls">
                      <input type="text" placeholder="请输入活动报名手机号" class="input-xlarge" id="phone" value="<{$phone}>">
                      <p class="help-block"></p>
                    </div>
                  </div>
                  <div class="control-group">
                    <!-- Text input-->
                    <label class="control-label" for="input01">活动地址</label>
                    <div class="controls">
                      <input type="text" placeholder="请输入活动地址" class="input-xlarge" id="address"  value="<{$address}>">
                      <p class="help-block"></p>
                    </div>
                  </div>
                  <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />                
                  <div class="control-group">
                    <label class="control-label">活动起止日期</label>
                    <div class="controls">
                      <div class="input-prepend">
                        <span class="add-on"><i class="icon-calendar"></i></span><input type="text" class=" m-ctrl-medium date-range" style="width:244px" id="period" value="<{$period}>"/>
                      </div>
                    </div>
                  </div>                
                  <div class="control-group">
                    <!-- Textarea -->
                    <label class="control-label">活动详情</label>
                    <div class="controls">
                      <div class="textarea">
                        <textarea type="" class="" style="width:270px" id="introduction"><{$introduction}></textarea>
                      </div>
                    </div>
                  </div>              
                  <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                      <button type="button" name="submit" class="btn btn-info" onclick="setting()">确认修改</button>
                      <button type="button" name="submit" class="btn btn-warning" onclick="claerInput()">重置</button>
                      <{if $id ne ""}>
                          <a type="button" href="/main/index.php?r=activity/picture&activityId=<{$id}>" class="btn btn-info">设置图片</a>
                      <{else}>
                          <a type="button" href="#" onclick="alert('请先保存活动信息后再修改图片')" class="btn btn-info">设置图片</a>                      
                      <{/if}> 
                    </div>
                  </div>
                </fieldset>
              </form>             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->
<!DOCTYPE html>
<script src="js/activity_setting.js"></script> 