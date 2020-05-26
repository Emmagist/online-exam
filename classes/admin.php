<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
include_once ($filepath.'/../lib/db.php');
include_once ($filepath.'/../helpers/format.php');
/**
 * Admin Class
 */
class Admin{

  private $fnd;
  private $fd;

  public function global(){
    global $db, $fm;
  }
  //to start a logger session if is login
  public function getAdminData($data){
    global $fm, $db;
    $username = $fm->validation($data['adminUser']);
    $adminPass =  $fm->validation($data['adminPass']);
    // $username = $_POST['adminUser'];
    // $adminPass = $_POST['adminPass'];
    $stringUser = mysqli_real_escape_string($db->link, $username);
    $stringPass = mysqli_real_escape_string($db->link, md5($adminPass));
    //check if user exist in database
    $query = "SELECT * FROM tbl_admin WHERE username = '$stringUser' AND password = '$stringPass'";
    $result = $db->select($query);
    if ($result != false) {
      //fetch associative array of $result
      $value = $result->fetch_assoc();
      Session::init();
      Session::set("adminLogin", true);
      Session::set("adminUser", $value['username']);
      Session::set("adminId", $value['id']);
      header("Location: index.php");
    }else{
      $msg = "<span class='error'>Username or Pass Not Match!</span>";
      return $msg;
    }


  }
}
$adm = new Admin();

?>