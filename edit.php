<?php
session_start();
$id=$_GET['id'];
if(!isset($_SESSION['auth']))
{
  // not logged in
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- head start -->
<?php include('includes/head.php'); ?>
<!-- head end -->
<body>
  <!-- Pre-loader start -->
<?php include('includes/preloader.php'); ?>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        <!-- header start -->
          <?php include('includes/header.php'); ?>
        <!-- header end -->
          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                <!-- sidebar start -->
                <?php include('includes/sidebar.php'); ?>
                <!-- sidebar end -->
                    <div class="pcoded-content">
                      <!-- Page-top start -->
                        <div class="page-header">
                          <?php include('includes/slider.php'); ?>
                        </div><br>
                          <hr style="border: 1px solid white;">
                          <div class="row">
                            <div class="col-sm-1"></div>
                      <div class="col-sm-10">
                          <div class="card">
                            <div class="card-header" style="background-color:#448aff; ">
                              <h4 style="color: white">Update User</h4>
                           </div>
                           <div class="card-block">
                            <h4 class="sub-title">Basic Inputs</h4>
                            <form method="POST" action="Action/update.php">
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> User ID</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>" required>
                                </div>
                              </div><br>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> User Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name"  placeholder="Enter User Name" value="<?php echo $row['name']; ?>" pattern="^[A-Za-z]\\w{5, 29}$" required>
                                </div>
                              </div><br>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  <input  class="form-control" name="email" type="email" value="<?php echo $row['email']; ?>" placeholder="Enter Email Address" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" required>
                                </div>
                              </div><br>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" name="password" id="pass"  value="<?php echo $row['pass']; ?>" placeholder="Enter Password"  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required="">
                                  <input type="checkbox" onclick="Toggler()"> Show Password
                                </div>
                              </div><br>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">User Type</label>
                                <div class="col-sm-10">
                                  <input type="text" name="type" class="form-control" value="<?php echo $row['user_level']; ?>" placeholder="Enter User Type" required>
                                </div>
                              </div><br>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label">User Level</label>
                                <div class="col-sm-10">
                                  <input type="text" name="level" class="form-control" value="<?php echo $row['status']; ?>" placeholder="Enter User Type" required>
                                </div>
                              </div><br><br>
                              <div class="form-group row">
                                <input type="submit" class="btn btn-primary">
                              </div>
                            </form>
                           </div>
                         </div>
                      </div>
                      <div class="col-sm-1"></div>
                  </div>
                    </div>
              </div>
          </div>
          <div id="styleSelector"> </div>
      </div>
      <!-- Main-body end -->
  </div>
 <?php include('includes/footer.php'); ?> 
 <script type="text/javascript">
// close the div in 5 secs
setTimeout(function() {
    $('#hidediv').fadeOut('1500');
}, 5000);
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
</body>
</html>