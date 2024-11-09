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
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            
                            <div class="card-body">
                              <form action="operations/travellers.php" method="post" id="loginForm" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Person Info</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                             <input type="text"  class="form-control" name="val-username" pattern= "[a-zA-Z][a-zA-Z ]+"  placeholder="Enter a username.." required>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Email</label>
                                                    <input type="email"  class="form-control" name="val-email" placeholder="Your valid email.." required>
                                                     </div>
                                            </div>
                                            
                                        </div>
                                        

                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password </label>
                                                    <input type="password" id="txtPassword"   class="form-control" pattern="(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="val-password" title="Please Enter At least one alphabet,one alphabet in upper case,Special Character,Digit for Strong Password" placeholder="Choose a safe one.." required>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Confirm Password </label>
                                                    <input type="password" id="txtConfirmPassword"  class="form-control" name="val-confirm-password" placeholder="..and confirm it!" required>
                                                     </div>
                                            </div>
                                            
                                        </div>

                                      <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
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
                                        <input type="tel" class="form-control"  name="val-digits" placeholder="Enter Your Mobile No."  pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$" maxlength="10"  required>
                                                     </div>
                                            </div>
                                            
                                        </div>
                                       
                                        
                                         <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <textarea class="form-control"  name="val-suggestions" rows="5" placeholder="Enter Your Address" required></textarea>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Photo</label>
                                                    <input type="file" class="form-control" name="photo" required>
                                                     </div>
                                            </div>
                                            
                                        </div>
                                      
                                        
                                       
                                        
                                       
                                    </div>
                                    <div class="form-actions">
<!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
                                 <button type="submit" class="btn btn-success" name="submit" id="btnSubmit"> <i class="fa fa-check"></i> Save</button>
                                        <a href="add_travellers.php"><button type="button" class="btn btn-inverse">Cancel</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                
 </div>
</div>
</div>
<div class="popup popup--icon -error js_error-popup" id="show_error">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Password and Confirm Password do no match</p>
    <p>
    
     <button class="button button--error" data-for="js_error-popup">Close</button>
    
    </p>
  </div>
</div>
                   
          <!--  Author Name: Mayuri K. 
 for any PHP, Codeignitor or Laravel work contact me at mayuri.infospace@gmail.com  -->
<?php include"footer.php"?>


          


     <script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {

                 $('#show_error').addClass('popup--visible');
                return false;
            }
            else{
            return true;
        }
        });
    });




    var addButtonTrigger = function addButtonTrigger(el) {
el.addEventListener('click', function () {
var popupEl = document.querySelector('.' + el.dataset.for);
popupEl.classList.toggle('popup--visible');
});
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
</script>