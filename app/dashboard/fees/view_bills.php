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

require_once "../../config/connect.php";

if (!isset($_SESSION['username']) 
&& !isset($_SESSION['password'])){
header("Location:error.php");
}

if ($_SESSION['role'] != 'student'){
  header("Location:error.php");
}


$sql = "SELECT first_name, last_name, date_payed,amount, payment_ref FROM  fees LEFT OUTER JOIN users ON username = '$username'";

$success = mysqli_query($link, $sql);


echo  "<center>"."<table id='table' border cellpadding=3>" . "<h4>".
       "<tr><th width=100>Fullname</th><th width=80>Date</th><th width=80>Amount Paid</th></th>"."<th width=80>Transaction ID</th>".

      "&nbsp";



while($row = mysqli_fetch_assoc($success)) {
$refe = $row['payment_ref'];
  echo "<tr>".
      "<td>".$row["first_name"]." ".$row["last_name"]."</td>".
      "<td>".$row["date_payed"]."</td>".
      "<td>".$row["amount"]."</td>".
     
      "<td>".$row["payment_ref"]."</td>".
    
      "&nbsp";
 
}

echo "</tr>" ."</table>"."</center>";

echo "<center><input type='button' value='Download Reciept' class='dl' type='submit'></center><br>";
echo "<input type='button' value=$username hidden class='dl' id='rec' type='submit'>";
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