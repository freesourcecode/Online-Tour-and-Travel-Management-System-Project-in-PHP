<?php
require('fpdf.php');
include"config.php";


try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM booking;"); 
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
      $this->SetXY(85, 20);
       $this->Cell(100,10,'Income Report',0,1);
      
       $this->SetFillColor(192,192,192);
        $this->SetDrawColor(50,50,100);
         $this->SetY(35);
        $this->cell(10,10,'Id',1,0,'',true);
        $this->cell(30,10,'Cust Name',1,0,'',true);
         $this->cell(30,10,'Amount',1,0,'',true);
          $this->cell(25,10,'Tax %',1,0,'',true);
          $this->cell(30,10,'total',1,0,'',true);
        $this->cell(30,10,'Date',1,0,'',true);
       
       
        $this->cell(37,10,'Basic Amount',1,1,'',true);
       

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
      
$stmt1 = $conn->prepare("SELECT * FROM travellers where id='".$value['traveller_id']."'");
$stmt1->execute();
$abc = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
    $cust=$stmt1->fetch(PDO::FETCH_ASSOC);


 $stmt2 = $conn->prepare("SELECT * FROM packages where id='".$value['package_id']."'");
$stmt2->execute();
$abc = $stmt2->setFetchMode(PDO::FETCH_ASSOC); 
    $package=$stmt2->fetch(PDO::FETCH_ASSOC);


    // $stmt3 = $conn->prepare("SELECT * FROM tax ");
    // $stmt3->execute();
    // $abc = $stmt3->setFetchMode(PDO::FETCH_ASSOC); 
    //  $tax=$stmt3->fetch(PDO::FETCH_ASSOC);
 
          $pdf->cell(10,10,$value['id'],1,0);
          $pdf->cell(30,10,$cust['name'],1,0);
            $pdf->cell(30,10,$value['total_amount'],1,0);
            $pdf->cell(25,10,$value['tax'],1,0);
          $pdf->cell(30,10,$value['total'],1,0);
           $pdf->cell(30,10,$value['created_date'],1,0);
        
          
           $pdf->cell(37,10,$value['total']-$value['total_amount'],1,1);


          
         
          
        
        
  }

$pdf->Output();
?>