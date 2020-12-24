<?php

// generate JWT tokens
include_once "php-jwt-master/src/BeforeValidException.php";
include_once "php-jwt-master/src/ExpiredException.php";
include_once "php-jwt-master/src/SignatureInvalidException.php";
include_once "php-jwt-master/src/JWT.php";


use \Firebase\JWT\JWT;


// jwt variables

$issuer = "http://localhost/attendance/api/users/login.php";
$issued_at = time();
$expiration_time = $issued_at + (60 * 60);  // 10 minutes
$key =  openssl_random_pseudo_bytes(16);


?>