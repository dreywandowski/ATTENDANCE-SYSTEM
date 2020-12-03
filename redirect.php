<?php
session_start();


require_once "connect.php";
// code that procceses user before landing on the page
// populate the variables with values gotten from user input

$username = $_GET['username'];

 $query = "SELECT username from users where username = '$username'";
$success =  mysqli_query($link, $query);

if(mysqli_num_rows($success) > 0){
    echo "<p style='color:red'>"."username already taken!!"."</p>";
  }
  else " ";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST["staff_type"];
$file_path = $_POST["file_path"];

// get the timestamp
date_default_timezone_set("Africa/Lagos");
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");

$currTime = $date_r;


// secure password b4 storing in database
$hash = password_hash($password, PASSWORD_DEFAULT);

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name']  = $last_name;
$_SESSION['username']  = $username;
$_SESSION['password']  = $hash;

$_SESSION['role'] = $role;



//setcookie('first_name', $first_name, time() + 60 * 25);
//setcookie('last_name', $last_name, time() + 60 * 25);



    $sql = "INSERT INTO users (first_name, last_name, username, email, password, role, file_path, reg_time, login_time)
      values ('$first_name', '$last_name', '$username', '$email', '$hash', '$role', '$file_path', '$currTime', '$currTime')";

if (mysqli_query($link, $sql)){
  // send welcome email

 echo "<script>"."window.location = 'success.php'"."</script>";
}


else{

	die("Error signing you up. Try again.".mysqli_error($link));
}


}