<?php
session_start();
if(!isset($_SESSION['auth']))
{
  // not logged in
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head.php'); ?>
    <style>
      label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 700;
}
    </style>
</head>
  <body>
    <!-- Pre-loader start -->
    <?php include('includes/preloader.php'); ?>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        <?php include('includes/header.php'); ?>
        <div class="pcoded-main-container">
          <div class="pcoded-wrapper">
            <?php include('includes/sidebar.php'); ?>
            <div class="pcoded-content">
              <!-- Page-header start -->
              <div class="page-header">
                <div class="page-block">
                  <div class="row align-items-center">
                    <div class="col-md-8">
                      <div class="page-header-title">
                        <h4 class="m-b-10">Add User</h4>
                        <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                          <a href="#"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">User Management</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!" style="color: #284497">Add User</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Page-header end -->
              <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                  <div class="page-wrapper">
                    <!-- Page-body start -->
                    <div class="page-body">
                      <!-- Basic table card start -->
                      <center>
                        <div id="hidediv">
                          <h4  style="color: #4ECDC4;"><?php
                          if(isset($_SESSION['registered']))
                          {
                            ?>
                            <div  id="alert"class="alert alert-primary alert-dismissible fade show" role="alert">
                          <strong><?php echo $_SESSION['registered']; ?></strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <?php
                          unset($_SESSION['registered']);
                          }
                           ?> 
                          </h4>
                        </div></center>
                        <div class="card" style=" border: 1px solid #9f9fa3; border-radius: 5px;background-color: #fbfbfb;margin: 5px 5px 5px 0px;border-top: 5px solid #7699d4;">
                        <div class="card-header" style="height: 40px;">
                           <h4>Add User</h4>
                        </div>
                        <div class="card-block">
                          
                          <form method="POST" action="Action/insert.php" onsubmit="return myfunction()">
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label"> User Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name"  placeholder="Enter User Name" required>
                                </div>
                            </div><br>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input  class="form-control" name="email" type="email" placeholder="Enter Email Address"  title="Invalid email address" required>
                              </div>
                            </div><br>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="pass"  placeholder="Enter Password"   required="">
                                <input type="checkbox" onclick="Toggler()"> Show Password
                              </div>
                            </div><br>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label"> Confirm Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="pass1" placeholder="Enter Password"  required="">
                                <input type="checkbox" onclick="Button()"> Show Password
                              </div>
                            </div><br>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">User Type</label>
                              <div class="col-sm-10">
                                <input type="text" name="type" class="form-control" placeholder="Enter User Type" required>
                              </div>
                            </div><br>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">User Level</label>
                              <div class="col-sm-10">
                                <select name="level" class="form-control">
                                  <option value="">Select User Level</option>
                                  <option value="0">Admin</option>
                                  <option value="1">Observer</option>
                                </select>
                              </div>
                            </div><br><br>
                            <div class="form-group row">
                              <input type="submit" class="btn" style="background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0);">
                            </div>
                          </form> 
                        </div>    
                      </div>
                    </div>
                  </div>
                 <div id="styleSelector">
                 </div>
                </div>
              </div>
           </div>
          </div>
        </div>
      </div>
    <?php include('includes/footer.php'); ?>
    <script type="text/javascript">
    function myfunction() {
        var password = document.getElementById("pass").value;
        var confirmPassword = document.getElementById("pass1").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        
        return true;
      }
  
</script>
<script> 
   
        function Toggler() { 
            var temp = document.getElementById("pass"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
</script> 
<script> 
   
        function Button() { 
            var temp = document.getElementById("pass1"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
</script> 
<script type="text/javascript">
// close the div in 5 secs
setTimeout(function() {
    $('#hidediv').fadeOut('1500');
}, 5000);
</script>
  </body>
</html>