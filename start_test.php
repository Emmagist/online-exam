<?php 
  include ("inc/header.php"); 
  // include ("getregister.php");
  include_once ($filepath.'/../classes/exam.php');

  //session check
  Session::checkSession();

  global $exm;
  $question = $exm->getQuestion();
  //var_dump($question);
  $total    = $exm->getTotalRow();

?>

<div class="main">
  <h1 class="main-h1">Welcome To Online Exam</h1>
  <!-- <div id="" class="exam-segment">
    <img src="img/exam.jpg" alt="">
  </div> -->
  <div class="" id="test-segment">
   <h3 class="">Test Your Knowledge</h3>
   <p>This is a multiple choice quize to test your knowledge</p>
   <ul>
     <li><strong>Number of Questions:</strong> <?php echo $total;?></li>
     <li><strong>Question Type:</strong> Multiple Choice</li>
   </ul>
      <a href="test.php?q=<?php echo $question['questNo']; ?>">Start Test</a>
  </div>
</div>
<?php include 'inc/footer.php'; ?>