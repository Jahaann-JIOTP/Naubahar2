<?php 
error_reporting(E_ERROR | E_PARSE);
include('Action/mongodb_conn.php');
$collection = $db->naubahar_b;
$meter=$_GET['meter'];
$val=$_GET['val'];
if ($val=='volt') {
$Tag = $meter.'_Voltage_LL_V';
$Tag1 = $meter.'_Voltage_AB_V';
$Tag2 = $meter.'_Voltage_BC_V';
$Tag3 = $meter.'_Voltage_CA_V';
$Tag4 = $meter.'_Voltage_AN_V';  
$Tag5 = $meter.'_Voltage_BN_V';  
$Tag6 = $meter.'_Voltage_CN_V';
$Tag7 = $meter.'_Voltage_LN_V'; 
// $Tag8 = $j.'_Status'; 
$start_date = date('Y-m-d-H:i:s');
$end_date = date('Y-m-d-H:i:s');  
// $start_date = '2024-06-21';
// $end_date = '2024-06-24';
$start_date = $_GET['s'];
$end_date = $_GET['e'];
$start_date = date('Y-m-d', strtotime($start_date));
$start_date1='DT#'.$start_date;
echo $start_date1;
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
$end_date1='DT#'.$end_date;
$where = array(
'PLC_Date_Time' =>  array('$gte' => $start_date1, '$lte' => $end_date1)
            );
$select_fields = array(
    $Tag => 1,
    $Tag1 => 1,
    $Tag2 => 1,
    $Tag3 => 1,
    $Tag4 => 1,
    $Tag5 => 1,
    $Tag6 => 1,
    $Tag7 => 1,
    // $Tag8 => 1,
    'PLC_Date_Time' => 1,
    'UNIXtimestamp' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
    $index=0;
    foreach ($docs as $document) {
        json_encode($document);
        var_dump($document);
        foreach ($document as $key => $value) {
             $term[$index][$key]=$value;
         }
        $index++;        
    }
   //  return; 
    for ($i=0; $i < $index; $i++) { 
     echo '<tr><td style="text-align:center">'.((str_replace("DT#", "", $term[$i]['PLC_Date_Time']))).'</td><td style="text-align:center">'.round($term[$i][$Tag1],2).'</td><td style="text-align:center">'.round($term[$i][$Tag2],2).'</td><td style="text-align:center">'.round($term[$i][$Tag3],2).'</td><td style="text-align:center">'.round($term[$i][$Tag4],2).'</td><td style="text-align:center">'.round($term[$i][$Tag5],2).'</td><td style="text-align:center">'.round($term[$i][$Tag6],2).'</td><td style="text-align:center">'.round($term[$i][$Tag7],2).'</td><td style="text-align:center">'.round($term[$i][$Tag],2);
   }
 }
 elseif($val=='current'){
 $Tag = $meter.'_Current_AN_Amp';
$Tag1 = $meter.'_Current_BN_Amp';
$Tag2 = $meter.'_Current_CN_Amp';
$Tag3 = $meter.'_Current_Avg_Amp'; 
$start_date = date('Y-m-d-H:i:s');
$end_date = date('Y-m-d-H:i:s');  
$start_date = $_GET['s'];
$end_date = $_GET['e'];
$start_date = date('Y-m-d', strtotime($start_date));
$start_date1='DT#'.$start_date;
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
$end_date1='DT#'.$end_date;
$where = array(
'PLC_Date_Time' =>  array('$gte' => $start_date1, '$lte' => $end_date1)
            );
$select_fields = array(
    $Tag => 1,
    $Tag1 => 1,
    $Tag2 => 1,
    $Tag3 => 1,
    // $Tag4 => 1,
    'Time' => 1,
    'UNIXtimestamp' => 1,
    'PLC_Date_Time' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
    $index=0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
             $term[$index][$key]=$value;
         }
        $index++;        
    }
    
    for ($i=0; $i < $index; $i++) { 
    echo '<tr><td style="text-align:center">'.((str_replace("DT#", "", $term[$i]['PLC_Date_Time']))).'</td><td style="text-align:center">'.round($term[$i][$Tag],2).'</td><td style="text-align:center">'.round($term[$i][$Tag1],2).'</td><td style="text-align:center">'.round($term[$i][$Tag2],2).'</td><td style="text-align:center">'.round($term[$i][$Tag3],2);
   }
 }
 elseif($val=='power_factor'){
$Tag = $meter.'_PowerFactor_A';
$Tag1 = $meter.'_PowerFactor_B';
$Tag2 = $meter.'_PowerFactor_C';
$Tag3 = $meter.'_PowerFactor_Total'; 
$start_date = date('Y-m-d-H:i:s');
$end_date = date('Y-m-d-H:i:s');  
$start_date = $_GET['s'];
$end_date = $_GET['e'];
$start_date = date('Y-m-d', strtotime($start_date));
$start_date1='DT#'.$start_date;
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
$end_date1='DT#'.$end_date;
$where = array(
'PLC_Date_Time' =>  array('$gte' => $start_date1, '$lte' => $end_date1)
            );
$select_fields = array(
    $Tag => 1,
    $Tag1 => 1,
    $Tag2 => 1,
    $Tag3 => 1,
    // $Tag4 => 1,
    'Time' => 1,
    'UNIXtimestamp' => 1,
    'PLC_Date_Time' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
    $index=0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
             $term[$index][$key]=$value;
         }
        $index++;        
    }
    
    for ($i=0; $i < $index; $i++) { 
    echo '<tr><td style="text-align:center">'.((str_replace("DT#", "", $term[$i]['PLC_Date_Time']))).'</td><td style="text-align:center">'.round($term[$i][$Tag],2).'</td><td style="text-align:center">'.round($term[$i][$Tag1],2).'</td><td style="text-align:center">'.round($term[$i][$Tag2],2).'</td><td style="text-align:center">'.round($term[$i][$Tag3],2);
   }
 }
 elseif($val=='active_power'){
$Tag = $meter.'_ActivePower_A_kW';
$Tag1 = $meter.'_ActivePower_B_kW';
$Tag2 = $meter.'_ActivePower_C_kW';
$Tag3 = $meter.'_ActivePower_Total_kW';  
// $Tag4 = $j.'_Status';  
$start_date = date('Y-m-d-H:i:s');
$end_date = date('Y-m-d-H:i:s');  
$start_date = $_GET['s'];
$end_date = $_GET['e'];
$start_date = date('Y-m-d', strtotime($start_date));
$start_date1='DT#'.$start_date;
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
$end_date1='DT#'.$end_date;
$where = array(
    'PLC_Date_Time' =>  array('$gte' => $start_date1, '$lte' => $end_date1)
                );
$select_fields = array(
    $Tag => 1,
    $Tag1 => 1,
    $Tag2 => 1,
    $Tag3 => 1,
    // $Tag4 => 1,
    'Time' => 1,
    'UNIXtimestamp' => 1,
    'PLC_Date_Time' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
    $index=0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
             $term[$index][$key]=$value;
         }
        $index++;        
    }
    
    for ($i=0; $i < $index; $i++) { 

     echo '<tr><td style="text-align:center">'.((str_replace("DT#", "", $term[$i]['PLC_Date_Time']))).'</td><td style="text-align:center">'.round($term[$i][$Tag],2).'</td><td style="text-align:center">'.round($term[$i][$Tag1],2).'</td><td style="text-align:center">'.round($term[$i][$Tag2],2).'</td><td style="text-align:center">'.round($term[$i][$Tag3],2);
   // } 
   }
 }
 elseif($val=='reactive_power'){
$Tag = $meter.'_ReactivePower_A_kVAR';
$Tag1 = $meter.'_ReactivePower_B_kVAR';
$Tag2 = $meter.'_ReactivePower_C_kVAR';
$Tag3 = $meter.'_ReactivePower_Total_kVAR'; 
// $Tag4 = $j.'_Status';  
$start_date = date('Y-m-d-H:i:s');
$end_date = date('Y-m-d-H:i:s');  
$start_date = $_GET['s'];
$end_date = $_GET['e'];
$start_date = date('Y-m-d', strtotime($start_date));
$start_date1='DT#'.$start_date;
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
$end_date1='DT#'.$end_date;
$where = array(
'PLC_Date_Time' =>  array('$gte' => $start_date1, '$lte' => $end_date1)
            );
$select_fields = array(
    $Tag => 1,
    $Tag1 => 1,
    $Tag2 => 1,
    $Tag3 => 1,
    // $Tag4 => 1,
    'Time' => 1,
    'UNIXtimestamp' => 1,
    'PLC_Date_Time' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
    $index=0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
             $term[$index][$key]=$value;
         }
        $index++;        
    }
    
    for ($i=0; $i < $index; $i++) { 
     echo '<tr><td style="text-align:center">'.((str_replace("DT#", "", $term[$i]['PLC_Date_Time']))).'</td><td style="text-align:center">'.round($term[$i][$Tag],2).'</td><td style="text-align:center">'.round($term[$i][$Tag1],2).'</td><td style="text-align:center">'.round($term[$i][$Tag2],2).'</td><td style="text-align:center">'.round($term[$i][$Tag3],2);
   }
 }
 elseif($val=='apparent_power'){
$Tag = $meter.'_ApparentPower_A_kVA';
$Tag1 = $meter.'_ApparentPower_B_kVA';
$Tag2 = $meter.'_ApparentPower_C_kVA';
$Tag3 = $meter.'_ApparentPower_Total_kVA'; 
// $Tag4 = $j.'_Status'; 
$start_date = date('Y-m-d-H:i:s');
$end_date = date('Y-m-d-H:i:s');  
$start_date = $_GET['s'];
$end_date = $_GET['e'];
$start_date = date('Y-m-d', strtotime($start_date));
$start_date1='DT#'.$start_date;
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
$end_date1='DT#'.$end_date;
$where = array(
'PLC_Date_Time' =>  array('$gte' => $start_date1, '$lte' => $end_date1)
            );
$select_fields = array(
    $Tag => 1,
    $Tag1 => 1,
    $Tag2 => 1,
    $Tag3 => 1,
    // $Tag4 => 1,
    'Time' => 1,
    'PLC_Date_Time' => 1,
    'UNIXtimestamp' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
    $index=0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
             $term[$index][$key]=$value;
         }
        $index++;        
    }
    
    for ($i=0; $i < $index; $i++) { 
     echo '<tr><td style="text-align:center">'.((str_replace("DT#", "", $term[$i]['PLC_Date_Time']))).'</td><td style="text-align:center">'.round($term[$i][$Tag],2).'</td><td style="text-align:center">'.round($term[$i][$Tag1],2).'</td><td style="text-align:center">'.round($term[$i][$Tag2],2).'</td><td style="text-align:center">'.round($term[$i][$Tag3],2);
   }
 }
 elseif($val=='harmonics'){
$Tag = $meter.'_Harmonics_I1_THD';
$Tag1 = $meter.'_Harmonics_I2_THD';
$Tag2 = $meter.'_Harmonics_I3_THD';  
$Tag8 = $meter.'_Harmonics_V1_THD';  
$Tag9 = $meter.'_Harmonics_V2_THD';  
$Tag10 = $meter.'_Harmonics_V3_THD'; 
// $Tag11 = $j.'_Status';
$start_date = date('Y-m-d-H:i:s');
$end_date = date('Y-m-d-H:i:s');  
$start_date = $_GET['s'];
$end_date = $_GET['e'];
$start_date = date('Y-m-d', strtotime($start_date));
$start_date1='DT#'.$start_date;
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
$end_date1='DT#'.$end_date;
$where = array(
'PLC_Date_Time' =>  array('$gte' => $start_date1, '$lte' => $end_date1)
            );
$select_fields = array(
    $Tag => 1,
    $Tag1 => 1,
    $Tag2 => 1,
    $Tag8 => 1,
    $Tag9 => 1,
    $Tag10 => 1,
    // $Tag11 => 1,
    'Time' => 1,
    'PLC_Date_Time' => 1,
    'UNIXtimestamp' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
    $index=0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
             $term[$index][$key]=$value;
         }
        $index++;        
    }
    
    for ($i=0; $i < $index; $i++) { 
     echo '<tr><td style="text-align:center">'.((str_replace("DT#", "", $term[$i]['PLC_Date_Time']))).'</td><td style="text-align:center">'.round($term[$i][$Tag],2).'</td><td style="text-align:center">'.round($term[$i][$Tag1],2).'</td><td style="text-align:center">'.round($term[$i][$Tag2],2).'</td><td style="text-align:center">'.round($term[$i][$Tag8],2).'</td><td style="text-align:center">'.round($term[$i][$Tag9],2).'</td><td style="text-align:center">'.round($term[$i][$Tag10],2);
   }
 }
 elseif($val=='active_energy'){
$Tag = $meter.'_ActiveEnergy_Delivered_A_kWh';
$Tag1 = $meter.'_ActiveEnergy_Delivered_B_kWh';
$Tag2 = $meter.'_ActiveEnergy_Delivered_C_kWh'; 
$Tag3 = $meter.'_ActiveEnergy_Delivered_kWh';
$Tag4 = $meter.'_ActiveEnergy_Received_A_kWh';
$Tag5 = $meter.'_ActiveEnergy_Received_B_kWh';
$Tag6 = $meter.'_ActiveEnergy_Received_C_kWh';
$Tag7 = $meter.'_ActiveEnergy_Received_kWh'; 
// $Tag8 = $j.'_Status';
$start_date = date('Y-m-d-H:i:s');
$end_date = date('Y-m-d-H:i:s');  
$start_date = $_GET['s'];
$end_date = $_GET['e'];
$start_date = date('Y-m-d', strtotime($start_date));
$start_date1='DT#'.$start_date;
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
$end_date1='DT#'.$end_date;
$where = array(
'PLC_Date_Time' =>  array('$gte' => $start_date1, '$lte' => $end_date1)
            );
$select_fields = array(
    $Tag => 1,
    $Tag1 => 1,
    $Tag2 => 1,
    $Tag3 => 1,
    $Tag4 => 1,
    $Tag5 => 1,
    $Tag6 => 1,
    $Tag7 => 1,
    // $Tag8 => 1,
    'Time' => 1,
    'PLC_Date_Time' => 1,
    'UNIXtimestamp' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
    $index=0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
             $term[$index][$key]=$value;
         }
        $index++;        
    }
    
    for ($i=0; $i < $index; $i++) { 
     echo '<tr><td style="text-align:center">'.((str_replace("DT#", "", $term[$i]['PLC_Date_Time']))).'</td><td style="text-align:center">'.round($term[$i][$Tag],2).'</td><td style="text-align:center">'.round($term[$i][$Tag1],2).'</td><td style="text-align:center">'.round($term[$i][$Tag2],2).'</td><td style="text-align:center">'.round($term[$i][$Tag3],2).'</td><td style="text-align:center">'.round($term[$i][$Tag4],2).'</td><td style="text-align:center">'.round($term[$i][$Tag5],2).'</td><td style="text-align:center">'.round($term[$i][$Tag6],2).'</td><td style="text-align:center">'.round($term[$i][$Tag7],2);
   }
 }
 elseif($val=='rective_energy'){
$Tag = $meter.'_ReactiveEnergy_Delivered_A_kVARh';
$Tag1 = $meter.'_ReactiveEnergy_Delivered_B_kVARh';
$Tag2 = $meter.'_ReactiveEnergy_Delivered_C_kVARh'; 
$Tag3 = $meter.'_ReactiveEnergy_Delivered_kVARh';
$Tag4 = $meter.'_ReactiveEnergy_Received_A_kVARh';
$Tag5 = $meter.'_ReactiveEnergy_Received_B_kVARh';
$Tag6 = $meter.'_ReactiveEnergy_Received_C_kVARh';
$Tag7 = $meter.'_ReactiveEnergy_Received_kVARh'; 
// $Tag8 = $j.'_Status';
$start_date = date('Y-m-d-H:i:s');
$end_date = date('Y-m-d-H:i:s');  
$start_date = $_GET['s'];
$end_date = $_GET['e'];
$start_date = date('Y-m-d', strtotime($start_date));
$start_date1='DT#'.$start_date;
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
$end_date1='DT#'.$end_date;
$where = array(
'PLC_Date_Time' =>  array('$gte' => $start_date1, '$lte' => $end_date1)
            );
$select_fields = array(
    $Tag => 1,
    $Tag1 => 1,
    $Tag2 => 1,
    $Tag3 => 1,
    $Tag4 => 1,
    $Tag5 => 1,
    $Tag6 => 1,
    $Tag7 => 1,
    // $Tag8 => 1,
    'Time' => 1,
    'PLC_Date_Time' => 1,
    'UNIXtimestamp' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
    $index=0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
             $term[$index][$key]=$value;
         }
        $index++;        
    }
    
    for ($i=0; $i < $index; $i++) { 
     echo '<tr><td style="text-align:center">'.((str_replace("DT#", "", $term[$i]['PLC_Date_Time']))).'</td><td style="text-align:center">'.round($term[$i][$Tag],2).'</td><td style="text-align:center">'.round($term[$i][$Tag1],2).'</td><td style="text-align:center">'.round($term[$i][$Tag2],2).'</td><td style="text-align:center">'.round($term[$i][$Tag3],2).'</td><td style="text-align:center">'.round($term[$i][$Tag4],2).'</td><td style="text-align:center">'.round($term[$i][$Tag5],2).'</td><td style="text-align:center">'.round($term[$i][$Tag6],2).'</td><td style="text-align:center">'.round($term[$i][$Tag7],2);
   }
 }
 elseif($val=='apparent_energy'){
$Tag =  $meter.'_ApparentEnergy_A_kVAh';
$Tag1 = $meter.'_ApparentEnergy_B_kVAh';
$Tag2 = $meter.'_ApparentEnergy_C_kVAh';
$Tag3 = $meter.'_ApparentEnergy_DelpRec_kVAh'; 
// $Tag4 = $j.'_Status'; 
$start_date = date('Y-m-d-H:i:s');
$end_date = date('Y-m-d-H:i:s');  
$start_date = $_GET['s'];
$end_date = $_GET['e'];
$start_date = date('Y-m-d', strtotime($start_date));
$start_date1='DT#'.$start_date;
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
$end_date1='DT#'.$end_date;
$where = array(
'PLC_Date_Time' =>  array('$gte' => $start_date1, '$lte' => $end_date1)
            );
$select_fields = array(
    $Tag => 1,
    $Tag1 => 1,
    $Tag2 => 1,
    $Tag3 => 1,
    // $Tag4 => 1,
    'Time' => 1,
    'PLC_Date_Time' => 1,
    'UNIXtimestamp' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
    $index=0;
    foreach ($docs as $document) {
        json_encode($document);
        foreach ($document as $key => $value) {
             $term[$index][$key]=$value;
         }
        $index++;        
    }
    
    for ($i=0; $i < $index; $i++) { 
     echo '<tr><td style="text-align:center">'.((str_replace("DT#", "", $term[$i]['PLC_Date_Time']))).'</td><td style="text-align:center">'.round($term[$i][$Tag],2).'</td><td style="text-align:center">'.round($term[$i][$Tag1],2).'</td><td style="text-align:center">'.round($term[$i][$Tag2],2).'</td><td style="text-align:center">'.round($term[$i][$Tag3],2);
   }
 }
 ?>