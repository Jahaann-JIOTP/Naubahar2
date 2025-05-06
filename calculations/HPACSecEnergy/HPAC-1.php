<?php
$value = $_GET['value'];
function fetchData($start_date,$end_date){
    include('../mongodb_conn.php');
    $collection = $db->naubaharunit2_activetags;
    $where = array(
        'UNIXtimestamp' =>  array('$gte' => $start_date, '$lte' => $end_date)
       );
     $select_fields = array(
        'GW2_U3_ActiveEnergy_Delivered_kWh' => 1,
        'PLC_Date_Time' => 1,
     );
     $options = array(
         'projection' => $select_fields
     );
     $cursor = $collection->find($where, $options);
     $docs = $cursor->toArray();
         // var_dump($docs);
     $index=0;
     foreach ($docs as $document) {
         json_encode($document);
         // var_dump($document);
     
         foreach ($document as $key => $value) {
              $term[$index][$key]=$value;
              if(!empty($document['GW2_U3_ActiveEnergy_Delivered_kWh'])){
                $arr[] = $document['GW2_U3_ActiveEnergy_Delivered_kWh'];
               }
          }
         $index++;        
     }
     if (!empty($arr)) {
        $first_index = key($arr);
        $first = $arr[$first_index+1];
        $end = end($arr);
        $U_1=$end-$first;
        }
        else{
        $U_1=0; 
        }
        
        $data = $U_1;
        $data = number_format($data,0,'',',');
     echo $data;

}
$current_date = date("Y-n-j");
// echo $current_date;
if($value=='Today') {
$start_date = date('Y-n-j', strtotime($current_date));
$end_date = date('Y-n-j', strtotime($current_date));
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T00:00:18+05:00'));
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
// echo $end_date;
fetchData($start_date,$end_date);
}
elseif ($value=='This Week') {
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

$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T00:00:18+05:00'));
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
fetchData($start_date,$end_date);
}
elseif ($value=='This Month') {
$start_date = date('Y', strtotime($current_date)).'-'.date('n', strtotime($current_date)).'-01';
//echo $start_date;
$end_date = date('Y-n-j', strtotime($current_date));
//echo $end_date;
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T00:00:18+05:00'));
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
 //echo $end_date;
 fetchData($start_date,$end_date);
}
elseif ($value=='This Year') {
$start_date = date('Y', strtotime($current_date)).'-01-01';

//echo $start_date;
$end_date = date('Y-n-j', strtotime($current_date));
//echo $end_date;
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T00:00:18+05:00'));
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
 //echo $end_date;
 //echo '<br>';
 fetchData($start_date,$end_date);
}
elseif($value=='Last 7 Days') {
$start_date = date('Y-n-j', strtotime($current_date .' -7 day'));
$end_date = date('Y-n-j', strtotime($current_date.' -1 day'));
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T00:00:18+05:00'));
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
//echo $start_date;
fetchData($start_date,$end_date);
}
elseif ($value=='Last 30 Days') {
$start_date = date('Y-n-j', strtotime($current_date .' -30 day'));
$end_date = date('Y-n-j', strtotime($current_date));
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T00:00:18+05:00'));
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
//echo $start_date;
fetchData($start_date,$end_date);
}
elseif ($value == 'Yesterday') {
$start_date = date('Y-n-j', strtotime($current_date . '-1 day'));
$end_date = date('Y-n-j', strtotime($current_date  . '-1 day'));
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T00:00:18+05:00'));
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
// echo $end_date;
fetchData($start_date,$end_date);
}
elseif ($value=='Last Week') {
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
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T00:00:18+05:00'));
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
fetchData($start_date,$end_date);
}

?>