<?php
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
//kWh import//
$ActiveEnergy_Delivered_kWh= 0;
if(isset( $msg[$meter.'_ActiveEnergy_Delivered_kWh']))
$ActiveEnergy_Delivered_kWh = round($msg[$meter.'_ActiveEnergy_Delivered_kWh'],2);
//kVARh import//
$ReactiveEnergy_Delivered_kVARh= 0;
if(isset( $msg[$meter.'_ReactiveEnergy_Delivered_kVARh']))
$ReactiveEnergy_Delivered_kVARh = round($msg[$meter.'_ReactiveEnergy_Delivered_kVARh'],2);
//Active energy export//
$ActiveEnergy_Received_kWh= 0;
if(isset( $msg[$meter.'_ActiveEnergy_Received_kWh']))
$ActiveEnergy_Received_kWh = round($msg[$meter.'_ActiveEnergy_Received_kWh'],2);
//Reactive energy export//
$ReactiveEnergy_Received_kVARh= 0;
if(isset( $msg[$meter.'_ReactiveEnergy_Received_kVARh']))
$ReactiveEnergy_Received_kVARh = round($msg[$meter.'_ReactiveEnergy_Received_kVARh'],2);
//Apparent//
$ApparentEnergy_DelpRec_kVAh= 0;
if(isset( $msg[$meter.'_ApparentEnergy_DelpRec_kVAh']))
$ApparentEnergy_DelpRec_kVAh = round($msg[$meter.'_ApparentEnergy_DelpRec_kVAh'],2);
?>
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
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- <....kwh import....> -->
<div class="text" style="left: 240pt !important;top: 125pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Delivered_kWh; ?></p>
  </div>
</div>
<!-- <...kvarh import....> -->
<div class="text" style="left: 240pt !important;top: 170pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Delivered_kVARh; ?></p>
  </div>
</div>
<!-- <....kvah Eport....> -->
<div class="text" style="left: 531pt !important;top: 122pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Received_kWh; ?></p>
  </div>
</div>
<!-- <....kvarh Eport....> -->
<div class="text" style="left: 531pt !important;top: 172pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Received_kVARh; ?></p>
  </div>
</div>
<!-- <....Apparent Energy....> -->
<div class="text" style="left: 386pt !important;top:228pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentEnergy_DelpRec_kVAh; ?> (kVah)</p>
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
  <!-- <....kwh import....> -->
<div class="text" style="left: 240pt !important;top: 125pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Delivered_kWh; ?></p>
  </div>
</div>
<!-- <...kvarh import....> -->
<div class="text" style="left: 240pt !important;top: 170pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Delivered_kVARh; ?></p>
  </div>
</div>
<!-- <....kvah Eport....> -->
<div class="text" style="left: 531pt !important;top: 122pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Received_kWh; ?></p>
  </div>
</div>
<!-- <....kvarh Eport....> -->
<div class="text" style="left: 531pt !important;top: 172pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Received_kVARh; ?></p>
  </div>
</div>
<!-- <....Apparent Energy....> -->
<div class="text" style="left: 386pt !important;top:228pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentEnergy_DelpRec_kVAh; ?> (kVah)</p>
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
<!-- <....kwh import....> -->
<div class="text" style="left: 240pt !important;top: 125pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Delivered_kWh; ?></p>
  </div>
</div>
<!-- <...kvarh import....> -->
<div class="text" style="left: 240pt !important;top: 170pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Delivered_kVARh; ?></p>
  </div>
</div>
<!-- <....kvah Eport....> -->
<div class="text" style="left: 531pt !important;top: 122pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Received_kWh; ?></p>
  </div>
</div>
<!-- <....kvarh Eport....> -->
<div class="text" style="left: 531pt !important;top: 172pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Received_kVARh; ?></p>
  </div>
</div>
<!-- <....Apparent Energy....> -->
<div class="text" style="left: 386pt !important;top:228pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentEnergy_DelpRec_kVAh; ?> (kVah)</p>
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
<!-- <....kwh import....> -->
<div class="text" style="left: 240pt !important;top: 125pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Delivered_kWh; ?></p>
  </div>
</div>
<!-- <...kvarh import....> -->
<div class="text" style="left: 240pt !important;top: 170pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Delivered_kVARh; ?></p>
  </div>
</div>
<!-- <....kvah Eport....> -->
<div class="text" style="left: 531pt !important;top: 122pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Received_kWh; ?></p>
  </div>
</div>
<!-- <....kvarh Eport....> -->
<div class="text" style="left: 531pt !important;top: 172pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Received_kVARh; ?></p>
  </div>
</div>
<!-- <....Apparent Energy....> -->
<div class="text" style="left: 386pt !important;top:228pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentEnergy_DelpRec_kVAh; ?> (kVah)</p>
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
<!-- <....kwh import....> -->
<div class="text" style="left: 240pt !important;top: 125pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Delivered_kWh; ?></p>
  </div>
</div>
<!-- <...kvarh import....> -->
<div class="text" style="left: 240pt !important;top: 170pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Delivered_kVARh; ?></p>
  </div>
</div>
<!-- <....kvah Eport....> -->
<div class="text" style="left: 531pt !important;top: 122pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Received_kWh; ?></p>
  </div>
</div>
<!-- <....kvarh Eport....> -->
<div class="text" style="left: 531pt !important;top: 172pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Received_kVARh; ?></p>
  </div>
</div>
<!-- <....Apparent Energy....> -->
<div class="text" style="left: 386pt !important;top:228pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentEnergy_DelpRec_kVAh; ?> (kVah)</p>
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
<!-- <....kwh import....> -->
<div class="text" style="left: 240pt !important;top: 125pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Delivered_kWh; ?></p>
  </div>
</div>
<!-- <...kvarh import....> -->
<div class="text" style="left: 240pt !important;top: 170pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Delivered_kVARh; ?></p>
  </div>
</div>
<!-- <....kvah Eport....> -->
<div class="text" style="left: 531pt !important;top: 122pt;">
  <div>
    <p class="sld_font"><?php echo $ActiveEnergy_Received_kWh; ?></p>
  </div>
</div>
<!-- <....kvarh Eport....> -->
<div class="text" style="left: 531pt !important;top: 172pt;">
  <div>
    <p class="sld_font"><?php echo $ReactiveEnergy_Received_kVARh; ?></p>
  </div>
</div>
<!-- <....Apparent Energy....> -->
<div class="text" style="left: 386pt !important;top:228pt;">
  <div>
    <p class="sld_font"><?php echo $ApparentEnergy_DelpRec_kVAh; ?> (kVah)</p>
  </div>
</div>
<?php }

?>