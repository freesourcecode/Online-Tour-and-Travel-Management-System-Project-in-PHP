<?php include"header.php"?>
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
   
        
       <?php include "sidebar.php"?>
        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div style="margin-left:250px " class="container-fluid">
                
                <div class="row">
                   
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Traveller Booking</h4>
                            </div>
                            <div class="card-body">
                                <form action="#">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Person Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" id="val-username" class="form-control"  name="val-username"  placeholder="Enter a username..">
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" id="val-email" class="form-control" name="val-email" placeholder="Your valid email..">
                                                     </div>
                                            </div>
                                            
                                        </div>
                                        

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password </label>
                                                    <input type="password" id="val-password" class="form-control" name="val-password" placeholder="Choose a safe one..">
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Confirm Password </label>
                                                    <input type="password" id="val-confirm-password" class="form-control" name="val-confirm-password" placeholder="..and confirm it!">
                                                     </div>
                                            </div>
                                            
                                        </div>

                                      <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <select name="state_name" class="form-control custom-select" data-toggle="dropdown" required>
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
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Mobile </label>
                                                    <input type="text" class="form-control" id="val-digits" name="val-digits" placeholder="Enter Your Mobile No." maxlength="10" required="">
                                                     </div>
                                            </div>
                                            
                                        </div>
                                       
                                        
                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address </label>
                                                    <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="Enter Your Address"></textarea>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Photo</label>
                                                    <input type="file" class="form-control" name="photo" required="">
                                                     </div>
                                            </div>
                                            
                                        </div>
                                      
                                        
                                       
                                        
                                       
                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                
 </div>
</div>
                   
          <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"footer.php"?>