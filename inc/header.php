<?php

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../lib/session.php');
  Session::init();
  include_once ($filepath.'/../lib/db.php');
  include_once ($filepath.'/../helpers/format.php');
  //autoload registeration allows you to register multi functions that php will put into a stack/queue and call sequentially when a "New Class" is declared.
  spl_autoload_register(function($class){
    //the $class parameter represents all the files name like session, db.php, format.php asigning it into the classes 
    include_once "classes/".$class.".php";
  });

  global $db, $fm, $exm, $usr, $pro;

  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: pre-check=0, post-check=0, max-age=0");
  header("Progma: no-cache");
  header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
  //output date format
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Progma" content="no-cache">
  <meta http-equiv="no-cache">
  <meta http-equiv="Expires" content="-1">
  <title>Test Your Brain || Online Exam</title>
  <link rel="stylesheet" href="css/main.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
  <div class="phpcoding">
    <?php
      if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
        header("Location: index.php");
        exit();
      }
    ?>
    <section class="headeroption"></section>
    <section class="maincontent">
      <div class="menu">
        <?php
          $login = Session::get("login");
          if ($login == true) :
        ?>
        <span style="" class="display-username">Welcome <strong style="color: green;"><i class="fa fa-user"></i> <?php echo Session::get("username"); ?></strong></span>
        <?php endif?>
        <ul id="maincontent-ul">
          <?php
            $login = Session::get("login");
            if ($login == true) :
          ?>
          
          <li><a href="exam.php">Exam</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="?action=logout">Logout</a></li>
          <?php  else : ?>
          <li><a href="index.php">Login</a></li>
          <li><a href="register.php">Register</a></li>
          <?php endif ?>
        </ul>
      </div>

