<?php  
 
require_once(Yii::getPathOfAlias('application.extensions.bcs').DIRECTORY_SEPARATOR.'bcs.class.php');  
 
function bcs_log($log){
    Yii::trace($log, 'application.components.CBcs');
}

class CBcs extends BaiduBCS {  
    public $bucket;
    public $opt;
    function __construct() {  
        parent::__construct();  
        $this->bucket = Yii::app()->params['bcsBucket'];
    	$this->opt = array ();
    	$this->opt['acl'] = BaiduBCS::BCS_SDK_ACL_TYPE_PUBLIC_READ;
    	$this->opt[BaiduBCS::IMPORT_BCS_LOG_METHOD] = 'bcs_log';
    	$this->opt['curlopts'] = array (
    			CURLOPT_CONNECTTIMEOUT => 10, 
    			CURLOPT_TIMEOUT => 1800 );
    }  

    function init() {
    }  

    public function uploadFile($srcFile, $destFile) {
        //$response = $this->get_bucket_acl($this->bucket, $this->opt);
        //$this->printResponse($response);
        $destFile = '/' . $destFile;
        echo $destFile;
        exit;
    	$response = $this->create_object($this->bucket, $destFile, $srcFile, $this->opt);
        //$this->printResponse($response);
	    //$response = $this->set_object_acl($this->bucket, $destFile, $this->opt['acl'], $this->opt);
        //$this->printResponse($response);
        if($response->isOK()){
            return $this->generate_get_object_url($this->bucket,$destFile);
            //return $destFile;
        }else{
            return null;
        }
    }

    // $srcFile  => bcs中存储的对象名
    // $destFile => 下载到本机后的文件名
    public function getFile($srcFile, $destFile) {
        $this->opt['fileWriteTo'] = $destFile;
        $response = $this->get_object($this->bucket, $srcFile, $this->opt);
        if($response->isOK()){
            return true;
        }else{
            return null;
        }
    }

    public function printResponse($response) {
        echo $response->isOK () ? "OK\n" : "NOT OK\n";
        echo 'Status:' . $response->status . "\n";
        echo 'Body:' . $response->body . "\n";
        echo "Header:\n";
        var_dump ( $response->header );
    }
}  
