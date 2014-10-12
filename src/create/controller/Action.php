<?php
namespace create\controller;

use create\lib;
use create\lib\View;
class Action {

    public $view;

    function create($name){
      try {
        $this->view = new View();
        $this->view->save(dirname(dirname(__FILE__))."/view/".$name.".tpl",$name.".html");
      } catch (Exception $e) {
        throw new Exception($e->getMessage());
      }

    }
}
