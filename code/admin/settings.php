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

   if(isset($_SESSION['id']))
    {
      $id=$_SESSION['id'];
      $stmt1 = $conn->prepare("select * from settings where id='".$_SESSION['id']."'"); 
      $stmt1->execute();

      $row1=$stmt1->fetch(PDO::FETCH_ASSOC);

       $stmt2 = $conn->prepare("select * from currency where id='".$_SESSION['id']."'"); 
      $stmt2->execute();

      $row2=$stmt2->fetch(PDO::FETCH_ASSOC);



       $id=$row1['id'];
      $title=$row1['title'];
       $f_image=$row1['f_image'];
        $logo_image=$row1['logo_image'];
         $login_image=$row1['login_image'];

         $currency=$row1['currency'];
         $footer=$row1['footer'];

         $stmt = $conn->prepare("SELECT * FROM currency group by curr_symbol "); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $currency1=$stmt->fetchAll();

         
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Settings Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                            <div class="card-body">
                            <form class="form-valide" action="operations/update_settings.php?id=<?php echo $id;?>" method="post"  enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Settings Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Title </label>
                                                     <input type="text" class="form-control" id="val-username" value="<?php echo $title;?>" name="title" placeholder="Enter the Title..">
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Fevicon Image </label>
                                                    <input type="file" class="form-control"  value="<?php echo $f_image;?>" name="f_image">
                                                <img src="../admin/settings/<?php echo $f_image;?>" width="150" height="150">
                                                 <input type="hidden" name="old_img" value="<?php echo $f_image;?>">
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        

                                      <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Logo Image </label>
                                                    <input type="file" class="form-control" value="<?php echo $logo_image;?>" name="logo_image">
                                                <img src="../admin/settings/<?php echo $logo_image;?>" width="150" height="150">
                                                 <input type="hidden" name="old_img1" value="<?php echo $logo_image;?>">
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Login Image</label>
                                                    <input type="file" class="form-control" value="<?php echo $login_image;?>" name="login_image">
                                                <img src="../admin/settings/<?php echo $login_image;?>" width="150" height="150">
                                                <input type="hidden" name="old_img2" value="<?php echo $login_image;?>">
                                                    </div>
                                            </div>
                                            
                                        </div>

                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Currency </label>
                                                    <select name="currency" class="form-control" required>
                                                    <option value=""> Select Currency</option>
                                                    <?php
                                                    foreach ($currency1 as $value) { ?>
                                                  <option value="<?php echo $value['id']?>" <?php if($value['id']==$currency){ echo "selected"; } ?>><?php echo $value['curr_symbol']; ?></option>
                                                <?php } ?>
                                                </select>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Footer</label>
                                                    <input type="text" class="form-control" id="val-username" value="<?php echo $footer;?>" name="footer">
                                                    </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                        <button type="submit" class="btn btn-success" name="update"> <i class="fa fa-check" ></i>Update</button>
                                        <a href="settings.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
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
  setTimeout(\"location.href='settings.php'\", 2000);

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
  setTimeout(\"location.href='settings.php'\", 2000);

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