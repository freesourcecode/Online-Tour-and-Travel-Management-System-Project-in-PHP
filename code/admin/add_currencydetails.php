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
                    <h3 class="text-primary">Add Currency Details</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Currency</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                            <div class="card-body">
                               <form  action="operations/currency.php" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Currency Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Currency Code </label>
                                                    <input type="text" class="form-control"  name="curr_code" placeholder="Enter a Currency Code." required>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Currency Symbol</label>
                                                       <input type="text" class="form-control"  name="curr_symbol" placeholder="Currency Symbol." required>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        

                                       
                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                        <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check" ></i> Save</button>
                                        <a href="add_currencydetails.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
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