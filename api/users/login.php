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
include_once "php-jwt-master/src/BeforeValidException.php";
include_once "php-jwt-master/src/ExpiredException.php";
include_once "php-jwt-master/src/SignatureInvalidException.php";
include_once "php-jwt-master/src/JWT.php";


use \Firebase\JWT\JWT;



class Login extends Connect{

	public function loginUser(){



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
// jwt variables

$issuer = "http://localhost/attendance/api/users/login.php";
$issued_at = time();
$expiration_time = $issued_at + (60 * 60);  // 10 minutes
$key =  "427708aeb2911e68a03d67ad26d5f85dc8befe97b9";  //bin2hex(random_bytes(21));




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
		                            "key" => $key
		                        ));
}



else{

	// set the response code to 404
			http_response_code(404);

			echo json_encode(array("message" => "Login failed"));
}

}

}

}


$login = new Login();
$login->loginUser();
?>