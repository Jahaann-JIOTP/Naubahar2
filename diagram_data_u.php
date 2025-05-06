<?php
$conn = mysqli_connect('65.0.16.20', 'jahaann', 'Jahaann#321', 'status');
$result = $conn->query("SELECT id,status as status FROM unit_1");
while ($rows = $result->fetch_assoc()) {
  if ($rows['status'] == 'up') {
$url = "http://13.234.241.103:1880/latestnaubahar1";
$json = file_get_contents($url);
$msg = json_decode($json, true);
// print_r($msg);
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
//time
$Time=0;
if(isset( $msg["Time"]))
$Time = $msg["Time"];
date_default_timezone_set("Asia/Karachi"); 
$start_time = date('Y-m-d H:i:s', (time() - 60 * 5));
$end_time = date('Y-m-d H:i:s', (time()));
//current avg
$U_1_Current_Avg_Amp = 0;
$U_2_Current_Avg_Amp = 0;
$U_3_Current_Avg_Amp = 0;
$U_4_Current_Avg_Amp = 0;
$U_5_Current_Avg_Amp = 0;
$U_6_Current_Avg_Amp = 0;
$U_7_Current_Avg_Amp = 0;
$U_8_Current_Avg_Amp = 0;
$U_9_Current_Avg_Amp = 0;
$U_10_Current_Avg_Amp = 0;
$U_11_Current_Avg_Amp = 0;
$U_12_Current_Avg_Amp = 0;
$U_13_Current_Avg_Amp = 0;
$U_14_Current_Avg_Amp = 0;
$U_15_Current_Avg_Amp = 0;
$U_16_Current_Avg_Amp = 0;
$U_17_Current_Avg_Amp = 0;
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
$U_9_Current_Avg_Amp = $msg["U_9_Current_Avg_Amp"];
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
$U_1_Voltage_LL_V = 0;
$U_2_Voltage_LL_V = 0;
$U_3_Voltage_LL_V = 0;
$U_4_Voltage_LL_V = 0;
$U_5_Voltage_LL_V = 0;
$U_6_Voltage_LL_V = 0;
$U_7_Voltage_LL_V = 0;
$U_8_Voltage_LL_V = 0;
$U_9_Voltage_LL_V = 0;;
$U_10_Voltage_LL_V = 0;
$U_11_Voltage_LL_V = 0;
$U_12_Voltage_LL_V = 0;
$U_13_Voltage_LL_V = 0;
$U_14_Voltage_LL_V = 0;
$U_15_Voltage_LL_V = 0;
$U_16_Voltage_LL_V = 0;
$U_17_Voltage_LL_V = 0;
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
$U_9_Voltage_LL_V = $msg["U_9_Voltage_LL_V"];
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
//avtive power
$U_1_ActivePower_Total_kW = 0;
$U_2_ActivePower_Total_kW = 0;
$U_3_ActivePower_Total_kW = 0;
$U_4_ActivePower_Total_kW = 0;
$U_5_ActivePower_Total_kW= 0;
$U_6_ActivePower_Total_kW = 0;
$U_7_ActivePower_Total_kW = 0;
$U_8_ActivePower_Total_kW = 0;
$U_9_ActivePower_Total_kW = 0;
$U_10_ActivePower_Total_kW = 0;
$U_11_ActivePower_Total_kW = 0;
$U_12_ActivePower_Total_kW = 0;
$U_13_ActivePower_Total_kW = 0;
$U_14_ActivePower_Total_kW = 0;
$U_15_ActivePower_Total_kW = 0;
$U_16_ActivePower_Total_kW = 0;
$U_17_ActivePower_Total_kW = 0;
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
$U_8_ActivePower_Total_kW= $msg["U_8_ActivePower_Total_kW"];
if(isset( $msg["U_9_ActivePower_Total_kW"]))
$U_9_ActivePower_Total_kW= $msg["U_9_ActivePower_Total_kW"];
if(isset( $msg["U_10_ActivePower_Total_kW"]))
$U_10_ActivePower_Total_kW= $msg["U_10_ActivePower_Total_kW"];
if(isset( $msg["U_11_ActivePower_Total_kW"]))
$U_11_ActivePower_Total_kW= $msg["U_11_ActivePower_Total_kW"];
if(isset( $msg["U_12_ActivePower_Total_kW"]))
$U_12_ActivePower_Total_kW= $msg["U_12_ActivePower_Total_kW"];
if(isset( $msg["U_13_ActivePower_Total_kW"]))
$U_13_ActivePower_Total_kW= $msg["U_13_ActivePower_Total_kW"];
if(isset( $msg["U_14_ActivePower_Total_kW"]))
$U_14_ActivePower_Total_kW= $msg["U_14_ActivePower_Total_kW"];
if(isset( $msg["U_15_ActivePower_Total_kW"]))
$U_15_ActivePower_Total_kW= $msg["U_15_ActivePower_Total_kW"];
if(isset( $msg["U_16_ActivePower_Total_kW"]))
$U_16_ActivePower_Total_kW= $msg["U_16_ActivePower_Total_kW"];
if(isset( $msg["U_17_ActivePower_Total_kW"]))
$U_17_ActivePower_Total_kW= $msg["U_17_ActivePower_Total_kW"];

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
} else {
  $U_1_Current_Avg_Amp = 0;
    $U_2_Current_Avg_Amp = 0;
    $U_3_Current_Avg_Amp = 0;
    $U_4_Current_Avg_Amp = 0;
    $U_5_Current_Avg_Amp = 0;
    $U_6_Current_Avg_Amp = 0;
    $U_7_Current_Avg_Amp = 0;
    $U_8_Current_Avg_Amp = 0;
    $U_9_Current_Avg_Amp = 0;
    $U_10_Current_Avg_Amp = 0;
    $U_11_Current_Avg_Amp = 0;
    $U_12_Current_Avg_Amp = 0;
    $U_13_Current_Avg_Amp = 0;
    $U_14_Current_Avg_Amp = 0;
    $U_15_Current_Avg_Amp = 0;
    $U_16_Current_Avg_Amp = 0;
    $U_17_Current_Avg_Amp = 0;

    $U_1_ActivePower_Total_kW = 0;
    $U_2_ActivePower_Total_kW = 0;
    $U_3_ActivePower_Total_kW = 0;
    $U_4_ActivePower_Total_kW = 0;
    $U_5_ActivePower_Total_kW = 0;
    $U_6_ActivePower_Total_kW = 0;
    $U_7_ActivePower_Total_kW = 0;
    $U_8_ActivePower_Total_kW = 0;
    $U_9_ActivePower_Total_kW = 0;
    $U_10_ActivePower_Total_kW = 0;
    $U_11_ActivePower_Total_kW = 0;
    $U_12_ActivePower_Total_kW = 0;
    $U_13_ActivePower_Total_kW = 0;
    $U_14_ActivePower_Total_kW = 0;
    $U_15_ActivePower_Total_kW = 0;
    $U_16_ActivePower_Total_kW = 0;
    $U_17_ActivePower_Total_kW = 0;

    $U_1_Voltage_LL_V = 0;
    $U_2_Voltage_LL_V = 0;
    $U_3_Voltage_LL_V = 0;
    $U_4_Voltage_LL_V = 0;
    $U_5_Voltage_LL_V = 0;
    $U_6_Voltage_LL_V = 0;
    $U_7_Voltage_LL_V = 0;
    $U_8_Voltage_LL_V = 0;
    $U_9_Voltage_LL_V = 0;;
    $U_10_Voltage_LL_V = 0;
    $U_11_Voltage_LL_V = 0;
    $U_12_Voltage_LL_V = 0;
    $U_13_Voltage_LL_V = 0;
    $U_14_Voltage_LL_V = 0;
    $U_15_Voltage_LL_V = 0;
    $U_16_Voltage_LL_V = 0;
    $U_17_Voltage_LL_V = 0;
  }
}
?>
<style type="text/css">
  @import url('http://fonts.cdnfonts.com/css/bagator');
 .font-features{
   color:#0000FF;
   font-family: 'Bagator', sans-serif;
    font-weight:700; 
    font-size:26px;
 }

 .rectangle{
  height: 19px;
  width: 105px;
  margin-bottom: 15px;
  margin-top: 3px;
  margin-left: -8.5%;

  /*border-radius: 10px; */
 /* animation: blinkingBackground 10s infinite;*/
 }
 /*@keyframes blinkingBackground{
    0%    { background-color: #10c018;}
    25%   { background-color: #1056c0;}
    50%   { background-color: #ef0a1a;}
    75%   { background-color: #254878;}
    100%  { background-color: #04a1d5;}
  }*/
</style>
<!-- Main LT 1-->
<div class="text" style="left:6pt !important;top: 29pt;">
  <div>
    <?php if($U_1_ActivePower_Total_kW==0 && $U_1_Current_Avg_Amp==0 && $U_1_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_1_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 20pt !important;top: 42pt;">
  <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_1_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_1_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_1_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Water Treatment 2-->
<div class="text" style="left: 155pt !important;top: 29pt;">
  <div>
    <?php if($U_2_ActivePower_Total_kW==0 && $U_2_Current_Avg_Amp==0 && $U_2_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_2_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 172pt !important;top: 42pt;">
  <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_2_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_2_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_2_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Syrup Room 4 -->
<div class="text" style="left: 309pt !important;top: 29pt;">
  <div>
    <?php if($U_4_ActivePower_Total_kW==0 && $U_4_Current_Avg_Amp==0 && $U_4_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_4_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 326pt !important;top:42pt;">
  <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_4_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_4_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_4_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Turbine 1 3 -->
<div class="text" style="left:454pt !important;top: 29pt;">
  <div>
    <?php if($U_3_ActivePower_Total_kW==0 && $U_3_Current_Avg_Amp==0 && $U_3_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_3_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 473pt !important;top: 42pt;">
  <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_3_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_3_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_3_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Evaporators 11 -->
<div class="text" style="left: 606pt !important;top: 29pt;">
  <div>
    <?php if($U_11_ActivePower_Total_kW==0 && $U_11_Current_Avg_Amp==0 && $U_11_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_11_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 628pt !important;top:42pt;">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_11_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_11_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_11_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Grasso 4 7 -->
<div class="text" style="left: 772pt !important;top: 29pt; ">
  <div>
    <?php if($U_7_ActivePower_Total_kW==0 && $U_7_Current_Avg_Amp==0 && $U_7_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_7_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 792pt !important;top:42pt; ">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_7_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_7_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_7_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Grasso 3 8-->
<div class="text" style="left: 933pt !important;top: 29pt; ">
  <div>
    <?php if($U_8_ActivePower_Total_kW==0 && $U_8_Current_Avg_Amp==0 && $U_8_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_8_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 950pt !important;top:42pt; ">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_8_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_8_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_8_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Grasso 2 9-->
<div class="text" style="left: 1085pt !important;top: 29pt;">
  <div>
    <?php if($U_9_ActivePower_Total_kW==0 && $U_9_Current_Avg_Amp==0 && $U_9_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_9_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 1105pt !important;top:42pt;">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_9_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_9_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_9_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Grasso 1 10-->
<div class="text" style="left: 1239pt !important;top: 29pt; ">
  <div>
    <?php if($U_10_ActivePower_Total_kW==0 && $U_10_Current_Avg_Amp==0 && $U_10_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_10_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 1259pt !important;top:42pt; ">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_10_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_10_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_10_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
 <!-- Air Compressor(1+2+3) 5 -->
<div class="text" style="left: 86pt !important;top: 157pt; ">
  <div>
    <?php if($U_5_ActivePower_Total_kW==0 && $U_5_Current_Avg_Amp==0 && $U_5_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_5_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 106pt !important;top:170pt; ">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_5_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_5_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_5_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Air Compressor(1+2) 6-->
<div class="text" style="left: 244pt !important;top: 157pt;">
  <div>
    <?php if($U_6_ActivePower_Total_kW==0 && $U_6_Current_Avg_Amp==0 && $U_6_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_6_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 260pt !important;top:170pt;">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_6_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_6_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_6_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Line 5 12-->
<div class="text" style="left: 392pt !important;top: 157pt; ">
  <div>
    <?php if($U_12_ActivePower_Total_kW==0 && $U_12_Current_Avg_Amp==0 && $U_12_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_12_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 408pt !important;top:170pt; ">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_12_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_12_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_12_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Line 4 13 -->
<div class="text" style="left: 545pt !important;top: 157pt; ">
  <div>
    <?php if($U_13_ActivePower_Total_kW==0 && $U_13_Current_Avg_Amp==0 && $U_13_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_13_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 562pt !important;top:170pt; ">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_13_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_13_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_13_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Line 3 14 -->
<div class="text" style="left: 708pt !important;top: 157pt; ">
  <div>
    <?php if($U_14_ActivePower_Total_kW==0 && $U_14_Current_Avg_Amp==0 && $U_14_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_14_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 722pt !important;top:170pt; ">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_14_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_14_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_14_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Line 1 9-->
<div class="text" style="left: 859pt !important;top: 157pt; ">
  <div>
    <?php if($U_15_ActivePower_Total_kW==0 && $U_15_Current_Avg_Amp==0 && $U_15_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_15_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 878pt !important;top:170pt; ">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_15_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_15_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_15_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Bioler 16-->
<div class="text" style="left: 1013pt !important;top: 157pt; ">
  <div>
    <?php if($U_16_ActivePower_Total_kW==0 && $U_16_Current_Avg_Amp==0 && $U_16_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
    <?php } 
    elseif($U_16_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell_bl.gif" style="height: 24px; width: 24px;">
    <?php } else { ?>
    <img src="assets/images/green_bl.gif" style="height: 24px; width: 24px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left:1030pt !important;top:170pt; ">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_16_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo round($U_16_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo round($U_16_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
</div>
<!-- Turbine 2 17-->
<div class="text" style="left: 1182pt !important;top: 157pt; ">
  <div>
    <img src="assets/images/red_bl.gif" style="height: 24px; width: 24px;">
  </div>
</div>
<div class="text" style="left: 1194pt !important;top:170pt; ">
  <div>
    <div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo "0"; ?> V</p></div>
    <div class="rectangle"><p class="font-features" style="color:#610000"><?php echo "0"; ?> A</p></div>
    <div class="rectangle" ><p class="font-features" style="color:#610000"><?php echo "0"; ?> kW</p></div>
  </div>
</div>
</div>
