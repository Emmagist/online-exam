<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/inc/header.php');
include_once ($filepath.'/../classes/exam.php');

global $exm;
//form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $addQuest = $exm->addQuestion($_POST);
}

//Get total
$total = $exm->getTotalRow();
$next  = $total+1;

?>

<div class="main">
  <h1 style="border-bottom: dotted; padding-bottom:15px;">Admin Panel - Add Question</h1>
  <?php
    if (isset($addQuest)) {
      echo $addQuest;
    }
  ?>
  <div id="adminpanel">
    <form action="" method="POST">
      <table>
        <tr>
          <td>Question No.</td>
          <td>:</td>
          <td><input type="number" value="
            <?php
              if (isset($next)) {
                echo $next;
              }
            ?>
          " name="questNo"></td>
        </tr>
        <tr>
          <td>Question</td>
          <td>:</td>
          <td><input type="text" value="" name="quest" placeholder="Enter Question..."></td>
        </tr>
        <tr>
          <td>Choice One</td>
          <td>:</td>
          <td><input type="text" value="" name="ans1" placeholder="Enter Choice One..." required></td>
        </tr>
        <tr>
          <td>Choice Two</td>
          <td>:</td>
          <td><input type="text" value="" name="ans2" placeholder="Enter Choice Two..." required></td>
        </tr>
        <tr>
          <td>Choice Three</td>
          <td>:</td>
          <td><input type="text" value="" name="ans3" placeholder="Enter Choice Three..." required></td>
        </tr>
        <tr>
          <td>Choice Four</td>
          <td>:</td>
          <td><input type="text" value="" name="ans4" placeholder="Enter Choice Four..." required></td>
        </tr>
        <tr>
          <td>Correct No.</td>
          <td>:</td>
          <td><input type="number" value="" name="rightAns" required></td>
        </tr>
      </table>
      <button type="submit" name="questadd" value="" colspan="3" align="center">Add Question</button>
    </form>
  </div>


</div>

<?php include 'inc/footer.php'; ?>