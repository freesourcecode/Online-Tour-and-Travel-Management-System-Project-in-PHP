<?php
require('fpdf.php');
include"config.php";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM travellers;"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  
   $data=$stmt->fetchAll();
    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

 
    
class PDF extends FPDF
{
  

  function Header()
    {
      
      $this->SetFont('Helvetica','B',15);
      $this->SetXY(100, 10);
       $this->Cell(100,10,'Traveller Details',0,1);
      
       $this->SetFillColor(180,180,255);
        $this->SetDrawColor(50,50,100);
        $this->cell(60,5,'Name',1,0,'',true);
         $this->cell(40,5,'email',1,0,'',true);
          $this->cell(40,5,'mobile',1,0,'',true);
          $this->cell(40,5,'package',1,1,'',true);

     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Arial','I',10);
      $this->Write (5, 'This is a footer');
    }
}

$pdf=new PDF();
$pdf->AliasNbPages('{pages}');
$pdf->AddPage();
$pdf->SetFont('Arial','', 9);
$pdf->SetDrawColor(50,50,100);
foreach ($data as $value) {
       $stmt1 = $conn->prepare("SELECT pname FROM packages");
       $stmt1->execute();
       $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
       $package=$stmt1->fetch(PDO::FETCH_ASSOC);


         $pdf->cell(60,5,$value['name'],1,0);
         $pdf->cell(40,5,$value['email'],1,0);
         $pdf->cell(40,5,$value['mobile'],1,0);
         $pdf->cell(40,5,$package['pname'],1,1);
    
}
$pdf->Output();
?>
