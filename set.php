<?php 
  include ("inc/header.php"); 
  include_once ($filepath.'/../classes/exam.php');

  //session check
  Session::checkSession();
  global $exm;

?>

<div class="main">
  <h1 class="main-h1">Welcome To Online Exam System - Exam Type</h1>
  <div id="" class="exam-segment">
    <img src="img/exam.jpg" alt="">
  </div>
  <div class="" id="exam-segment">
   <h3 class="h3-exam">Choose Your Exam</h3>
   <?php $sets = $exm->getExamSet(); ?>
   <select name="select" id="" style="width:80%; padding:5px;margin-left:58px;font-weight:600;">
    <option value="choose_exam">Choose Exam</option>
    <?php foreach ($sets as $set) : ?>
      <option value="<?=$set['exam_type']?>"><?=$set['exam_type']?></option>
    <?php endforeach; ?>
    
   </select>
   <h5 class="h5-exam"><a href="start_test.php">Start Now...</a></h5>
  </div>
</div>
<?php include 'inc/footer.php'; ?>