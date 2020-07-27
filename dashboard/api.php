<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "attendance";

$link = mysqli_connect($server, $user, $password, $db);

// saves the date as a cookie to query the db later
$cookie = $_COOKIE['cookie'];


$sql = "SELECT ID, first_name, last_name, score, date_taken, file_path
            FROM  results AS t1
            LEFT OUTER JOIN users AS t2
            ON t2.username = t1.username
            WHERE t1.date_taken ='2020-05-17 09:59:45'";

            $result = mysqli_query($link, $sql);

   $row = mysqli_fetch_array($result);
  $fullName = $row["first_name"] . "&nbsp" .$row["last_name"];
   $score = $row["score"];
    $date = $row["date_taken"];
   $pic = $row["file_path"];
   $id = $row["ID"];

echo "Hi"." ".$pic." ".$fullName;
   ?>
