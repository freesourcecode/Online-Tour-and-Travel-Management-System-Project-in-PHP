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
                                <h4>Admin</h4>
                                <form method="post" action="operations/admin.php">
                                     <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" name="fname" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" name="lname" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Contact</label>
                                        <input type="text" name="contact" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Image</label>
                                        <input type="text" name="image" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Created Date</label>
                                        <input type="text" name="cdate" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Group Id</label>
                                        <input type="text" name="group_id" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Total Amount</label>
                                        <input type="text" name="total_amount" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label>Delete Status</label>
                                        <input type="text" name="delete_status" class="form-control" >
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="btn_login">Submit</button>
                                   
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