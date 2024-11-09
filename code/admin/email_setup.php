<?php
require_once('check_login.php');
?>
<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"sidebar.php"?>
<?php include"config.php"?>
<?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $id=$_SESSION['id'];
      $stmt = $conn->prepare("select * from email_setup where id='1'"); 
      $stmt->execute();

      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $id=$row['id'];
    $name=$row['name'];
    $mail_driver_host=$row['mail_driver_host'];
    $mail_port=$row['mail_port'];
    $mail_username=$row['mail_username'];
    $mail_password=$row['mail_password'];   
    if(isset($_POST['update']))
         
    {
  
        $sql = "UPDATE email_setup SET name='".$_POST['name']."',
    mail_driver_host='".$_POST['mail_driver_host']."',
    mail_port='".$_POST['mail_port']."',
    mail_username='".$_POST['mail_username']."',
    mail_password='".$_POST['mail_password']."'
     WHERE id='1'";


    $stmt = $conn->prepare($sql);


    $stmt->execute();
    $_SESSION['success']=' Record Updated Successfully......';
        header("location:email_setup.php");
    } 

    
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Updated Successfully";
  header("location:../update_profile.php");
    }

$conn = null;
?>
?>
 <div class="page-wrapper">
 <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Email Settings</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Email Settings</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
    <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                            <div class="card-body">
                              <form method="post">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Email Settings</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Name</label>
                                                       <input type="text" value="<?php echo $name;?>" name="name" class="form-control">
                                                    </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Mail_Driver_Host</label>
                                                       <input type="text" name="mail_driver_host" value="<?php echo $mail_driver_host;?>" class="form-control">
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        

                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Mail_Port</label>
                                                        <input type="text" name="mail_port" value="<?php echo $mail_port;?>" class="form-control">
                                                    </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Mail_Username</label>
                                                       <input type="email" name="mail_username" value="<?php echo $mail_username;?>" class="form-control">
                                                    </div>
                                            </div>
                                            
                                        </div>

                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Mail_Password</label>
                                                        <input type="password" name="mail_password" value="<?php echo $mail_password;?>" class="form-control">
                                                    </div>
                                            </div>
                                            
                                           
                                            
                                        </div>

                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                        <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check" ></i> Update</button>
                                        <a href="email_setup.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
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
  setTimeout(\"location.href='email_setup.php'\", 2000);

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
  setTimeout(\"location.href='email_setup.php'\", 2000);

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