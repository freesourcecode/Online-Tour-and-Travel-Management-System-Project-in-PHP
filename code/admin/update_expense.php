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
      /*$stmt = $conn->prepare("SELECT * FROM expense_category"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $expense=$stmt->fetchAll();*/

 


      $id=$_GET['id'];
      $stmt = $conn->prepare("select * from expense where id='".$_GET['id']."'"); 
      $stmt->execute();

      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $id=$row['id'];
       $expense_for=$row['expense_for'];
       $expense_id=$row['expense_name'];

        $amount=$row['amount'];

        $stmt_sel = $conn->prepare("SELECT * FROM expense_category where id='$expense_id'"); 
    $stmt_sel->execute();

    $result_sel = $stmt_sel->setFetchMode(PDO::FETCH_ASSOC); 
    $expense_sel=$stmt_sel->fetchAll();


    $stmt = $conn->prepare("SELECT * FROM expense_category"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $expense=$stmt->fetchAll();
         
    }

    
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Updated Successfully";
  header("location:../expense_details.php");
    }

$conn = null;
?>

        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Update Expense Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Update Expense Details</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
           <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                            <div class="card-body">
                             <form action="operations/expense.php?edit_id=<?php echo $id;?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Expense Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Expense For </label>
                                                     <input type="text" class="form-control" pattern= "[a-zA-Z][a-zA-Z ]+" name="expense_for" value="<?php echo $expense_for;?>" placeholder="Enter a expense for.."required>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Expense Category </label>
                                                     <select name="expense_name" class="form-control" required>
                                        
                  <?php
foreach ($expense_sel as $value_sel) { ?>
<option value="<?php echo $value_sel['id']?>"><?php echo $value_sel['expense_name']; $expense_sel = $value_sel['expense_name']; ?></option>

                                              <?php
                                                    foreach ($expense as $value) { 
                                                      if($expense_sel != $value['expense_name'])
                                                        {?>
                                                    <option value="<?php echo $value['id']?>"><?php echo $value['expense_name']; ?></option>
                                                <?php 
                                                    }
                                                    } ?>
                 <?php } ?>
                                                </select>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        

                                        <div class="row p-t-20">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Amount</label>
                                                <input type="number" value="<?php echo $amount;?>" class="form-control" id="val-username" name="amount" placeholder="Amount.." required>
                                                    </div>
                                            </div>
                                            
                                          
                                        </div>

                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                       <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check" ></i> Update</button>
                                        <a href="expense_details.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
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