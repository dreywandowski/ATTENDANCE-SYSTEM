<?php
session_start();


require '../../config/Password.php';


if($_SERVER['REQUEST_METHOD']=== 'POST'){
		$username = $_POST['username'];

      $check = new Password();
      $check->checkMail($username); 
}

?>