<?php
session_start();
if(!isset($_SESSION['auth']))
{
  // not logged in
  header('Location:index.php');
}
include('Action/connection.php');
$id=$_SESSION["auth"];
$result = mysqli_query($con,"SELECT * FROM accounts WHERE  id= '$id'");
if(mysqli_num_rows($result)>0) {
$row = mysqli_fetch_assoc($result);
if (!empty($row["address"])) {
  $address=$row["address"];
}
else{
  $address='Please Complete your profile information';
}
if (!empty($row["company"])) {
  $company=$row["company"];
}
else{
  $company='Please Complete your profile information';
}
if (!empty($row["country"])) {
  $country=$row["country"];
}
else{
  $country='Please Complete your profile information';
}
if (!empty($row["cell"])) {
  $cell=$row["cell"];
}
else{
  $cell='Please Complete your profile information';
}
if (!empty($row["phone"])) {
  $phone=$row["phone"];
}
else{
  $phone='Please Complete your profile information';
}
if (!empty($row["description"])) {
  $description=$row["description"];
}
else{
  $description='Please Complete your profile information';
}
if (!empty($row["avatar"])) {
    $avatar='action/uploads/'.$row["avatar"];
   }
   else{
    $avatar="assets/images/profile_pic.png";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- head start -->
<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
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
            <div class="main-content">
            <!-- Top navbar -->
            <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
              <div class="container-fluid">
              
                <h3 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">User profile</h3>
              </div>
            </nav>
            <!-- Header -->
            <div class="col">
            <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="height: 450px; background-image: url(assets/images/breadcrumb-bg.jpg); background-size:cover; background-position: center top;">
              <!-- Mask -->
              <span class="mask bg-gradient-default opacity-8"></span>
              <!-- Header container -->
              <div class="container-fluid d-flex align-items-center">
              </div>
            </div>
          </div>
            <!-- Page content -->
            <div class="container-fluid mt--7">
              <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                  <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                      <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                          <a href="#">
                            <img src="<?php echo $avatar;?>" class="rounded-circle">
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                      <div class="row">
                        <div class="col">
                          <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                          </div><br><br>
                        </div>
                      </div>
                      <div class="text-center">
                        <h3><?php echo $row["name"];?></h3>
                        <div class="h5 font-weight-300">
                          <i class="ni location_pin mr-2"></i><?php echo $row["user_level"];?>
                        </div>
                        <!-- <div class="h5 mt-4">
                          <i class="ni business_briefcase-24 mr-2"></i><?php echo $description;?>
                        </div> -->
                        <div>
                          <i class="ni education_hat mr-2"></i><?php echo $description;?>
                        </div>
                        <hr class="my-4">
                          <p><i class="fa fa-phone" style="color:white; background-color:  #40E0D0;border-radius: 50%; font-size: 16px;height: 30px;line-height: 30px;top:0px;width: 30px;text-align: center;"></i></b>   <a><?php echo $phone;?></a></p>
                           <p><b><i class="fa fa-mobile" style="color:white; background-color:  #8A2BE2;border-radius: 50%; font-size: 16px;height: 30px;line-height: 30px;top:0px;width: 30px;text-align: center;"></i></b>  <a><?php echo $cell;?></a></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-8 order-xl-1" >
                  <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                    </div>
                    <div class="card-body">
                      
                        <h4 class="mb" style="text-align: center;text-transform: uppercase;border-bottom: 2px solid #e2e2e2;font-weight: 700;color:     #003F87;"><b>Contact Information</b></h4><br>
                        <div class="pl-lg-4">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group focused">
                                <i class="  fa fa-building" style="color:white; background-color: #8A2BE2;border-radius: 50%; font-size: 16px;height: 30px;line-height: 30px;top:0px;width: 30px;padding-left: 8px;margin-left: "></i>
                                <p><h5><?php echo $company;?></h5></p>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <i class="fa fa-flag"style="color:white; background-color:  #40E0D0;border-radius: 50%; font-size: 16px;height: 30px;line-height: 30px;top:0px;width: 30px;padding-left: 6px"></i>
                                <p><h5><?php echo $country;?></h5></p>
                              </div>
                            </div>
                          </div><br>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group focused">
                                <i class="fa fa-building " style="color:white; background-color:  #40E0D0;border-radius: 50%; font-size: 16px;height: 30px;line-height: 30px;top:0px;width: 30px;padding-left: 8px"></i>
                                <p><h5><?php echo $address;?></h5></p>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group focused">
                                <i class="fa fa-envelope"style="color:white; background-color: #1E90FF;border-radius: 50%; font-size: 16px;height: 30px;line-height: 30px;top:0px;width: 30px;padding-left: 6px"></i>
                                <p><h5><?php echo $row["email"];?></h5></p>
                              </div>
                            </div>
                          </div>
                        </div><br>
                       <!--  s -->
                        <!-- Address -->
                        <h4 class="mb" style="text-align: center;text-transform: uppercase;border-bottom: 2px solid #e2e2e2;font-weight: 700;color:  #003F87;"><b>Edit Profile </b></h4><br>
                        <form role="form" enctype="multipart/form-data" action="Action/profile_edit.php" method="POST">
                        <div class="pl-lg-4">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group focused">
                                <label class="form-control-label" for="input-address">Avatar</label><br>
                                <input type="file" id="exampleInputFile" class="file-pos" name="uploadfile" value=""/>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Company</label>
                                <input type="text" id="c-name" class="form-control form-control-alternative" name="com" pattern="[A-Za-z0-9]+" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="input-country">Country</label>
                                <input type="text" id="country" class="form-control form-control-alternative" name="coun"pattern="[A-Za-z0-9_]{1,15}" required>
                              </div>
                            </div>
                          </div>
                          <hr class="my-4">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group focused">
                                <label class="form-control-label" for="input-city">Adress</label>
                                <input type="text" id="addr1" class="form-control form-control-alternative" name="addr" pattern="[A-Za-z0-9'\.\-\s\,]" required>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group focused">
                                <label class="form-control-label" for="input-country">Phone</label>
                                <input type="text" id="phone" class="form-control form-control-alternative" name="phone"pattern="[\+]\d{2}\d{10}" required>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group focused">
                                <label class="form-control-label" for="input-country">Cell</label>
                                <input type="text"  id="cell" class="form-control form-control-alternative"  name="cell" pattern="[\+]\d{2}\d{10}" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr class="my-4">
                        <!-- Description -->
                        <div class="pl-lg-4">
                          <div class="form-group focused">
                            <label>Description</label>
                            <textarea rows="5" class="form-control form-control-alternative" name="des" placeholder="A few words about you ..." pattern="[A-Za-z]{3}" required></textarea>
                          </div>
                          <div class="form-group focused">
                            <div class="offset-sm-4 col-sm-10">
                              <button type="submit" class="btn btn-primary" name="upload">Submit</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>   
          </div>
    </div>
  </div>
  <div id="styleSelector"> </div>
  <!-- Main-body end -->
 <?php include('includes/footer.php'); ?>   
</body>
</html>
