<?php
session_start();
require_once "connect.php";
$username = $_SESSION['username'];
?>


<!doctype html>
<head>
	<title> Exam </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>


<?php
echo "iT WoRks";



$sql = "SELECT ID, first_name, last_name, score, date_taken, file_path
            FROM  results AS t1
            LEFT OUTER JOIN users AS t2
            ON t2.username = t1.username
            WHERE t1.username ='$username'";

$result = mysqli_query($link, $sql);

echo  "<table id='table' border cellpadding=3>" . "<h4>".
       "<tr><th width=50>ID</th><th width=100>Full Name</th><th width=100>Score</th><th width=150>Date Taken</th><th width=150>Action</th></tr>".
      "&nbsp";

 while($row = mysqli_fetch_assoc($result)) {
 	 $fullName = $row["first_name"] . "&nbsp" .$row["last_name"];
    echo "<input type='text' class='vals' id='name' hidden value=$fullName >";
    $score = $row["score"];
     echo "<input type='text' class='vals' id='score' hidden value=$score >";
    $date = $row["date_taken"];
     echo "<input type='date' class='vals' id='date' hidden value=$date >";
    $pic = $row["file_path"];
     echo "<input type='text' class='vals' id='pic' hidden value=$pic >";
    $id = $row["ID"];
    echo "<input type='text' class='vals' id='identity' hidden value=$id >";


$_SESSION['name'] = $fullName;
$_SESSION['score'] = $score;
$_SESSION['date'] = $date;
$_SESSION['pic'] = $pic;
$_SESSION['id'] = $id;

 	echo "<tr><td>".$row["ID"]. "</td>".
      "<td>".$row["first_name"]." ".$row["last_name"]."</td>".
      "<td>".$row["score"]. "</td>".
      "<td>".$row["date_taken"]."</td>".
      "<td>"."<input type='button' value='Download $score' class='dl' type='submit'>";
      
}
echo "</tr>" ."</table>";


	?>
	
  <script src="jquery-3.2.1.js"></script>

  <script type="text/javascript">
  	$(document).ready(function() {
  	$('.dl').on('click', function (evt) {
      var value = $(this).val();
      alert(value);
  window.location = "pdf.php";
	});
});
//});
 
</script>
</body>
</html>
