<?php
//if (isset($_FILES['file_name'])){
  $file = $_FILES['userFile']['name'];
  

  //$file_type = $_FILES['userFile']['type'];
//$file_name = $_POST['file_name'];
$target_directory = "images/uploads/";
$target_file = $target_directory.basename($_FILES['file_name']['name']);
$allowedFormats = array('image/jpg', 'image/png', 'image/gif');

if (file_exists($target_directory.$file_name)){
  	$duplicate = $file_name;
  	echo "<script>"."alert('This picture already exists!!')"."</script>";
  }

  else{
  	//if(in_array($file_type, $allowedFormats)){
	move_uploaded_file($_FILES['file_name']['tmp_name'], $target_directory.$file_name);

if ($_FILES['userFile']['error'] = 'UPLOAD_ERR_OK'){
		$img = "images/"."uploads/".$file_name;
		$query = "UPDATE users
		SET file_path = '$img'
		WHERE username = '$username'";

		$success = mysqli_query($link, $query);
        
        if ($success){
        	echo "<script> alert('Picture changed successfully, kindly refresh')</script>";
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

}
	

//}

	


/**else{
	echo "<script> alert('File format not supported!!')"."</script>";
}
**/
?>