<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 




require("fpdf/fpdf.php");

$fullName = $_SESSION['name'];
$score = $_SESSION['score'];
$date = $_SESSION['date'];
$pic = $_SESSION['pic'];
$id = $_SESSION['id'];


//echo "$id";

$pdf = new FPDF("P", "mm", "A4"); // define how the pdf will look

$pdf -> AddPage(); // create a new PDF using the PDF object created

$pdf -> SetFont("Arial", "B", 14); //set font size and type
//$pdf -> Cell(70, 6, 'STUDENT NAME:'.' ' . $fullName, 0, 3, "J");
$pdf -> Image($pic, 5, 2, 110,80);

//cell properties == Cell(width, height, text, border, end of line, align)

$pdf -> Cell(120, 6, 'I love', 0, 3, "J");

$pdf -> SetFont("Arial", "I", 12);


$pdf -> Cell(120, 6, $score.'Fabregas is better tho :)', 0, 0, "J");

$pdf -> Output();


?>
 
