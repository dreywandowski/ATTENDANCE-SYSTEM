<?php
//namespace App;

require_once "Connect.php";

Class Password extends Connect{

// verify that the email exists
public function checkMail($username){


	$_SESSION['username'] = $username;

$sql = "SELECT email from users where username = '$username'";

$result = mysqli_query($this->conn, $sql);
$success = mysqli_fetch_array($result); 

$email = $success['email'];

$count = $result->num_rows;


if($count > 0){
	$_SESSION['email'] = $email;
echo "<script>"."window.location.replace('mail.php')"."</script>";
	
}

else{
	echo "No valid email in the database";
}



}


// send email and insert fresh tokens

public function sendMail($token, $currTime){
	$sql = "INSERT INTO tokens (token_key, date_created, consumed)
      values ('$token', '$currTime', 'no')";

if (mysqli_query($this->conn, $sql)){
     
     } 

     else {
     echo "Error saving tokens: "; //. $mail->ErrorInfo;
    
}


}


// resets the password
public function resetPwd($username, $hash){

$sql = "SELECT token_key from tokens where consumed_by = '$username'";

$result = mysqli_query($this->conn, $sql);
$success = mysqli_fetch_array($result); 

//$consumed = $success['consumed'];

$count = $result->num_rows;


if($count > 0){
	echo "<script>"."Sorry, this token has expired. Please request for password change before continuing"."</script>";
	//return false;
	
}


else{
	$query = "UPDATE users
		SET password = '$hash'
		WHERE username = '$username'";

		$success = mysqli_query($this->conn, $query);
        
      if ($success){
      	echo "Password successfully changed, sign in with your new details:"."<a href='../../landing.php'>"."Here"."</a>";
      }

      else{
      	echo "Try again";
      }

}



}


// this destroys the validity of the token after user has used it reset password
public function destroyToken($token, $username){

$query = "UPDATE tokens
		SET consumed = 'yes',  
		consumed_by = '$username'
		WHERE token_key = '$token'";

		$success = mysqli_query($this->conn, $query);
        
      if ($success){
      	
      }

      else{
      	echo "Token not destroyed";
      }
}


}
