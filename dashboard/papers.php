
<?php
session_start();
if (!isset($_SESSION['first_name']) && !isset($_SESSION['last_name']) && !isset($_SESSION['username']) 
&& !isset($_SESSION['password'])){
header("Location:error.php");
}

if ($_SESSION['role'] != 'teacher'){
	header("Location:error.php");
}
?>

<!doctype html>
<head>
	<title> Exam Upload Center </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../index.css">
	<link rel="stylesheet" type="text/css" href="css/uploaded_img.css">
	<style type="text/css">
	body{
		background-color: Dark grey;
		background-size: cover;
		
	}
	input {
	width: 30%;
	height: 30px;
    background-color: azure;
    color: black;
    background-position: 20px 5px;
    padding-left: 10px;
    box-sizing: border-box;
}
#file, #exam{
	width: 20%;
	height: 30px;
    background-color: maroon;
    color: black;
    background-position: 20px 5px;
    padding-left: 10px;
    box-sizing: border-box;
}
	</style>

</head>

<body>
	<?php
require_once "connect.php";
//require_once "../validate_login.php";

$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];

$fullName = $first_name . " ".$last_name;
	?>

	<p> <center>Hey <?php echo "$first_name" ." ". "$last_name"?>, welcome!!<br><br>
		You can upload questions for student exams here. </center></p>
		<br><br>

		<form id="examForm" action=" " method="POST" enctype="multipart/form-data">
	<label> Current Term </label><br>
		<label for="term">Term:</label>

		<select name="term" id="term"  required>
  <option>1st</option>
  <option>2nd</option>
  <option>3rd</option>

</select><br><br>

	<label for="Subject">Subject:</label>
		<select name="subject" id="subject" required>
  <option>English</option>
  <option>Mathematics</option>
  <option>Geography</option>
   <option>Biology</option>
    <option>Physics</option>
     <option>Chemistry</option>
      <option>Further Maths</option>
       <option>Accounting</option>
        <option>Commerce</option>
         <option>Government</option>

</select><br><br>

		<label for="Class">Class:</label>

		<select name="class" id="class"  required>
  <option>SS 1</option>
  <option>SS 2</option>
  <option>SS 3</option>

</select><br><br>

File Name:
<input type="file" id="file" name="userFile"><br><br>
		Description:<input type="text" name="desc">
		<br><br>
		<input type="submit" id="exam" value="Upload File">
    
</form>

<?php
if (isset($_FILES['userFile'])){
	
$file = $_FILES['userFile']['name'];
$name = $_POST['desc'];
$file_type = $_FILES['userFile']['type'];
$term = $_POST['term'];
$subject = $_POST['subject'];
$class = $_POST['class'];


//$file_name = $_FILES['userFile']['desc'];
//echo $file." " . $file_type;

//$allowedFormats = array( "application/pdf", "video/mp4");

//if(!in_array($file_type, $allowedFormats)){

//if (($file_type != "application/pdf")){
	//echo "Pls upload in PDF or mp4 format!!";
//}


//else{
if (file_exists("exams/".$file)){
  	$duplicate = $file;
  	echo "<script>"."alert('This file already exists!!')"."</script>";
  }

  else{
  	//if(in_array($file_type, $allowedFormats)){
	move_uploaded_file($_FILES['userFile']['tmp_name'], "exams/".$file);

if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_OK'){
		$query = "INSERT INTO exams(file_path, term, class, subject, description, teacher)
		VALUES ('$file', '$term', '$class', '$subject', '$name', '$fullName')";
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


?>

<span id="ajax"></span><br><br>

<a id="link" href="../dashboard/teacher.php">Back</a>&nbsp


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

