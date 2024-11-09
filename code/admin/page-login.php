<?php session_start();?>
   <?php

  include('config.php');
  function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
 
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
     $stmt = $conn->prepare("select * from settings"); 
      $stmt->execute();

      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $id=$row['id'];
      $title=$row['title'];
       $f_image=$row['f_image'];
        $logo_image=$row['logo_image'];
        $login_image=$row['login_image'];
    if(isset($_POST['btn_login']))
{
$unm = $_POST['email'];


$passw = hash('sha256', $_POST['password']);



$salt = createSalt();
$pass = hash('sha256', $salt . $passw);

    $a=$conn->prepare("SELECT * FROM settings"); 
      $a->execute();
      $result=$a->fetch(PDO::FETCH_ASSOC);

   
  $stmt1 = $conn->prepare("SELECT * FROM currency where id='".$result['currency']."'");

 $stmt1->execute();


     $currency=$stmt1->fetch(PDO::FETCH_ASSOC);
     

  
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email='" .$_POST['email'] . "' and password = '". $pass."'"); 
      $stmt->execute();


      $row=$stmt->fetch(PDO::FETCH_ASSOC);
     $_SESSION["id"] = $row['id'];
     $_SESSION["currency"] = $currency['curr_symbol'];
     $_SESSION["email"] = $row['email'];
     $_SESSION["file"] = $row['file'];
     $_SESSION["password"] = $row['password'];
     if(isset($_SESSION["email"]) && isset($_SESSION["password"])) {
    {      
        ?>

      
          <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p>Login Successfully</p> 
    <p>
     
     <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
    </p>
   </div>
</div> 
   
     <?php
    }
}
else {?>
     <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Invalid Email or Password</p>
    <p>
       <?php echo "<script>setTimeout(\"location.href = 'page-login.php';\",2000);</script>"; ?>
     
    </p>
  </div>
</div>
       
        <?php

         }
    
    }
}
catch(PDOException $e)
    {



    echo "Error: " . $e->getMessage();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Tours and Travels Management System</title>
    
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/popup_style.css">
    
    
    
</head>

<body class="fix-header fix-sidebar">
    
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
              
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                             <center> <img src="../admin/settings/<?php echo $login_image; ?>" style="height:auto; width: 190px;" alt="homepage" class="dark-logo" />
</center>
                              <br><br><br><br>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="checkbox">
                                        <label>
        										<input type="checkbox"> Remember Me
        									</label>
                                        <label class="pull-right">
        										<a href="forget_password.php">Forgotten Password?</a>
        									</label>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="btn_login" data-toggle="modal" data-target="#myModal">Sign in</button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    
    <script src="js/lib/jquery/jquery.min.js"></script>
    
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="js/jquery.slimscroll.js"></script>
    
    <script src="js/sidebarmenu.js"></script>
    
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    
    <script src="js/custom.min.js"></script>

</body>

</html>
