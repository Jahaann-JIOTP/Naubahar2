<?php
session_start();
if(!isset($_SESSION['auth']))
{
  // not logged in
  header('Location:index.php');
}
?>
<?php
$url = "http://13.234.241.103:1880/latestnaubahar1";
$json = file_get_contents($url);
$msg = json_decode($json, true);
$U_1_Status = 0;
$U_2_Status = 0;
$U_3_Status = 0;
$U_4_Status = 0;
$U_5_Status = 0;
$U_6_Status = 0;
$U_7_Status = 0;
$U_8_Status = 0;
$U_9_Status = 0;
$U_10_Status = 0;
$U_11_Status = 0;
$U_12_Status = 0;
$U_13_Status = 0;
$U_14_Status = 0;
$U_15_Status = 0;
$U_16_Status = 0;
$U_17_Status = 0;
// /time
$Time=0;
if(isset( $msg["Time"]))
$Time = $msg["Time"];
date_default_timezone_set("Asia/Karachi"); 
$start_time = date('Y-m-d H:i:s', (time() - 60 * 5));
$end_time = date('Y-m-d H:i:s', (time()));
//current avg
$U_1_Current_Avg_Amp= 0;
$U_2_Current_Avg_Amp = 0;
$U_3_Current_Avg_Amp = 0;
$U_4_Current_Avg_Amp = 0;
$U_5_Current_Avg_Amp = 0;
$U_6_Current_Avg_Amp = 0;
$U_7_Current_Avg_Amp = 0;
$U_8_Current_Avg_Amp = 0;
$U_9_Current_Avg_Amp=0;
$U_10_Current_Avg_Amp=0;
$U_11_Current_Avg_Amp=0;
$U_12_Current_Avg_Amp=0;
$U_13_Current_Avg_Amp=0;
$U_14_Current_Avg_Amp=0;
$U_15_Current_Avg_Amp=0;
$U_16_Current_Avg_Amp=0;
$U_17_Current_Avg_Amp=0;

if(isset( $msg["U_1_Current_Avg_Amp"]))
$U_1_Current_Avg_Amp = $msg["U_1_Current_Avg_Amp"];
if(isset( $msg["U_2_Current_Avg_Amp"]))
$U_2_Current_Avg_Amp = $msg["U_2_Current_Avg_Amp"];
if(isset( $msg["U_3_Current_Avg_Amp"]))
$U_3_Current_Avg_Amp = $msg["U_3_Current_Avg_Amp"];
if(isset( $msg["U_4_Current_Avg_Amp"]))
$U_4_Current_Avg_Amp = $msg["U_4_Current_Avg_Amp"];
if(isset( $msg["U_5_Current_Avg_Amp"]))
$U_5_Current_Avg_Amp = $msg["U_5_Current_Avg_Amp"];
if(isset( $msg["U_6_Current_Avg_Amp"]))
$U_6_Current_Avg_Amp = $msg["U_6_Current_Avg_Amp"];
if(isset( $msg["U_7_Current_Avg_Amp"]))
$U_7_Current_Avg_Amp = $msg["U_7_Current_Avg_Amp"];
if(isset( $msg["U_8_Current_Avg_Amp"]))
$U_8_Current_Avg_Amp = $msg["U_8_Current_Avg_Amp"];
if(isset( $msg["U_9_Current_Avg_Amp"]))
$U_9_Current_Avg_Amp= $msg["U_9_Current_Avg_Amp"];
if(isset( $msg["U_10_Current_Avg_Amp"]))
$U_10_Current_Avg_Amp = $msg["U_10_Current_Avg_Amp"];
if(isset( $msg["U_11_Current_Avg_Amp"]))
$U_11_Current_Avg_Amp = $msg["U_11_Current_Avg_Amp"];
if(isset( $msg["U_12_Current_Avg_Amp"]))
$U_12_Current_Avg_Amp = $msg["U_12_Current_Avg_Amp"];
if(isset( $msg["U_13_Current_Avg_Amp"]))
$U_13_Current_Avg_Amp = $msg["U_13_Current_Avg_Amp"];
if(isset( $msg["U_14_Current_Avg_Amp"]))
$U_14_Current_Avg_Amp = $msg["U_14_Current_Avg_Amp"];

if(isset( $msg["U_15_Current_Avg_Amp"]))
$U_15_Current_Avg_Amp = $msg["U_15_Current_Avg_Amp"];
if(isset( $msg["U_16_Current_Avg_Amp"]))
$U_16_Current_Avg_Amp = $msg["U_16_Current_Avg_Amp"];

if(isset( $msg["U_17_Current_Avg_Amp"]))
$U_17_Current_Avg_Amp = $msg["U_17_Current_Avg_Amp"];
//voltage avg
$U_1_Voltage_LL_V= 0;
$U_2_Voltage_LL_V = 0;
$U_3_Voltage_LL_V = 0;
$U_4_Voltage_LL_V = 0;
$U_5_Voltage_LL_V = 0;
$U_6_Voltage_LL_V = 0;
$U_7_Voltage_LL_V = 0;
$U_8_Voltage_LL_V = 0;
$U_9_Voltage_LL_V=0;
$U_10_Voltage_LL_V=0;
$U_11_Voltage_LL_V=0;
$U_12_Voltage_LL_V=0;
$U_13_Voltage_LL_V=0;
$U_14_Voltage_LL_V=0;
$U_15_Voltage_LL_V=0;
$U_16_Voltage_LL_V=0;
$U_17_Voltage_LL_V=0;

if(isset( $msg["U_1_Voltage_LL_V"]))
$U_1_Voltage_LL_V = $msg["U_1_Voltage_LL_V"];
if(isset( $msg["U_2_Voltage_LL_V"]))
$U_2_Voltage_LL_V = $msg["U_2_Voltage_LL_V"];
if(isset( $msg["U_3_Voltage_LL_V"]))
$U_3_Voltage_LL_V = $msg["U_3_Voltage_LL_V"];
if(isset( $msg["U_4_Voltage_LL_V"]))
$U_4_Voltage_LL_V = $msg["U_4_Voltage_LL_V"];
if(isset( $msg["U_5_Voltage_LL_V"]))
$U_5_Voltage_LL_V = $msg["U_5_Voltage_LL_V"];
if(isset( $msg["U_6_Voltage_LL_V"]))
$U_6_Voltage_LL_V = $msg["U_6_Voltage_LL_V"];
if(isset( $msg["U_7_Voltage_LL_V"]))
$U_7_Voltage_LL_V = $msg["U_7_Voltage_LL_V"];
if(isset( $msg["U_8_Voltage_LL_V"]))
$U_8_Voltage_LL_V = $msg["U_8_Voltage_LL_V"];
if(isset( $msg["U_9_Voltage_LL_V"]))
$U_9_Voltage_LL_V= $msg["U_9_Voltage_LL_V"];
if(isset( $msg["U_10_Voltage_LL_V"]))
$U_10_Voltage_LL_V = $msg["U_10_Voltage_LL_V"];
if(isset( $msg["U_11_Voltage_LL_V"]))
$U_11_Voltage_LL_V = $msg["U_11_Voltage_LL_V"];
if(isset( $msg["U_12_Voltage_LL_V"]))
$U_12_Voltage_LL_V = $msg["U_12_Voltage_LL_V"];
if(isset( $msg["U_13_Voltage_LL_V"]))
$U_13_Voltage_LL_V = $msg["U_13_Voltage_LL_V"];
if(isset( $msg["U_14_Voltage_LL_V"]))
$U_14_Voltage_LL_V = $msg["U_14_Voltage_LL_V"];

if(isset( $msg["U_15_Voltage_LL_V"]))
$U_15_Voltage_LL_V = $msg["U_15_Voltage_LL_V"];
if(isset( $msg["U_16_Voltage_LL_V"]))
$U_16_Voltage_LL_V = $msg["U_16_Voltage_LL_V"];

if(isset( $msg["U_17_Voltage_LL_V"]))
$U_17_Voltage_LL_V = $msg["U_17_Voltage_LL_V"];
// <!-- //avtive power -->
$U_1_ActivePower_Total_kW= 0;
$U_2_ActivePower_Total_kW = 0;
$U_3_ActivePower_Total_kW = 0;
$U_4_ActivePower_Total_kW = 0;
$U_5_ActivePower_Total_kW = 0;
$U_6_ActivePower_Total_kW = 0;
$U_7_ActivePower_Total_kW = 0;
$U_8_ActivePower_Total_kW = 0;
$U_9_ActivePower_Total_kW=0;
$U_10_ActivePower_Total_kW=0;
$U_11_ActivePower_Total_kW=0;
$U_12_ActivePower_Total_kW=0;
$U_13_ActivePower_Total_kW=0;
$U_14_ActivePower_Total_kW=0;
$U_15_ActivePower_Total_kW=0;
$U_16_ActivePower_Total_kW=0;
$U_17_ActivePower_Total_kW=0;

if(isset( $msg["U_1_ActivePower_Total_kW"]))
$U_1_ActivePower_Total_kW = $msg["U_1_ActivePower_Total_kW"];
if(isset( $msg["U_2_ActivePower_Total_kW"]))
$U_2_ActivePower_Total_kW = $msg["U_2_ActivePower_Total_kW"];
if(isset( $msg["U_3_ActivePower_Total_kW"]))
$U_3_ActivePower_Total_kW = $msg["U_3_ActivePower_Total_kW"];
if(isset( $msg["U_4_ActivePower_Total_kW"]))
$U_4_ActivePower_Total_kW = $msg["U_4_ActivePower_Total_kW"];
if(isset( $msg["U_5_ActivePower_Total_kW"]))
$U_5_ActivePower_Total_kW = $msg["U_5_ActivePower_Total_kW"];
if(isset( $msg["U_6_ActivePower_Total_kW"]))
$U_6_ActivePower_Total_kW = $msg["U_6_ActivePower_Total_kW"];
if(isset( $msg["U_7_ActivePower_Total_kW"]))
$U_7_ActivePower_Total_kW = $msg["U_7_ActivePower_Total_kW"];
if(isset( $msg["U_8_ActivePower_Total_kW"]))
$U_8_ActivePower_Total_kW = $msg["U_8_ActivePower_Total_kW"];
if(isset( $msg["U_9_ActivePower_Total_kW"]))
$U_9_ActivePower_Total_kW= $msg["U_9_ActivePower_Total_kW"];
if(isset( $msg["U_10_ActivePower_Total_kW"]))
$U_10_ActivePower_Total_kW = $msg["U_10_ActivePower_Total_kW"];
if(isset( $msg["U_11_ActivePower_Total_kW"]))
$U_11_ActivePower_Total_kW = $msg["U_11_ActivePower_Total_kW"];
if(isset( $msg["U_12_ActivePower_Total_kW"]))
$U_12_ActivePower_Total_kW = $msg["U_12_ActivePower_Total_kW"];
if(isset( $msg["U_13_ActivePower_Total_kW"]))
$U_13_ActivePower_Total_kW = $msg["U_13_ActivePower_Total_kW"];
if(isset( $msg["U_14_ActivePower_Total_kW"]))
$U_14_ActivePower_Total_kW = $msg["U_14_ActivePower_Total_kW"];

if(isset( $msg["U_15_ActivePower_Total_kW"]))
$U_15_ActivePower_Total_kW = $msg["U_15_ActivePower_Total_kW"];
if(isset( $msg["U_16_ActivePower_Total_kW"]))
$U_16_ActivePower_Total_kW = $msg["U_16_ActivePower_Total_kW"];
if(isset( $msg["U_17_ActivePower_Total_kW"]))
$U_17_ActivePower_Total_kW = $msg["U_17_ActivePower_Total_kW"];
//Reactve power//
$U_1_ReactivePower_Total_kVAR= 0;
$U_2_ReactivePower_Total_kVAR = 0;
$U_3_ReactivePower_Total_kVAR = 0;
$U_4_ReactivePower_Total_kVAR = 0;
$U_5_ReactivePower_Total_kVAR = 0;
$U_6_ReactivePower_Total_kVAR = 0;
$U_7_ReactivePower_Total_kVAR = 0;
$U_8_ReactivePower_Total_kVAR = 0;
$U_9_ReactivePower_Total_kVAR=0;
$U_10_ReactivePower_Total_kVAR=0;
$U_11_ReactivePower_Total_kVAR=0;
$U_12_ReactivePower_Total_kVAR=0;
$U_13_ReactivePower_Total_kVAR=0;
$U_14_ReactivePower_Total_kVAR=0;
$U_15_ReactivePower_Total_kVAR=0;
$U_16_ReactivePower_Total_kVAR=0;
$U_17_ReactivePower_Total_kVAR=0;

if(isset( $msg["U_1_ReactivePower_Total_kVAR"]))
$U_1_ReactivePower_Total_kVAR = $msg["U_1_ReactivePower_Total_kVAR"];
if(isset( $msg["U_2_ReactivePower_Total_kVAR"]))
$U_2_ReactivePower_Total_kVAR = $msg["U_2_ReactivePower_Total_kVAR"];
if(isset( $msg["U_3_ReactivePower_Total_kVAR"]))
$U_3_ReactivePower_Total_kVAR = $msg["U_3_ReactivePower_Total_kVAR"];
if(isset( $msg["U_4_ReactivePower_Total_kVAR"]))
$U_4_ReactivePower_Total_kVAR = $msg["U_4_ReactivePower_Total_kVAR"];
if(isset( $msg["U_5_ReactivePower_Total_kVAR"]))
$U_5_ReactivePower_Total_kVAR = $msg["U_5_ReactivePower_Total_kVAR"];
if(isset( $msg["U_6_ReactivePower_Total_kVAR"]))
$U_6_ReactivePower_Total_kVAR = $msg["U_6_ReactivePower_Total_kVAR"];
if(isset( $msg["U_7_ReactivePower_Total_kVAR"]))
$U_7_ReactivePower_Total_kVAR = $msg["U_7_ReactivePower_Total_kVAR"];
if(isset( $msg["U_8_ReactivePower_Total_kVAR"]))
$U_8_ReactivePower_Total_kVAR = $msg["U_8_ReactivePower_Total_kVAR"];
if(isset( $msg["U_9_ReactivePower_Total_kVAR"]))
$U_9_ReactivePower_Total_kVAR= $msg["U_9_ReactivePower_Total_kVAR"];
if(isset( $msg["U_10_ReactivePower_Total_kVAR"]))
$U_10_ReactivePower_Total_kVAR = $msg["U_10_ReactivePower_Total_kVAR"];
if(isset( $msg["U_11_ReactivePower_Total_kVAR"]))
$U_11_ReactivePower_Total_kVAR = $msg["U_11_ReactivePower_Total_kVAR"];
if(isset( $msg["U_12_ReactivePower_Total_kVAR"]))
$U_12_ReactivePower_Total_kVAR = $msg["U_12_ReactivePower_Total_kVAR"];
if(isset( $msg["U_13_ReactivePower_Total_kVAR"]))
$U_13_ReactivePower_Total_kVAR = $msg["U_13_ReactivePower_Total_kVAR"];
if(isset( $msg["U_14_ReactivePower_Total_kVAR"]))
$U_14_ReactivePower_Total_kVAR = $msg["U_14_ReactivePower_Total_kVAR"];
if(isset( $msg["U_15_ReactivePower_Total_kVAR"]))
$U_15_ReactivePower_Total_kVAR = $msg["U_15_ReactivePower_Total_kVAR"];
if(isset( $msg["U_16_ReactivePower_Total_kVAR"]))
$U_16_ReactivePower_Total_kVAR = $msg["U_16_ReactivePower_Total_kVAR"];
if(isset( $msg["U_17_ReactivePower_Total_kVAR"]))
$U_17_ReactivePower_Total_kVAR = $msg["U_17_ReactivePower_Total_kVAR"];
//Reactve power//
$U_1_PowerFactor_Total= 0;
$U_2_PowerFactor_Total = 0;
$U_3_PowerFactor_Total = 0;
$U_4_PowerFactor_Total = 0;
$U_5_PowerFactor_Total = 0;
$U_6_PowerFactor_Total = 0;
$U_7_PowerFactor_Total = 0;
$U_8_PowerFactor_Total = 0;
$U_9_PowerFactor_Total=0;
$U_10_PowerFactor_Total=0;
$U_11_PowerFactor_Total=0;
$U_12_PowerFactor_Total=0;
$U_13_PowerFactor_Total=0;
$U_14_PowerFactor_Total=0;
$U_15_PowerFactor_Total=0;
$U_16_PowerFactor_Total=0;
$U_17_PowerFactor_Total=0;

if(isset( $msg["U_1_PowerFactor_Total"]))
$U_1_PowerFactor_Total = $msg["U_1_PowerFactor_Total"];
if(isset( $msg["U_2_PowerFactor_Total"]))
$U_2_PowerFactor_Total = $msg["U_2_PowerFactor_Total"];
if(isset( $msg["U_3_PowerFactor_Total"]))
$U_3_PowerFactor_Total = $msg["U_3_PowerFactor_Total"];
if(isset( $msg["U_4_PowerFactor_Total"]))
$U_4_PowerFactor_Total = $msg["U_4_PowerFactor_Total"];
if(isset( $msg["U_5_PowerFactor_Total"]))
$U_5_PowerFactor_Total = $msg["U_5_PowerFactor_Total"];
if(isset( $msg["U_6_PowerFactor_Total"]))
$U_6_PowerFactor_Total = $msg["U_6_PowerFactor_Total"];
if(isset( $msg["U_7_PowerFactor_Total"]))
$U_7_PowerFactor_Total = $msg["U_7_PowerFactor_Total"];
if(isset( $msg["U_8_PowerFactor_Total"]))
$U_8_PowerFactor_Total = $msg["U_8_PowerFactor_Total"];
if(isset( $msg["U_9_PowerFactor_Total"]))
$U_9_PowerFactor_Total= $msg["U_9_PowerFactor_Total"];
if(isset( $msg["U_10_PowerFactor_Total"]))
$U_10_PowerFactor_Total = $msg["U_10_PowerFactor_Total"];
if(isset( $msg["U_11_PowerFactor_Total"]))
$U_11_PowerFactor_Total = $msg["U_11_PowerFactor_Total"];
if(isset( $msg["U_12_PowerFactor_Total"]))
$U_12_PowerFactor_Total = $msg["U_12_PowerFactor_Total"];
if(isset( $msg["U_13_PowerFactor_Total"]))
$U_13_PowerFactor_Total = $msg["U_13_PowerFactor_Total"];
if(isset( $msg["U_14_PowerFactor_Total"]))
$U_14_PowerFactor_Total = $msg["U_14_PowerFactor_Total"];

if(isset( $msg["U_15_PowerFactor_Total"]))
$U_15_PowerFactor_Total = $msg["U_15_PowerFactor_Total"];
if(isset( $msg["U_16_PowerFactor_Total"]))
$U_16_PowerFactor_Total = $msg["U_16_PowerFactor_Total"];
if(isset( $msg["U_17_PowerFactor_Total"]))
$U_17_PowerFactor_Total = $msg["U_17_PowerFactor_Total"];

if(isset( $msg["U_1_Status"]))
$U_1_Status = $msg["U_1_Status"];
if(isset( $msg["U_2_Status"]))
$U_2_Status = $msg["U_2_Status"];
if(isset( $msg["U_3_Status"]))
$U_3_Status = $msg["U_3_Status"];
if(isset( $msg["U_4_Status"]))
$U_4_Status = $msg["U_4_Status"];
if(isset( $msg["U_5_Status"]))
$U_5_Status = $msg["U_5_Status"];
if(isset( $msg["U_6_Status"]))
$U_6_Status = $msg["U_6_Status"];
if(isset( $msg["U_7_Status"]))
$U_7_Status = $msg["U_7_Status"];
if(isset( $msg["U_8_Status"]))
$U_8_Status = $msg["U_8_Status"];
if(isset( $msg["U_9_Status"]))
$U_9_Status = $msg["U_9_Status"];
if(isset( $msg["U_10_Status"]))
$U_10_Status = $msg["U_10_Status"];
if(isset( $msg["U_11_Status"]))
$U_11_Status = $msg["U_11_Status"];
if(isset( $msg["U_12_Status"]))
$U_12_Status = $msg["U_12_Status"];
if(isset( $msg["U_13_Status"]))
$U_13_Status = $msg["U_13_Status"];
if(isset( $msg["U_14_Status"]))
$U_14_Status = $msg["U_14_Status"];
if(isset( $msg["U_15_Status"]))
$U_15_Status = $msg["U_15_Status"];
if(isset( $msg["U_16_Status"]))
$U_16_Status = $msg["U_16_Status"];
if(isset( $msg["U_17_Status"]))
$U_17_Status = $msg["U_17_Status"];
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
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h4 class="m-b-10">Status Table - Unit 1</h4>
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
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Status Table</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><br><br>
              <div class="col-xl-12 col-md-12">

                <div class="card table-card" style=" border: 1px solid #9f9fa3; border-radius: 5px;background-color: #fbfbfb;margin: 5px 5px 5px 0px;border-top: 5px solid #7699d4;">
                  <div class="card-header">
                    <h4>Plant - Real Time Status</h4><span><button onclick="exportData()" style="background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0);color:white">
                      <span class="glyphicon glyphicon-download"></span>
                      Export as CSV</button></span>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                      </ul>
                      <!-- <span><div id="countdown"></div></span> -->
                    </div>
                  </div>
                  <div class="card-body">           
                    <div class="table-responsive"> 
                      <div id="load">
                      <table  class="table table-bordered table-responsive-md table-striped" id="tblStocks" style="width:100%">
                        <thead style="background-color:#1e5b9b;color: white;">
                          <tr>
                            <th class="w-1" style="color:white ;font-size: 13px;width: 170.75px;"><center>No.</center></th>
                            <th class="w-1" style="color:white ;font-size: 13px;"><center>Sources</center></th>
                            <th class="w-1" style="color:white ;font-size: 13px;width: 170.75px"><center>Current Avg (A)</center></th>
                            <th class="w-1" style="color:white ;font-size: 13px;width: 170.75px"><center>Voltage L-L Avg (V)</center></th>
                            <th class="w-1" style="color:white ;font-size: 13px;width: 170.75px"><center>Real Power (KW)</center></th>
                            <th class="w-1" style="color:white ;font-size: 13px;width: 170.75px"><center>Reactive Power (kVAr)</center></th>
                            <th class="w-1" style="color:white ;font-size: 13px;width: 170.75px"><center>Power Factor</center></th>
                            <th class="w-1" style="color:white ;font-size: 13px;width: 170.75px"><center>Status</center></th>
                             <th class="w-1" style="color:white ;font-size: 13px;width: 170.75px"><center>Details</center></th>
                          </tr>
                        </thead>
                        <tbody> 
                          <tr align="center">
                            <th scope="row" style="text-align: center;">1</th>
                            <td style="text-align:left">Main LT</td>
                            <td><?php echo round($U_1_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_1_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_1_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_1_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_1_PowerFactor_Total,2); ?></td>
                            <?php if($U_1_Current_Avg_Amp==0 && $U_1_Voltage_LL_V==0) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_1" target="_blank">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">2</th>
                            <td style="text-align:left">Water Treatment</td>
                            <td><?php echo round($U_2_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_2_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_2_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_2_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_2_PowerFactor_Total,2); ?></td>
                            <?php if($U_2_Current_Avg_Amp==0 && $U_2_Voltage_LL_V==0  ) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_2" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">3</th>
                            <td style="text-align:left">Turbine 1</td>
                            <td><?php echo round($U_3_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_3_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_3_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_3_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_3_PowerFactor_Total,2); ?></td>
                            <?php if($U_3_Current_Avg_Amp==0 && $U_3_Voltage_LL_V==0  ) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_3" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg>
                              </a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">4</th>
                            <td style="text-align:left">Syrup Room</td>
                            <td><?php echo round($U_4_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_4_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_4_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_4_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_4_PowerFactor_Total,2); ?></td>
                            <?php if($U_4_Current_Avg_Amp==0 && $U_4_Voltage_LL_V==0  ) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_4" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">5</th>
                            <td style="text-align:left">Air Compressor(3+4+5)</td>
                            <td><?php echo round($U_5_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_5_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_5_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_5_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_5_PowerFactor_Total,2); ?></td>
                            <?php if($U_5_Current_Avg_Amp==0 && $U_5_Voltage_LL_V==0  ) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?> 
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_5" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">6</th>
                            <td style="text-align:left">Air Compressor(1+2)</td>
                            <td><?php echo round($U_6_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_6_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_6_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_6_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_6_PowerFactor_Total,2); ?></td>
                            <?php if($U_6_Current_Avg_Amp==0 && $U_6_Voltage_LL_V==0  ) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_6" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">7</th>
                            <td style="text-align:left">Grasso 4</td>
                            <td><?php echo round($U_7_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_7_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_7_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_7_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_7_PowerFactor_Total,2); ?></td>
                            <?php if($U_7_Current_Avg_Amp==0 && $U_7_Voltage_LL_V==0) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_7" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">8</th>
                            <td style="text-align:left">Grasso 3</td>
                            <td><?php echo round($U_8_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_8_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_8_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_8_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_8_PowerFactor_Total,2); ?></td>
                            <?php if($U_8_Current_Avg_Amp==0 && $U_8_Voltage_LL_V==0 ) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_8" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">9</th>
                            <td style="text-align:left">Grasso 2</td>
                            <td><?php echo round($U_9_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_9_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_9_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_9_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_9_PowerFactor_Total,2); ?></td>
                            <?php if($U_9_Current_Avg_Amp==0 && $U_9_Voltage_LL_V==0 ) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_9" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">10</th>
                            <td style="text-align:left">Grasso 1</td>
                            <td><?php echo round($U_10_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_10_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_10_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_10_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_10_PowerFactor_Total,2); ?></td>
                            <?php if($U_10_Current_Avg_Amp==0 && $U_10_Voltage_LL_V==0) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_10" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">11</th>
                            <td style="text-align:left">Evaporators</td>
                            <td><?php echo round($U_11_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_11_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_11_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_11_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_11_PowerFactor_Total,2); ?></td>
                            <?php if($U_11_Current_Avg_Amp==0 && $U_11_Voltage_LL_V==0) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_11" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">12</th>
                            <td style="text-align:left">Line - 5</td>
                            <td><?php echo round($U_12_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_12_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_12_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_12_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_12_PowerFactor_Total,2); ?></td>
                            <?php if($U_12_Current_Avg_Amp==0 && $U_12_Voltage_LL_V==0) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_12" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">13</th>
                            <td style="text-align:left">Line - 4</td>
                            <td><?php echo round($U_13_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_13_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_13_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_13_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_13_PowerFactor_Total,2); ?></td>
                            <?php if($U_13_Current_Avg_Amp==0 && $U_13_Voltage_LL_V==0) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_13" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">14</th>
                            <td style="text-align:left">Line - 3</td>
                            <td><?php echo round($U_14_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_14_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_14_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_14_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_14_PowerFactor_Total,2); ?></td>
                            <?php if($U_14_Current_Avg_Amp==0 && $U_14_Voltage_LL_V==0) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_14" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">15</th>
                            <td style="text-align:left">Line - 1</td>
                            <td><?php echo round($U_15_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_15_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_15_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_15_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_15_PowerFactor_Total,2); ?></td>
                            <?php if($U_15_Current_Avg_Amp==0 && $U_15_Voltage_LL_V==0) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_15" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">16</th>
                            <td style="text-align:left">Boiler</td>
                            <td><?php echo round($U_16_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_16_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_16_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_16_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_16_PowerFactor_Total,2); ?></td>
                            <?php if($U_16_Current_Avg_Amp==0 && $U_16_Voltage_LL_V==0) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color: green;"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_16" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                          <tr align="center">
                            <th scope="row" style="text-align: center;">17</th>
                            <td style="text-align:left">Turbine - 2</td>
                            <td><?php echo round($U_17_Current_Avg_Amp,2); ?></td>
                            <td><?php echo round($U_17_Voltage_LL_V,2); ?></td>
                            <td><?php echo round($U_17_ActivePower_Total_kW,2); ?></td>
                            <td><?php echo round($U_17_ReactivePower_Total_kVAR,2); ?></td>
                            <td><?php echo round($U_17_PowerFactor_Total,2); ?></td>
                            <?php if($U_17_Current_Avg_Amp==0 && $U_17_Voltage_LL_V==0) { ?>
                            <td style="color: red;"><b>Ofline</b></td>
                            <?php } else { ?>
                            <td style="color:green"><b>Online</b></td>
                          <?php } ?>
                            <td>
                              <a href="meter_diagram_u1.php?meter=U_17" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="7" y1="10" x2="13" y2="10"></line><line x1="10" y1="7" x2="10" y2="13"></line><line x1="21" y1="21" x2="15" y2="15"></line></svg></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      
                      <script type="text/javascript" src="app.js"></script>
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
  </div>
          <!-- Main-body end -->
  <?php include('includes/footer.php'); ?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script> 
  $(document).ready(function(){
   setInterval(function(){
  $("#load").load(window.location.href + " #load" );
  }, 5000);
  });
  </script>
  <!-- <script type="text/javascript">
    (function countdown(remaining) {
    if(remaining === 0)
    location.reload(true);
    document.getElementById('countdown').innerHTML = remaining;
    setTimeout(function(){ countdown(remaining - 1); }, 1000);
})(5);
  </script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->   
</body>
</html>
