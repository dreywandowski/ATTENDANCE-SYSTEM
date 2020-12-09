<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//header("Content-type: application/x-www-form-urlencoded");


// connect to the db
require "../connect.php";


class Register extends Connect{

// get posted data

public function createUser(){
	$json = file_get_contents("php://input");

$data = json_decode(file_get_contents("php://input"));

if(!$data) {

// set the response code to 404
			http_response_code(404);

			echo json_encode(array("message" =>"Data missing or invalid"));
}


else{
	//echo json_encode("It works");

    $hash = password_hash($data->password, PASSWORD_DEFAULT);

   
   $query = "INSERT INTO users(first_name, last_name, username, email, password, role, file_path) VALUES('$data->first_name', '$data->last_name', '$data->username', '$data->email', '$hash', '$data->role', '$data->file_path')";


mysqli_query($this->conn, $query);

	if(mysqli_affected_rows($this->conn) > 0){

		$user_item = array(
				'username' =>$data->username,
				'first_name' =>$data->first_name,
				'last_name' =>$data->last_name,
				'email' =>$data->email,
				'role' =>$data->role,
				'password' =>$hash,
				'file_path' =>$data->file_path
			);

array_push($user_item);

			// set response code to 200 -OK
 
			http_response_code(201);

			//show users in json format

			echo json_encode(array("message" => "User created successfully"));
		}
else{
			// set the response code to 404
			http_response_code(404);

			echo json_encode(array("message" => "Error creating the user"));
	}

//$this->conn->close();

}

}
	}

// instatitiate database object and users object
$register = new Register();
$register->createUser();

?>