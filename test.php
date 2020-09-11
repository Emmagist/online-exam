<?php 
  include ("inc/header.php"); 
  // include ("getregister.php");
  include_once ($filepath.'/../classes/exam.php');
  include_once ($filepath.'/../classes/process.php');

  Session::checkSession();
  if (isset($_GET['q'])) {
    $number = (int) $_GET['q'];
  }else{
    header("Location: exam.php");
  }
  global $exm, $pro;

  $total = $exm->getTotalRow();

  //to get the question number to be dynamic
  $question = $exm->getQuestionByNumber($number);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $process = $pro->processData($_POST);
  }

?>

<div class="main">
  <h1 id="test-h1">Question <?php echo $question['questNo'] . ' of ' . $total; ?></php></h1>
  <div class="profile" id="test">
    <form action="" method="POST">
      <table class="tbl">
        <tr>
          <td colspan="2"><h3>Que <?php echo $question['questNo'] . ' : ' . $question['quest']; ?></h3></td>
        </tr>
        <?php 
          $answer = $exm->getAnswer($number);
          if ($answer) {
            foreach ($answer as $ans) {
        ?>
        <tr>
          <td><input type="checkbox" name="ans" value="<?php echo $ans['id'];?>"> <?php echo $ans['ans']; ?></td>
        </tr>
        <?php }}; ?>
      </table>
      <input type="submit" value="Next Question" class="test-button">
      <input type="hidden" name="number" value="<?php echo $number; ?>">
    </form>
  </div>
</div>
<?php include 'inc/footer.php'; ?>