<?php  
 
 
class Image {  
    function __construct() {  
    }  

    function init() {
    }  

    public function outputImage($fileName, $opt = null){
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

    public function handleImage($file){
        // 设置参数
        $watermark=1;      //是否附加水印(1为加水印,其他为不加水印);
        $waterstring="";  //水印字符串
        // 开始处理
        $image_file = $file["tmp_name"];
        $image_size  = getimagesize($image_file);
        $pinfo       = pathinfo($file["name"]);
        $pinfo = pathinfo($image_file);
        $fname = $pinfo['basename'];
        // 压缩
        $iinfo=getimagesize($image_file,$iinfo);
        $nimage=imagecreatetruecolor($image_size[0],$image_size[1]);
        $white=imagecolorallocate($nimage,255,255,255);
        imagefill($nimage,0,0,$white);
        switch ($iinfo[2])
        {
            case 1:
                $simage =imagecreatefromgif($image_file);
                break;
            case 2:
                $simage =imagecreatefromjpeg($image_file);
                break;
            case 3:
                $simage =imagecreatefrompng($image_file);
                break;
            //case 6:
            //    $simage =imagecreatefrombmp($image_file);
            //    break;
            default:
                die("不支持的文件类型");
                exit;
        }
        imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
        // 加水印字符串
        imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$white);
        // 保存图片
        switch ($iinfo[2])
        {
            case 1:
                //imagegif($nimage, $image_file);
                imagejpeg($nimage, $image_file);
                break;
            case 2:
                imagejpeg($nimage, $image_file);
                break;
            case 3:
                imagepng($nimage, $image_file);
                break;
            case 6:
                imagewbmp($nimage, $image_file);
                //imagejpeg($nimage, $image_file);
                break;
        }
        // 覆盖原上传文件
        imagedestroy($nimage);
        imagedestroy($simage);
        // 返回上传文件路径
        return $image_file;
    }
}  
