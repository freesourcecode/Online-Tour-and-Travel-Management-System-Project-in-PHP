<?php
require_once('check_login.php');
?>
<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"sidebar.php"?>
        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Expense Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Expense Details</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if (isset($_SESSION['reply'])) { ?>
                                
   <?php unset($_SESSION['reply']);
}
  ?>
                               
                               <a href="add_expense_category.php"><button type="button" class="btn btn-primary">Add Expense Category</button></a>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>  
                                                <th>Expense Name</th>
                                                <th>Status</th>
                                                 <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>Id</th>  
                                                <th>Expense Name</th>
                                                <th>Status</th>
                                                 <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM expense order by id"); 
    $stmt->execute();


    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $data=$stmt->fetchAll();


    
    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


                                              
        foreach ($data as $value) {
 $stmt1 = $conn->prepare("SELECT * FROM expense_category WHERE id='".$value['expense_name']."'"); 
    $stmt1->execute();


    $result1 = $stmt1->setFetchMode(PDO::FETCH_ASSOC); 

    $expense=$stmt1->fetch(PDO::FETCH_ASSOC);
                                                  ?>
                                            <tr>
                                               <td><?php echo $value['id'];?></td>
                                             <td><?php echo $value['expense_for'];?></td>
                                            <td><?php echo $expense['expense_name'];?></td>
                                               <td><?php echo $value['amount'];?></td>
                                               <td><?php echo $value['created_date'];?></td>
                                                <td><?php echo $expense['status'];?></td>
        <td>
            <a href="operations/expense_category.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash" ></i></a>

        <a href="update_expense_category.php?id=<?php echo $value['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a><br>
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
            
         <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"footer.php"?>