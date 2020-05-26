<?php

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/classes/user.php');
  global $usr;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name     = $_POST['name'];
  $username = $_POST['username'];
  $email    = $_POST['email'];
  $password = $_POST['password'];
  $userReg  = $usr->userRegistration($name, $username, $email, $password);
}

?>