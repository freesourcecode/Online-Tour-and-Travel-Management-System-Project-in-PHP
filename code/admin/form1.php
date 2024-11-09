
<?php
require_once('check_login.php');
?>
<?php include "header.php"?>
       <?php include"sidebar.php"?>
        
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

                                          ?>
                                            <tr>
                                         
                                               <td><?php echo $value['id'];?></td>
                                             <td><?php echo $value['expense_for'];?></td>
                                            <td><?php echo $expense['expense_name'];?></td> 
                                               <td><?php echo $value['amount'];?></td>
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
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              
                                                <th style="width:10px">Id</th>
                                                <th style="width:10px">Cust Name</th>
                                                <th style="width:5px">State</th>
                                                <th style="width:10px">Package Name</th>
                                  <th style="width:10px">Ad</th>
                                                <th style="width:10px">Ch</th>
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
                                                 <th style="width:10px">Ad</th>
                                                <th style="width:10px">Ch</th>
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

                                          ?>
                                           <tr>
                                             
                                                <td style="width:10px"><?php echo $value['id'];?></td>
                                                 <td style="width:5px"><?php echo $cust['name'];?></td>
                                                 <td style="width:5px"><?php echo $cust['state_name'];?></td>
                                                <td style="width:10px"><?php echo $package['pname'];?></td>
                                             <td style="width:10px"><?php echo $value['no_of_adults'];?></td>
                                               <td style="width:10px"><?php echo $value['no_of_children'];?></td>
                                            <td style="width:10px"><?php echo $value['from_date'];?></td>
                                            <td style="width:10px"><?php echo $value['to_date'];?></td>
                                             <td style="width:5px"><?php echo $_SESSION["currency"].' '.$value['total_amount'];?></td>
                                              <td style="width:5px"><?php echo $_SESSION["currency"].' '. $value['adv_amount'];?></td>
                    
                                                
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
                                    <table id="mytable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              
                                                <th style="width:10px">Id</th>
                                                <th style="width:10px">Cust Name</th>
                                                <th style="width:5px">State</th>
                                                <th style="width:10px">Package Name</th>
                                                <th style="width:10px">Ad</th>
                                                <th style="width:10px">Ch</th>
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
                                  <th style="width:10px">Ad</th>
                                                <th style="width:10px">Ch</th>
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

                                          ?>
                                           <tr>
                                             
                                                <td style="width:10px"><?php echo $value['id'];?></td>
                                                 <td style="width:5px"><?php echo $cust['name'];?></td>
                                                 <td style="width:5px"><?php echo $cust['state_name'];?></td>
                                                <td style="width:10px"><?php echo $package['pname'];?></td>
                                             <td style="width:10px"><?php echo $value['no_of_adults'];?></td>
                                               <td style="width:10px"><?php echo $value['no_of_children'];?></td>
                                            <td style="width:10px"><?php echo $value['from_date'];?></td>
                                            <td style="width:10px"><?php echo $value['to_date'];?></td>
                                             <td style="width:5px"><?php echo $_SESSION["currency"].' '.$value['total_amount'];?></td>
                                              <td style="width:5px"><?php echo $_SESSION["currency"].' '. $value['adv_amount'];?></td>
                    
                                                
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
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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

                                          ?>
                                            <tr>
                                         
                                               <td><?php echo $value['id'];?></td>
                                             <td><?php echo $cust['name'];?></td>
                                            <td><?php echo $value['total_amount'];?></td> 
                                               <td><?php echo $value['total']-$value['total_amount'];?></td>
                                              
       
                                                
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
            
           <?php include "footer.php"?>