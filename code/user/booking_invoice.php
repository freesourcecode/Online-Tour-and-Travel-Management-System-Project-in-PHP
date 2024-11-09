<?php
require_once('check_login.php');
?>
<?php
require('fpdf.php');
include"config.php";


try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM booking where traveller_id='".$_SESSION['id']."'"); 
    $stmt->execute();
    // echo "<pre>";print_r($result);exit;
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
       $this->Cell(100,10,'Booking Details',0,1);
      
        $this->SetFillColor(192,192,192);
        $this->SetDrawColor(50,50,100);
         $this->SetY(35);
         $this->SetFont('Helvetica','B',12);
        $this->cell(10,10,'Id',1,0,'',true);
         // $pdf->Cell($w=40);
        // $this->Cell($w=10);
        $this->Cell(30,10,' Name',1,0,'',true);
         $this->cell(20,10,'State',1,0,'',true);
        $this->cell(45,10,'Package Name',1,0,'',true);
         // $this->cell(10,5,'Adults',1,0,'',true);
         //  $this->cell(10,5,'Children',1,0,'',true);
        $this->cell(25,10,'From Date',1,0,'',true);
        $this->cell(23,10,'To Date',1,0,'',true);
        $this->cell(20,10,'Amount',1,0,'',true);
        $this->cell(20,10,'Advance',1,1,'',true);

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
 $xyz = $stmt3->setFetchMode(PDO::FETCH_ASSOC);
  // echo "<pre>";print_r($xyz);exit;
 // $xyz=$stmt3->fetch(PDO::FETCH_ASSOC);
       // echo "<pre>";print_r($xyz);exit;
      $payment=$stmt3->fetch(PDO::FETCH_ASSOC);


       $stmt6 = $conn->prepare("SELECT SUM(insert_amount) as amt from payment where booking_id='".$value['id']."'"); 
      //echo "<pre>";print_r($stmt6);exit;
                 $stmt6->execute();
                $result6=$stmt6->fetch(PDO::FETCH_ASSOC);
               //echo "<pre>";print_r($result6);exit;
          $pdf->SetFontSize(8);
          // $pdf->SetLineWidth(8);

          $pdf->cell(10,10,$value['id'],1,0);
           // $pdf->Cell($w=10);
          $pdf->cell(30,10,$cust['name'],1,0);
          $pdf->cell(20,10,$value['state_id'],1,0);
          $pdf->cell(45,10,$package['pname'],1,0);
          // $pdf->cell(10,5,$value['no_of_adults'],1,0);
          // $pdf->cell(10,5,$value['no_of_children'],1,0);
          $pdf->cell(25,10,$value['from_date'],1,0);
          $pdf->cell(23,10,$value['to_date'],1,0);
          $pdf->cell(20,10,$value['total'],1,0);
           $pdf->cell(20,10,$result6['amt'],1,1);
          // $pdf->cell(40,5,$value['traveller_id'],1,0);
          // $pdf->cell(40,5,$value['package_id'],1,1); 
        
        
  }

$pdf->Output();
?>