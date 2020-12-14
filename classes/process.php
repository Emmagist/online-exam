<?php

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../lib/db.php');
  include_once ($filepath.'/../lib/session.php');
  include_once ($filepath.'/../helpers/format.php');
  
  class Process{
    //for selecting answer
    public function processData($data){
      global $fm, $db;
      $selectedAns    = $fm->validation($data['ans']);
      $number         = $fm->validation($data['number']);
      $ans            = mysqli_real_escape_string($db->link, $selectedAns);
      $selectedNumber = mysqli_real_escape_string($db->link, $number);
      $next           = $number + 1;

      if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = '0';
      }

      $total = $this->getTotal();

      $right = $this->rightAns($number);

      if ($right == $ans) {
        $_SESSION['score']++;
      }

      if ($selectedNumber == $total) {
        header("Location: final.php");
      }else {
        header("Location: test.php?q=" . $next);
      }
    }
    //To get the total question
    private function getTotal(){
      global $db;
      $query   = "SELECT * FROM tbl_quest";
      $getData = $db->select($query);
      $total   = $getData->num_rows;
      return $total;
    }

    private function rightAns($number){
      global $db;
      $query   = "SELECT * FROM tbl_ans WHERE questNo = '$number' AND rightAns = '1'";
      $getData = $db->select($query)->fetch_assoc();
      $result   = $getData['id'];
      return $result;
    }

  }
  $pro = new Process();

?>