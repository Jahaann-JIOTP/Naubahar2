<?php
session_start();
if (!isset($_SESSION['auth'])) {
  // not logged in
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('includes/head.php'); ?>
  <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
  <style type="text/css">
    /*img[usemap], map area{
    outline: auto !important;
  }*/
    .di {
      zoom: 1.2;
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
                      <h4 class="m-b-10">Oneline Diagram - Unit 1</h4>
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
                      <li class="breadcrumb-item"><a href="#!" style="color: #284497">Oneline Diagram - Unit 1</a>
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
                    <div class="card" style=" border: 1px solid #9f9fa3; border-radius: 5px;background-color: #fbfbfb;margin: 5px 5px 5px 0px;border-top: 5px solid #7699d4;overflow:auto">
                      <!-- <div class="card" style="width:83.5%;height:650px;margin-top:30px;margin-left:40px"> -->
                      <!-- <div class="card-header" style="height: 60px;border-bottom: 7px solid;border-bottom-color: #adadad">
                        </div> -->
                      <div class="no-gutters box di" style="width:1300px; margin:auto;">
                        <img usemap="#workmap1" class="map" src='assets\images\mehwish.png' style="width:1300px;">
                        <map name="workmap1">
                          <area shape="circle" coords="260 152, 40" href="meter_diagram_u1.php?meter=U_1">
                          <area shape="circle" coords="420, 152, 40" href="meter_diagram_u1.php?meter=U_2">
                          <area shape="circle" coords="580, 152, 40" href="meter_diagram_u1.php?meter=U_4">
                          <area shape="circle" coords="742, 152, 40" href="meter_diagram_u1.php?meter=U_3">

                          <area shape="circle" coords="155, 400, 40" href="meter_diagram_u1.php?meter=U_11">
                          <area shape="circle" coords="320, 400, 40" href="meter_diagram_u1.php?meter=U_7">
                          <area shape="circle" coords="490, 400, 40" href="meter_diagram_u1.php?meter=U_8">
                          <area shape="circle" coords="645, 400, 40" href="meter_diagram_u1.php?meter=U_9">
                          <area shape="circle" coords="800, 400, 40" href="meter_diagram_u1.php?meter=U_10">
                          <area shape="circle" coords="965, 400, 40" href="meter_diagram_u1.php?meter=U_5">
                          <area shape="circle" coords="1120, 400, 40" href="meter_diagram_u1.php?meter=U_6">

                          <area shape="circle" coords="160, 655, 40" href="meter_diagram_u1.php?meter=U_12">
                          <area shape="circle" coords="320, 650, 40" href="meter_diagram_u1.php?meter=U_13">
                          <area shape="circle" coords="490, 650, 40" href="meter_diagram_u1.php?meter=U_14">
                          <area shape="circle" coords="645, 650, 40" href="meter_diagram_u1.php?meter=U_15">
                          <area shape="circle" coords="800, 650, 40" href="meter_diagram_u1.php?meter=U_16">
                          <area shape="circle" coords="965, 650, 40" href="#">
                          <area shape="rect" coords="10,915,195,1000" href="unit1.php" style="cursor: pointer;">
                          <!--                                   <area shape="circle" coords="210, 300, 70" href="diagram.php?id=T_1">
                                       <area shape="circle" coords="720, 300, 70" href="diagram.php?id=T_2">
                                       <area shape="circle" coords="1210, 300, 70" href="diagram.php?id=T_3"> -->
                        </map>
                        <div id="refresh">
                        </div>
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
<script>
  let link = 'diagram_data_u1.php';
  $(function() {
    $("#refresh").load(link);
    $(function() {
      $(document).on('click', '.anchor', function() {
        console.log("abc");
        link = $(this).data('link');
        console.log(link);
        $("#refresh").load(link);
      });
    });
    setInterval(function() {
      $("#refresh").load(link)
    }, 5000);
  });
</script>