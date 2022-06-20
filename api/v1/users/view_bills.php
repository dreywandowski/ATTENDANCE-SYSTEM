<?php
//required headers

include_once '../connect.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// generate JWT tokens
include_once "php-jwt-master/src/BeforeValidException.php";
include_once "php-jwt-master/src/ExpiredException.php";
include_once "php-jwt-master/src/SignatureInvalidException.php";
include_once "php-jwt-master/src/JWT.php";
include_once "../jwt_variables.php";

use \Firebase\JWT\JWT;


Class View extends Connect{

public function bills(){

	$check = $users->read(); // a standard method for SELECT
    $num = $check->rowCount();


// if records are found

if($num>0){
	$users_array = array();
	$users_array['records'] =array();

	while($row=$check->fetch(PDO::FETCH_ASSOC)){
		//extract row
		extract($row);

		$user_item=array(
			'username' => $username,
			'first_name' => $firstName,
			'last_name' => $lastName,
			'email' => $email,
			'role' => $role
		);

		array_push($users_array['records'], $user_item);
	}


	// set response code to 200 - OK
	http_response_code(200);

	//show users in json format
	echo json_encode($users_array);
}


else{
// set the response code to 404
	http_response_code(404);

	echo json_encode("No users found");

}

}


}



$readUsers = new Database();
$readUsers->getUsers();



?>