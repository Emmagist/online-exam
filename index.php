<?php 
  include ("inc/header.php"); 
  include ("getregister.php");

  Session::checkLogin();

?>

<div class="main">
  <h1>Online Exam System -User Login</h1>
  <div id="segment">
    <img src="img/exam.jpg" alt="">
  </div>
  <div class="segment">
    <!-- <span id="state"></span> -->
    <span class="empty" style="
  display: none;">Field can not be empty! Error 401</span>
    <span class="error" style="
  display: none;">Sorry! User Not Found <br> Please Register. Error 409</span>
    <span class="disable" style="
  display: none;">User Disabled ! Error 406</span>
    <form action="" method="POST">
      <table class="tbl">
        <tr>
          <td>Email</td>
          <td><input type="text" name="email" required id="email"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" required id="password"></td>
        </tr>
        
      </table>
      <button type="submit" id="login">Login</button>
    </form>
    <p>New User? <a href="register.php">SignUp</a> For Free.</p>
  </div>
</div>
<?php include 'inc/footer.php'; ?>