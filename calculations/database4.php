<?php
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
 $start_date = date('Y-n-j', strtotime($current_date . ' -7 day'));
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
 for ($i = 0; $i <= 6; $i++) {
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
} elseif ($value == 'Last 30 Days') {
 $start_date = date('Y-n-j', strtotime($current_date . ' -30 day'));
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
 for ($i = 1; $i <= 30; $i++) {
  $day = date('D', strtotime($start_date));
  $new_end = date('Y-n-j', strtotime($start_date . ' +1 day'));
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
   'U_17_ActiveEnergy_Delivered_kWh' => 1
  );
  $where = array(
   'timestamp' =>  array('$gt' => $start_date, '$lte' => $new_end)
  );
  $options = array(
   'projection' => $select_fields
  );
  $cursor = $collection->find($where, $options);   //This is the main line
  $docs = $cursor->toArray();
  $index = 0;
  foreach ($docs as $document) {
   json_encode($document);
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
  $start = date('d', strtotime($start_date));
  $orgname = $start;
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
} elseif ($value == 'Last Week') {
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
   'U_17_ActiveEnergy_Delivered_kWh' => 1
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
