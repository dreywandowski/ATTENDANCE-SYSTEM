<?php

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

require_once "../../config/Picture.php";
?>



<!doctype html>
<head>
	<title> <?php if($role == "student") {
		echo "Student Dashboard";
	} 
	else {
		echo "Teacher Dashboard";
		} ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Noto+Sans+KR&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

 <link rel="stylesheet" href="../../public/css/dashboard.css">
</head>

<body>

  <div class="mainContainer">
        <div class="headerContent" id="headerContent">
            <header>
                <div class="h2"><h1 class="top"><?php if($role == "student") {
		echo "Student Dashboard";
	} 
	else {
		echo "Teacher Dashboard";
		} ?> </h1></div>
            </header>
        </div>

        <div class="headerContent-II" id="header-content">
            <div class="profile-picture-II">
                <a class="menu-icon"><i class="fas fa-bars" id="myBtn"></i></a>
            </div>
            <div class="dashboard">
            <a href="index.html"><h2 class=""><?php if($role == "student") {
		echo "Student Dashboard";
	} 
	else {
		echo "Teacher Dashboard";
		} ?> </h2></a>
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
                    <p class="userFooter"><h3><?php if($role == "student") {
		echo "Student Username: ".$username;
	} 
	else {
		echo "Teacher Username: ".$username;
		} ?> </h3></p>
                </div>
            </div>
<form id="picForm" style="display: none;" action="" method="POST" enctype="multipart/form-data">
		<input type="file" id="actual_img" name="userFile"><br>
		<!--<input type="text" id="text" name="text">-->
		<input type="submit" id="picture" value="Upload File">
	</form>

<br>
<button id="picChange" class="green"> Update picture</button>


<?php if($role == "student") {
		echo "<hr class='no-display'>
                <div class='quickLinks'>
                    <a href='fees/pay_fees.php'>Pay Fees</a>
                <a href='fees/view_bills.php'>Payment History</a>
                    <hr>
                    <a href='courses/course_dl.php'>My Courses</a>
               
                    <hr>
                    <a href='Exam/jamb.php'>Exam Portal</a>
               
                <a href='Exam/exams.php'>Exam Results</a>
                    <hr>
                    <a href='logout.php' id='logout' >Logout</a>
                                                  
 </div>
            </div>
        </div>
        </div>";
	} 
	else {
		echo "<hr class='no-display'>
                <div class='quickLinks'>
                    <a href='courses/courses.php'>Upload Courses</a>
                <a href='papers.php'>Upload Exam Questions</a>
                    <hr>
                    
                    <a href='logout.php' id='logout' >Logout</a>
                                                  
 </div>
            </div>
        </div>
        </div>";
		} ?>
            

                                    <div class="midContent">
            <div>
                <h4>This is the mid content</h4>
                <p>
                    <?php if($role == "student") {
		echo "This is the student dashboard, consectetur adipiscing elit. Donec eu neque vitae magna malesuada porttitor. Mauris maximus dui et rutrum tristique. Nulla facilisi. Ut lacinia nec elit nec viverra. Sed ut ex fermentum, placerat enim non, venenatis turpis. Nullam lectus odio, euismod a auctor id, malesuada euismod arcu. Duis scelerisque interdum velit rutrum mollis. Nullam risus tortor, maximus maximus odio eu, mattis accumsan risus. Donec rutrum, ex ac porta semper, dui eros pretium leo, nec tempus sem odio id urna. Praesent sollicitudin ligula in ante pretium, eu ornare lacus finibus. Etiam purus erat, ultricies id quam id, lacinia tincidunt nisi.";
	}

	else {
		echo "This is the teacher dashboard, consectetur adipiscing elit. Donec eu neque vitae magna malesuada porttitor. Mauris maximus dui et rutrum tristique. Nulla facilisi. Ut lacinia nec elit nec viverra. Sed ut ex fermentum, placerat enim non, venenatis turpis. Nullam lectus odio, euismod a auctor id, malesuada euismod arcu. Duis scelerisque interdum velit rutrum mollis. Nullam risus tortor, maximus maximus odio eu, mattis accumsan risus. Donec rutrum, ex ac porta semper, dui eros pretium leo, nec tempus sem odio id urna. Praesent sollicitudin ligula in ante pretium, eu ornare lacus finibus. Etiam purus erat, ultricies id quam id, lacinia tincidunt nisi.";
	}  ?>
                </p>
             </div>
        </div>

<div id="result"></div>




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
</html>