<?php
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
?>
<style type="text/css">
 .font-features{
   color: blue;
   font-family: Verdana, sans-serif;
    font-weight:0; 
    font-size:14px;
 }
 /* p.font-features
 {
  width: 31.38px;
  height:24px;   
 } */
</style>
<!-- RO Section -->
<div class="text" style="left: 200pt !important;top: 184pt;">
  <div class="rectangle" style="width:60px ;">
    <p class="font-features"><?php echo round($GW1_U22_ActivePower_Total_kW+$GW2_U9_ActivePower_Total_kW+$GW2_U10_ActivePower_Total_kW+$GW2_U8_ActivePower_Total_kW,2); ?> kW</p>
  </div>
</div>
<!-- Grasso Section -->
<div class="text" style="left: 461pt !important;top: 184pt;">
  <div class="rectangle" style="width:60px ;">
    <p class="font-features"><?php echo round($GW1_U14_ActivePower_Total_kW+$GW1_U15_ActivePower_Total_kW+$GW1_U16_ActivePower_Total_kW+$GW1_U17_ActivePower_Total_kW+$GW1_U18_ActivePower_Total_kW+$GW1_U19_ActivePower_Total_kW+$GW1_U20_ActivePower_Total_kW+$GW1_U21_ActivePower_Total_kW,2); ?> kW</p>
  </div>
</div>
<!-- ECR Office -->
<div class="text" style="left: 713pt !important;top:184pt;">
  <div class="rectangle" style="width:60px ;">
    <p class="font-features"><?php echo round($GW1_U2_ActivePower_Total_kW+$GW1_U3_ActivePower_Total_kW+$GW1_U4_ActivePower_Total_kW+$GW1_U5_ActivePower_Total_kW,2); ?> kW</p>
  </div>
</div>
<!-- Lines Section-->
<div class="text" style="left: 200pt !important;top: 389pt;">
  <div class="rectangle" style="width:60px ;">
    <p class="font-features"><?php echo round($GW1_U6_ActivePower_Total_kW+$GW1_U7_ActivePower_Total_kW+$GW2_U2_ActivePower_Total_kW+$GW1_U23_ActivePower_Total_kW,2); ?> kW</p>
  </div>
</div>
<!-- Lp Air Compressors -->
<div class="text" style="left: 461pt !important;top: 389pt;">
  <div class="rectangle" style="width:60px ;">
    <p class="font-features"><?php echo round($GW2_U11_ActivePower_Total_kW+$GW2_U12_ActivePower_Total_kW+$GW2_U13_ActivePower_Total_kW+$GW2_U14_ActivePower_Total_kW,2); ?> kW</p>
  </div>
</div>
<!-- Hp Air Compressors -->
<div class="text" style="left: 713pt !important;top:389pt;">
  <div class="rectangle" style="width:60px ;">
    <p class="font-features"><?php echo round($GW2_U3_ActivePower_Total_kW+$GW2_U4_ActivePower_Total_kW,2); ?> kW</p>
  </div>
</div>
