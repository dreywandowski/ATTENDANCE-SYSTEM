
<?php
 session_start();
 ?>
 <!--
if (isset($_COOKIE['username']) and isset($_COOKIE['password'])){
	$user = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	echo "<script> document.getElementById('user')value ='$user';
	document.getElementById('passd')value ='$password'.</script>";
}

?>-->

<!doctype html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Online Attendance Tracker</title>
	<link href="https://fonts.googleapis.com/css?family=Cabin+Condensed|Chivo" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="index.css">

<script type="text/javascript" src="jquery-3.2.1.js"></script>
<script type="text/javascript" src="ajax.js"></script>
</head>


<body id="all">

	<p><center><b> Welcome to the online attendance management system for
		students and staff<br/><br>

	<u>Please sign up or login accordingly</u> </b></center></p>


	<div>
		<p> <h3> Please login here</h3>
	<button id="log"> Login</button>
	
</div>

<p id="result">  </p>


<form id="login" action="validate_login.php"  method="POST">
	<label for="User Name"><h3> User Name </h3></label>
	<input type="text" id="user" name="username"  placeholder="user_name" class="first_name"  required><br><br>

<label for="Password"><h3> Password</h3></label>
	<input type="password" id="passd" name="password"  placeholder="password" class="password"  required><br>
	<span id="ajax"></span>
	<label>Choose type:</label><br>

	
	<input type="radio" name="staff"  value="teacher" /> Teacher
	<input type="radio" name="staff"  value="student"/> Student <br><br>

	<input type="checkbox" name="remember" id="remember" checked>Remember Me<br><br>
     

	<br>

	<button type="submit"  name="sub" onclick="valuation()" id="login_user"> Login</button>
<p> Have no account yet? </p>
<button id="reg"> Create new account</button><br><br>
</form>




<!--  register form -->
<form action="redirect.php" enctype="multipart/form-data" method="POST" class="hidden" name="reg" id="register">
		<div>
		<h3><u> Sign Up Form</u></h3>
	</div>
	<label>Name</label><br>
		<input type="text" name="first_name" placeholder="first name" class="first_name"  required><br>
		<input type="text" name="last_name" placeholder="last name" required>
		<br>
		<br>
	<label> E-mail</label><br>
		<input type="email" name="email" placeholder="example@mail.com" required>
		<br>
		<br>

	<label>Create a username</label><br>
		<input type="text" name="username" id="username" minlength="5" required>
		<br>
		<br>
<span id="usercheck"></span>

	
		
	<label>Create a password</label><br>
		<input class="password" id="pwd1" type="password" name="password" minlength="8" required>
		<br>
		<br>
	<label> Confirm password</label><br>
		<input type="password" id="pwd2" name="password1" minlength="8" required><br>
		<br>

	<label>Choose type:</label><br>

	
	<input type="radio" id="teacher" name="staff_type"  value="teacher" /> Teacher
	<input type="radio" id="student" name="staff_type"  value="student"/> Student
	</div>
	<br><br><br><br>

<input type="checkbox" name="agree" required>I agree to the terms and conditions<br>
	<button id="submit" name= "all" type="submit"> Sign Up</button>

</form>


<script type="text/javascript" src="index.js"></script>

</body>


</html>
