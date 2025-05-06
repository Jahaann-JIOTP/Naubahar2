<?php 
session_start();
?>
<html lang="en">
<title>Password Reset - Jahaann</title>
<script type="text/javascript">
    function myfunction() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password1").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        
        return true;
      }
  
</script>
<script> 
   
        function Toggler() { 
            var temp = document.getElementById("password");
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
            var temp = document.getElementById("password1");
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
<!DOCTYPE html>
<html lang="en">

   <?php include('includes/head.php'); ?>
  <body themebg-pattern="theme1">
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <section class="login-block"style="margin-top: 5px">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" action="Action/reset_password.php" method="POST" onsubmit="return myfunction()">
                        <div class="text-center">
                            <img class="img-fluid" height="60" width="200" style="padding-bottom: 20px"  src="assets/images/icon.png" alt="Theme-Logo"/>
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Reset Your Password</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="user-name" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Choose Username</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Email Address</label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password" class="form-control" id="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label"> New Password</label>
                                            <input type="checkbox" onclick="Toggler()"> Show Password
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password" class="form-control" id="password1" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label"> Confirm Password</label>
                                            <input type="checkbox" onclick="Button()"> Show Password
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row m-t-25 text-left">
                                      <div class="col-12">
                                        <div>
                                            <input type="checkbox" onclick="Toggler()"> Show Password
                                        </div>
                                        
                                      </div>
                                    </div> -->
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Reset Password</button>
                                    </div>
                                    <center>
                                    <div class="editmassage">
                                      <h5 id="hidediv" style="color: #0040ff;"><?php if(isset($_SESSION['on'])) echo $_SESSION['on'];unset($_SESSION['on']) ?></h5></div></center>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left"><a href="index.php"><b style="text-align: center">Back to sign in</b></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>     <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>     <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>     <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
<!-- modernizr js -->
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>     <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>
