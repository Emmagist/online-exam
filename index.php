<?php 
  include ("inc/header.php"); 
  include ("getregister.php");

  //Session::checkLogin();

?>

<div class="main">
  <h1>Online Exam System <span>-User Login</span></h1>
  <div id="segment">
    <img src="img/exam.jpg" alt="">
  </div>
  <div class="segment" id="index-segment">
    <!-- <span id="state"></span> -->
    <span class="error" id="empty">Field can not be empty! Error 401</span><br>
    <span class="error" id="error">Sorry! User Not Found <br> Please Register. Error 409</span><br>
    <span class="error" id="disable">User Disabled ! Error 406</span>
    <form action="" method="POST" id="form-one">
      <table class="tbl" id="table-index">
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