<?php /*session_start();
 include('config.php');
    if(!isset($_SESSION["email"])){
    ?>
    <script>
    window.location="page-login.php";
    </script>
    <?php
    
} else {*/ 

 
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
    <title>Tours and Travel Management</title>
    
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
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
        
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        
                       
                        
                        
                        <span><img src="images/ab.png" style="height:110px; width: 150px" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                
                <div class="navbar-collapse">
                    
                    <ul class="navbar-nav mr-auto mt-md-0">
                        
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                       
                    </ul>
                    
                    <ul class="navbar-nav my-lg-0">

                     
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../user/profile/<?php echo $_SESSION['photo']; ?>" width="40px" height="40px">
                                
                                <?php
     $folder="../user/profile/";

    /* if(is_dir($folder))
     {
        if($open=opendir($folder))

            while(($photo=readdir($open)) !=false)
            {
                if($photo=='.'|| $photo=="..") continue;

                echo '<img src="../user/profile/'.$_SESSION['photo'].'" width="50" height="60">';
            }
             closedir($open);
     }*/

?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                        <li><a href="update_profile.php"><i class="ti-user"></i> Profile</a></li>
                        <li><a href="change_password.php"><i class="ti-wallet"></i> Change Password</a></li>
                                 
                                   
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>
        
