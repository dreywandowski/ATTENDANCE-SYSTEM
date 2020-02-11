<!doctype html>
<head>
	<title> Image/File Upload Page</title>
	<link rel="stylesheet" type="text/css" href="uploaded_img.css">
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="userFile">
		<input type="submit" value="Upload File">
	</form>
	</body>

<?php
require_once "connect.php";
if (isset($_FILES['userFile'])){

	if (file_exists($_FILES['userFile']['name'])){
  	echo $_FILES['userFile']['name']. 'already exists!!';
  }

  else{
	move_uploaded_file($_FILES['userFile']['tmp_name'],  $_FILES['userFile']['name']);
}

	if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_OK'){
		$img = $_FILES['userFile']['name'];
	echo "<span style='color:green'> File Uploaded successfully!!</span>";
	echo "<img class='new_img' src=$img>"; 
	}
	
	else if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_NO_FILE'){
		echo "<span style='color:red'>Error uploading file!!</span>";
	}


}

?>    