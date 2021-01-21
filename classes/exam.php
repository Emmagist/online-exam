<?php

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../lib/db.php');
  include_once ($filepath.'/../helpers/format.php');
  
  class Exams{
    public function setExamType($data){
      global $db;

      $exam_type  = mysqli_real_escape_string($db->link, $data['exam_type']);
      $query      = "INSERT INTO tbl_set(exam_type) VALUE ('$exam_type)";
    }
    public function addQuestion($data){
      global $db;
      
      $questNo  = mysqli_real_escape_string($db->link, $data['questNo']);
      $quest    = mysqli_real_escape_string($db->link, $data['quest']);
      $ans      = array();
      $ans[1]   = $data['ans1'];
      $ans[2]   = $data['ans2'];
      $ans[3]   = $data['ans3'];
      $ans[4]   = $data['ans4'];
      $rightAns = $data['rightAns'];
      $query    = "INSERT INTO tbl_quest(questNo, quest) VALUE ('$questNo', '$quest')";
      $inserts  = $db->insert($query);
      if ($inserts) {
        foreach ($ans as $an =>$ansName) {
          if ($ansName != '') {
            if ($rightAns == $an) {
              $query = "INSERT INTO tbl_ans(questNo, ans, rightAns) VALUE ('$questNo', '$ansName', '1')";
            } else {
              $query = "INSERT INTO tbl_ans(questNo, ans, rightAns) VALUE ('$questNo', '$ansName', '0')";
            }
            $insertDb = $db->insert($query);
            if ($insertDb) {
              continue;
            }else {
              die('Error....');
            }
          }
        }
        $msg = "<span class='success'>Question added Successful....</span>";
        return $msg;
      }
    }
    
    // to get the questions from database by order
    public function getQuestByOrder(){
      global $db;
      $query  = "SELECT * FROM tbl_quest ORDER BY questNo ASC";
      $result = $db->select($query);
      return $result;
    }

    //how to delete two tables from database once
    public function delQuestion($questNo){
      $tables = array("tbl_quest", "tbl_ans");
      foreach ($tables as $table) {
        global $db;
        $delQuery = "DELETE FROM $table WHERE questNo = '$questNo'";
        $result   = $db->delete($delQuery);
      }
      if ($result) {
        $msg = "<span class='success'>Question Deleted Successsfully...</span>";
        return $msg;
      }else{
        $msg = "<span class='success'>Question Not Deleted !</span>";
        return $msg;
      }
    }

    //get total rows in database 
    public function getTotalRow(){
      global $db;
      $query     = "SELECT * FROM tbl_quest";
      $getResult = $db->select($query);
      $total     =  $getResult->num_rows;
      return $total;
    }

    // get question
    public function getQuestion(){
      global $db;
      $query   = "SELECT * FROM tbl_quest";
      $getData = $db->select($query);
      $result  = $getData->fetch_assoc();
      return $result;
    }

    //question number
    public function getQuestionByNumber($number){
      global $db;
      $query   = "SELECT * FROM tbl_quest WHERE questNo = '$number'";
      $getData = $db->select($query);
      $result  = $getData->fetch_assoc();
      return $result;
    }

    //get answer
    public function getAnswer($number){
      global $db;
      $query   = "SELECT * FROM tbl_ans WHERE questNo = '$number'";
      $getData = $db->select($query);
      //$result  = $getData->fetch_assoc();
      return $getData;
    }

    public function getExamSet(){
      global $db;
      $query   = "SELECT * FROM tbl_set";
      $getData = $db->select($query);
      return $getData;
    }
  }
  $exm = new Exams();

?>