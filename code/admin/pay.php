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
                
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="operations/payment_operation.php" method="post">
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Booking Id<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control"  name="booking_id" value="<?php echo $result['id'];?>"required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Travellers Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control"  name=" name" value="<?php echo $travellers['name'];?>"required readonly>
                                            </div>
                                        </div>
                                           <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Grand Total <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                             <input type="text" class="form-control" onkeyup="calculate();"  name="total_amount" id="total_amount" value="<?php echo $result['total_amount'];?>" required readonly>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Paid Amount <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                         <input type="text" class="form-control"  onkeyup="calculate();" id="paid_amount"  name="paid_amount" value="<?php echo $result['adv_amount'];?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Pending Amount <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                         <input type="text" class="form-control" name="pending_amount" value="<?php echo $pending=$result['total_amount']-$result['adv_amount'];?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Insert Amount <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                 <input type="number" class="form-control"  name="insert_amount"  max="<?php echo $pending; ?>" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Payment Type <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select name="payment_type" class="form-control" required>
                                            <option value=""> Select Payment Type</option>
                                                    <?php
                                                    foreach ($payment1 as $value) { ?>
                                                    <option value="<?php echo $value['id']?>"><?php echo $value['payment_type']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                      
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Description <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                 <input type="text" class="form-control"  name="description" required>
                                            </div>
                                        </div>
                                          
                                       
                                            
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"footer.php"?>
          
 
            </script> 