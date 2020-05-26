<?php

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../config/config.php');
class dataBase{
  //db connection
  public $host   = DB_HOST;
  public $user   = DB_USER;
  public $pass   = DB_PASSWORD;
  public $dbname = DB_NAME;

  public $link;
  public $error;
  //conecting to the database
  public function __construct(){
    $this->connectDB();
  }

  private function connectDB(){
    $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    if (!$this->link) {
      $this->error = "Connection fail". $this->link->connect_error;
      return false;
    }
  }
  
  //Select data
  public function select($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($result->num_rows > 0) {
      return $result;
    }else{
      return false;
    }
  }

  //Insert data
  public function insert($query){
    $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($insert_row) {
      return $insert_row;
    }else {
      return false;
    }
  }

  //update data
  public function update($query){
    $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($update_row) {
      return $update_row;
    }else {
      return false;
    }
  }

  //delete data
  public function delete($query){
    $delete = $this->link->query($query) or die($this->link->error.__LINE__);
    if ($delete) {
      return $delete;
    }else{
      return false;
    }
  }
}
$db = new dataBase();

?>