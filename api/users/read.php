<?php
//required headers

include_once '../connect.php';


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// instatitiate database object and users object
$readUsers = new Database();
$readUsers->getUsers();


?>