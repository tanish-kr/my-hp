#!/usr/bin/php
<?php
    try{
        require_once  dirname(__FILE__).'/vendor/autoload.php';
        #$className = "\\metalics\\action\\".strtolower($argv[1]).'Action';
        #$controller = new $className();
    } catch (Exception $e) {
        print_r($e);
        echo 'Nothing execute file!';
        exit();
    }
