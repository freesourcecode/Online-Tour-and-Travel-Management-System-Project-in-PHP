<?php
require_once('check_login.php');
?>
<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"sidebar.php"?>
  <?php

 include('config.php');
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if(isset($_GET['id']))
    {
      $id=$_GET['id'];

     $stmt1 = $conn->prepare("SELECT * FROM booking where id='".$_GET['id']."'"); 
     $stmt1->execute();
     $row=$stmt1->fetch(PDO::FETCH_ASSOC);

       $id=$row['id'];
        $state_id=$row['state_id'];
       $traveller_id=$row['traveller_id'];

        $package_id=$row['package_id'];
        $no_of_adults=$row['no_of_adults'];
         $no_of_children=$row['no_of_children'];
           $total_amount=$row['total_amount'];
            $tax=$row['tax'];
             $adv_amount=$row['adv_amount'];
             $total=$row['total'];
           $from_date=$row['from_date'];
            $to_date=$row['to_date'];








    $stmt_sel = $conn->prepare("SELECT * FROM travellers where id='$traveller_id'"); 
    $stmt_sel->execute();
     $row1=$stmt_sel->fetch(PDO::FETCH_ASSOC);

   
    $result_sel = $stmt_sel->setFetchMode(PDO::FETCH_ASSOC); 
    $expense_sel=$stmt_sel->fetchAll();


     $stmt = $conn->prepare("SELECT * FROM travellers"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $travellers=$stmt->fetchAll();


  
  $stmt11 = $conn->prepare("SELECT * FROM packages where id='$package_id'"); 
    $stmt11->execute();

    $result11= $stmt11->setFetchMode(PDO::FETCH_ASSOC);

    $success=$stmt11->fetchAll();



     $stmt1 = $conn->prepare("SELECT * FROM packages"); 
    $stmt1->execute();

    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
    $packages=$stmt1->fetchAll();


                   
                                             
     $stmt6 = $conn->prepare("SELECT SUM(insert_amount) as amt from payment where booking_id='".$row['id']."'"); 

                 $stmt6->execute();
                $result6=$stmt6->fetch(PDO::FETCH_ASSOC);
         
   
    }

    
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Added Successfully";
  header("location:../booking.php");
    }

$conn = null;
?>
        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Update Booking Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Booking</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12">
                
                  <div class="card card-outline-primary">
                       <div class="card-body">
                             <form action="operations/booking.php?edit_id=<?php echo $id;?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Booking Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Traveller Name</label>
                                                    <select name="traveller_id" class="form-control" required>

                                                   <?php
                                                    foreach ($travellers as $value) { ?>
                                                    <option value="<?php echo $value['id']?>" <?php if($value['id']==$traveller_id){ echo "selected"; } ?>><?php echo $value['name']; ?></option>
                                                <?php } ?>
                                                   
                                                </select>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">State</label>
                                                     <select name="state_id" class="form-control" required>
                                                    <option value=""> Select State</option>
                                                    
<option value="Maharashtra" <?php if($row['state_id']=="Maharashtra"){echo "selected";}?>>Maharashtra</option>
 <option value="Gujrat" <?php if($row['state_id']=="Gujrat"){echo "selected";}?>>Gujrat</option>
<option value="Delhi" <?php if($row['state_id']=="Delhi"){echo "selected";}?>>Delhi</option>
 <option value="Bihar" <?php if($row['state_id']=="Bihar"){echo "selected";}?>>Bihar</option>
 <option value="Goa" <?php if($row['state_id']=="Goa"){echo "selected";}?>>Goa</option>
 <option value="Punjab" <?php if($row['state_id']=="Punjab"){echo "selected";}?>>Punjab</option>
<option value="Assam" <?php if($row['state_id']=="Assam"){echo "selected";}?>>Assam</option>
<option value="Sikkim" <?php if($row['state_id']=="Sikkim"){echo "selected";}?>>Sikkim</option>
                                                </select>
                                             
                                                     </div>
                                            </div>
                                            
                                        </div>
                                        

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Package Name </label>
                                                      <select name="package_id" id="package_id" onchange="calculate();" class="form-control" required>
                                                    <?php
                                                   foreach ($packages as $value1) { ?>
                                                    <option value="<?php echo $value1['id'].','.$value1['price_adult'].','.$value1['price_children']?>"
                                                     <?php if($value1['id']==$package_id){ echo "selected"; } ?>><?php echo $value1['pname']; ?></option>
                                                <?php } ?>
                                               
                                                </select>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">No Of Adults</label>
                                                    <input type="number" min="0" onchange="calculate();" onkeyup="calculate();" class="form-control" id="no_of_adults" name="no_of_adults" value="<?php echo $no_of_adults;?>" placeholder="Enter no of adults.." required>
                                                     </div>
                                            </div>
                                            
                                        </div>

                                      <div class="row">
                                           <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">No Of Children</label>
                                                    <input type="number" min="0" onchange="calculate();" onkeyup="calculate();" class="form-control" id="no_of_children" name="no_of_children" value="<?php echo $no_of_children;?>" placeholder="Enter No of Children.." required>
                                            </div>
                                        </div>

                                           <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">From Date</label>
                                                  <input type="date" onchange="calculate();" onkeyup="calculate();" class="form-control" id="from_date" name="from_date" value="<?php echo $from_date;?>" placeholder="From Date" required>
                                            </div>
                                        </div>
                                           
                                            
                                        <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">To Date</label>
                                                  <input type="date" onchange="calculate();" onkeyup="calculate();" class="form-control" id="to_date" name="to_date" value="<?php echo $to_date;?>" placeholder="To Date" required>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Total Amount</label>
                                                    <input type="text" class="form-control" id="total_amount" value="<?php echo $total_amount;?>" name="total_amount" placeholder="Enter Total Amount.." required readonly>
                                            </div>
                                        </div>
                                            
                                        </div>
                                       
                                        
                                         <div class="row p-t-20">
                                          <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Tax</label>
                                                     <input type="text" class="form-control" id="taxprice1" value="<?php echo $tax;?>" name="tax" onkeyup="sum2()" placeholder="Enter Total Amount.." required>
                                            </div>
                                        </div>

                                           <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Total</label>
                                                   <input type="text" class="form-control" id="ttt2" name="total" value="<?php echo $total;?>" placeholder="Enter Total Amount.." required readonly>
                                            </div>
                                        </div>
                                            
                                          
                                            
                                        </div>
                                      
                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                      <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check" ></i> Update</button>
                                        <a href="booking_details.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
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
            <script>

                function calculate() {
                
                    var package =$('#package_id').val();
                    var details= package.split(",");
                    var p_id=details[0];
                    var price_adult=details[1];
                    var price_children=details[2];
if($("#from_date").val()!="" && $("#to_date").val()!=""){
 
var From_date = new Date($("#from_date").val());
var To_date = new Date($("#to_date").val());
var diff_date =  To_date - From_date;
var years = Math.floor(diff_date/31536000000);
var months = Math.floor((diff_date % 31536000000)/2628000000);
var days = Math.floor(((diff_date % 31536000000) % 2628000000)/86400000);
}
else
{
    var days=0;
}

                    if($('#no_of_children').val()!='')
                    {
                        var no_of_children=$('#no_of_children').val();
                    }
                    else
                    {
                        var no_of_children=0;
                    }
                    if($('#no_of_adults').val()!='')
                    {
                        var no_of_adults=$('#no_of_adults').val();
                    }
                    else
                    {
                        var no_of_adults=0;
                    }
                    var total=(parseInt(price_adult)* parseInt(no_of_adults))+(parseInt(price_children)*parseInt(no_of_children));
                    var total_amount=total*days;
                    $('#total_amount').val(total_amount);
                    $('#advance_amount').attr('max',total_amount);
                     sum2();
                }

     function sum2()
    {
      var total1=parseInt(document.getElementById('total_amount').value);
      var tx=parseInt(document.getElementById('taxprice1').value);
      var total2=(parseInt(total1)*(parseFloat(tx)/100))+parseInt(total1);
      document.getElementById('ttt2').value=total2;
       $('#advance_amount').attr('max',total2);
    }
 
            </script>
