<?php 

define('SMARTY_VIEW_DIR',Yii::getPathOfAlias('application.views.smarty')); 
#require_once(Yii::getPathOfAlias('application.vendor.smarty').DIRECTORY_SEPARATOR.'Smarty.class.php'); 


class CSmarty extends Smarty { 

    const DS =DIRECTORY_SEPARATOR;     

    function __construct() {          
        parent::__construct();          
        $this->template_dir =SMARTY_VIEW_DIR.self::DS.'tpl';          
        $this->compile_dir =SMARTY_VIEW_DIR.self::DS.'tpl_c';          
        $this->caching = true;          
        $this->cache_dir =SMARTY_VIEW_DIR.self::DS.'cache';          
        $this->left_delimiter =  '{';          
        $this->right_delimiter = '}'; 
        $this->cache_lifetime = 3600;       
    }  

    function init() {
    } 
}
