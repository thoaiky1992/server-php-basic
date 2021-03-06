<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/database/db.php";
  class UserModel extends Database {
    private $table= 'users';
    function __construct() {
      $this->connect();
    }
    function getMany() {
      $query = "select * from $this->table";
      $result = $this->conn->query($query);
      $data = array();
      if($result->num_rows){
        while($row = $result->fetch_assoc()) {
          $data[] = $row;
        }
        return $data;
      }
      return [];
    }
    public function getOne($id) {
      $result = $this->conn->query("select * from $this->table where id = $id");
      $data = $result->fetch_assoc();
      return $data;
    }
  }
?>