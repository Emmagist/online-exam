<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/inc/loginheader.php');
include_once ($filepath.'/../classes/admin.php');

global $adm;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $adminData = $adm->getAdminData($_POST);
}

?>

<div class="main">
  <h1>Admin LogIn</h1>
  <div class="adminlogin">
    <form action="" method="POST">
      <table>
        <tr>
          <td>Username</td>
          <td><input type="text" name="adminUser" require></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="adminPass" require></td>
        </tr>
        <tr>
          <td><button type="submit" name="login">Login</button></td>
        </tr>
        <tr>
          <td colspan="2">
            <?php
              if (isset($adminData)) {
               echo $adminData;
              }
            ?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include 'inc/footer.php'?>