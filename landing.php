<?php
//require_once 'vendor/autoload.php';
 ?>



<!doctype html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> REGISTER </title>
		  <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public/css/login.css">



<script type="text/javascript" src="public/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="public/js/ajax.js"></script>
</head>


<body id="all">

	<div class="container">
        <div class="container-ii">
        <header>
            <div class="logo">
                <a href="index.php"><h2>Home</h2></a>
              <!--  <a href="/school/"><img src="/img/drey42.jpg" alt=""></a>-->
              <div class="home"><a href="index.php"><i class="fas fa-home" title="Home"></i></a></div>
            </div>

            <div class="today"><p>DD/MMM/YYYY<p></div>

            <div class="header-text">
                <h1>Online Portal</h1>
            </div>
            <div class="other-object">
                <p>Other stuff goes in here...</p>
            </div>
        </header>

        <div class="mainForm">
            <div class="form">
                
                <form name="sign-in" id="login" class="sign-in" action="" method="POST">
                 
<h4>Enter your username and password</h4><br>
                    <div class="input-form">
                        <i class="fa fa-user icon"></i><input type="text" id="user" placeholder="Enter Username"  name="username" required autocomplete="username" autofocus class="e-mail" value = "<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} else  {echo '';}  ?> ">
                      
                    </div>

                    <div class="input-form">
                        <i class="fa fa-key icon"></i><input type="password" id="passd" class="login-pwd" placeholder="Enter Password"  name="password" required autocomplete="current-password" value = "<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} else  {echo '';}  ?>" >   

               
                    </div>
                   <span id="ajax"></span>
                  
                   <input type="checkbox" name="rem" checked id="check" value="check"> Remember Me<br><br>

                    <button class="login"  type="submit"  name="sub">
                    Login
                </button><br><br>
 <h3><p class="form-footer">Don't have an account?</p></h3> <button class="login"  id="reg"> Register Here</button>
                </form>
                <br><br>
               <a href="app/pwd_reset/forgot_pwd.php"> Forgot Password?</a>
            </div>
        
        </div>
            



<p id="result">  </p>

</form>

 </div>

 <div class="mainForm">
            <div class="form">
                
                <form class="register" hidden action="config/Register.php" enctype="multipart/form-data" method="POST" class="" name="reg" id="register">
                 
<h3>Sign up here</h3>
                    <div class="input-form">
                        <input type="text" class="frstName form-control" name="first_name"  required autocomplete="name" autofocus placeholder="First Name" required>

                    </div>

 <div class="input-form">
                        <input type="text" class="frstName form-control" name="last_name"  required autocomplete="name" autofocus placeholder="Last Name" required>

                    </div>

                    <div class="input-form">
                        <input type="email" class="e-mail form-control @error('email') is-invalid @enderror" name="email"  autocomplete="email" placeholder="Enter Email Address" required>

                    </div>

                    <div class="input-form">
                        <select name="staff_type" id="acctType" required>
                            <option value="">Choose account type</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                            
                        </select>
                    </div>


                    <div class="input-form">
                        <input type="text" class="user" name="username" placeholder="Preferred Username" required>
                                    
                    </div>
                    <span id="usercheck"></span>


                    <div class="input-form">
                        <input type="password" class="login-pwd form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="pwd1" placeholder="Enter Password" required>    
                                                  
                    </div>


                    <div class="input-form">
                        <input type="password" class="login-pwd" name="password1" id="pwd2" required autocomplete="new-password" placeholder="Confirm Password" required>
                    </div>
                    <div class="input-form" id="consent">
                        <label class="consent"><input type="checkbox" class="remember" name="agree" required>I accept the terms and conditions of use</label>
                    </div>

                    <input type="text" value="images/uploads/male-profile-picture.jpg" name="file_path" hidden>
                    <p></p>


                    <button class="login" id="submit" name= "all" type="submit"> Sign Up</button>

<br><br>
                        <p class="form-footer">Have an account already?</p><button class="login" id="log"> Login</button>
                </form>
            
            </div>
        
        </div>



<script type="text/javascript" src="public/js/index.js"></script>

</body>


</html>
