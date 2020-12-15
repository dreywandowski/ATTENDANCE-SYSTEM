<?php
session_start();
$role = $_SESSION['role'];

if ($role !='teacher'){
	header("Location:../error.php");
}
?>
<style type="text/css">
	body{
			font-family: 'Raleway', sans-serif;
			background-image: url('WebDev-1100x619.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
		h3{
			color:white;
		}
		.delete{
	
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
form{
	color: snow;
}
p{
	color: white;
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
<!-- Conditionally display upload form, delete buttons if user is a teacher, 
	and hide upload form, show download buttons if a student
	by making use of the "role" session variable-->

<body>
<p><u> UPLOAD LECTURE NOTES HERE</u></p>
<form id="picForm" action="" method="POST" enctype="multipart/form-data">
		<input type="file" id="file" name="userFile">
		File Name:
		<input type="text" name="name">
		<!--<input type="text" id="text" name="text">-->
		<input type="submit" id="picture" value="Upload File">
</form> 

<span id="ajax"></span>
<br><br>

<?php
require_once "../../../config/Courses.php";



?>

<span id="ajax"></span><br><br>

<a id="link" href="../teacher.php">Back</a>&nbsp


  <script src="../js/jquery-3.2.1.js"></script>	
  <script type="text/javascript">
  	$(document).ready(function() {
  	$('.delete').on('click', function (evt) {
  		evt.preventDefault();
  		var file = $(this).val();

  		$.post("delete.php", {
  			file : file
            },
             function(data, status){
            	$("#ajax").html(data);
            	console.log(data);
            });
 
});
});
</script>
</body>
</html>
