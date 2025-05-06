<?php 
error_reporting(0);
$url = "http://13.234.241.103:1880/latestunit2";
$json = file_get_contents($url);
$msg = json_decode($json, true);
//time
$Time=0;
if(isset( $msg["Time"]))
$Time = $msg["Time"];
date_default_timezone_set("Asia/Karachi"); 
$start_time = date('Y-m-d H:i:s', (time() - 60 * 5));
$end_time = date('Y-m-d H:i:s', (time()));
//current avg
$GW1_U2_Current_Avg_Amp = 0;
$GW1_U3_Current_Avg_Amp = 0;
$GW1_U4_Current_Avg_Amp = 0;
$GW1_U5_Current_Avg_Amp = 0;
$GW1_U6_Current_Avg_Amp = 0;
$GW1_U7_Current_Avg_Amp = 0;
$GW1_U14_Current_Avg_Amp = 0;
$GW1_U15_Current_Avg_Amp = 0;
$GW1_U16_Current_Avg_Amp = 0;
$GW1_U17_Current_Avg_Amp = 0;
$GW1_U18_Current_Avg_Amp = 0;
$GW1_U19_Current_Avg_Amp = 0;
$GW1_U20_Current_Avg_Amp = 0;
$GW1_U21_Current_Avg_Amp = 0;
$GW1_U22_Current_Avg_Amp = 0;
$GW1_U23_Current_Avg_Amp = 0;
$GW1_U24_Current_Avg_Amp = 0;

$GW2_U9_Current_Avg_Amp= 0;
$GW2_U10_Current_Avg_Amp= 0;
$GW2_U8_Current_Avg_Amp= 0;
$GW2_U2_Current_Avg_Amp= 0;
$GW2_U3_Current_Avg_Amp= 0;
$GW2_U4_Current_Avg_Amp= 0;
$GW2_U11_Current_Avg_Amp= 0;
$GW2_U12_Current_Avg_Amp= 0;
$GW2_U13_Current_Avg_Amp= 0;
$GW2_U14_Current_Avg_Amp= 0;

$GW3_U2_Current_Avg_Amp= 0;
$GW3_U3_Current_Avg_Amp= 0;
$GW3_U4_Current_Avg_Amp= 0;
$GW3_U5_Current_Avg_Amp= 0;
$GW3_U6_Current_Avg_Amp= 0;

if(isset( $msg["GW1_U2_Current_Avg_Amp"]))
$GW1_U2_Current_Avg_Amp = $msg["GW1_U2_Current_Avg_Amp"];
if(isset( $msg["GW1_U3_Current_Avg_Amp"]))
$GW1_U3_Current_Avg_Amp = $msg["GW1_U3_Current_Avg_Amp"];
if(isset( $msg["GW1_U4_Current_Avg_Amp"]))
$GW1_U4_Current_Avg_Amp = $msg["GW1_U4_Current_Avg_Amp"];
if(isset( $msg["GW1_U5_Current_Avg_Amp"]))
$GW1_U5_Current_Avg_Amp = $msg["GW1_U5_Current_Avg_Amp"];
if(isset( $msg["GW1_U6_Current_Avg_Amp"]))
$GW1_U6_Current_Avg_Amp = $msg["GW1_U6_Current_Avg_Amp"];
if(isset( $msg["GW1_U7_Current_Avg_Amp"]))
$GW1_U7_Current_Avg_Amp = $msg["GW1_U7_Current_Avg_Amp"];
if(isset( $msg["GW1_U14_Current_Avg_Amp"]))
$GW1_U14_Current_Avg_Amp = $msg["GW1_U14_Current_Avg_Amp"];
if(isset( $msg["GW1_U15_Current_Avg_Amp"]))
$GW1_U15_Current_Avg_Amp = $msg["GW1_U15_Current_Avg_Amp"];
if(isset( $msg["GW1_U16_Current_Avg_Amp"]))
$GW1_U16_Current_Avg_Amp = $msg["GW1_U16_Current_Avg_Amp"];
if(isset( $msg["GW1_U17_Current_Avg_Amp"]))
$GW1_U17_Current_Avg_Amp = $msg["GW1_U17_Current_Avg_Amp"];
if(isset( $msg["GW1_U18_Current_Avg_Amp"]))
$GW1_U18_Current_Avg_Amp = $msg["GW1_U18_Current_Avg_Amp"];
if(isset( $msg["GW1_U19_Current_Avg_Amp"]))
$GW1_U19_Current_Avg_Amp = $msg["GW1_U19_Current_Avg_Amp"];
if(isset( $msg["GW1_U20_Current_Avg_Amp"]))
$GW1_U20_Current_Avg_Amp = $msg["GW1_U20_Current_Avg_Amp"];
if(isset( $msg["GW1_U21_Current_Avg_Amp"]))
$GW1_U21_Current_Avg_Amp = $msg["GW1_U21_Current_Avg_Amp"];
if(isset( $msg["GW1_U22_Current_Avg_Amp"]))
$GW1_U22_Current_Avg_Amp = $msg["GW1_U22_Current_Avg_Amp"];
if(isset( $msg["GW1_U23_Current_Avg_Amp"]))
$GW1_U23_Current_Avg_Amp = $msg["GW1_U23_Current_Avg_Amp"];
if(isset( $msg["GW2_U8_Current_Avg_Amp"]))
$GW2_U8_Current_Avg_Amp = $msg["GW2_U8_Current_Avg_Amp"];
if(isset( $msg["GW2_U9_Current_Avg_Amp"]))
$GW2_U9_Current_Avg_Amp = $msg["GW2_U9_Current_Avg_Amp"];
if(isset( $msg["GW2_U10_Current_Avg_Amp"]))
$GW2_U10_Current_Avg_Amp = $msg["GW2_U10_Current_Avg_Amp"];
if(isset( $msg["GW2_U2_Current_Avg_Amp"]))
$GW2_U2_Current_Avg_Amp = $msg["GW2_U2_Current_Avg_Amp"];
if(isset( $msg["GW2_U3_Current_Avg_Amp"]))
$GW2_U3_Current_Avg_Amp = $msg["GW2_U3_Current_Avg_Amp"];
if(isset( $msg["GW2_U4_Current_Avg_Amp"]))
$GW2_U4_Current_Avg_Amp = $msg["GW2_U4_Current_Avg_Amp"];
if(isset( $msg["GW2_U11_Current_Avg_Amp"]))
$GW2_U11_Current_Avg_Amp = $msg["GW2_U11_Current_Avg_Amp"];
if(isset( $msg["GW2_U12_Current_Avg_Amp"]))
$GW2_U12_Current_Avg_Amp = $msg["GW2_U12_Current_Avg_Amp"];
if(isset( $msg["GW2_U13_Current_Avg_Amp"]))
$GW2_U13_Current_Avg_Amp = $msg["GW2_U13_Current_Avg_Amp"];
if(isset( $msg["GW2_U14_Current_Avg_Amp"]))
$GW2_U14_Current_Avg_Amp = $msg["GW2_U14_Current_Avg_Amp"];
if(isset( $msg["GW3_U2_Current_Avg_Amp"]))
$GW3_U2_Current_Avg_Amp = $msg["GW3_U2_Current_Avg_Amp"];
if(isset( $msg["GW3_U3_Current_Avg_Amp"]))
$GW3_U3_Current_Avg_Amp = $msg["GW3_U3_Current_Avg_Amp"];
if(isset( $msg["GW3_U4_Current_Avg_Amp"]))
$GW3_U4_Current_Avg_Amp = $msg["GW3_U4_Current_Avg_Amp"];
if(isset( $msg["GW3_U5_Current_Avg_Amp"]))
$GW3_U5_Current_Avg_Amp = $msg["GW3_U5_Current_Avg_Amp"];
if(isset( $msg["GW3_U6_Current_Avg_Amp"]))
$GW3_U6_Current_Avg_Amp = $msg["GW3_U6_Current_Avg_Amp"];
if(isset( $msg["GW1_U24_Current_Avg_Amp"]))
$GW1_U24_Current_Avg_Amp = $msg["GW1_U24_Current_Avg_Amp"];
//voltage avg
$GW1_U2_Voltage_LL_V = 0;
$GW1_U3_Voltage_LL_V = 0;
$GW1_U4_Voltage_LL_V = 0;
$GW1_U5_Voltage_LL_V = 0;
$GW1_U6_Voltage_LL_V = 0;
$GW1_U7_Voltage_LL_V = 0;
$GW1_U14_Voltage_LL_V = 0;
$GW1_U15_Voltage_LL_V = 0;
$GW1_U16_Voltage_LL_V = 0;
$GW1_U17_Voltage_LL_V = 0;
$GW1_U18_Voltage_LL_V = 0;
$GW1_U19_Voltage_LL_V = 0;
$GW1_U20_Voltage_LL_V = 0;
$GW1_U21_Voltage_LL_V = 0;
$GW1_U22_Voltage_LL_V = 0;
$GW1_U23_Voltage_LL_V = 0;
$GW2_U8_Voltage_LL_V = 0;
$GW2_U9_Voltage_LL_V = 0;
$GW2_U10_Voltage_LL_V = 0;
$GW2_U2_Voltage_LL_V = 0;
$GW2_U3_Voltage_LL_V = 0;
$GW2_U4_Voltage_LL_V = 0;
$GW2_U11_Voltage_LL_V = 0;
$GW2_U12_Voltage_LL_V = 0;
$GW2_U13_Voltage_LL_V = 0;
$GW2_U14_Voltage_LL_V = 0;
$GW3_U2_Voltage_LL_V = 0;
$GW3_U3_Voltage_LL_V = 0;
$GW3_U4_Voltage_LL_V = 0;
$GW3_U5_Voltage_LL_V = 0;
$GW3_U6_Voltage_LL_V = 0;
$GW1_U24_Voltage_LL_V = 0;

if(isset( $msg["GW1_U2_Voltage_LL_V"]))
$GW1_U2_Voltage_LL_V = $msg["GW1_U2_Voltage_LL_V"];
if(isset( $msg["GW1_U3_Voltage_LL_V"]))
$GW1_U3_Voltage_LL_V = $msg["GW1_U3_Voltage_LL_V"];
if(isset( $msg["GW1_U4_Voltage_LL_V"]))
$GW1_U4_Voltage_LL_V = $msg["GW1_U4_Voltage_LL_V"];
if(isset( $msg["GW1_U5_Voltage_LL_V"]))
$GW1_U5_Voltage_LL_V = $msg["GW1_U5_Voltage_LL_V"];
if(isset( $msg["GW1_U6_Voltage_LL_V"]))
$GW1_U6_Voltage_LL_V = $msg["GW1_U6_Voltage_LL_V"];
if(isset( $msg["GW1_U7_Voltage_LL_V"]))
$GW1_U7_Voltage_LL_V = $msg["GW1_U7_Voltage_LL_V"];
if(isset( $msg["GW1_U14_Voltage_LL_V"]))
$GW1_U14_Voltage_LL_V = $msg["GW1_U14_Voltage_LL_V"];
if(isset( $msg["GW1_U15_Voltage_LL_V"]))
$GW1_U15_Voltage_LL_V = $msg["GW1_U15_Voltage_LL_V"];
if(isset( $msg["GW1_U16_Voltage_LL_V"]))
$GW1_U16_Voltage_LL_V = $msg["GW1_U16_Voltage_LL_V"];
if(isset( $msg["GW1_U17_Voltage_LL_V"]))
$GW1_U17_Voltage_LL_V = $msg["GW1_U17_Voltage_LL_V"];
if(isset( $msg["GW1_U18_Voltage_LL_V"]))
$GW1_U18_Voltage_LL_V = $msg["GW1_U18_Voltage_LL_V"];
if(isset( $msg["GW1_U19_Voltage_LL_V"]))
$GW1_U19_Voltage_LL_V = $msg["GW1_U19_Voltage_LL_V"];
if(isset( $msg["GW1_U20_Voltage_LL_V"]))
$GW1_U20_Voltage_LL_V = $msg["GW1_U20_Voltage_LL_V"];
if(isset( $msg["GW1_U21_Voltage_LL_V"]))
$GW1_U21_Voltage_LL_V = $msg["GW1_U21_Voltage_LL_V"];
if(isset( $msg["GW1_U22_Voltage_LL_V"]))
$GW1_U22_Voltage_LL_V = $msg["GW1_U22_Voltage_LL_V"];
if(isset( $msg["GW1_U23_Voltage_LL_V"]))
$GW1_U23_Voltage_LL_V = $msg["GW1_U23_Voltage_LL_V"];
if(isset( $msg["GW2_U8_Voltage_LL_V"]))
$GW2_U8_Voltage_LL_V = $msg["GW2_U8_Voltage_LL_V"];
if(isset( $msg["GW2_U9_Voltage_LL_V"]))
$GW2_U9_Voltage_LL_V = $msg["GW2_U9_Voltage_LL_V"];
if(isset( $msg["GW2_U10_Voltage_LL_V"]))
$GW2_U10_Voltage_LL_V = $msg["GW2_U10_Voltage_LL_V"];
if(isset( $msg["GW2_U2_Voltage_LL_V"]))
$GW2_U2_Voltage_LL_V = $msg["GW2_U2_Voltage_LL_V"];
if(isset( $msg["GW2_U3_Voltage_LL_V"]))
$GW2_U3_Voltage_LL_V = $msg["GW2_U3_Voltage_LL_V"];
if(isset( $msg["GW2_U4_Voltage_LL_V"]))
$GW2_U4_Voltage_LL_V = $msg["GW2_U4_Voltage_LL_V"];
if(isset( $msg["GW2_U11_Voltage_LL_V"]))
$GW2_U11_Voltage_LL_V = $msg["GW2_U11_Voltage_LL_V"];
if(isset( $msg["GW2_U12_Voltage_LL_V"]))
$GW2_U12_Voltage_LL_V = $msg["GW2_U12_Voltage_LL_V"];
if(isset( $msg["GW2_U13_Voltage_LL_V"]))
$GW2_U13_Voltage_LL_V = $msg["GW2_U13_Voltage_LL_V"];
if(isset( $msg["GW2_U14_Voltage_LL_V"]))
$GW2_U14_Voltage_LL_V = $msg["GW2_U14_Voltage_LL_V"];
if(isset( $msg["GW3_U2_Voltage_LL_V"]))
$GW3_U2_Voltage_LL_V = $msg["GW3_U2_Voltage_LL_V"];
if(isset( $msg["GW3_U3_Voltage_LL_V"]))
$GW3_U3_Voltage_LL_V = $msg["GW3_U3_Voltage_LL_V"];
if(isset( $msg["GW3_U4_Voltage_LL_V"]))
$GW3_U4_Voltage_LL_V = $msg["GW3_U4_Voltage_LL_V"];
if(isset( $msg["GW3_U5_Voltage_LL_V"]))
$GW3_U5_Voltage_LL_V = $msg["GW3_U5_Voltage_LL_V"];
if(isset( $msg["GW3_U6_Voltage_LL_V"]))
$GW3_U6_Voltage_LL_V = $msg["GW3_U6_Voltage_LL_V"];
if(isset( $msg["GW1_U24_Voltage_LL_V"]))
$GW1_U24_Voltage_LL_V = $msg["GW1_U24_Voltage_LL_V"];
//avtive power
$GW1_U2_ActivePower_Total_kW = 0;
$GW1_U3_ActivePower_Total_kW= 0;
$GW1_U4_ActivePower_Total_kW = 0;
$GW1_U5_ActivePower_Total_kW= 0;
$GW1_U6_ActivePower_Total_kW= 0;
$GW1_U7_ActivePower_Total_kW= 0;
$GW1_U14_ActivePower_Total_kW= 0;
$GW1_U15_ActivePower_Total_kW= 0;
$GW1_U16_ActivePower_Total_kW= 0;
$GW1_U17_ActivePower_Total_kW= 0;
$GW1_U18_ActivePower_Total_kW= 0;
$GW1_U19_ActivePower_Total_kW= 0;
$GW1_U20_ActivePower_Total_kW= 0;
$GW1_U21_ActivePower_Total_kW= 0;
$GW1_U22_ActivePower_Total_kW= 0;
$GW1_U23_ActivePower_Total_kW= 0;
$GW1_U24_ActivePower_Total_kW= 0;

$GW2_U9_ActivePower_Total_kW= 0;
$GW2_U10_ActivePower_Total_kW= 0;
$GW2_U8_ActivePower_Total_kW= 0;
$GW2_U2_ActivePower_Total_kW= 0;
$GW2_U11_ActivePower_Total_kW= 0;
$GW2_U12_ActivePower_Total_kW= 0;
$GW2_U13_ActivePower_Total_kW= 0;
$GW2_U14_ActivePower_Total_kW= 0;
$GW2_U3_ActivePower_Total_kW= 0;
$GW2_U4_ActivePower_Total_kW= 0;
$GW2_U2_ActivePower_Total_kW= 0;
$GW2_U11_ActivePower_Total_kW= 0;
$GW2_U12_ActivePower_Total_kW= 0;
$GW2_U13_ActivePower_Total_kW= 0;
$GW2_U14_ActivePower_Total_kW= 0;
$GW3_U2_ActivePower_Total_kW= 0;
$GW3_U3_ActivePower_Total_kW= 0;
$GW3_U4_ActivePower_Total_kW= 0;
$GW3_U5_ActivePower_Total_kW= 0;
$GW3_U6_ActivePower_Total_kW= 0;

if(isset( $msg["GW1_U2_ActivePower_Total_kW"]))
$GW1_U2_ActivePower_Total_kW = $msg["GW1_U2_ActivePower_Total_kW"];
if(isset( $msg["GW1_U3_ActivePower_Total_kW"]))
$GW1_U3_ActivePower_Total_kW = $msg["GW1_U3_ActivePower_Total_kW"];
if(isset( $msg["GW1_U4_ActivePower_Total_kW"]))
$GW1_U4_ActivePower_Total_kW = $msg["GW1_U4_ActivePower_Total_kW"];
if(isset( $msg["GW1_U5_ActivePower_Total_kW"]))
$GW1_U5_ActivePower_Total_kW = $msg["GW1_U5_ActivePower_Total_kW"];
if(isset( $msg["GW1_U6_ActivePower_Total_kW"]))
$GW1_U6_ActivePower_Total_kW= $msg["GW1_U6_ActivePower_Total_kW"];
if(isset( $msg["GW1_U7_ActivePower_Total_kW"]))
$GW1_U7_ActivePower_Total_kW = $msg["GW1_U7_ActivePower_Total_kW"];
if(isset( $msg["GW1_U14_ActivePower_Total_kW"]))
$GW1_U14_ActivePower_Total_kW = $msg["GW1_U14_ActivePower_Total_kW"];
if(isset( $msg["GW1_U15_ActivePower_Total_kW"]))
$GW1_U15_ActivePower_Total_kW= $msg["GW1_U15_ActivePower_Total_kW"];
if(isset( $msg["GW1_U16_ActivePower_Total_kW"]))
$GW1_U16_ActivePower_Total_kW= $msg["GW1_U16_ActivePower_Total_kW"];
if(isset( $msg["GW1_U17_ActivePower_Total_kW"]))
$GW1_U17_ActivePower_Total_kW= $msg["GW1_U17_ActivePower_Total_kW"];
if(isset( $msg["GW1_U18_ActivePower_Total_kW"]))
$GW1_U18_ActivePower_Total_kW= $msg["GW1_U18_ActivePower_Total_kW"];
if(isset( $msg["GW1_U19_ActivePower_Total_kW"]))
$GW1_U19_ActivePower_Total_kW= $msg["GW1_U19_ActivePower_Total_kW"];
if(isset( $msg["GW1_U20_ActivePower_Total_kW"]))
$GW1_U20_ActivePower_Total_kW= $msg["GW1_U20_ActivePower_Total_kW"];
if(isset( $msg["GW1_U21_ActivePower_Total_kW"]))
$GW1_U21_ActivePower_Total_kW= $msg["GW1_U21_ActivePower_Total_kW"];
if(isset( $msg["GW1_U22_ActivePower_Total_kW"]))
$GW1_U22_ActivePower_Total_kW= $msg["GW1_U22_ActivePower_Total_kW"];
if(isset( $msg["GW1_U23_ActivePower_Total_kW"]))
$GW1_U23_ActivePower_Total_kW= $msg["GW1_U23_ActivePower_Total_kW"];
if(isset( $msg["GW1_U24_ActivePower_Total_kW"]))
$GW1_U24_ActivePower_Total_kW= $msg["GW1_U24_ActivePower_Total_kW"];
if(isset( $msg["GW2_U9_ActivePower_Total_kW"]))
$GW2_U9_ActivePower_Total_kW= $msg["GW2_U9_ActivePower_Total_kW"];
if(isset( $msg["GW2_U10_ActivePower_Total_kW"]))
$GW2_U10_ActivePower_Total_kW= $msg["GW2_U10_ActivePower_Total_kW"];
if(isset( $msg["GW2_U8_ActivePower_Total_kW"]))
$GW2_U8_ActivePower_Total_kW= $msg["GW2_U8_ActivePower_Total_kW"];
if(isset( $msg["GW2_U2_ActivePower_Total_kW"]))
$GW2_U2_ActivePower_Total_kW= $msg["GW2_U2_ActivePower_Total_kW"];
if(isset( $msg["GW2_U11_ActivePower_Total_kW"]))
$GW2_U11_ActivePower_Total_kW= $msg["GW2_U11_ActivePower_Total_kW"];
if(isset( $msg["GW2_U12_ActivePower_Total_kW"]))
$GW2_U12_ActivePower_Total_kW= $msg["GW2_U12_ActivePower_Total_kW"];
if(isset( $msg["GW2_U13_ActivePower_Total_kW"]))
$GW2_U13_ActivePower_Total_kW= $msg["GW2_U13_ActivePower_Total_kW"];
if(isset( $msg["GW2_U14_ActivePower_Total_kW"]))
$GW2_U14_ActivePower_Total_kW= $msg["GW2_U14_ActivePower_Total_kW"];
if(isset( $msg["GW2_U3_ActivePower_Total_kW"]))
$GW2_U3_ActivePower_Total_kW= $msg["GW2_U3_ActivePower_Total_kW"];
if(isset( $msg["GW2_U4_ActivePower_Total_kW"]))
$GW2_U4_ActivePower_Total_kW= $msg["GW2_U4_ActivePower_Total_kW"];
if(isset( $msg["GW2_U2_ActivePower_Total_kW"]))
$GW2_U2_ActivePower_Total_kW= $msg["GW2_U2_ActivePower_Total_kW"];
if(isset( $msg["GW2_U11_ActivePower_Total_kW"]))
$GW2_U11_ActivePower_Total_kW= $msg["GW2_U11_ActivePower_Total_kW"];
if(isset( $msg["GW2_U12_ActivePower_Total_kW"]))
$GW2_U12_ActivePower_Total_kW= $msg["GW2_U12_ActivePower_Total_kW"];
if(isset( $msg["GW2_U13_ActivePower_Total_kW"]))
$GW2_U13_ActivePower_Total_kW= $msg["GW2_U13_ActivePower_Total_kW"];
if(isset( $msg["GW2_U14_ActivePower_Total_kW"]))
$GW2_U14_ActivePower_Total_kW= $msg["GW2_U14_ActivePower_Total_kW"];

if(isset( $msg["GW3_U2_ActivePower_Total_kW"]))
$GW3_U2_ActivePower_Total_kW= $msg["GW3_U2_ActivePower_Total_kW"];
if(isset( $msg["GW3_U3_ActivePower_Total_kW"]))
$GW3_U3_ActivePower_Total_kW= $msg["GW3_U3_ActivePower_Total_kW"];
if(isset( $msg["GW3_U4_ActivePower_Total_kW"]))
$GW3_U4_ActivePower_Total_kW= $msg["GW3_U4_ActivePower_Total_kW"];
if(isset( $msg["GW3_U5_ActivePower_Total_kW"]))
$GW3_U5_ActivePower_Total_kW= $msg["GW3_U5_ActivePower_Total_kW"];
if(isset( $msg["GW3_U6_ActivePower_Total_kW"]))
$GW3_U6_ActivePower_Total_kW= $msg["GW3_U6_ActivePower_Total_kW"];
?>