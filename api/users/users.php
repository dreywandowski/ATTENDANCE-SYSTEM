<?php


class Users{
	private $conn;
	private $table = "users";

	// object properties
	public $username;
	public $firstName;
	public $lastName;
	public $email;
	public $role;
	
	// constructor with $db as db connection, to automatically pass in the database connection to the users class/object

	public function __construct($db){
		$this->conn = $db;
	}


// read users
	function read(){
		// select ALL Query
		$query = "SELECT * FROM .$this->table";


		// prepare statement
		$stmt = $this->conn->prepare($query);

		// execute query
		$stmt->execute();


		return $stmt;
	}


}


?>