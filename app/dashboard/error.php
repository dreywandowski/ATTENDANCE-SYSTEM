<style type="text/css">
	body{
		background: url('images/2663517.jpg') no-repeat center fixed;
        font-size: 90%;
       font-family: 'Raleway', sans-serif;
        font-weight: 500;
	}

	a {
    color: red;
}


</style>

<?php
session_start();
require_once "../../config/connect.php";
echo "<script>"."alert('You are seeing this page because you are not logged in or you are prohibited from viewing the requested page.')"."</script>";
echo "<br><br><br><a href='../../index.php'>"."<center><h1>Click here to login</h1></center>"."</a>";

?>