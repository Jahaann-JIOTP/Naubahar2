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
  $array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  for ($i = 0; $i <= 6; $i++) {
  $day = date('D', strtotime($start_date));
   $new_end = date('Y-n-j', strtotime($start_date ));
  $mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'T23:7:18+05:00'));
  $val2=json_decode(json_encode($mongotime2), true);
  foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
  }}
  $new_end=intval($a2);
  //echo $new_end.'</br>';
  
  $s = 0;
  $e = 100;
    $select_fields = array(
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
    );
    $where = array(
   'UNIXtimestamp' =>  array('$gt' => $start_date1, '$lte' => $new_end)
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
    $orgname = $start_date;
    $count1 = $U_2 * 1;
    $count2 = $U_3 * 1;
    $count3 = $U_4 * 1;

    $array1[] = array(
    'meter' =>  $orgname, 
    'value1' => (int)$count1, 
    'value2' => (int)$count2,
    'value3' => (int)$count3, 
   );
    $data = json_encode($array1);
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }
} elseif ($value == 'Last 30 Days') {
  $start_date = date('Y-n-j', strtotime($current_date . ' -30 day'));
  $array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  for ($i = 1; $i <= 30; $i++) {
    $day = date('D', strtotime($start_date));
    $new_end = date('Y-n-j', strtotime($start_date . ' +1 day'));
    $select_fields = array(
    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
    $start = date('d', strtotime($start_date));
    $orgname = $start;
    $count1 = $U_2 * 1;
    $count2 = $U_3 * 1;
    $count3 = $U_4 * 1;

    $array1[] = array(
    'meter' =>  $orgname, 
    'value1' => (int)$count1, 
    'value2' => (int)$count2,
    'value3' => (int)$count3, 
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
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  for ($i = 1; $i <= 7; $i++) {
    $day = date('D', strtotime($start_date));
  $new_end = date('Y-n-j', strtotime($start_date . ' +1 day'));
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'T5:7:18+05:00'));
 $val1 = json_decode(json_encode($mongotime1), true);
 foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
 }}
 $new_end1=intval($a1);
    $select_fields = array(

    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
    foreach ($docs as $document) {
      json_encode($document);
      foreach ($document as $key => $value) {
        $term[$index][$key] = $value;
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
    if ($index > 0 && !empty($document['U_1_Total_Active_Energy'])) {
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
    $orgname = $day;
    $count1 = $U_2 * 1;
    $count2 = $U_3 * 1;
    $count3 = $U_4 * 1;

    $array1[] = array(
     'meter' =>  $orgname, 
    'value1' => (int)$count1, 
    'value2' => (int)$count2,
    'value3' => (int)$count3, 
   );
    $data = json_encode($array1);
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }
} elseif ($value == 'This Year') {
  $start_date = date('Y') . '-01-01';
  $array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  for ($i = 1; $i <= 12; $i++) {
    $day = date('D', strtotime($start_date));
    $new_end = date('Y-n-j', strtotime($start_date . ' +1 Month'));
    $select_fields = array(

    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
    $orgname = date("M", strtotime($start_date));
    $count1 = $U_2 * 1;
    $count2 = $U_3 * 1;
    $count3 = $U_4 * 1;

    $array1[] = array(
     'meter' =>  $orgname, 
    'value2' => (int)$count1, 
    'value3' => (int)$count2,
    'value4' => (int)$count3, 
   );
    $data = json_encode($array1);
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 Month'));
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
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
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
    $select_fields = array(

    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
      foreach ($document as $key => $value) {
        $term[$index][$key] = $value;
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
    $orgname = $day;
    $count1 = $U_2 * 1;
    $count2 = $U_3 * 1;
    $count3 = $U_4 * 1;
    
    $array1[] = array(
     'meter' =>  $orgname, 
    'value1' => (int)$count1, 
    'value2' => (int)$count2,
    'value3' => (int)$count3, 
   );

    $data = json_encode($array1);
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }
} 
elseif ($value == 'This Month') {
  $start_date = date('m');
  $current_date = date('Y-n-j', strtotime($current_date . ' +1 day'));
  $array = array();
  $array['cols'][] = array('type' => 'string');
  $array['cols'][] = array('type' => 'number', 'label' => 'Water Treatment');
  $array['cols'][] = array('type' => 'number', 'label' => 'Turbine 1');
  $array['cols'][] = array('type' => 'number', 'label' => 'Syrup Room');
  for ($i = $start_date; $i <= $current_date; $i++) {
    $day = date('D', strtotime($start_date));
    $new_end = date('Y-n-j', strtotime($start_date . ' +1 day'));
    $select_fields = array(

    'U_2_ActiveEnergy_Delivered_kWh' => 1,
    'U_3_ActiveEnergy_Delivered_kWh' => 1,
    'U_4_ActiveEnergy_Delivered_kWh' => 1
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
    $orgname = $i;
    $count1 = $U_2 * 1;
    $count2 = $U_3 * 1;
    $count3 = $U_4 * 1;
    
    $array1[] = array(
     'meter' =>  $orgname, 
    'value1' => (int)$count1, 
    'value2' => (int)$count2,
    'value3' => (int)$count3, 
   );

    $data = json_encode($array1);
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }
}
echo $data;
?>