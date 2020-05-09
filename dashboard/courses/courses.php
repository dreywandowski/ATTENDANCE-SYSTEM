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
<form id="picForm" action=" " method="POST" enctype="multipart/form-data">
		<input type="file" id="file" name="userFile">
		File Name:
		<input type="text" name="desc">
		<!--<input type="text" id="text" name="text">-->
		<input type="submit" id="picture" value="Upload File">
</form> 
<br><br>

<?php
require_once "connect.php";
//echo "it works";
$username = $_SESSION['username'];

echo "<p><u> Your uploaded courses. Only PDF and mp4 videos are allowed.</u></p>";

$courses = "SELECT * from courses where user = '$username'";

$result = mysqli_query($link, $courses);

 echo  "<table id='table' border cellpadding=3>" . "<h4>".
       "<tr><th width=50>ID</th><th width=100>Course Title</th><th width=100> File Path</th><th width=150>Action</th></tr>".
      "&nbsp";

while($row = mysqli_fetch_assoc($result)) {
	       $file = $row["ID"];
	  
	  echo    "<tr><td>". "ID: ".$row["ID"]."&nbsp"."</td>".
        "<td>". "Title: "."&nbsp" . $row["Title"]. "&nbsp"  ."</td>".
        "<td>"."File Path:". $row["file"] ."</td>".
        "<td>"."<button id='delete' value='$file' class='delete'>". "Delete"."</button>"."</td>";
       
    }
echo "</tr>" ."</table>";

if (isset($_FILES['userFile'])){
	
$file = $_FILES['userFile']['name'];
$name = $_POST['desc'];
$file_type = $_FILES['userFile']['type'];

//$file_name = $_FILES['userFile']['desc'];
//echo $file." " . $file_type;

$allowedFormats = array( "application/pdf", "video/mp4");

if(!in_array($file_type, $allowedFormats)){

//if (($file_type != "application/pdf")){
	echo "Pls upload in PDF or mp4 format!!";
}


else{
if (file_exists("courses/".$file)){
  	$duplicate = $file;
  	echo "<script>"."alert('This file already exists!!')"."</script>";
  }

  else{
  	//if(in_array($file_type, $allowedFormats)){
	move_uploaded_file($_FILES['userFile']['tmp_name'], $file);

if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_OK'){
		$query = "INSERT INTO courses(Title, file, user)
		VALUES ('$name', '$file', '$username')";
		//WHERE username = '$username'";

		$success = mysqli_query($link, $query);
        
        if ($success){
        	echo "<script> alert('File successfully uploaded')</script>";
	      // echo "<img class='new_img' src=$img>";
        }
      else {
      	echo "<script alert('Upload failed!!')>";
      }
	//echo "<script> alert('Picture changed successfully')</script>";
	//echo "<img class='new_img' src=$img>"; 
	}
	
	else if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_NO_FILE'){
		echo "<span style='color:red'>Error uploading file!!</span>";
	}

//}
}
}
}

?>

<span id="ajax"></span><br><br>

<a id="link" href="../teacher.php">Back</a>&nbsp


  <script src="jquery-3.2.1.js"></script>	
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
            	console.log(file);
            });
 
});
});
</script>
</body>
</html>
