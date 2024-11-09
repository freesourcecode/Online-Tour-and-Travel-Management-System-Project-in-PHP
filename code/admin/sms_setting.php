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
      $stmt = $conn->prepare("select * from sms_setting where id='1'"); 
      $stmt->execute();

      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $id=$row['id'];
    $uname=$row['uname'];
    $password=$row['password'];
    $sender_id=$row['sender_id'];
    
    if(isset($_POST['update']))
         
    {
  
        $sql = "UPDATE sms_setting SET uname='".$_POST['uname']."',
    password='".$_POST['password']."',
    sender_id='".$_POST['sender_id']."'
   
     WHERE id='1'";


    $stmt = $conn->prepare($sql);


    $stmt->execute();
    $_SESSION['success']=' Record Updated Successfully......';
        header("location:sms_setting.php");
    } 

    
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
     $_SESSION['reply'] = "Updated Successfully";
  header("location:../sms_setting.php");
    }

$conn = null;
?>
?>
 <div class="page-wrapper">
 <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add SMS Settings</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">SMS Settings</a></li>
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
                                        <h3 class="card-title m-t-15">SMS Settings</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Name</label>
                                                       <input type="text" value="<?php echo $uname;?>" name="uname" class="form-control">
                                                    </div>
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Password</label>
                                                       <input type="password" name="password" value="<?php echo $password;?>" class="form-control">
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        

                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label">Sender Id</label>
                                                        <input type="text" name="sender_id" value="<?php echo $sender_id;?>" class="form-control">
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
  setTimeout(\"location.href='sms_setting.php'\", 2000);

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
  setTimeout(\"location.href='sms_setting.php'\", 2000);

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