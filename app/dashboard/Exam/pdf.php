
<?php
//PDF Generator library
require("../lib/fpdf/fpdf.php");


$server = "localhost";
$user = "root"; 
$password = "";
$db = "attendance";

$link = mysqli_connect($server, $user, $password, $db);

// saves the date as a cookie to query the db later
$cookie = $_COOKIE['cookie'];


/**$sql = "SELECT ID, first_name, last_name, score, date_taken, file_path
            FROM  results AS t1
            LEFT OUTER JOIN users AS t2
            ON t2.username = t1.username
            WHERE t1.date_taken ='$cookie'";

            $result = mysqli_query($link, $sql);
 $row = mysqli_fetch_array($result);
  $fullName = $row["first_name"] . "&nbsp" .$row["last_name"];
   $score = $row["score"];
    $date = $row["date_taken"];
   $pic = $row["file_path"];
   $id = $row["ID"];***/

class myPDF extends FPDF{
	function header()
{
	$this -> Image("images/2584595.jpg");
	$this ->SetFont('Arial', 'B', 16);
	$this -> Cell(190, 5, 'STUDENT RESULTS', 0,0,'C');
	$this-> Ln();
	$this ->SetFont('Times', '', 12);
	$this -> Cell(190, 10, 'Results of Exam conducted on the website',0,0,'C');
	$this-> Ln(20);

}

function footer(){
	$this->SetY(-15);
	$this -> SetFont('Arial','',8);
	//$this -> Cell(0, 10,'Page '.$this.PageNo().'/{nb}',0,0,'C');
}

function headerTable(){
	$this->SetFont('courier','B',12);
	$this-> Cell(20,10,'ID',1,0,'C');
	$this-> Cell(40,10,'Full name',1,0,'C');
	$this-> Cell(40,10,'Score',1,0,'C');
	$this-> Cell(60,10,'Exam Date',1,0,'C');
	$this ->Ln(); 

}

function viewTable($link){
	$cookie = $_COOKIE['cookie'];

	$this->SetFont('courier','',12);
	$sql = "SELECT ID, first_name, last_name, score, date_taken, file_path
            FROM  results AS t1
            LEFT OUTER JOIN users AS t2
            ON t2.username = t1.username
            WHERE t1.date_taken ='$cookie'";

            $result = mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($result)) {
 	 $fullName = $row["first_name"] . " " .$row["last_name"];
    $score = $row["score"];
    $date = $row["date_taken"];
    $pic = "../".$row["file_path"];
    $id = $row["ID"];

	$this-> Cell(20,10,$id,1,0,'C');
	$this-> Cell(40,10,$fullName,1,0,'L');
	$this-> Cell(40,10,"     ".$score,1,0,'L');
	$this-> Cell(60,10,$date,1,0,'L');
	$this-> Ln();

    $this -> Image($pic, 220, 3, 60,60);

	}

}
}



   //$logo = "../Exam/images/31610-NYB3MB.jpg";

$pdf = new myPDF();
$pdf -> AliasNbPages();
$pdf-> AddPage('L', 'A4', 0);
$pdf -> headerTable();
$pdf-> viewTable($link);

/**
$pdf = new FPDF("P", "mm", "A4"); // define how the pdf will look

$pdf -> AddPage(); // create a new PDF using the PDF object created

$pdf -> SetFont("courier", "B", 14); //set font size and type
//$pdf -> Cell(70, 6, 'STUDENT NAME:'.' ' . $fullName, 0, 3, "J");

//$pdf -> Image($logo, 5, 2, 110,80);


//cell properties == Cell(width, height, text, border, end of line, align)

$pdf -> Cell(120, 6, 'I love', 0, 3, "J");

$pdf -> SetFont("courier", "I", 12);



$pdf -> Cell(120, 6,$date.'Fabregas is better tho :)', 0, 0, "J");

//$pdf -> Cell(120, 6, $fullName ." ".$date, 0, 0, "J");
**/

$pdf -> Output();


?>
 
