<?php 
  include_once $_SERVER['DOCUMENT_ROOT']."/controllers/base.php";
  include_once $_SERVER['DOCUMENT_ROOT']."/models/user.model.php";
  class user extends base {
    function __construct() {
      $this->processUrl();
      $this->connect();
      parent::__construct(new UserModel());
    }
  }
$user = new user();
$user->getMany();
$user->getOne();
?>