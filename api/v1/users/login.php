<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//header("Content-type: application/x-www-form-urlencoded");


// connect to the db
require "../connect.php";
//require "../core.php";

// generate JWT tokens
require_once "../jwt_variables.php";




use \Firebase\JWT\JWT;



class Login extends Connect{

public function loginUser(){

if ($_SERVER['REQUEST_METHOD'] === "POST"){

$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = $data->password;


$query = "SELECT * from users where username = '$username'";

 $result = mysqli_query($this->conn, $query);

 $success = mysqli_fetch_array($result); 

$role = $success['role'];
$newPwd =  $success['password'];
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


// jwt variables
$issuer = "http://localhost/attendance/api/v1/users/login.php";
$issued_at = time();
$expiration_time = $issued_at + (60 *2);  // 2 minutes
$key =   "Aduramimo_SECRET_API_KEY";
$read = date('d/m/y H:i:s', $expiration_time);


// issue a JWT token upon successful login
		$token = array(
			"iat" => $issued_at,
			"exp" => $expiration_time,
			"iss" =>$issuer,
			"data" => array(
				"username" =>$username,
			    "role" =>$role
			)
		);

		//set the response code
http_response_code(200);


// generate JWT
$jwt = JWT::encode($token, $key);

			//show users in json format

			echo json_encode(array("message" => "Login successfully", 
		                            "jwt" => $jwt,
		                            
		                            "exp" => $read
		                        ));
}



else{

	// set the response code to 404
			http_response_code(404);

			echo json_encode(array("message" => "Login failed. Check your username and/or password"));
}

}

}

else{
	// set the response code to 503
			http_response_code(503);

			echo json_encode(array("message" => "Access Denied"));
}
}



}


$login = new Login();
$login->loginUser();
