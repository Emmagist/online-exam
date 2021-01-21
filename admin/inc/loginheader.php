<?php
include_once("../lib/session.php");
Session::checkAdminLogin();
  
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Progma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
//output date format
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Progma" content="no-cache">
  <meta http-equiv="no-cache">
  <meta http-equiv="Expires" content="-1">
  <title>Test Your Brain || Online Exam</title>
  <link rel="stylesheet" href="css/admin.css">
  <script src="js/jquery.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
  <div class="phpcoding">
    
  </div>
</body>
</html>
