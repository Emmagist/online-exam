<?php 
  include ("inc/header.php"); 
  // include ("getregister.php");

  //session check
  Session::checkSession();

?>

<div class="main">
  <h1 class="main-h1">Welcome To Online Exam System - Start Now</h1>
  <div id="" class="exam-segment">
    <img src="img/exam.jpg" alt="">
  </div>
  <div class="" id="exam-segment">
   <h3 class="h3-exam">Start Testing</h3>
   <h5 class="h5-exam"><a href="start_test.php">Start Now...</a></h5>
  </div>
</div>
<?php include 'inc/footer.php'; ?>