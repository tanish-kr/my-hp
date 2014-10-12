<?php
/**
 * smartyラッパークラス
 * @author tatsunori_nishikori
 */
namespace create\lib;
use Smarty;
class View {

    public static $smarty = null;

    function __construct(){
        if (function_exists('mb_internal_charset')) {
            mb_internal_charset('UTF-8');
        }
        define('SMARTY_RESOURCE_CHAR_SET', 'UTF-8');
        self::$smarty = new Smarty();
        self::$smarty->php_handling = Smarty::PHP_ALLOW;
        self::$smarty->error_reporting = E_ALL & ~E_NOTICE;
        self::$smarty->template_dir = dirname(dirname(__FILE__)).'/view/';
        self::$smarty->compile_dir  = dirname(dirname(dirname(dirname(__FILE__)))).'/templates_c/';
        self::$smarty->config_dir  = dirname(dirname(dirname(dirname(__FILE__)))).'/config/';
        self::$smarty->cache_dir  = dirname(dirname(dirname(dirname(__FILE__)))).'/cache/smarty';
        error_reporting(E_ALL & ~E_NOTICE);
        #        self::$smarty->debugging = true;
        self::$smarty->compile_check = true;
        ini_set('display_errors',1);
    }

    /**
     * smarty assign
     * @param string $key
     * @param string $val
     */
    public function assign($key,$val){
        self::$smarty->assign($key,$val);
    }

    /**
     * 配列を渡して一度にassignする
     * @param array $arr
     */
    public function arrayAssign($arr){
        foreach($arr as $key => $val){
            $this->assign($key,$val);
        }
    }

    /**
     * ファイル保存
     * @param string $tpl
     * @param string $filename
     */
    public function save($tpl,$filename){
        self::$smarty->registerClass('Helper', '\create\lib\Helper');
        $html = self::$smarty->fetch($tpl);
        try {
            file_put_contents($filename, $html);
            echo "Create file ".$filename."\n";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * view 出力
     * @param string $tpl
     */
    public function output($tpl){
        try{
            self::$smarty->registerClass('Helper', '\create\lib\Helper');
            self::$smarty->display($tpl);
        } catch (Exception $e){
            throw new Exception($e);
        }
    }
}
