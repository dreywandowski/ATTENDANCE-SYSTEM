<?php
//namespace Config;

require_once "Connect.php";

Class Picture extends Connect{

public $file_path;

// function to display user picture
public function showPic(){


    $username = $_SESSION['username'];

//if (!isset($img_user)){
$pic = "SELECT file_path FROM users where username = '$username'";
$pic_query = mysqli_query($this->conn, $pic);
$count = $pic_query->num_rows;

if ($count > 0){
	foreach($pic_query as $row) {
  $file_path = $row['file_path'];
  $this->file_path = "../../app/dashboard/".$file_path;
 
}
}
else {
echo "No pinsure";
$file_path = "../../app/dashboard/images/male-profile-picture.jpg";
$this->file_path = $filepath;
}

    }

// function to change user picture
public function changePic($file_name, $file_type, $file_size, $username){


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

// display user picture
 $picture = new Picture();
$picture->showPic();


// change user picture
if (isset($_FILES['userFile'])){
  $file_name = $_FILES['userFile']['name'];
  $file_type = $_FILES['userFile']['type'];
  $file_size = $_FILES['userFile']['size'];
  $username = $_SESSION['username'];

$changePicture = new Picture();
$changePicture->changePic($file_name, $file_type, $file_size, $username);
}

?>