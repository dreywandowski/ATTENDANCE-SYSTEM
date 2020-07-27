<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../connect.php';
include_once 'users.php';


// instatitiate database object and users object
$database = new Database();
$db = $database->connect();


// initialize users object, and pass the db connection stream to the users object too
$users = new Users($db);

// get posted data
$data =json_encode(value)

?>