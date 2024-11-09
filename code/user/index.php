
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
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30" style="background: #FF5370;">
                           <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-book f-s-40 color-warning " style="color:white" ></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                    $stmt = $conn->prepare("SELECT Count(*) as cnt FROM booking where traveller_id='".$_SESSION['id']."'");
                                    $stmt->execute();
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                    
                                     ?>
                                    <h2 style="color:white"><?php echo $result['cnt']; ?></h2>
                                    <p style="color:white" class="m-b-0">Total Bookings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30" style="background: #FFB64D;">
                          <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-inr f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                 $stmt = $conn->prepare("SELECT SUM(total) as total FROM booking where traveller_id='".$_SESSION['id']."'");
                                  $stmt->execute();


                                $result=$stmt->fetch(PDO::FETCH_ASSOC);

                                     ?>
                                    <h2 style="color:white"><?php echo $result['total']; ?></h2>
                                    <p style="color:white" class="m-b-0">Total Amount</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30" style="background: #28a745;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-inr f-s-40 color-white"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php
                                 $stmt = $conn->prepare("SELECT * FROM booking where traveller_id='".$_SESSION['id']."'");
                                  $stmt->execute();
                                  $result=$stmt->fetchAll();

                            
                                       
                                 $stmt1 = $conn->prepare("SELECT SUM(insert_amount) as amt FROM booking join payment 
                                    on booking.id=payment.booking_id 
                                    where booking.traveller_id='".$_SESSION['id']."'");
                                 
                                  $stmt1->execute();

                                   $result1=$stmt1->fetch(PDO::FETCH_ASSOC);

                                    
                               
                                     ?>
                                 <h2 style="color:white"><?php echo $result1['amt']; ?></h2>
                                    <p style="color:white" class="m-b-0">Advance Amount</p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>

                
            </div>
            
           <?php include"footer.php";?>