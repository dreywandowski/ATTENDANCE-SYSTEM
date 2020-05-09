<?php
session_start();
$email = $_SESSION['email'];
$username = $_SESSION['username'];
require 'connect.php';

    require "C:\wamp64\www\ATTENDANCE\PHPMailer\src\PHPMailer.php";
    require "C:\wamp64\www\ATTENDANCE\PHPMailer\src\SMTP.php";
    require "C:\wamp64\www\ATTENDANCE\PHPMailer\src\Exception.php";
 
    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 

    $mail->CharSet="UTF-8";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPDebug = 1; 
    $mail->Port = 465 ; //465 or 587

     $mail->SMTPSecure = 'ssl';  
    $mail->SMTPAuth = true; 
    $mail->IsHTML(true);

    //Authentication
    $mail->Username = "aduramimo@gmail.com";
    $mail->Password = "!@#qaz123adura";

    //Set Params

// get the timestamp
date_default_timezone_set("Africa/Lagos");
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");

$currTime = $date_r;



//Generate a random string.
$token = openssl_random_pseudo_bytes(16);
 
//Convert the binary data into hexadecimal representation.
$token = bin2hex($token);

$_SESSION['token'] = $token;

echo "$email".$token;

    $mail->SetFrom("aduramimo@gmail.com");
    $mail->AddAddress("$email");
    $mail->Subject = "Your Password Reset Link";
    $mail->Body = "Hey, you requested to reset your password, here is the link to do that. You can copy the link if you cant click.  ". "  localhost/ATTENDANCE/reset_pwd.php?token=".$token."\n".
"Kindly ignore if you did not initiate this request";

$sql = "INSERT INTO tokens (token_key, date_created, consumed)
      values ('$token', '$currTime', 'no')";

if (mysqli_query($link, $sql)){
     if($mail->Send()) {
        echo "Mail sent";
     } 

     else {
     echo "Mailer Error: " . $mail->ErrorInfo;
     }
}

else {
    echo "Error";
}
?>

<br><br>
<a href="index.php">Home</a>