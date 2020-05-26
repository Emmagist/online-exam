<?php

/**
 * Format Class
 */
class Format{
  //date and time format to local time
  public function formatDate($date){
    return date('F j, Y, g:i a', strtotime($date));
  }
  //to give the words a word limitation
  public function textShorten($text, $limit = 400){
    $txt = $text. " ";
    $tet = substr($txt,0, $limit);
    $word = substr($txt, 0, strripos($text, ' '));
    $wordTxt = $word.".....";
    return $wordTxt;
  }
  //data validation format
  public function validation($data){
    //to trim a white space or any space
    $dataFormat = trim($data);
    //to un-Qoutes a qouted string
    $dataForm = stripcslashes($dataFormat);
    //to convert all special characters to html entities
    $dataFor = htmlspecialchars($dataForm);
    return $dataFor;
  }
  //title validating
  public function title(){
    $path = $_SERVER['SCRIPT_FILENAME'];
    $title = basename($path, '.php');
    //$title = str_replace('_', ' ', $title);
    if ($title == 'index') {
      $title = 'home';
    }elseif ($title == 'contact') {
      $title = 'contact';
    }
    return $title = ucfirst($title);
  }
}
$fm = new Format();

?>