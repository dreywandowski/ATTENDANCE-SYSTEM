<?php 
// this keeps the user logged in
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

//use App\Connect;

require "../../config/Connect.php";




class Login extends Connect {



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
//$password = $success['password'];
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
return true;

}



else {

echo "<p style='color:red'; 'text-decoration:bold'>"."No such user in the database "."</p>" ;

  return false;
}
 
}
}


$object = new Login();


$username = $_POST['username'];
$password = $_POST['password'];


$result = $object->queryDb($username, $password);



?>
