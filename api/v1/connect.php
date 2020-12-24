<?php
// connection string using OOP
//$conn = mysqli_connect("localhost","user", "$pass", "db");

class Connect{
	protected $localhost ="localhost";
	protected $user = "root";
	protected $pass = "";
	protected $db = "attendance";
	protected $conn;



// connect to MySQL db using OOP
	function __construct(){
		$this->conn = mysqli_connect($this->localhost, $this->user, $this->pass, $this->db);

		if($this->conn){
//echo "connection successfull";
}
else{
//echo "connection not successfull";
}


	}


// disconnect from db when done
	function __destruct(){

		mysqli_close($this->conn);
	}
}

/**
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

**/
?>