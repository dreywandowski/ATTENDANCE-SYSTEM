<?php
session_start();

if (!isset($_SESSION['username']) 
&& !isset($_SESSION['password'])){
header("Location:error.php");
}


if ($_SESSION['role'] != 'student'){
    header("Location:error.php");
}

require "dashboard.php";

?>

<div id="result"></div>



</body>
</html>