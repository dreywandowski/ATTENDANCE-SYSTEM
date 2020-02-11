
<?php 
// this keeps the user logged in
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 



    //<?php
    require_once "connect.php";

//form validation
    
//if (isset($_POST['sub'])){ 
$login = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["staff"];
//$rem = $_POST['remember'];

$query = "SELECT first_name, last_name, username, password from users where username = '$login' and password = '$password' 
        and role ='$role'";
$success = mysqli_query($link, $query);

if(mysqli_num_rows($success) > 0){
    echo "<script>"."alert('Login successfully')"."</script>";
    foreach($success as $row) {
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $username = $row['username'];
  $password = $row['password'];

   }

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['role'] = $role;

   //if (isset($rem)){
   //setcookie('first_name', $first_name, time() + 60 * 10);
   //setcookie('last_name', $last_name, time() + 60 * 10);
   //setcookie('username', $username, time() + 60 * 10);
   //setcookie('password', $password, time() + 60 * 10);
 }
//}
    
 if ($role == "student"){
    $sql = "SELECT * FROM users where username = '$login' and password = '$password' and role ='student'" ;

    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "<script>"."window.location.replace('dashboard/student.php')"."</script>";
     //header("Location:dashboard/student.php");
     //exit();
    } 
    else{
        echo "<p style='color:red'; 'text-decoration:bold'>"."Incorrect User or password!! try again"."</p>";
    }
}
else if ($role == "teacher"){
    $sql = "SELECT * FROM users where username = '$login' and password = '$password' and role='teacher'" ;

    $result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result) > 0){
        echo "<script>"."window.location.replace('dashboard/teacher.php')"."</script>";
        //header("Location:dashboard/teacher.php");
        //exit();
    } 
    else{
        echo "<p style='color:red'; 'text-decoration:bold'>"."Incorrect User or password!! try again "."</p>";// "<a href = 'index.php'>"."Click here "."</a>" . "to try again";  
    }
}
 /**if (isset($rem)){
    setcookie("username", $login, time() + (60 * 5));
    setcookie("pwd", $password, time() + (60 * 5));
    setcookie("role", $role, time() + (60 * 5));

 }

else if(!isset($rem)){
    unset($_COOKIE['username']);
    unset($_COOKIE['pwd']);
    unset($_COOKIE['role']);

    setcookie('username', '', time() - 3600, '/'); 
    setcookie('pwd', '', time() - 3600, '/');
    setcookie('role', '', time() - 3600, '/');
}// $_SESSION['user'] = $_COOKIE['username'];

}




//$sql = "SELECT * FROM users where username = '$login' and password = '$password' and role ='$role'";
//$details == setcookie(det, $sql);**///
//}

?>
