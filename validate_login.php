<?php 
// this keeps the user logged in
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    require_once "connect.php";


//if (isset($_POST['sub'])){ 
$login = $_POST["username"];
$password = $_POST["password"];

// get the timestamp
date_default_timezone_set("Africa/Lagos");
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");

$currTime = $date_r;


// checks if the user exists in the database
$query = "SELECT first_name, last_name, username, password, role from users where username = '$login'";
$success = mysqli_query($link, $query);

if(mysqli_num_rows($success) > 0){
    foreach($success as $row) {
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $username = $row['username'];
  $pwd = $row['password'];
  $role = $row['role'];

   }

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['username'] = $username;
$_SESSION['password'] = $pwd;
$_SESSION['role'] = $role;



if (password_verify($password, $pwd)){
  echo "<script>"."alert('Login successfully')"."</script>";

// updates login time
  $log = "UPDATE users
    SET login_time = '$currTime'
    WHERE username = '$username'";

    $successful = mysqli_query($link, $log);

// redirects based on login type
   if ($role == "student"){
    $sql = "SELECT * FROM users where username = '$login' and role ='student'" ;

    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "<script>"."window.location.replace('dashboard/student.php')"."</script>";
    } 
    else{
        echo "<p style='color:red'; 'text-decoration:bold'>"."Incorrect User or password!! try again"."</p>";
    }
}
else if ($role == "teacher"){
    $sql = "SELECT * FROM users where username = '$login' and role='teacher'" ;

    $result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result) > 0){
        echo "<script>"."window.location.replace('dashboard/teacher.php')"."</script>";
    } 
    else{
        echo "<p style='color:red'; 'text-decoration:bold'>"."Incorrect User or password!! try again "."</p>";
    }
}
   

}

else{
  echo "<p style='color:red'; 'text-decoration:bold'>"."Incorrect User or password!! try again"."</p>";
 }
}

?>
