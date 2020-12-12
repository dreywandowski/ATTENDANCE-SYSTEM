<?php

require_once "../../../config/Courses.php";


// delete courses
$file = $_POST['file'];

$delete = new Courses();
$delete->deleteCourse($file);





?>