<?php 
// this keeps the user logged in
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once "../../../config/Exams.php";


?>
