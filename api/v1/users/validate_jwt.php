<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//header("Content-type: application/x-www-form-urlencoded");


// connect to the db
//require "login.php";
//require "../core.php";

// generate JWT tokens
include_once "php-jwt-master/src/BeforeValidException.php";
include_once "php-jwt-master/src/ExpiredException.php";
include_once "php-jwt-master/src/SignatureInvalidException.php";
include_once "php-jwt-master/src/JWT.php";


use \Firebase\JWT\JWT;



class Validate {

	public function validateKey(){
// get posted data
	$data = json_decode(file_get_contents("php://input"));

	// jwt variables

$issuer = "http://localhost/attendance/api/users/login.php";
$issued_at = time();
$expiration_time = $issued_at + (60 * 60);  // 10 minutes
$key =  "427708aeb2911e68a03d67ad26d5f85dc8befe97b9";


	// get jwt

	$jwt = isset($data->jwt)? $data->jwt: " ";
//echo "This is the jwt from the parent class: ". $jwt;
	// if jwt is not empty
	if($jwt){

		try{

			// decode jwt
			$decoded = JWT::decode($jwt, $key, array('HS256'));

			// SET RESPONSE CODE
			http_response_code(200);

			echo json_encode(array(
				"message" => "Access granted",
			    "data" => $decoded->data
			)) ;
		}

		catch(Exception $e){


// set response code
	http_response_code(401);
	

			echo json_encode(array(
				"message" => "Access Denied",
				"error" => $e->getMessage()
			)) ;
		}
	} 



// if JWT is empty
	else{

		// set response code
		http_response_code(401);

echo json_encode(array(
				"message" => "Access denied, empty JWT"
			)) ;
	}

	}
	
}


	$validate = new Validate();
	//$validate->validateKey();