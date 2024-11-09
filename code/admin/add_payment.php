<?php
require_once('check_login.php');
?>
<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"sidebar.php"?>
<?php
include"config.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['id']))
    {
    $stmt = $conn->prepare("SELECT * FROM booking where id='".$_GET['id']."'"); 
    


    $stmt->execute();

      $result=$stmt->fetch(PDO::FETCH_ASSOC);



     
  
 $stmt1 = $conn->prepare("SELECT * FROM travellers where id='".$result['traveller_id']."'"); 
    $stmt1->execute();

     $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 

    $travellers=$stmt1->fetch(PDO::FETCH_ASSOC);
    
   
    $stmt2 = $conn->prepare("SELECT * FROM payment_type group by payment_type"); 
    $stmt2->execute();

    $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC); 
    $payment1=$stmt2->fetchAll();
    
     $stmt6 = $conn->prepare("SELECT SUM(insert_amount) as amt from payment where booking_id='".$result['id']."'"); 
                 $stmt6->execute();

                $result6=$stmt6->fetch(PDO::FETCH_ASSOC);



     $stmt3 = $conn->prepare("SELECT * FROM payment where booking_id='".$result['id']."'");
$stmt3->execute();

 $xyz = $stmt3->setFetchMode(PDO::FETCH_ASSOC);



      $payment=$stmt3->fetch(PDO::FETCH_ASSOC);
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Payment</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Payment</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                            <div class="card-body">
                              <form action="operations/payment_operation.php" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Payment Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Booking Id</label>
                                             <input type="text" class="form-control"  name="booking_id" value="<?php echo $result['id'];?>"required readonly>
                                                    </div>
                                            </div>

                                                  <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Due Date </label>
                                                      <input type="date" class="form-control" name="due_date"  required>
                                                    </div>
                                            </div>

                                        

                                        
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Grand Total</label>
                                                     <input type="text" class="form-control" onkeyup="calculate();"  name="total_amount" id="total_amount" value="<?php echo $result['total'];?>" required readonly>
                                                     </div>
                                            </div>

                                          
                                            
                                        </div>
                                        

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Paid Amount </label>
                                                      <input type="text" class="form-control"  onkeyup="calculate();" id="paid_amount"  name="paid_amount" value="<?php echo $result6['amt'];?>" required readonly>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Pending Amount</label>
                                                   <input type="text" class="form-control" name="pending_amount" value="<?php echo $pending=$result['total']-$result6['amt'];?>" required readonly>
                                                     </div>
                                            </div>
                                            
                                        </div>

                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Insert Amount </label>
                                                      <input type="number" class="form-control"  name="insert_amount"  max="<?php echo $pending; ?>" required>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Payment Type</label>
                                                  <select name="payment_type" class="form-control" required>
                                            <option value="">Select Payment Type</option>
                                                    <?php
                                                    foreach($payment1 as $value) { ?>
                                                    <option value="<?php echo $value['id']?>"><?php echo $value['payment_type']; ?></option>
                                                <?php } ?>
                                                </select>
                                                     </div>
                                            </div>
                                            

                                             
                                        </div>
                                     
                                       
                                        
                                      
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                        <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check" ></i> Save</button>
                                        <a href="add_payment.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                
 </div>
</div>
</div>
            
            <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"footer.php"?>
          
 
            </script> 