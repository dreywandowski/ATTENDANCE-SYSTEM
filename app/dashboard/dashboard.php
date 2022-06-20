<?php

//saves user login details for session tracking
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$role = $_SESSION['role'];
$email = $_SESSION['email'];
//$file_path = $_SESSION['file_path'];

 //echo "first : " .$first_name; 
// get the timestamp
date_default_timezone_set("Africa/Lagos");
$date = new DateTime('now');
$date_r = $date->format("Y-m-d h:i:s");

$currTime = $date_r;

require_once "../../config/Picture.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?php if($role == "student") {
    echo "Student Dashboard";
  } 
  else {
    echo "Teacher Dashboard";
    } ?> </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div id="home" class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
             <!-- <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>-->
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="<?php echo $picture->file_path ?>" alt="profile pic">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $first_name .' '. $last_name?></p>
                </div>
              </a>
              <!--<div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </div>-->
            </li>
            <li class="nav-item   d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li>
             <li class="nav-item nav-logout  d-lg-block">
              <a class="nav-link" href="logout.php">
                <i class="mdi mdi-power"></i>&nbspLogout
              </a>
            </li>
         
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="<?php echo $picture->file_path ?>">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo "$first_name" ." ". "$last_name"?></span>
                  <span class="text-secondary text-small"><?php echo "$role"?></span>
                </div>
                <!--<i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>-->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#home">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#home">
                <span class="menu-title">Edit Profile</span>
                <i class=" mdi mdi-account-settings menu-icon"></i>
              </a>
            </li>
           
              <!--
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/icons/mdi.html">
                <span class="menu-title">Icons</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>-->
            <?php if($role == "student") {
    echo "
            <li class='nav-item'>
              <a class='nav-link' href='pay_fees.php'>
                <span class='menu-title'>Pay Fees</span>
                <i class='mdi mdi-account-card-details menu-icon'></i>
              </a>
            </li>
               <li class='nav-item'>
              <a class='nav-link' href='pages/tables/basic-table.html'>
                <span class='menu-title'>My Courses</span>
                <i class='mdi mdi mdi mdi-library menu-icon'></i>
              </a>
            </li>
             <li class='nav-item'>
              <a class='nav-link' href='pages/tables/basic-table.html'>
                <span class='menu-title'>Exam Portal</span>
                <i class='mdi mdi mdi-laptop-chromebook menu-icon'></i>
              </a>
            </li>
              <li class='nav-item'>
              <a class='nav-link' href='pages/tables/basic-table.html'>
                <span class='menu-title'>Payment History</span>
                <i class='mdi mdi mdi-printer menu-icon'></i>
              </a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='pages/tables/basic-table.html'>
                <span class='menu-title'>Exam Results</span>
                <i class='mdi mdi mdi-folder-download menu-icon'></i>
              </a>
            </li>
                    <!--<a href='fees/pay_fees.php'>Pay Fees</a>
                <a href='fees/view_bills.php'>Payment History</a>
                    
                    <a href='courses/course_dl.php'>My Courses</a>
               
                    <a href='Exam/jamb.php'>Exam Portal</a>
               
                <a href='Exam/exams.php'>Exam Results</a>-->
                
                                                  
 ";
  } 
  else {
    echo "
                <li class='nav-item'>
              <a class='nav-link' href='pages/tables/basic-table.html'>
                    <span class='menu-title'>Upload Courses</span>
                    <i class='mdi mdi mdi-upload menu-icon'></i>
                    </a>
            </li> 
            <li class='nav-item'>
              <a class='nav-link' href='pages/tables/basic-table.html'>
              <span class='menu-title'>Upload Exam Questions</span>
              <i class='mdi mdi mdi-upload menu-icon'></i>
             </a>
            </li> 
             
 ";
    } ?>
            <!-- To be used by Admin Dashboard<li class="nav-item">
              <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">Charts</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/tables/basic-table.html">
                <span class="menu-title">Tables</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Sample Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
              </div>
            </li>
            <!--<li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Projects</h6>
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
                <div class="mt-4">
                  <div class="border-bottom">
                    <p class="text-secondary">Categories</p>
                  </div>
                  <ul class="gradient-bullet-list mt-4">
                    <li>Free</li>
                    <li>Pro</li>
                  </ul>
                </div>
              </span>
            </li>
          </ul>-->
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <!-- <div class="col-12">
               <span class="d-flex align-items-center purchase-popup">
                  <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>
                  <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
                  <i class="mdi mdi-close" id="bannerClose"></i>
                </span>
              </div>-->
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php 
                if($role == "student") {
    echo "Student Dashboard";
  } 
  else {
    echo "Teacher Dashboard";
    } ?> 
              </h3>
              <!--<nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>-->
            </div>
            <div class="row">
                 <p id="ajax">
                    <?php 

                if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $link = $_POST['link'];

  if($link == "pay_fees.php") {
    echo "hahahah";
  include "pay_fees.php";
  } 

  else if($link == "v.php")  {
    
    }
  }

    else{
          
        if($role == "student") {
    echo "This is the student dashboard, consectetur adipiscing elit. Donec eu neque vitae magna malesuada porttitor. Mauris maximus dui et rutrum tristique. Nulla facilisi. Ut lacinia nec elit nec viverra. Sed ut ex fermentum, placerat enim non, venenatis turpis. Nullam lectus odio, euismod a auctor id, malesuada euismod arcu. Duis scelerisque interdum velit rutrum mollis. Nullam risus tortor, maximus maximus odio eu, mattis accumsan risus. Donec rutrum, ex ac porta semper, dui eros pretium leo, nec tempus sem odio id urna. Praesent sollicitudin ligula in ante pretium, eu ornare lacus finibus. Etiam purus erat, ultricies id quam id, lacinia tincidunt nisi.";
  }

  else {
    echo "This is the teacher dashboard, consectetur adipiscing elit. Donec eu neque vitae magna malesuada porttitor. Mauris maximus dui et rutrum tristique. Nulla facilisi. Ut lacinia nec elit nec viverra. Sed ut ex fermentum, placerat enim non, venenatis turpis. Nullam lectus odio, euismod a auctor id, malesuada euismod arcu. Duis scelerisque interdum velit rutrum mollis. Nullam risus tortor, maximus maximus odio eu, mattis accumsan risus. Donec rutrum, ex ac porta semper, dui eros pretium leo, nec tempus sem odio id urna. Praesent sollicitudin ligula in ante pretium, eu ornare lacus finibus. Etiam purus erat, ultricies id quam id, lacinia tincidunt nisi.";
  }  
    } ?> 

                </p>

<div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row mt-3">
                      <div class="col-6 pr-1">
                        <img src="assets/images/dashboard/3802031.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                        <img src="assets/images/dashboard/img_4.jpg" class="mw-100 w-100 rounded" alt="image">
                      </div>
                      <div class="col-6 pl-1">
                        <img src="assets/images/dashboard/img_2.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                        <img src="assets/images/dashboard/dashboard.jpg" class="mw-100 w-100 rounded" alt="image">
                      </div>
                    </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <footer class="footer">
            <div class="container-fluid clearfix">
              <center><span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © dreywandowski 2020</span></center>
              
            </div>
          </footer>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <!-- Capture a href tags with ajax-->
    <script type="text/javascript" src="assets/js/jquery-3.2.1.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
   
      $('.nav a').each(function(idx, item){
        $(this).on('click', function (evt) {
          evt.preventDefault();
      var link = $(this).attr("href");
      console.log(link);
     
     // send the a href to the PHP file for serving up appropriate page
     $.post("dashboard.php", {
                    link : link

        },  function(data,status){
          $('#ajax').html(data);
          console.log(status);
                });


      });

      });
    
  });

    </script>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>