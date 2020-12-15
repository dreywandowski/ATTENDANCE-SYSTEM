<?php
session_start();
require_once "../../../config/Fees.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$user = $_SESSION['username'];
$email = $_POST['email'];

// get the timestamp
date_default_timezone_set("Africa/Lagos");
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");

$currTime = $date_r;


$amount = $_POST['amount'];
$phone = $_POST['phone'];
$ref = $_POST['ref'];

// pay  bills
$payBills = new Fees();
$payBills->handleBills($user, $email, $amount, $phone, $ref, $currTime);



} 

?>