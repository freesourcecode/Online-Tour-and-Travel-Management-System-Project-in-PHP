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
       $this->Cell(100,10,'Payment Details',0,1);
      
       $this->SetFillColor(220,220,220);
        $this->SetDrawColor(50,50,100);
        // $this->cell(10,5,'Id',1,0,'',true);
         $this->SetY(35);
        $this->cell(20,10,'Name',1,0,'',true);
         $this->cell(20,10,'State',1,0,'',true);
        $this->cell(47,10,'Package Name',1,0,'',true);
         // $this->cell(10,5,'Adults',1,0,'',true);
         //  $this->cell(10,5,'Children',1,0,'',true);
        $this->cell(35,10,'Total amount',1,0,'',true);
        $this->cell(35,10,'Adv amount',1,0,'',true);
        $this->cell(40,10,'Pending',1,1,'',true);

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

$stmt3 = $conn->prepare("SELECT * FROM payment where booking_id='".$value['id']."'");
$stmt3->execute();
// $abc=$stmt->fetch(PDO::FETCH_ASSOC);
 // echo "<pre>";print_r($abc);exit;
   $abc = $stmt3->setFetchMode(PDO::FETCH_ASSOC); 


    $payment=$stmt3->fetch(PDO::FETCH_ASSOC);
      // $payment=$stmt->fetchAll();
          // $pdf->cell(10,5,$value['id'],1,0);
          $pdf->cell(20,10,$cust['name'],1,0);
          $pdf->cell(20,10,$cust['state_name'],1,0);
          $pdf->cell(47,10,$package['pname'],1,0);
           $pdf->cell(35,10,$value['total_amount'],1,0);
           $pdf->cell(35,10,$value['adv_amount'],1,0);
          $pdf->cell(40,10,$payment['pending_amount'],1,1);
          // $pdf->cell(30,5,$value['to_date'],1,0);
          // $pdf->cell(25,5,$value['total_amount'],1,1);
          // $pdf->cell(40,5,$value['traveller_id'],1,0);
          // $pdf->cell(40,5,$value['package_id'],1,1);
        
        
  }

$pdf->Output();
?>