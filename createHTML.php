#!/usr/bin/php
<?php
    try{
        require_once  dirname(__FILE__).'/vendor/autoload.php';
        #        $action = new \\create\controller\Action();
        $className = "\\create\\controller\\Action";
        #$controller = new $className();
        $action = new $className();
        $action->create($argv[1]);
    } catch (Exception $e) {
        print_r($e);
        echo 'Nothing execute file!';
        exit();
    }
