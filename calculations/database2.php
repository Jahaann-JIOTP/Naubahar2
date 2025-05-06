<?php
set_time_limit(400); // 
$value = $_GET['value'];
session_start();
error_reporting(E_ERROR | E_PARSE);
include('mongodb_conn.php');
$collection = $db->naubahar_activetags;
$current_date = date("Y-n-j");
if ($value == 'Last 7 Days') {
  $current_day = date("l");
  $current_date = date('Y-n-j', strtotime($current_date));
  //
  $start_date = date('Y-n-j', strtotime($current_date));
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
  $start_date1=intval($a1);
  //echo $start_date1.'</br>';
  $array = array();
  $array['cols'][] = array('type' => 'string');
  // $array['cols'][] = array('type' => 'number', 'label' => 'Main LT');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  $array['cols'][] = array('type' => 'number', 'label' => 'Air Compressor(3+4+5)');
  $array['cols'][] = array('type' => 'number', 'label' => 'Air Compressor(1+2)');
  $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 4');
  $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 3');
  $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 2');
  $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Evaporators');
  $array['cols'][] = array('type' => 'number', 'label' => 'Line - 5');
  $array['cols'][] = array('type' => 'number', 'label' => 'Line - 4');
  $array['cols'][] = array('type' => 'number', 'label' => 'Line - 3');
  $array['cols'][] = array('type' => 'number', 'label' => 'Line - 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Boiler');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine - 2');
  // for ($i = 0; $i <= 6; $i++) {
   $day = date('D', strtotime($start_date));
    $new_end = date('Y-n-j', strtotime($start_date ));
   $mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'T23:7:18+05:00'));
   $val2=json_decode(json_encode($mongotime2), true);
   foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
   }}
   $new_end1=intval($a2);
   //echo $new_end.'</br>';
   $s = 0;
   $e = 100;
   $select_fields = array(
    'U_1_ActiveEnergy_Delivered_kWh' => 1,
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1,
    'U_5_ActiveEnergy_Delivered_kWh' => 1,
    'U_6_ActiveEnergy_Delivered_kWh' => 1,
    'U_7_ActiveEnergy_Delivered_kWh' => 1,
    'U_8_ActiveEnergy_Delivered_kWh' => 1,
    'U_9_ActiveEnergy_Delivered_kWh' => 1,
    'U_10_ActiveEnergy_Delivered_kWh' => 1,
    'U_11_ActiveEnergy_Delivered_kWh' => 1,
    'U_12_ActiveEnergy_Delivered_kWh' => 1,
    'U_13_ActiveEnergy_Delivered_kWh' => 1,
    'U_14_ActiveEnergy_Delivered_kWh' => 1,
    'U_15_ActiveEnergy_Delivered_kWh' => 1,
    'U_16_ActiveEnergy_Delivered_kWh' => 1,
    'U_17_ActiveEnergy_Delivered_kWh' => 1,
     'timestamp'=>1
   );
  
   $where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date1, '$lte' => $new_end1)
   );
   $options = array(
    'projection' => $select_fields
   );
   $cursor = $collection->find($where, $options);   //This is the main line
   $docs = $cursor->toArray();
   $index = 0;
    $new_end = date('Y-n-j', strtotime($start_date . ' +1 day')).'</br>';
   foreach ($docs as $document) {
    json_encode($document);
     // var_dump($document);
    foreach ($document as $key => $value) {
     $term[$index][$key] = $value;
     // if(!empty($document['U_1_ActiveEnergy_Delivered_kWh'])){
     //  $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
     // }
     if (!empty($document['timestamp'])) {
       $arrT[] = $document['timestamp'];
       
      }
     if (!empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
      $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
      
     }
     if (!empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
      $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
      $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
      $arr4[] = $document['U_5_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
      $arr5[] = $document['U_6_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
      $arr6[] = $document['U_7_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
      $arr7[] = $document['U_8_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
      $arr8[] = $document['U_9_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
      $arr9[] = $document['U_10_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
      $arr10[] = $document['U_11_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
      $arr11[] = $document['U_12_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
      $arr12[] = $document['U_13_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
      $arr13[] = $document['U_14_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
      $arr14[] = $document['U_15_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
      $arr15[] = $document['U_16_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
      $arr16[] = $document['U_17_ActiveEnergy_Delivered_kWh'];
     }
    }
    $index++;
   }
    
    
    
   // if ($index > 0 && !empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
   //   $first_index = key($arr);
   //   $first = $arr[$first_index + 1];
   //   $end = end($arr);
   //   $U_1 = $end - $first;
   // } else {
   //   $U_1 = 0;
   // }
 //  var_dump($arrT);
 
 // if ($index > 0 && !empty($document['timestamp'])) {
 //   if($index > 73 && !empty($document['timestamp'])){
 //     $first_indexT = $new_strt;
 //    $firstT = $arrT[$first_index1];
 //     $end = end($arrT);
 //     end($arrT);
 //   $new_strt=key($arrT);
    
 //   }
 //   else{
 //     $first_index = key($arrT);
 //   $first = $arrT[$first_index + 1];
 //   $end = end($arrT);
 //   end($arrT);
 //   $new_strt=key($arrT);
  
 //   }
   
   
 //  } else {
 //   $U_T = 0;
 //  }
 
  if ($index > 0 && !empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_2_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt1;
    $first = $arr1[$first_index];
   
   
     $end = end($arr1);
     end($arr1);
   $new_strt1=key($arr1);
   $U_2 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr1);
    $first = $arr1[$first_index + 1];
    $end = end($arr1);
   end($arr1);
   $new_strt1=key($arr1);
   $U_2 = $end - $first;
   
   
 
   }
   } else {
   $U_2 = 0;
  }
  if ($index > 0 && !empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_3_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt2;
    $first = $arr2[$first_index];
   
   
     $end = end($arr2);
     end($arr2);
   $new_strt2=key($arr2);
   $U_3 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr2);
    $first = $arr2[$first_index + 1];
    $end = end($arr2);
   end($arr2);
   $new_strt2=key($arr2);
   $U_3 = $end - $first;
   
   
   
 
   }
   } else {
   $U_3 = 0;
  }
   
  if ($index > 0 && !empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_4_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt3;
    $first = $arr3[$first_index];
   
   
     $end = end($arr3);
     end($arr3);
   $new_strt3=key($arr3);
   $U_4 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr3);
    $first = $arr3[$first_index + 1];
    $end = end($arr3);
   end($arr3);
   $new_strt3=key($arr3);
   $U_4 = $end - $first;
   
   
   
 
   }
   } else {
   $U_4 = 0;
  }
  if ($index > 0 && !empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_5_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt4;
    $first = $arr4[$first_index];
   
   
     $end = end($arr4);
     end($arr4);
   $new_strt4=key($arr4);
   $U_5 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr4);
    $first = $arr4[$first_index + 1];
    $end = end($arr4);
   end($arr4);
   $new_strt4=key($arr4);
   $U_5 = $end - $first;
   
   
   
 
   }
   } else {
   $U_5 = 0;
  }
   
  if ($index > 0 && !empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_6_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt5;
    $first = $arr5[$first_index];
   
   
     $end = end($arr5);
     end($arr5);
   $new_strt5=key($arr5);
   $U_6 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr5);
    $first = $arr5[$first_index + 1];
    $end = end($arr5);
   end($arr5);
   $new_strt5=key($arr5);
   $U_6 = $end - $first;
   
   
   
 
   }
   } else {
   $U_6 = 0;
  }
  if ($index > 0 && !empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_7_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt6;
    $first = $arr6[$first_index];
   
   
     $end = end($arr6);
     end($arr6);
   $new_strt6=key($arr6);
   $U_7 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr6);
    $first = $arr6[$first_index + 1];
    $end = end($arr6);
   end($arr6);
   $new_strt6=key($arr6);
   $U_7 = $end - $first;
   
   
   
 
   }
   } else {
   $U_7 = 0;
  }
  if ($index > 0 && !empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_8_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt7;
    $first = $arr7[$first_index];
   
   
     $end = end($arr7);
     end($arr7);
   $new_strt7=key($arr7);
   $U_8 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr7);
    $first = $arr7[$first_index + 1];
    $end = end($arr7);
   end($arr7);
   $new_strt7=key($arr7);
   $U_8 = $end - $first;
   
   
   
 
   }
   } else {
   $U_8 = 0;
  }
  if ($index > 0 && !empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_9_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt8;
    $first = $arr8[$first_index];
   
   
     $end = end($arr8);
     end($arr8);
   $new_strt8=key($arr8);
   $U_9 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr8);
    $first = $arr8[$first_index + 1];
    $end = end($arr8);
   end($arr8);
   $new_strt8=key($arr8);
   $U_9 = $end - $first;
   
   
   
 
   }
   } else {
   $U_9 = 0;
  }
  if ($index > 0 && !empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_10_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt9;
    $first = $arr9[$first_index];
   
   
     $end = end($arr9);
     end($arr9);
   $new_strt9=key($arr9);
   $U_10 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr9);
    $first = $arr9[$first_index + 1];
    $end = end($arr9);
   end($arr9);
   $new_strt9=key($arr9);
   $U_10 = $end - $first;
   
   
   
 
   }
   } else {
   $U_10 = 0;
  }
  if ($index > 0 && !empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_11_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt10;
    $first = $arr10[$first_index];
   
   
     $end = end($arr10);
     end($arr10);
   $new_strt10=key($arr10);
   $U_11 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr10);
    $first = $arr10[$first_index + 1];
    $end = end($arr10);
   end($arr10);
   $new_strt10=key($arr10);
   $U_11 = $end - $first;
   
   
   
 
   }
   } else {
   $U_11 = 0;
  }
  if ($index > 0 && !empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_12_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt11;
    $first = $arr11[$first_index];
   
   
     $end = end($arr11);
     end($arr11);
   $new_strt11=key($arr11);
   $U_12 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr11);
    $first = $arr11[$first_index + 1];
    $end = end($arr11);
   end($arr11);
   $new_strt11=key($arr11);
   $U_12 = $end - $first;
   
   
   
 
   }
   } else {
   $U_12 = 0;
  }
  if ($index > 0 && !empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_13_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt12;
    $first = $arr12[$first_index];
   
   
     $end = end($arr12);
     end($arr12);
   $new_strt12=key($arr12);
   $U_13 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr12);
    $first = $arr12[$first_index + 1];
    $end = end($arr12);
   end($arr12);
   $new_strt12=key($arr12);
   $U_13 = $end - $first;
   
   
   
 
   }
   } else {
   $U_13 = 0;
  }
  if ($index > 0 && !empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_14_ActiveEnergy_Delivered_kWh'])){
     
     $first_index = $new_strt13;
    $first = $arr13[$first_index];
   
   
     $end = end($arr13);
     end($arr13);
   $new_strt13=key($arr13);
   $U_14 = $end - $first;
   
   
   
   }
   else{
     $first_index = key($arr13);
    $first = $arr13[$first_index + 1];
    $end = end($arr13);
   end($arr13);
   $new_strt13=key($arr13);
   $U_14 = $end - $first;
   
   
   
 
   }
   } else {
   $U_14 = 0;
  }
  if ($index > 0 && !empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_15_ActiveEnergy_Delivered_kWh'])){
     $first_index = $new_strt14;
    $first = $arr14[$first_index];
     $end = end($arr14);
     end($arr14);
   $new_strt14=key($arr14);
   $U_15 = $end - $first;
   }
   else{
     $first_index = key($arr14);
    $first = $arr14[$first_index + 1];
    $end = end($arr14);
   end($arr14);
   $new_strt14=key($arr14);
   $U_15 = $end - $first;
   }
   } else {
   $U_15 = 0;
  }
  if ($index > 0 && !empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_16_ActiveEnergy_Delivered_kWh'])){
     $first_index = $new_strt15;
    $first = $arr15[$first_index];
     $end = end($arr15);
     end($arr15);
   $new_strt15=key($arr15);
   $U_16 = $end - $first;
   }
   else{
     $first_index = key($arr15);
    $first = $arr15[$first_index + 1];
    $end = end($arr15);
   end($arr15);
   $new_strt15=key($arr15);
   $U_16 = $end - $first;
   }
   } else {
   $U_16 = 0;
  }
  if ($index > 0 && !empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
   
   if($index > 73 && !empty($document['U_17_ActiveEnergy_Delivered_kWh'])){
     $first_index = $new_strt16;
    $first = $arr16[$first_index];
     $end = end($arr16);
     end($arr16);
   $new_strt16=key($arr16);
   $U_17 = $end - $first;
   }
   else{
     $first_index = key($arr16);
    $first = $arr16[$first_index + 1];
    $end = end($arr16);
   end($arr16);
   $new_strt16=key($arr16);
   $U_17 = $end - $first;
   }
   } else {
   $U_17 = 0;
  }
   $orgname = $start_date;
   // $count = $U_1 * 1;
   $count1 = $U_2 * 1;
   $count2 = $U_3 * 1;
   $count3 = $U_4 * 1;
   $count4 = $U_5 * 1;
   $count5 = $U_6 * 1;
   $count6 = $U_7 * 1;
   $count7 = $U_8 * 1;
   $count8 = $U_9 * 1;
   $count9 = $U_10 * 1;
   $count10 = $U_11 * 1;
   $count11 = $U_12 * 1;
   $count12 = $U_13 * 1;
   $count13 = $U_14 * 1;
   $count14 = $U_15 * 1;
   $count15 = $U_16 * 1;
   $count16 = $U_17 * 1;
   
   // $array1[] = array(
   // 'meter' =>  $orgname,
   // 'value1' => (int)$count );
   $array1[] = array(
    'meter' =>  "Wtr Trt",
    'value2' => (int)$count1
   );
   $array1[] = array(
    'meter' =>  "T1",
    'value3' => (int)$count2
   );
   $array1[] = array(
    'meter' =>  "Syp Rm",
    'value4' => (int)$count3
   );
   $array1[] = array(
    'meter' =>  "AC(3+4+5)",
    'value5' => (int)$count4
   );
   $array1[] = array(
    'meter' =>  "AC(1+2)",
    'value6' => (int)$count5
   );
   $array1[] = array(
    'meter' =>  'G4',
    'value7' => (int)$count6
   );
   $array1[] = array(
    'meter' =>  'G3',
    'value8' => (int)$count7
   );
   $array1[] = array(
    'meter' =>  'G2',
    'value9' => (int)$count8
   );
   $array1[] = array(
    'meter' =>  'G1',
    'value10' => (int)$count9
   );
   $array1[] = array(
    'meter' =>  'Evaptrs',
    'value11' => (int)$count10
   );
   $array1[] = array(
    'meter' =>  'L5',
    'value12' => (int)$count11
   );
   $array1[] = array(
    'meter' =>  'L4',
    'value13' => (int)$count12
   );
   $array1[] = array(
    'meter' =>  'L3',
    'value14' => (int)$count13
   );
   $array1[] = array(
    'meter' =>  'L1',
    'value15' => (int)$count14
   );
   $array1[] = array(
    'meter' =>  'Boilr',
    'value16' => (int)$count15
   );
   $array1[] = array(
    'meter' =>  'T2',
    'value17' => (int)$count16
   );
 
   $data = json_encode($array1);
  //  $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
   
  // }
 }  elseif ($value == 'Last 30 Days') {
 
  $current_day = date("l");
  $current_date = date('Y-n-j', strtotime($current_date));
 $start_date = date('Y-n-j', strtotime($current_date . ' -30 day'));
 $array = array();
 $array['cols'][] = array('type' => 'string');
 // $array['cols'][] = array('type' => 'number', 'label' => 'Main LT');
 $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
 $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
 $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
 $array['cols'][] = array('type' => 'number', 'label' => 'Air Compressor(3+4+5)');
 $array['cols'][] = array('type' => 'number', 'label' => 'Air Compressor(1+2)');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 4');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 3');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 2');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 1');
 $array['cols'][] = array('type' => 'number', 'label' => 'Evaporators');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 5');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 4');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 3');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 1');
 $array['cols'][] = array('type' => 'number', 'label' => 'Boiler');
 $array['cols'][] = array('type' => 'number', 'label' => 'Turbine - 2');
 
 $dayTime = date('Y-n-j', strtotime($start_date ));
$Daytime = date('Y-n-j', strtotime($start_date));
$nightTime = date('Y-n-j', strtotime($start_date ));
   $Nighttime = date('Y-n-j', strtotime($start_date));
 for ($i = 0; $i <= 29; $i++) {
    
 
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($dayTime.'T5:7:18+05:00'));
  $val1=json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value1){$a1=$sub_value1;
  }}
  $dayTime1=intval($a1);
  $mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($Daytime.'T6:7:18+05:00'));
  $val2=json_decode(json_encode($mongotime2), true);
  foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
  }}
  $Daytime1=intval($a2);



  $mongotime3=new MongoDB\BSON\UTCDateTime(strtotime($nightTime.'T22:57:18+05:00'));
  $val3=json_decode(json_encode($mongotime3), true);
  foreach($val3 as $key=>$value){foreach($value as $sub_key=>$sub_value3){$a3=$sub_value3;
  }}
  $nightTime1=intval($a3);

  $mongotime4=new MongoDB\BSON\UTCDateTime(strtotime($Nighttime.'T23:57:18+05:00'));
  $val4=json_decode(json_encode($mongotime4), true);
  foreach($val4 as $key=>$value){foreach($value as $sub_key=>$sub_value4){$a4=$sub_value4;
  }}
  $Nighttime1=intval($a4);

  $select_fields = array(
    'U_1_ActiveEnergy_Delivered_kWh' => 1,
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1,
    'U_5_ActiveEnergy_Delivered_kWh' => 1,
    'U_6_ActiveEnergy_Delivered_kWh' => 1,
    'U_7_ActiveEnergy_Delivered_kWh' => 1,
    'U_8_ActiveEnergy_Delivered_kWh' => 1,
    'U_9_ActiveEnergy_Delivered_kWh' => 1,
    'U_10_ActiveEnergy_Delivered_kWh' => 1,
    'U_11_ActiveEnergy_Delivered_kWh' => 1,
    'U_12_ActiveEnergy_Delivered_kWh' => 1,
    'U_13_ActiveEnergy_Delivered_kWh' => 1,
    'U_14_ActiveEnergy_Delivered_kWh' => 1,
    'U_15_ActiveEnergy_Delivered_kWh' => 1,
    'U_16_ActiveEnergy_Delivered_kWh' => 1,
    'U_17_ActiveEnergy_Delivered_kWh' => 1,
     'timestamp'=>1
   );
   // times for morning 
   
   $where = array(
    'UNIXtimestamp' =>  array('$gt' => $dayTime1, '$lte' => $Daytime1)
   );
   // times for night 
   $where1 = array(
     'UNIXtimestamp' =>  array('$gt' =>  $nightTime1, '$lte' => $Nighttime1)
    );
   $options = array(
    'projection' => $select_fields
   );
 
   // this shows docs in the begining of the day
   $cursor = $collection->find($where, $options);   //This is the main line
   $docs = $cursor->toArray();
   $index = 0;
    // echo '------------DAY TIME-------------</br>';
   foreach ($docs as $document) {
    json_encode($document);
      //var_dump($document);
    foreach ($document as $key => $value) {
     $term[$index][$key] = $value;
     // if(!empty($document['U_1_ActiveEnergy_Delivered_kWh'])){
     //  $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
     // }
     if (!empty($document['timestamp'])) {
       $arrT[] = $document['timestamp'];
       
      }
     if (!empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
      $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
      
     }
     if (!empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
      $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
      $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
      $arr4[] = $document['U_5_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
      $arr5[] = $document['U_6_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
      $arr6[] = $document['U_7_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
      $arr7[] = $document['U_8_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
      $arr8[] = $document['U_9_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
      $arr9[] = $document['U_10_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
      $arr10[] = $document['U_11_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
      $arr11[] = $document['U_12_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
      $arr12[] = $document['U_13_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
      $arr13[] = $document['U_14_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
      $arr14[] = $document['U_15_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
      $arr15[] = $document['U_16_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
      $arr16[] = $document['U_17_ActiveEnergy_Delivered_kWh'];
     }
    }
    $index++;
   }
  
//    echo '------------------------NIGHT TIME--------------------------</br>';
   
  
   $cursor1 = $collection->find($where1, $options);   //This is the main line
   $docs1 = $cursor1->toArray();
   $index1 = 0;
    
   foreach ($docs1 as $document) {
    json_encode($document);
      //var_dump($document);
    foreach ($document as $key => $value) {
     $term[$index1][$key] = $value;
     // if(!empty($document['U_1_ActiveEnergy_Delivered_kWh'])){
     //  $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
     // }
     if (!empty($document['timestamp'])) {
       $ArrT[] = $document['timestamp'];
       
      }
     if (!empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
      $Arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
      
     }
     if (!empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
      $Arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
      $Arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
      $Arr4[] = $document['U_5_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
      $Arr5[] = $document['U_6_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
      $Arr6[] = $document['U_7_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
      $Arr7[] = $document['U_8_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
      $Arr8[] = $document['U_9_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
      $Arr9[] = $document['U_10_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
      $Arr10[] = $document['U_11_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
      $Arr11[] = $document['U_12_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
      $Arr12[] = $document['U_13_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
      $Arr13[] = $document['U_14_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
      $Arr14[] = $document['U_15_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
      $Arr15[] = $document['U_16_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
      $Arr16[] = $document['U_17_ActiveEnergy_Delivered_kWh'];
     }
    }
    $index1++;
   }
  

  
   //setting arrays for chart data
  //  if ($index > 0 && !empty($document['timestamp'])) {
  //     $first_index = key($arrT);
  //    $first = $arrT[$first_index + 1];
  //    $end = end($ArrT);
  //   end($arrT);
  //   $new_strt1=key($arrT);
  //   } else {
  //   $U_2 = 0;
  //  }
   if ($index > 0 && !empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr1);
    $first = $arr1[$first_index + 1];
    $end = end($Arr1);
   end($arr1);
   $new_strt1=key($arr1);
    $U_2 = $end - $first;
        } else {
    $U_2 = 0;
   }
   if ($index > 0 && !empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr2);
    $first = $arr2[$first_index + 1];
    $end = end($Arr2);
   end($arr2);
   $new_strt2=key($arr2);
    $U_3 = $end - $first;
        } else {
    $U_3 = 0;
   }
   if ($index > 0 && !empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr3);
    $first = $arr3[$first_index + 1];
    $end = end($Arr3);
   end($arr3);
   $new_strt3=key($arr3);
    $U_4 = $end - $first;
        } else {
    $U_4 = 0;
   }
   if ($index > 0 && !empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr4);
    $first = $arr4[$first_index + 1];
    $end = end($Arr4);
   end($arr4);
   $new_strt4=key($arr4);
    $U_5 = $end - $first;
        } else {
    $U_5 = 0;
   }
   if ($index > 0 && !empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr5);
    $first = $arr5[$first_index + 1];
    $end = end($Arr5);
   end($arr5);
   $new_strt5=key($arr5);
    $U_6 = $end - $first;
        } else {
    $U_6 = 0;
   }
   if ($index > 0 && !empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr6);
    $first = $arr6[$first_index + 1];
    $end = end($Arr6);
   end($arr6);
   $new_strt6=key($arr6);
    $U_7 = $end - $first;
        } else {
    $U_7 = 0;
   }
   if ($index > 0 && !empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr7);
    $first = $arr7[$first_index + 1];
    $end = end($Arr7);
   end($arr7);
   $new_strt7=key($arr7);
    $U_8 = $end - $first;
        } else {
    $U_8 = 0;
   }
   if ($index > 0 && !empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr8);
    $first = $arr8[$first_index + 1];
    $end = end($Arr8);
   end($arr8);
   $new_strt8=key($arr8);
    $U_9 = $end - $first;
        } else {
    $U_9 = 0;
   }
   if ($index > 0 && !empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr9);
    $first = $arr9[$first_index + 1];
    $end = end($Arr9);
   end($arr9);
   $new_strt9=key($arr9);
    $U_10 = $end - $first;
    
    } else {
    $U_10 = 0;
   }
   if ($index > 0 && !empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr10);
    $first = $arr10[$first_index + 1];
    $end = end($Arr10);
   end($arr10);
   $new_strt10=key($arr10);
    $U_11 = $end - $first;
    
    } else {
    $U_11 = 0;
   }
   if ($index > 0 && !empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr11);
    $first = $arr11[$first_index + 1];
    $end = end($Arr11);
   end($arr11);
   $new_strt11=key($arr11);
    $U_12 = $end - $first;
    
    } else {
    $U_12 = 0;
   }
   if ($index > 0 && !empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr12);
    $first = $arr12[$first_index + 1];
    $end = end($Arr12);
   end($arr12);
   $new_strt12=key($arr12);
    $U_13 = $end - $first;
    
    } else {
    $U_13 = 0;
   }
   if ($index > 0 && !empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr13);
    $first = $arr13[$first_index + 1];
    $end = end($Arr13);
   end($arr13);
   $new_strt13=key($arr13);
    $U_14 = $end - $first;
    
    } else {
    $U_14 = 0;
   }
   if ($index > 0 && !empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr14);
    $first = $arr14[$first_index + 1];
    $end = end($Arr14);
   end($arr14);
   $new_strt14=key($arr14);
    $U_15 = $end - $first;
    
    } else {
    $U_15 = 0;
   }
   if ($index > 0 && !empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr15);
    $first = $arr15[$first_index + 1];
    $end = end($Arr15);
   end($arr15);
   $new_strt15=key($arr15);
    $U_16 = $end - $first;
    
    } else {
    $U_16 = 0;
   }
   if ($index > 0 && !empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
    $first_index = key($arr16);
    $first = $arr16[$first_index + 1];
    $end = end($Arr16);
   end($arr16);
   $new_strt16=key($arr16);
    $U_17 = $end - $first;
    
    } else {
    $U_17 = 0;
   }
   
   $orgname = $dayTime;
//    $count = $U_1 * 1;
   $count1 = $U_2 * 1;
   $count2 = $U_3 * 1;
   $count3 = $U_4 * 1;
   $count4 = $U_5 * 1;
   $count5 = $U_6 * 1;
   $count6 = $U_7 * 1;
   $count7 = $U_8 * 1;
   $count8 = $U_9 * 1;
   $count9 = $U_10 * 1;
   $count10 = $U_11 * 1;
   $count11 = $U_12 * 1;
   $count12 = $U_13 * 1;
   $count13 = $U_14 * 1;
   $count14 = $U_15 * 1;
   $count15 = $U_16 * 1;
   $count16 = $U_17 * 1;
//    $array1[] = array(
//     'meter' =>  $orgname,
//     'value1' => (int)$count
//    );
   $array1[] = array(
    'meter' =>  $orgname,
    'value2' => (int)$count1
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value3' => (int)$count2
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value4' => (int)$count3
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value5' => (int)$count4
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value6' => (int)$count5
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value7' => (int)$count6
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value8' => (int)$count7
   );
   $array1[] = array(
     'meter' =>  $orgname,
     'value9' => (int)$count8
    );
    $array1[] = array(
     'meter' =>  $orgname,
     'value10' => (int)$count9
    );
    $array1[] = array(
     'meter' =>  $orgname,
     'value11' => (int)$count10
    );
    $array1[] = array(
     'meter' =>  $orgname,
     'value12' => (int)$count11
    );
    $array1[] = array(
     'meter' =>  $orgname,
     'value13' => (int)$count12
    );
    $array1[] = array(
     'meter' =>  $orgname,
     'value14' => (int)$count13
    );
    $array1[] = array(
     'meter' =>  $orgname,
     'value15' => (int)$count14
    );
    $array1[] = array(
     'meter' =>  $orgname,
     'value16' => (int)$count15
    );
    $array1[] = array(
     'meter' =>  $orgname,
     'value17' => (int)$count16
    );
   $data = json_encode($array1);

   
   // adds next day 
   $dayTime = date('Y-n-j', strtotime($dayTime . ' +1 day'));
    $Daytime= date('Y-n-j', strtotime($Daytime . ' +1 day'));
    $nightTime = date('Y-n-j', strtotime($nightTime . ' +1 day'));
    $Nighttime= date('Y-n-j', strtotime($Nighttime . ' +1 day'));
    

    // echo '-------NExT DAY---</br>';
 }
 //  var_dump($array1);
 
}  elseif ($value == 'Last Week') {
  $current_day = date("l");
  if ($current_day == 'Monday') {
   $start_date = date("Y-n-j");
   $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
  $start_date1=intval($a1);
  } elseif ($current_day == 'Tuesday') {
   $start_date = date('Y-n-j', strtotime($current_date . ' -1 day'));
   $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
  $start_date1=intval($a1);
  } elseif ($current_day == 'Wednesday') {
   $start_date = date('Y-n-j', strtotime($current_date . ' -2 day'));
   $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
  $start_date1=intval($a1);
  } elseif ($current_day == 'Thursday') {
   $start_date = date('Y-n-j', strtotime($current_date . ' -3 day'));
   $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
  $start_date1=intval($a1);
  } elseif ($current_day == 'Friday') {
   $start_date = date('Y-n-j', strtotime($current_date . ' -4 day'));
   $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
  $start_date1=intval($a1);
  } elseif ($current_day == 'Saturday') {
   $start_date = date('Y-n-j', strtotime($current_date . ' -5 day'));
   $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
  $start_date1=intval($a1);
  } elseif ($current_day == 'Sunday') {
   $start_date = date('Y-n-j', strtotime($current_date . ' -6 day'));
   $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
  $start_date1=intval($a1);
  }
  $start_date = date('Y-n-j', strtotime($start_date . ' -7 day'));
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
  
  $start_date1=intval($a1);
  $array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Main LT');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  $array['cols'][] = array('type' => 'number', 'label' => 'Air Compressor(3+4+5)');
  $array['cols'][] = array('type' => 'number', 'label' => 'Air Compressor(1+2)');
  $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 4');
  $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 3');
  $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 2');
  $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Evaporators');
  $array['cols'][] = array('type' => 'number', 'label' => 'Line - 5');
  $array['cols'][] = array('type' => 'number', 'label' => 'Line - 4');
  $array['cols'][] = array('type' => 'number', 'label' => 'Line - 3');
  $array['cols'][] = array('type' => 'number', 'label' => 'Line - 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Boiler');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine - 2');
  for ($i = 1; $i <= 7; $i++) {
   $day = date('D', strtotime($start_date));
   $new_end = date('Y-n-j', strtotime($start_date . ' +1 day'));
   $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'T5:7:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
  $new_end1=intval($a1);
   $select_fields = array(
    'U_1_ActiveEnergy_Delivered_kWh' => 1,
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1,
    'U_5_ActiveEnergy_Delivered_kWh' => 1,
    'U_6_ActiveEnergy_Delivered_kWh' => 1,
    'U_7_ActiveEnergy_Delivered_kWh' => 1,
    'U_8_ActiveEnergy_Delivered_kWh' => 1,
    'U_9_ActiveEnergy_Delivered_kWh' => 1,
    'U_10_ActiveEnergy_Delivered_kWh' => 1,
    'U_11_ActiveEnergy_Delivered_kWh' => 1,
    'U_12_ActiveEnergy_Delivered_kWh' => 1,
    'U_13_ActiveEnergy_Delivered_kWh' => 1,
    'U_14_ActiveEnergy_Delivered_kWh' => 1,
    'U_15_ActiveEnergy_Delivered_kWh' => 1,
    'U_16_ActiveEnergy_Delivered_kWh' => 1,
    'U_17_ActiveEnergy_Delivered_kWh' => 1,
    'timestamp'=>1
   );
   // echo $start_date.'start'.'</br>';
   // echo $start_date1.'unistart'.'</br>';
   // echo $new_end.'end'.'</br>';
   // echo $new_end1.'</br>';
   $where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date1, '$lte' => $new_end1)
   );
   $options = array(
    'projection' => $select_fields
   );
   $cursor = $collection->find($where, $options);   //This is the main line
   $docs = $cursor->toArray();
   $index = 0;
   foreach ($docs as $document) {
    json_encode($document);
    var_dump($document);
    echo'</br>';
    foreach ($document as $key => $value) {
     $term[$index][$key] = $value;
     if (!empty($document['timestamp'])) {
       $arrT[] = $document['timestamp'];
      }
     if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
      $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
      $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
      $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
      $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
      $arr4[] = $document['U_5_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
      $arr5[] = $document['U_6_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
      $arr6[] = $document['U_7_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
      $arr7[] = $document['U_8_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
      $arr8[] = $document['U_9_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
      $arr9[] = $document['U_10_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
      $arr10[] = $document['U_11_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
      $arr11[] = $document['U_12_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
      $arr12[] = $document['U_13_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
      $arr13[] = $document['U_14_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
      $arr14[] = $document['U_15_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
      $arr15[] = $document['U_16_ActiveEnergy_Delivered_kWh'];
     }
     if (!empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
      $arr16[] = $document['U_17_ActiveEnergy_Delivered_kWh'];
     }
    }
    $index++;
   }
   if ($index > 0 && !empty($document['timestamp'])) {
     
     
     if($index > 95 && !empty($document['timestamp'])){
      
       $first_index = $new_strt;
      $first = $arrT[$first_index];
     
     
       $end = end($arrT);
       end($arrT);
     $new_strt=key($arrT);
     $U_1 = $end - $first;
     
     }
     else{
       
       $first_index = key($arrT);
      $first = $arr[$first_index + 1];
      $end = end($arrT);
     end($arrT);
     $new_strt=key($arrT);
     $U_1 = $end - $first;
     
     
 
     }
     } else {
     $U_1 = 0;
    }
   if ($index > 0 && !empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
     
     
     if($index > 95 && !empty($document['U_1_ActiveEnergy_Delivered_kWh'])){
      
       $first_index = $new_strt;
      $first = $arr[$first_index];
     
     
       $end = end($arr);
       end($arr);
     $new_strt=key($arr);
     $U_1 = $end - $first;
     
     }
     else{
       
       $first_index = key($arr);
      $first = $arr[$first_index + 1];
      $end = end($arr);
     end($arr);
     $new_strt=key($arr);
     $U_1 = $end - $first;
     
     }
     } else {
     $U_1 = 0;
    }
   if ($index > 0 && !empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
   
     if($index > 95 && !empty($document['U_2_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt1;
      $first = $arr1[$first_index];
     
     
       $end = end($arr1);
       end($arr1);
     $new_strt1=key($arr1);
     $U_2 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr1);
      $first = $arr1[$first_index + 1];
      $end = end($arr1);
     end($arr1);
     $new_strt1=key($arr1);
     $U_2 = $end - $first;
     
     
   
     }
     } else {
     $U_2 = 0;
    }
    if ($index > 0 && !empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_3_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt2;
      $first = $arr2[$first_index];
     
     
       $end = end($arr2);
       end($arr2);
     $new_strt2=key($arr2);
     $U_3 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr2);
      $first = $arr2[$first_index + 1];
      $end = end($arr2);
     end($arr2);
     $new_strt2=key($arr2);
     $U_3 = $end - $first;
     
     
     
   
     }
     } else {
     $U_3 = 0;
    }
     
    if ($index > 0 && !empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_4_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt3;
      $first = $arr3[$first_index];
     
     
       $end = end($arr3);
       end($arr3);
     $new_strt3=key($arr3);
     $U_4 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr3);
      $first = $arr3[$first_index + 1];
      $end = end($arr3);
     end($arr3);
     $new_strt3=key($arr3);
     $U_4 = $end - $first;
     
     
     
   
     }
     } else {
     $U_4 = 0;
    }
    if ($index > 0 && !empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_5_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt4;
      $first = $arr4[$first_index];
     
     
       $end = end($arr4);
       end($arr4);
     $new_strt4=key($arr4);
     $U_5 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr4);
      $first = $arr4[$first_index + 1];
      $end = end($arr4);
     end($arr4);
     $new_strt4=key($arr4);
     $U_5 = $end - $first;
     
     
     
   
     }
     } else {
     $U_5 = 0;
    }
     
    if ($index > 0 && !empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_6_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt5;
      $first = $arr5[$first_index];
     
     
       $end = end($arr5);
       end($arr5);
     $new_strt5=key($arr5);
     $U_6 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr5);
      $first = $arr5[$first_index + 1];
      $end = end($arr5);
     end($arr5);
     $new_strt5=key($arr5);
     $U_6 = $end - $first;
     
     
     
   
     }
     } else {
     $U_6 = 0;
    }
    if ($index > 0 && !empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_7_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt6;
      $first = $arr6[$first_index];
     
     
       $end = end($arr6);
       end($arr6);
     $new_strt6=key($arr6);
     $U_7 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr6);
      $first = $arr6[$first_index + 1];
      $end = end($arr6);
     end($arr6);
     $new_strt6=key($arr6);
     $U_7 = $end - $first;
     
     
     
   
     }
     } else {
     $U_7 = 0;
    }
    if ($index > 0 && !empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_8_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt7;
      $first = $arr7[$first_index];
     
     
       $end = end($arr7);
       end($arr7);
     $new_strt7=key($arr7);
     $U_8 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr7);
      $first = $arr7[$first_index + 1];
      $end = end($arr7);
     end($arr7);
     $new_strt7=key($arr7);
     $U_8 = $end - $first;
     
     
     
   
     }
     } else {
     $U_8 = 0;
    }
    if ($index > 0 && !empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_9_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt8;
      $first = $arr8[$first_index];
     
     
       $end = end($arr8);
       end($arr8);
     $new_strt8=key($arr8);
     $U_9 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr8);
      $first = $arr8[$first_index + 1];
      $end = end($arr8);
     end($arr8);
     $new_strt8=key($arr8);
     $U_9 = $end - $first;
     
     
     
   
     }
     } else {
     $U_9 = 0;
    }
    if ($index > 0 && !empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_10_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt9;
      $first = $arr9[$first_index];
     
     
       $end = end($arr9);
       end($arr9);
     $new_strt9=key($arr9);
     $U_10 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr9);
      $first = $arr9[$first_index + 1];
      $end = end($arr9);
     end($arr9);
     $new_strt9=key($arr9);
     $U_10 = $end - $first;
     
     
     
   
     }
     } else {
     $U_10 = 0;
    }
    if ($index > 0 && !empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_11_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt10;
      $first = $arr10[$first_index];
     
     
       $end = end($arr10);
       end($arr10);
     $new_strt10=key($arr10);
     $U_11 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr10);
      $first = $arr10[$first_index + 1];
      $end = end($arr10);
     end($arr10);
     $new_strt10=key($arr10);
     $U_11 = $end - $first;
     
     
     
   
     }
     } else {
     $U_11 = 0;
    }
    if ($index > 0 && !empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_12_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt11;
      $first = $arr11[$first_index];
     
     
       $end = end($arr11);
       end($arr11);
     $new_strt11=key($arr11);
     $U_12 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr11);
      $first = $arr11[$first_index + 1];
      $end = end($arr11);
     end($arr11);
     $new_strt11=key($arr11);
     $U_12 = $end - $first;
     
     
     
   
     }
     } else {
     $U_12 = 0;
    }
    if ($index > 0 && !empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_13_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt12;
      $first = $arr12[$first_index];
     
     
       $end = end($arr12);
       end($arr12);
     $new_strt12=key($arr12);
     $U_13 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr12);
      $first = $arr12[$first_index + 1];
      $end = end($arr12);
     end($arr12);
     $new_strt12=key($arr12);
     $U_13 = $end - $first;
     
     
     
   
     }
     } else {
     $U_13 = 0;
    }
    if ($index > 0 && !empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_14_ActiveEnergy_Delivered_kWh'])){
       
       $first_index = $new_strt13;
      $first = $arr13[$first_index];
     
     
       $end = end($arr13);
       end($arr13);
     $new_strt13=key($arr13);
     $U_14 = $end - $first;
     
     
     
     }
     else{
       $first_index = key($arr13);
      $first = $arr13[$first_index + 1];
      $end = end($arr13);
     end($arr13);
     $new_strt13=key($arr13);
     $U_14 = $end - $first;
     
     
     
   
     }
     } else {
     $U_14 = 0;
    }
    if ($index > 0 && !empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_15_ActiveEnergy_Delivered_kWh'])){
       $first_index = $new_strt14;
      $first = $arr14[$first_index];
       $end = end($arr14);
       end($arr14);
     $new_strt14=key($arr14);
     $U_15 = $end - $first;
     }
     else{
       $first_index = key($arr14);
      $first = $arr14[$first_index + 1];
      $end = end($arr14);
     end($arr14);
     $new_strt14=key($arr14);
     $U_15 = $end - $first;
     }
     } else {
     $U_15 = 0;
    }
    if ($index > 0 && !empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_16_ActiveEnergy_Delivered_kWh'])){
       $first_index = $new_strt15;
      $first = $arr15[$first_index];
       $end = end($arr15);
       end($arr15);
     $new_strt15=key($arr15);
     $U_16 = $end - $first;
     }
     else{
       $first_index = key($arr15);
      $first = $arr15[$first_index + 1];
      $end = end($arr15);
     end($arr15);
     $new_strt15=key($arr15);
     $U_16 = $end - $first;
     }
     } else {
     $U_16 = 0;
    }
    if ($index > 0 && !empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
     
     if($index > 95 && !empty($document['U_17_ActiveEnergy_Delivered_kWh'])){
       $first_index = $new_strt16;
      $first = $arr16[$first_index];
       $end = end($arr16);
       end($arr16);
     $new_strt16=key($arr16);
     $U_17 = $end - $first;
     }
     else{
       $first_index = key($arr16);
      $first = $arr16[$first_index + 1];
      $end = end($arr16);
     end($arr16);
     $new_strt16=key($arr16);
     $U_17 = $end - $first;
     }
     } else {
     $U_17 = 0;
    }
   $orgname = $day;
   $count = $U_1 * 1;
   $count1 = $U_2 * 1;
   $count2 = $U_3 * 1;
   $count3 = $U_4 * 1;
   $count4 = $U_5 * 1;
   $count5 = $U_6 * 1;
   $count6 = $U_7 * 1;
   $count7 = $U_8 * 1;
   $count8 = $U_9 * 1;
   $count9 = $U_10 * 1;
   $count10 = $U_11 * 1;
   $count11 = $U_12 * 1;
   $count12 = $U_13 * 1;
   $count13 = $U_14 * 1;
   $count14 = $U_15 * 1;
   $count15 = $U_16 * 1;
   $count16 = $U_17 * 1;
 
   $array1[] = array(
    'meter' =>  $orgname,
    'value1' => (int)$count
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value2' => (int)$count1
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value3' => (int)$count2
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value4' => (int)$count3
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value5' => (int)$count4
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value6' => (int)$count5
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value7' => (int)$count6
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value8' => (int)$count7
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value9' => (int)$count8
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value10' => (int)$count9
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value11' => (int)$count10
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value12' => (int)$count11
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value13' => (int)$count12
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value14' => (int)$count13
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value15' => (int)$count14
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value16' => (int)$count15
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value17' => (int)$count16
   );
 
   $data = json_encode($array1);
   $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }
 } elseif ($value == 'This Year') {

 $start_date = date('Y') . '-1-'.'1';
 $end_date = $current_date;
//echo $start_date.'</br>';
  //echo $end_date.'</br>';



 function dateDiffInMonths($start_date, $end_date)
 {
  // Calculating the difference in timestamps
  $diff = strtotime($end_date) - strtotime($start_date);
  //1 month = 30 days
  // 30 day = 30*24 hours
  // 30*24 * 60 * 60 = 86400 seconds
  return abs(round($diff / 2592000));
 }

 $dateDiff = dateDiffInMonths($start_date, $end_date);

 $array = array();
 $array['cols'][] = array('type' => 'string');
 $array['cols'][] = array('type' => 'number', 'label' => 'Main LT');
 $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
 $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
 $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
 $array['cols'][] = array('type' => 'number', 'label' => 'Air Compressor(3+4+5)');
 $array['cols'][] = array('type' => 'number', 'label' => 'Air Compressor(1+2)');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 4');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 3');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 2');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 1');
 $array['cols'][] = array('type' => 'number', 'label' => 'Evaporators');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 5');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 4');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 3');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 1');
 $array['cols'][] = array('type' => 'number', 'label' => 'Boiler');
 $array['cols'][] = array('type' => 'number', 'label' => 'Turbine - 2');
 $m=1;

  for ($i = 0; $i <= $dateDiff; $i++) {

   
  $select_fields = array(
   'U_1_ActiveEnergy_Delivered_kWh' => 1,
   'U_2_ActiveEnergy_Delivered_kWh' => 1,
   'U_3_ActiveEnergy_Delivered_kWh' => 1,
   'U_4_ActiveEnergy_Delivered_kWh' => 1,
   'U_5_ActiveEnergy_Delivered_kWh' => 1,
   'U_6_ActiveEnergy_Delivered_kWh' => 1,
   'U_7_ActiveEnergy_Delivered_kWh' => 1,
   'U_8_ActiveEnergy_Delivered_kWh' => 1,
   'U_9_ActiveEnergy_Delivered_kWh' => 1,
   'U_10_ActiveEnergy_Delivered_kWh' => 1,
   'U_11_ActiveEnergy_Delivered_kWh' => 1,
   'U_12_ActiveEnergy_Delivered_kWh' => 1,
   'U_13_ActiveEnergy_Delivered_kWh' => 1,
   'U_14_ActiveEnergy_Delivered_kWh' => 1,
   'U_15_ActiveEnergy_Delivered_kWh' => 1,
   'U_16_ActiveEnergy_Delivered_kWh' => 1,
   'U_17_ActiveEnergy_Delivered_kWh' => 1,
   'timestamp'=>1
  );
 
  $where = array(
   'timestamp' =>  array('$regex' =>  '-'.$m.'-')
  );
  $options = array(
   'projection' => $select_fields
  );
  $cursor = $collection->find($where, $options);   //This is the main line
  $docs = $cursor->toArray();
  $index = 0;

  foreach ($docs as $document) {
   json_encode($document);
     //echo var_dump($document); 
   foreach ($document as $key => $value) {
    
    $term[$index][$key] = $value;
   // echo var_dump($value).'</br>';
   
    if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
     $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
     $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
     $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
     $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
     $arr4[] = $document['U_5_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
     $arr5[] = $document['U_6_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
     $arr6[] = $document['U_7_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
     $arr7[] = $document['U_8_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
     $arr8[] = $document['U_9_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
     $arr9[] = $document['U_10_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
     $arr10[] = $document['U_11_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
     $arr11[] = $document['U_12_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
     $arr12[] = $document['U_13_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
     $arr13[] = $document['U_14_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
     $arr14[] = $document['U_15_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
     $arr15[] = $document['U_16_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
     $arr16[] = $document['U_17_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['timestamp'])) {
      
      //echo var_dump($document['timestamp']).'</br>';
     
      $arrt[] = $document['timestamp'];
     
     }
   }
   $index++;
  }
  if ($index > 0 && !empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr);
   $first = $arr[$first_index + 1];
   $end = end($arr);
   $U_1 = $end - $first;
  } else {
   $U_1 = 0;
  }
  if ($index > 0 && !empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr1);
   $first = $arr1[$first_index + 1];
   $end = end($arr1);

   $U_2 = $end - $first;
  } else {
   $U_2 = 0;
  }
  if ($index > 0 && !empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr2);
   $first = $arr2[$first_index + 1];
   $end = end($arr2);
   $U_3 = $end - $first;
  } else {
   $U_3 = 0;
  }
  if ($index > 0 && !empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr3);
   $first = $arr3[$first_index + 1];
   $end = end($arr3);
   $U_4 = $end - $first;
  } else {
   $U_4 = 0;
  }
  if ($index > 0 && !empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr4);
   $first = $arr4[$first_index + 1];
   $end = end($arr4);

   $U_5 = $end - $first;
  } else {
   $U_5 = 0;
  }
  if ($index > 0 && !empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr5);
   $first = $arr5[$first_index + 1];
   $end = end($arr5);
   $U_6 = $end - $first;
  } else {
   $U_6 = 0;
  }
  if ($index > 0 && !empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr6);
   $first = $arr6[$first_index + 1];
   $end = end($arr6);
   $U_7 = $end - $first;
  } else {
   $U_7 = 0;
  }
  if ($index > 0 && !empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr7);
   $first = $arr7[$first_index + 1];
   $end = end($arr7);
   $U_8 = $end - $first;
  } else {
   $U_8 = 0;
  }
  if ($index > 0 && !empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr8);
   $first = $arr8[$first_index + 1];
   $end = end($arr8);
   $U_9 = $end - $first;
  } else {
   $U_9 = 0;
  }
  if ($index > 0 && !empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr9);
   $first = $arr9[$first_index + 1];
   $end = end($arr9);
   $U_10 = $end - $first;
  } else {
   $U_10 = 0;
  }
  if ($index > 0 && !empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr10);
   $first = $arr10[$first_index + 1];
   $end = end($arr10);
   $U_11 = $end - $first;
  } else {
   $U_11 = 0;
  }
  if ($index > 0 && !empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr11);
   $first = $arr11[$first_index + 1];
   $end = end($arr11);
   $U_12 = $end - $first;
  } else {
   $U_12 = 0;
  }
  if ($index > 0 && !empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr12);
   $first = $arr12[$first_index + 1];
   $end = end($arr12);
   $U_13 = $end - $first;
  } else {
   $U_13 = 0;
  }
  if ($index > 0 && !empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr13);
   $first = $arr13[$first_index + 1];
   $end = end($arr13);
   $U_14 = $end - $first;
  } else {
   $U_14 = 0;
  }
  if ($index > 0 && !empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr14);
   $first = $arr14[$first_index + 1];
   $end = end($arr14);
   $U_15 = $end - $first;
  } else {
   $U_15 = 0;
  }
  if ($index > 0 && !empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr15);
   $first = $arr15[$first_index + 1];
   $end = end($arr15);
   $U_16 = $end - $first;
  } else {
   $U_16 = 0;
  }
  if ($index > 0 && !empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr16);
   $first = $arr16[$first_index + 1];
   $end = end($arr16);
   $U_17 = $end - $first;
  
  } else {
   $U_17 = 0;
  }
  if ($index > 0 && !empty($document['timestamp'])) {
    $month=$document['timestamp'];
    $month =substr($month,5,-18);
    
    
    
   } else {
    $timestamp = 0;
   }
  
   if ($month == 1) {
    $orgname = 'Jan';
   } 
   elseif ($month == 2) {
    $orgname = 'Feb';
   } 
   elseif ($month == 3) {
    $orgname = 'Mar';
   } 
   elseif ($month == 4) {
    $orgname = 'Apr';
   } 
   elseif ($month == 5) {
    $orgname = 'May';
   } 
   elseif ($month == 6) {
    $orgname = 'Jun';
   } 
   elseif ($month == 7) {
    $orgname = 'Jul';
   } 
   elseif ($month == 8) {
    $orgname = 'Aug';
   } 
   elseif ($month == 9) {
    $orgname = 'Sep';
   } 
   elseif ($month == 10) {
    $orgname = 'Oct';
   } 
   elseif ($month == 11) {
    $orgname = 'Nov';
   } 
   elseif ($month == 12) {
    $orgname = 'Dec';
   } 
   
 
   

 
   

  //$orgname = date("M", strtotime($start_date));
  //echo gettype($orgname);
  $count = $U_1 * 1;
  $count1 = $U_2 * 1;
  $count2 = $U_3 * 1;
  $count3 = $U_4 * 1;
  $count4 = $U_5 * 1;
  $count5 = $U_6 * 1;
  $count6 = $U_7 * 1;
  $count7 = $U_8 * 1;
  $count8 = $U_9 * 1;
  $count9 = $U_10 * 1;
  $count10 = $U_11 * 1;
  $count11 = $U_12 * 1;
  $count12 = $U_13 * 1;
  $count13 = $U_14 * 1;
  $count14 = $U_15 * 1;
  $count15 = $U_16 * 1;
  $count16 = $U_17 * 1;
  $array1[] = array(
   'meter' =>  $orgname,
   'value1' => (int)$count
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value2' => (int)$count1
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value3' => (int)$count2
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value4' => (int)$count3
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value5' => (int)$count4
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value6' => (int)$count5
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value7' => (int)$count6
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value8' => (int)$count7
  );
  $array1[] = array(
    'meter' =>  $orgname,
    'value9' => (int)$count8
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value10' => (int)$count9
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value11' => (int)$count10
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value12' => (int)$count11
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value13' => (int)$count12
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value14' => (int)$count13
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value15' => (int)$count14
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value16' => (int)$count15
   );
   $array1[] = array(
    'meter' =>  $orgname,
    'value17' => (int)$count16
   );
  $data = json_encode($array1);
   $start_date = date('Y-n-j', strtotime($start_date . ' +1 Month'));
   $m=$m+1;
  }
} elseif ($value == 'This Week') {

 $current_day = date("l");
 if ($current_day == 'Monday') {
  $start_date = date("Y-n-j");
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);

$val1 = json_decode(json_encode($mongotime1), true);

foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
// print_r($start_date);
//echo $start_date.'</br>';
 } 
 elseif ($current_day == 'Tuesday') {
  $start_date = date('Y-n-j', strtotime($current_date . ' -1 day'));
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);

$val1 = json_decode(json_encode($mongotime1), true);

foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
// print_r($start_date);
  //echo $start_date.'</br>';
 } 
 elseif ($current_day == 'Wednesday') {
  $start_date = date('Y-n-j', strtotime($current_date . ' -2 day'));
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);

$val1 = json_decode(json_encode($mongotime1), true);

foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
// print_r($start_date);
  //echo $start_date.'</br>';
 } 
 elseif ($current_day == 'Thursday') {
  $start_date = date('Y-n-j', strtotime($current_date . ' -3 day'));
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);

$val1 = json_decode(json_encode($mongotime1), true);

foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
// print_r($start_date);
  //echo $start_date.'</br>';
 } 
 elseif ($current_day == 'Friday') {
  $start_date = date('Y-n-j', strtotime($current_date . ' -4 day'));
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);

$val1 = json_decode(json_encode($mongotime1), true);

foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
// print_r($start_date);
  //echo $start_date.'</br>';
 } 
 elseif ($current_day == 'Saturday') {
  $start_date = date('Y-n-j', strtotime($current_date . ' -5 day'));
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);

$val1 = json_decode(json_encode($mongotime1), true);

foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
// print_r($start_date);
  //echo $start_date.'</br>';
 } 
 elseif ($current_day == 'Sunday') {
  $start_date = date('Y-n-j', strtotime($current_date . ' -6 day'));
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);

$val1 = json_decode(json_encode($mongotime1), true);

foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
// print_r($start_date);
  //echo $start_date.'</br>';
 }
 $current_date = date('Y-n-j', strtotime($current_date . ' +1 day'));
 $array = array();
 $array['cols'][] = array('type' => 'string');
 $array['cols'][] = array('type' => 'number', 'label' => 'Main LT');
 $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
 $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
 $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
 $array['cols'][] = array('type' => 'number', 'label' => 'Air Compressor(3+4+5)');
 $array['cols'][] = array('type' => 'number', 'label' => 'Air Compressor(1+2)');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 4');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 3');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 2');
 $array['cols'][] = array('type' => 'number', 'label' => 'Grasso 1');
 $array['cols'][] = array('type' => 'number', 'label' => 'Evaporators');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 5');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 4');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 3');
 $array['cols'][] = array('type' => 'number', 'label' => 'Line - 1');
 $array['cols'][] = array('type' => 'number', 'label' => 'Boiler');
 $array['cols'][] = array('type' => 'number', 'label' => 'Turbine - 2');
 //echo $start_date.'</br>';
 //echo $current_date.'</br>';
 function dateDiffInDays($date1, $date2)
 {
  // Calculating the difference in timestamps
  $diff = strtotime($date2) - strtotime($date1);

  // 1 day = 24 hours
  // 24 * 60 * 60 = 86400 seconds
  return abs(round($diff / 86400));
 }
 $dateDiff = dateDiffInDays($start_date, $current_date).'</br>';
 
 for ($i = 0; $i < $dateDiff; $i++) {

  $day = date('D', strtotime($start_date));
 


  $new_end = date('Y-n-j', strtotime($start_date . ' +1 day'));
  $mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'+1 day'));
  $val2=json_decode(json_encode($mongotime2), true);
  foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
  }}
  $new_end=intval($a2);


  //echo $new_end.'</br>';


  $select_fields = array(
   'U_1_ActiveEnergy_Delivered_kWh' => 1,
   'U_2_ActiveEnergy_Delivered_kWh' => 1,
   'U_3_ActiveEnergy_Delivered_kWh' => 1,
   'U_4_ActiveEnergy_Delivered_kWh' => 1,
   'U_5_ActiveEnergy_Delivered_kWh' => 1,
   'U_6_ActiveEnergy_Delivered_kWh' => 1,
   'U_7_ActiveEnergy_Delivered_kWh' => 1,
   'U_8_ActiveEnergy_Delivered_kWh' => 1,
   'U_9_ActiveEnergy_Delivered_kWh' => 1,
   'U_10_ActiveEnergy_Delivered_kWh' => 1,
   'U_11_ActiveEnergy_Delivered_kWh' => 1,
   'U_12_ActiveEnergy_Delivered_kWh' => 1,
   'U_13_ActiveEnergy_Delivered_kWh' => 1,
   'U_14_ActiveEnergy_Delivered_kWh' => 1,
   'U_15_ActiveEnergy_Delivered_kWh' => 1,
   'U_16_ActiveEnergy_Delivered_kWh' => 1,
   'U_17_ActiveEnergy_Delivered_kWh' => 1,
   'timestamp'=>1
  );

  $where = array(
   'UNIXtimestamp' =>  array('$gt' =>$start_date1, '$lte' => $new_end)
  );
  $options = array(
   'projection' => $select_fields
  );
  $cursor = $collection->find($where, $options);   //This is the main line
  $docs = $cursor->toArray();
  $index = 0;
  foreach ($docs as $document) {
   json_encode($document);
   //echo var_dump($document).'</br>';
   foreach ($document as $key => $value) {
    $term[$index][$key] = $value;
    if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
     $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
     $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
     $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
     $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
     $arr4[] = $document['U_5_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
     $arr5[] = $document['U_6_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
     $arr6[] = $document['U_7_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
     $arr7[] = $document['U_8_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
     $arr8[] = $document['U_9_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
     $arr9[] = $document['U_10_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
     $arr10[] = $document['U_11_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
     $arr11[] = $document['U_12_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
     $arr12[] = $document['U_13_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
     $arr13[] = $document['U_14_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
     $arr14[] = $document['U_15_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
     $arr15[] = $document['U_16_ActiveEnergy_Delivered_kWh'];
    }
    if (!empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
     $arr16[] = $document['U_17_ActiveEnergy_Delivered_kWh'];
    }
   }
   $index++;
  }
  if ($index > 0 && !empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr);
   $first = $arr[$first_index + 1];
   $end = end($arr);
   $U_1 = $end - $first;
  } else {
   $U_1 = 0;
  }
  if ($index > 0 && !empty($document['U_2_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr1);
   $first = $arr1[$first_index + 1];
   $end = end($arr1);

   $U_2 = $end - $first;
  } else {
   $U_2 = 0;
  }
  if ($index > 0 && !empty($document['U_3_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr2);
   $first = $arr2[$first_index + 1];
   $end = end($arr2);
   $U_3 = $end - $first;
  } else {
   $U_3 = 0;
  }
  if ($index > 0 && !empty($document['U_4_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr3);
   $first = $arr3[$first_index + 1];
   $end = end($arr3);
   $U_4 = $end - $first;
  } else {
   $U_4 = 0;
  }
  if ($index > 0 && !empty($document['U_5_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr4);
   $first = $arr4[$first_index + 1];
   $end = end($arr4);

   $U_5 = $end - $first;
  } else {
   $U_5 = 0;
  }
  if ($index > 0 && !empty($document['U_6_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr5);
   $first = $arr5[$first_index + 1];
   $end = end($arr5);
   $U_6 = $end - $first;
  } else {
   $U_6 = 0;
  }
  if ($index > 0 && !empty($document['U_7_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr6);
   $first = $arr6[$first_index + 1];
   $end = end($arr6);
   $U_7 = $end - $first;
  } else {
   $U_7 = 0;
  }
  if ($index > 0 && !empty($document['U_8_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr7);
   $first = $arr7[$first_index + 1];
   $end = end($arr7);
   $U_8 = $end - $first;
  } else {
   $U_8 = 0;
  }
  if ($index > 0 && !empty($document['U_9_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr8);
   $first = $arr8[$first_index + 1];
   $end = end($arr8);
   $U_9 = $end - $first;
  } else {
   $U_9 = 0;
  }
  if ($index > 0 && !empty($document['U_10_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr9);
   $first = $arr9[$first_index + 1];
   $end = end($arr9);
   $U_10 = $end - $first;
  } else {
   $U_10 = 0;
  }
  if ($index > 0 && !empty($document['U_11_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr10);
   $first = $arr10[$first_index + 1];
   $end = end($arr10);
   $U_11 = $end - $first;
  } else {
   $U_11 = 0;
  }
  if ($index > 0 && !empty($document['U_12_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr11);
   $first = $arr11[$first_index + 1];
   $end = end($arr11);
   $U_12 = $end - $first;
  } else {
   $U_12 = 0;
  }
  if ($index > 0 && !empty($document['U_13_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr12);
   $first = $arr12[$first_index + 1];
   $end = end($arr12);
   $U_13 = $end - $first;
  } else {
   $U_13 = 0;
  }
  if ($index > 0 && !empty($document['U_14_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr13);
   $first = $arr13[$first_index + 1];
   $end = end($arr13);
   $U_14 = $end - $first;
  } else {
   $U_14 = 0;
  }
  if ($index > 0 && !empty($document['U_15_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr14);
   $first = $arr14[$first_index + 1];
   $end = end($arr14);
   $U_15 = $end - $first;
  } else {
   $U_15 = 0;
  }
  if ($index > 0 && !empty($document['U_16_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr15);
   $first = $arr15[$first_index + 1];
   $end = end($arr15);
   $U_16 = $end - $first;
  } else {
   $U_16 = 0;
  }
  if ($index > 0 && !empty($document['U_17_ActiveEnergy_Delivered_kWh'])) {
   $first_index = key($arr16);
   $first = $arr16[$first_index + 1];
   $end = end($arr16);
   $U_17 = $end - $first;
  } else {
   $U_17 = 0;
  }
  $orgname = $day;
  $count = $U_1 * 1;
  $count1 = $U_2 * 1;
  $count2 = $U_3 * 1;
  $count3 = $U_4 * 1;
  $count4 = $U_5 * 1;
  $count5 = $U_6 * 1;
  $count6 = $U_7 * 1;
  $count7 = $U_8 * 1;
  $count8 = $U_9 * 1;
  $count9 = $U_10 * 1;
  $count10 = $U_11 * 1;
  $count11 = $U_12 * 1;
  $count12 = $U_13 * 1;
  $count13 = $U_14 * 1;
  $count14 = $U_15 * 1;
  $count15 = $U_16 * 1;
  $count16 = $U_17 * 1;
  $array1[] = array(
   'meter' =>  $orgname,
   'value1' => (int)$count
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value2' => (int)$count1
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value3' => (int)$count2
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value4' => (int)$count3
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value5' => (int)$count4
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value6' => (int)$count5
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value7' => (int)$count6
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value8' => (int)$count7
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value9' => (int)$count8
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value10' => (int)$count9
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value11' => (int)$count10
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value12' => (int)$count11
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value13' => (int)$count12
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value14' => (int)$count13
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value15' => (int)$count14
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value16' => (int)$count15
  );
  $array1[] = array(
   'meter' =>  $orgname,
   'value17' => (int)$count16
  );

  $data = json_encode($array1);
  $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
 }
}
echo $data;
