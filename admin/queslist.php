<?php

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/inc/header.php');
  include_once ($filepath.'/../classes/exam.php');
  global $exm;
  //get delquest id
  if (isset($_GET['delquest'])) {
   $questNo = (int)$_GET['delquest'];
   $delQuest = $exm->delQuestion($questNo);
  }

?>

<div class="main">
  <?php
    if (isset($delQuest)) {
      echo $delQuest;
    }
  ?>
  <h1 style="text-align: center">Admin Panel - Question List</h1>
  <div class="manageuser">
    <table class="tblone">
      <tr>
        <th width="10%">No</th>
        <th width="70%">Questions</th>
        <th width="20%">Action</th>
      </tr>
      <?php
        $examData = $exm->getQuestByOrder();
        if ($examData) {
          //to count 
          $i = 0; 
          //to set the result fetch from the database
          foreach ($examData as $exam) {
            $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $exam['quest']; ?></td>  
        <td>
          <a href="?delquest=<?php echo $exam['questNo']; ?>" onclick="return confirm('Remove User')">Remove</a>
      </td>
      </tr>
      <?php } } ?>
      
   </table>
 </div>


</div>

<?php include 'inc/footer.php'; ?>