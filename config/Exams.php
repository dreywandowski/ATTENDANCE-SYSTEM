<?php 
//namespace App;

require_once "Connect.php";

Class Exams extends Connect{

public function verifyMe($login, $password){

// checks if the user exists in the database
$query = "SELECT first_name, last_name, username, password from users where username = '$login'";
$success = mysqli_query($this->conn, $query);

if(mysqli_num_rows($success) > 0){
    foreach($success as $row) {
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $username = $row['username'];
  $pwd = $row['password'];

   }

if (password_verify($password, $pwd)){
 

echo "<h3 id='text' style='font-size:14px';>".$first_name." " . $last_name." " ."You are about to start this test, which lasts for 10 minutes. Click OK to continue"."</h3>";
  echo "<input type='button' id='dynamic' value='OK, continue'>";
}

else{
  echo "<p style='color:red'; 'text-decoration:bold'>"."Incorrect User or password!! try again"."</p>";
 }

}


}


// puts exam result to the db
public function postExams($username, $score, $date_r){


$sql = "INSERT INTO results(username, score, date_taken)
		VALUES ('$username', '$score', '$date_r')";

$result = mysqli_query($this->conn, $sql);


}


// check exam results
public function checkResult(){
$username = $_SESSION['username'];

$sql = "SELECT ID, first_name, last_name, score, date_taken, file_path
            FROM  results AS t1
            LEFT OUTER JOIN users AS t2
            ON t2.username = t1.username
            WHERE t1.username ='$username'";

$result = mysqli_query($this->conn, $sql);

echo  "<table id='table' border cellpadding=3>" . "<h4>".
       "<tr><th width=50>ID</th><th width=100>Full Name</th><th width=100>Score</th><th width=150>Date Taken</th><th width=150>Click Button to Download</th></tr>".
      "&nbsp";

 while($row = mysqli_fetch_assoc($result)) {
 	 $fullName = $row["first_name"] . "&nbsp" .$row["last_name"];
    $score = $row["score"];
    $date = $row["date_taken"];
    $pic = $row["file_path"];
    $id = $row["ID"];

$_SESSION['name'] = $fullName;
$_SESSION['score'] = $score;
$_SESSION['date'] = $date;
$_SESSION['pic'] = $pic;
$_SESSION['id'] = $id;

 	echo "<tr><td>".$row["ID"]. "</td>".
      "<td>".$row["first_name"]." ".$row["last_name"]."</td>".
      "<td>".$row["score"]. "</td>".
      "<td>".$row["date_taken"]."</td>".
      "<td>"."<input type='button' value='$date' class='dl' type='submit'>";

      
}
echo "</tr>" ."</table>";

}


}

// verifies student
if($_SERVER['REQUEST_METHOD']=== 'POST'){
	$login = $_POST["username"];
$password = $_POST["password"];

$verify = new Exams();
$verify->verifyMe($login, $password);

}


