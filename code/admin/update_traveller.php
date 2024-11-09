
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
      $stmt = $conn->prepare("select * from travellers where id='".$_GET['id']."'");
      $stmt->execute();

      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $id=$row['id'];
      $name=$row['name'];
      $email=$row['email'];
      $password=$row['password'];
      $confirm=$row['confirm'];
      $state_id=$row['state_name'];
      $mobile=$row['mobile'];
      $address=$row['address'];
      $photo=$row['photo'];


    $stmt9 = $conn->prepare("SELECT * FROM travellers group by state_name"); 
    $stmt9->execute();

    $result9 = $stmt9->setFetchMode(PDO::FETCH_ASSOC); 
    $state=$stmt9->fetchAll();

          
    }

    
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Added Successfully";
  header("location:../traveller_details.php");
    }

$conn = null;
?>


        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Update Traveller Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Update Traveller</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
           <div class="container-fluid">
                
                <div class="row">
                      <div class="col-lg-12">
                        <div class="card card-outline-primary">
                           
                            <div class="card-body">
                             
                                    <form action="operations/travellers.php?edit_id=<?php echo $id;?>" method="post" enctype="multipart/form-data" >
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Person Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                   <input type="text" class="form-control"  value="<?php echo $name;?>" name="val-username" pattern= "[a-zA-Z][a-zA-Z ]+" placeholder="Enter a username.." required>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Email</label>
                                                     <input type="text" class="form-control"  value="<?php echo $email; ?>" name="val-email" placeholder="Your valid email.." required>
                                                     </div>
                                            </div>
                                            
                                        </div>
                                        

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password </label>
                                                  <input type="password" id="txtPassword" class="form-control"  name="val-password" value="" placeholder="In case to change password">
                                                   <input type="hidden" name="old_pass" value="<?php echo $password; ?>">
                                                    </div>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Confirm Password </label>
                                                     <input type="password" id="txtConfirmPassword" class="form-control" name="val-confirm-password" placeholder="..and confirm it!">
                                                     </div>
                                            </div>
                                            
                                        </div>

                                      <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                       <select name="state_name" class="form-control" required>
                                                    <option value=""> Select State</option>
                                                    
<option value="Maharashtra" <?php if($row['state_name']=="Maharashtra"){echo "selected";}?>>Maharashtra</option>
 <option value="Gujrat"<?php if($row['state_name']=="Gujrat"){echo "selected";}?>>Gujrat</option>
<option value="Delhi" <?php if($row['state_name']=="Delhi"){echo "selected";}?>>Delhi</option>
 <option value="Bihar" <?php if($row['state_name']=="Bihar"){echo "selected";}?>>Bihar</option>
 <option value="Goa" <?php if($row['state_name']=="Goa"){echo "selected";}?>>Goa</option>
 <option value="Punjab" <?php if($row['state_name']=="Punjab"){echo "selected";}?>>Punjab</option>
<option value="Assam" <?php if($row['state_name']=="Assam"){echo "selected";}?>>Assam</option>
<option value="Sikkim" <?php if($row['state_name']=="Sikkim"){echo "selected";}?>>Sikkim</option>
                                                </select>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Mobile </label>
                                                     <input type="tel" class="form-control"  value="<?php echo $mobile; ?>" name="val-digits" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$" maxlength="10"  placeholder="Enter Your Mobile No.." required>
                                                     </div>
                                            </div>
                                            
                                        </div>
                                       
                                        
                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address </label>
                                                     <textarea class="form-control"  name="val-suggestions" rows="5" placeholder="Enter Your Address" required><?php echo $address; ?></textarea>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Photo</label>
                                                   <input type="file" class="form-control"  name="photo">
                                               <img src="../admin/img/<?php echo $photo;?>" width="150" height="150">
                                                <input type="hidden" name="old_img" value="<?php echo $photo;?>">
                                                     </div>
                                            </div>
                                            
                                        </div>
                                      
                                        
                                       
                                        
                                       
                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                    <button type="submit" class="btn btn-success" name="update" id="btnSubmit"> <i class="fa fa-check" ></i> Update</button>
                                        <a href="traveller_details.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                
 </div>
</div>
</div>
            
        <div class="popup popup--icon -error js_error-popup" id="show_error">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Password and Confirm Password do no match</p>
    <p>
    
     <button class="button button--error" data-for="js_error-popup">Close</button>
    
    </p>
  </div>
</div>
                   
          <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"footer.php"?>


          


     <script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {

                 $('#show_error').addClass('popup--visible');
                return false;
            }
            else{
            return true;
        }
        });
    });




    var addButtonTrigger = function addButtonTrigger(el) {
el.addEventListener('click', function () {
var popupEl = document.querySelector('.' + el.dataset.for);
popupEl.classList.toggle('popup--visible');
});
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
</script>