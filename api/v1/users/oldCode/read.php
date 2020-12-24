<?php
//required headers

include_once '../connect.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// instatitiate database object and users object

$readUsers = new Database();
$readUsers->getUsers();

// get a single user
//$readUsers->getUser($username);



$database = new Database();
$db = $database->connect();


// initialize users object, and pass the db connection stream to the users object too
$users = new Users($db);


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

$readUsers = new Database();
$readUsers->getUsers();



?>