<?php
//namespace App;
require_once "Connect.php";


Class Fees extends Connect {

public function handleBills($user, $email, $amount, $phone, $ref, $currTime){

$sql = "INSERT INTO fees(user, email, amount, phone, payment_ref, date_payed)
      values ('$user', '$email', '$amount', '$phone', '$ref', '$currTime')";

if (mysqli_query($this->conn, $sql)){
  // send welcome email

 echo 'Payment successfully recorded. Check the transaction history to see your payment';
}


else{

	die("Error in payment.".mysqli_error($this->conn));
}

}


// show payment history
public function showBills($username){

	$sql = "SELECT first_name, last_name, date_payed,amount, payment_ref FROM  fees LEFT OUTER JOIN users ON username = '$username'";

  $success = mysqli_query($this->conn, $sql);


echo  "<center>"."<table id='table' border cellpadding=3>" . "<h4>".
       "<tr><th width=100>Fullname</th><th width=80>Date</th><th width=80>Amount Paid</th></th>"."<th width=80>Transaction ID</th>".

      "&nbsp";



while($row = mysqli_fetch_assoc($success)) {
$refe = $row["first_name"]." ".$row["last_name"]; //echo $refe;
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
}


}


?>