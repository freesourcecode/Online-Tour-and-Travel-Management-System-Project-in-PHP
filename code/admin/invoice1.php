
<?php
require('fpdf.php');
include"config.php";


try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM settings;"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
   $data=$stmt->fetch(PDO::FETCH_ASSOC);
   // $data=$stmt->fetchAll();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

class PDF extends FPDF
{
  
  function Header()
    {
       $this->SetTextColor(100,100,200);
      $this->SetFont('Times','B',25);
      $this->SetX(160);
       $this->Cell(100,10,'Invoice',0,1);

      $this->SetTextColor(000,000,000);
      $this->SetFont('Times','B',15);
       $this->SetX(160);
       $this->Cell(100,10,'Invoice#0001',0,1);
       $this->SetY(27);
       $this->SetX(160);
        $this->SetFont('Times','',15);
       $this->Cell(200,10,'January 11 2019',0,1);
        // $this->SetX(120);

        $this->SetTextColor(000,000,000);
         $this->SetX(120);
         // $this->SetY(57);
         // // $this->SetY(60);
        $this->SetFillColor(211,211,211);
         // $this->SetRightMargin(120);
         // $this->SetTopMargin(50);
         $this->SetFont('Times','B',15);
        $this->Cell(85,10,'SITE ADDRESS',0,0,'',true);
       
       $this->SetTextColor(000,000,000);
       $this->SetFont('Times','',15);
       $this->SetX(160);
       $this->SetY(47);
       $this->Cell(100,10,'This is Sample Text.',0,1);

       $this->SetY(52);
       $this->Cell(100,10,'Insert your desired text here.',0,1);

       $this->SetY(47);
       $this->SetX(160);
       $this->Cell(200,10,'This is Sample Text',0,1);

       $this->SetY(52);
       $this->SetX(140);
       $this->Cell(200,10,'Insert your desired text here.',0,1);
       $this->Ln(5);
       $this->SetFillColor(153,153,255);
       $this->cell(20,13,'No',0,0,'',true);
       $this->cell(50,13,'Description',0,0,'',true);
       $this->cell(45,13,'Quantity',0,0,'',true);
       $this->cell(45,13,'Unit Price',0,0,'',true);
       $this->cell(35,13,'Line Total',0,0,'',true);
      // $this->SetLeftMargin(111);
       
         $this->Ln(13);
         $this->SetFillColor(211,211,211);
         $this->cell(20,10,'1',0,0,'',true);
         $this->cell(50,10,'Edit text here',0,0,'',true);
         $this->cell(45,10,'9',0,0,'',true);
         $this->cell(45,10,'9.99',0,0,'',true);
         $this->cell(35,10,'9.99',0,0,'',true);
     
        $this->Ln(12);
         $this->SetFillColor(211,211,211);
         $this->cell(20,10,'',0,0,'',true);
         $this->cell(50,10,'',0,0,'',true);
         $this->cell(45,10,'',0,0,'',true);
         $this->cell(45,10,'',0,0,'',true);
         $this->cell(35,10,'',0,0,'',true);

         $this->Ln(12);
         $this->SetFillColor(220,220,220);
         $this->cell(20,10,'',0,0,'',true);
         $this->cell(50,10,'',0,0,'',true);
         $this->cell(45,10,'',0,0,'',true);
         $this->cell(45,10,'',0,0,'',true);
         $this->cell(35,10,'',0,0,'',true);

         $this->Ln(12);
         $this->SetFillColor(211,211,211);
         $this->cell(20,10,'',0,0,'',true);
         $this->cell(50,10,'',0,0,'',true);
         $this->cell(45,10,'',0,0,'',true);
         $this->cell(45,10,'',0,0,'',true);
         $this->cell(35,10,'',0,0,'',true);


       $this->SetY(125);
       $this->SetX(140);
       $this->Cell(200,10,'Subtotal',0,1);

       $this->SetY(125);
       $this->SetX(180);
       $this->Cell(200,10,'99.99',0,1);

       $this->SetY(135);
       $this->SetX(120);
       $this->Cell(200,10,'Tax%',0,1);

       $this->SetY(135);
       $this->SetX(140);
       $this->Cell(200,10,'9.99%',0,1);

        $this->SetY(135);
       $this->SetX(180);
       $this->Cell(200,10,'9.99',0,1);

       $this->SetFont('Times','B',25);
       $this->SetY(145);
       $this->SetX(140);
       $this->Cell(200,10,'Total',0,1);


       $this->SetY(145);
       $this->SetX(180);
       $this->Cell(200,10,'9.99',0,1);

       $this->SetTextColor(100,100,200);
       $this->SetFont('Times','B',20);
       $this->SetY(10);
       $this->Cell(100,10,'Your Bussiness',0,1);
       

      $this->SetTextColor(000,000,000);
      $this->SetFont('Times','',15);
      $this->SetY(20);
       $this->Cell(100,10,'Street Address,City,ST ZIP Code City, ST ZIP Code',0,1);
         
      $this->SetTextColor(000,000,000);
      $this->SetFont('Times','',15);
      $this->SetY(27);
       $this->Cell(100,10,'ST ZIP Code',0,1);

         $this->SetFillColor(211,211,211);
        $this->SetTextColor(000,000,000);
      $this->SetFont('Times','B',15);
      $this->SetY(37.5);
      // $this->Cell(100,10,'BILL TO',0,1);
      $this->cell(100,10,'BILL TO',0,1,'',true);

         $this->SetLeftMargin(150,100,155);
        $this->SetDrawColor(50,150,100);
        // $this->cell(10,5,'Id',1,0,'',true);
        // $this->cell(30,5,'Cust Name',1,0,'',true);
        //  $this->cell(30,5,'Amount',1,0,'',true);
        // $this->cell(50,5,'Date',1,0,'',true);
       
        // $this->cell(30,5,'Tax %',1,0,'',true);
        // $this->cell(40,5,'Basic Amount',1,1,'',true);
       

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
$pdf->SetDrawColor(150,50,100);

  
$pdf->Output();
?>