<?php

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/inc/header.php');

  //Session::checkLogin();

?>

<div class="main">
  <h1>Admin Panel</h1>
  <div class="adminpanel">
    <h2>Welcome To Control Admin Panel</h2>
    <p>You can manage Your user and online exam system from here...</p>
  </div>


</div>

<?php include 'inc/footer.php'; ?>