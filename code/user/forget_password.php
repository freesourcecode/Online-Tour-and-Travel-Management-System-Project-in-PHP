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
  
    if(isset($_POST['send_email']))
{
$unm = $_POST['email'];
$pass = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);
$otp1 = hash('sha256', $pass);
$salt = createSalt();
$otp_pass =  hash('sha256', $salt . $otp1);  
$stmt1 = $conn->prepare("SELECT * FROM travellers where email ='".$unm."'"); 
      $stmt1->execute();
      $res=$stmt1->fetch(PDO::FETCH_ASSOC);
$realemail=$res['email'];   
  
if($unm == $realemail){
$sql = "UPDATE travellers SET 
    password='".$otp_pass."'
     WHERE email='".$_POST['email']."'";


    $stmt2 = $conn->prepare($sql);


    $stmt2->execute();

    $stmt = $conn->prepare("SELECT * FROM email_setup"); 
      $stmt->execute();
      

      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $mail_host = $row['mail_driver_host'];
$mail_name = $row['name'];
$mail_username = $row['mail_username'];
$mail_password = $row['mail_password'];
$mail_port = $row['mail_port'];

     require_once('PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->isSMTP();   





$mail->SMTPSecure = 'tls';

$mail->setFrom($mail_username, $mail_name);


$mail->Subject = 'Forget Password';
$mail->Body    = "Hello, Your New Password is :'".$pass."' ";

if ($mail->send()) {     
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
else { ?>
     <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Invalid Email</p>
    <p>
      <a href="forget_password.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
    </p>
  </div>
</div>
       
        <?php

         }
    
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();


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
                                <h4>Forget password</h4>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="send_email">Send</button>
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
