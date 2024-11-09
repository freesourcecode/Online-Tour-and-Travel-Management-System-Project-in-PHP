
<?php
require_once('check_login.php');
?>
<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"sidebar.php";?>

 
        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Finance Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Finanace Details</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                             
                                
                               
                               
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              
                                                <th>Booking Id</th>
                                                <th>Customer Name</th>
                                                <th>Total Amount</th>
                                                 <th>Paid Amount</th>
                                                 <th>Pending Amount</th>
                                                 <th>From Date</th>
                                                 <th>To Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Booking Id</th>
                                                <th>Customer Name</th>
                                                <th>Total Amount</th>
                                                 <th>Paid Amount</th>
                                                 <th>Pending Amount</th>
                                                 <th>From Date</th>
                                                 <th>To Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM booking"); 
    $stmt->execute();




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




       $stmt6 = $conn->prepare("SELECT SUM(insert_amount) as amt from payment where booking_id='".$value['id']."'"); 
      
                 $stmt6->execute();
                $result6=$stmt6->fetch(PDO::FETCH_ASSOC);


   
                                          ?>


                                            <tr>
                             <td><?php echo $value['id'];?></td>
                           <td><?php echo $cust['name'];?></td>

 <td style="width:5px"><?php echo $currency["curr_symbol"].' '.$value['total'];?></td>

 <td style="width: 15px"><?php echo $currency["curr_symbol"].' '. $result6['amt'];?></td>

  <td style="width: 15px"><?php  echo $currency["curr_symbol"]?> <?php echo $value['total']-$result6['amt'];?>
    
  </td>

                                             <td><?php echo $value['from_date'];?></td>
                                            <td><?php echo $value['to_date'];?></td>
                                             <td>
                                         <?php
                          if ($value['total']==$result6['amt'])
                                           {
                                            echo "Fully Paid";
                                          }
                                          else
                                          {
                                            echo "Partially Paid";
                                          }

                                          ?>
                                             </td>
                                            
                                            
                     
        <td>

        <a href="add_payment.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-success" style="width: 40px; margin-right: 20px"><i class="fa fa-inr fa-2x" data-toggle="tooltip" title="Make Payment"></i></a>
       
    </td>   
                                                
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
 <?php include"footer.php";
?>

