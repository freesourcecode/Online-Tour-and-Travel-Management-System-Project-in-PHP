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
  if(isset($_SESSION['id']))
    {
      $id=$_SESSION['id'];
      $stmt = $conn->prepare("select * from admin where id='".$_SESSION['id']."'"); 
      $stmt->execute();

      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $id=$row['id'];
      $fname=$row['fname'];
      $lname=$row['lname'];
      $email=$row['email'];
      $contact=$row['contact'];
      $file=$row['file'];      
    }

    
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();

  header("location:../update_profile.php");
    }

$conn = null;
?>
?>

<!DOCTYPE html>
<html lang="en">



<div class="page-wrapper">
 <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Update Profile</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Update Profile</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
    <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                            <div class="card-body">
                              <form method="post" action="operations/admin.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Update Profile</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                             <label class="control-label">First name</label>
                                             <input type="text" value="<?php echo $fname;?>" name="fname" class="form-control">
                                                    </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Last name</label>
                                                      <input type="text" name="lname" value="<?php echo $lname;?>" class="form-control">
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        

                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Email address</label>
                                                        <input type="email" name="email" value="<?php echo $email;?>" class="form-control">
                                                    </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Contact</label>
                                                       <input type="text" name="contact" value="<?php echo $contact;?>" class="form-control">
                                                    </div>
                                            </div>
                                            
                                        </div>

                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                  <label class="control-label">Image</label>
                                                        <input type="file" name="file" class="form-control">
                                        <img src="../admin/upload/<?php echo $file;?>" width="150" height="150">
                                         <input type="hidden" name="old_img" value="<?php echo $file;?>">
                                                    </div>
                                            </div>
                                            
                                           
                                            
                                        </div>

                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                        <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check"></i> Update</button>
                                        <a href="update_profile.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                
 </div>
</div>
</div>
</body>
           
</html>

<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"footer.php"?>



<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
       <?php echo "<script>
  setTimeout(\"location.href='update_profile.php'\", 2000);

</script>"?>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
     <?php echo "<script>
  setTimeout(\"location.href='update_profile.php'\", 2000);

</script>"?>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
 <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
