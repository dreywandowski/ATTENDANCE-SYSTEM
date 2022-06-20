
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
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">

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
//require_once "../../config/Courses.php";
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


<span id="ajax"></span><br><br>

<a id="link" href="../dashboard/teacher.php">Back</a>&nbsp


  
</script>

<?php
// upload new exam questions

 /** if (isset($_FILES['userFile'])){
  
$file = $_FILES['userFile']['name'];
$name = $_POST['desc'];
$file_type = $_FILES['userFile']['type'];
$term = $_POST['term'];
$subject = $_POST['subject'];
$class = $_POST['class'];


$exam = new Courses();
$exam->uploadExams($file, $name, $term, $file_type, $subject, $class);
}**/
?>
</body>
</html>

