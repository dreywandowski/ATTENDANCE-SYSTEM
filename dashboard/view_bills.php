<!doctype html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Transaction History </title>
		<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
	
	
</head>

<style type="text/css">
  body{
   font-size: 22px;
    font-family: 'Zilla Slab', serif;
    background: url(images/101994-OM0XMB-226.jpg);
    background-size: cover;
    margin: 0;
}

	 #table{
    	background-color: white;
        width: 70%;
         border-collapse: collapse;
}
th{
	background-color:#4CAF50;
}
th, td {
  padding: 15px;
  text-align: left;
  border-bottom: 3px solid #ddd;
}
  
tr:hover {
	background-color: #f5f5f5;

}
</style>
<center><p><u> Transaction History </u></p></center>


<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

$username = $_SESSION['username'];

require "connect.php";

if (!isset($_SESSION['username']) 
&& !isset($_SESSION['password'])){
header("Location:error.php");
}

if ($_SESSION['role'] != 'student'){
  header("Location:error.php");
}


$sql = "SELECT first_name, last_name, date_payed,amount FROM  fees LEFT OUTER JOIN users ON username = 'oluwatest'";

$success = mysqli_query($link, $sql);


echo  "<center>"."<table id='table' border cellpadding=3>" . "<h4>".
       "<tr><th width=100>Fullname</th><th width=80>Date</th><th width=80>Amount Paid</th></th>"."<th width=80>Transaction ID</th>".
      "&nbsp";



while($row = mysqli_fetch_assoc($success)) {
  echo 
      "<td>".$row["first_name"]." ".$row["last_name"]."</td>".
      "<td>".$row["date_payed"]."</td>".
      "<td>".$row["amount"]."</td>".
     
      "<td>".$row["paymeref"]."</td>".
    
     
      "<td>"."<button class='dl' type='submit' value='$file'>". "Download"."</button>". "&nbsp";
 
}


echo "</tr>" ."</table>"."</center>";
 ?>

<br>
<br>
 <a href="student.php">Back</a>&nbsp