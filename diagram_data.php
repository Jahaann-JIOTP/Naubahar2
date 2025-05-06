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
$GW2_U2_ActivePower_Total_kW= 0;
$GW2_U11_ActivePower_Total_kW= 0;
$GW2_U12_ActivePower_Total_kW= 0;
$GW2_U13_ActivePower_Total_kW= 0;
$GW2_U14_ActivePower_Total_kW= 0;

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
?>
<?php
$id=$_GET['id'];
if ($id=='T_1') {
?>
<style type="text/css">
  @import url('http://fonts.cdnfonts.com/css/bagator');
 .font-features{
   color:#0000FF;
   font-family: 'Bagator', sans-serif;
    font-weight:700; 
    font-size:14px;
 }
 p.font-features
 {
  width:46.72;
  height:17px;   
 }
 .rectangle{
  height: 19px;
  width: 75px;
  /*border-radius: 10px; */
 /* animation: blinkingBackground 10s infinite;*/
 }
</style>
<!-- total -->
<div class="text" style="left: 401Pt !important;top: 195pt;">
  <div>
    <div class="rectangle" style="margin-bottom:3px;"><p class="font-features"><?php echo round(($GW2_U8_Voltage_LL_V+$GW1_U22_Voltage_LL_V+$GW2_U10_Voltage_LL_V+$GW2_U9_Voltage_LL_V)/4,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:3px;"><p class="font-features"><?php echo round($GW2_U8_Current_Avg_Amp+$GW1_U22_Current_Avg_Amp+$GW2_U10_Current_Avg_Amp+$GW2_U9_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U8_ActivePower_Total_kW+$GW1_U22_ActivePower_Total_kW+$GW2_U10_ActivePower_Total_kW+$GW2_U9_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- RO4 -->
<div class="text" style="left: 558pt !important;top: 385pt;">
  <div>
    <?php if($GW2_U8_ActivePower_Total_kW==0 && $GW2_U8_Current_Avg_Amp==0 && $GW2_U8_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW2_U8_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 604pt !important;top: 399pt;">
  <div>
    <div class="rectangle" style="margin-bottom:2px;"><p class="font-features"><?php echo round($GW2_U8_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:2px"><p class="font-features"><?php echo round($GW2_U8_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U8_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- RO3 -->
<div class="text" style="left: 417pt !important;top: 385pt;">
  <div>
    <?php if($GW1_U22_ActivePower_Total_kW==0 && $GW1_U22_Current_Avg_Amp==0 && $GW1_U22_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U22_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left:465pt !important;top: 399pt;">
  <div>
    <div class="rectangle" style="margin-bottom:2px;"><p class="font-features"><?php echo round($GW1_U22_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:2px"><p class="font-features"><?php echo round($GW1_U22_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U22_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- RO2 -->
<div class="text" style="left: 276pt !important;top: 385pt;">
  <div>
    <?php if($GW2_U10_ActivePower_Total_kW==0 && $GW2_U10_Current_Avg_Amp==0 && $GW2_U10_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW2_U10_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left:326pt !important;top: 399pt;">
  <div>
    <div class="rectangle" style="margin-bottom:2px;"><p class="font-features"><?php echo round($GW2_U10_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:2px"><p class="font-features"><?php echo round($GW2_U10_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U10_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- RO1 -->
<div class="text" style="left: 137pt !important;top: 385pt;">
  <div>
    <?php if($GW2_U9_ActivePower_Total_kW==0 && $GW2_U9_Current_Avg_Amp==0 && $GW2_U9_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW2_U9_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 187pt !important;top: 399pt;">
  <div>
    <div class="rectangle" style="margin-bottom:2px"><p class="font-features"><?php echo round($GW2_U9_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:2px"><p class="font-features"><?php echo round($GW2_U9_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px;"><p class="font-features"><?php echo round($GW2_U9_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<?php } 
elseif ($id=='T_2'){
  ?>
  <style type="text/css">
  @import url('http://fonts.cdnfonts.com/css/bagator');
 .font-features{
  color:#0000FF;
   font-family: 'Bagator', sans-serif;
    font-weight:700; 
    font-size:14px;
 }
 p.font-features
 {
  width:46.72;
  height:17px;   
 }
 .rectangle{
  height: auto;
  width: 75px;
  /*border-radius: 10px; */
 /* animation: blinkingBackground 10s infinite;*/
 }
</style>
<!-- total -->
<div class="text" style="left: 486Pt !important;top: 208pt;">
  <div>
    <div class="rectangle" style="margin-bottom:5px;"><p class="font-features"><?php echo round(($GW1_U14_Voltage_LL_V+$GW1_U21_Voltage_LL_V+$GW1_U15_Voltage_LL_V+$GW1_U16_Voltage_LL_V+$GW1_U18_Voltage_LL_V+$GW1_U19_Voltage_LL_V+$GW1_U17_Voltage_LL_V+$GW1_U20_Voltage_LL_V)/8,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:5px;"><p class="font-features"><?php echo round($GW1_U14_Current_Avg_Amp+$GW1_U21_Current_Avg_Amp+$GW1_U15_Current_Avg_Amp+$GW1_U16_Current_Avg_Amp+$GW1_U18_Current_Avg_Amp+$GW1_U19_Current_Avg_Amp+$GW1_U17_Current_Avg_Amp+$GW1_U20_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U14_ActivePower_Total_kW+$GW1_U21_ActivePower_Total_kW+$GW1_U15_ActivePower_Total_kW+$GW1_U16_ActivePower_Total_kW+$GW1_U18_ActivePower_Total_kW+$GW1_U17_ActivePower_Total_kW+$GW1_U20_ActivePower_Total_kW+$GW1_U19_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- GR8 -->
<div class="text" style="left: 854pt !important;top: 440pt;">
  <div>
    <?php if($GW1_U14_ActivePower_Total_kW==0 && $GW1_U14_Current_Avg_Amp==0 && $GW1_U14_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U14_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 911Pt !important;top: 455pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U14_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U14_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:2px"><p class="font-features"><?php echo round($GW1_U14_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- GR7 -->
<div class="text" style="left: 725pt !important;top: 363pt;">
  <div>
    <?php if($GW1_U21_ActivePower_Total_kW==0 && $GW1_U21_Current_Avg_Amp==0 && $GW1_U21_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U21_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 782pt !important;top: 376pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U21_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:8px;"><p class="font-features"><?php echo round($GW1_U21_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U21_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- GR5 -->
<div class="text" style="left: 490pt !important;top: 363pt;">
  <div>
    <?php if($GW1_U15_ActivePower_Total_kW==0 && $GW1_U15_Current_Avg_Amp==0 && $GW1_U15_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U15_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 543pt !important;top: 376pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U15_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U15_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U15_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- GR4 -->
<div class="text" style="left: 373pt !important;top: 439pt;">
  <div>
    <?php if($GW1_U16_ActivePower_Total_kW==0 && $GW1_U16_Current_Avg_Amp==0 && $GW1_U16_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U16_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 426Pt !important;top: 453pt;">
  <div>
    <div class="rectangle" style="margin-bottom:4px;"><p class="font-features"><?php echo round($GW1_U16_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U16_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U16_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- GR2 -->
<div class="text" style="left: 132pt !important;top: 439pt;">
  <div>
    <?php if($GW1_U18_ActivePower_Total_kW==0 && $GW1_U18_Current_Avg_Amp==0 && $GW1_U18_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U18_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 186Pt !important;top: 455pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U18_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U18_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U18_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- GR1 -->
<div class="text" style="left: 7pt !important;top: 364pt;">
  <div>
    <?php if($GW1_U19_ActivePower_Total_kW==0 && $GW1_U19_Current_Avg_Amp==0 && $GW1_U19_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U19_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 65Pt !important;top: 378pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U19_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U19_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U19_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- GR3 -->
<div class="text" style="left: 252pt !important;top: 363pt;">
  <div>
    <?php if($GW1_U17_ActivePower_Total_kW==0 && $GW1_U17_Current_Avg_Amp==0 && $GW1_U17_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U17_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left:307Pt !important;top: 376pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U17_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U17_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U17_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- GR6 -->
<div class="text" style="left:609pt !important;top: 440pt;">
  <div>
    <?php if($GW1_U20_ActivePower_Total_kW==0 && $GW1_U20_Current_Avg_Amp==0 && $GW1_U20_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U20_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 661Pt !important;top: 455pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U20_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U20_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U20_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
 <?php } 
elseif ($id=='T_3'){
  ?>
  <style type="text/css">
  @import url('http://fonts.cdnfonts.com/css/bagator');
 .font-features{
  color:#0000FF;
   font-family: 'Bagator', sans-serif;
    font-weight:700; 
    font-size:14px;
 }
 p.font-features
 {
  width:46.72;
  height:17px;   
 }
 .rectangle{
  height: auto;
  width: 75px;
  /*border-radius: 10px; */
 /* animation: blinkingBackground 10s infinite;*/
 }
</style>
<!-- total -->
<div class="text" style="left: 496Pt !important;top: 224pt;">
  <div>
    <div class="rectangle" style="margin-bottom:5px;"><p class="font-features"><?php echo round(($GW1_U4_Voltage_LL_V+$GW1_U2_Voltage_LL_V+$GW1_U3_Voltage_LL_V+$GW1_U5_Voltage_LL_V)/4,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:5px;"><p class="font-features"><?php echo round($GW1_U4_Current_Avg_Amp+$GW1_U2_Current_Avg_Amp+$GW1_U3_Current_Avg_Amp+$GW1_U5_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U4_ActivePower_Total_kW+$GW1_U2_ActivePower_Total_kW+$GW1_U3_ActivePower_Total_kW+$GW1_U5_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Surup Room -->
<div class="text" style="left: 93pt !important;top: 374pt;">
  <div>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
  </div>
</div>
<div class="text" style="left: 149Pt !important;top: 388pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features">NA V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features">NA A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features">NA kW</p></div>
  </div>
</div>
<!-- Sugar Dissolving -->
<div class="text" style="left: 212pt !important;top: 443pt;">
  <div>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
  </div>
</div>
<div class="text" style="left: 262Pt !important;top: 457pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features">NA V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features">NA A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features">NA kW</p></div>
  </div>
</div>
<!-- New Boiler -->
<div class="text" style="left: 325pt !important;top: 374pt;">
  <div>
    <?php if($GW1_U4_ActivePower_Total_kW==0 && $GW1_U4_Current_Avg_Amp==0 && $GW1_U4_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U4_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 377Pt !important;top: 388pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U4_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U4_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U4_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- old Boiler -->
<div class="text" style="left: 555pt !important;top: 374pt;">
  <div>
    <?php if($GW1_U2_ActivePower_Total_kW==0 && $GW1_U2_Current_Avg_Amp==0 && $GW1_U2_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U2_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 607Pt !important;top: 388pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U2_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U2_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U2_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Juice Room -->
<div class="text" style="left: 671pt !important;top: 443pt;">
  <div>
    <?php if($GW1_U3_ActivePower_Total_kW==0 && $GW1_U3_Current_Avg_Amp==0 && $GW1_U3_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U3_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 725Pt !important;top: 457pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U3_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U3_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U3_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Sugar Room -->
<div class="text" style="left: 781pt !important;top: 374pt;">
  <div>
    <?php if($GW1_U5_ActivePower_Total_kW==0 && $GW1_U5_Current_Avg_Amp==0 && $GW1_U5_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U5_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 837Pt !important;top: 388pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U5_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U5_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U5_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Shrink Tunnel -->
<div class="text" style="left:442pt !important;top: 443pt">
  <div>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
  </div>
</div>
<div class="text" style="left: 496Pt !important;top: 457pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features">NA V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features">NA A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features">NA kW</p></div>
  </div>
</div>
 <?php } 
 elseif ($id=='T_4'){
  ?>
  <style type="text/css">
  @import url('http://fonts.cdnfonts.com/css/bagator');
 .font-features{
  color:#0000FF;
   font-family: 'Bagator', sans-serif;
    font-weight:700; 
    font-size:14px;
 }
 p.font-features
 {
  width:46.72;
  height:17px;   
 }
 .rectangle{
  height: auto;
  width: 75px;
  /*border-radius: 10px; */
 /* animation: blinkingBackground 10s infinite;*/
 }
</style>
<!-- Total -->
<div class="text" style="left: 471Pt !important;top: 216pt;">
  <div>
    <div class="rectangle" style="margin-bottom:4px;"><p class="font-features"><?php echo round(($GW1_U6_Voltage_LL_V+$GW1_U7_Voltage_LL_V+$GW1_U23_Voltage_LL_V+$GW2_U2_Voltage_LL_V)/4,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:4px;"><p class="font-features"><?php echo round($GW1_U6_Current_Avg_Amp+$GW1_U7_Current_Avg_Amp+$GW1_U23_Current_Avg_Amp+$GW2_U2_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U6_ActivePower_Total_kW+$GW1_U7_ActivePower_Total_kW+$GW1_U23_ActivePower_Total_kW+$GW2_U2_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Line 1 -->
<div class="text" style="left: 92pt !important;top: 419pt;">
  <div>
    <?php if($GW1_U6_ActivePower_Total_kW==0 && $GW1_U6_Current_Avg_Amp==0 && $GW1_U6_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U6_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 145Pt !important;top: 435pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U6_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U6_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U6_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Line 2 -->
<div class="text" style="left: 223pt !important;top: 419pt;">
  <div>
    <?php if($GW1_U7_ActivePower_Total_kW==0 && $GW1_U7_Current_Avg_Amp==0 && $GW1_U7_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U7_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 278Pt !important;top: 435pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U7_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U7_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U7_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Line 6 -->
<div class="text" style="left: 615pt !important;top: 419pt;">
  <div>
    <?php if($GW1_U23_ActivePower_Total_kW==0 && $GW1_U23_Current_Avg_Amp==0 && $GW1_U23_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW1_U23_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 670Pt !important;top: 435pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U23_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW1_U23_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW1_U23_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- Line 8 -->
<div class="text" style="left: 745pt !important;top: 419pt;">
  <div>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
  </div>
</div>
<div class="text" style="left: 800Pt !important;top: 435pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features">NA V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features">NA A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features">NA kW</p></div>
  </div>
</div>
<!-- Line 5 -->
<div class="text" style="left: 482pt !important;top: 419pt;">
  <div>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
  </div>
</div>
<div class="text" style="left: 536Pt !important;top: 435pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features">NA V</p></div>
    <div class="rectangle" style="margin-bottom:4px;"><p class="font-features">NA A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features">NA kW</p></div>
  </div>
</div>
<!-- Line 4 -->
<div class="text" style="left:353pt !important;top: 419pt;">
  <div>
    <?php if($GW2_U2_ActivePower_Total_kW==0 && $GW2_U2_Current_Avg_Amp==0 && $GW2_U2_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW2_U2_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 408Pt !important;top: 435pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW2_U2_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:4px;"><p class="font-features"><?php echo round($GW2_U2_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U2_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<?php }
elseif ($id=='T_5'){
  ?>
  <style type="text/css">
  @import url('http://fonts.cdnfonts.com/css/bagator');
 .font-features{
  color:#0000FF;
   font-family: 'Bagator', sans-serif;
    font-weight:700; 
    font-size:14px;
 }
 p.font-features
 {
  width:46.72;
  height:17px;   
 }
 .rectangle{
  height: auto;
  width: 75px;
  /*border-radius: 10px; */
 /* animation: blinkingBackground 10s infinite;*/
 }
</style>
<div class="text" style="left: 466Pt !important;top: 246pt;">
  <div>
    <div class="rectangle" style="margin-bottom:5px;"><p class="font-features"><?php echo round(($GW2_U12_Voltage_LL_V+$GW2_U11_Voltage_LL_V+$GW2_U13_Voltage_LL_V+$GW2_U14_Voltage_LL_V)/4,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW2_U12_Current_Avg_Amp+$GW2_U11_Current_Avg_Amp+$GW2_U13_Current_Avg_Amp+$GW2_U14_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U12_ActivePower_Total_kW+$GW2_U11_ActivePower_Total_kW+$GW2_U13_ActivePower_Total_kW+$GW2_U14_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- LPAC 1 -->
<div class="text" style="left: 173pt !important;top: 457pt;">
  <div>
    <?php if($GW2_U12_ActivePower_Total_kW==0 && $GW2_U12_Current_Avg_Amp==0 && $GW2_U12_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW2_U12_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 222Pt !important;top: 471pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW2_U12_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW2_U12_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U12_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- LPAC 2 -->
<div class="text" style="left: 328pt !important;top: 457pt;">
  <div>
    <?php if($GW2_U11_ActivePower_Total_kW==0 && $GW2_U11_Current_Avg_Amp==0 && $GW2_U11_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW2_U11_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 382Pt !important;top: 471pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW2_U11_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW2_U11_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U11_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- LPAC 3 -->
<div class="text" style="left:490pt !important;top: 457pt;">
  <div>
    <?php if($GW2_U14_ActivePower_Total_kW==0 && $GW2_U14_Current_Avg_Amp==0 && $GW2_U14_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW2_U14_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 546Pt !important;top: 471pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW2_U14_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW2_U14_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U14_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- LPAC 4 -->
<div class="text" style="left:649pt !important;top: 457pt;">
  <div>
    <?php if($GW2_U13_ActivePower_Total_kW==0 && $GW2_U13_Current_Avg_Amp==0 && $GW2_U13_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW2_U13_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 705Pt !important;top: 471pt;">
  <div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW2_U13_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:6px;"><p class="font-features"><?php echo round($GW2_U13_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U13_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<?php } 
elseif ($id=='T_6'){
  ?>
  <style type="text/css">
  @import url('http://fonts.cdnfonts.com/css/bagator');
 .font-features{
  color:#0000FF;
   font-family: 'Bagator', sans-serif;
    font-weight:700; 
    font-size:14px;
 }
 p.font-features
 {
  width:46.72;
  height:17px;   
 }
 .rectangle{
  height: auto;
  width: 75px;
  /*border-radius: 10px; */
 /* animation: blinkingBackground 10s infinite;*/
 }
</style>
<div class="text" style="left: 539Pt !important;top: 200pt;">
  <div>
    <div class="rectangle" style="margin-bottom:3px;"><p class="font-features"><?php echo round(($GW2_U3_Voltage_LL_V+$GW2_U4_Voltage_LL_V)/2,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:3px;"><p class="font-features"><?php echo round($GW2_U3_Current_Avg_Amp+$GW2_U4_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U3_ActivePower_Total_kW+$GW2_U4_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- HP Comp 1-->
<div class="text" style="left: 376pt !important;top: 378pt;">
  <div>
    <?php if($GW2_U3_ActivePower_Total_kW==0 && $GW2_U3_Current_Avg_Amp==0 && $GW2_U3_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW2_U3_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 420Pt !important;top: 392pt;">
  <div>
    <div class="rectangle" style="margin-bottom:4px;"><p class="font-features"><?php echo round($GW2_U3_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:4px;"><p class="font-features"><?php echo round($GW2_U3_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U3_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<!-- HP Comp 2 -->
<div class="text" style="left:605pt !important;top: 378pt;">
  <div>
    <?php if($GW2_U4_ActivePower_Total_kW==0 && $GW2_U4_Current_Avg_Amp==0 && $GW2_U4_Voltage_LL_V==0 ) { ?>
    <img src="assets/images/red.png" style="height: 20px; width: 20px;">
    <?php } 
    elseif($GW2_U4_ActivePower_Total_kW==0) { ?>
    <img src="assets/images/yell.png" style="height: 20px; width: 20px;">
    <?php } else { ?>
    <img src="assets/images/green.png" style="height: 20px; width: 20px;">
    <?php } ?>
  </div>
</div>
<div class="text" style="left: 653Pt !important;top: 392pt;">
  <div>
    <div class="rectangle" style="margin-bottom:4px;"><p class="font-features"><?php echo round($GW2_U4_Voltage_LL_V,2); ?> V</p></div>
    <div class="rectangle" style="margin-bottom:4px;"><p class="font-features"><?php echo round($GW2_U4_Current_Avg_Amp,2); ?> A</p></div>
    <div class="rectangle" style="margin-bottom:4px"><p class="font-features"><?php echo round($GW2_U4_ActivePower_Total_kW,2); ?> kW</p></div>
  </div>
</div>
<?php }
 ?>