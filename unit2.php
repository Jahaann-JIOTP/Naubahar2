<?php
session_start();
if(!isset($_SESSION['auth']))
{
  // not logged in
  header('Location:index.php');
}
?>
<!-- <style>
  img[usemap], map area{
    outline: auto !important;
}
</style> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head.php'); ?>
</head>
<body>
  <!-- Pre-loader start -->
  <?php include('includes/preloader.php'); ?>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        <?php include('includes/header1.php'); ?>
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
                                            <h4 class="m-b-10">Oneline Diagram</h4>
                                            <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Diagrams</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Oneline Diagram</a>
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
                      <div class="card">
                        <div class="card-header" style="background-color: #365994">
                          <h3 style="color: white">Oneline Diagram</h3>
                        </div>
                        <div class="no-gutters box" style="overflow-x: scroll;width: 99.5%;">
                          <img usemap="#workmap1" class="map" src='assets\images\00.png'>
                            <map name="workmap1">
                              <area shape="circle" coords="210, 300, 70" href="diagram.php?id=T_1">
                              <area shape="circle" coords="720, 300, 70" href="diagram.php?id=T_2">
                              <area shape="circle" coords="1210, 300, 70" href="diagram.php?id=T_3">
                            </map>
                            <div id="refresh">
                            </div>
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
  </div>
    <?php include('includes/footer.php'); ?>
  </body>
</html>