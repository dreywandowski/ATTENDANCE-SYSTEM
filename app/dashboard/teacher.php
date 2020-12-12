<?php
session_start();

if (!isset($_SESSION['username']) 
&& !isset($_SESSION['password'])){
header("Location:error.php");
}


if ($_SESSION['role'] != 'teacher'){
    header("Location:error.php");
}

require "dashboard.php";

?>



</body>

</html>

