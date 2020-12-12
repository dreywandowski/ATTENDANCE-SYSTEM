<?php
session_start();
require_once "../../config/connect.php";
$username = $_SESSION['username'];
?>


<!doctype html>
<head>
  <title> Results</title>
  <style type="text/css">
   body{
   font-size: 22px;
    font-family: 'Zilla Slab', serif;
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
	<title> Exam </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<p><center> Here is a list of your exam scores</center></p>

<?php



$sql = "SELECT ID, first_name, last_name, score, date_taken, file_path
            FROM  results AS t1
            LEFT OUTER JOIN users AS t2
            ON t2.username = t1.username
            WHERE t1.username ='$username'";

$result = mysqli_query($link, $sql);

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


	?>

   <a href="../student.php">Back</a>&nbsp
	
  <script src="js/jquery-3.2.1.js"></script>

  <script type="text/javascript">
  	$(document).ready(function() {
  	$('.dl').on('click', function (evt) {
      var value = $(this).val();
    
      var cookie = value;
      document.cookie = 'cookie ='+cookie;
      window.location = "pdf.php";
	});
});
//});
 
</script>
</body>
</html>
