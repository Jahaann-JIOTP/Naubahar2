<?php
session_start();
//error_reporting(E_ALL);
error_reporting(E_ERROR | E_PARSE);
include('mongodb_conn.php');
$collection = $db->naubahar_b;
$start_date=date('Y-n-j G:i');
$end_date=date('Y-n-j G:i');
$start_date=$_GET["start_date"];
$end_date=$_GET["end_date"];
$start_date = date('Y-n-j', strtotime($start_date));
$end_date = date('Y-n-j', strtotime($end_date .' +0 day'));
$g=$_GET["tag"];
$location=$_GET["location"];
$meter=$_GET["meter"];
$Tag = $location.$meter.$g;
$units="";
 if($location.$meter=='U_1'){
            $units='Main LT';
        }
        elseif($location.$meter=='U_2'){
            $units='Water Treatment';
        }
        elseif($location.$meter=='U_3'){
            $units='Turbine 1';
        }
        elseif($location.$meter=='U_4'){
            $units='Syrup Room';
        }
        elseif($location.$meter=='U_5'){
            $units='Air Compressor(3+4+5)';
        }
        elseif($location.$meter=='U_6'){
            $units='Air Compressor(1+2)';
        }
        elseif($location.$meter=='U_7'){
            $units='Grasso 4';
        }
        elseif($location.$meter=='U_8'){
            $units='Grasso 3';
        }
        elseif($location.$meter=='U_9'){
            $units='Grasso 2';
        }
        elseif($location.$meter=='U_10'){
            $units='Grasso 1';
        }

        elseif($location.$meter=='U_11'){
            $units='Evaporators';
        }
        elseif($location.$meter=='U_12'){
            $units='Line - 5';
        }
        elseif($location.$meter=='U_13'){
            $units='Line - 4';
        }
        elseif($location.$meter=='U_14'){
            $units='Line - 3';
        }
        elseif($location.$meter=='U_15'){
            $units='Line - 1';
        }
        elseif($location.$meter=='U_16'){
            $units='Boiler';
        }
        elseif($location.$meter=='U_17'){
            $units='Turbine - 2';
        }
$array = array();
$array['cols'][] = array('type' => 'datetime'); 
$array['cols'][] = array('type' => 'number','label'=>$units);
$mongotime1=new MongoDB\BSON\UTCDateTime(strtotime($start_date.'T0:00:00+05:00'));
$val1 = json_decode(json_encode($mongotime1), true);
foreach($val1 as $key=>$value){foreach($value as $sub_key=>$sub_value){$a1=$sub_value;
}}
$start_date1=intval($a1); 
$mongotime2=new MongoDB\BSON\UTCDateTime(strtotime($end_date.'T23:59:18+05:00'));
$val2 = json_decode(json_encode($mongotime2), true);
foreach($val2 as $key=>$value){foreach($value as $sub_key=>$sub_value2){$a2=$sub_value2;
}}
$new_end1=intval($a2);
$where = array(
'UNIXtimestamp' =>  array('$gte' => $start_date1, '$lte' => $new_end1)
            );
$select_fields = array(
    $Tag => 1,
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
    //print_r($document);
    foreach ($document as $key => $value) {
         $term[$index][$key]=$value;
     }
    $index++;        
}
for ($i=0; $i < $index; $i++) { 
 $t=$term[$i]['UNIXtimestamp'];
 //print_r($t);
 // echo '</br>';

 $t= gmdate("Y-n-j H:i", $t);
 $t = date('Y-n-j H:i', strtotime($t. ' + 5 hours'));
 //print_r($t);
//echo '</br>';
 $y=date('Y',strtotime($t));
 $m=date('n',strtotime($t))-1;
 //print_r($m);
 $d=date('j',strtotime($t));
 $location=date('G',strtotime($t));
 $im=date('i',strtotime($t));
 
 $start_date='Date('.$y.','.$m.','.$d.','.$location.','.$im.')';
// print_r($start_date);
 $array['rows'][] = array('c' => array( array('v'=> $start_date), array('v'=>round($term[$i][$Tag],4))));
//  print_r($array);
}         
$data = json_encode($array);
// print_r($array);
echo $data;
?>