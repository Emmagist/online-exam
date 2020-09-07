<?php

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/classes/user.php');
  global $usr;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email     = $_POST['email'];
  $password  = md5($_POST['password']);
  $userlogin = $usr->userLogin( $email, $password);
  // echo $userlogin
}

?>