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
    $stmt = $conn->prepare("SELECT * FROM expense_category"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $expense=$stmt->fetchAll();
    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Payment Type Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Payment Type</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                            <div class="card-body">
                             <form action="operations/payment.php" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Payment Type Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                          
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                     <div class="form-group">
                                                    <label class="control-label">Payment Type </label>
                                                     <input type="text" pattern= "[a-zA-Z][a-zA-Z ]+" class="form-control" name="payment_type" placeholder="Enter  Payment Type..">
                                                    </div>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        

                                      
                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                        <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check" ></i> Save</button>
                                        <a href="add_payment_type.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
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