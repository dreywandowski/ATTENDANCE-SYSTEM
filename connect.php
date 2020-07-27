<?php
//connect to mysql server and select the login_details database

// instantiate the login details

$server = "localhost";
$user = "root";
$password = "";
$db = "attendance";

$link = mysqli_connect($server, $user, $password, $db);

if ($link){
	echo "<script>".
	"console.log('Connected to the database  Ok')"."</script>";
}

else{
	die("Error in connecting!!". mysqli_error($link));
}


?>