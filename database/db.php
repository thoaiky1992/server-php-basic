<?php 
class Database {
  protected $conn;
  private $DB_HOST= '127.0.0.1';
  private $DB_USER= 'root';
  private $DB_PASSWORD= 'thoaiky1992';
  private $DB_NAME= 'blog';
  function __construct(){
    $this->connect();
  }
  public function connect() {
    return $this->conn = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD, $this->DB_NAME);
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
  }
}
?>