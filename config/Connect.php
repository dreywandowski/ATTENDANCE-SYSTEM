<?php
//namespace App; 

//require_once "../vendor/autoload.php";



// connection string using OOP

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
echo "<script>".
	"console.log('Connected to the database  Ok')"."</script>";
}


else{
echo "<script>"."console.log('connection not successfull')"."</script>";
}


	}

	//filter user input
	protected function checkInput($var){
		$var = htmlspecialchars($var);
		$var = trim($var);
		$var = stripslashes($var);

		return $var;
	}


// disconnect from db when done
	function __destruct(){

		mysqli_close($this->conn);
	}
}



?>