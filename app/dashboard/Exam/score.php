<?php
session_start();
require_once "../../config/connect.php";

$username = $_SESSION['username'];
$password = $_SESSION['password'];

// values gotten through AJAX
$score = $_POST['score'];
$question = $_POST['question'];
$querys = $_POST['querys'];

// sets the above arrays as session variables
$_SESSION["score"] = $score;
$_SESSION["question"] = $question;
$_SESSION["querys"] = $querys;

// output questions and answers in human readable format
$q = print_r($question);
$a = print_r($querys);


// update score for the current user
/** $sql = "UPDATE results
SET username = '$username'
 score = '$score'";
**/
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");
$tz = ini_get('date.timezone');
 
//echo "date: " . $date->format("Y-m-d h:i:s")." "."Current time Zone:" .$tz;

$sql = "INSERT INTO results(username, score, date_taken)
		VALUES ('$username', '$score', '$date_r')";

$result = mysqli_query($link, $sql);

 /**if ($result){
	$query = "SELECT first_name, last_name 
            FROM  users
            JOIN results ON username = username
            WHERE username = $username";

            echo $suc;
        }
**/
echo  $score;
print_r($question);
print_r($querys) ;


?>