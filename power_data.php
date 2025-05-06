<?php
error_reporting(0);
$id=$_GET['id'];
$meter=$_GET['meter'];
session_start();
if(!isset($_SESSION['auth']))
{
  // not logged in
  header('Location:index.php');
}
$url = "http://13.234.241.103:1880/latestunit2";
$json = file_get_contents($url);
$msg = json_decode($json, true);
//current
if ($meter=='GW1_U24' || $meter=='GW3_U2' || $meter=='GW3_U3' || $meter=='GW3_U4'|| $meter=='GW3_U5'|| $meter=='GW3_U6') {
$Harmonics_I1_THD = 0;
if(isset( $msg[$meter.'_Harmonics_I1_THD']))
$Harmonics_I1_THD = round($msg[$meter.'_Harmonics_I1_THD'],2);
$Harmonics_I2_THD= 0;
if(isset( $msg[$meter.'_Harmonics_I2_THD']))
$Harmonics_I2_THD = round($msg[$meter.'_Harmonics_I2_THD'],2);
$Harmonics_I3_THD = 0;
if(isset( $msg[$meter.'_Harmonics_I3_THD']))
$Harmonics_I3_THD = round($msg[$meter.'_Harmonics_I3_THD'],2);
//Voltage
$Harmonics_V1_THD = 0;
if(isset( $msg[$meter.'_Harmonics_V1_THD']))
$Harmonics_V1_THD = round($msg[$meter.'_Harmonics_V1_THD'],2);
$Harmonics_V2_THD= 0;
if(isset( $msg[$meter.'_Harmonics_V2_THD']))
$Harmonics_V2_THD = round($msg[$meter.'_Harmonics_V2_THD'],2);
$Harmonics_V3_THD = 0;
if(isset( $msg[$meter.'_Harmonics_V3_THD']))
$Harmonics_V3_THD = round($msg[$meter.'_Harmonics_V3_THD'],2);
}
else{
  $Harmonics_I1_THD = 0;
if(isset( $msg[$meter.'_Harmonics_I1_THD']))
$Harmonics_I1_THD = round($msg[$meter.'_Harmonics_I1_THD']/10,2);
$Harmonics_I2_THD= 0;
if(isset( $msg[$meter.'_Harmonics_I2_THD']))
$Harmonics_I2_THD = round($msg[$meter.'_Harmonics_I2_THD']/10,2);
$Harmonics_I3_THD = 0;
if(isset( $msg[$meter.'_Harmonics_I3_THD']))
$Harmonics_I3_THD = round($msg[$meter.'_Harmonics_I3_THD']/10,2);
//Voltage
$Harmonics_V1_THD = 0;
if(isset( $msg[$meter.'_Harmonics_V1_THD']))
$Harmonics_V1_THD = round($msg[$meter.'_Harmonics_V1_THD']/10,2);
$Harmonics_V2_THD= 0;
if(isset( $msg[$meter.'_Harmonics_V2_THD']))
$Harmonics_V2_THD = round($msg[$meter.'_Harmonics_V2_THD']/10,2);
$Harmonics_V3_THD = 0;
if(isset( $msg[$meter.'_Harmonics_V3_THD']))
$Harmonics_V3_THD = round($msg[$meter.'_Harmonics_V3_THD']/10,2);
}
//power

  $ActivePower_C_kW = 0;
  if (isset($msg[$meter . '_ActivePower_C_kW']))
    $ActivePower_C_kW = round($msg[$meter . '_ActivePower_C_kW'], 2);
  $ActivePower_B_kW = 0;
  if (isset($msg[$meter . '_ActivePower_B_kW']))
    $ActivePower_B_kW = round($msg[$meter . '_ActivePower_B_kW'], 2);
  $ActivePower_A_kW = 0;
  if (isset($msg[$meter . '_ActivePower_A_kW']))
    $ActivePower_A_kW = round($msg[$meter . '_ActivePower_A_kW'], 2);
  $ActivePower_Total_kW = 0;
  if (isset($msg[$meter . '_ActivePower_Total_kW']))
    $ActivePower_Total_kW = round($msg[$meter . '_ActivePower_Total_kW'], 2);

//Repower
$ReactivePower_A_kVAR = 0;
if(isset( $msg[$meter.'_ReactivePower_A_kVAR']))
$ReactivePower_A_kVAR = round($msg[$meter.'_ReactivePower_A_kVAR'],2);
$ReactivePower_B_kVAR= 0;
if(isset( $msg[$meter.'_ReactivePower_B_kVAR']))
$ReactivePower_B_kVAR= round($msg[$meter.'_ReactivePower_B_kVAR'],2);
$ReactivePower_C_kVAR = 0;
if(isset( $msg[$meter.'_ReactivePower_C_kVAR']))
$ReactivePower_C_kVAR = round($msg[$meter.'_ReactivePower_C_kVAR'],2);
$ReactivePower_Total_kVAR = 0;
if(isset( $msg[$meter.'_ReactivePower_Total_kVAR']))
$ReactivePower_Total_kVAR = round($msg[$meter.'_ReactivePower_Total_kVAR'],2);
//ARepower
$ApparentPower_A_kVA = 0;
if(isset( $msg[$meter.'_ApparentPower_A_kVA']))
$ApparentPower_A_kVA= round($msg[$meter.'_ApparentPower_A_kVA'],2);
$ApparentPower_B_kVA= 0;
if(isset( $msg[$meter.'_ApparentPower_B_kVA']))
$ApparentPower_B_kVA= round($msg[$meter.'_ApparentPower_B_kVA'],2);
$ApparentPower_C_kVA = 0;
if(isset( $msg[$meter.'_ApparentPower_C_kVA']))
$ApparentPower_C_kVA = round($msg[$meter.'_ApparentPower_C_kVA'],2);
$ApparentPower_Total_kVA = 0;
if(isset( $msg[$meter.'_ApparentPower_Total_kVA']))
$ApparentPower_Total_kVA = round($msg[$meter.'_ApparentPower_Total_kVA'],2);
?>
<?php 
if ($id=='T_1') {
?>
<style>
  p.sld_font{
    color: black !important;
    font-family:Verdana!important;
     font-size:12px;
    font-weight: bold !important;
  }
</style>
<!-- <....Harmonics..i..> -->
<div class="text" style="left: 90pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 254pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I3_THD; ?></p>
  </div>
</div>
<!-- <....Harmonics..V..> -->
<div class="text" style="left: 303pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 255pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V3_THD; ?></p>
  </div>
</div>
<!-- <....power....> -->
<!-- <....kw...> -->
<div class="text" style="left: 547pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_A_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_B_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_C_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 537pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_Total_kW ?></p>
  </div>
</div>
<!-- <....kvar.....> -->
<div class="text" style="left: 670pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_A_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_B_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_C_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 673pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_Total_kVAR ?></p>
  </div>
</div>
<!-- <....kva.....> -->
<div class="text" style="left: 784pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_A_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_B_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_C_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 776pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_Total_kVA ?></p>
  </div>
</div>
<?php } 
 elseif ($id=='T_2'){
  ?>
  <style>
  p.sld_font{
    color: black !important;
    font-family:Verdana!important;
     font-size:12px;
    font-weight: bold !important;
  }
</style>
  <!-- <....Harmonics..i..> -->
<div class="text" style="left: 90pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 254pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I3_THD; ?></p>
  </div>
</div>
<!-- <....Harmonics..V..> -->
<div class="text" style="left: 303pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 255pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V3_THD; ?></p>
  </div>
</div>
<!-- <....power....> -->
<!-- <....kw...> -->
<div class="text" style="left: 547pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_A_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_B_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_C_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 542pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_Total_kW ?></p>
  </div>
</div>
<!-- <....kvar.....> -->
<div class="text" style="left: 670pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_A_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_B_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_C_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 673pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_Total_kVAR ?></p>
  </div>
</div>
<!-- <....kva.....> -->
<div class="text" style="left: 784pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_A_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_B_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_C_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 778pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_Total_kVA ?></p>
  </div>
</div>
<?php }
 elseif ($id=='T_3'){
  ?>
  <style>
  p.sld_font{
    color: black !important;
    font-family:Verdana!important;
     font-size:12px;
    font-weight: bold !important;
  }
</style>
  <!-- <....Harmonics..i..> -->
<div class="text" style="left: 90pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 254pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I3_THD; ?></p>
  </div>
</div>
<!-- <....Harmonics..V..> -->
<div class="text" style="left: 303pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 255pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V3_THD; ?></p>
  </div>
</div>
<!-- <....power....> -->
<!-- <....kw...> -->
<div class="text" style="left: 547pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_A_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_B_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_C_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 542pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_Total_kW ?></p>
  </div>
</div>
<!-- <....kvar.....> -->
<div class="text" style="left: 670pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_A_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_B_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_C_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 673pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_Total_kVAR ?></p>
  </div>
</div>
<!-- <....kva.....> -->
<div class="text" style="left: 784pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_A_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_B_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_C_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 778pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_Total_kVA ?></p>
  </div>
</div>
<?php } 
elseif ($id=='T_4'){
  ?>
  <style>
  p.sld_font{
    color: black !important;
    font-family:Verdana!important;
     font-size:12px;
    font-weight: bold !important;
  }
</style>
  <!-- <....Harmonics..i..> -->
<div class="text" style="left: 90pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 254pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I3_THD; ?></p>
  </div>
</div>
<!-- <....Harmonics..V..> -->
<div class="text" style="left: 303pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 255pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V3_THD; ?></p>
  </div>
</div>
<!-- <....power....> -->
<!-- <....kw...> -->
<div class="text" style="left: 547pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_A_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_B_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_C_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 542pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_Total_kW ?></p>
  </div>
</div>
<!-- <....kvar.....> -->
<div class="text" style="left: 670pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_A_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_B_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_C_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 673pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_Total_kVAR ?></p>
  </div>
</div>
<!-- <....kva.....> -->
<div class="text" style="left: 784pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_A_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_B_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_C_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 778pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_Total_kVA ?></p>
  </div>
</div>
<?php }
elseif ($id=='T_5'){
  ?>
  <style>
  p.sld_font{
    color: black !important;
    font-family:Verdana!important;
     font-size:12px;
    font-weight: bold !important;
  }
</style>
  <!-- <....Harmonics..i..> -->
<div class="text" style="left: 90pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 254pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I3_THD; ?></p>
  </div>
</div>
<!-- <....Harmonics..V..> -->
<div class="text" style="left: 303pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 255pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V3_THD; ?></p>
  </div>
</div>
<!-- <....power....> -->
<!-- <....kw...> -->
<div class="text" style="left: 547pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_A_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_B_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_C_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 542pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_Total_kW ?></p>
  </div>
</div>
<!-- <....kvar.....> -->
<div class="text" style="left: 670pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_A_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_B_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_C_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 673pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_Total_kVAR ?></p>
  </div>
</div>
<!-- <....kva.....> -->
<div class="text" style="left: 784pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_A_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_B_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_C_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 778pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_Total_kVA ?></p>
  </div>
</div>
<?php }
elseif ($id=='T_6'){
  ?>
  <style>
  p.sld_font{
    color: black !important;
    font-family:Verdana!important;
     font-size:12px;
    font-weight: bold !important;
  }
</style>
  <!-- <....Harmonics..i..> -->
<div class="text" style="left: 90pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 90pt !important;top: 254pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_I3_THD; ?></p>
  </div>
</div>
<!-- <....Harmonics..V..> -->
<div class="text" style="left: 303pt !important;top: 126pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V1_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 187pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V2_THD; ?></p>
  </div>
</div>
<div class="text" style="left: 303pt !important;top: 255pt;">
  <div>
    <p class="sld_font"><?php echo $Harmonics_V3_THD; ?></p>
  </div>
</div>
<!-- <....power....> -->
<!-- <....kw...> -->
<div class="text" style="left: 547pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_A_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_B_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 547pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ActivePower_C_kW; ?></p>
  </div>
</div>
<div class="text" style="left: 542pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php $ReactivePower_Total_kVAR ?></p>
  </div>
</div>
<!-- <....kvar.....> -->
<div class="text" style="left: 670pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_A_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_B_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 670pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_C_kVAR; ?></p>
  </div>
</div>
<div class="text" style="left: 673pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ReactivePower_Total_kVAR ?></p>
  </div>
</div>
<!-- <....kva.....> -->
<div class="text" style="left: 784pt !important;top: 123pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_A_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 186pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_B_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 784pt !important;top: 253pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_C_kVA; ?></p>
  </div>
</div>
<div class="text" style="left: 778pt !important;top: 325pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentPower_Total_kVA ?></p>
  </div>
</div>
<?php }

?>
