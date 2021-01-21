<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/inc/header.php');
// include_once ($filepath.'/../classes/exam.php');
include_once ('process.php');

// global $exm;
//form
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   $addQuest = $exm->setExamType($_POST);
// }

?>

<div class="main">
  <h1 style="border-bottom: dotted; padding-bottom:15px;">Admin Panel - Set Exam Type</h1>
  
  <div id="adminpanel">
    <form action="" method="POST">
      <table>
        <?php
            if ($error) {
                // $error = '';
                echo $error;
            }
        ?>
        <tr>
          <td>Set Exam Type</td>
          <td>:</td>
          <td><input type="text" value="" name="exam_type" placeholder="Enter exam type..."></td>
        </tr>
      </table>
      <button type="submit" name="setexam" value="" colspan="3" align="center">Set Exam</button>
    </form>
  </div>

</div>

<?php include 'inc/footer.php'; ?>