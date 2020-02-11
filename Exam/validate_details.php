<?php


require_once "connect.php";

$username = $_POST["username"];
$password = $_POST["password"];


$user = "SELECT first_name, last_name FROM users where username = '$username' and password = '$password'";
$query = mysqli_query($link, $user);

if (mysqli_num_rows($query) > 0 ){
	 foreach($query as $row) {
 $first_name = $row['first_name'];
 $last_name = $row['last_name'];

	echo "<h3 id='text' style='font-size:14px';>".$first_name." " . $last_name." " ."You are about to start this test, which lasts for 10 minutes. Click OK to continue"."</h3>";
	echo "<input type='button' id='dynamic' value='OK, continue'>";
	
}
}
else {
	echo "<p style='color:red'>"."Error logging in!! Check your details and try again!"."</p>";
}


$anwers = array();

?>