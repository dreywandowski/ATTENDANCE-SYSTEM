<?php 
require("fpdf/fpdf.php");
//echo "It works";


$pdf = new FPDF("P", "mm", "A4"); // define how the pdf will look

$pdf -> AddPage(); // create a new PDF using the PDF object created

$pdf -> SetFont("Arial", "B", 14); //set font size and type

//cell properties == Cell(width, height, text, border, end of line, align)

$pdf -> Cell(120, 6, 'I love Lewandowski', 0, 3, "J");

$pdf -> SetFont("Arial", "I", 12);


$pdf -> Cell(120, 6, 'Fabregas is better tho :)', 0, 0, "J");
$pdf -> Output();  // generate pdf file
?>