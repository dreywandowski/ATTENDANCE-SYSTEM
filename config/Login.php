<?php
//namespace Config;
// this keeps the user logged in
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

require "Connect.php";



class Login extends Connect {

//remember me functionality
public function rememberMe($username, $password, $rem){

  if (isset($rem)){
    setcookie("user", $username, time() + (604800), "/ATTENDANCE");
    setcookie("password", $password, time() + (604800), "/ATTENDANCE");

}



else {
    unset($_COOKIE['username']);
    unset($_COOKIE['password']);
  

    setcookie('username', '', time() - 604800, '/ATTENDANCE'); 
    setcookie('password', '', time() - 604800, '/ATTENDANCE');
  
}

}

//filter user input
  protected function checkInput($var){

    $var = htmlspecialchars($var);
    $var = trim($var);
    $var = stripslashes($var);

    return $var;
  }




public function queryDb($username, $password){
    $username = $this->checkInput($username);
    $password = $this->checkInput($password);
       

       // insert to db
    $this->loginUser($username, $password);



  }



// method for validating user
protected function loginUser($username, $password){

 $sql = "SELECT * from users where username = '$username' ";

 $result = mysqli_query($this->conn, $sql);

 $success = mysqli_fetch_array($result); 

 $newPwd =  $success['password'];

$role = $success['role'];

$first_name = $success['first_name'];
$last_name = $success['last_name'];
$username = $success['username'];

$email = $success['email'];

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['password'] = $newPwd; 
$_SESSION['role'] = $role;
$_SESSION['username'] = $username;
$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;



$count = $result->num_rows;

if ($count > 0){

  if (password_verify($password, $newPwd)){

// refreshes token details
$_SESSION['auth'] = TRUE;
session_regenerate_id();


// get the timestamp
date_default_timezone_set("Africa/Lagos");
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");

$currTime = $date_r;

    // updates login time
  $log = "UPDATE users
    SET login_time = '$currTime'
    WHERE username = '$username'";

  mysqli_query($this->conn, $log);


    if($role == 'student'){
     echo "<script>"."window.location.replace('../ATTENDANCE/app/dashboard/student.php')"."</script>";
    }
    else if($role == 'teacher'){
    echo "<script>"."window.location.replace('../ATTENDANCE/app/dashboard/teacher.php')"."</script>";  
    }

    else{
    echo "<script>"."window.location.replace('../../index.php')"."</script>"; 
    }
    
}
  else{
  echo "<p style='color:red'; 'text-decoration:bold'>"."Incorrect User or password!! try again "."</p>" ;
  }
return false;

}



else {

echo "<p style='color:red'; 'text-decoration:bold'>"."No such user in the database "."</p>" ;

  return false;
}
 
}
}

 


$object = new Login();

// checks against XSS attacks
if (($_POST['rem']) =="check" && isset($_POST['username']) && isset($_POST['password'])){

// trigger remember me function if user wants

  $html = array(
'username' => htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'),
'password' => htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8'),
'rem' => htmlentities($_POST['rem'], ENT_QUOTES, 'UTF-8'),
);




$username = $html['username'];
$password = $html['password'];
$rem = $html['rem'];


$result = $object->queryDb($username, $password);
$rem = $object->rememberMe($username, $password, $rem);

}


else{
  // logs user in without remembering details

  $html = array(
'username' => htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'),
'password' => htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8'),

);




$username = $html['username'];
$password = $html['password'];


$result = $object->queryDb($username, $password);


}





