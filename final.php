<?php 
  include ("inc/header.php"); 
  // include ("getregister.php");
  include_once ($filepath.'/../classes/exam.php');

  //session check
  Session::checkSession();

?>

<div class="main">
  <h1 class="main-h1">You Are Done !</h1>
  <div class="" id="test-segment">
   <p>Congrats ! You have just completed the test</p>
   <p>Final Score: 
     <?php 
        if (isset($_SESSION['score'])) {
          echo $_SESSION['score'];
          unset($_SESSION['score']);
        }
     ?>
   </p>
   <a href="view_ans.php">View Answer</a>
    <a href="start_test.php">Start Test</a>
  </div>
  
</div>
<?php include 'inc/footer.php'; ?>