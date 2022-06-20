<?php
session_start();
$username = $_SESSION['username'];

require_once "../../config/Password.php";


if (!isset($_POST['user_mail']) && !isset($_POST['username']) && !isset($_POST['token'])){
header("Location:dashboard/error.php");
}


$token = $_POST['token'];

$pwd = $_POST['pwd'];

// secure password b4 storing in database
$hash = password_hash($pwd, PASSWORD_DEFAULT);

// resets password
$reset = new Password();
$reset->resetPwd($username, $hash); 


// destroys token
$reset->destroyToken($token, $username); 
?>