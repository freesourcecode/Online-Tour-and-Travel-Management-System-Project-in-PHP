
<?php
require('fpdf.php');
include"config.php";

$title='';
try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM settings;"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $settings=$stmt->fetch(PDO::FETCH_ASSOC); 
   // $title=$settings['title'];
      /**/
    //echo "<pre>";print_r($settings);exit;
   // $data=$stmt->fetchAll();
   // echo "<pre>";print_r($data);exit;

      $stmt = $conn->prepare("SELECT * FROM booking where id='".$_GET['id']."'"); 
    $stmt->execute();
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     //$result=$stmt->fetch(PDO::FETCH_ASSOC);
    //echo "<pre>";print_r($result);exit;
    $data=$stmt->fetchAll();


     foreach ($data as $value) {
$stmt1 = $conn->prepare("SELECT * FROM travellers where id='".$value['traveller_id']."'");
 //echo "<pre>";print_r($stmt1);exit;
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
        
          // $payment=$stmt3->fetchAll();

       $stmt6 = $conn->prepare("SELECT SUM(insert_amount) as amt from payment where booking_id='".$value['id']."'"); 
                 $stmt6->execute();
                $result6=$stmt6->fetch(PDO::FETCH_ASSOC);
        
          // $payment=$stmt3->fetchAll();
   
                                          ?>
                                           
                                            <?php }?>
                                            <?php
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

 class PDF extends FPDF
{
  
  function Header()
    {
       
        // $pdf->cell(10,5,'Id',1,0,'',true);
        // $pdf->cell(30,5,'Cust Name',1,0,'',true);
        //  $pdf->cell(30,5,'Amount',1,0,'',true);
        // $pdf->cell(50,5,'Date',1,0,'',true);
       
        // $pdf->cell(30,5,'Tax %',1,0,'',true);
        // $pdf->cell(40,5,'Basic Amount',1,1,'',true);
       

     }

  // function Footer()
  //   {
  //     $this->SetXY(100,-15);
  //     $this->SetFont('Arial','I',10);
  //     $this->Write (5, 'pdf is a footer');
  //   }
}

$pdf=new PDF();
$pdf->AliasNbPages('{pages}');
$pdf->AddPage();
$pdf->SetFont('Arial','', 9);
$pdf->SetDrawColor(150,50,100);
$pdf->SetTextColor(100,149,237);
      $pdf->SetFont('Times','B',19);
      $pdf->SetX(160);
       $pdf->Cell(100,10,$cust['name'],0,1);

      $pdf->SetTextColor(000,000,000);
      $pdf->SetFont('Times','B',15);
       $pdf->SetX(160);
       $pdf->Cell(100,10,$cust['id'],0,1);
       $pdf->SetY(27);
       $pdf->SetX(160);
        $pdf->SetFont('Times','',15);
       $pdf->Cell(200,10,$value['created_date'],0,1);
        // $pdf->SetX(120);

        $pdf->SetTextColor(000,000,000);
         $pdf->SetX(120);
         // $pdf->SetY(57);
         // // $pdf->SetY(60);
        $pdf->SetFillColor(211,211,211);
         // $pdf->SetRightMargin(120);
         // $pdf->SetTopMargin(50);
         $pdf->SetFont('Times','B',15);
        // $pdf->Cell(80,10,'SITE ADDRESS',0,0,'',true);
       
       // $pdf->SetTextColor(000,000,000);
       // $pdf->SetFont('Times','',15);
       // $pdf->SetX(100);
       // $pdf->SetY(47);
       // $pdf->Cell(100,10,'pdf is Sample Text.',0,1);

       // $pdf->SetY(52);
       // $pdf->Cell(100,10,'Insert your desired text here.',0,1);

       // $pdf->SetY(47);
       // $pdf->SetX(157);
       // $pdf->Cell(200,10,'pdf is Sample Text',0,1);

       // $pdf->SetY(52);
       // $pdf->SetX(140);
       // $pdf->Cell(200,10,'Insert your desired text here.',0,1);
       $pdf->Ln(5);
       $pdf->SetFillColor(70,130,180);
        $pdf->SetTextColor(255,255,255);
         // $pdf->SetX(80); 
       $pdf->cell(20,13,'No',0,0,'',true);

       $pdf->cell(40,13,'Package',0,0,'',true);
       $pdf->cell(35,13,'Adult Price',0,0,'',true);
       $pdf->cell(35,13,'Child Price ',0,0,'',true);
       $pdf->cell(33,13,'To Date ',0,0,'',true);
       $pdf->cell(33,13,'From Date ',0,0,'',true);


      // $pdf->SetLeftMargin(111);
       
         $pdf->Ln(13);
         $pdf->SetFillColor(211,211,211);
         $pdf->SetTextColor(000,000,000);
         $pdf->cell(20,10,'1',0,0,'',true);
         $pdf->SetFont('Times','',12); 
         $pdf->cell(40,10,$package['pname'],0,0,'',true);
         $pdf->cell(50,10,$package['price_adult'],0,0,'',true);
         $pdf->cell(20,10,$package['price_children'],0,0,'',true);
         $pdf->cell(38,10,$value['to_date'],0,0,'',true);
        $pdf->cell(28,10,$value['from_date'],0,0,'',true);



             // $pdf->cell(45,10,$value['total_amount'],0,0,'',true);
             // $pdf->cell(45,10,$result6['amt'],0,0,'',true);
             // $pdf->cell(33,10,$value['total_amount']-$result6['amt'],0,0,'',true);
     
        // $pdf->Ln(12);
        //  $pdf->SetFillColor(211,211,211);
        //  $pdf->cell(20,10,'',0,0,'',true);
        //  $pdf->cell(50,10,'',0,0,'',true);
        //  $pdf->cell(45,10,'',0,0,'',true);
        //  $pdf->cell(45,10,'',0,0,'',true);
        //  $pdf->cell(33,10,'',0,0,'',true);

        //  $pdf->Ln(12);
        //  $pdf->SetFillColor(220,220,220);
        //  $pdf->cell(20,10,'',0,0,'',true);
        //  $pdf->cell(50,10,'',0,0,'',true);
        //  $pdf->cell(45,10,'',0,0,'',true);
        //  $pdf->cell(45,10,'',0,0,'',true);
        //  $pdf->cell(33,10,'',0,0,'',true);

        //  $pdf->Ln(12);
        //  $pdf->SetFillColor(211,211,211);
        //  $pdf->cell(20,10,'',0,0,'',true);
        //  $pdf->cell(50,10,'',0,0,'',true);
        //  $pdf->cell(45,10,'',0,0,'',true);
        //  $pdf->cell(45,10,'',0,0,'',true);
        //  $pdf->cell(33,10,'',0,0,'',true);


       $pdf->SetY(70);
       $pdf->SetX(140);
       $pdf->Cell(200,10,'Subtotal',0,1);

       $pdf->SetY(70);
       $pdf->SetX(180);
       $pdf->Cell(200,10,$value['total_amount'],0,1);

       $pdf->SetY(80);
       $pdf->SetX(140);
       $pdf->Cell(200,10,'Tax%',0,1);

       // $pdf->SetY(80);
       // $pdf->SetX(140);
       // $pdf->Cell(200,10,'9.99%',0,1);

        $pdf->SetY(80);
       $pdf->SetX(180);
       $pdf->Cell(200,10,$value['tax'],0,1);

    
       // $pdf->SetFont('Times','B',25);
       $pdf->SetY(95);
       $pdf->SetX(140);
       $pdf->Cell(200,10,'Total',0,1);


       $pdf->SetY(95);
       $pdf->SetX(180);
       $pdf->Cell(200,10,$value['total'],0,1);



       // $pdf->SetFont('Times','B',25);
       $pdf->SetY(105);
       $pdf->SetX(140);
       $pdf->Cell(200,10,'Paid',0,1);


       $pdf->SetY(105);
       $pdf->SetX(180);
       $pdf->Cell(200,10,$result6['amt'],0,1);



        // $pdf->SetFont('Times','B',25);
       $pdf->SetY(115);
       $pdf->SetX(140);
      $pdf->Cell(200,10,'pending',0,1);

       $pdf->SetY(115);
       $pdf->SetX(180);
       $pdf->Cell(200,10,$value['total']-$result6['amt'],0,1);





     $pdf->SetTextColor(100,149,237);
       $pdf->SetFont('Times','B',25);
       $pdf->SetY(10);
  
       $pdf->Cell(100,10,$settings['title'],0,1);


      $pdf->SetTextColor(000,000,000);
      $pdf->SetFont('Times','',15);
      $pdf->SetY(20);
       $pdf->Cell(100,10,$settings['address'],0,1);
         
      $pdf->SetTextColor(000,000,000);
      $pdf->SetFont('Times','',15);
      $pdf->SetY(27);
       $pdf->Cell(100,10,$settings['add1'],0,1);

         $pdf->SetFillColor(211,211,211);
        $pdf->SetTextColor(000,000,000);
      $pdf->SetFont('Times','B',15);
      $pdf->SetY(37.5);
      // $pdf->Cell(100,10,'BILL TO',0,1);
      // $pdf->cell(80,10,'BILL TO',0,1,'',true);

         $pdf->SetLeftMargin(150,100,155);
        $pdf->SetDrawColor(50,150,100);

    //      function Footer()
    // {
    //   $this->SetXY(100,-15);
    //   $this->SetFont('Arial','I',10);
    //   $this->Write (5, $settings['title']);
    // }

         // function Footer()
         // {
         //   $pdf->Cell(200,10,$settings['title'],0,1);
         //  // $pdf->Write (5, $settings['title']);
         // }
//$pdf->Cell(100,10,$settings['title'],0,1);

//     foreach ($data as $value) {
// $stmt1 = $conn->prepare("SELECT * FROM travellers where id='".$value['traveller_id']."'");
// $stmt1->execute();
// $abc = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
//     $cust=$stmt1->fetch(PDO::FETCH_ASSOC);


//  $stmt2 = $conn->prepare("SELECT * FROM packages where id='".$value['package_id']."'");
// $stmt2->execute();
// $abc = $stmt2->setFetchMode(PDO::FETCH_ASSOC); 
//     $package=$stmt2->fetch(PDO::FETCH_ASSOC);


    // $stmt3 = $conn->prepare("SELECT * FROM tax ");
    // $stmt3->execute();
    // $abc = $stmt3->setFetchMode(PDO::FETCH_ASSOC); 
    //  $tax=$stmt3->fetch(PDO::FETCH_ASSOC);
 
          // $pdf->cell(10,5,$value['id'],1,0);
          // $pdf->cell(30,5,$cust['name'],1,0);
          // $pdf->cell(30,5,$value['total_amount'],1,0);
          //  $pdf->cell(50,5,$value['created_date'],1,0);
          // // $pdf->cell(10,5,$value['no_of_adults'],1,0);
          // // $pdf->cell(10,5,$value['no_of_children'],1,0);
          //  $pdf->cell(30,5,'0',1,0);
          //  $pdf->cell(40,5,'0',1,1);
         
          // $pdf->cell(40,5,$value['traveller_id'],1,0);
          // $pdf->cell(40,5,$value['package_id'],1,1);
        
        
  

$pdf->Output();
?>