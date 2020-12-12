<?php
session_start();

require '../../config/Connect.php';

Class Reset extends Connect{

public function checkMail(){
	$username = $_POST['username'];

	$_SESSION['username'] = $username;

$sql = "SELECT email from users where username = '$username'";

$result = mysqli_query($this->conn, $sql);


$count = $result->num_rows;

if($count > 0){
	 foreach($count as $row) {
	$email = $row['email'];
}
$_SESSION['email'] = $email;
echo "<script>"."window.location.replace('mail.php')"."</script>";
}

else{
	echo "No valid email in the database";
}

}


}

$check = new Reset();
$check->checkMail(); 


?>