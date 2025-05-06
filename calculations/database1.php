<?php
$value = $_GET['value'];
session_start();
error_reporting(E_ERROR | E_PARSE);
include('mongodb_conn.php');
$collection = $db->naubahar_activetags;
$current_date = date("Y-n-j");
if ($value == 'Last 7 Days') {
  $start_date = date('Y-n-j', strtotime($current_date .' -7 day'));
$end_date = date('Y-n-j', strtotime($current_date.' -1 day'));
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);
$mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($end_date.'T23:7:18+05:00'));
$val1 = json_decode(json_encode($mongotime1), true);
$val2=json_decode(json_encode($mongotime2), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date=intval($a1);
// print_r($start_date);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date=intval($a2);
  //echo $new_end.'</br>';
  $array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  $where = array(
   'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
  );
  $select_fields = array(
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
      $term[$index][$key]=$value;
        if(!empty($document['U_2_ActiveEnergy_Delivered_kWh'])){
         $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
        }
        if(!empty($document['U_3_ActiveEnergy_Delivered_kWh'])){
         $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
        } 
        if(!empty($document['U_4_ActiveEnergy_Delivered_kWh'])){
         $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
        } 
    }
    $index++;
  }
 // print_r($arr6);
if (!empty($arr1)) {
$first_index = key($arr1);
$first = $arr1[$first_index+1];
$end = end($arr1);
$U_2=$end-$first;
}
else{
$U_2=0; 
}
if (!empty($arr2)) {
$first_index = key($arr2);
$first = $arr2[$first_index+1];
$end = end($arr2);
$U_3=$end-$first;
}
else{
$U_3=0; 
}
if (!empty($arr3)) {
$first_index = key($arr3);
$first = $arr3[$first_index+1];
$end = end($arr3);
$U_4=$end-$first;
}
else{
$U_4=0; 
}
  $count1 = $U_2;
  $count2 = $U_3;
  $count3 = $U_4;
  if ($count1 < 0) {
    $count1 = 0;
  } else {
    $count1 = $count1;
  }
  if ($count2 < 0) {
    $count2 = 0;
  } else {
    $count2 = $count2;
  }
  if ($count3 < 0) {
    $count3 = 0;
  } else {
    $count3 = $count3;
  }
     $array1[] = array(
    'meter' => 'Water Treatment',
    'value' => (int)$count1 );
     $array1[] = array(
    'meter' => 'Turbine 1',
    'value' => (int)$count2 );
     $array1[] = array(
    'meter' => 'Syrup Room',
    'value' => (int)$count3 );
  $data = json_encode($array1);
  echo $data;
  }
if($value=='Today') {
$start_date = date('Y-n-j', strtotime($current_date));
$end_date = date('Y-n-j', strtotime($current_date));
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);
$mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($end_date.'+1 day'));
$val1 = json_decode(json_encode($mongotime1), true);
$val2=json_decode(json_encode($mongotime2), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date=intval($a1);
// print_r($start_date);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date=intval($a2);
$array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  // echo $end_date . '</br>';
  $where = array(
   'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
  );
  $select_fields = array(
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1,
  );
  $options = array(
    'projection' => $select_fields
  );
  $cursor = $collection->find($where, $options);   //This is the main line
  $docs = $cursor->toArray();
  $index = 0;
  foreach ($docs as $document) {
    json_encode($document);
    // var_dump($document);
    foreach ($document as $key => $value) {
      $term[$index][$key]=$value;
        if(!empty($document['U_2_ActiveEnergy_Delivered_kWh'])){
         $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
        }
        if(!empty($document['U_3_ActiveEnergy_Delivered_kWh'])){
         $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
        } 
        if(!empty($document['U_4_ActiveEnergy_Delivered_kWh'])){
         $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
        } 
    }
    $index++;
  }
 // print_r($arr6);
if (!empty($arr1)) {
$first_index = key($arr1);
$first = $arr1[$first_index+1];
$end = end($arr1);
$U_2=$end-$first;
}
else{
$U_2=0; 
}
if (!empty($arr2)) {
$first_index = key($arr2);
$first = $arr2[$first_index+1];
$end = end($arr2);
$U_3=$end-$first;
}
else{
$U_3=0; 
}
if (!empty($arr3)) {
$first_index = key($arr3);
$first = $arr3[$first_index+1];
$end = end($arr3);
$U_4=$end-$first;
}
else{
$U_4=0; 
}
  $count1 = $U_2;
  $count2 = $U_3;
  $count3 = $U_4;
  if ($count1 < 0) {
    $count1 = 0;
  } else {
    $count1 = $count1;
  }
  if ($count2 < 0) {
    $count2 = 0;
  } else {
    $count2 = $count2;
  }
  if ($count3 < 0) {
    $count3 = 0;
  } else {
    $count3 = $count3;
  }
     $array1[] = array(
    'meter' => 'Water Treatment',
    'value' => (int)$count1 );
     $array1[] = array(
    'meter' => 'Turbine 1',
    'value' => (int)$count2 );
     $array1[] = array(
    'meter' => 'Syrup Room',
    'value' => (int)$count3 );
  $data = json_encode($array1);
  echo $data;
  }
  elseif ($value == 'This Week') {
  $current_day = date("l");
// print_r($current_day);
if($current_day=='Monday') {
$start_date = date("Y-n-j");
}
elseif ($current_day=='Tuesday') {
$start_date = date('Y-n-j', strtotime($current_date .' -1 day'));
}
elseif ($current_day=='Wednesday') {
$start_date = date('Y-n-j', strtotime($current_date .' -2 day'));
}
elseif ($current_day=='Thursday') {
$start_date = date('Y-n-j', strtotime($current_date .' -3 day'));
}
elseif ($current_day=='Friday') {
$start_date = date('Y-n-j', strtotime($current_date .' -4 day'));
}
elseif ($current_day=='Saturday') {
$start_date = date('Y-n-j', strtotime($current_date .' -5 day'));
}
elseif ($current_day=='Sunday') {
$start_date = date('Y-n-j', strtotime($current_date .' -6 day'));
}
$end_date = date('Y-n-j', strtotime($current_date .' +2 day'));

$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);
$mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($end_date.'+1 day'));
$val1 = json_decode(json_encode($mongotime1), true);
$val2=json_decode(json_encode($mongotime2), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date=intval($a1);
// print_r($start_date);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date=intval($a2);
$array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  $where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
);
  $select_fields = array(
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
      $term[$index][$key]=$value;
        if(!empty($document['U_2_ActiveEnergy_Delivered_kWh'])){
         $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
        }
        if(!empty($document['U_3_ActiveEnergy_Delivered_kWh'])){
         $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
        } 
        if(!empty($document['U_4_ActiveEnergy_Delivered_kWh'])){
         $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
        } 
    }
    $index++;
  }
 // print_r($arr6);
if (!empty($arr1)) {
$first_index = key($arr1);
$first = $arr1[$first_index+1];
$end = end($arr1);
$U_2=$end-$first;
}
else{
$U_2=0; 
}
if (!empty($arr2)) {
$first_index = key($arr2);
$first = $arr2[$first_index+1];
$end = end($arr2);
$U_3=$end-$first;
}
else{
$U_3=0; 
}
if (!empty($arr3)) {
$first_index = key($arr3);
$first = $arr3[$first_index+1];
$end = end($arr3);
$U_4=$end-$first;
}
else{
$U_4=0; 
}
  $count1 = $U_2;
  $count2 = $U_3;
  $count3 = $U_4;
  if ($count1 < 0) {
    $count1 = 0;
  } else {
    $count1 = $count1;
  }
  if ($count2 < 0) {
    $count2 = 0;
  } else {
    $count2 = $count2;
  }
  if ($count3 < 0) {
    $count3 = 0;
  } else {
    $count3 = $count3;
  }
     $array1[] = array(
    'meter' => 'Water Treatment',
    'value' => (int)$count1 );
     $array1[] = array(
    'meter' => 'Turbine 1',
    'value' => (int)$count2 );
     $array1[] = array(
    'meter' => 'Syrup Room',
    'value' => (int)$count3 );
  $data = json_encode($array1);
  echo $data;
  }
  elseif ($value == 'This Month') {
$start_date = date('Y', strtotime($current_date)).'-'.date('n', strtotime($current_date)).'-01';
//echo $start_date;
$end_date = date('Y-n-j', strtotime($current_date));
//echo $end_date;
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);
$mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($end_date.'+1 day'));
// print_r($mongotime2);
$val1 = json_decode(json_encode($mongotime1), true);
$val2=json_decode(json_encode($mongotime2), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date=intval($a1);
 //print_r($start_date);

foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date=intval($a2);
$array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  $where = array(
    'UNIXtimestamp' =>  array('$gt' =>$start_date, '$lte' => $end_date)
  );
  $select_fields = array(
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
      $term[$index][$key]=$value;
        if(!empty($document['U_2_ActiveEnergy_Delivered_kWh'])){
         $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
        }
        if(!empty($document['U_3_ActiveEnergy_Delivered_kWh'])){
         $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
        } 
        if(!empty($document['U_4_ActiveEnergy_Delivered_kWh'])){
         $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
        } 
    }
    $index++;
  }
 // print_r($arr6);
if (!empty($arr1)) {
$first_index = key($arr1);
$first = $arr1[$first_index+1];
$end = end($arr1);
$U_2=$end-$first;
}
else{
$U_2=0; 
}
if (!empty($arr2)) {
$first_index = key($arr2);
$first = $arr2[$first_index+1];
$end = end($arr2);
$U_3=$end-$first;
}
else{
$U_3=0; 
}
if (!empty($arr3)) {
$first_index = key($arr3);
$first = $arr3[$first_index+1];
$end = end($arr3);
$U_4=$end-$first;
}
else{
$U_4=0; 
}
  $count1 = $U_2;
  $count2 = $U_3;
  $count3 = $U_4;
  if ($count1 < 0) {
    $count1 = 0;
  } else {
    $count1 = $count1;
  }
  if ($count2 < 0) {
    $count2 = 0;
  } else {
    $count2 = $count2;
  }
  if ($count3 < 0) {
    $count3 = 0;
  } else {
    $count3 = $count3;
  }
     $array1[] = array(
    'meter' => 'Water Treatment',
    'value' => (int)$count1 );
     $array1[] = array(
    'meter' => 'Turbine 1',
    'value' => (int)$count2 );
     $array1[] = array(
    'meter' => 'Syrup Room',
    'value' => (int)$count3 );
  $data = json_encode($array1);
  echo $data;
  }
  elseif ($value=='This Year') {
  $start_date = date('Y', strtotime($current_date)).'-01-01';

//echo $start_date;
$end_date = date('Y-n-j', strtotime($current_date));
//echo $end_date;
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);
$mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($end_date.'+1 day'));
// print_r($mongotime2);
$val1 = json_decode(json_encode($mongotime1), true);
$val2=json_decode(json_encode($mongotime2), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date=intval($a1);
 //print_r($start_date);
    //echo '<br>';
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date=intval($a2);
  $array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  $where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
);
  $select_fields = array(
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
      $term[$index][$key]=$value;
        if(!empty($document['U_2_ActiveEnergy_Delivered_kWh'])){
         $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
        }
        if(!empty($document['U_3_ActiveEnergy_Delivered_kWh'])){
         $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
        } 
        if(!empty($document['U_4_ActiveEnergy_Delivered_kWh'])){
         $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
        } 
    }
    $index++;
  }
 // print_r($arr6);
if (!empty($arr1)) {
$first_index = key($arr1);
$first = $arr1[$first_index+1];
$end = end($arr1);
$U_2=$end-$first;
}
else{
$U_2=0; 
}
if (!empty($arr2)) {
$first_index = key($arr2);
$first = $arr2[$first_index+1];
$end = end($arr2);
$U_3=$end-$first;
}
else{
$U_3=0; 
}
if (!empty($arr3)) {
$first_index = key($arr3);
$first = $arr3[$first_index+1];
$end = end($arr3);
$U_4=$end-$first;
}
else{
$U_4=0; 
}
  $count1 = $U_2;
  $count2 = $U_3;
  $count3 = $U_4;
  if ($count1 < 0) {
    $count1 = 0;
  } else {
    $count1 = $count1;
  }
  if ($count2 < 0) {
    $count2 = 0;
  } else {
    $count2 = $count2;
  }
  if ($count3 < 0) {
    $count3 = 0;
  } else {
    $count3 = $count3;
  }
     $array1[] = array(
    'meter' => 'Water Treatment',
    'value' => (int)$count1 );
     $array1[] = array(
    'meter' => 'Turbine 1',
    'value' => (int)$count2 );
     $array1[] = array(
    'meter' => 'Syrup Room',
    'value' => (int)$count3 );
  $data = json_encode($array1);
  echo $data;
  }
  elseif($value == 'Last 30 Days') {
  $start_date = date('Y-n-j', strtotime($current_date .' -30 day'));
$end_date = date('Y-n-j', strtotime($current_date));
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);
$mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($end_date.'T23:7:18+05:00'));
$val1 = json_decode(json_encode($mongotime1), true);
$val2=json_decode(json_encode($mongotime2), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date=intval($a1);
// print_r($start_date);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date=intval($a2);
  $array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  $where = array(
   'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
  );
  $select_fields = array(
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
      $term[$index][$key]=$value;
        if(!empty($document['U_2_ActiveEnergy_Delivered_kWh'])){
         $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
        }
        if(!empty($document['U_3_ActiveEnergy_Delivered_kWh'])){
         $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
        } 
        if(!empty($document['U_4_ActiveEnergy_Delivered_kWh'])){
         $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
        } 
    }
    $index++;
  }
 // print_r($arr6);
if (!empty($arr1)) {
$first_index = key($arr1);
$first = $arr1[$first_index+1];
$end = end($arr1);
$U_2=$end-$first;
}
else{
$U_2=0; 
}
if (!empty($arr2)) {
$first_index = key($arr2);
$first = $arr2[$first_index+1];
$end = end($arr2);
$U_3=$end-$first;
}
else{
$U_3=0; 
}
if (!empty($arr3)) {
$first_index = key($arr3);
$first = $arr3[$first_index+1];
$end = end($arr3);
$U_4=$end-$first;
}
else{
$U_4=0; 
}
  $count1 = $U_2;
  $count2 = $U_3;
  $count3 = $U_4;
  if ($count1 < 0) {
    $count1 = 0;
  } else {
    $count1 = $count1;
  }
  if ($count2 < 0) {
    $count2 = 0;
  } else {
    $count2 = $count2;
  }
  if ($count3 < 0) {
    $count3 = 0;
  } else {
    $count3 = $count3;
  }
     $array1[] = array(
    'meter' => 'Water Treatment',
    'value' => (int)$count1 );
     $array1[] = array(
    'meter' => 'Turbine 1',
    'value' => (int)$count2 );
     $array1[] = array(
    'meter' => 'Syrup Room',
    'value' => (int)$count3 );
  $data = json_encode($array1);
  echo $data;
  }
  elseif ($value == 'Yesterday') {
  $start_date = date('Y-n-j', strtotime($current_date . '-1 day'));
$end_date = date('Y-n-j', strtotime($current_date  . '-1 day'));
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:00:00+05:00'));
// print_r($mongotime1);
$mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($end_date.'T24:00:00+05:00'));
$val1 = json_decode(json_encode($mongotime1), true);
$val2=json_decode(json_encode($mongotime2), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date=intval($a1);
// print_r($start_date);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date=intval($a2);
  $array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  $where = array(
   'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
  );
  $select_fields = array(
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
      $term[$index][$key]=$value;
        if(!empty($document['U_2_ActiveEnergy_Delivered_kWh'])){
         $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
        }
        if(!empty($document['U_3_ActiveEnergy_Delivered_kWh'])){
         $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
        } 
        if(!empty($document['U_4_ActiveEnergy_Delivered_kWh'])){
         $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
        } 
    }
    $index++;
  }
 // print_r($arr6);
if (!empty($arr1)) {
$first_index = key($arr1);
$first = $arr1[$first_index+1];
$end = end($arr1);
$U_2=$end-$first;
}
else{
$U_2=0; 
}
if (!empty($arr2)) {
$first_index = key($arr2);
$first = $arr2[$first_index+1];
$end = end($arr2);
$U_3=$end-$first;
}
else{
$U_3=0; 
}
if (!empty($arr3)) {
$first_index = key($arr3);
$first = $arr3[$first_index+1];
$end = end($arr3);
$U_4=$end-$first;
}
else{
$U_4=0; 
}
  $count1 = $U_2;
  $count2 = $U_3;
  $count3 = $U_4;
  if ($count1 < 0) {
    $count1 = 0;
  } else {
    $count1 = $count1;
  }
  if ($count2 < 0) {
    $count2 = 0;
  } else {
    $count2 = $count2;
  }
  if ($count3 < 0) {
    $count3 = 0;
  } else {
    $count3 = $count3;
  }
     $array1[] = array(
    'meter' => 'Water Treatment',
    'value' => (int)$count1 );
     $array1[] = array(
    'meter' => 'Turbine 1',
    'value' => (int)$count2 );
     $array1[] = array(
    'meter' => 'Syrup Room',
    'value' => (int)$count3 );
  $data = json_encode($array1);
  echo $data;
  }
  elseif ($value == 'Last Week') {
    $current_day = date("l");
if($current_day=='Monday') {
$start_date = date("Y-n-j");
}
elseif ($current_day=='Tuesday') {
$start_date = date('Y-n-j', strtotime($current_date .' -1 day'));
}
elseif ($current_day=='Wednesday') {
$start_date = date('Y-n-j', strtotime($current_date .' -2 day'));
}
elseif ($current_day=='Thursday') {
$start_date = date('Y-n-j', strtotime($current_date .' -3 day'));
}
elseif ($current_day=='Friday') {
$start_date = date('Y-n-j', strtotime($current_date .' -4 day'));
}
elseif ($current_day=='Saturday') {
$start_date = date('Y-n-j', strtotime($current_date .' -5 day'));
}
elseif ($current_day=='Sunday') {
$start_date = date('Y-n-j', strtotime($current_date .' -6 day'));
}
$start_date=date('Y-n-j', strtotime($start_date .' -7 day'));
$end_date = date('Y-n-j', strtotime($start_date .' +6 day'));
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T5:7:18+05:00'));
// print_r($mongotime1);
$mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($end_date.'+1 day'));
$val1 = json_decode(json_encode($mongotime1), true);
$val2=json_decode(json_encode($mongotime2), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date=intval($a1);
// print_r($start_date);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date=intval($a2);
  $array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  $where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date, '$lte' => $end_date)
);
  $select_fields = array(
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
      $term[$index][$key]=$value;
        if(!empty($document['U_2_ActiveEnergy_Delivered_kWh'])){
         $arr1[] = $document['U_2_ActiveEnergy_Delivered_kWh'];
        }
        if(!empty($document['U_3_ActiveEnergy_Delivered_kWh'])){
         $arr2[] = $document['U_3_ActiveEnergy_Delivered_kWh'];
        } 
        if(!empty($document['U_4_ActiveEnergy_Delivered_kWh'])){
         $arr3[] = $document['U_4_ActiveEnergy_Delivered_kWh'];
        } 
    }
    $index++;
  }
 // print_r($arr6);
if (!empty($arr1)) {
$first_index = key($arr1);
$first = $arr1[$first_index+1];
$end = end($arr1);
$U_2=$end-$first;
}
else{
$U_2=0; 
}
if (!empty($arr2)) {
$first_index = key($arr2);
$first = $arr2[$first_index+1];
$end = end($arr2);
$U_3=$end-$first;
}
else{
$U_3=0; 
}
if (!empty($arr3)) {
$first_index = key($arr3);
$first = $arr3[$first_index+1];
$end = end($arr3);
$U_4=$end-$first;
}
else{
$U_4=0; 
}
  $count1 = $U_2;
  $count2 = $U_3;
  $count3 = $U_4;
  if ($count1 < 0) {
    $count1 = 0;
  } else {
    $count1 = $count1;
  }
  if ($count2 < 0) {
    $count2 = 0;
  } else {
    $count2 = $count2;
  }
  if ($count3 < 0) {
    $count3 = 0;
  } else {
    $count3 = $count3;
  }
     $array1[] = array(
    'meter' => 'Water Treatment',
    'value' => (int)$count1 );
     $array1[] = array(
    'meter' => 'Turbine 1',
    'value' => (int)$count2 );
     $array1[] = array(
    'meter' => 'Syrup Room',
    'value' => (int)$count3 );
  $data = json_encode($array1);
  echo $data;
  }
?>