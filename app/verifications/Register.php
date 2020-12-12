<?php
session_start();


require_once "../../config/connect.php";


Class Register extends Connect{

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

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST["staff_type"];
$file_path = $_POST["file_path"];


$result = $object->insertIntoDb($first_name,$last_name, $email, $username, $password, $file_path, $role);