<?php
//namespace Config;
//require "../vendor/autoload.php";



// connection string using OOP

class Connect{
	protected $localhost ="localhost";
	protected $user = "root";
	protected $pass = "";
	protected $db = "attendance";
	protected $conn;



// connect to MySQL db using OOP
	public function __construct(){
		$this->conn = mysqli_connect($this->localhost, $this->user, $this->pass, $this->db);

		if($this->conn){
return true;
}


else{
	return false;
//echo "<script>"."console.log('connection not successful')"."</script>";
}


	}



// disconnect from db when done
	public function __destruct(){

		mysqli_close($this->conn);
	}
}



