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
                    <h3 class="text-primary">Add Traveller Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Travellers</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                

                <div class="row justify-content-center">

                    <div class="col-lg-6">
                      

                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="operations/travellers.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" id="val-email" name="val-email" placeholder="Your valid email..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Choose a safe one..">
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="..and confirm it!">
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">State Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select name="state_name" class="form-control" data-toggle="dropdown" required>
                                                    <option value=""> Select State</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Gujrat">Gujrat</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Bihar">Bihar</option>
                                             <option value="Haryana">Haryana</option>
                                             <option value="Sikkim">Sikkim</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Assam">Assam</option>
                                                </select>
                                            </div>
                                        </div>
                                       </div>
                                      
            
                            
                        
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Mobile <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="val-digits" placeholder="Enter Your Mobile No." maxlength="10" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-suggestions">Address<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="Enter Your Address"></textarea>
                                            </div>
                                        </div>
                                       
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Photo <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" name="photo" required="">
                                            </div>
                                        </div>
                                       
                                         

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                   
                </div>
                </div>
                
            </div>
            
            <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"footer.php"?>
