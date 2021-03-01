<!doctype html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Transaction History </title>
		<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
	 
	
</head>

<style type="text/css">
  body{
   font-size: 22px;
    font-family: 'Zilla Slab', serif;
    background: url(images/101994-OM0XMB-226.jpg);
      background-color: coral;
    background-size: cover;
    margin: 0;
}

	 #table{
    	background-color: white;
        width: 70%;
         border-collapse: collapse;
}
th{
	background-color:#4CAF50;
}
th, td {
  padding: 15px;
  text-align: left;
  border-bottom: 3px solid #ddd;
}
  
tr:hover {
	background-color: #f5f5f5;

}
</style>
<center><p><u> Transaction History </u></p></center>


<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

$username = $_SESSION['username'];

require_once "../../../config/Fees.php";

if (!isset($_SESSION['username']) 
&& !isset($_SESSION['password'])){
header("Location:error.php");
}

if ($_SESSION['role'] != 'student'){
  header("Location:error.php");
}


  $bills = new Fees();   
  $bills->show($username);

 ?>

<br>
<br>


 <a href="../student.php">Back</a>&nbsp

  <script src="../js/jquery-3.2.1.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
    $('.dl').on('click', function (evt) {
      var value = $('#rec').val();
      var cookie = value;
      document.cookie = 'cookie ='+cookie;
      window.location = "school_fees.php";
  });
});

    </script>
</body>
</html>