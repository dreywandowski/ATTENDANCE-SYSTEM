<?php
session_start();
require_once "../../../config/Exams.php";

?>


<!doctype html>
<head>
  <title> Results</title>
  <style type="text/css">
   body{
   font-size: 22px;
    font-family: 'Zilla Slab', serif;
      background-color: coral;
    background-size: cover;
    margin: 0;
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
  </style>
	<title> Exam </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<p><center> Here is a list of your exam scores</center></p>

<?php


// check exams
$check = new Exams();
$check->checkResult();

	?>

   <a href="../student.php">Back</a>&nbsp
	
  <script src="js/jquery-3.2.1.js"></script>

  <script type="text/javascript">
  	$(document).ready(function() {
  	$('.dl').on('click', function (evt) {
      var value = $(this).val();
    
      var cookie = value;
      document.cookie = 'cookie ='+cookie;
      window.location = "pdf.php";
	});
});
//});
 
</script>
</body>
</html>
