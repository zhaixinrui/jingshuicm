<?php

class ImageController extends Controller
{
    //图片上传
    public function actionUpload()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            //var_export($_FILES);
            if (!is_uploaded_file($_FILES["upfile"]["tmp_name"])){ //是否存在文件
                echo "图片不存在!请检查是否文件太大!";
                exit;
            }else{
                $srcFile   = $_FILES["upfile"]['tmp_name'];
                // 给图片改名，防止命名重复导致的覆盖
                $destFile = sprintf('%s.%s.%s', md5(Yii::app()->user->name), time(), md5($srcFile));
                $url       = Yii::app()->bcs->uploadFile($srcFile, $destFile);
                echo 'http://jingshuicm.duapp.com/main/index.php?r=image/view&sign='.$destFile;   
            }
        }else{
            $this->smarty->assign('title', '易人宜家 - 图片上传');
            $this->smarty->assign('username', Yii::app()->user->name);
            $this->smarty->display('image.tpl');
        }
    }
    
    // 调用bcs和image的接口展示图片，速度较慢
    // public function actionView()
    // {
    //     $width  = (empty($_GET['w'])) ? 0 : intval($_GET['w']);
    //     $height = (empty($_GET['h'])) ? 0 : intval($_GET['h']);
    //     if (isset($_GET['sign'])){
    //         Yii::app()->image->output($_GET['sign'], $width, $height);
    //     }
    // }   

    // 先从bcs上下载图片到本机，然后输出图片，最后删除之
    public function actionView()
    {
        if (isset($_GET['sign'])){
            $scrFile  = '/' . $_GET['sign'];
            $randStr = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
            $rand = substr($randStr,0,6);
            $destFile = '/tmp/' . $rand . $_GET['sign'];
            Yii::app()->bcs->getFile($scrFile, $destFile);
            $opt = null;
            if(!empty($_GET['w']))
                $opt['w'] = intval($_GET['w']);
            if(!empty($_GET['h']))
                $opt['h'] = intval($_GET['h']);
            if(!empty($_GET['p']))
                $opt['p'] = intval($_GET['p']);                            
            Yii::app()->image->outputV2($destFile, $opt);
            unlink($destFile);
        }
    }

    // public function actionUpload()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         //var_export($_FILES);
    //         if (!is_uploaded_file($_FILES["upfile"]["tmp_name"])){ //是否存在文件
    //             echo "图片不存在!请检查是否文件太大!";
    //             exit;
    //         }else{
    //             // 先对图像进行处理，返回处理完成后图像的保存位置
    //             //$srcFile = $this->image->handleImage($_FILES["upfile"]);
    //             // 给图片改名，防止命名重复导致的覆盖
    //             $imageName = sprintf('%s.%s.%s', Yii::app()->user->name, time(), urlencode($_FILES["upfile"]["name"]));
    //             $destFile = '/'.$imageName;
    //             $srcFile  = $_FILES["upfile"]['tmp_name'];
    //             //Yii::app()->myimage->saveImage($srcFile , $imageName);
    //             $url = $this->bcs->uploadFile($srcFile, $destFile);
    //             echo $url;
    //             echo 'http://jingshuicm.duapp.com/main/index.php?r=image/view1&sign='.$imageName;   
    //         }
    //     }else{
    //         $this->smarty->assign('title', '易人宜家 - 图片上传');
    //         $this->smarty->assign('username', Yii::app()->user->name);
    //         $this->smarty->display('image.tpl');
    //     }
    // }


 
}
?>
