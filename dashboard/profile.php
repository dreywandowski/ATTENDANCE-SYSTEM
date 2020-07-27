<?php

require_once "connect.php";
$user =  $_COOKIE['username'];
echo "$user";

$sql = "SELECT * FROM users where username = 'dreywandowski'";
$result = mysqli_query($link, $sql);

if ($result){
$row = mysqli_fetch_assoc($result);
echo "$row";

	$id = $row["username"];
	  echo  $id. "<table>" . "<h4>"."<small>".
         "Name: "."&nbsp" . $row["first_name"]. "&nbsp" . 
        "Email:". $row["email"].
        "<br>" 
        ."<button id='update' class='update'>". "Update"."</button>". "&nbsp"
        ."<button id='delete' class='delete'>". "Delete"."</button>". 
  
         "</table>";	

}
      
else {
	"Cannot retrieve data from database!!". mysqli_error();
}





   ?>