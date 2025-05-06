<?php
error_reporting(0);
session_start();
$id = $_GET['id'];
$meter = $_GET['meter'];
if (!isset($_SESSION['auth'])) {
  // not logged in
  header('Location:index.php');
}
$url = "http://13.234.241.103:1880/latestunit2";
$json = file_get_contents($url);
$msg = json_decode($json, true);
//volts
if ($meter == 'GW1_U24' || $meter == 'GW3_U2' || $meter == 'GW3_U3' || $meter == 'GW3_U4' || $meter == 'GW3_U5' || $meter == 'GW3_U6' || $meter == 'GW1_U25') {
  // code...
  $Voltage_CA_V = 0;
  if (isset($msg[$meter . '_Voltage_CA_V']))
    $Voltage_CA_V = round($msg[$meter . '_Voltage_CA_V'], 2);
  $Voltage_BC_V = 0;
  if (isset($msg[$meter . '_Voltage_BC_V']))
    $Voltage_BC_V = round($msg[$meter . '_Voltage_BC_V'], 2);
  $Voltage_AB_V = 0;
  if (isset($msg[$meter . '_Voltage_AB_V']))
    $Voltage_AB_V = round($msg[$meter . '_Voltage_AB_V'], 2);
  $Voltage_AN_V = 0;
  if (isset($msg[$meter . '_Voltage_AN_V']))
    $Voltage_AN_V = round($msg[$meter . '_Voltage_AN_V'], 2);
  $Voltage_BN_V = 0;
  if (isset($msg[$meter . '_Voltage_BN_V']))
    $Voltage_BN_V = round($msg[$meter . '_Voltage_BN_V'], 2);
  $Voltage_CN_V = 0;
  if (isset($msg[$meter . '_Voltage_CN_V']))
    $Voltage_CN_V = round($msg[$meter . '_Voltage_CN_V'], 2);
  $Voltage_LN_V = 0;
  if (isset($msg[$meter . '_Voltage_LN_V']))
    $Voltage_LN_V = round($msg[$meter . '_Voltage_LN_V'], 2);
  $Voltage_LL_V = 0;
  if (isset($msg[$meter . '_Voltage_LL_V']))
    $Voltage_LL_V = round($msg[$meter . '_Voltage_LL_V'], 2);


  //current
  $Current_Demand_C_Amp = 0;
  if (isset($msg[$meter . '_Current_CN_Amp']))
    $Current_Demand_C_Amp = round($msg[$meter . '_Current_CN_Amp'], 2);
  $Current_Demand_B_Amp = 0;
  if (isset($msg[$meter . '_Current_BN_Amp']))
    $Current_Demand_B_Amp = round($msg[$meter . '_Current_BN_Amp'], 2);
  $Current_Demand_A_Amp = 0;
  if (isset($msg[$meter . '_Current_AN_Amp']))
    $Current_Demand_A_Amp = round($msg[$meter . '_Current_AN_Amp'], 2);
  $Current_Avg_Amp = 0;
  if (isset($msg[$meter . '_Current_Avg_Amp']))
    $Current_Avg_Amp = round($msg[$meter . '_Current_Avg_Amp'], 2);
  $Current_N_Amp = 0;
  if (isset($msg[$meter . '_Current_N_Amp']))
    $Current_N_Amp = round($msg[$meter . '_Current_N_Amp'], 2);
} else {
  $Voltage_CA_V = 0;
  if (isset($msg[$meter . '_Voltage_CA_V']))
    $Voltage_CA_V = round($msg[$meter . '_Voltage_CA_V'] / 10, 2);
  $Voltage_BC_V = 0;
  if (isset($msg[$meter . '_Voltage_BC_V']))
    $Voltage_BC_V = round($msg[$meter . '_Voltage_BC_V'] / 10, 2);
  $Voltage_AB_V = 0;
  if (isset($msg[$meter . '_Voltage_AB_V']))
    $Voltage_AB_V = round($msg[$meter . '_Voltage_AB_V'] / 10, 2);
  $Voltage_AN_V = 0;
  if (isset($msg[$meter . '_Voltage_AN_V']))
    $Voltage_AN_V = round($msg[$meter . '_Voltage_AN_V'] / 10, 2);
  $Voltage_BN_V = 0;
  if (isset($msg[$meter . '_Voltage_BN_V']))
    $Voltage_BN_V = round($msg[$meter . '_Voltage_BN_V'] / 10, 2);
  $Voltage_CN_V = 0;
  if (isset($msg[$meter . '_Voltage_CN_V']))
    $Voltage_CN_V = round($msg[$meter . '_Voltage_CN_V'] / 10, 2);
  $Voltage_LN_V = 0;
  if (isset($msg[$meter . '_Voltage_LN_V']))
    $Voltage_LN_V = round($msg[$meter . '_Voltage_LN_V'] / 10, 2);
  $Voltage_LL_V = 0;
  if (isset($msg[$meter . '_Voltage_LL_V']))
    $Voltage_LL_V = round($msg[$meter . '_Voltage_LL_V'] / 10, 2);


  //current
  $Current_Demand_C_Amp = 0;
  if (isset($msg[$meter . '_Current_CN_Amp']))
    $Current_Demand_C_Amp = round($msg[$meter . '_Current_CN_Amp'] / 10, 2);
  $Current_Demand_B_Amp = 0;
  if (isset($msg[$meter . '_Current_BN_Amp']))
    $Current_Demand_B_Amp = round($msg[$meter . '_Current_BN_Amp'] / 10, 2);
  $Current_Demand_A_Amp = 0;
  if (isset($msg[$meter . '_Current_AN_Amp']))
    $Current_Demand_A_Amp = round($msg[$meter . '_Current_AN_Amp'] / 10, 2);
  $Current_Avg_Amp = 0;
  if (isset($msg[$meter . '_Current_Avg_Amp']))
    $Current_Avg_Amp = round($msg[$meter . '_Current_Avg_Amp'] / 10, 2);
  $Current_N_Amp = 0;
  if (isset($msg[$meter . '_Current_N_Amp']))
    $Current_N_Amp = round($msg[$meter . '_Current_N_Amp'] / 10, 2);
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
  $ReactivePower_Total_kVAR = 0;
  if (isset($msg[$meter . '_ReactivePower_Total_kVAR']))
    $ReactivePower_Total_kVAR = round($msg[$meter . '_ReactivePower_Total_kVAR'], 2);
  $ApparentPower_Total_kVA = 0;
  if (isset($msg[$meter . '_ApparentPower_Total_kVA']))
    $ApparentPower_Total_kVA = round($msg[$meter . '_ApparentPower_Total_kVA'], 2);

//FREQUENCY
if ($meter == 'GW1_U24' || $meter == 'GW3_U2' || $meter == 'GW3_U3' || $meter == 'GW3_U4' || $meter == 'GW3_U5' || $meter == 'GW3_U6') {
  $Frequency_Hz = 0;
  if (isset($msg[$meter . '_Frequency_Hz']))
    $Frequency_Hz = round($msg[$meter . '_Frequency_Hz'], 2);
  //Powerfactor
  $PowerFactor_Total = 0;
  if (isset($msg[$meter . '_PowerFactor_Total'])) {
    if ($meter == 'GW3_U6') {
      $PowerFactor_Total = round($msg[$meter . '_PowerFactor_Total'], 2);
    } else {
      $PowerFactor_Total = round($msg[$meter . '_PowerFactor_Total'], 2);
    }
  }
  $PowerFactor_A = 0;
  if ($meter == 'GW3_U6') {
    if (isset($msg[$meter . '_PowerFactor_A'])) {
      $PowerFactor_A = round($msg[$meter . '_PowerFactor_A'], 2);
    }
  } else {
    if (isset($msg[$meter . '_PowerFactor_A'])) {
      $PowerFactor_A = round($msg[$meter . '_PowerFactor_A'], 2);
    }
  }
  $PowerFactor_B = 0;
  if ($meter == 'GW3_U6') {
    if (isset($msg[$meter . '_PowerFactor_B'])) {
      $PowerFactor_B = round($msg[$meter . '_PowerFactor_B'], 2);
    }
  } else {
    if (isset($msg[$meter . '_PowerFactor_B'])) {
      $PowerFactor_B = round($msg[$meter . '_PowerFactor_B'], 2);
    }
  }

  $PowerFactor_C = 0;
  if ($meter == 'GW3_U6') {
    if (isset($msg[$meter . '_PowerFactor_C'])) {
      $PowerFactor_C = round($msg[$meter . '_PowerFactor_C'], 2);
    }
  } else {
    if (isset($msg[$meter . '_PowerFactor_C'])) {
      $PowerFactor_C = round($msg[$meter . '_PowerFactor_C'], 2);
    }
  }
} else {
  $Frequency_Hz = 0;
  if (isset($msg[$meter . '_Frequency_Hz']))
    $Frequency_Hz = round($msg[$meter . '_Frequency_Hz'] / 100, 2);
  //Powerfactor
  $PowerFactor_Total = 0;
  if (isset($msg[$meter . '_PowerFactor_Total']))
    $PowerFactor_Total = round($msg[$meter . '_PowerFactor_Total'] / 100, 2);
  $PowerFactor_A = 0;
  if (isset($msg[$meter . '_PowerFactor_A']))
    $PowerFactor_A = round($msg[$meter . '_PowerFactor_A'] / 100, 2);
  $PowerFactor_B = 0;
  if (isset($msg[$meter . '_PowerFactor_B']))
    $PowerFactor_B = round($msg[$meter . '_PowerFactor_B'] / 100, 2);
  $PowerFactor_C = 0;
  if (isset($msg[$meter . '_PowerFactor_C']))
    $PowerFactor_C = round($msg[$meter . '_PowerFactor_C'] / 100, 2);
}
if($meter == 'GW1_U25'){
  $Current_Demand_C_Amp = 0;
  if (isset($msg[$meter . '_Current_CN_Amp']))
    $Current_Demand_C_Amp = round($msg[$meter . '_Current_CN_Amp'] / 10, 2);
  $Current_Demand_B_Amp = 0;
  if (isset($msg[$meter . '_Current_BN_Amp']))
    $Current_Demand_B_Amp = round($msg[$meter . '_Current_BN_Amp'] / 10, 2);
  $Current_Demand_A_Amp = 0;
  if (isset($msg[$meter . '_Current_AN_Amp']))
    $Current_Demand_A_Amp = round($msg[$meter . '_Current_AN_Amp'] / 10, 2);
  $Current_Avg_Amp = 0;
  if (isset($msg[$meter . '_Current_Avg_Amp']))
    $Current_Avg_Amp = round($msg[$meter . '_Current_Avg_Amp'] / 10, 2);
  $Current_N_Amp = 0;
  if (isset($msg[$meter . '_Current_N_Amp']))
    $Current_N_Amp = round($msg[$meter . '_Current_N_Amp'] / 10, 2);
}
?>
<?php
if ($id == 'T_1') {
?>
  <style type="text/css">
    @media only screen and (max-width: 480px) {
      .diagram_height {
        /*height: 450px;*/
        overflow-y: scroll;
      }
    }
  </style>
  <style>
    p.font-features {
      color: #000000;
      font-family: Verdana;
      font-size: 12px;
      font-weight: bold !important;
    }
  </style>
  <!-- volts -->
  <div class="text" style="left: 48pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CA_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ca</b></p>
    </div>

  </div>
  <div class="text" style="left: 143pt !important;top: 107pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BC_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bc</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 178pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AB_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ab</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LL_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
  <!-- current -->
  <div class="text" style="left: 251pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_C_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 249pt !important;top: 143pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_B_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 247pt !important;top: 219pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_A_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 253pt !important;top: 267pt;">
    <div>
      <p class="font-features"><?php echo $Current_N_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">n</b></p>
    </div>
  </div>
  <div class="text" style="left: 250pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $Current_Avg_Amp; ?><b style="padding-left: 5px;">A</b></p>
    </div>
  </div>
  <!-- power -->
  <div class="text" style="left: 380pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_C_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_B_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 220pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_A_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 268pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_Total_kW; ?><b style="padding-left: 5px;">kW</b></p>
    </div>
  </div>
  <div class="text" style="left: 376pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $ReactivePower_Total_kVAR; ?><b style="padding-left: 5px;">KVAR</b></p>
    </div>
  </div>
  <div class="text" style="left: 379pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $ApparentPower_Total_kVA; ?><b style="padding-left: 5px;">KVA</b></p>
    </div>
  </div>
  <div class="text" style="left: 502pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">an</b></p>
    </div>
  </div>
  <div class="text" style="left: 602pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bn</b></p>
    </div>
  </div>
  <div class="text" style="left: 702pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">cn</b></p>
    </div>
  </div>
  <!-- <....frequency....> -->
  <div class="text" style="left: 822pt !important;top: 72pt;">
    <div>
      <p class="font-features"><?php echo $Frequency_Hz; ?><b style="padding-left: 5px;">Hz</b></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 115pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_Total; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 156pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_A; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 196pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_B; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 240pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_C; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 284pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LN_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
<?php } elseif ($id == 'T_2') {
?>
  <style type="text/css">
    @media only screen and (max-width: 480px) {
      .diagram_height {
        /*height: 450px;*/
        overflow-y: scroll;
      }
    }
  </style>
  <style>
    p.font-features {
      color: #000000;
      font-family: Verdana;
      font-size: 12px;
      font-weight: bold !important;
    }
  </style>
  <!-- volts -->
  <div class="text" style="left: 48pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CA_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ca</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 107pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BC_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bc</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 178pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AB_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ab</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LL_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
  <!-- current -->
  <div class="text" style="left: 251pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_C_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 249pt !important;top: 143pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_B_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 247pt !important;top: 219pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_A_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 253pt !important;top: 267pt;">
    <div>
      <p class="font-features"><?php echo $Current_N_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">n</b></p>
    </div>
  </div>
  <div class="text" style="left: 250pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $Current_Avg_Amp; ?><b style="padding-left: 5px;">A</b></p>
    </div>
  </div>
  <!-- power -->
  <div class="text" style="left: 380pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_C_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_B_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 220pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_A_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 268pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_Total_kW; ?><b style="padding-left: 5px;">kW</b></p>
    </div>
  </div>
  <div class="text" style="left: 376pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $ReactivePower_Total_kVAR; ?><b style="padding-left: 5px;">KVAR</b></p>
    </div>
  </div>
  <div class="text" style="left: 379pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $ApparentPower_Total_kVA; ?><b style="padding-left: 5px;">KVA</b></p>
    </div>
  </div>
  <div class="text" style="left: 502pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">an</b></p>
    </div>
  </div>
  <div class="text" style="left: 602pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bn</b></p>
    </div>
  </div>
  <div class="text" style="left: 702pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">cn</b></p>
    </div>
  </div>
  <!-- <....frequency....> -->
  <div class="text" style="left: 822pt !important;top: 72pt;">
    <div>
      <p class="font-features"><?php echo $Frequency_Hz; ?><b style="padding-left: 5px;">Hz</b></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 115pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_Total; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 156pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_A; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 196pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_B; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 240pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_C; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 284pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LN_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
<?php } elseif ($id == 'T_3') {
?>
  <style type="text/css">
    @media only screen and (max-width: 480px) {
      .diagram_height {
        /*height: 450px;*/
        overflow-y: scroll;
      }
    }
  </style>
  <style>
    p.font-features {
      color: #000000;
      font-family: Verdana;
      font-size: 12px;
      font-weight: bold !important;
    }
  </style>
  <!-- volts -->
  <div class="text" style="left: 48pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CA_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ca</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 107pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BC_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bc</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 178pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AB_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ab</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LL_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
  <!-- current -->
  <div class="text" style="left: 251pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_C_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 249pt !important;top: 143pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_B_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 247pt !important;top: 219pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_A_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 253pt !important;top: 267pt;">
    <div>
      <p class="font-features"><?php echo $Current_N_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">n</b></p>
    </div>
  </div>
  <div class="text" style="left: 250pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $Current_Avg_Amp; ?><b style="padding-left: 5px;">A</b></p>
    </div>
  </div>
  <!-- power -->
  <div class="text" style="left: 380pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_C_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_B_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 220pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_A_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 268pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_Total_kW; ?><b style="padding-left: 5px;">kW</b></p>
    </div>
  </div>
  <div class="text" style="left: 376pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $ReactivePower_Total_kVAR; ?><b style="padding-left: 5px;">KVAR</b></p>
    </div>
  </div>
  <div class="text" style="left: 379pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $ApparentPower_Total_kVA; ?><b style="padding-left: 5px;">KVA</b></p>
    </div>
  </div>
  <div class="text" style="left: 502pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">an</b></p>
    </div>
  </div>
  <div class="text" style="left: 602pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bn</b></p>
    </div>
  </div>
  <div class="text" style="left: 702pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">cn</b></p>
    </div>
  </div>
  <!-- <....frequency....> -->
  <div class="text" style="left: 822pt !important;top: 72pt;">
    <div>
      <p class="font-features"><?php echo $Frequency_Hz; ?><b style="padding-left: 5px;">Hz</b></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 115pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_Total; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 156pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_A; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 196pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_B; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 240pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_C; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 284pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LN_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
<?php } elseif ($id == 'T_4') {
?>
  <style type="text/css">
    @media only screen and (max-width: 480px) {
      .diagram_height {
        /*height: 450px;*/
        overflow-y: scroll;
      }
    }
  </style>
  <style>
    p.font-features {
      color: #000000;
      font-family: Verdana;
      font-size: 12px;
      font-weight: bold !important;
    }
  </style>
  <!-- volts -->
  <div class="text" style="left: 48pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CA_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ca</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 107pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BC_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bc</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 178pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AB_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ab</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LL_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
  <!-- current -->
  <div class="text" style="left: 251pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_C_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 249pt !important;top: 143pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_B_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 247pt !important;top: 219pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_A_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 253pt !important;top: 267pt;">
    <div>
      <p class="font-features"><?php echo $Current_N_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">n</b></p>
    </div>
  </div>
  <div class="text" style="left: 250pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $Current_Avg_Amp; ?><b style="padding-left: 5px;">A</b></p>
    </div>
  </div>
  <!-- power -->
  <div class="text" style="left: 380pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_C_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_B_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 220pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_A_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 268pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_Total_kW; ?><b style="padding-left: 5px;">kW</b></p>
    </div>
  </div>
  <div class="text" style="left: 376pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $ReactivePower_Total_kVAR; ?><b style="padding-left: 5px;">KVAR</b></p>
    </div>
  </div>
  <div class="text" style="left: 379pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $ApparentPower_Total_kVA; ?><b style="padding-left: 5px;">KVA</b></p>
    </div>
  </div>
  <div class="text" style="left: 502pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">an</b></p>
    </div>
  </div>
  <div class="text" style="left: 602pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bn</b></p>
    </div>
  </div>
  <div class="text" style="left: 702pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">cn</b></p>
    </div>
  </div>
  <!-- <....frequency....> -->
  <div class="text" style="left: 822pt !important;top: 72pt;">
    <div>
      <p class="font-features"><?php echo $Frequency_Hz; ?><b style="padding-left: 5px;">Hz</b></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 115pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_Total; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 156pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_A; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 196pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_B; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 240pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_C; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 284pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LN_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
<?php } elseif ($id == 'T_5') {
?>
  <style type="text/css">
    @media only screen and (max-width: 480px) {
      .diagram_height {
        /*height: 450px;*/
        overflow-y: scroll;
      }
    }
  </style>
  <style>
    p.font-features {
      color: #000000;
      font-family: Verdana;
      font-size: 12px;
      font-weight: bold !important;
    }
  </style>
  <!-- volts -->
  <div class="text" style="left: 48pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CA_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ca</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 107pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BC_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bc</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 178pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AB_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ab</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LL_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
  <!-- current -->
  <div class="text" style="left: 251pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_C_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 249pt !important;top: 143pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_B_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 247pt !important;top: 219pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_A_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 253pt !important;top: 267pt;">
    <div>
      <p class="font-features"><?php echo $Current_N_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">n</b></p>
    </div>
  </div>
  <div class="text" style="left: 250pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $Current_Avg_Amp; ?><b style="padding-left: 5px;">A</b></p>
    </div>
  </div>
  <!-- power -->
  <div class="text" style="left: 380pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_C_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_B_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 220pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_A_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 268pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_Total_kW; ?><b style="padding-left: 5px;">kW</b></p>
    </div>
  </div>
  <div class="text" style="left: 376pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $ReactivePower_Total_kVAR; ?><b style="padding-left: 5px;">KVAR</b></p>
    </div>
  </div>
  <div class="text" style="left: 379pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $ApparentPower_Total_kVA; ?><b style="padding-left: 5px;">KVA</b></p>
    </div>
  </div>
  <div class="text" style="left: 502pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">an</b></p>
    </div>
  </div>
  <div class="text" style="left: 602pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bn</b></p>
    </div>
  </div>
  <div class="text" style="left: 702pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">cn</b></p>
    </div>
  </div>
  <!-- <....frequency....> -->
  <div class="text" style="left: 822pt !important;top: 72pt;">
    <div>
      <p class="font-features"><?php echo $Frequency_Hz; ?><b style="padding-left: 5px;">Hz</b></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 115pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_Total; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 156pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_A; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 196pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_B; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 240pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_C; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 284pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LN_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
<?php } elseif ($id == 'T_6') {
?>
  <style type="text/css">
    @media only screen and (max-width: 480px) {
      .diagram_height {
        /*height: 450px;*/
        overflow-y: scroll;
      }
    }
  </style>
  <style>
    p.font-features {
      color: #000000;
      font-family: Verdana;
      font-size: 12px;
      font-weight: bold !important;
    }
  </style>
  <!-- volts -->
  <div class="text" style="left: 48pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CA_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ca</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 107pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BC_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bc</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 178pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AB_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">ab</b></p>
    </div>
  </div>
  <div class="text" style="left: 143pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LL_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
  <!-- current -->
  <div class="text" style="left: 251pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_C_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 249pt !important;top: 143pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_B_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 247pt !important;top: 219pt;">
    <div>
      <p class="font-features"><?php echo $Current_Demand_A_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 253pt !important;top: 267pt;">
    <div>
      <p class="font-features"><?php echo $Current_N_Amp; ?><b style="padding-left: 5px;">A</b><b style="padding-left: 5px;">n</b></p>
    </div>
  </div>
  <div class="text" style="left: 250pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $Current_Avg_Amp; ?><b style="padding-left: 5px;">A</b></p>
    </div>
  </div>
  <!-- power -->
  <div class="text" style="left: 380pt !important;top: 59pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_C_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">c</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 142pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_B_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">b</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 220pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_A_kW; ?><b style="padding-left: 5px;">kW</b><b style="padding-left: 5px;">a</b></p>
    </div>
  </div>
  <div class="text" style="left: 380pt !important;top: 268pt;">
    <div>
      <p class="font-features"><?php echo $ActivePower_Total_kW; ?><b style="padding-left: 5px;">kW</b></p>
    </div>
  </div>
  <div class="text" style="left: 376pt !important;top: 317pt;">
    <div>
      <p class="font-features"><?php echo $ReactivePower_Total_kVAR; ?><b style="padding-left: 5px;">KVAR</b></p>
    </div>
  </div>
  <div class="text" style="left: 379pt !important;top: 359pt;">
    <div>
      <p class="font-features"><?php echo $ApparentPower_Total_kVA; ?><b style="padding-left: 5px;">KVA</b></p>
    </div>
  </div>
  <div class="text" style="left: 502pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_AN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">an</b></p>
    </div>
  </div>
  <div class="text" style="left: 602pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_BN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">bn</b></p>
    </div>
  </div>
  <div class="text" style="left: 702pt !important;top: 302pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_CN_V; ?><b style="padding-left: 5px;">V</b><b style="padding-left: 5px;">cn</b></p>
    </div>
  </div>
  <!-- <....frequency....> -->
  <div class="text" style="left: 822pt !important;top: 72pt;">
    <div>
      <p class="font-features"><?php echo $Frequency_Hz; ?><b style="padding-left: 5px;">Hz</b></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 115pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_Total; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 156pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_A; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 196pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_B; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 240pt;">
    <div>
      <p class="font-features"><?php echo $PowerFactor_C; ?></p>
    </div>
  </div>
  <div class="text" style="left: 824pt !important;top: 284pt;">
    <div>
      <p class="font-features"><?php echo $Voltage_LN_V; ?><b style="padding-left: 5px;">V</b></p>
    </div>
  </div>
<?php }
?>