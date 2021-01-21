<?php

    $filepath = realpath(dirname(__FILE__));
    // include_once ($filepath.'/../lib/db.php');
    include_once ($filepath.'/../classes/exam.php');

    if (isset($_POST['setexam'])) {
        // global $exm;
        $error = '';
        $id = '';
        $exam_type = mysqli_real_escape_string($db->link, $_POST['exam_type']);
        // echo $exam_type;
        if (empty($exam_type)) {
            $error = "<p style='color:red';padding:3px>Exam type can not be blank!</p>";
        }else {
            "INSERT INTO tbl_set(exam_type) VALUES ('$exam_type')";
        }
    }
?>