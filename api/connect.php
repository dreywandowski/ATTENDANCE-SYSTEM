<?php
//connect to mysql server and select the login_details database

// we are using PDO to connect to the database, to learn how to use OOP in PHP


class Database{
private $server = "localhost";
private $user = "root";
private $password = "";
private $db = "attendance";	
public $conn;


public function connect(){
	// close connection
	$this->conn = null;

// check for errors 
	try{
		$this->conn = new PDO("mysql:server=" . $this->server . ";db=" .$this->db, $this->user, $this->password);
		$this->conn->exec("set names utf8");

	} 
	catch(PDOException $exception){
		echo "Connection Error: ". $exception->getMessage();
	}

// this is essential, to start the connection after the try-catch have been passed
	return $this->conn;

}


}


?>