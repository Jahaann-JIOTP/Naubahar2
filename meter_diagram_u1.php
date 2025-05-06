<?php
$meter = $_GET['meter'];
session_start();
if (!isset($_SESSION['auth'])) {
  // not logged in
  header('Location:index.php');
}
?>
<!-- <style>
  /*img[usemap], map area{
    outline: auto !important;
}*/
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
                    <div class="card" style=" border: 1px solid #9f9fa3; border-radius: 5px;background-color: #fbfbfb;margin: 5px 5px 5px 0px;border-top: 5px solid #7699d4;">
                      <div class="card-header">
                        <?php
                        if ($_GET['meter'] == "U_1") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Main LT</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_2") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Water Treatment</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_3") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Turbine-1</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_4") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Syrup Room</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_5") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Air Compressor(3+4+5)</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_6") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Air Compressor(1+2)</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_7") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso 4</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_8") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso 3</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_9") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso 2</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_10") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso 1</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_11") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Evaporators</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_12") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Line 5</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_13") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Line 4</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_14") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Line 3</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_15") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Line 1</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_16") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Boiler</b></h4>
                        <?php } elseif ($_GET['meter'] == "U_17") {
                        ?><h4 class="card-title" style="color: #626469;font-weight: bold;"><b>Turbine-2</b></h4>

                        <?php } ?>
                      </div>
                      <div class="no-gutters box" style="overflow-x: scroll;width: 99.5%;margin-top: 30px" id="1">
                        <img usemap="#workmap1" class="map online_image" src='assets/images/sld(naubahar).png' height="568px" width="1395px">
                        <div id="refresh1">
                        </div>
                        <map name="workmap1" name="map">
                          <area shape="rect" coords="3,2,220,39" style="cursor: pointer;" onclick="volts();">
                          <area shape="rect" coords="230,2,437,39" style="cursor: pointer;" onclick="power();">
                          <area shape="rect" coords="447,2,655,39" style="cursor: pointer;" onclick="energy();">
                          <area shape="rect" coords="889,2,1300,115" href="unit1.php" style="cursor: pointer;">
                          <area shape="rect" coords="1200,490,1130,560" href="log.php?type=volt&&meter=<?php echo $_GET['meter']; ?>" style="cursor: pointer;">
                        </map>
                      </div>
                      <div class="no-gutters box" style="overflow-x: scroll;width: 99.5%;margin-top: 30px;display: none;" id="2">
                        <img usemap="#workmap2" class="map online_image" src='assets/images/sld12.png' height="575px" width="1332px">
                        <div id="refresh2">
                        </div>
                        <map name="workmap2">
                          <area shape="rect" coords="3,2,220,39" style="cursor: pointer;" onclick="volts();">
                          <area shape="rect" coords="230,2,437,39" style="cursor: pointer;" onclick="power();">
                          <area shape="rect" coords="447,2,655,39" style="cursor: pointer;" onclick="energy();">
                          <area shape="rect" coords="1200,490,1130,560" href="log.php?type=power&&meter=<?php echo $_GET['meter']; ?>" style="cursor: pointer;">
                        </map>
                      </div>

                      <div class="no-gutters box" style="overflow-x: scroll;width: 99.5%;margin-top: 30px;display: none;" id="3">
                        <img usemap="#workmap3" style="margin-left:10px" class="map online_image" src='assets/images/1.png'>
                        <div id="refresh4">
                        </div>
                        <map name="workmap3">
                          <area shape="rect" coords="3,2,220,39" style="cursor: pointer;" onclick="volts();">
                          <area shape="rect" coords="230,2,437,39" style="cursor: pointer;" onclick="power();">
                          <area shape="rect" coords="447,2,655,39" style="cursor: pointer;" onclick="energy();">
                          <area shape="rect" coords="1200,490,1130,560" href="log.php?type=energy&&meter=<?php echo $_GET['meter']; ?>" style="cursor: pointer;">
                        </map>
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
      function volts() {
        var x = document.getElementById("1");
        var y = document.getElementById("2");
        var z = document.getElementById("3");
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "none";
      }

      function power() {
        var x = document.getElementById("1");
        var y = document.getElementById("2");
        var z = document.getElementById("3");
        x.style.display = "none";
        y.style.display = "block";
        z.style.display = "none";
      }

      function energy() {
        var x = document.getElementById("1");
        var y = document.getElementById("2");
        var z = document.getElementById("3");
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "block";
      }
    </script>
</body>

</html>
<script>
  let link = 'volts_data_u1.php?>&&meter=<?php echo $_GET['meter']; ?>';
  $(function() {
    $("#refresh1").load(link);
    $(function() {
      $(document).on('click', '.anchor', function() {
        console.log("abc");
        link = $(this).data('link');
        console.log(link);
        $("#refresh1").load(link);
      });
    });
    setInterval(function() {
      $("#refresh1").load(link)
    }, 10000);
  });
</script>
<script>
  let link1 = 'power_data_u1.php?>&&meter=<?php echo $_GET['meter']; ?>';
  $(function() {
    $("#refresh2").load(link1);
    $(function() {
      $(document).on('click', '.anchor', function() {
        console.log("abc");
        link1 = $(this).data('link');
        console.log(link);
        $("#refresh2").load(link);
      });
    });
    setInterval(function() {
      $("#refresh2").load(link1)
    }, 10000);
  });
</script>
<script>
  let link2 = 'energy_data_u1.php?>&&meter=<?php echo $_GET['meter']; ?>';
  $(function() {
    $("#refresh4").load(link2);
    $(function() {
      $(document).on('click', '.anchor', function() {
        console.log("abc");
        link2 = $(this).data('link');
        console.log(link);
        $("#refresh4").load(link);
      });
    });
    setInterval(function() {
      $("#refresh4").load(link2)
    }, 10000);
  });
</script>
</body>

</html>