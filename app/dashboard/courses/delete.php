<?php

require_once "../../config/connect.php";

$file = $_POST['file'];

$sql = "DELETE FROM courses
WHERE ID = $file";

if (mysqli_query($link, $sql)){
	echo "Deleted Successfully!!";
}

else {
	die("Deletion Error!! ".mysqli_error($link));
}



mysqli_close($link);





?>