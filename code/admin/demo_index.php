
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
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                             
                                
                               
                               

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
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              
                                                <th>Booking Id</th>
                                                <th>Customer Name</th>
                                                <th>Total Amount</th>
                                                 <th>Paid Amount</th>
                                                 <th>Pending Amount</th>
                                                 <th>Mobile No</th>
                                           
                                                <th>Status</th>
                                              
                                               
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
                                      
                                                <th>Status</th>
                                               
                                            </tr>
                                        </tfoot>
                                        <tbody>

<?php
include"config.php";

try {
                       
                                                     
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt_payment = $conn->prepare("SELECT * FROM `payment` WHERE cdate = curdate()" ); 

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
                      <td style="width: 15px"><?php echo $booking['total_amount']-$result6['amt'];?></td>
                                             <td><?php echo $cust['mobile'];?></td>
                                           
                                             <td>
                                         <?php
                          if ($booking['total_amount']==$result6['amt'])
                                           {
                                            echo "Fully Paid";
                                          }
                                          else
                                          {
                                            echo "Partially Paid";
                                          }

                                          ?>
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

