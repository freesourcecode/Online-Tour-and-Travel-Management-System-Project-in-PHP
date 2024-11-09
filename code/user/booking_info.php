
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
                    <h3 class="text-primary">Booking Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Booking Details</a></li>
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
                                              
                                                <th>Id</th>
                                                <th style="width:50px">Customer Name</th>
                                                <th>State</th>
                                                <th>Package Name</th>
                                                <th style="width:10px">No of Adults</th>
                                                <th style="width:10px">No. Of Children</th>
                                                <th>From Date</th>
                                                 <th>To Date</th>
                                                 <th style="width:10px">Total Amount</th>
                                               
                                                <th style="width:10px">Advance Amount</th>
                                                  <th>Pending Amount</th>
                                                 <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              
                                                  <th>Id</th>
                                                <th style="width:50px">Customer Name</th>
                                                <th>State</th>
                                                <th>Package Name</th>
                                                <th style="width:10px">No of Adults</th>
                                                <th style="width:10px">No. Of Children</th>
                                                <th>From Date</th>
                                                 <th>To Date</th>
                                                  <th style="width:10px">Total Amount</th>
                                                
                                                   <th>Advance Amount</th>
                                                  <th style="width:10px">Pending Amount</th>
                                                 <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
     $stmt = $conn->prepare("SELECT * FROM booking where traveller_id='".$_SESSION['id']."'"); 
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
        

   
                                          ?>
                                            <tr>
                                             
                                                <td><?php echo $value['id'];?></td>
                                                 <td style="width:50px"><?php echo $cust['name'];?></td>
                                                 <td><?php echo $cust['state_name'];?></td>
                                                <td style="width:10px"><?php echo $package['pname'];?></td>
                                             <td style="width:10px"><?php echo $value['no_of_adults'];?></td>
                                               <td style="width:10px"><?php echo $value['no_of_children'];?></td>
                                            <td><?php echo $value['from_date'];?></td>
                                            <td><?php echo $value['to_date'];?></td>
                                             <td style="width:5px"><?php echo $value['total_amount'];?></td>
                                              <td style="width:10px"><?php echo $value['adv_amount'];?></td>
                       <td style="width:5px"><?php echo $payment['pending_amount'];?></td>
        <td><a href="booking_details.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash fa-2x"></i></a>

        <a href="update_booking.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil fa-2x"></i></a>

       
       
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


<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
 <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
