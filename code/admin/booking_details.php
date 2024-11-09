
<?php
require_once('check_login.php');
?>
<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"sidebar.php";?>

 <?php
    if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
<div class="popup__background"></div>
<div class="popup__content">
<h3 class="popup__content__title">
Sure
</h1>
<p>Are You Sure To Delete This Record?</p>
<p>
<a href="operations/booking.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
<a href="booking_details.php" class="button button--error" data-for="js_success-popup">No</a>
</p>
</div>
</div>
<?php } ?>
        
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
                             
                                
                               
                               <a href="add_booking.php"><button type="button" class="btn btn-primary">Add Booking</button></a>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                                                 
                                                 <th style="width:10px">Act</th>

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
                                                  
                                                 <th style="margin-left: 5px">Act</th>
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


$stmt5 = $conn->prepare("SELECT * FROM settings");
$stmt5->execute();
$abc = $stmt5->setFetchMode(PDO::FETCH_ASSOC);  
    $settings=$stmt5->fetch(PDO::FETCH_ASSOC);

    $stmt1 = $conn->prepare("SELECT * FROM currency where id='".$settings['currency']."'");

 $stmt1->execute();
     $currency=$stmt1->fetch(PDO::FETCH_ASSOC);


   
  $stmt3 = $conn->prepare("SELECT * FROM payment where booking_id='".$value['id']."'");
$stmt3->execute();

 $xyz = $stmt3->setFetchMode(PDO::FETCH_ASSOC);



      $payment=$stmt3->fetch(PDO::FETCH_ASSOC);
        



        $stmt6 = $conn->prepare("SELECT SUM(insert_amount) as amt from payment where booking_id='".$value['id']."'"); 

                 $stmt6->execute();
                $result6=$stmt6->fetch(PDO::FETCH_ASSOC);

                                          ?>
                                            <tr>
                                             
                                                <td style="width:10px"><?php echo $value['id'];?></td>
                                                 <td style="width:5px"><?php echo $cust['name'];?></td>
                                                 <td style="width:5px"><?php echo $value['state_id'];?></td>
                                                <td style="width:10px"><?php echo $package['pname'];?></td>
                                             <td style="width:10px"><?php echo $value['no_of_adults'];?></td>
                                               <td style="width:10px"><?php echo $value['no_of_children'];?></td>
                                            <td style="width:10px"><?php echo $value['from_date'];?></td>
                                            <td style="width:10px"><?php echo $value['to_date'];?></td>
 <td style="width:5px"><?php echo $currency["curr_symbol"].' '.$value['total'];?></td>
 <td style="width:5px"><?php echo $currency["curr_symbol"].' '. $result6['amt'];?></td>
                      
        <td><a href="booking_details.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>

        <a href="update_booking.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></a>

       <a href="practice_pdf.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o" data-toggle="tooltip" title="Generate PDF"></i></a>  
       
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
 <?php echo "<script>
  setTimeout(\"location.href='booking_details.php'\", 2000);

</script>"?>
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
     <?php echo "<script>
  setTimeout(\"location.href='booking_details.php'\", 2000);

</script>"?>
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

  
