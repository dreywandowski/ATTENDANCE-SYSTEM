<?php
//connect to mysql server and select the login_details database


class Database{
private $server = "localhost";
private $user = "root";
private $password = "";
private $db = "attendance";	
public $conn;
public $table = 'users';
public $users = array();



// connect by OOP
function __construct(){
	$this->conn =mysqli_connect($this->server, $this->user, $this->password, $this->db);

public function connect(){
	// close connection
	$this->conn = null;

	if($this->conn){
		//echo "connect successful";
	}
	else{
		echo "connection failed";
	}
}


// get all users
public function getUsers(){
	$read = "SELECT first_name, last_name, username, email, role FROM $this->table";
	$result = $this->conn->query($read);

	if($result->num_rows > 0){
		$this->users['records'] = array();

		//output data of each row

		while($row = $result->fetch_assoc()){
              extract($row);

			$user_item = array(
				'username' =>$row['username'],
				'first_name' =>$row['first_name'],
				'last_name' =>$row['last_name'],
				'email' =>$row['email'],
				'role' =>$row['role'],
			);

// check for errors 
	try{
		$this->conn = new PDO("mysql:server=" . $this->server . ";db=" .$this->db, $this->user, $this->password);
		$this->conn->exec("set names utf8");

// connect by OOP
	function __construct(){
		$this->conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);



			array_push($this->users['records'], $user_item);

			// set response code to 200 -OK
			http_response_code(200);

			//show users in json format

			echo json_encode($this->users);
		}

		
	}
	else{
			// set the response code to 404
			http_response_code(404);

			echo json_encode("No users found");
		}

	$this->conn->close(); 
}



	} 
	catch(PDOException $exception){
		echo "Connection Error: ". $exception->getMessage();
	}

		if($this->conn){
//echo "connection success";
}
else{
echo "connection not success";
}

}


// get all users
public function getUsers(){
$read = "SELECT first_name, last_name, username, email,role FROM $this->table";
$result = $this->conn->query($read);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

// create a new user
// get posted data
public function createUser(){
	$json = file_get_contents("php://input");

$data = json_decode(file_get_contents("php://input"));

if(!$data) {

// set the response code to 404
			http_response_code(404);

			echo json_encode("Data missing or invalid");

// this is essential, to start the connection after the try-catch have been passed
	return $this->conn;

  $user_item = array(
			'username' => $row["username"],
			'first_name' => $row["first_name"],
			'last_name' => $row["username"],
			'email' => $row["email"],
			'role' => $row["role"]
		);

		array_push($this->users, $user_item);

		// set response code to 200 - OK
	http_response_code(200);

	//show users in json format
	echo "Users: " .json_encode($this->users);
  }
} else {
  // set the response code to 404
	http_response_code(404);

	echo json_encode("No users found");


}


else{
	echo json_encode("It works");

    $hash = password_hash($data->password, PASSWORD_DEFAULT);

   
   $query = "INSERT INTO $this->table(first_name, last_name, username, email, password, role) VALUES('$data->first_name', '$data->last_name', '$data->username', '$data->email', '$hash', '$data->staff_type')";


mysqli_query($this->conn, $query);

	if(mysqli_affected_rows($this->conn) > 0){
		echo "  Data saved   ";
	}

$this->conn->close();


else{
	echo "no";
}



 $user_item = array(
				'username' =>$data->username,
				'first_name' =>$data->first_name,
				'last_name' =>$data->last_name,
				'email' =>$data->email,
				'role' =>$data->staff_type,
				'password' =>$hash
			);

array_push($this->users, $user_item);

			// set response code to 200 -OK
 
			http_response_code(201);

			//show users in json format

			echo json_encode($this->users);
		}
/**else{
			// set the response code to 404
			http_response_code(404);

			echo json_encode("error creating the user");**/
		

$this->conn->close(); 

	}


// delete a user/resource
public function updateUser(){
	$data = json_decode(file_get_contents("php://input"));

	if(!$data) {

// set the response code to 404
			http_response_code(404);

			echo json_encode("Data missing or invalid");

}

else{
	echo json_encode("It works");

	$query = "DELETE FROM $this->table where username= $data->username";

	mysqli_query($this->conn, $query);

	if(mysqli_affected_rows($this->conn) > 0){
		echo "  Deleted   ";

		// set response code to 200 -OK
 
			http_response_code(201);
	}

else{
	echo "no";
}

}

	
}






// update user
public function deleteUser(){
	$data = json_decode(file_get_contents("php://input"));

	if(!$data) {

// set the response code to 404
			http_response_code(404);

			echo json_encode("Data missing or invalid");

}

else{
	echo json_encode("It works");

}
}
}


	}


?>