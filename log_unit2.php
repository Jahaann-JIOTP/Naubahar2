<?php
$meter = $_GET['meter'];
$id = $_GET['id'];
$type = $_GET['type'];
session_start();
if (!isset($_SESSION['auth'])) {
  // not logged in
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head.php'); ?>
  <style type="text/css">
    .box {
      position: relative;
      display: inline-block;
    }

    .box .text {
      position: absolute;
      z-index: 999;
      text-align: center;
      font-size: 12px;
    }

    .font-features {
      color: black;
      font-weight: bold;
      font-size: 15px;
      font-family: 'Times';
      padding-top: 8px;
      margin-bottom: 0rem !important;
    }

    .sld_font {
      color: black;
      font-size: 18px;
      font-family: 'Times';
      padding-top: 8px;
      margin-bottom: 0rem !important;
    }

    .text_style {
      width: 180pt;
      height: 35pt;
      border-radius: 3px;
    }

    .img_diagram {
      height: auto;
      width: 100%;
      overflow-x: scroll;
    }

    .hr_styling {
      border-bottom: 5px solid gray;
      width: 100%;
      margin-left: auto;
      margin-right: auto;
    }

    /*img[usemap], map area{
    outline: auto !important;
  }*/
    .card-info:not(.card-outline)>.card-header {
      background-color: #164ebc;
    }

    .card-header {
      color: #626469;
      font-weight: bold;
      font-size: 20px;
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
                      <h4 class="m-b-10">Logs Diagram</h4>
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
                    <div class="card" style=" border: 1px solid #9f9fa3; border-radius: 5px;background-color: #fbfbfb;margin: 5px 5px 5px 0px;border-top: 5px solid #7699d4;">
                      <div class="card-header" style="height: 50px;">
                        <h4>Logs Selection</h4>
                      </div>
                      <?php if ($type == 'volt') { ?>
                        <div class="no-gutters box" style="overflow-x: scroll;width: 100%;height: 100%;">
                          <img src="assets\images/volts(log).png" usemap="#workmap3" class="map">
                          <div id="refresh">
                          </div>
                          <map name="workmap3">
                            <area shape="rect" coords="720,280,790,200" style="cursor: pointer;" href="log_detailunit2.php?meter=<?php echo $_GET['meter']; ?>&val=volt&type=<?php echo $type; ?>">
                            <area shape="rect" coords="720,315,790,400" style="cursor: pointer;" href="log_detailunit2.php?meter=<?php echo $_GET['meter']; ?>&val=current&type=<?php echo $type; ?>">
                            <area shape="rect" coords="720,440,790,510" style="cursor: pointer;" href="log_detailunit2.php?meter=<?php echo $_GET['meter']; ?>&val=power_factor&type=<?php echo $type; ?>">
                            <area shape="rect" coords="1110,100,1250,35" style="cursor: pointer;" href="meter_diagram_unit2.php?meter=<?php echo $_GET['meter']; ?>&&id=<?php echo $_GET['id']; ?>">
                          </map>
                        </div>
                      <?php } elseif ($type == 'power') { ?>
                        <div class="no-gutters box" style="overflow-x: scroll;width: 100%;height: 100%;">
                          <img src="assets\images/power(log).png" usemap="#workmap4" class="map">
                          <div id="refresh">
                          </div>
                          <map name="workmap4">
                            <area shape="rect" coords="720,220,790,150" style="cursor: pointer;" href="log_detailunit2.php?meter=<?php echo $meter; ?>&val=active_power&type=<?php echo $type; ?>">
                            <area shape="rect" coords="720,240,790,310" style="cursor: pointer;" href="log_detailunit2.php?meter=<?php echo $meter; ?>&val=reactive_power&type=<?php echo $type; ?>">
                            <area shape="rect" coords="720,340,790,410" style="cursor: pointer;" href="log_detailunit2.php?meter=<?php echo $meter; ?>&val=apparent_power&type=<?php echo $type; ?>">
                            <area shape="rect" coords="720,440,790,510" style="cursor: pointer;" href="log_detailunit2.php?meter=<?php echo $meter; ?>&val=harmonics&type=<?php echo $type; ?>">
                            <area shape="rect" coords="1110,100,1250,35" style="cursor: pointer;" href="meter_diagram_unit2.php?meter=<?php echo $_GET['meter']; ?>&&id=<?php echo $_GET['id']; ?>">
                          </map>
                        </div>
                      <?php } elseif ($type == 'energy') { ?>
                        <div class="no-gutters box" style="overflow-x: scroll;width: 100%;height: 100%;">
                          <img src="assets\images/energy(log).png" usemap="#workmap4" class="map">
                          <div id="refresh">
                          </div>
                          <map name="workmap4">
                            <area shape="rect" coords="720,280,790,140" style="cursor: pointer;" href="log_detailunit2.php?meter=<?php echo $meter; ?>&val=active_energy&type=<?php echo $type; ?>">
                            <area shape="rect" coords="720,315,790,400" style="cursor: pointer;" href="log_detailunit2.php?meter=<?php echo $meter; ?>&val=rective_energy&type=<?php echo $type; ?>">
                            <area shape="rect" coords="720,420,790,520" style="cursor: pointer;" href="log_detailunit2.php?meter=<?php echo $meter; ?>&val=apparent_energy&type=<?php echo $type; ?>">
                            <area shape="rect" coords="1110,100,1250,35" style="cursor: pointer;" href="meter_diagram_unit2.php?meter=<?php echo $_GET['meter']; ?>&&id=<?php echo $_GET['id']; ?>">
                          </map>
                        </div>
                      <?php } ?>
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
</body>

</html>