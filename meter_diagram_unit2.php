<?php
$id = $_GET['id'];
$meter = $_GET['meter'];
session_start();
if (!isset($_SESSION['auth'])) {
    // not logged in
    header('Location:index.php');
}
?>
<!-- <style>
  img[usemap], map area{
    outline: auto !important;
    color: red;
} -->
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/head.php'); ?>
    <style>
    .card-header {
      color: #626469;
      font-weight: bold;
      
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
                                            <h4 class="m-b-10">Detailed Diagram</h4>
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
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Oneline
                                                    Diagram</a>
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
                                                if ($_GET['id'] == "T_1" &&  $_GET['meter'] == "GW1_U26") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Trafo-3</b></h3>
                                                <?php }
                                                
                                                if ($_GET['id'] == "T_1" &&  $_GET['meter'] == "GW1_U25") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Trafo-1</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_1" &&  $_GET['meter'] == "GW1_U8") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Trafo-2</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_1" &&  $_GET['meter'] == "GW2_U8") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>RO-4</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_1" &&  $_GET['meter'] == "GW2_U9") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>RO-1</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_1" &&  $_GET['meter'] == "GW2_U10") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>RO-2</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_1" &&  $_GET['meter'] == "GW1_U22") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>RO-3</b></h3>
                                                <?php } elseif ($_GET['id'] == "T_2" &&  $_GET['meter'] == "GW1_U14") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso-8</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_2" &&  $_GET['meter'] == "GW1_U15") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso-5</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_2" &&  $_GET['meter'] == "GW1_U16") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso-4</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_2" &&  $_GET['meter'] == "GW1_U17") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso-3</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_2" &&  $_GET['meter'] == "GW1_U18") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso-2</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_2" &&  $_GET['meter'] == "GW1_U19") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso-1</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_2" &&  $_GET['meter'] == "GW1_U20") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso-6</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_2" &&  $_GET['meter'] == "GW1_U21") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Grasso-7</b></h3>
                                                <?php } elseif ($_GET['id'] == "T_3" &&  $_GET['meter'] == "GW1_U2") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Syrup Room L5</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_3" &&  $_GET['meter'] == "GW1_U3") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Juice Room L3</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_3" &&  $_GET['meter'] == "GW1_U4") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>New Boiler</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_3" &&  $_GET['meter'] == "GW3_U3") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Syrup Room L5</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_3" &&  $_GET['meter'] == "GW3_U4") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Sugar Dissolving No.2</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_3" &&  $_GET['meter'] == "GW3_U5") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Oven L5</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_3" &&  $_GET['meter'] == "GW1_U5") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Sugar Dissolving No.1</b></h3>
                                                <?php } elseif ($_GET['id'] == "T_4" &&  $_GET['meter'] == "GW1_U6") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Line-1</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_4" &&  $_GET['meter'] == "GW1_U7") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Line-2</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_4" &&  $_GET['meter'] == "GW1_U23") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Line-3</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_4" &&  $_GET['meter'] == "GW1_U24") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Line-6</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_4" &&  $_GET['meter'] == "GW2_U2") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>HPAC4- HP1000</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_4" &&  $_GET['meter'] == "GW3_U2") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Line-5</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_4" &&  $_GET['meter'] == "GW3_U6") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>Line-8</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_5" &&  $_GET['meter'] == "GW2_U12") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>GA90-VSD (Old)</b></h3>
                                                <?php } elseif ($_GET['id'] == "T_5" &&  $_GET['meter'] == "GW2_U12") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>GA90-VSD (Old)</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_5" &&  $_GET['meter'] == "GW2_U11") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>GA90-Old</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_5" &&  $_GET['meter'] == "GW2_U14") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>GA90-VSD (New)</b></h3>
                                                <?php }
                                                if ($_GET['id'] == "T_5" &&  $_GET['meter'] == "GW2_U13") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>GA90-New</b></h3>
                                                <?php } elseif ($_GET['id'] == "T_6" &&  $_GET['meter'] == "GW2_U3") {
                                                ?><h4 class="card-title" style="color: #626469;font-weight: bold;"
                                                ><b>HPAC-2189</b></h4>
                                                <?php }
                                                if ($_GET['id'] == "T_6" &&  $_GET['meter'] == "GW2_U4") {
                                                ?><h3 class="card-title" style="color: #626469;font-weight: bold;"><b>HPAC-1425</b></h3>
                                                <?php }
                                                ?>
                                            </div>
                                            <div class="no-gutters box" style="overflow-x: scroll;width: 99.5%;margin-top: 30px" id="1">
                                                <img usemap="#workmap1" class="map online_image" src='assets/images/sld(naubahar).png' height="568px" width="1395px">
                                                <div id="refresh1">
                                                </div>
                                                <map name="workmap1" name="map">
                                                    <area shape="rect" coords="3,2,220,39" style="cursor: pointer;" onclick="volts();">
                                                    <area shape="rect" coords="230,2,437,39" style="cursor: pointer;" onclick="power();">
                                                    <area shape="rect" coords="447,2,655,39" style="cursor: pointer;" onclick="energy();">
                                                    <area shape="rect" coords="889,2,1300,115" href="unit2_oneline.php" style="cursor: pointer;">
                                                    <area shape="rect" coords="1200,490,1130,560" href="log_unit2.php?type=volt&&meter=<?php echo $_GET['meter']; ?>&&id=<?php echo $_GET['id']; ?>" style="cursor: pointer;">
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
                                                    <area shape="rect" coords="1200,490,1130,560" href="log_unit2.php?type=power&&meter=<?php echo $_GET['meter']; ?>&&id=<?php echo $_GET['id']; ?>" style="cursor: pointer;">
                                                </map>
                                            </div>

                                            <div class="no-gutters box" style="overflow-x: scroll;width: 99.5%;margin-top: 30px;display: none;" id="3">
                                                <img usemap="#workmap3" style="margin-left:10px" class="map online_image" src='assets\SLD\energy.png'>
                                                <div id="refresh3">
                                                </div>
                                                <map name="workmap3">
                                                    <area shape="rect" coords="3,2,220,39" style="cursor: pointer;" onclick="volts();">
                                                    <area shape="rect" coords="230,2,437,39" style="cursor: pointer;" onclick="power();">
                                                    <area shape="rect" coords="447,2,655,39" style="cursor: pointer;" onclick="energy();">
                                                    <area shape="rect" coords="1200,490,1130,560" href="log_unit2.php?type=energy&&meter=<?php echo $_GET['meter']; ?>&&id=<?php echo $_GET['id']; ?>" style="cursor: pointer;">
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
    let link = 'volts_data_unit2.php?id=<?php echo $_GET['id']; ?>&&meter=<?php echo $_GET['meter']; ?>';
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
    let link1 = 'power_data.php?id=<?php echo $_GET['id']; ?>&&meter=<?php echo $_GET['meter']; ?>';
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
    let link2 = 'energy_data.php?id=<?php echo $_GET['id']; ?>&&meter=<?php echo $_GET['meter']; ?>';
    $(function() {
        $("#refresh3").load(link2);
        $(function() {
            $(document).on('click', '.anchor', function() {
                console.log("abc");
                link2 = $(this).data('link');
                console.log(link);
                $("#refresh3").load(link);
            });
        });
        setInterval(function() {
            $("#refresh3").load(link2)
        }, 10000);
    });
</script>
</body>

</html>