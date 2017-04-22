<?php 

// 云检索说明文档链接：http://developer.baidu.com/map/lbs-geosearch.htm

class MyLbs{
    const HTTP_METHOD_GET  = 0;
    const HTTP_METHOD_POST = 1;

    public function __construct(){
        $this->ak = Yii::app()->params['ak'];
        $this->geotable_id = Yii::app()->params['geotableId'];
    }

    private function generateQuerySting($arrData){
        $arrString = array();
        $arrData['ak'] = $this->ak;
        $arrData['geotable_id'] = $this->geotable_id;
        foreach ($arrData as $key => $value) {
            $arrString[] = "$key=".urlencode($value);
        }
        return join('&', $arrString);
    }

    // 请求lbs提供的接口
    private function callLbs($url, $arrData, $method = MyLbs::HTTP_METHOD_GET){ // 模拟获取内容函数      
        $curl = curl_init(); // 启动一个CURL会话     
        $data = ""; 
        if(MyLbs::HTTP_METHOD_GET === $method){
            $url = $url . '?' . $this->generateQuerySting($arrData);    // 拼接查询字符串  
            curl_setopt($curl, CURLOPT_HTTPGET, 1); // 发送一个常规的Post请求 
        }else{
            $data = $this->generateQuerySting($arrData);
            curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求      
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包             
        }
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址 
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转      
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer           
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环      
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容      
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回      
        $retInfo = curl_exec($curl); // 执行操作 

        // 请求失败     
        if (curl_errno($curl)) {      
            $errMsg = curl_error($curl) ;
            Yii::log("call $url $data fail, ret:".$errMsg, 'error', 'application.components.mylbs');
            return array('errno' => -1, 'msg' => curl_error($curl), 'data' => null);    
        }      
        curl_close($curl); // 关闭CURL会话  

        // 请求成功
        Yii::log("call $url $data success, ret:$retInfo", 'info', 'application.components.mylbs');
        $retInfo = json_decode($retInfo, true); 
        // 把返回结果中的status换成errno，
        $ret = array();
        if(isset($retInfo['status'])){
            $ret['errno'] = $retInfo['status'];
            unset($retInfo['status']);
        }else{
            $ret['errno'] = 0;
        }
        if(isset($retInfo['message'])){
            $ret['msg'] = $retInfo['message'];
            unset($retInfo['message']);
        }else{
            $ret['msg'] = 'success';
        } 
        $ret['data'] = $retInfo; 
        return $ret;        
    }  

    // 搜索坐标点附近的商家, $location => "经度，维度", $query => 附加查询信息
    public function searchNearby($arrData){
        $arrDefault = array('radius' => 10000, 'q' => null);
        $arrData    = array_merge($arrDefault, $arrData);  
        // $arrData['radius']   = 1000000;
        // $arrData['location'] = $location;
        // $arrData['query']    = $query;
        $url = "http://api.map.baidu.com/geosearch/v3/nearby";
        return $this->callLbs($url, $arrData);
    }   

    // 搜索特定区域的商家，$region => "区域（如海淀区）", $query => 附加查询信息
    public function searchRegion($arrData){
        $arrDefault = array('radius' => 10000, 'q' => null);
        $arrData    = array_merge($arrDefault, $arrData);
        $url = "http://api.map.baidu.com/geosearch/v3/local";        
        return $this->callLbs($url, $arrData);
    }  

    // 向地图中添加商户信息
    public function addMerchant($arrData){
        $url = "http://api.map.baidu.com/geodata/v3/poi/create";
        return $this->callLbs($url, $arrData, MyLbs::HTTP_METHOD_POST);
    }  

    // 修改地图中的商户信息
    public function updateMerchant($merchantId, $arrData){
        $url = "http://api.map.baidu.com/geodata/v3/poi/update";
        $arrData['merchantId'] = $merchantId;
        return $this->callLbs($url, $arrData, MyLbs::HTTP_METHOD_POST);
    }

    // 删除地图中的商户信息
    public function deleleMerchant($merchantId){
        $url = "http://api.map.baidu.com/geodata/v3/poi/update";
        return $this->callLbs($url, array('merchantId' => $merchantId), MyLbs::HTTP_METHOD_POST);
    }    
}

?>
