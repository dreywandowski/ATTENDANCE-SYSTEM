<?php
session_start();


require_once "Connect.php";


Class Register extends Connect{


//filter user input
  protected function checkInput($var){

    $var = htmlspecialchars($var);
    $var = trim($var);
    $var = stripslashes($var);

    return $var;
  }


public function insertIntoDb($first_name,$last_name, $email, $username, $password, $file_path, $role){
		$username = $this->checkInput($username);
		$password = $this->checkInput($password);
        $email =    $this->checkInput($email);
        $first_name = $this->checkInput($first_name);
		$last_name = $this->checkInput($last_name);
        $file_path = $this->checkInput($file_path);
        $role = $this->checkInput($role);

		// get the timestamp
date_default_timezone_set("Africa/Lagos");
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");

$currTime = $date_r;


        $pwd = password_hash($password, PASSWORD_DEFAULT);


       // insert to db
		$this->insertDB($first_name, $last_name, $email, $username, $pwd, $file_path, $role, $currTime);



	}


// method for insertion into the db
protected function insertDB($first_name, $last_name, $email, $username, $pwd, $file_path, $role, $currTime){
	$query = "INSERT INTO users(first_name, last_name, email, username, password, file_path, role, reg_time, login_time ) 
	              VALUES('$first_name', '$last_name', '$email', '$username', '$pwd', '$file_path', '$role', '$currTime', '$currTime')";

	mysqli_query($this->conn, $query);

	if(mysqli_affected_rows($this->conn) > 0){
	
 echo "<script>"."window.location = 'success.php'"."</script>";
		return true;
	}

else{
//echo "Nope".mysqli_error($this->conn);
	return false;
}
}

}


$object = new Register();

// checks against XSS attacks
$html = array(
'username' => htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'),
'password' => htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8'),
'first_name' => htmlentities($_POST['first_name'], ENT_QUOTES, 'UTF-8'),
'last_name' => htmlentities($_POST['last_name'], ENT_QUOTES, 'UTF-8'),
'email' => htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'),
'role' => htmlentities($_POST['staff_type'], ENT_QUOTES, 'UTF-8'),
'file_path' => htmlentities($_POST['file_path'], ENT_QUOTES, 'UTF-8'),
);



$first_name = $html['first_name'];
$last_name = $html['last_name'];
$username = $html['username'];
$email = $html['email'];
$password = $html['password'];
$role = $html["staff_type"];
$file_path = $html["file_path"];


$result = $object->insertIntoDb($first_name,$last_name, $email, $username, $password, $file_path, $role);