<?php
session_start();
require 'connect.php';

$username = $_POST['username'];

$_SESSION['username'] = $username;

$sql = "SELECT email from users where username = '$username'";

$success = mysqli_query($link, $sql);

if(mysqli_num_rows($success) > 0){
	 foreach($success as $row) {
	$email = $row['email'];
}
$_SESSION['email'] = $email;
echo "<script>"."window.location.replace('mail.php')"."</script>";
}

else{
	echo "No valid email in the database";
}
?>