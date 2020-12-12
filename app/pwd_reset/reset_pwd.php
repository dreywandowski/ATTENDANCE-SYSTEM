<!DOCTYPE html>
<html>
<head>
	<title> Reset Password</title>
		<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
</head>
<style type="text/css">
	body{
	background: url(img/28521.jpg);
	background-size: cover;
	font-family: 'Zilla Slab', serif;
	font-size: 22px;
}

img {
  border-radius: 8px;
}

a:link, a:visited {
  background-color: green;
  color: white;
  padding: 14px 25px;
  text-align: center; 
  text-decoration: none;
  display: inline-block;
  border-radius: 8px;
}

a:hover, a:active {
  background-color: red;
}

button{
  background-color: orange; /* Green */
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 25px;
   border-radius: 8px;
}
	
</style>

<?php
session_start();

if (!isset($_SESSION['email']) && !isset($_SESSION['username']) && !isset($_SESSION['token'])){
header("Location:dashboard/error.php");
}

//session_destroy();	

$email = $_SESSION['email'];
$username = $_SESSION['username'];
$token = $_SESSION['token'];

?>


<p> Enter the new password for the email associated with your account:

<form action="pwd_sucess.php" method="POST" >
	<input type="text" hidden name="token" value="<?php echo $token ?>" readonly>
	Email: <input type="email" name="user_mail" value="<?php echo $email ?>" readonly>&nbsp<br><br>
	New Password: <input type="password" id="pwd" name="pwd"><br><br><br>

	
<button type="submit"> Change Password</button>
</form>