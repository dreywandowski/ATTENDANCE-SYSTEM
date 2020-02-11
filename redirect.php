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
 
$_SESSION['first_name'] = $first_name;
$_SESSION['last_name']  = $last_name;
$_SESSION['username']  = $username;
$_SESSION['password']  = $password;

$_SESSION['role'] = $role;



//setcookie('first_name', $first_name, time() + 60 * 25);
//setcookie('last_name', $last_name, time() + 60 * 25);



    $sql = "INSERT INTO users (first_name, last_name, username, email, password, role)
      values ('$first_name', '$last_name', '$username', '$email', '$password', '$role')";

if (mysqli_query($link, $sql)){
    if ($role == "student"){
    Header("Location:dashboard/student.php");
    exit();
  }
    else if ($role = "teacher"){
      Header("Location:dashboard/teacher.php");
        exit();
    }
}


else{

	die("Try again!!".mysqli_error($link));
}
/** 
}
else if ($staff_type == "student"){
// dynamically create these values

$sql = "INSERT INTO student (first_name, last_name, username, email, password)
      values ('$first_name', '$last_name', '$username', '$email', '$password')";

if (mysqli_query($link, $sql)){
	echo "<script>". "alert('Your account has been created!!')"."</script>";
    echo "<script>". "document.write('Welcome, $username')"."</script>";
    
    Header("Location:dashboard/student.php");
}


else{

	die("Try again!!".mysqli_error($link));
}




}
*/

}