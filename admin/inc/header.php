<?php
  
  include_once ("../lib/session.php");
  Session::checkAdminSession();
  include_once ("../lib/db.php");
  include_once ("../helpers/format.php");
  
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: pre-check=0, post-check=0, max-age=0");
  header("Progma: no-cache");
  header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
  //output date format
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

?>

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Progma" content="no-cache">
  <meta http-equiv="no-cache">
  <meta http-equiv="Expires" content="-1">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="phpcoding">
  <?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
      Session::destroy();
      header("Location: login.php");
      exit();
    }
  ?>
    <section class="headeroption" id="headeroptionid">
      <!-- <span><img src="" alt=""></span> -->
      <h1>administration</h1>
    </section>
    <section class="maincontent">
      <div class="menu">
        <ul id="maincontent-ul">
          <li><a href="index.php">Home</a></li>
          <li><a href="users.php">Manage User</a></li>
          <li><a href="questadd.php">Add Question</a></li>
          <li><a href="queslist.php">Question List</a></li>
          <li><a href="?action=logout">Logout</a></li>
        </ul>
      </div>