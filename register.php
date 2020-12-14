<?php 
  include ("inc/header.php");
  include ("getregister.php");
?>

<div class="main">
  <h1>Online Exam System - <span class="span-h1-main">User Reg</span></h1>
  <div id="segment">
    <img src="img/exam.jpg" alt="">
  </div>
  <div class="seg">
    <span id="state"></span>
    <form action="" method="POST" class="form">
      <table class="tbl">
        <tr>
          <td>Select Area</td>
          <td>
            <select name="" id="">
              <option value="">Select Option</option>
              <option value="Select Option">kkgkk</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Full Name</td>
          <td><input type="text" id="name" name="name"></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><input type="text" name="username" id="username"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" id="email" name="email"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" id="password"></td>
        </tr>
        
      </table>
      <button type="submit" id="regsubmit">Register</button>
    </form>
    <p>Already have an Account? <a href="index.php">LogIn</a> Here.</p>
    <!-- <span id="state" style=""></span> -->
  </div>
</div>
<?php include 'inc/footer.php'; ?>