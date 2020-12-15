<?php
session_start();
$role = $_SESSION['role'];

if ($role !='student'){
	header("Location:../error.php");
}
?>
<head>
	<title>
		Online Library
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body style="background-color: skyblue">
	<style type="text/css">
		body{
			font-family: 'Raleway', sans-serif;
			background-image: url('retail-3205035_960_720.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
		h3{
			color:white;
		}
		.dl{
	
		 border-radius: 8px 8px;
         line-height: 22px;
         font-size: 16px;
         border: 2px solid black;
         width: 60%;
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
#link{
background-color: #4CAF50;
border: none;
border-radius: 15px;
color: white;
padding: 16px 32px;
text-decoration: none;
margin: 4px 2px;
cursor: default;
}
	</style>
	<p> <h3><u>Here is your online library.
	Containing courses uploaded by lecturers. Avail yourself to them</u></h3></p><br><br>


	<?php
  require_once "../../../config/Courses.php";

$display = new Courses();
$display->displayCourses();
	?>
	<br><br>
	<a id="link" href="../student.php">Back</a>&nbsp

  <script src="../js/jquery-3.2.1.js"></script>	
  <script type="text/javascript">
  	$(document).ready(function() {
  	$('.dl').on('click', function (evt) {
  	var value = $(this).val();
  	location.href = "uploads/"+value;// body...
  	});
});
 
</script>

	</body>
	</html>