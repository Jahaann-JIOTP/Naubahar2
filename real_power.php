<?php
$url = "http://13.234.241.103:1880/latestnaubahar1";
$json = file_get_contents($url);
$msg = json_decode($json, true);
$Time=0;
if(isset( $msg["Time"]))
$Time = $msg["Time"];
date_default_timezone_set("Asia/Karachi"); 
$start_time = date('Y-n-j H:i:s', (time() - 60 * 5));
$end_time = date('Y-n-j H:i:s', (time()));
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
?>