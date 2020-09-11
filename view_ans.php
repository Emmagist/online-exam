<?php 
  include ("inc/header.php"); 
  // include ("getregister.php");
  include_once ($filepath.'/../classes/exam.php');
  include_once ($filepath.'/../classes/process.php');

  // Session::checkSession();
  // if (isset($_GET['q'])) {
  //   $number = (int) $_GET['q'];
  // }else{
  //   header("Location: exam.php");
  // }
  global $exm, $pro;

  $total = $exm->getTotalRow();

  // //to get the question number to be dynamic
  // $question = $exm->getQuestionByNumber($number);

  // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //   $process = $pro->processData($_POST);
  // }

?>

<div class="main">
  <h1>All Question & Answer:<?php echo   $total; ?></php></h1>
  <div class="viewans">
    <table class="tbl">
      <?php
        $getQuest = $exm->getQuestByOrder();
        if (isset($getQuest)) {
          foreach ($getQuest as $get) {
         
      ?>
      <tr>
        <td colspan="2"><h3>Que <?php echo $get['questNo'] . ' : ' . $get['quest']; ?></h3></td>
      </tr>
      <?php 
        $number = $get['questNo'];
        $answer = $exm->getAnswer($number);
        if ($answer) {
          foreach ($answer as $ans) {
      ?>
      <tr>
        <td><input type="checkbox" name="ans"> <?php 
        if ($ans['rightAns'] == 1) {
          echo "<span style='color:blue'>" . $ans['ans'] . "</span>";
        }else{
          echo $ans['ans'];
        }
         ?></td>
      </tr>
      <?php }}; ?>
      <?php }}; ?>
    </table>
    <a href="start_test.php" class="view-a">Start Test</a>
  </div>
</div>
<?php include 'inc/footer.php'; ?>