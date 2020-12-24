<?php
session_start();

require '../../config/Connect.php';



?>

<!DOCTYPE html>
<html>
<head>
	<title> Reset Password</title>
		<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
</head>
<style type="text/css">
	body{
	background-color: azure;
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
<body>
<center>
	<p>Password Reset page. Please provide the following:</p><br>
<form method="POST" action="check.php">
	 Username:<input type="text" name="username"><br><br><br>
	 <button type="submit" id="change">Send the code to me</button><br><br>

</form><br><br>
<a href="../../index.php">Back</a>&nbsp
</center>

	 
</html>