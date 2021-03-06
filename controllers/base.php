<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/database/db.php";
class base extends Database {
  protected $params = [];
  protected $model;
  function __construct($model) {
    $this->model = $model;
  }
  public function processUrl() {
    if(isset($_GET['url'])) {
      $this->params =  explode('/', filter_var(trim($_GET['url'],'/')));
      if(count($this->params) > 1) {
        $this->params = array_values($this->params);
      }
    }
  }
  function getMany() {
    if($_SERVER['REQUEST_METHOD'] == 'GET' && count($this->params) == 1 ) {
      $data = $this->model->getMany();
      echo json_encode($data);
    } 
  }
  function getOne() {
    if($_SERVER['REQUEST_METHOD'] == 'GET' && count($this->params) > 1 ) {
      $id = $this->params[1];
      $data = $this->model->getOne($id);
      echo json_encode($data);
    } 
  }
}
?>