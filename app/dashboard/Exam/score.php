<?php
session_start();
require_once "../../../config/Exams.php";

$post = new Exams();

$username = $_SESSION['username'];
$score = $_POST['score'];

// get the timestamp
date_default_timezone_set("Africa/Lagos");
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");


$post->postExams($username, $score, $date_r);
?>