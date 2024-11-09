<?php
require_once('check_login.php');
?>
<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"sidebar.php"?>
<?php include"config.php"?>
<?php 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                  <marquee scrollamount=4><b>Alert : Don't Sale or Publish this script with your name. However you can use it for Academic Purpose ! For customisation at affordable cost contact me.</b></marquee>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30"  style="background: #FF5370;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-suitcase f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM packages");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                    
                                     ?>
                                   <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Total Packages</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card p-30" style="background: #28a745;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM travellers");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                    
                                     ?>
                                    <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Total Travellers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30" style="background: #FFB64D;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-dollar f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM currency");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                    
                                     ?>
                                    <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Total Currency</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="card p-30" style="background: #17a2b8;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-book f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM booking");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                    
                                     ?>
                                    <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p class="m-b-0" style="color:white">Total Bookings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

         
                
            </div>

             <div class="container-fluid">
                
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body" style="height:50%">
                                <h4 class="card-title"><b><u>Current Month Expenses</u></b></h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            
                                               <th style="width:10px">Id</th>
                                                <th style="width:10px">Expense For</th>
                                                <th style="width:10px">Expense Name</th>
                                                <th style="width:5px">Amount</th>
                                                <th style="width:10px">Created Date</th>
                                              

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th style="width:10px">Id</th>
                                                <th style="width:10px">Expense For</th>
                                                <th style="width:10px">Expense Name</th>
                                                <th style="width:5px">Amount</th>
                                                <th style="width:10px">Created Date</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM expense WHERE created_date >= LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH
    AND created_date < LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY"); 
    $stmt->execute();


    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $data=$stmt->fetchAll();



                                                foreach ($data as $value) {
  $stmt2 = $conn->prepare("SELECT * FROM expense_category where id='".$value['expense_name']."'");
$stmt2->execute();
$abc = $stmt2->setFetchMode(PDO::FETCH_ASSOC);  
    $expense=$stmt2->fetch(PDO::FETCH_ASSOC);



$stmt5 = $conn->prepare("SELECT * FROM settings");
$stmt5->execute();
$abc = $stmt5->setFetchMode(PDO::FETCH_ASSOC);  
    $settings=$stmt5->fetch(PDO::FETCH_ASSOC);

    $stmt1 = $conn->prepare("SELECT * FROM currency where id='".$settings['currency']."'");

 $stmt1->execute();
     $currency=$stmt1->fetch(PDO::FETCH_ASSOC);
                                          ?>
                                            <tr>
                                         
                                               <td><?php echo $value['id'];?></td>
                                             <td><?php echo $value['expense_for'];?></td>
                                            <td><?php echo $expense['expense_name'];?></td> 
         <td><?php echo $currency["curr_symbol"].' '. $value['amount'];?></td>
                                               <td><?php echo $value['created_date'];?></td>
       
                                                
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

         }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
                   <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body" style="height:50%">
                                <h4 class="card-title"><b><u>Current Month Bookings</u></b></h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example4" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              
                                                <th style="width:10px">Id</th>
                                                <th style="width:10px">Cust Name</th>
                                                <th style="width:5px">State</th>
                                                <th style="width:10px">Package Name</th>
                                
                                              <th style="width:20px">From Date</th>
                                                 <th style="width:20px">To Date</th>
                                                 <th style="width:10px">Amt</th>
                                               
                                                <th style="margin-left: 5px">Adv</th>
                                                 
                                                 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                             <tr>
                                              
                                                  <th>Id</th>
                                                <th style="width:50px">Cust Name</th>
                                                <th style="width:5px">State</th>
                                                <th>Package Name</th>
                                                
                                                <th>From Date</th>
                                                 <th>To Date</th>
                                                  <th style="width:5px">Amt</th>
                                                
                                                 <th style="margin-left: 5px">Adv</th>
                                                  
                                            
                                            </tr>
                                        </tfoot>
                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM booking WHERE created_date >= LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH
    AND created_date < LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY"); 
    $stmt->execute();


    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $data=$stmt->fetchAll();



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

 $xyz = $stmt3->setFetchMode(PDO::FETCH_ASSOC);



      $payment=$stmt3->fetch(PDO::FETCH_ASSOC);


$stmt5 = $conn->prepare("SELECT * FROM settings");
$stmt5->execute();
$abc = $stmt5->setFetchMode(PDO::FETCH_ASSOC);  
    $settings=$stmt5->fetch(PDO::FETCH_ASSOC);

    $stmt1 = $conn->prepare("SELECT * FROM currency where id='".$settings['currency']."'");

 $stmt1->execute();
     $currency=$stmt1->fetch(PDO::FETCH_ASSOC);
                                          ?>
                                           <tr>
                                             
                                                <td style="width:10px"><?php echo $value['id'];?></td>
                                                 <td style="width:5px"><?php echo $cust['name'];?></td>
                                                 <td style="width:5px"><?php echo $value['state_id'];?></td>
                                                <td style="width:10px"><?php echo $package['pname'];?></td>
                                            <td style="width:10px"><?php echo $value['from_date'];?></td>
                                            <td style="width:10px"><?php echo $value['to_date'];?></td>
<td style="width:5px"><?php echo $currency["curr_symbol"].' '.$value['total'];?></td>
<td style="width:5px"><?php echo $currency["curr_symbol"].' '. $value['adv_amount'];?></td>
                    
                                                
                                            </tr>
                                             <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

         }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
                   
                   
                </div>
                
                
                <div class="row">
                  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body" style="height:50%">
                                <h4 class="card-title"><b><u>Last 8 Days Bookings</u></b></h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example3" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              
                                                <th style="width:10px">Id</th>
                                                <th style="width:10px">Cust Name</th>
                                                <th style="width:5px">State</th>
                                                <th style="width:10px">Package Name</th>
                                                <th style="width:20px">From Date</th>
                                                 <th style="width:20px">To Date</th>
                                                 <th style="width:10px">Amt</th>
                                               
                                                <th style="margin-left: 5px">Adv</th>
                                                 
                                                 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              
                                                <th style="width:10px">Id</th>
                                                <th style="width:10px">Cust Name</th>
                                                <th style="width:5px">State</th>
                                                <th style="width:10px">Package Name</th>
                                  
                                              <th style="width:20px">From Date</th>
                                                 <th style="width:20px">To Date</th>
                                                 <th style="width:10px">Amt</th>
                                               
                                                <th style="margin-left: 5px">Adv</th>
                                                 
                                                 
                                            </tr>
                                        </tfoot>
                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM `booking` WHERE `created_date` BETWEEN  DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()"); 
    $stmt->execute();


    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $data=$stmt->fetchAll();



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

 $xyz = $stmt3->setFetchMode(PDO::FETCH_ASSOC);



      $payment=$stmt3->fetch(PDO::FETCH_ASSOC);



$stmt5 = $conn->prepare("SELECT * FROM settings");
$stmt5->execute();
$abc = $stmt5->setFetchMode(PDO::FETCH_ASSOC);  
    $settings=$stmt5->fetch(PDO::FETCH_ASSOC);

    $stmt1 = $conn->prepare("SELECT * FROM currency where id='".$settings['currency']."'");

 $stmt1->execute();
     $currency=$stmt1->fetch(PDO::FETCH_ASSOC);
                                          ?>
                                           <tr>
                                             
                                                <td style="width:10px"><?php echo $value['id'];?></td>
                                                 <td style="width:5px"><?php echo $cust['name'];?></td>
                                                 <td style="width:5px"><?php echo $value['state_id'];?></td>
                                                <td style="width:10px"><?php echo $package['pname'];?></td>
                                            
                                            <td style="width:10px"><?php echo $value['from_date'];?></td>
                                            <td style="width:10px"><?php echo $value['to_date'];?></td>
 <td style="width:5px"><?php echo $currency["curr_symbol"].' '.$value['total'];?></td>
<td style="width:5px"><?php echo $currency["curr_symbol"].' '. $value['adv_amount'];?></td>
                    
                                                
                                            </tr>
                                           
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

         }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body" style="height:50%">
                                <h4 class="card-title"><b><u>Current Month Tax Deduction</u></b></h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            
                                               <th style="width:10px">Id</th>
                                                <th style="width:10px">Name</th>
                                                <th style="width:10px">Basic Amount</th>
                                                <th style="width:5px">Tax Amount</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th style="width:10px">Id</th>
                                                <th style="width:10px">Name</th>
                                                <th style="width:10px">Basic Amount</th>
                                                <th style="width:5px">Tax Amount</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM booking WHERE created_date >= LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH
    AND created_date < LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY"); 
    $stmt->execute();


    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $data=$stmt->fetchAll();



                                                foreach ($data as $value) {
  $stmt1 = $conn->prepare("SELECT * FROM travellers where id='".$value['traveller_id']."'");
$stmt1->execute();
$abc = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
    $cust=$stmt1->fetch(PDO::FETCH_ASSOC);



$stmt5 = $conn->prepare("SELECT * FROM settings");
$stmt5->execute();
$abc = $stmt5->setFetchMode(PDO::FETCH_ASSOC);  
    $settings=$stmt5->fetch(PDO::FETCH_ASSOC);

    $stmt1 = $conn->prepare("SELECT * FROM currency where id='".$settings['currency']."'");

 $stmt1->execute();
     $currency=$stmt1->fetch(PDO::FETCH_ASSOC);
                                          ?>
                                            <tr>
                                         
                                               <td><?php echo $value['id'];?></td>
                                             <td><?php echo $cust['name'];?></td>
                <td><?php echo $currency["curr_symbol"].' '.$value['total_amount'];?></td> 
                  <td><?php echo $currency["curr_symbol"]?> <?php echo $value['total']-$value['total_amount'];?></td>
                                              
      
                                                
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

         }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
            </div>
                
            </div>
            
                          <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              <h4 class="card-title"><b><u>Message Sending</u></b></h4>
                               <form class="form-valide" method="post">
                                    <div class="form-body">
                                      
                                    </div>
                               <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                       <a href="send_sms.php"><button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check" ></i> Message Send</button></a>
                                       
                                    </div>
                                </form>
                                <div class="table-responsive m-t-40">
                                    <table id="example1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              
                                                <th>Booking Id</th>
                                                <th>Customer Name</th>
                                                <th>Total Amount</th>
                                                 <th>Paid Amount</th>
                                                 <th>Pending Amount</th>
                                                 <th>Mobile No</th>
                                           
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>Booking Id</th>
                                                <th>Customer Name</th>
                                                <th>Total Amount</th>
                                                 <th>Paid Amount</th>
                                                 <th>Pending Amount</th>
                                                <th>Mobile No</th>
                                    
                                            </tr>
                                        </tfoot>
                                        <tbody>

<?php
include"config.php";

try {
                       
                                                     
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt_payment = $conn->prepare("SELECT * FROM `payment` WHERE due_date = curdate()" ); 

    $stmt_payment->execute();

    $result11 = $stmt_payment->setFetchMode(PDO::FETCH_ASSOC); 
    $data11=$stmt_payment->fetchAll();

  

                                                foreach ($data11 as $value) {


  $stmt = $conn->prepare("SELECT * FROM booking where id='".$value['booking_id']."'"); 

    $stmt->execute();


     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);



     $booking=$stmt->fetch(PDO::FETCH_ASSOC);



$stmt1 = $conn->prepare("SELECT * FROM travellers where id='".$booking['traveller_id']."'");


$stmt1->execute();
$abc = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
    $cust=$stmt1->fetch(PDO::FETCH_ASSOC);

    

 $stmt2 = $conn->prepare("SELECT * FROM packages where id='".$booking['package_id']."'");
$stmt2->execute();
$abc = $stmt2->setFetchMode(PDO::FETCH_ASSOC);  
    $package=$stmt2->fetch(PDO::FETCH_ASSOC);

   
  $stmt3 = $conn->prepare("SELECT * FROM payment where booking_id='".$booking['id']."'");
$stmt3->execute();

 $xyz = $stmt3->setFetchMode(PDO::FETCH_ASSOC);



      $payment=$stmt3->fetch(PDO::FETCH_ASSOC);

       $stmt6 = $conn->prepare("SELECT SUM(insert_amount) as amt from payment where booking_id='".$booking['id']."'"); 

                 $stmt6->execute();
                $result6=$stmt6->fetch(PDO::FETCH_ASSOC);
        

   
                                          ?>

                                            <tr>
                                             <td><?php echo $booking['id'];?></td>
                                             <td><?php echo $cust['name'];?></td>
                                             <td style="width: 15px"><?php echo $booking['total'];?></td>
                                            <td style="width: 15px"><?php echo $result6['amt'];?></td>
                      <td style="width: 15px"><?php echo $booking['total']-$result6['amt'];?></td>
                                             <td><?php echo $cust['mobile'];?></td>
                                           
                                           
                                            
                                            
                     
      
                                                
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <footer class="footer text-center" ><strong><mark>for any Academic or Commercial Project Development Contact me at - <a href = "mailto:mayuri.infospace@gmail.com   target="_blank" style="color: red;" "float:left"><?php echo "mayuri.infospace@gmail.com";?>    </mark></strong>
            <?php
         
 }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>                  

            <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"footer.php"?>
           