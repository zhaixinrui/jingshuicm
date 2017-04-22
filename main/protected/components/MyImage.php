<?php  

require_once(Yii::getPathOfAlias('application.extensions.image').DIRECTORY_SEPARATOR.'BaeImageService.class.php');  
require_once(Yii::getPathOfAlias('application.extensions.bcs').DIRECTORY_SEPARATOR.'bcs.class.php');  


class MyImage{  
    function __construct() {  
        $apiKey    = Yii::app()->params['apiKey'];
        $secretKey = Yii::app()->params['secretKey'];
        $imageHost = Yii::app()->params['imageHost'];
        $this->bcsHost   = Yii::app()->params['bcshost'];
        $this->bucket = Yii::app()->params['bcsBucket'];
        $this->baeImageService = new BaeImageService($apiKey, $secretKey, $imageHost);
    }  

    function init() {
    }  

    // 输出bcs上的图片，对图片进行变换，最后输出图像
    public function output($filename, $width = 0, $height = 0){
        /****1. 创建变换操作的对象BaeImageTransform****/
        $baeImageTransform = new BaeImageTransform();
        /****2. 设置变换参数****/
        //$baeImageTransform->setHue(50);
        $baeImageTransform->setQuality(70);
        if($width > 0)
            $baeImageTransform->setZooming(BaeImageConstant::TRANSFORM_ZOOMING_TYPE_WIDTH, $width);
        if($height > 0)
            $baeImageTransform->setZooming(BaeImageConstant::TRANSFORM_ZOOMING_TYPE_HEIGHT, $height);
        /****3. 执行变换操作****/
        $url = 'http://' . $this->bcsHost. '/' . $this->bucket . '/' . $filename;
        $retVal = $this->baeImageService->applyTransformByObject($url, $baeImageTransform);
        /****4. 获取返回结果****/
        if($retVal !==false && isset($retVal['response_params']) && isset($retVal['response_params']['image_data'])){
            header("Content-type:image/jpg");
            $imageSrc = base64_decode($retVal['response_params']['image_data']);
            echo $imageSrc;
        }else{
            echo 'transform failed, error:' . $this->baeImageService->errmsg() . "\n";
        }       
    }

    // 输出本地图片
    public function outputV2($fileName, $opt = null){
        list($width, $height) = getimagesize($fileName); //获取原图尺寸
        // 设置输出图片的尺寸
        if (!empty($opt['w']) && !empty($opt['h'])){
            $newwidth    = $opt['w'];
            $newheight   = $opt['h'];
        }else if (!empty($opt['p'])){
            $percent = $opt['p'];  //图片压缩比
            $newwidth = $width * $percent;
            $newheight = $height * $percent;
        }else{
            $newwidth = $width;
            $newheight = $height;
        }
        
        $iinfo=getimagesize($fileName,$iinfo);
        switch ($iinfo[2])
        {
            case 1:
                $src_im =imagecreatefromgif($fileName);
                break;
            case 2:
                $src_im =imagecreatefromjpeg($fileName);
                break;
            case 3:
                $src_im =imagecreatefrompng($fileName);
                break;
        //    case 6:
        //        $src_im =imagecreatefromwbmp($fileName);
        //        break;
            default:
                die("不支持的文件类型");
                exit;
        }
        $dst_im = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresized($dst_im, $src_im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        switch ($iinfo[2])
        {
            //$type_list = array("1"=>"gif","2"=>"jpg","3"=>"png","4"=>"swf","5" => "psd","6"=>"bmp","15"=>"wbmp");
            case 1:
                header("Content-type: image/jif");
                imagegif($dst_im);
                break;
            case 2:
                header("Content-type: image/jpeg");
                imagejpeg($dst_im); //输出压缩后的图片
                break;
            case 3:
                header("Content-type: image/png");
                imagepng($dst_im);
                break;
        //    case 6:
        //        imagewbmp($dst_im);
        //        break;
        //    case 15:
        //        image2wbmp($dst_im);
        //        break;
        }
        imagedestroy($dst_im);
        imagedestroy($src_im);
    }

}  
