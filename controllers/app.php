<?php
session_start();
header('Content-Type: json; charset=utf-8');
class App {
  protected $controller = '';
  protected $params;
  function __construct() {
    $arr = $this->processUrl();
    $this->controller = $arr[0]; 
    if(file_exists($_SERVER['DOCUMENT_ROOT']."/controllers/". $this->controller .".php")) {
      include_once($_SERVER['DOCUMENT_ROOT']."/controllers/". $this->controller .".php");
    }
    if(count($arr) > 1) {
      unset($arr[0]);
      $this->params = array_values($arr);
    }
  }
  function processUrl() {
    if(isset($_GET['url'])) {
      return explode('/', filter_var(trim($_GET['url'],'/')));
    }
  }
}

?>