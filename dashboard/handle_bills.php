<?php
session_start();
require 'connect.php';

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

echo "Ok";



    $sql = "INSERT INTO fees(user, email, amount, phone, payment_ref, date_payed)
      values ('$user', '$email', '$amount', '$phone', '$ref', '$currTime')";

if (mysqli_query($link, $sql)){
  // send welcome email

 echo 'Payment successfully recorded. Check the transaction history to see your payment';
}


else{

	die("Error in payment.".mysqli_error($link));
}



?>