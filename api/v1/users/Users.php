<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//header("Content-type: application/x-www-form-urlencoded");


// connect to the db
require "../connect.php";

// this API is for a logged-in user after getting his JWT token 
class Users extends Connect{
	public $firstName; 
	public $lastName; 
    public $email; 
    public $role; 
    public $username; 
    public $file_path; 
    public $password; 
    public $regTime; 
    public $loginTime; 
     
    public function getMyDetails(){

    }

}