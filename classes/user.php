<?php

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../lib/session.php');
  include_once ($filepath.'/../lib/db.php');
  include_once ($filepath.'/../helpers/format.php');
  
  class Users{
    
    //to start a logger session if is login
    public function userRegistration($name, $username, $email, $password){
      global $fm, $db;
      //put the parameter into the variable parameter from the method()
      $name     = $fm->validation($name);
      $username = $fm->validation($username);
      $email    = $fm->validation($email);
      $password = $fm->validation($password);

      $stringName       = mysqli_real_escape_string($db->link, $name);
      $stringUsername   = mysqli_real_escape_string($db->link, $username);
      $stringEmail      = mysqli_real_escape_string($db->link, $email);
      $stringPassword   = mysqli_real_escape_string($db->link, md5($password));
      if ($stringName   == '' || $stringUsername == '' || $stringEmail == '' || $stringPassword == '') {
        echo "<span class='error'>All Fields are Required! Error 404</span>";exit;
      }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "<span class='error'>Invalid Email Address! Error 402</span>";exit;
      }else {
        $checkEmail  = "SELECT * FROM tbl_user WHERE email = '$stringEmail'";
        $emailResult = $db->select($checkEmail);
        if ($emailResult != false) {
          echo "<span class='error'>Email Address Already Exist! Error 405</span>";exit;
        }else {
          $query        = "INSERT INTO tbl_user(name, username, email, password) VALUES('$stringName', '$stringUsername', '$stringEmail', '$stringPassword')";
          $insert_query = $db->insert($query);
          if (isset($insert_query)) {
            echo "<span class='success'>Registration Successful Cheers !</span>";
            exit;
          }else {
            echo "<span class='error'>Error Not Registered! Error 401</span>";exit;
          }
        }
      }
    }

    //User Login
    public function userLogin($email, $password){
      global $fm, $db;
      echo $email    = $fm->validation($email);exit;
      $password = $fm->validation($password);

      $stringEmail      = mysqli_real_escape_string($db->link, $email);
      $stringPassword   = mysqli_real_escape_string($db->link, md5($password));
      if ($stringEmail == "" || $stringPassword == "") {
        echo "empty";
        exit();
      }else {
        $query = "SELECT * FROM tbl_user WHERE email = '$stringEmail'";
        $result = $db->select($query);
        $r = mysqli_num_rows($result);
        echo $r;exit;
        if ($result != false) {
          // fetch associative array to check if use is disabled or nor
          $value = $result->fetch_assoc();
          if ($value['status'] == '1') {
            echo "disable";
            exit();
          }else {
            Session::init();
            Session::set("login", true);
            Session::set("id", $value['id']);
            Session::set("username", $value['username']);
            Session::set("name", $value['name']);
            // header("Location: index.php");
          }
        }else{
          echo "error";
          exit();
        }
      }
    }

    //fetch user data
    public function getUserData($userid){
      global $db;
      $query = "SELECT * FROM tbl_user WHERE id = '$userid'";
      $result = $db->select($query);
      return $result;
    }

    //get all user data
    public function getAllUser(){
      global $db;
      $query  = "SELECT * FROM tbl_user ORDER BY id DESC";
      $result = $db->select($query);
      return $result;
    }
    //update users data
    public function updateUserData($userid, $data){
      global $fm, $db;
      $name     = $fm->validation($data['name']);
      $username = $fm->validation($data['username']);
      $email    = $fm->validation($data['email']);

      $stringName       = mysqli_real_escape_string($db->link, $name);
      $stringUsername   = mysqli_real_escape_string($db->link, $username);
      $stringEmail      = mysqli_real_escape_string($db->link, $email);

      $query = "UPDATE tbl_user SET name = '$stringName', username = '$stringUsername', email = '$stringEmail' WHERE id = '$userid'";
      $update_row = $db->update($query);
      if ($update_row) {
        $msg = "<script>
        var msg = <span class='success'>Profile Updated Successfully!</span>
        setTimeout(function(){
          $(msg).fadeout();
        },4000);
        </script>";
        return $msg;
      }else{
        $msg = "<script>
        var msg = <span class='error'>User Not Updated! Error 402...</span>;
        setTimeout(function(){
          $(msg).fadeout();
        },4000);
        </script>";
        return $msg;
      }
    }
    //set user user to 1 in the database if isset to disabled 
    public function disableUser($id){
      global $db;
      $query      = "UPDATE tbl_user SET status = '1' WHERE id = '$id'";
      $update_row = $db->update($query);
      if ($update_row) {
        $msg = "<span class='success'>User Disabled !</span>";
        return $msg;
      }else{
        $msg = "<span class='error'>User Not Disabled !</span>";
        return $msg;
      }
    }
    //set user user to 0 in the database if isset to enable 
    public function enableUser($id){
      global $db;
      $query = "UPDATE tbl_user SET status = '0' WHERE id = '$id'";
      $update_row = $db->update($query);
      if ($update_row) {
        $msg = "<span class='success'>User Enabled !</span>";
        return $msg;
      }else{
        $msg = "<span class='error'>User Not Enable !</span>";
        return $msg;
      }
    }

    public function deleteUser($id){
      global $db;
      $query = "DELETE FROM tbl_user WHERE id = '$id'";
      $deleteData = $db->delete($query);
      if ($deleteData) {
        $msg = "<span class='error'>User Deleted Successfully !</span>";
        return $msg; 
      }else{
        $msg = "<span class='error'>User Not Deleted !</span>";
        return $msg;
      }
    }

  }
  $usr = new Users();

?>