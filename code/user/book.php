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

       $stmt = $conn->prepare("SELECT * FROM booking"); 
     $stmt->execute();



     $result1=$stmt->fetch(PDO::FETCH_ASSOC);
     $data1=$stmt->fetchAll();

      $stmt = $conn->prepare("SELECT * FROM travellers"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $travellers=$stmt->fetchAll();


     $stmt1 = $conn->prepare("SELECT * FROM packages"); 
    $stmt1->execute();

    $result11 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 
    $packages=$stmt1->fetchAll();
    $success = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
    
      $id=$result1['id'];
       $traveller_id=$result1['traveller_id'];
        $state_id=$result1['state_id'];
        $package_id=$result1['package_id'];
        $no_of_adults=$result1['no_of_adults'];
         $no_of_children=$result1['no_of_children'];
         
           $total_amount=$result1['total_amount'];
           $from_date=$result1['from_date'];
            $to_date=$result1['to_date'];

         
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Update Booking</a></li>
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
                                    <form class="form-valide" action="user_operations/booking.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Travellers Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select name="traveller_id" class="form-control" required>
                                                    <option value=""> Select Traveller</option>
                                                    <?php
                                                    foreach ($travellers as $value) { ?>
                                                    <option value="<?php echo $value['id']?>"><?php echo $value['name']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">State<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select name="state_id" onchange="tax();" class="form-control" required>
                                                    <option value="">Select State</option>
                                                    <?php
                                                    foreach ($travellers as $value) { ?>
                                                   <option value="<?php echo $value['id'].','.$value['state_name']?>"><?php echo $value['state_name']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Package Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select name="package_id" id="package_id" onchange="calculate();" class="form-control" required>
                                                    <option value=""> Select Packages</option>
                                                    <?php
                                                    foreach ($packages as $value) { ?>
                                                    <option value="<?php echo $value['id'].','.$value['price_adult'].','.$value['price_children']?>"><?php echo $value['pname']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">No Of Adults <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" min="0" onchange="calculate();" onkeyup="calculate();" class="form-control" id="no_of_adults" name="no_of_adults" value="<?php echo $no_of_adults;?>" placeholder="Enter no of adults.." required>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">No Of Children <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" min="0" onchange="calculate();" onkeyup="calculate();" class="form-control" id="no_of_children" name="no_of_children" value="<?php echo $no_of_children;?>" placeholder="Enter No of Children.." required>
                                            </div>
                                        </div>
                                        
                                      
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">From Date<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" onchange="calculate();" onkeyup="calculate();" class="form-control" id="from_date" value="<?php echo $from_date;?>" name="from_date" placeholder="From Date" required>
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">To Date<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" onchange="calculate();" onkeyup="calculate();" class="form-control" id="to_date" value="<?php echo $to_date;?>" name="to_date" placeholder="To Date" required>
                                            </div>
                                        </div> 
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Total Amount <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="total_amount" value="<?php echo $total_amount;?>" name="total_amount" placeholder="Enter Total Amount.." required readonly>
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Advance Amount<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="advance_amount" value="<?php echo $adv_amount;?>" min="0" name="adv_amount" placeholder="Enter Advance Amount.." required>
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

                }
 
            </script>