<?php 
// this keeps the user logged in
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once "../../config/connect.php";


//if (isset($_POST['sub'])){ 
$login = $_POST["username"];
$password = $_POST["password"];

// get the timestamp
date_default_timezone_set("Africa/Lagos");
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");

$currTime = $date_r;


// checks if the user exists in the database
$query = "SELECT first_name, last_name, username, password from users where username = '$login'";
$success = mysqli_query($link, $query);

if(mysqli_num_rows($success) > 0){
    foreach($success as $row) {
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $username = $row['username'];
  $pwd = $row['password'];

   }

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['username'] = $username;
$_SESSION['password'] = $pwd;




if (password_verify($password, $pwd)){
 

echo "<h3 id='text' style='font-size:14px';>".$first_name." " . $last_name." " ."You are about to start this test, which lasts for 10 minutes. Click OK to continue"."</h3>";
	echo "<input type='button' id='dynamic' value='OK, continue'>";


   

}

else{
  echo "<p style='color:red'; 'text-decoration:bold'>"."Incorrect User or password!! try again"."</p>";
 }
}

?>
