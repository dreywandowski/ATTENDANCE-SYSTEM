<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//header("Content-type: application/x-www-form-urlencoded");


include_once '../connect.php';

// generate JWT tokens
require_once "../jwt_variables.php";


use \Firebase\JWT\JWT;

Class Update extends Connect {


public function updatePic(){
  
 // get posted data
  $data = json_decode(file_get_contents("php://input"));

  // jwt variables

$issuer = "http://localhost/attendance/api/v1/users/login.php";
$issued_at = time();
$expiration_time = $issued_at + (60 * 5);  // 10 minutes
$key =  "Aduramimo_SECRET_API_KEY";

// picture properties
  $file_name = $data->name;
  $file_type = $data->type;
  $file_size = $data->size;
 


  // get jwt

  $jwt = isset($data->jwt)? $data->jwt: " ";
//echo "This is the jwt from the parent class: ". $jwt;

  // if jwt is not empty
  if($jwt){

    try{

      // decode jwt
      $decoded = JWT::decode($jwt, $key, array('HS256'));

      // SET RESPONSE CODE
      http_response_code(200);

      echo json_encode(array(
        "message" => "Access granted",
          "data" => $decoded->data
      )) ;

$details = json_decode(json_encode($decoded->data), true);
$username = $details['username'];


      if($file_name && $file_type && $file_size){

 $allowedFormats = array('image/jpeg', 'image/png', 'image/gif');


 if(!in_array($file_type, $allowedFormats)){ 

  // set response code
  http_response_code(401);
  

      echo json_encode(array(
        "message" => "Please use a valid image file, like a pdf or an mp4 file"
       
      )) ;
  }

else if($file_size > 500000){
  // set response code
  http_response_code(401);
  
echo json_encode(array(
        "message" => "File size exceeds maximum. Please upload 500kb or less",
       
      )) ;

}

  else{
  
  move_uploaded_file($file_name, $file_name);

      $img = $file_name;
    $query = "UPDATE users
    SET file_path = '$img'
    WHERE username = '$username'";

$success = mysqli_query($this->conn, $query);


        
      if ($success){
        // generate a new jwt immediately after updating user details
        $token = array(
      "iat" => "http://localhost/attendance/api/users/v1/updatePic.php",
      "exp" => $expiration_time,
      "iss" =>$issuer,
      "data" => array(
        "username" =>$username,
          "file_path" =>$file_name
      )
    );



// generate JWT
$jwt = JWT::encode($token, $key);


        // set response code
  http_response_code(200);

  // respond in json format
          echo json_encode(array(
        "message" => "Picture updated successfully",
        "jwt" => $jwt
       
      )) ;
        }
      else {

        // set response code
  http_response_code(401);
  
        echo json_encode(array(
        "message" => "Upload failed"
       
      )) ;
      }
  

}
}

else{
       // set response code
  http_response_code(401);
  
        echo json_encode(array(
        "message" => "Upload failed"
       
      )) ;
}
    }



    catch(Exception $e){


// set response code
  http_response_code(401);
  

      echo json_encode(array(
        "message" => "Access Denied",
        "error" => $e->getMessage()
      )) ;
    }
  } 



// if JWT is empty
  else{

    // set response code
    http_response_code(401);

echo json_encode(array(
        "message" => "Access denied, empty JWT"
      )) ;
  }

  }
/**
  if (isset($_FILES['userFile'])){
 



  
 **/
}



 





// instatitiate database object and users object
$changePic = new Update();
//$changePic->validateKey(); 
$changePic->updatePic();

?>