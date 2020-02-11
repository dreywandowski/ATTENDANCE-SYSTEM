<?php

session_start();


require_once "connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user = $_POST['username'];
$pwd = $_POST['pwd'];

$name = $_SESSION['username'];
echo "<script>". "console.log('$name')"."</script>";

$sql = "UPDATE users
SET first_name = '$first_name', last_name = '$last_name', username = '$user', password = '$pwd'
WHERE username = '$name'";

$result = mysqli_query($link, $sql);

if ($result){
	echo "<script>". "alert('Record Updated Succesfully!!, Your changes will take effect on your next login')"."</script>";
	
}
else{
	echo "Failed";
}
}

?>