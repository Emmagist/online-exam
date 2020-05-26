<?php 
  include ("inc/header.php"); 
  // include ("getregister.php");
  include_once ($filepath.'/../classes/user.php');

  Session::checkSession();
  $userid = Session::get("id");
  global $usr;

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update = $usr->updateUserData($userid, 'POST');
  }
  

?>

<div class="main">
  <h1>Your Profile</h1>
  <div class="profile">
    <?php
      if (isset($update)) {
        echo $update;
      }
    ?>
    <form action="" method="POST">
      <table class="tbl">
        <?php
          $getData = $usr->getUserData($userid);
          $result = $getData;
          if ($result) :
            foreach ($result as $r) :
              
           
        ?>
              <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="name" value="<?php echo $r['name']; ?>"></td><span><i class="fa fa-pen"></i></span>
              </tr>
              <tr>
                <td>Username</td>
                <td>
                  <input type="text" name="username" id="username" value="<?php echo $r['username']; ?>">
                </td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input type="text" name="email" id="email" value="<?php echo $r ['email']; ?>"></td>
              </tr>
             <?php 
            endforeach;
          endif;
        ?>
      </table>
      <input type="submit" value="Update Profile" class="profile-button">
    </form>
  </div>
</div>
<?php include 'inc/footer.php'; ?>