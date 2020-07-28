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
		$this->conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);

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

$this->conn->close();

}




	}


?>