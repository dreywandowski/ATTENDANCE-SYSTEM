
<?php
require_once "connect.php";

if(isset($_GET)){
$bk = $_GET["image"];

    if ($bk === "A") {
    ?>
    <style type="text/css">
        body {
               background: url("images/write.jpg");
      }
  </style>

 <? else if ($bk === "B") {
    ?>
    <style type="text/css">
        body {
               background: url("images/student-849825_960_720.jpg");
      }
  </style>

  <? else if ($bk === "C") {
    ?>
    <style type="text/css">
        body {
               background: url("images/computer-1185567_960_720.jpg");
      }
  </style>

  <? else if ($bk === " ") {
    ?>
    <style type="text/css">
        body {
               background: url("images/girl-80327_960_720.jpg");
      }
  </style>
<?php } }?>

