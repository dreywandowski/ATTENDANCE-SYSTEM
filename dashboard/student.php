<?php
session_start();

if (!isset($_SESSION['username']) 
&& !isset($_SESSION['password'])){
header("Location:error.php");
}

if ($_SESSION['role'] != 'student'){
	header("Location:error.php");
}

// get the timestamp
date_default_timezone_set("Africa/Lagos");
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");

$currTime = $date_r;


?>
<!doctype html>
<head>
	<title> Student Dashboard </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../index.css">
	<link rel="stylesheet" type="text/css" href="css/uploaded_img.css">
</head>
<style type="text/css">
	body{
		background-image: url(../images/3749384.jpg);
		background-size: cover;
		
	}

	.close{
  background-color: #ca3535;
  border-color: #c43c35;
  margin-left: 19%;
  padding: 6px 20px;
}
</style>
<?php
require_once "connect.php";


//saves user login details for session tracking
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$role = $_SESSION['role'];

?>

<body>
	

		<center><p> Hey <?php echo "$first_name" ." ". "$last_name"?>, welcome!!<br><br>
		 This is your dashboard. Pls avail yourself as
		you please. 
	</p><br></center>
		<button id="logout" class="red button"> Log Out </button>
		<br>
		<br>


	

<?php 
//if (!isset($img_user)){
$pic = "SELECT file_path FROM users where username = '$username'";
$pic_query = mysqli_query($link, $pic);

if (mysqli_num_rows($pic_query) > 0){
	foreach($pic_query as $row) {
  $picture = $row['file_path'];
  //echo "<script document.getElementById('pic').innerText = $picture>";
  echo "<img src='$picture' alt='no pic' class='new_img' style='
    height: 200px;
	width: 20%;
	border-radius:8px;
	border-style: groove;
	border-width: medium;
	border-color: gray;
	clear: both;
	float: left;'>";
}
}
else {
	echo "No Profile Pic";
}


?>

<div id="result"></div>
	

<button id="picChange" class="green button"> Update picture</button>



<div  id="nav">
	<div id="nav_wrapper">
	<ul>
		<li><button id="prompt">Update your profile</button></li><br>
		<li><a href="courses/course_dl.php"> Download Courses</a></li><br>
		<li><a href="courses/course_dl.php"> Pay School Fees</a></li><br>
		<li><a href="../Exam/jamb.php" target="_blank"> Exam Portal</a></li><br>
		<li><a href="exams.php">Examination Results</a></li><br>
		<li><a href="../forgot_pwd.php"> Reset Password </a></li><br>
</ul>
	</ol>
</div>

</div>

<form id="picForm" style="display: none;" action="" method="POST" enctype="multipart/form-data">
		<input type="file" id="actual_img" name="userFile">
		<!--<input type="text" id="text" name="text">-->
		<input type="submit" id="picture" value="Upload File">
	</form>


<form id="update" style="display: none" action="update_details.php" method="POST">
	<!--<?php $first = "SELECT first_name from users where first_name = '$first_name'"?>-->

	First Name:<input type="text" name="first_name" id="fname" value="<?php echo $first_name ?>"><br/>
	 Last Name:<input type="text" name="last_name" id="lname" value="<?php echo $last_name ?>"><br>
	Username:<input type="text" name="username" id="usr" value="<?php echo $username ?>"> <br>
	 <button type="submit" id="submit">Update Details</button> 
</form>

<button id="close" class="close" style="display: none"> close this window</button>
<p id="ajax"></p>


<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="js/student.js"></script>


</body>
<?php
if (isset($_FILES['userFile'])){
  $file_name = $_FILES['userFile']['name'];
  $file_type = $_FILES['userFile']['type'];
  $file_size = $_FILES['userFile']['size'];
  $username = $_SESSION['username'];


 // echo $file_name." " . $file_type;

  $allowedFormats = array('image/jpeg', 'image/png', 'image/gif');


 if(!in_array($file_type, $allowedFormats)){ // || ( ||  'image/png')$file_type !='image/gif')){
  //echo "<script console.log('Pls use a valid image file!!')>";
  	echo "Pls use a valid image file!!";
  }

else if($file_size > 500000){
echo "<script>"."alert('File size exceeds maximum. Acceptable size is 500kb or less')"."</script>";
  // Max File Size: 500KB
}

else{

	if (file_exists("images/"."uploads/".$_FILES['userFile']['name'])){
  	$duplicate = $_FILES['userFile']['name'];
  	//echo "<script>"."alert('This picture already exists!!')"."</script>";
  }

  else{
  	//if(in_array($file_type, $allowedFormats)){
	move_uploaded_file($_FILES['userFile']['tmp_name'], "images/"."uploads/".$_FILES['userFile']['name']);

if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_OK'){
	    $img = "images/"."uploads/".$_FILES['userFile']['name'];
		$query = "UPDATE users
		SET file_path = '$img'
		WHERE username = '$username'";



		$success = mysqli_query($link, $query);
        
      if ($success){
        	echo "<script> alert('Picture changed successfully, kindly refresh')</script>";
	      //echo "<img class='new_img' src=$img>";
        }
      else {
      	echo "<script alert('Upload failed!!')>";
      }
	//echo "<script> alert('Picture changed successfully')</script>";
	//echo "<img class='new_img' src=$img>"; **/
	}
	
	else if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_NO_FILE'){
		echo "<span style='color:red'>Error uploading file!!</span>";
	}

}
	

}
}
	


/**else{
	echo "<script> alert('File format not supported!!')"."</script>";
}
**/
?>


</html>