<?php
require('fpdf.php');
include"config.php";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM packages GROUP BY pname;"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  
     $data=$stmt->fetch(PDO::FETCH_ASSOC);
    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$stmt1 = $conn->prepare("SELECT * FROM booking"); 

$stmt1->execute();

    // set the resulting array to associative
    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
    
  $data1=$stmt1->fetch(PDO::FETCH_ASSOC);
class PDF extends FPDF
{
  

  function Header()
    {
     // $this->Image('logo.png',50,20,50);
      $this->SetFont('Helvetica','B',15);
      $this->SetXY(100, 10);
       $this->Cell(100,10,'Package Details',0,1);
      // $this->SetDrawColor('60','50',100);
      //  $this->Cell(40,5,'Name',1,0,'C',true);
       $this->SetFillColor(180,180,255);
        $this->SetDrawColor(50,50,100);
        $this->cell(60,5,'pname',1,0,'',true);
         $this->cell(40,5,'price_adult',1,0,'',true);
          $this->cell(40,5,'price_children',1,0,'',true);
           $this->cell(40,5,'total_amount',1,0,'',true);
     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Arial','I',10);
      $this->Write (5, 'This is a footer');
    }
}

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(180,180,255); 

              

    foreach ($data as $value) {
         
         $pdf->cell(60,5,$data['pname'],1,0);
     $pdf->cell(40,5,$data['price_adult'],1,0);
     $pdf->cell(40,5,$data['price_children'],1,1);
     $pdf->cell(40,5,$data1['total_amount'],1,1);
          
}
$pdf->Output();
?>
