<?php
if (!isset($_POST['user_mail']) && !isset($_POST['username']) && !isset($_POST['token'])){
header("Location:dashboard/error.php");
}

session_start();
require 'connect.php';

$username = $_SESSION['username'];

$pwd = $_POST['pwd'];
// secure password b4 storing in database
$hash = password_hash($pwd, PASSWORD_DEFAULT);


$query = "UPDATE users
		SET password = '$hash'
		WHERE username = '$username'";

		$success = mysqli_query($link, $query);
        
      if ($success){
      	echo "Password successfully changed";
      }

      else{
      	echo "Try again";
      }


?>