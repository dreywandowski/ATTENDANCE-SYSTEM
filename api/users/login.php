<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//header("Content-type: application/x-www-form-urlencoded");


// connect to the db
require "../connect.php";


// generate JWT tokens
include_once "php-jwt-master/src/BeforeValidException.php";
include_once "php-jwt-master/src/ExpiredException.php";
include_once "php-jwt-master/src/SignatureInvalidException.php";
include_once "php-jwt-master/src/JWT.php";


class Login extends Connect{
$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = $data->password;



}


$login = new Login();
$login->login();
?>