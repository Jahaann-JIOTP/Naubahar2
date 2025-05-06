<?php
ini_set('max_execution_time', '600');
session_start();
error_reporting(E_ERROR | E_PARSE);
$value = $_GET['value'];
// $value='week';
include('mongodb_conn.php');
if ($value=='week') {
$collection = $db->naubahar_activetags;
$current_date = date("Y-n-j");
$current_day = date("l");
if ($current_day == 'Monday') {
    $start_date = date("Y-n-j");
  } elseif ($current_day == 'Tuesday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -1 day'));
  } elseif ($current_day == 'Wednesday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -2 day'));
  } elseif ($current_day == 'Thursday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -3 day'));
  } elseif ($current_day == 'Friday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -4 day'));
  } elseif ($current_day == 'Saturday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -5 day'));
  } elseif ($current_day == 'Sunday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -6 day'));
  }
$last_start_date = date('Y-n-j', strtotime($start_date .' -7 day'));
// echo $last_start_date;
$array = array();
$array['cols'][] = array('type' => 'string'); 
$array['cols'][] = array('type' => 'number','label'=>'This Week'); 
$array['cols'][] = array('type' => 'number','label'=>'Last Week'); 
for ($i=1; $i <=7 ; $i++) {
$new_start=$start_date;
$day = date('D', strtotime($new_start));
$new_end=date('Y-n-j', strtotime($new_start));
$s=new MongoDB\BSON\UTCDateTime(strtotime($new_start.'T00:07:18+05:00'));
$e=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'T23:59:18+05:00'));
$val1 = json_decode(json_encode($s), true);
$val2=json_decode(json_encode($e), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
// print_r($start_date);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date1=intval($a2);
$where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date1, '$lte' => $end_date1)
);
$select_fields = array(
    'U_1_ActiveEnergy_Delivered_kWh' => 1,
    'UNIXtimestamp' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
$start_date=date('Y-n-j', strtotime($new_start .' +1 day'));
$index=0;
foreach ($docs as $document) {
    json_encode($document);
    // var_dump($document);
    foreach ($document as $key => $value) {
         $term[$index][$key]=$value;
     }
    $index++;        
}
if($index>0&&$term[0]["U_1_ActiveEnergy_Delivered_kWh"]!=0)
{
$u1=$term[$index-1]["U_1_ActiveEnergy_Delivered_kWh"]-$term[0]["U_1_ActiveEnergy_Delivered_kWh"];
}
else
{
$u1 = '0';
}

//last week
$new_start=$last_start_date;
$new_end=date('Y-n-j', strtotime($new_start));
$s=new MongoDB\BSON\UTCDateTime(strtotime($new_start.'T00:07:18+05:00'));
$e=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'T23:59:18+05:00'));
$val1 = json_decode(json_encode($s), true);
$val2=json_decode(json_encode($e), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
// print_r($start_date);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date1=intval($a2);
$where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date1, '$lte' => $end_date1)
);
$select_fields = array(
    'U_1_ActiveEnergy_Delivered_kWh' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);  //This is the main line
$docs = $cursor->toArray();
$last_start_date=date('Y-n-j', strtotime($new_start .' +1 day'));
$index=0;
foreach ($docs as $document) {
    json_encode($document);
    // var_dump($document);
    foreach ($document as $key => $value) {
         $term[$index][$key]=$value;
         if (!empty($document["U_1_ActiveEnergy_Delivered_kWh"])) {
          $arr[] = $document["U_1_ActiveEnergy_Delivered_kWh"];
                 }
     }
    $index++;        
}

if (!empty($arr)) {
                $first_index = key($arr);
                $first = $arr[$first_index];
                $end = end($arr);
                $u2 = $end - $first;
                $kwh = round($kwh, 2);
               } else {
                $u2 = 0;
               }
$orgname = $day;
$count =$u1;
$count1 =$u2;
 $array1[] = array(
      'meter' =>  $orgname,
      'value2' => (int)$count1
     );
 $array1[] = array(
      'meter' =>  $orgname,
      'value3' => (int)$count
     );
$data = json_encode($array1);
} 
    echo $data;
}
elseif ($value=='month') {
$collection = $db->naubahar_activetags;
$current_date = date("Y-n-j");
$start_date = date('Y', strtotime($current_date)).'-'.date('m', strtotime($current_date)).'-01';
$array = array();
$array['cols'][] = array('type' => 'string'); 
$array['cols'][] = array('type' => 'number','label'=>'This Month'); 
$array['cols'][] = array('type' => 'number','label'=>'Last Month'); 
for ($i = 1; $i <= 30; $i++) {
$new_start=$start_date;
$day = date('D', strtotime($new_start));
$new_end = date('Y-n-j', strtotime($new_start));
$s=new MongoDB\BSON\UTCDateTime(strtotime($new_start.'T00:07:18+05:00'));
$e=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'T23:59:18+05:00'));
$val1 = json_decode(json_encode($s), true);
$val2=json_decode(json_encode($e), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date1=intval($a2);
$where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date1, '$lte' => $end_date1)
);
$select_fields = array(
    'U_1_ActiveEnergy_Delivered_kWh' => 1,
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
    // var_dump($document);
    foreach ($document as $key => $value) {
         $term[$index][$key]=$value;
         if (!empty($document["U_1_ActiveEnergy_Delivered_kWh"])) {
          $arr[] = $document["U_1_ActiveEnergy_Delivered_kWh"];
                 }
     }
    $index++;        
}

if (!empty($arr)) {
                $first_index = key($arr);
                $first = $arr[$first_index];
                $end = end($arr);
                $u1 = $end - $first;
                $kwh = round($kwh, 2);
               } else {
                $u1 = 0;
               }
//last month
$last_start_date = date('Y-n-j', strtotime($start_date .' -1 month'));
$new_start=$last_start_date;
$day = date('D', strtotime($new_start));
$new_end = date('Y-n-j', strtotime($new_start));
$s=new MongoDB\BSON\UTCDateTime(strtotime($new_start.'T00:07:18+05:00'));
$e=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'T23:59:18+05:00'));
$val1 = json_decode(json_encode($s), true);
$val2=json_decode(json_encode($e), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$end_date1=intval($a2);
$where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date1, '$lte' => $end_date1)
);
$select_fields = array(
    'U_1_ActiveEnergy_Delivered_kWh' => 1,
    'UNIXtimestamp' => 1
);
$select_fields = array(
    'U_1_ActiveEnergy_Delivered_kWh' => 1,
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
    // var_dump($document);
    foreach ($document as $key => $value) {
         $term[$index][$key]=$value;
     }
    $index++;        
}
if($index>0)
{
$u2=$term[$index-1]["U_1_ActiveEnergy_Delivered_kWh"]-$term[0]["U_1_ActiveEnergy_Delivered_kWh"];
}
else
{
$u2 = '0';
}
$start = date('d', strtotime($start_date));
$orgname = $start;
$count = $u1 * 1;
$count1 = $u2 * 1;
$array1[] = array(
   'meter' =>  $orgname,
   'value2' => (int)$count1
  );
$array1[] = array(
   'meter' =>  $orgname,
   'value3' => (int)$count 
  );
$data = json_encode($array1);
$start_date = date('Y-m-d', strtotime($start_date . ' +1 day'));
} 
    echo $data;
}
if ($value=='today') {
$collection = $db->naubahar_activetags;
$current_date = date("Y-n-j");
$current_day = date("l");
$current_date = date('Y-n-j', strtotime($current_date));
$start_date = date('Y-n-j', strtotime($current_date));
  $mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T00:07:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
$start_date1=intval($a1);
$array = array();
$array['cols'][] = array('type' => 'string'); 
$array['cols'][] = array('type' => 'number','label'=>'This Week'); 
$array['cols'][] = array('type' => 'number','label'=>'Last Week'); 
$day = date('D', strtotime($start_date));
    $new_end = date('Y-n-j', strtotime($start_date ));
   $mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'T23:59:18+05:00'));
   $val2=json_decode(json_encode($mongotime2), true);
   foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
   }}
   $new_end1=intval($a2);
   //echo $new_end.'</br>';
   $s = 0;
   $e = 100;
    $where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date1, '$lte' => $new_end1)
   );
    $select_fields = array(
    'U_1_ActiveEnergy_Delivered_kWh' => 1,
    'UNIXtimestamp' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
$index=0;
 $new_end = date('Y-n-j', strtotime($start_date . ' +1 day')).'</br>';
foreach ($docs as $document) {
    json_encode($document);
    // var_dump($document);
    foreach ($document as $key => $value) {
         $term[$index][$key]=$value;
     }
    $index++;        
}
if($index>0&&$term[0]["U_1_ActiveEnergy_Delivered_kWh"]!=0)
{
$u1=$term[$index-1]["U_1_ActiveEnergy_Delivered_kWh"]-$term[0]["U_1_ActiveEnergy_Delivered_kWh"];
}
else
{
$u1 = '0';
}
//yesterday
$current_date = date('Y-n-j', strtotime($current_date));
$start_date = date('Y-n-j', strtotime($current_date.'-1 day'));
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T00:07:18+05:00'));
  $val1 = json_decode(json_encode($mongotime1), true);
  foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
  }}
$start_date1=intval($a1);
$array = array();
$array['cols'][] = array('type' => 'string'); 
$array['cols'][] = array('type' => 'number','label'=>'This Week'); 
$array['cols'][] = array('type' => 'number','label'=>'Last Week'); 
$day = date('D', strtotime($start_date));
    $new_end = date('Y-n-j', strtotime($start_date ));
   $mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($new_end.'T23:59:18+05:00'));
   $val2=json_decode(json_encode($mongotime2), true);
   foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
   }}
   $new_end1=intval($a2);
   //echo $new_end.'</br>';
   $s = 0;
   $e = 100;
    $where = array(
    'UNIXtimestamp' =>  array('$gt' => $start_date1, '$lte' => $new_end1)
   );
    $select_fields = array(
    'U_1_ActiveEnergy_Delivered_kWh' => 1,
    'UNIXtimestamp' => 1
);
$options = array(
    'projection' => $select_fields
);
$cursor = $collection->find($where, $options);   //This is the main line
$docs = $cursor->toArray();
$index=0;
 $new_end = date('Y-n-j', strtotime($start_date . ' +1 day')).'</br>';
foreach ($docs as $document) {
    json_encode($document);
    // var_dump($document);
    foreach ($document as $key => $value) {
         $term[$index][$key]=$value;
         if (!empty($document["U_1_ActiveEnergy_Delivered_kWh"])) {
          $arr[] = $document["U_1_ActiveEnergy_Delivered_kWh"];
                 }
     }
    $index++;        
}

if (!empty($arr)) {
                $first_index = key($arr);
                $first = $arr[$first_index];
                $end = end($arr);
                $u2 = $end - $first;
                $kwh = round($kwh, 2);
               } else {
                $u2 = 0;
               }
// $orgname ='Today-Yesterday';
$count =$u1;
$count1 =$u2;
 $array1[] = array(
      'meter' =>  'Yesterday',
      'value2' => (int)$count1
     );
 $array1[] = array(
      'meter' =>  'Today',
      'value3' => (int)$count
     );
$data = json_encode($array1);
    echo $data;
}
?>