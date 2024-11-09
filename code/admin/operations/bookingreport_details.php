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
                    <h3 class="text-primary">Add Tax Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tax Details</a></li>
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
                                if (isset($_SESSION['reply'])) { 
                                print '<div class="alert alert-success mb-2" role="alert">'.$_SESSION['reply'].'</div>';
                                unset($_SESSION['reply']);
                            }
                                ?>
                               
                               <a href="add_taxdetails.php"><button type="button" class="btn btn-primary">Add Tax Details</button></a>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Package Name</th>
                                                <th>No. Of Bookings</th>
                                                <th>Total Revenue Generated</th>
                                                <th>Pending Revenue Generated</th>
                                                 <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Package Name</th>
                                                <th>No. Of Bookings</th>
                                                <th>Total Revenue Generated</th>
                                                <th>Pending Revenue Generated</th>
                                                 <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

<?php
include"config.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, pname FROM packages GROUP BY packages;"); 
    $stmt->execute();


    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $data=$stmt->fetchAll();
    
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

                                                 foreach ($data as $value) { ?>
                                            <tr>
                                                <td><?php echo $value['id'];?></td>
                                                 <td><?php echo $value['pname'];?></td>
                                               
                                             
        <td><a href="operations/tax.php?id=<?php echo $value['id']; ?>"><button class="btn btn-danger">Delete</button></a>
        <a href="update_tax.php?id=<?php echo $value['id']; ?>"><button  class="btn btn-info">Update</button></a></td>   
                                                
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