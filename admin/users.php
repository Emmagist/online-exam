<?php

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/inc/header.php');
  include_once ($filepath.'/../classes/user.php');
  global $usr;

  //to get disable id if isset
  if (isset($_GET['dis'])) {
    $disId = (int)$_GET['dis'];
    $disUser = $usr->disableUser($disId);
  }
  //to get enable status via id
  if (isset($_GET['en'])) {
    $enId = (int)$_GET['en'];
    $enUser = $usr->enableUser($enId);
  }
  //to delete id
  if (isset($_GET['del'])) {
    $delId = (int)$_GET['del'];
    $delUser = $usr->deleteUser($delId);
  }

?>

<div class="main">
  <?php
    if (isset($disUser)) {
      echo $disUser;
    }
    //if the id is set set enable button
    if (isset($enUser)) {
      echo $enUser;
    }
    //if the id is set to delete button
    if (isset($delUser)) {
      echo $delUser;
    }
  ?>
  <h1 style="text-align: center">Admin Panel - Management</h1>
 <div class="manageuser">
   <table class="tblone">
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      <?php
        $userData = $usr->getAllUser();
        if ($userData) {
          //to count 
          $i = 0; 
          //to set the result fetch from the database
          foreach ($userData as $user) {
            $i++;
      ?>
      <tr>
        <td>
          <?php
            if ($user['status'] == '1') {
              echo "<span class='error'>" . $i . "</span>";
            }else{
              echo $i;
            } 
          ?>
         </td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['email']; ?></td>  
        <td>
          <?php
          //if the status is zero it should show the disabled button
            if ($user['status'] == 0) {?>
              <a href="?dis=<?php echo $user['id']; ?>" onclick="return confirm('Disable User')">Disable</a>
          <?php } else { ?>
            <!-- if the status is one it should show the Enabled button -->
            <a href="?en=<?php echo $user['id']; ?>" onclick="return confirm('Enable User')">Enable</a>
          <?php } ?>
          || <a href="?del=<?php echo $user['id']; ?>" onclick="return confirm('Remove User')">Remove</a>
      </td>
      </tr>
      <?php } } ?>
      
   </table>
 </div>


</div>

<?php include 'inc/footer.php'; ?>