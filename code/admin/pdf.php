<?php
require('fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$pdf->cell(40,10,'Hellooooo');
$pdf->output();

?>
