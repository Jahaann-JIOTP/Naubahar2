<?php 
// This database file gets data from naubahar database for Pie charts.
// naubahar has 17 meters
// This report fetches data using UNIXtimestamp

//$Time = $_GET['Time'];
$Time = 'Yesterday';
// $Tags = $_GET['Tags'];
$Tags = 'U_1';
date_default_timezone_set("Asia/Karachi");
$startDate = '';
$endDate = '';
$selected_fields = explode(",",$Tags );
$meter_names = array(
  'U_1'=>'Main LT','U_2'=>'Water Treatment','U_3'=>'Turbine-1','U_4'=>'Syrup Room','U_5'=>'Air Compressor(3+4+5)','U_6'=>'Air Compressor(1+2)','U_7'=>'Grasso 4','U_8'=>'Grasso 3','U_9'=>'Grasso 2',
  'U_10'=>'Grasso 1','U_11'=>'Evaporators','U_12'=>'Line 5','U_13'=>'Line 4','U_14'=>'Line 3','U_15'=>'Line 1','U_16'=>'Boiler','U_17'=>'Turbine-2'
);
// print_r($selected_fields);
function GetUNIXday($day)
{
    $mongotime = new MongoDB\BSON\UTCDateTime(strtotime($day . 'T0:0:0+05:00'));
    $val = json_decode(json_encode($mongotime), true);
    foreach ($val as $key => $value) {
        foreach ($value as $sub_key => $sub_value) {
            $a = $sub_value;
        }
    }
    return intval($a);
}
function fetchKWH($date1, $date2, $tag_values)
{   
    include('calculations\mongodb_conn.php');
    $collection = $db->naubahar_b;
    $startDayUNIX = GetUNIXday($date1);
    $date2 = date('Y-m-d', strtotime($date2));
    $endDayUNIX = GetUNIXday($date2);
    $cursor = $collection->aggregate([
        ['$project' => 
            [
            'UNIXtimestamp' => 1,
            $tag_values => 1, 
            ]
        ], 
        ['$match' => ['UNIXtimestamp' => ['$gte' => $startDayUNIX, '$lte' => $endDayUNIX]]], 
        ['$project' => 
            [
            'u1' => '$'.$tag_values,
            ]
        ], 
        ['$group' => ['_id' => (object) [], 'document' => ['$push' => '$$ROOT']]], 
        ['$project' => 
            [
                'firstRead1' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
                'lastRead1' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
             ]
        ], 
        ['$project' => 
            [
            'U_1' => ['$subtract' => ['$lastRead1.u1', '$firstRead1.u1']],
            ]
        ]
        ]);
    $docs = $cursor->toArray();
    return $docs[0]['U_1'];
}
function fetchIdealKWh($date1, $date2, $voltage_Tag,$current_Tag)
{   
    include('calculations\mongodb_conn.php');
    $collection = $db->naubahar_b;
    $startDayUNIX = GetUNIXday($date1);
    $date2 = date('Y-m-d', strtotime($date2));
    $endDayUNIX = GetUNIXday($date2);
    $cursor = $collection->aggregate(
      [
        ['$project' => [
            'UNIXtimestamp' => 1, 
            $voltage_Tag => 1, 
            $current_Tag => 1, 
            ]], 
        ['$match' => [
          'UNIXtimestamp' => ['$gt' => $startDayUNIX, '$lt' => $endDayUNIX]
          ]], 
          ['$project' => [
            'voltage' => '$'.$voltage_Tag, 
            'current' => '$'.$current_Tag,  
            'timestamp' => '$UNIXtimestamp'
          ]], 
          [
            '$project' => [
              'KW' => ['$divide' => [['$multiply' => ['$voltage', '$current', 0.95, 1.732]], 1000]], 
              'timestamp' => 1]
          ], 
          [
            '$group' => [
              '_id' => (object) [], 
              'document' => ['$push' => '$$ROOT']]
          ], 
          [
                '$project' => [
                  'nonZeroArray' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.KW', 0]]]]]
          ],
        ['$project' => [
          'nonZeroArray' => 1, 
          'start' => ['$arrayElemAt' => ['$nonZeroArray.timestamp', 0]], 
          'end' => ['$arrayElemAt' => ['$nonZeroArray.timestamp', ['$subtract' => [['$size' => '$nonZeroArray'], 1]]]]
          ]], 
          ['$project' => [
            'nonZeroArray' => 1, 
            'runningHours' => ['$divide' => [['$subtract' => ['$end', '$start']], 3600]]
            ]], 
            ['$unwind' => [
              'path' => '$nonZeroArray', 
              'includeArrayIndex' => ' ', 
              'preserveNullAndEmptyArrays' => true
              ]], 
              ['$group' => [
                '_id' => (object) [], 
                'averageKW' => ['$avg' => '$nonZeroArray.KW'], 
                'time' => ['$first' => '$runningHours']
              ]], 
              ['$project' => [
                'KWH' => ['$multiply' => ['$averageKW', '$time']]
              ]]
        ]
  );
    
    $docs = $cursor->toArray();
    return $docs[0]['KWH'];
}
if($Time == 'Today')
{
  $startDate = date('Y-m-d');
  $endDate = date('Y-m-d');
}
else if($Time == 'Yesterday')
{
  $startDate = date('Y-m-d',strtotime("-1 days"));
  $endDate = date('Y-m-d');
}
else if($Time == 'Last 7 Days')
{
  $startDate = date('Y-m-d',strtotime("-7 days"));
  $endDate = date('Y-m-d',strtotime("-1 days"));
}
else if($Time == 'Last 30 Days')
{
  $startDate = date('Y-m-d',strtotime("-30 days"));
  $endDate = date('Y-m-d',strtotime("-1 days"));
}
$dataset = array();
foreach ($selected_fields as $key1 => $value1) 
{   
  foreach ($meter_names as $key2 => $value2) 
  { 
    if($value1==$key2)
    { $actual = fetchKWH($startDate,$endDate, $key2.'_ActiveEnergy_Delivered_kWh');
    echo $actual.'actual<br>';
      $ideal = fetchIdealKWH($startDate,$endDate, $key2.'_Voltage_LL_V', $key2.'_Current_Avg_Amp');
       echo $ideal.'ideal<br>';
      $loss = ($ideal-$actual);
      $lossPercentage = round(($loss/$ideal)*100,2);
      $dataset[] = array(
        'meter' => $value2,
        'value' => $lossPercentage
      );
    }
  }
}
echo json_encode($dataset);
?>