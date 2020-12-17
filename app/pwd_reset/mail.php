<?php
session_start();
$email = $_SESSION['email'];
$username = $_SESSION['username'];

    require '../../config/Password.php';

    require "../../lib/PHPMailer\src\PHPMailer.php";
    require "../../lib/PHPMailer\src\SMTP.php";
    require "../../lib/PHPMailer\src\Exception.php";
 
    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 

    $mail->CharSet="UTF-8";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPDebug = 0; 
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

//$_SESSION['token'] = $token;



    $mail->SetFrom("aduramimo@gmail.com");
    $mail->AddAddress("$email");
    $mail->Subject = "Your Password Reset Link";
    $mail->Body = "Hey, you requested to reset your password, here is the link to do that, you can copy the link and paste in your browser if you cant click:  ". "  localhost/ATTENDANCE/app/pwd_reset/reset_pwd.php?token=".$token."\n"."<br>".
"Kindly ignore if you did not initiate this request";
$mail->addAttachment('../../public/images/1737043_1374513282856573_2129039283_n.jpg', 'Our Logo');


if($mail->Send()) {
        echo "<center>"."<br>"."<br>"."<h2>"."<u>"."Reset link sent! Check your mail for further instructions"."</u>"."</h2>"."</center>";
    }
    else {
     echo "Error sending mail: ". $mail->ErrorInfo;
  }
// send mail
//$mail->send();



// record the token in the database
$send = new Password();
$send->sendMail($token, $currTime);
?>

<br><br>
<style>
html{
    background: green;
    color: white;
    background-image: url(../../public/images/668.jpg);
    background-size: cover;
}
a{
    color: azure;
}

    </style>
<center><h3><a href="../../landing.php">Home</a></h3></center>

<!--
<br><br>
<a href="reset_pwd.php">Reset Password here</a>-->