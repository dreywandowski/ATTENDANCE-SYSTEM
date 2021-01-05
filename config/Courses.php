<?php 
//namespace App;


require_once "Connect.php";

//use App\Connect;

Class Courses extends Connect{

protected $file_path;


// show courses
public function showCourses(){
	$username = $_SESSION['username'];

echo "<p><u> Your uploaded courses. Only PDF and mp4 videos are allowed.</u></p>";

$courses = "SELECT * from courses where user = '$username'";

$result = mysqli_query($this->conn, $courses);

$count = $result->num_rows;

 echo  "<table id='table' border cellpadding=3>" . "<h4>".
       "<tr><th width=50>ID</th><th width=100>Course Title</th><th width=150>Action</th></tr>".
      "&nbsp";

while($row = $result->fetch_assoc()) {
	       $file = $row["ID"];
	       $file_loc = "uploads".$file;

	       $this->file_path = "uploads".$file;
	  
	  echo    "<tr><td>". "ID: ".$row["ID"]."&nbsp"."</td>".
        "<td>". "Title: "."&nbsp" . $row["Title"]. "&nbsp"  ."</td>".
        
        "<td>"."<button id='delete' value='$file' class='delete'>". "Delete"."</button>"."</td>";
       
    }
echo "</tr>" ."</table>";



}


// upload courses
public function uploadCourses($file_name, $file_type, $file_size, $username, $name){
$allowedFormats = array( "application/pdf", "video/mp4");

if(!in_array($file_type, $allowedFormats)){


	echo "Pls upload in PDF or mp4 format!!";
}


else{
if (file_exists("uploads/".$file_name)){
  	$duplicate = $file_name;
  
  }

  else{

	move_uploaded_file($_FILES['userFile']['tmp_name'], "uploads/".$file_name);

if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_OK'){
		$query = "INSERT INTO courses(Title, file, user)
		VALUES ('$name', '$file_name', '$username')";
		

		$success = mysqli_query($this->conn, $query);
        
        if ($success){
        	echo "<script> alert('File successfully uploaded')</script>";
	     
        }
      else {
      	echo "<script alert('Upload failed!!')>";
      }
	
	}
	
	else if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_NO_FILE'){
		echo "<span style='color:#ff0000'>Error uploading file!!</span>";
	}

}

}


}




// delete courses
public function deleteCourse($file)
{
echo $file;
$sql = "DELETE FROM courses
WHERE ID = '$file'";

if (mysqli_query($this->conn, $sql)){
	echo "Deleted Successfully!!";
	
}

else {
	die("Deletion Error!! ".mysqli_error($this->conn));
}

}


// upload exam questions
public function uploadExams($file, $name, $term, $subject, $class){

//else{
if (file_exists("Exam/exams/".$file)){
  	$duplicate = $file;
  	
  }

  else{
  	//if(in_array($file_type, $allowedFormats)){
	move_uploaded_file($_FILES['userFile']['tmp_name'], "exams/".$file);

if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_OK'){
		$query = "INSERT INTO exams(file_path, term, class, subject, description, teacher)
		VALUES ('$file', '$term', '$class', '$subject', '$name', '$fullName')";
		//WHERE username = '$username'";

		$success = mysqli_query($this->conn, $query);
        
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

// student views courses uploaded by teachers
public function displayCourses(){
	$query = "SELECT * 
            FROM  courses
            LEFT OUTER JOIN users ON user = username";

  //$query = "SELECT * from courses";
  $success = mysqli_query($this->conn, $query);

  echo  "<table id='table' border cellpadding=3>" . "<h4>".
       "<tr><th width=50>ID</th><th width=80>Course Title</th><th width=100>Teacher</th><th width=150>Action</th></tr>".
      "&nbsp";

 while($row = mysqli_fetch_assoc($success)) {
 	$file = $row["file"];
 	echo "<tr><td>".$row["ID"]. "</td>".
      "<td>".$row["Title"]. "</td>".
      "<td>".$row["first_name"]." ".$row["last_name"]."</td>".
     
      "<td>"."<button class='dl' type='submit' value='$file'>". "Download"."</button>". "&nbsp";
 
}
echo "</tr>" ."</table>";
}


}




// display courses uploaded by the user
 $course = new Courses();
$course->showCourses();


// upload new courses
if (isset($_FILES['userFile'])){
  $file_name = $_FILES['userFile']['name'];
  $file_type = $_FILES['userFile']['type'];
  $file_size = $_FILES['userFile']['size'];
  $username = $_SESSION['username'];
  $name = $_POST['name'];

$newCourses = new Courses();
$newCourses->uploadCourses($file_name, $file_type, $file_size, $username, $name);
}




?>