<?php /* Smarty version Smarty-3.1.16, created on 2014-07-31 14:46:19
         compiled from "/root/jingshuicm/main/protected/views/tpl/merchant_setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116084683535d1eefdcda50-69795178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53a1c42d34b68004dd50f9a27be293cc9a1f0673' => 
    array (
      0 => '/root/jingshuicm/main/protected/views/tpl/merchant_setting.tpl',
      1 => 1405994970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116084683535d1eefdcda50-69795178',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_535d1eefe07dd5_47668573',
  'variables' => 
  array (
    'id' => 0,
    'name' => 0,
    'category' => 0,
    'phone' => 0,
    'address' => 0,
    'coordinate' => 0,
    'introduction' => 0,
    'merchantLevel' => 0,
    'logo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535d1eefe07dd5_47668573')) {function content_535d1eefe07dd5_47668573($_smarty_tpl) {?><script src="/main/js/ajaxFileUpload.js" type="text/javascript"></script>
<style>
#float_search_bar{
  z-index: 2012;
  position: absolute;
  width: 480px;
  height: 31px;
  background: url("http://dev.baidu.com/wiki/static/map/tuan/images/search_bar.png") repeat-x;
  background-position: 0 -21px;
  padding: 3px 0 0 10px;
}
</style>

<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
  <!-- BEGIN PAGE HEADER-->   
  <div class="row-fluid">
    <div class="span12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
        店铺管理
        <small>设置店铺信息</small>
      </h3>
      <ul class="breadcrumb">
        <li>
          <a href="/main/index.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
        </li>
        <li>
          <a href="#">店铺管理</a> <span class="divider">&nbsp;</span>
        </li>
        <li><a href="#">设置店铺信息</a><span class="divider-last">&nbsp;</span></li>
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
          <h4><i class="icon-reorder"></i>店铺信息修改</h4>
        </div>        
        <div class="widget-body" style="min-width:800px">
          <div class="row-fluid" >
            <div class="span6">
              <div class="alert alert-error hide"> 
                <a class="close" data-dismiss="alert" href="#">×</a>
                <div id="error-text"></div>
              </div>                
              <form class="form-horizontal">
                <fieldset>
                  <?php if ($_smarty_tpl->tpl_vars['id']->value!=null) {?>
                  <div class="control-group">
                    <label class="control-label" >店铺编号</label>
                    <div class="controls">
                      <input type="text"  class="input-large" disabled value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                    </div>
                  </div>                 
                  <?php }?>
                  <div class="control-group">
                    <!-- Text input-->
                    <label class="control-label" >店铺名称</label>
                    <div class="controls">
                      <input type="text" placeholder="请输入店铺名称" class="input-large" id="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
                    </div>
                  </div>
                  <div class="control-group">
                    <!-- Select Basic -->
                    <label class="control-label">经营品类</label>
                    <div class="controls">
                      <select class="input-large" id="category" value=<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
>
                        <option value ="家居卖场">家居卖场</option>
                        <option value ="家装公司">家装公司</option>
                        <option value ="家具">家具</option>
                        <option value ="地板">地板</option>
                        <option value ="陶瓷">陶瓷</option>
                        <option value ="门">门</option>
                        <option value ="卫浴洁具">卫浴洁具</option>
                        <option value ="厨房设备">厨房设备</option>
                        <option value ="油漆涂料">油漆涂料</option>
                        <option value ="照明">照明</option>
                        <option value ="家纺">家纺</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <!-- Text input-->
                    <label class="control-label" for="input01">联系方式</label>
                    <div class="controls">
                      <input type="text" placeholder="请输入店铺手机号" class="input-large" id="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
                      <p class="help-block"></p>
                    </div>
                  </div>
                  <div class="control-group">
                    <!-- Text input-->
                    <label class="control-label" for="input01">店铺地址</label>
                    <div class="controls">
                      <div class="input-append">
                       <input class="m-wrap input-medium" type="text" placeholder="请输入店铺地址" id="address"  value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
">
                       <button class="btn green" type="button" id="search_button">定位</button>
                     </div>
                   </div>
                 </div>
                 <div class="control-group">
                  <!-- Text input-->
                  <label class="control-label" for="input01">店铺坐标</label>
                  <div class="controls">
                    <input id="coordinate" type="text" placeholder="请在地图上标注店铺的坐标" class="input-large" disabled id="coordinate"  value="<?php echo $_smarty_tpl->tpl_vars['coordinate']->value;?>
">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="control-group">
                  <!-- Textarea -->
                  <label class="control-label">店铺简介</label>
                  <div class="controls">
                    <div class="textarea">
                      <textarea type="" class="input-large"  id="introduction"><?php echo $_smarty_tpl->tpl_vars['introduction']->value;?>
</textarea>
                    </div>
                  </div>
                </div>
                
                <?php if ($_smarty_tpl->tpl_vars['merchantLevel']->value!=3) {?>      
                <div class="control-group">
                  <label class="control-label">店铺Logo</label>
                  <div class="controls">
                    <img id="logopic" src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" alt="商品照片" style="width:50px;height:50px;"/>
                  </div>
                </div>                                  
                <div class="control-group">
                  <label class="control-label">设置Logo</label>
                  <div class="controls">
                   <input id="merchantLogo" name="merchantLogo" type="file" class"input-medium"/> 
                   <button type="button" name="submit" class="btn btn-info" onclick="uploadMerchantLogo()">上传</button>
                 </div>
               </div>                
               <?php }?>

               <div class="control-group">
                <!-- Button -->
                <div class="controls">
                  <button type="button" name="submit" class="btn btn-info" onclick="setting()">确认修改</button>
                  <button type="button" name="submit" class="btn btn-warning" onclick="claerInput()">重置</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
        <div class="span5" >              
                <!--<div id="float_search_bar" class="input-prepend input-append">
                <span class="add-on">区域</span>
                <input type="text" id="keyword1">
                <button id="search_button1">查找</button>
              </div>-->
              <div id="map_container" style="width:385px;height:385px;border: 1px solid #bfd2e1;"></div>
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
<script src="js/merchant_setting.js"></script> 
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=9T1vjoLmOdgge9G91pLc4DRA"></script>
<script type="text/javascript">

var category = document.getElementById('category');
for(var i=0;i<category.options.length;i++){
  if(category.options[i].innerHTML == "<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
"){
    category.options[i].selected = true;
    break;
  }
}
// 百度地图API功能
var map = new BMap.Map("map_container");
//var coordinate;
if("" == "<?php echo $_smarty_tpl->tpl_vars['coordinate']->value;?>
"){
  var coordinate = new Array(116.404, 39.915);
}else{
  var coordinate = "<?php echo $_smarty_tpl->tpl_vars['coordinate']->value;?>
".split(',');
}
//map.centerAndZoom(new BMap.Point(116.404, 39.915), 14);
var point = new BMap.Point(coordinate[0], coordinate[1]);
map.centerAndZoom(point, 13);
map.enableScrollWheelZoom();                            //启用滚轮放大缩小
map.addOverlay(new BMap.Marker(point));
map.addOverlay(getOverlay(point));             // 将标注添加到地图中

// 点击地图后提取坐标
map.addEventListener("click", function(e){
  map.clearOverlays();
  map.addOverlay(new BMap.Marker(e.point));
  map.addOverlay(getOverlay(e.point));  
  document.getElementById("coordinate").value = e.point.lng + ", " + e.point.lat;
});

function getOverlay(point){
  var opts = {
        position : point,    // 指定文本标注所在的地理位置
        offset   : new BMap.Size(0, -30)    //设置文本偏移量
      }
    var label = new BMap.Label("拖动改变地址", opts);  // 创建文本标注对象
    label.setStyle({
     color : "red",
     fontSize : "12px",
     height : "20px",
     lineHeight : "20px",
     fontFamily:"微软雅黑"
   });
    return label;
  }
// document.getElementById("search_button").onclick = function(){
//   // 创建地址解析器实例
//   var myGeo = new BMap.Geocoder();
//   var point = null;
//   // 将地址解析结果显示在地图上,并调整地图视野
//   var keyword = document.getElementById("address").value;
//   myGeo.getPoint(keyword, function(point){
//     if (point) {
//       map.centerAndZoom(point, 13);
//       map.clearOverlays();
//       map.addOverlay(new BMap.Marker(point));
//       map.addOverlay(getOverlay(point));
//       document.getElementById("coordinate").value = point.lng + ", " + point.lat;
//     } else {
//       alert("无结果");
//     }
//   }, "全国");
// };

// 设置店铺坐标，方法二，点击地图内的搜索框设置地图
// 设置搜索事件
var local = new BMap.LocalSearch(map, {
  renderOptions:{map: map},
  pageCapacity: 1
});
// local.setSearchCompleteCallback(function(results){
//        if(local.getStatus() !== BMAP_STATUS_SUCCESS){
//            alert("无结果");
//        } else {
//            map.clearOverlays();
//            //marker.hide();
//        }
// });
local.setMarkersSetCallback(function(pois){
  map.clearOverlays();
    //for(var i=pois.length; i--; ){
      if(pois.length > 0){
        var marker = pois[0].marker;
        var point  = marker.S;
        if (point) {
          map.centerAndZoom(point, 12);
          map.clearOverlays();
          map.addOverlay(new BMap.Marker(point));
          map.addOverlay(getOverlay(point));
          document.getElementById("coordinate").value = point.lng + ", " + point.lat;
        } else {
          alert("无结果");
        }        
        marker.addEventListener("click", function(e){
          marker_trick = true;
          var pos = this.getPosition();
          document.getElementById("coordinate").value = pos.lng + ", " + pos.lat;
        });
      }else{
        alert("无结果");
      }
    });
document.getElementById("search_button").onclick = function(){
  local.search(document.getElementById("address").value);
};

</script>
<?php }} ?>
