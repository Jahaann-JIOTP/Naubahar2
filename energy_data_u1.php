<?php
$meter=$_GET['meter'];
session_start();
if(!isset($_SESSION['auth']))
{
  // not logged in
  header('Location:index.php');
}
$url = "http://13.234.241.103:1880/latestnaubahar1";
$json = file_get_contents($url);
$msg = json_decode($json, true);
//kWh import//
$ActiveEnergy_Delivered_A_kWh = 0;
if(isset( $msg[$meter.'_ActiveEnergy_Delivered_A_kWh']))
$ActiveEnergy_Delivered_A_kWh = round($msg[$meter.'_ActiveEnergy_Delivered_A_kWh'],2);
$ActiveEnergy_Delivered_B_kWh= 0;
if(isset( $msg[$meter.'_ActiveEnergy_Delivered_B_kWh']))
$ActiveEnergy_Delivered_B_kWh = round($msg[$meter.'_ActiveEnergy_Delivered_B_kWh'],2);
$ActiveEnergy_Delivered_C_kWh= 0;
if(isset( $msg[$meter.'_ActiveEnergy_Delivered_C_kWh']))
$ActiveEnergy_Delivered_C_kWh = round($msg[$meter.'_ActiveEnergy_Delivered_C_kWh'],2);
$ActiveEnergy_Delivered_kWh= 0;
if(isset( $msg[$meter.'_ActiveEnergy_Delivered_kWh']))
$ActiveEnergy_Delivered_kWh = round($msg[$meter.'_ActiveEnergy_Delivered_kWh'],2);
//kVARh import//
$ReactiveEnergy_Delivered_A_kVARh = 0;
if(isset( $msg[$meter.'_ReactiveEnergy_Delivered_A_kVARh']))
$ReactiveEnergy_Delivered_A_kVARh = round($msg[$meter.'_ReactiveEnergy_Delivered_A_kVARh'],2);
$ReactiveEnergy_Delivered_B_kVARh= 0;
if(isset( $msg[$meter.'_ReactiveEnergy_Delivered_B_kVARh']))
$ReactiveEnergy_Delivered_B_kVARh = round($msg[$meter.'_ReactiveEnergy_Delivered_B_kVARh'],2);
$ReactiveEnergy_Delivered_C_kVARh= 0;
if(isset( $msg[$meter.'_ReactiveEnergy_Delivered_C_kVARh']))
$ReactiveEnergy_Delivered_C_kVARh = round($msg[$meter.'_ReactiveEnergy_Delivered_C_kVARh'],2);
$ReactiveEnergy_Delivered_kVARh= 0;
if(isset( $msg[$meter.'_ReactiveEnergy_Delivered_kVARh']))
$ReactiveEnergy_Delivered_kVARh = round($msg[$meter.'_ReactiveEnergy_Delivered_kVARh'],2);
//Active energy export//
$ActiveEnergy_Received_A_kWh = 0;
if(isset( $msg[$meter.'_ActiveEnergy_Received_A_kWh']))
$ActiveEnergy_Received_A_kWh = round($msg[$meter.'_ActiveEnergy_Received_A_kWh'],2);
$ActiveEnergy_Received_B_kWh= 0;
if(isset( $msg[$meter.'_ActiveEnergy_Received_B_kWh']))
$ActiveEnergy_Received_B_kWh = round($msg[$meter.'_ActiveEnergy_Received_B_kWh'],2);
$ActiveEnergy_Received_C_kWh= 0;
if(isset( $msg[$meter.'_ActiveEnergy_Received_C_kWh']))
$ActiveEnergy_Received_C_kWh = round($msg[$meter.'_ActiveEnergy_Received_C_kWh'],2);
$ActiveEnergy_Received_kWh= 0;
if(isset( $msg[$meter.'_ActiveEnergy_Received_kWh']))
$ActiveEnergy_Received_kWh = round($msg[$meter.'_ActiveEnergy_Received_kWh'],2);
//Reactive energy export//
$ReactiveEnergy_Received_A_kVARh = 0;
if(isset( $msg[$meter.'_ReactiveEnergy_Received_A_kVARh']))
$ReactiveEnergy_Received_A_kVARh = round($msg[$meter.'_ReactiveEnergy_Received_A_kVARh'],2);
$ReactiveEnergy_Received_B_kVARh= 0;
if(isset( $msg[$meter.'_ReactiveEnergy_Received_B_kVARh']))
$ReactiveEnergy_Received_B_kVARh = round($msg[$meter.'_ReactiveEnergy_Received_B_kVARh'],2);
$ReactiveEnergy_Received_C_kVARh= 0;
if(isset( $msg[$meter.'_ReactiveEnergy_Received_C_kVARh']))
$ReactiveEnergy_Received_C_kVARh = round($msg[$meter.'_ReactiveEnergy_Received_C_kVARh'],2);
$ReactiveEnergy_Received_kVARh= 0;
if(isset( $msg[$meter.'_ReactiveEnergy_Received_kVARh']))
$ReactiveEnergy_Received_kVARh = round($msg[$meter.'_ReactiveEnergy_Received_kVARh'],2);
//Apparent//
$ApparentEnergy_A_kVAh = 0;
if(isset( $msg[$meter.'_ApparentEnergy_A_kVAh']))
$ApparentEnergy_A_kVAh = round($msg[$meter.'_ApparentEnergy_A_kVAh'],2);
$ApparentEnergy_B_kVAh= 0;
if(isset( $msg[$meter.'_ApparentEnergy_B_kVAh']))
$ApparentEnergy_B_kVAh = round($msg[$meter.'_ApparentEnergy_B_kVAh'],2);
$ApparentEnergy_C_kVAh= 0;
if(isset( $msg[$meter.'_ApparentEnergy_C_kVAh']))
$ApparentEnergy_C_kVAh = round($msg[$meter.'_ApparentEnergy_C_kVAh'],2);
$ApparentEnergy_DelpRec_kVAh= 0;
if(isset( $msg[$meter.'_ApparentEnergy_DelpRec_kVAh']))
$ApparentEnergy_DelpRec_kVAh = round($msg[$meter.'_ApparentEnergy_DelpRec_kVAh'],2);
?>
<style>
 p.sld_font{
    color: black !important;
    font-family:Verdana!important;
     font-size:12px;
    font-weight: bold !important;
  }
</style>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- <....kwh....> -->
<div class="text" style="left: 87pt !important;top: 102pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Delivered_A_kWh; ?></p>
  </div>
</div>
<div class="text" style="left: 87pt !important;top: 143pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Delivered_B_kWh; ?></p>
  </div>
</div>
<div class="text" style="left: 87pt !important;top: 188pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Delivered_C_kWh; ?></p>
  </div>
</div>
<div class="text" style="left: 87pt !important;top: 228pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Delivered_kWh; ?></p>
  </div>
</div>
<!-- <...kvarh....> -->
<div class="text" style="left: 215pt !important;top:102pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Delivered_A_kVARh; ?></p>
  </div>
</div>
<div class="text" style="left: 215pt !important;top: 143pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Delivered_B_kVARh; ?></p>
  </div>
</div>
<div class="text" style="left: 215pt !important;top: 188pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Delivered_C_kVARh; ?></p>
  </div>
</div>
<div class="text" style="left: 215pt !important;top: 228pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Delivered_kVARh; ?></p>
  </div>
</div>
<!-- <....kvarh Eport....> -->
<div class="text" style="left: 535pt !important;top: 102pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Received_A_kWh; ?></p>
  </div>
</div>
<div class="text" style="left: 535pt !important;top: 143pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Received_B_kWh; ?></p>
  </div>
</div>
<div class="text" style="left: 535pt !important;top: 188pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Received_C_kWh; ?></p>
  </div>
</div>
<div class="text" style="left: 535pt !important;top: 228pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Received_kWh; ?></p>
  </div>
</div>
<!-- <....kvah Eport....> -->
<div class="text" style="left: 666pt !important;top:102pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Received_A_kVARh; ?></p>
  </div>
</div>
<div class="text" style="left: 666pt !important;top: 143pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Received_B_kVARh; ?></p>
  </div>
</div>
<div class="text" style="left: 666pt !important;top: 188pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Received_C_kVARh; ?></p>
  </div>
</div>
<div class="text" style="left: 666pt !important;top: 228pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Received_kVARh; ?></p>
  </div>
</div>

<!-- <....Apparent Energy....> -->

<div class="text" style="left: 393pt !important;top:298pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentEnergy_A_kVAh; ?></p>
  </div>
</div>
<div class="text" style="left: 393pt !important;top:335pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentEnergy_B_kVAh; ?></p>
  </div>
</div>
<div class="text" style="left: 393pt !important;top:366pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentEnergy_C_kVAh; ?></p>
  </div>
</div>
<div class="text" style="left: 393pt !important;top:404pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentEnergy_DelpRec_kVAh; ?></p>
  </div>
</div>