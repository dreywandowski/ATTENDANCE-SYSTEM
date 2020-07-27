<?php
session_start();
session_destroy();

require_once "connect.php";
/**if (isset($_COOKIE['first_name']) and isset($_COOKIE['last_name']) and isset($_COOKIE['username']) 
and 
isset($_COOKIE['password'])){
$fname = $_COOKIE['first_name'];
$lname = $_COOKIE['last_name'];
$user = $_COOKIE['username'];
$pwd = $_COOKIE['password'];	
}


setcookie('fname', $fname, time() - 1);
setcookie('lname', $lname, time() - 1);
setcookie('user', $user, time() - 1);
setcookie('pwd', $pwd, time() - 1);
**/

echo "You have been logged out successfully,"."<a href='../index.php'>"."Click here to go home"."</a>";

//header("Location:../index.php");




?>