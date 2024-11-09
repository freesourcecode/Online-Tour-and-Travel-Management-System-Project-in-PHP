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
      $stmt = $conn->prepare("select * from payment_type where id='".$_GET['id']."'"); 
      $stmt->execute();

      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $id=$row['id'];
       $payment_type=$row['payment_type'];    
    }

    
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Updated Successfully";
  header("location:../payment.php");
    }

$conn = null;
?>

        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Update Payment Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Update Payment</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
          <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                            <div class="card-body">
                            <form action="operations/payment.php?edit_id=<?php echo $id;?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Payment Type Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                          
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                         <div class="form-group">
                                                    <label class="control-label">Payment Type </label>
                                                     <input type="text" pattern= "[a-zA-Z][a-zA-Z ]+" class="form-control" value="<?php echo $payment_type;?>"  name="payment_type" placeholder="Enter a expense for..">
                                                    </div>
                                                    </div>
                                                   
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        

                                      
                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                        <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check" ></i>Update</button>
                                        <a href="payment_details.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
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