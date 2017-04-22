<?php  
 
require_once(Yii::getPathOfAlias('application.extensions.smarty').DIRECTORY_SEPARATOR.'Smarty.class.php');  
define('SMARTY_VIEW_DIR', Yii::getPathOfAlias('application.views'));  
 
class CSmarty extends Smarty {  
    const DIR_SEP = DIRECTORY_SEPARATOR;  
    function __construct() {  
        parent::__construct();  
        $this->template_dir = SMARTY_VIEW_DIR.self::DIR_SEP.'tpl';  
        $this->compile_dir = SMARTY_VIEW_DIR.self::DIR_SEP.'tpl_compile';  
        $this->caching = false;  
        $this->cache_dir = SMARTY_VIEW_DIR.self::DIR_SEP.'cache';  
        $this->left_delimiter  =  '<{';  
        $this->right_delimiter =  '}>';  
        $this->cache_lifetime = 3600;  
    }  
    function init() {}  

    function showErrPage($title, $errMsg, $role){
        $this->smarty->assign('title', $title);
        $this->smarty->assign('username', Yii::app()->user->name);
        $this->smarty->assign('userRole', $role);    
        $this->smarty->assign('pageTpl', 'error.tpl');
        $this->smarty->assign('errMsg', $errMsg);
        $this->smarty->display('index.tpl'); 
        Yii::app()->end();        
    }
}  
