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
                                            <h4 class="m-b-10">Grasso Section</h4>
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
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Grasso
                                                    Section</a>
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
                                                            <h5 class="card-title" style="color: black"><b>GR-1</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_G1" class="form-select" required name="option" onchange="GR_1()">
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
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_G1"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; border-right: 2px solid rgb(188, 203, 223); margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>GR-2</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_G2" class="form-select" required name="option" onchange="GR_2()">
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
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_G2"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; border-right: 2px solid rgb(188, 203, 223); margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>GR-3</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_G3" class="form-select" required name="option" onchange="GR_3()">
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
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_G3"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; border-right: 2px solid rgb(188, 203, 223); margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>GR-4</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_G4" class="form-select" required name="option" onchange="GR_4()">
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
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_G4"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; border-right: 2px solid rgb(188, 203, 223); margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>GR-5</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_G5" class="form-select" required name="option" onchange="GR_5()">
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
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_G5"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; border-right: 2px solid rgb(188, 203, 223); margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>GR-6</b>
                                                            </h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_G6" class="form-select" required name="option" onchange="GR_6()">
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
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_G6"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; border-right: 2px solid rgb(188, 203, 223); margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>GR-7</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_G7" class="form-select" required name="option" onchange="GR_7()">
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
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black " id="total_energy_value_G7"></span></b><span style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  <div class="col-lg-3 col-sm-6">
                                                <div class="" style="background:none; margin-top:10px">
                                                    <div class="card-body" style="height: 185px;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>GR-8</b>
                                                            </h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="total_energy_option_G8"
                                                                        class="form-select" required name="option"
                                                                        onchange="GR_8()">
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
                                                                <b><span style="padding-left: 1%;font-size: 34px;color: black "
                                                                        id="total_energy_value_G8"></span></b><span
                                                                    style="color: black">&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div> -->
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
                                                                    <select id="total_energy_option_GR" class="form-select" required name="option" onchange="GrassoSecEnergy()">
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
                                                                        <!-- <option value="This Month">This Month</option> -->
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <center>
                                                            <img src="assets/images/GR.png" alt="" height="auto" width="100%">
                                                            <div>
                                                                <b><span style="padding-left: 1%;font-size: 34px; " id="total_energy_value_GR"></span></b><span>&nbsp&nbspkWh</span>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-4">
                                                <div class="card" style="border-radius: 10px !important;background-color:#e6eaf3;" id="chart-container">
                                                    <div class="card-body" style="height: 350px;border-top-style: solid;border-radius: 10px !important;border-color: #206bc4;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: black"><b>Energy Consumption
                                                                    Breakdown</b></h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_cost_pie_option1" class="form-select" required name="option" onchange="energy_pie1(this.options[this.selectedIndex].value);">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="Last 30 Days">Last 30 Days
                                                                        </option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <!-- <option value="This Year">This Year</option> -->
                                                                        <option value="This Week">This Week</option>
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
                                                        <div id="energy_cost_pie_chart1" style="width: 100%;height:95%">
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
                                                                    <select id="energy_option_GR" class="form-select" required name="option" onchange="energy_GR(this.options[this.selectedIndex].value);">
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
                                                        <div class="card-body" id="energy_GR" style="width: 105%;height:100%;margin-left:-55px"></div>
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
                                                                <table class="table table-hover" st>
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
                                                                    <tbody style="overflow: scroll;height: 100px">
                                                                        <?php include("unit2_realtime.php"); ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.png" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            GR-1</h6>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U19_Current_Avg_Amp / 10, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW1_U19_Voltage_LL_V / 10, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW1_U19_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U19_ActivePower_Total_kW == 0 && $GW1_U19_Voltage_LL_V == 0 && $GW1_U19_Current_Avg_Amp == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U19_ActivePower_Total_kW == 0) { ?>
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
                                                                                    <img src="assets\images\Capture.png" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            GR-2</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U18_Current_Avg_Amp / 10, 2); ?>(A)
                                                                            </td>
                                                                            <td><?php echo round($GW1_U18_Voltage_LL_V / 10, 2); ?>(V)
                                                                            </td>
                                                                            <td><?php echo round($GW1_U18_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U18_ActivePower_Total_kW == 0 && $GW1_U18_Voltage_LL_V == 0 && $GW1_U18_Current_Avg_Amp == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U18_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green.png" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.png" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            GR-3</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U17_Current_Avg_Amp / 10, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW1_U17_Voltage_LL_V / 10, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW1_U17_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U17_ActivePower_Total_kW == 0 && $GW1_U17_Voltage_LL_V == 0 && $GW1_U17_Current_Avg_Amp == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U17_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green.png" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.png" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            GR-4</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U16_Current_Avg_Amp / 10, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW1_U16_Voltage_LL_V / 10, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW1_U16_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U16_ActivePower_Total_kW == 0 && $GW1_U16_Voltage_LL_V == 0 && $GW1_U16_Current_Avg_Amp == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U16_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green.png" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.png" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            GR-5
                                                                                        </h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U15_Current_Avg_Amp / 10, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW1_U15_Voltage_LL_V / 10, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW1_U15_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U15_ActivePower_Total_kW == 0 && $GW1_U15_Voltage_LL_V == 0 && $GW1_U15_Current_Avg_Amp == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U15_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green.png" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.png" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            GR-6</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U20_Current_Avg_Amp / 10, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW1_U20_Voltage_LL_V / 10, 2); ?>(V)
                                                                            </td>
                                                                            <td><?php echo round($GW1_U20_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U20_ActivePower_Total_kW == 0 && $GW1_U20_Voltage_LL_V == 0 && $GW1_U20_Current_Avg_Amp == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U20_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green.png" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } ?>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>

                                                                                <div class="d-inline-block align-middle">
                                                                                    <img src="assets\images\Capture.png" alt="user image" class="img-40 align-top m-r-15">
                                                                                    <div class="d-inline-block">
                                                                                        <h6 style="font-size:medium;">
                                                                                            GR-7</h6>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo round($GW1_U21_Current_Avg_Amp / 10, 2); ?>
                                                                                (A)</td>
                                                                            <td><?php echo round($GW1_U21_Voltage_LL_V / 10, 2); ?>
                                                                                (V)</td>
                                                                            <td><?php echo round($GW1_U21_ActivePower_Total_kW, 2); ?>
                                                                                (kW)</td>
                                                                            <?php if ($GW1_U21_ActivePower_Total_kW == 0 && $GW1_U21_Voltage_LL_V == 0 && $GW1_U21_Current_Avg_Amp == 0) { ?>
                                                                                <td><img src="assets/images/red_bl.gif" style="height: 23px; width: 23px;">
                                                                                </td>
                                                                            <?php } elseif ($GW1_U21_ActivePower_Total_kW == 0) { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/yell_bl.gif" style="height: 23px; width: 23px;">
                                                                                    </td>
                                                                                </center>
                                                                            <?php } else { ?>
                                                                                <center>
                                                                                    <td>
                                                                                        <img src="assets/images/green.png" style="height: 23px; width: 23px;">
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        GrassoSecEnergy('Today');
        GR_1('Today');
        GR_2('Today');
        GR_3('Today');
        GR_4('Today');
        GR_5('Today');
        GR_6('Today');
        GR_7('Today');

        function GR_1() {
            var str = document.getElementById("total_energy_option_G1").value;
            var jsonData = $.ajax({
                url: "calculations/GrassoSecEnergy/GrassoSecEnergy1.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_G1").html(jsonData);
        }

        function GR_2() {
            var str = document.getElementById("total_energy_option_G2").value;
            var jsonData = $.ajax({
                url: "calculations/GrassoSecEnergy/GrassoSecEnergy2.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_G2").html(jsonData);
        }

        function GR_3() {
            var str = document.getElementById("total_energy_option_G3").value;
            var jsonData = $.ajax({
                url: "calculations/GrassoSecEnergy/GrassoSecEnergy3.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_G3").html(jsonData);
        }

        function GR_4() {
            var str = document.getElementById("total_energy_option_G4").value;
            var jsonData = $.ajax({
                url: "calculations/GrassoSecEnergy/GrassoSecEnergy4.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_G4").html(jsonData);
        }

        function GR_5() {
            var str = document.getElementById("total_energy_option_G5").value;
            var jsonData = $.ajax({
                url: "calculations/GrassoSecEnergy/GrassoSecEnergy5.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_G5").html(jsonData);
        }

        function GR_6() {
            var str = document.getElementById("total_energy_option_G6").value;
            var jsonData = $.ajax({
                url: "calculations/GrassoSecEnergy/GrassoSecEnergy6.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_G6").html(jsonData);
        }

        function GR_7() {
            var str = document.getElementById("total_energy_option_G7").value;
            var jsonData = $.ajax({
                url: "calculations/GrassoSecEnergy/GrassoSecEnergy7.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_G7").html(jsonData);
        }

        function GrassoSecEnergy() {
            var str = document.getElementById("total_energy_option_GR").value;
            var jsonData = $.ajax({
                url: "calculations/unit2/GrassoSecEnergy.php?value=" + str,
                dataType: "json",
                async: false,
            }).responseText;
            $("#total_energy_value_GR").html(jsonData);
        }

        //pie chart
        energy_pie1("Today");

        function energy_pie1(str2) {
            am4core.ready(function() {
                am4core.useTheme(am4themes_animated);
                var chart = am4core.create("energy_cost_pie_chart1", am4charts.PieChart3D);
                if (chart.logo) {
                    chart.logo.disabled = true;
                }
                chart.hiddenState.properties.opacity = 0;
                chart.radius = am4core.percent(80);
                // this creates initial fade-in
                chart.legend = new am4charts.Legend();
                chart.legend.position = "right";
                chart.legend.valign = "middle";
                chart.legend.fontSize = 16;
                // chart.legend.fontWeight = "bold";
                chart.legend.maxHeight = 200;
                chart.legend.maxWidth = 400;
                var markerTemplate = chart.legend.markers.template;
                markerTemplate.width = 9;
                markerTemplate.height = 9;
                chart.legend.paddingBottom = 5
                chart.legend.scrollable = true;
                chart.dataSource.url = "calculations/unit2Piechart/GrassoSecPiechart.php?value=" + str2;
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

                    am4core.color("#3d019f"), // Grasso 1
                    am4core.color("#8301ab"), // Grasso 2
                    am4core.color("#a31749"), // Grasso 3
                    am4core.color("#f62611"), // Grasso 4
                    am4core.color("#808000"), // Grasso 5
                    am4core.color("#f39402"), // Grasso 6
                    am4core.color("#313131"), // Grasso 7
                    // am4core.color("#949494") // Grasso 8
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
                chart.exporting.filePrefix = 'GR Energy Consumption Breakdown';
                chart.exporting.formatOptions.getKey("json").disabled = true;
                chart.exporting.formatOptions.getKey("html").disabled = true;
                chart.exporting.formatOptions.getKey("csv").disabled = true;
                chart.exporting.formatOptions.getKey("pdf").disabled = true;
                chart.exporting.menu.items[0].icon =
                    "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxNnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxNiAxNiIgd2lkdGg9IjE2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6c2tldGNoPSJodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2gvbnMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48dGl0bGUvPjxkZWZzLz48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJJY29ucyB3aXRoIG51bWJlcnMiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIj48ZyBmaWxsPSIjMDAwMDAwIiBpZD0iR3JvdXAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03MjAuMDAwMDAwLCAtNDMyLjAwMDAwMCkiPjxwYXRoIGQ9Ik03MjEsNDQ2IEw3MzMsNDQ2IEw3MzMsNDQzIEw3MzUsNDQzIEw3MzUsNDQ2IEw3MzUsNDQ4IEw3MjEsNDQ4IFogTTcyMSw0NDMgTDcyMyw0NDMgTDcyMyw0NDYgTDcyMSw0NDYgWiBNNzI2LDQzMyBMNzMwLDQzMyBMNzMwLDQ0MCBMNzMyLDQ0MCBMNzI4LDQ0NSBMNzI0LDQ0MCBMNzI2LDQ0MCBaIE03MjYsNDMzIiBpZD0iUmVjdGFuZ2xlIDIxNyIvPjwvZz48L2c+PC9zdmc+";

            });
        }
        //Grasso bar
        function energy_GR(str2) {
            am4core.ready(function() {
                am4core.useTheme(am4themes_animated);
                var chart = am4core.create('energy_GR', am4charts.XYChart)
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
                    am4core.color("#3d019f"), // Grasso 1
                    am4core.color("#8301ab"), // Grasso 2
                    am4core.color("#a31749"), // Grasso 3
                    am4core.color("#f62611"), // Grasso 4
                    am4core.color("#808000"), // Grasso 5
                    am4core.color("#f39402"), // Grasso 6
                    am4core.color("#313131"), // Grasso 7
                    // am4core.color("#949494") // Grasso 8
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
                    // var bullet = series.bullets.push(new am4charts.LabelBullet())
                    //         bullet.interactionsEnabled = false
                    //         bullet.dy = 20;
                    //         bullet.label.text = '[bold]{valueY}[/bold]'
                    //         bullet.label.fontSize= 10;
                    //         bullet.label.fill = am4core.color('#ffffff')
                    return series;
                }
                chart.dataSource.url = "calculations/unit2barchart/GrassoSec.php?value=" + str2;
                //calculations/database4.php
                // createSeries('value1', 'Main LT');
                createSeries('GR_1', 'G1');
                createSeries('GR_2', 'G2');
                createSeries('GR_3', 'G3');
                createSeries('GR_4', 'G4');
                createSeries('GR_5', 'G5');
                createSeries('GR_6', 'G6');
                createSeries('GR_7', 'G7');
                // createSeries('value9', 'G8');
                chart.cursor = new am4charts.XYCursor();

                yAxis.cursorTooltipEnabled = false;
                xAxis.cursorTooltipEnabled = false;
                chart.exporting.menu = new am4core.ExportMenu();
                // chart.exporting.export("png");
                chart.exporting.menu.align = "right";
                chart.exporting.menu.verticalAlign = "top";
                chart.exporting.filePrefix = 'GR Energy Usage';
                chart.exporting.formatOptions.getKey("json").disabled = true;
                chart.exporting.formatOptions.getKey("html").disabled = true;
                chart.exporting.formatOptions.getKey("csv").disabled = true;
                chart.exporting.formatOptions.getKey("pdf").disabled = true;
                chart.exporting.menu.items[0].icon =
                    "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxNnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxNiAxNiIgd2lkdGg9IjE2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6c2tldGNoPSJodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2gvbnMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48dGl0bGUvPjxkZWZzLz48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJJY29ucyB3aXRoIG51bWJlcnMiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIj48ZyBmaWxsPSIjMDAwMDAwIiBpZD0iR3JvdXAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03MjAuMDAwMDAwLCAtNDMyLjAwMDAwMCkiPjxwYXRoIGQ9Ik03MjEsNDQ2IEw3MzMsNDQ2IEw3MzMsNDQzIEw3MzUsNDQzIEw3MzUsNDQ2IEw3MzUsNDQ4IEw3MjEsNDQ4IFogTTcyMSw0NDMgTDcyMyw0NDMgTDcyMyw0NDYgTDcyMSw0NDYgWiBNNzI2LDQzMyBMNzMwLDQzMyBMNzMwLDQ0MCBMNzMyLDQ0MCBMNzI4LDQ0NSBMNzI0LDQ0MCBMNzI2LDQ0MCBaIE03MjYsNDMzIiBpZD0iUmVjdGFuZ2xlIDIxNyIvPjwvZz48L2c+PC9zdmc+";
            });
        }
        energy_GR("Last 7 Days");
    </script>

</body>

</html>