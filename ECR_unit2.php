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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <style type="text/css">
        .card {
            -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
            -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
            box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }

        select {
            /* styling */
            background-color: white;
            border: thin solid blue;
            border-radius: 4px;
            display: inline-block;
            font: inherit;
            /*line-height: 1.5em;*/
            padding: 0.3em 1em 0.3em 1em;
            /* reset */
            margin: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-appearance: none;
            -moz-appearance: none;
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
            <!-- header start -->
            <?php include('includes/header1.php'); ?>
            <!-- header end -->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- sidebar start -->
                    <?php include('includes/sidebar.php'); ?>
                    <!-- sidebar end -->
                    <div class="pcoded-content">
                        <!-- Page-top start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h4 class="m-b-10">ECR Office</h4>
                                            <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">ECR
                                                    Office</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-top end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <center>
                                            <h3 style="margin-top:-25px ;">Energy Consumption</h3>
                                        </center>
                                        <div class=" card items" style="border-radius: 10px !important;background-color: #e6eaf3; height: 205px;border-top-style: solid;border-radius: 10px !important;border-color: #206bc4;">

                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; border-right: 2px solid rgb(188, 203, 223); margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>Syrup Room L4</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_ECR1" class="form-select" required name="option" onchange="old_boiler()">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="This Week">This Week</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="Last 30 Days">Last 30 Days
                                                                        </option>
                                                                        <option value="This Year">This Year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><br><br>
                                                        <center>
                                                            <div>
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_old_boiler"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; border-right: 2px solid rgb(188, 203, 223); margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>Juice Room L3</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_ECR2" class="form-select" required name="option" onchange="juice_room()">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="This Week">This Week</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="Last 30 Days">Last 30 Days
                                                                        </option>
                                                                        <option value="This Year">This Year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><br><br>
                                                        <center>
                                                            <div>
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_juice_room"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; border-right: 2px solid rgb(188, 203, 223); margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>New
                                                                    Boiler</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_ECR3" class="form-select" required name="option" onchange="new_boiler()">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="This Week">This Week</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="Last 30 Days">Last 30 Days
                                                                        </option>
                                                                        <option value="This Year">This Year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><br><br>
                                                        <center>
                                                            <div>
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_new_boiler"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; margin-top:10px; border-right: 2px solid rgb(188, 203, 223);">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>Sugar Dissolving No.1</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_ECR4" class="form-select" required name="option" onchange="sugar_room()">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="This Year">This Year</option>
                                                                        <option value="This Week">This Week</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><br><br>
                                                        <center>
                                                            <div>
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_sugar_room"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; margin-top:10px; border-right: 2px solid rgb(188, 203, 223);">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>Syrup Room L5</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_Syrup" class="form-select" required name="option" onchange="Syrup_Room()">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="This Year">This Year</option>
                                                                        <option value="This Week">This Week</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><br><br>
                                                        <center>
                                                            <div>
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_Syrup"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; margin-top:10px; border-right: 2px solid rgb(188, 203, 223);">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>Sugar Dissolving No.2</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_Sugar" class="form-select" required name="option" onchange="Sugar_Dissolving()">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="This Year">This Year</option>
                                                                        <option value="This Week">This Week</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><br><br>
                                                        <center>
                                                            <div>
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_Sugar"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>Oven L5</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_Shrink" class="form-select" required name="option" onchange="Shrink_Tunnel()">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="This Year">This Year</option>
                                                                        <option value="This Week">This Week</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><br><br>
                                                        <center>
                                                            <div>
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_Shrink"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-3">
                                                <div class="card" style="border-radius: 10px !important;background-color:#e6eaf3;" id="chart-container">
                                                    <div class="card-body" style="overflow: hidden;height: 350px;border-top-style: solid;border-radius: 10px !important;border-color: #206bc4;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>Total Energy
                                                                    Consumption</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_ECR" class="form-select" required name="option" onchange="ECRoffEnergy()">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Last 7 Days">Last 7
                                                                            Days</option>
                                                                        <option value="Last 30 Days">Last 30 Days
                                                                        </option>
                                                                        <option value="Yesterday">Yesterday
                                                                        </option>
                                                                        <option value="Last Week">Last Week
                                                                        </option>
                                                                        <option value="This Year">This Year
                                                                        </option>
                                                                        <option value="This Week">This Week
                                                                        </option>
                                                                        <!--  <option value="This Month">This Month</option> -->
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div><br>
                                                        <center>
                                                            <img src="assets/images/ecr.png" alt="" height="auto" width="100%" style="margin-top: -30px;">
                                                            <div style="margin-top: -30px;">
                                                                <b><span style="padding-left: 1%;font-size: 34px; " id="total_energy_value_ECR"></span></b><span>&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-4">
                                                <div class="card" style="border-radius: 10px !important;background-color:#e6eaf3;" id="chart-container">
                                                    <div class="card-body" style="height: 350px;border-top-style: solid;border-radius: 10px !important;border-color: #206bc4;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>Energy
                                                                    Breakdown</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_cost_pie_option2" class="form-select" required name="option" onchange="energy_pie2(this.options[this.selectedIndex].value);">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>

                                                                        <option value="Last 30 Days">Last 30 Days
                                                                        </option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <!-- <option value="This Year">This Year</option> -->
                                                                        <option value="This Week">This Week</option>
                                                                        <!--  <option value="This Month">This Month</option> -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li><i class="fa fa-window-maximize full-card style1" style="margin-top:06px;padding-left:5px;font-size: 1.20em"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div id="energy_cost_pie_chart2" style="width: 100%;height:95%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-5">
                                                <div class="card" style="border-radius: 10px !important;background-color:#e6eaf3;">
                                                    <div class="card-body" style="height: 350px;border-top-style: solid;border-radius: 10px !important;border-color: #206bc4;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b> Energy
                                                                    Usage</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_option1" class="form-select" required name="option" onchange="energy1(this.options[this.selectedIndex].value);">
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="Last 30 Days">Last 30 Days
                                                                        </option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <!-- <option value="This Year">This Year</option> -->
                                                                        <option value="This Week">This Week</option>
                                                                        <option value="This Year">This Year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li><i class="fa fa-window-maximize full-card style1" style="margin-top:06px;padding-left:5px;font-size: 1.20em"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div id="energy_chart1" style="width: 100%;height: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12 col-sm-12">
                                            <div class="card" style="border-radius: 10px !important;background-color:#e6eaf3;">
                                                <div class="card-body" style="height: 450px;border-top-style: solid;border-radius: 10px !important;border-color: #206bc4;">
                                                    <div class="d-flex">
                                                        <h5 class="card-title" style="color: black"><b>Real Time
                                                                Value</b></h5>
                                                        <div class="ml-auto">
                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li><i class="fa fa-window-maximize full-card style1" style="margin-top:06px;padding-left:5px;font-size: 1.20em"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="" style="overflow: auto;height:95%">
                                                        <div class="table-responsive">
                                                            <div id="load">
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                Sources
                                                                            </th>
                                                                            <th>Current Avg (A)</th>
                                                                            <th>Voltage L-L Avg (V)</th>
                                                                            <th>Total Power(kW)</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody style="overflow: auto;height: 100px">
                                                                        <?php include("unit2_realtime.php"); ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.PNG" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            Syrup Room L4</h6>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U2_Current_Avg_Amp / 10, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW1_U2_Voltage_LL_V, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW1_U2_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U2_Current_Avg_Amp == 0 && $GW1_U2_Voltage_LL_V == 0 && $GW1_U2_ActivePower_Total_kW == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U2_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.PNG" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            Juice Room L3</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U3_Current_Avg_Amp / 10, 2); ?>(A)
                                                                            </td>
                                                                            <td><?php echo round($GW1_U3_Voltage_LL_V, 2); ?>(V)
                                                                            </td>
                                                                            <td><?php echo round($GW1_U3_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U3_Current_Avg_Amp == 0 && $GW1_U3_Voltage_LL_V == 0 && $GW1_U3_ActivePower_Total_kW == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U3_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.PNG" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            New Boiler</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U4_Current_Avg_Amp / 10, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW1_U4_Voltage_LL_V, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW1_U4_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U4_Current_Avg_Amp == 0 && $GW1_U4_Voltage_LL_V == 0 && $GW1_U4_ActivePower_Total_kW == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U4_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.PNG" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            Sugar Dissolving No.1</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U5_Current_Avg_Amp / 10, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW1_U5_Voltage_LL_V / 10, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW1_U5_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U5_Current_Avg_Amp == 0 && $GW1_U5_Voltage_LL_V == 0 && $GW1_U5_ActivePower_Total_kW == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U5_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.PNG" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            Syrup Room L5</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW3_U3_Current_Avg_Amp, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW3_U3_Voltage_LL_V, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW3_U3_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW3_U3_Current_Avg_Amp == 0 && $GW3_U3_Voltage_LL_V == 0 && $GW3_U3_ActivePower_Total_kW == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW3_U3_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.PNG" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            Sugar Dissolving No.2</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW3_U4_Current_Avg_Amp, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW3_U4_Voltage_LL_V, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW3_U4_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW3_U4_Current_Avg_Amp == 0 && $GW3_U4_Voltage_LL_V == 0 && $GW3_U4_ActivePower_Total_kW == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW3_U4_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.PNG" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            Oven L5</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW3_U5_Current_Avg_Amp, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW3_U5_Voltage_LL_V, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW3_U5_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW3_U5_Current_Avg_Amp == 0 && $GW3_U5_Voltage_LL_V == 0 && $GW3_U5_ActivePower_Total_kW == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW3_U5_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                            <!-- Main-body end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $("#load").load(window.location.href + " #load");
            }, 5000);
        });
    </script>
    <script type="text/javascript">
        $('.items').slick({

            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>
    <script type="text/javascript">
        old_boiler('Today');
        juice_room('Today');
        new_boiler('Today');
        sugar_room('Today');
        Syrup_Room('Today');
        Shrink_Tunnel('Today');
        Sugar_Dissolving('Today');

        function old_boiler() {
            var str = document.getElementById("total_energy_option_ECR1").value;
            var jsonData = $.ajax({
                url: "calculations/ECRoffEnergy/OldBoiler.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_old_boiler").html(jsonData);
        }

        function juice_room() {
            var str = document.getElementById("total_energy_option_ECR2").value;
            var jsonData = $.ajax({
                url: "calculations/ECRoffEnergy/JuiceRoom.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_juice_room").html(jsonData);
        }

        function new_boiler() {
            var str = document.getElementById("total_energy_option_ECR3").value;
            var jsonData = $.ajax({
                url: "calculations/ECRoffEnergy/NewBoiler.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_new_boiler").html(jsonData);
        }

        function sugar_room() {
            var str = document.getElementById("total_energy_option_ECR4").value;
            var jsonData = $.ajax({
                url: "calculations/ECRoffEnergy/SugarRoom.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_sugar_room").html(jsonData);
        }

        function ECRoffEnergy() {
            var str = document.getElementById("total_energy_option_ECR").value;
            var jsonData = $.ajax({
                url: "calculations/unit2/ECRoffEnergy.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_ECR").html(jsonData);
        }

        function Syrup_Room() {
            var str = document.getElementById("total_energy_option_Syrup").value;
            var jsonData = $.ajax({
                url: "calculations/ECRoffEnergy/syrup.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_Syrup").html(jsonData);
        }

        function Shrink_Tunnel() {
            var str = document.getElementById("total_energy_option_Shrink").value;
            var jsonData = $.ajax({
                url: "calculations/ECRoffEnergy/shrink.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_Shrink").html(jsonData);
        }

        function Sugar_Dissolving() {
            var str = document.getElementById("total_energy_option_Sugar").value;
            var jsonData = $.ajax({
                url: "calculations/ECRoffEnergy/Sugar_Dissolving.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_Sugar").html(jsonData);
        }
        ECRoffEnergy('Today');
        //ECR
        function energy1(str2) {
            am4core.ready(function() {
                am4core.useTheme(am4themes_animated);
                var chart = am4core.create('energy_chart1', am4charts.XYChart)
                if (chart.logo) {
                    chart.logo.disabled = true;
                }
                chart.legend = new am4charts.Legend();
                chart.legend.position = "bottom";
                chart.legend.valign = "middle";
                chart.legend.maxWidth = 180;
                chart.legend.scrollable = true;
                var markerTemplate = chart.legend.markers.template;
                markerTemplate.width = 9;
                markerTemplate.height = 9;
                chart.legend.fontSize = 12;
                chart.legend.paddingBottom = 5
                var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
                xAxis.dataFields.category = 'meter'
                xAxis.renderer.grid.template.location = 0;
                xAxis.renderer.line.strokeOpacity = 1;
                xAxis.renderer.minGridDistance = 50;
                // xAxis.renderer.labels.template.fontSize = 10;
                xAxis.renderer.cellStartLocation = 0.1;
                xAxis.renderer.cellEndLocation = 0.9;
                chart.colors.list = [
                    am4core.color("#FFC75F"), //Syrup Room L4
                    am4core.color("#F9F871"), // Juice Room L3
                    am4core.color("#028cc7"), // New Boiler
                    am4core.color("#0245f6"), // Sugar Dissolving No.1
                ];
                var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
                yAxis.renderer.line.strokeOpacity = 0.9;
                yAxis.renderer.line.strokeWidth = 1;
                yAxis.renderer.line.stroke = am4core.color("black");
                // yAxis.min = 0;
                // yAxis.max = 800;
                function createSeries(value, name) {
                    var series = chart.series.push(new am4charts.ColumnSeries())
                    series.dataFields.valueY = value
                    series.dataFields.categoryX = 'meter'
                    series.name = name
                    series.columns.template.tooltipX = am4core.percent(100);
                    series.columns.template.tooltipY = am4core.percent(0);
                    series.columns.template.tooltipText = "{name}\nKwh:{valueY}";
                    return series;
                }
                chart.dataSource.url = "calculations/unit2barchart/ECRSec.php?value=" + str2;
                //calculations/database4.php
                // createSeries('value1', 'Main LT');
                createSeries('Old Boiler', 'Syrup Room L4');
                createSeries('Juice Room', 'Juice Room L3');
                createSeries('New Boiler', 'New Boiler');
                createSeries('Sugar Room', 'Sugar Dissolving No.1');
                createSeries('Syrup Room', 'Syrup Room L5');
                createSeries('Sugar Dissolving', 'Sugar Dissolving No.2');
                createSeries('Shrink Tunnel', 'Oven L5');
                chart.cursor = new am4charts.XYCursor();

                yAxis.cursorTooltipEnabled = false;
                xAxis.cursorTooltipEnabled = false;

                chart.responsive.useDefault = false
                chart.responsive.enabled = true;

                chart.responsive.rules.push({
                    relevant: function(target) {
                        if (target.pixelWidth <= 400) {
                            return true;
                        }

                        return false;
                    },
                    state: function(target, stateId) {
                        if (target instanceof am4charts.Chart) {
                            var state = target.states.create(stateId);
                            state.properties.paddingTop = 5;
                            state.properties.paddingRight = 15;
                            state.properties.paddingBottom = 5;
                            state.properties.paddingLeft = 0;
                            return state;
                        }
                        return null;
                    }
                });
                chart.exporting.menu = new am4core.ExportMenu();
                // chart.exporting.export("png");
                chart.exporting.menu.align = "right";
                chart.exporting.menu.verticalAlign = "top";
                chart.exporting.filePrefix = 'ECR Energy Usage';
                chart.exporting.formatOptions.getKey("json").disabled = true;
                chart.exporting.formatOptions.getKey("html").disabled = true;
                chart.exporting.formatOptions.getKey("csv").disabled = true;
                chart.exporting.formatOptions.getKey("pdf").disabled = true;
                chart.exporting.menu.items[0].icon =
                    "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxNnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxNiAxNiIgd2lkdGg9IjE2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6c2tldGNoPSJodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2gvbnMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48dGl0bGUvPjxkZWZzLz48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJJY29ucyB3aXRoIG51bWJlcnMiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIj48ZyBmaWxsPSIjMDAwMDAwIiBpZD0iR3JvdXAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03MjAuMDAwMDAwLCAtNDMyLjAwMDAwMCkiPjxwYXRoIGQ9Ik03MjEsNDQ2IEw3MzMsNDQ2IEw3MzMsNDQzIEw3MzUsNDQzIEw3MzUsNDQ2IEw3MzUsNDQ4IEw3MjEsNDQ4IFogTTcyMSw0NDMgTDcyMyw0NDMgTDcyMyw0NDYgTDcyMSw0NDYgWiBNNzI2LDQzMyBMNzMwLDQzMyBMNzMwLDQ0MCBMNzMyLDQ0MCBMNzI4LDQ0NSBMNzI0LDQ0MCBMNzI2LDQ0MCBaIE03MjYsNDMzIiBpZD0iUmVjdGFuZ2xlIDIxNyIvPjwvZz48L2c+PC9zdmc+";
            });
        }
        energy1("Last 7 Days");
        //pie chart
        energy_pie2("Today");

        function energy_pie2(str2) {
            am4core.ready(function() {
                am4core.useTheme(am4themes_animated);
                var chart = am4core.create("energy_cost_pie_chart2", am4charts.PieChart3D);
                if (chart.logo) {
                    chart.logo.disabled = true;
                }
                chart.hiddenState.properties.opacity = 0;
                chart.radius = am4core.percent(80);
                // this creates initial fade-in
                chart.legend = new am4charts.Legend();
                chart.legend.position = "right";
                chart.legend.valign = "middle";
                chart.legend.fontSize = 12;
                // chart.legend.fontWeight = "bold";

                chart.legend.maxWidth = 400;

                var markerTemplate = chart.legend.markers.template;
                markerTemplate.width = 9;
                markerTemplate.height = 9;
                chart.legend.paddingBottom = 5
                chart.legend.scrollable = true;
                chart.dataSource.url = "calculations/unit2Piechart/ECRoffPiechart.php?value=" + str2;
                var series = chart.series.push(new am4charts.PieSeries());
                series.dataFields.value = "value";
                series.dataFields.category = "meter";
                series.slices.template.cornerRadius = 1;
                series.slices.template.showOnInit = true;
                series.slices.template.hiddenState.properties.shiftRadius = 1;
                series.ticks.template.disabled = true;
                series.alignLabels = false;
                series.labels.template.fontSize = 12;
                series.slices.template.tooltipText = "{category}\nKwh:{value}";

                series.ticks.template.events.on("ready", hideSmall);
                series.ticks.template.events.on("visibilitychanged", hideSmall);
                series.labels.template.events.on("ready", hideSmall);
                series.labels.template.events.on("visibilitychanged", hideSmall);

                function hideSmall(ev) {
                    if (ev.target.dataItem && (ev.target.dataItem.values.value.percent < 2)) {
                        ev.target.hide();
                    } else {
                        ev.target.show();
                    }
                }
                // Set up fills hover
                // Disable sliding out of slices
                series.slices.template.states.getKey("hover").properties.shiftRadius = 0;
                series.slices.template.states.getKey("hover").properties.scale = 1.1;
                series.labels.template.text = "{value}";
                //add legend on pie //
                series.labels.template.radius = am4core.percent(-40);
                series.labels.template.fill = am4core.color("white");
                series.labels.template.relativeRotation = 90;
                series.legendSettings.valueText = "{value} Kwh";

                series.labels.template.adapter.add("radius", function(radius, target) {
                    if (target.dataItem && (target.dataItem.values.value.percent <= 0.5)) {
                        return 0;
                    }
                    return radius;
                });
                series.labels.template.adapter.add("fill", function(color, target) {
                    if (target.dataItem && (target.dataItem.values.value.percent < 0.5)) {
                        return am4core.color("white");
                    }
                    return color;
                });
                series.colors.list = [

                    am4core.color("#FFC75F"), //Syrup Room L5 L4
                    am4core.color("#F9F871"), // Juice Room L3
                    am4core.color("#028cc7"), // New Boiler
                    am4core.color("#0245f6"), // Sugar Dissolving No.1
                ];
                // Responsive
                chart.responsive.enabled = true;
                chart.responsive.rules.push({
                    relevant: function(target) {
                        if (target.pixelWidth <= 600) {
                            return true;
                        }
                        return false;
                    },
                    state: function(target, stateId) {
                        if (target instanceof am4charts.PieSeries) {
                            var state = target.states.create(stateId);

                            var labelState = target.labels.template.states.create(stateId);
                            labelState.properties.disabled = true;

                            var tickState = target.ticks.template.states.create(stateId);
                            tickState.properties.disabled = true;
                            return state;
                        }

                        return null;
                    }
                });
                chart.exporting.menu = new am4core.ExportMenu();
                // chart.exporting.export("png");
                chart.exporting.menu.align = "right";
                chart.exporting.menu.verticalAlign = "top";

                chart.exporting.filePrefix = 'ECR Energy Consumption Breakdown';
                chart.exporting.formatOptions.getKey("json").disabled = true;
                chart.exporting.formatOptions.getKey("html").disabled = true;
                chart.exporting.formatOptions.getKey("csv").disabled = true;
                chart.exporting.formatOptions.getKey("pdf").disabled = true;
                chart.exporting.menu.items[0].icon =
                    "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxNnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxNiAxNiIgd2lkdGg9IjE2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6c2tldGNoPSJodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2gvbnMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48dGl0bGUvPjxkZWZzLz48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJJY29ucyB3aXRoIG51bWJlcnMiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIj48ZyBmaWxsPSIjMDAwMDAwIiBpZD0iR3JvdXAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03MjAuMDAwMDAwLCAtNDMyLjAwMDAwMCkiPjxwYXRoIGQ9Ik03MjEsNDQ2IEw3MzMsNDQ2IEw3MzMsNDQzIEw3MzUsNDQzIEw3MzUsNDQ2IEw3MzUsNDQ4IEw3MjEsNDQ4IFogTTcyMSw0NDMgTDcyMyw0NDMgTDcyMyw0NDYgTDcyMSw0NDYgWiBNNzI2LDQzMyBMNzMwLDQzMyBMNzMwLDQ0MCBMNzMyLDQ0MCBMNzI4LDQ0NSBMNzI0LDQ0MCBMNzI2LDQ0MCBaIE03MjYsNDMzIiBpZD0iUmVjdGFuZ2xlIDIxNyIvPjwvZz48L2c+PC9zdmc+";

            });
        }
    </script>
</body>

</html>