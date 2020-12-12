<?php
session_start();

if (!isset($_SESSION['username']) 
&& !isset($_SESSION['password'])){
header("Location:error.php");
}

if ($_SESSION['role'] != 'student'){
	header("Location:error.php");
}

//saves user login details for session tracking
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$role = $_SESSION['role'];
$email = $_SESSION['email'];
//$file_path = $_SESSION['file_path'];


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
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Noto+Sans+KR&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

 <link rel="stylesheet" href="../../public/css/dashboard.css">
</head>

<?php
require_once "../../config/Connect.php";

Class Picture extends Connect{

public $file_path;


public function showPic(){


    $username = $_SESSION['username'];

//if (!isset($img_user)){
$pic = "SELECT file_path FROM users where username = '$username'";
$pic_query = mysqli_query($this->conn, $pic);
$count = $pic_query->num_rows;

if ($count > 0){
	foreach($pic_query as $row) {
  $file_path = $row['file_path'];
  $this->file_path = "../../".$file_path;
 
}
}
else {
echo "No pinsure";
$file_path = "../../app/dashboard/images/male-profile-picture.jpg";
$this->file_path = $filepath;
}

    }



   
}
 $picture = new Picture();
$picture->showPic();


?>

<body>
	
<title>Student Dashboard</title>
</head>
<body>

  <div class="mainContainer">
        <div class="headerContent" id="headerContent">
            <header>
                <div class="h2"><h1 class="top">Student Dashboard</h1></div>
            </header>
        </div>

        <div class="headerContent-II" id="header-content">
            <div class="profile-picture-II">
                <a class="menu-icon"><i class="fas fa-bars" id="myBtn"></i></a>
            </div>
            <div class="dashboard">
            <a href="index.html"><h2 class="">Student Dashboard</h2></a>
            </div>
        </div>

        <!-- Menu -->
        <div id="myMenu" class="menu">
        <div class="menu-content">

            <div class="left-nav" id="myLinks">
                <div class="user-summary">
                    <div class="profile-picture">

                    <img src="<?php echo $picture->file_path ?>" alt="profile pic">
                </div>
                <div class="userName">
                    <p class="mainUserName"><?php echo "$first_name" ." ". "$last_name"?></p> <br>
                    <p class="userFooter"><h3>Student Username: <?php echo "$username"?></h3></p>
                </div>
            </div>
<form id="picForm" style="display: none;" action="" method="POST" enctype="multipart/form-data">
		<input type="file" id="actual_img" name="userFile"><br>
		<!--<input type="text" id="text" name="text">-->
		<input type="submit" id="picture" value="Upload File">
	</form>

<br>
<button id="picChange" class="green"> Update picture</button>

            <hr class="no-display">
                <div class="quickLinks">
                    <a href="fees/pay_fees.php">Pay Fees</a>
                <a href="fees/view_bills.php">Payment History</a>
                    <hr>
                    <a href="courses/course_dl.php">My Courses</a>
               
                    <hr>
                    <a href="Exam/jamb.php">Exam Portal</a>
               
                <a href="Exam/exams.php">Exam Results</a>
                    <hr>
                    <a href="logout.php" id="logout" >Logout</a>
                                                  
 </div>
            </div>
        </div>
        </div>

                                    <div class="midContent">
            <div>
                <h4>This is the mid content</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu neque vitae magna malesuada porttitor. Mauris maximus dui et rutrum tristique. Nulla facilisi. Ut lacinia nec elit nec viverra. Sed ut ex fermentum, placerat enim non, venenatis turpis. Nullam lectus odio, euismod a auctor id, malesuada euismod arcu. Duis scelerisque interdum velit rutrum mollis. Nullam risus tortor, maximus maximus odio eu, mattis accumsan risus. Donec rutrum, ex ac porta semper, dui eros pretium leo, nec tempus sem odio id urna. Praesent sollicitudin ligula in ante pretium, eu ornare lacus finibus. Etiam purus erat, ultricies id quam id, lacinia tincidunt nisi.
                </p>
             </div>
        </div>

        

	



<div id="result"></div>
	


<!--
<div  id="nav">
	<div id="nav_wrapper">
	<ul>
		<li><button id="prompt">Update your profile</button></li><br>
		<li><a href="courses/course_dl.php"> Download Courses</a></li><br>
		<li><a href="pay_fees.php"> Pay School Fees</a></li><br>
		<li><a href="view_bills.php"> Payment History</a></li><br>
		<li><a href="../Exam/jamb.php" target="_blank"> Exam Portal</a></li><br>
		<li><a href="exams.php">Examination Results</a></li><br>
		<li><a href="../forgot_pwd.php"> Reset Password </a></li><br>
</ul>
	</ol>
</div>

</div>-->



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
<script type="text/javascript" src="js/teacher.js"></script>
<script type="text/javascript" src="js/app.js"></script>


</body>
<?php

$file = $_FILES['userFile'];

if (isset($file)){
  $file_name = $file['name'];
  $file_type = $file['type'];
  $file_size = $file['size'];
  $username = $_SESSION['username'];

  }

Class Change extends Connect{

public function changePic($file){

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



		$success = mysqli_query($this->conn, $query);
        
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
}





  $changePicture = new Change();
$changePicture->changePic($file);

  
/**else{
	echo "<script> alert('File format not supported!!')"."</script>";
}
**/
?>


</html>