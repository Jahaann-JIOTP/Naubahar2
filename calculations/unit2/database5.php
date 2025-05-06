<?php
error_reporting(E_ERROR | E_PARSE);
$value = $_GET['value'];
// $value = 'week';
include('../mongodb_conn.php');
$current_date = date("Y-n-j");
$collection = $db->naubaharunit2_activetags;
$array = array();
$data = array();
$numberOfMeters = 30;
$current_date = date('Y-m-d');
$tag_values = array(
  //Grasso
  'GW1_U8_ActiveEnergy_Delivered_kWh',
  'GW1_U26_ActiveEnergy_Delivered_kWh',
  'GW1_U25_ActiveEnergy_Delivered_kWh',
  // 'GW1_U16_ActiveEnergy_Delivered_kWh',
  // 'GW1_U15_ActiveEnergy_Delivered_kWh',
  // 'GW1_U20_ActiveEnergy_Delivered_kWh',
  // 'GW1_U21_ActiveEnergy_Delivered_kWh',
  //  //ECR
  // 'GW1_U4_ActiveEnergy_Delivered_kWh',
  // 'GW1_U2_ActiveEnergy_Delivered_kWh',
  // 'GW1_U3_ActiveEnergy_Delivered_kWh',
  // 'GW1_U5_ActiveEnergy_Delivered_kWh',
  // 'GW3_U3_ActiveEnergy_Delivered_kWh',
  // 'GW3_U4_ActiveEnergy_Delivered_kWh',
  // 'GW3_U5_ActiveEnergy_Delivered_kWh',
  // //HPAC
  // 'GW2_U3_ActiveEnergy_Delivered_kWh',
  // 'GW2_U4_ActiveEnergy_Delivered_kWh',
  //  //lpac
  // 'GW2_U12_ActiveEnergy_Delivered_kWh',
  // 'GW2_U11_ActiveEnergy_Delivered_kWh',
  // 'GW2_U14_ActiveEnergy_Delivered_kWh',
  // 'GW2_U13_ActiveEnergy_Delivered_kWh',
  //   //RO
  // 'GW2_U9_ActiveEnergy_Delivered_kWh',
  // 'GW2_U10_ActiveEnergy_Delivered_kWh',
  // 'GW1_U22_ActiveEnergy_Delivered_kWh',
  // 'GW2_U8_ActiveEnergy_Delivered_kWh',
  // //Lines
  // 'GW1_U6_ActiveEnergy_Delivered_kWh',
  // 'GW1_U7_ActiveEnergy_Delivered_kWh' ,
  // 'GW2_U2_ActiveEnergy_Delivered_kWh',
  // 'GW1_U23_ActiveEnergy_Delivered_kWh',
  // 'GW1_U24_ActiveEnergy_Delivered_kWh',
  // 'GW3_U2_ActiveEnergy_Delivered_kWh',
  // 'GW3_U6_ActiveEnergy_Delivered_kWh',
);
function dateDiffInDays($date1, $date2)
{
  // Calculating the difference in timestamps
  $diff = strtotime($date2) - strtotime($date1);
  // 1 day = 24 hours
  // 24 * 60 * 60 = 86400 seconds
  return abs(round($diff / 86400));
}
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
function fetchHourly($date, $tag_values, $numberOfMeters, $Label)
{
  include('../mongodb_conn.php');
  $collection = $db->naubaharunit2_activetags;
  $day = date('d', strtotime($date));
  $day = intval($day);
  $month = date('m', strtotime($date));
  $month = intval($month);
  $year = date('Y', strtotime($date));
  $year = intval($year);
  $currentDayUNIX = GetUNIXday($date);
  $cursor = $collection->aggregate([
    [
      '$project' => [
        'UNIXtimestamp' => 1,
        $tag_values[0] => 1,
        $tag_values[1] => 1,
        $tag_values[2] => 1,
        // $tag_values[3] => 1,
        // $tag_values[4] => 1,
        // $tag_values[5] => 1,
        // $tag_values[6] => 1,
        // $tag_values[7] => 1,
        // $tag_values[8] => 1,
        // $tag_values[9] => 1,
        // $tag_values[10] => 1,
        // $tag_values[11] => 1,
        // $tag_values[12] => 1,
        // $tag_values[13] => 1,
        // $tag_values[14] => 1,
        // $tag_values[15] => 1,
        // $tag_values[16] => 1,
        // $tag_values[17] => 1,
        // $tag_values[18] => 1,
        // $tag_values[19] => 1,
        // $tag_values[20] => 1,
        // $tag_values[21] => 1,
        // $tag_values[22] => 1,
        // $tag_values[23] => 1,
        // $tag_values[24] => 1,
        // $tag_values[25] => 1,
        // $tag_values[26] => 1,
        // $tag_values[27] => 1,
        // $tag_values[28] => 1,
        // $tag_values[29] => 1
        // $tag_values[30] => 1
      ]
    ],
    ['$match' => ['UNIXtimestamp' => ['$gte' => $currentDayUNIX]]],
    ['$project' => [
      'hour' => ['$hour' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'day' => ['$dayOfMonth' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'month' => ['$month' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'year' => ['$year' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'g1' => '$' . $tag_values[0],
      'g2' => '$' . $tag_values[1],
      'g3' => '$' . $tag_values[2],
      // 'g4' => '$' . $tag_values[3],
      // 'g5' => '$' . $tag_values[4],
      // 'g6' => '$' . $tag_values[5],
      // 'g7' => '$' . $tag_values[6],
      // 'g8' => '$' . $tag_values[7],
      // 'g9' => '$' . $tag_values[8],
      // 'g10' => '$' . $tag_values[9],
      // 'g11' => '$' . $tag_values[10],
      // 'g12' => '$' . $tag_values[11],
      // 'g13' => '$' . $tag_values[12],
      // 'g14' => '$' . $tag_values[13],
      // 'g15' => '$' . $tag_values[14],
      // 'g16' => '$' . $tag_values[15],
      // 'g17' => '$' . $tag_values[16],
      // 'g18' => '$' . $tag_values[17],
      // 'g19' => '$' . $tag_values[18],
      // 'g20' => '$' . $tag_values[19],
      // 'g21' => '$' . $tag_values[20],
      // 'g22' => '$' . $tag_values[21],
      // 'g23' => '$' . $tag_values[22],
      // 'g24' => '$' . $tag_values[23],
      // 'g25' => '$' . $tag_values[24],
      // 'g26' => '$' . $tag_values[25],
      // 'g27' => '$' . $tag_values[26],
      // 'g28' => '$' . $tag_values[27],
      // 'g29' => '$' . $tag_values[28],
      // 'g30' => '$' . $tag_values[29],
      // 'g31' => '$' . $tag_values[30],
    ]],
    ['$match' => ['year' => $year, 'month' => $month, 'day' => $day]],
    [
      '$group' => [
        '_id' => ['year' => '$year', 'month' => '$month', 'day' => '$day', 'hour' => '$hour',],
        'document' => ['$push' => '$$ROOT'],
      ]
    ],
    ['$sort' => ['_id.hour' => 1]],
    [
      '$project' => [
        'firstRead1' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g1', 0]]]]],
        'lastRead1' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g1', 0]]]]],
        'firstRead2' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g2', 0]]]]],
        'lastRead2' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g2', 0]]]]],
        'firstRead3' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g3', 0]]]]],
        'lastRead3' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g3', 0]]]]],
        // 'firstRead4' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g4', 0]]]]],
        // 'lastRead4' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g4', 0]]]]],
        // 'firstRead5' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g5', 0]]]]],
        // 'lastRead5' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g5', 0]]]]],
        // 'firstRead6' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g6', 0]]]]],
        // 'lastRead6' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g6', 0]]]]],
        // 'firstRead7' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g7', 0]]]]],
        // 'lastRead7' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g7', 0]]]]],
        // 'firstRead8' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g8', 0]]]]],
        // 'lastRead8' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g8', 0]]]]],
        // 'firstRead9' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g9', 0]]]]],
        // 'lastRead9' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g9', 0]]]]],
        // 'firstRead10' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g10', 0]]]]],
        // 'lastRead10' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g10', 0]]]]],
        // 'firstRead11' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g11', 0]]]]],
        // 'lastRead11' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g11', 0]]]]],
        // 'firstRead12' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g12', 0]]]]],
        // 'lastRead12' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g12', 0]]]]],
        // 'firstRead13' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g13', 0]]]]],
        // 'lastRead13' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g13', 0]]]]],
        // 'firstRead14' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g14', 0]]]]],
        // 'lastRead14' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g14', 0]]]]],
        // 'firstRead15' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g15', 0]]]]],
        // 'lastRead15' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g15', 0]]]]],
        // 'firstRead16' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g16', 0]]]]],
        // 'lastRead16' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g16', 0]]]]],
        // 'firstRead17' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g17', 0]]]]],
        // 'lastRead17' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g17', 0]]]]],
        // 'firstRead18' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g18', 0]]]]],
        // 'lastRead18' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g18', 0]]]]],
        // 'firstRead19' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g19', 0]]]]],
        // 'lastRead19' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g19', 0]]]]],
        // 'firstRead20' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g20', 0]]]]],
        // 'lastRead20' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g20', 0]]]]],
        // 'firstRead21' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g21', 0]]]]],
        // 'lastRead21' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g21', 0]]]]],
        // 'firstRead22' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g22', 0]]]]],
        // 'lastRead22' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g22', 0]]]]],
        // 'firstRead23' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g23', 0]]]]],
        // 'lastRead23' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g23', 0]]]]],
        // 'firstRead24' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g24', 0]]]]],
        // 'lastRead24' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g24', 0]]]]],
        // 'firstRead25' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g25', 0]]]]],
        // 'lastRead25' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g25', 0]]]]],
        // 'firstRead26' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g26', 0]]]]],
        // 'lastRead26' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g26', 0]]]]],
        // 'firstRead27' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g27', 0]]]]],
        // 'lastRead27' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g27', 0]]]]],
        // 'firstRead28' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g28', 0]]]]],
        // 'lastRead28' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g28', 0]]]]],
        // 'firstRead29' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g29', 0]]]]],
        // 'lastRead29' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g29', 0]]]]],
        // 'firstRead30' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g30', 0]]]]],
        // 'lastRead30' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g30', 0]]]]],
        // 'firstRead31' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g31', 0]]]]],
        // 'lastRead31' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g31', 0]]]]],
      ]
    ],
    ['$project' => [
      'G_1' => ['$subtract' => ['$lastRead1.g1', '$firstRead1.g1']],
      'G_2' => ['$subtract' => ['$lastRead2.g2', '$firstRead2.g2']],
      'G_3' => ['$subtract' => ['$lastRead3.g3', '$firstRead3.g3']],
      // 'G_4' => ['$subtract' => ['$lastRead4.g4', '$firstRead4.g4']],
      // 'G_5' => ['$subtract' => ['$lastRead5.g5', '$firstRead5.g5']],
      // 'G_6' => ['$subtract' => ['$lastRead6.g6', '$firstRead6.g6']],
      // 'G_7' => ['$subtract' => ['$lastRead7.g7', '$firstRead7.g7']],
      // 'G_8' => ['$subtract' => ['$lastRead8.g8', '$firstRead8.g8']],
      // 'G_9' => ['$subtract' => ['$lastRead9.g9', '$firstRead9.g9']],
      // 'G_10' => ['$subtract' => ['$lastRead10.g10', '$firstRead10.g10']],
      // 'G_11' => ['$subtract' => ['$lastRead11.g11', '$firstRead11.g11']],
      // 'G_12' => ['$subtract' => ['$lastRead12.g12', '$firstRead12.g12']],
      // 'G_13' => ['$subtract' => ['$lastRead13.g13', '$firstRead13.g13']],
      // 'G_14' => ['$subtract' => ['$lastRead14.g14', '$firstRead14.g14']],
      // 'G_15' => ['$subtract' => ['$lastRead15.g15', '$firstRead15.g15']],
      // 'G_16' => ['$subtract' => ['$lastRead16.g16', '$firstRead16.g16']],
      // 'G_17' => ['$subtract' => ['$lastRead17.g17', '$firstRead17.g17']],
      // 'G_18' => ['$subtract' => ['$lastRead18.g18', '$firstRead18.g18']],
      // 'G_19' => ['$subtract' => ['$lastRead19.g19', '$firstRead19.g19']],
      // 'G_20' => ['$subtract' => ['$lastRead20.g20', '$firstRead20.g20']],
      // 'G_21' => ['$subtract' => ['$lastRead21.g21', '$firstRead21.g21']],
      // 'G_22' => ['$subtract' => ['$lastRead22.g22', '$firstRead22.g22']],
      // 'G_23' => ['$subtract' => ['$lastRead23.g23', '$firstRead23.g23']],
      // 'G_24' => ['$subtract' => ['$lastRead24.g24', '$firstRead24.g24']],
      // 'G_25' => ['$subtract' => ['$lastRead25.g25', '$firstRead25.g25']],
      // 'G_26' => ['$subtract' => ['$lastRead26.g26', '$firstRead26.g26']],
      // 'G_27' => ['$subtract' => ['$lastRead27.g27', '$firstRead27.g27']],
      // 'G_28' => ['$subtract' => ['$lastRead28.g28', '$firstRead28.g28']],
      // 'G_29' => ['$subtract' => ['$lastRead29.g29', '$firstRead29.g29']],
      // 'G_30' => ['$subtract' => ['$lastRead30.g30', '$firstRead30.g30']],
      // 'G_31' => ['$subtract' => ['$lastRead31.g31', '$firstRead31.g31']],
    ]],
  ]);
  $docs = $cursor->toArray();

  return $docs;
}
function fetchWeekly($monthStart, $monthEnd, $tag_values, $numberOfMeters)
{
  include('../mongodb_conn.php');
  $collection = $db->naubaharunit2_activetags;
  $monthStartUnix = GetUNIXday($monthStart);
  $monthEndUnix = GetUNIXday($monthEnd);
  $cursor = $collection->aggregate([
    [
      '$project' => [
        'UNIXtimestamp' => 1,
        $tag_values[0] => 1,
        $tag_values[1] => 1,
        $tag_values[2] => 1,
        // $tag_values[3] => 1,
        // $tag_values[4] => 1,
        // $tag_values[5] => 1,
        // $tag_values[6] => 1,
        // $tag_values[7] => 1,
        // $tag_values[8] => 1,
        // $tag_values[9] => 1,
        // $tag_values[10] => 1,
        // $tag_values[11] => 1,
        // $tag_values[12] => 1,
        // $tag_values[13] => 1,
        // $tag_values[14] => 1,
        // $tag_values[15] => 1,
        // $tag_values[16] => 1,
        // $tag_values[17] => 1,
        // $tag_values[18] => 1,
        // $tag_values[19] => 1,
        // $tag_values[20] => 1,
        // $tag_values[21] => 1,
        // $tag_values[22] => 1,
        // $tag_values[23] => 1,
        // $tag_values[24] => 1,
        // $tag_values[25] => 1,
        // $tag_values[26] => 1,
        // $tag_values[27] => 1,
        // $tag_values[28] => 1,
        // $tag_values[29] => 1
        // $tag_values[30] => 1
      ]
    ],
    ['$match' => ['UNIXtimestamp' => ['$gte' => $monthStartUnix, '$lte' => $monthEndUnix]]],
    ['$project' => [
      'UNIXtimestamp' => 1,
      'date' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]],
      'g1' => '$' . $tag_values[0],
      'g2' => '$' . $tag_values[1],
      'g3' => '$' . $tag_values[2],
      // 'g4' => '$' . $tag_values[3],
      // 'g5' => '$' . $tag_values[4],
      // 'g6' => '$' . $tag_values[5],
      // 'g7' => '$' . $tag_values[6],
      // 'g8' => '$' . $tag_values[7],
      // 'g9' => '$' . $tag_values[8],
      // 'g10' => '$' . $tag_values[9],
      // 'g11' => '$' . $tag_values[10],
      // 'g12' => '$' . $tag_values[11],
      // 'g13' => '$' . $tag_values[12],
      // 'g14' => '$' . $tag_values[13],
      // 'g15' => '$' . $tag_values[14],
      // 'g16' => '$' . $tag_values[15],
      // 'g17' => '$' . $tag_values[16],
      // 'g18' => '$' . $tag_values[17],
      // 'g19' => '$' . $tag_values[18],
      // 'g20' => '$' . $tag_values[19],
      // 'g21' => '$' . $tag_values[20],
      // 'g22' => '$' . $tag_values[21],
      // 'g23' => '$' . $tag_values[22],
      // 'g24' => '$' . $tag_values[23],
      // 'g25' => '$' . $tag_values[24],
      // 'g26' => '$' . $tag_values[25],
      // 'g27' => '$' . $tag_values[26],
      // 'g28' => '$' . $tag_values[27],
      // 'g29' => '$' . $tag_values[28],
      // 'g30' => '$' . $tag_values[29],
      // 'g31' => '$' . $tag_values[30],
    ]],
    ['$project' => [
      'UNIXtimestamp' => 1,
      'date' => ['$dateToString' => ['format' => '%Y-%m-%d', 'date' => '$date']],
      'g1' => 1,
      'g2' => 1,
      'g3' => 1,
      // 'g4' => 1,
      // 'g5' => 1,
      // 'g6' => 1,
      // 'g7' => 1,
      // 'g8' => 1,
      // 'g9' => 1,
      // 'g10' => 1,
      // 'g11' => 1,
      // 'g12' => 1,
      // 'g13' => 1,
      // 'g14' => 1,
      // 'g15' => 1,
      // 'g16' => 1,
      // 'g17' => 1,
      // 'g18' => 1,
      // 'g19' => 1,
      // 'g20' => 1,
      // 'g21' => 1,
      // 'g22' => 1,
      // 'g23' => 1,
      // 'g24' => 1,
      // 'g25' => 1,
      // 'g26' => 1,
      // 'g27' => 1,
      // 'g28' => 1,
      // 'g29' => 1,
      // 'g30' => 1,
      // 'g31' => 1,
    ]],
    ['$project' => [
      'date' => 1,
      'week' => ['$week' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'g1' => 1,
      'g2' => 1,
      'g3' => 1,
      // 'g4' => 1,
      // 'g5' => 1,
      // 'g6' => 1,
      // 'g7' => 1,
      // 'g8' => 1,
      // 'g9' => 1,
      // 'g10' => 1,
      // 'g11' => 1,
      // 'g12' => 1,
      // 'g13' => 1,
      // 'g14' => 1,
      // 'g15' => 1,
      // 'g16' => 1,
      // 'g17' => 1,
      // 'g18' => 1,
      // 'g19' => 1,
      // 'g20' => 1,
      // 'g21' => 1,
      // 'g22' => 1,
      // 'g23' => 1,
      // 'g24' => 1,
      // 'g25' => 1,
      // 'g26' => 1,
      // 'g27' => 1,
      // 'g28' => 1,
      // 'g29' => 1,
      // 'g30' => 1,
      // 'g31' => 1,
    ]],
    [
      '$group' => [
        '_id' => '$week',
        'document' => ['$push' => '$$ROOT'],
      ]
    ],
    ['$sort' => ['_id' => 1]],
    [
      '$project' => [
        'firstRead1' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g1', 0]]]]],
        'lastRead1' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g1', 0]]]]],
        'firstRead2' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g2', 0]]]]],
        'lastRead2' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g2', 0]]]]],
        'firstRead3' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g3', 0]]]]],
        'lastRead3' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g3', 0]]]]],
        // 'firstRead4' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g4', 0]]]]],
        // 'lastRead4' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g4', 0]]]]],
        // 'firstRead5' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g5', 0]]]]],
        // 'lastRead5' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g5', 0]]]]],
        // 'firstRead6' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g6', 0]]]]],
        // 'lastRead6' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g6', 0]]]]],
        // 'firstRead7' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g7', 0]]]]],
        // 'lastRead7' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g7', 0]]]]],
        // 'firstRead8' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g8', 0]]]]],
        // 'lastRead8' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g8', 0]]]]],
        // 'firstRead9' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g9', 0]]]]],
        // 'lastRead9' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g9', 0]]]]],
        // 'firstRead10' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g10', 0]]]]],
        // 'lastRead10' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g10', 0]]]]],
        // 'firstRead11' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g11', 0]]]]],
        // 'lastRead11' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g11', 0]]]]],
        // 'firstRead12' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g12', 0]]]]],
        // 'lastRead12' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g12', 0]]]]],
        // 'firstRead13' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g13', 0]]]]],
        // 'lastRead13' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g13', 0]]]]],
        // 'firstRead14' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g14', 0]]]]],
        // 'lastRead14' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g14', 0]]]]],
        // 'firstRead15' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g15', 0]]]]],
        // 'lastRead15' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g15', 0]]]]],
        // 'firstRead16' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g16', 0]]]]],
        // 'lastRead16' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g16', 0]]]]],
        // 'firstRead17' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g17', 0]]]]],
        // 'lastRead17' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g17', 0]]]]],
        // 'firstRead18' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g18', 0]]]]],
        // 'lastRead18' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g18', 0]]]]],
        // 'firstRead19' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g19', 0]]]]],
        // 'lastRead19' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g19', 0]]]]],
        // 'firstRead20' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g20', 0]]]]],
        // 'lastRead20' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g20', 0]]]]],
        // 'firstRead21' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g21', 0]]]]],
        // 'lastRead21' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g21', 0]]]]],
        // 'firstRead22' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g22', 0]]]]],
        // 'lastRead22' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g22', 0]]]]],
        // 'firstRead23' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g23', 0]]]]],
        // 'lastRead23' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g23', 0]]]]],
        // 'firstRead24' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g24', 0]]]]],
        // 'lastRead24' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g24', 0]]]]],
        // 'firstRead25' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g25', 0]]]]],
        // 'lastRead25' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g25', 0]]]]],
        // 'firstRead26' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g26', 0]]]]],
        // 'lastRead26' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g26', 0]]]]],
        // 'firstRead27' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g27', 0]]]]],
        // 'lastRead27' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g27', 0]]]]],
        // 'firstRead28' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g28', 0]]]]],
        // 'lastRead28' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g28', 0]]]]],
        // 'firstRead29' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g29', 0]]]]],
        // 'lastRead29' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g29', 0]]]]],
        // 'firstRead30' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g30', 0]]]]],
        // 'lastRead30' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g30', 0]]]]],
        // 'firstRead31' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g31', 0]]]]],
        // 'lastRead31' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g31', 0]]]]],
      ]
    ],
    ['$project' => [
      'day1' => '$firstRead1.date',
      '$firstRead2.date',
      '$firstRead3.date',
      // '$firstRead4.date',
      // '$firstRead5.date',
      // '$firstRead6.date',
      // '$firstRead7.date',
      // '$firstRead8.date',
      // '$firstRead9.date',
      // '$firstRead10.date',
      // '$firstRead11.date',
      // '$firstRead12.date',
      // '$firstRead13.date',
      // '$firstRead14.date',
      // '$firstRead15.date',
      // '$firstRead16.date',
      // '$firstRead17.date',
      // '$firstRead18.date',
      // '$firstRead19.date',
      // '$firstRead20.date',
      // '$firstRead21.date',
      // '$firstRead22.date',
      // '$firstRead23.date',
      // '$firstRead24.date',
      // '$firstRead25.date',
      // '$firstRead26.date',
      // '$firstRead27.date',
      // '$firstRead28.date',
      // '$firstRead29.date',
      // '$firstRead30.date',
      'day2' => '$lastRead1.date',
      '$lastRead2.date',
      '$lastRead3.date',
      // '$lastRead4.date',
      // '$lastRead5.date',
      // '$lastRead6.date',
      // '$lastRead7.date',
      // '$lastRead8.date',
      // '$lastRead9.date',
      // '$lastRead10.date',
      // '$lastRead11.date',
      // '$lastRead12.date',
      // '$lastRead13.date',
      // '$lastRead14.date',
      // '$lastRead15.date',
      // '$lastRead16.date',
      // '$lastRead17.date',
      // '$lastRead18.date',
      // '$lastRead19.date',
      // '$lastRead20.date',
      // '$lastRead21.date',
      // '$lastRead22.date',
      // '$lastRead23.date',
      // '$lastRead24.date',
      // '$lastRead25.date',
      // '$lastRead26.date',
      // '$lastRead27.date',
      // '$lastRead28.date',
      // '$lastRead29.date',
      // '$lastRead30.date',
      'G_1' => ['$subtract' => ['$lastRead1.g1', '$firstRead1.g1']],
      'G_2' => ['$subtract' => ['$lastRead2.g2', '$firstRead2.g2']],
      'G_3' => ['$subtract' => ['$lastRead3.g3', '$firstRead3.g3']],
      // 'G_4' => ['$subtract' => ['$lastRead4.g4', '$firstRead4.g4']],
      // 'G_5' => ['$subtract' => ['$lastRead5.g5', '$firstRead5.g5']],
      // 'G_6' => ['$subtract' => ['$lastRead6.g6', '$firstRead6.g6']],
      // 'G_7' => ['$subtract' => ['$lastRead7.g7', '$firstRead7.g7']],
      // 'G_8' => ['$subtract' => ['$lastRead8.g8', '$firstRead8.g8']],
      // 'G_9' => ['$subtract' => ['$lastRead9.g9', '$firstRead9.g9']],
      // 'G_10' => ['$subtract' => ['$lastRead10.g10', '$firstRead10.g10']],
      // 'G_11' => ['$subtract' => ['$lastRead11.g11', '$firstRead11.g11']],
      // 'G_12' => ['$subtract' => ['$lastRead12.g12', '$firstRead12.g12']],
      // 'G_13' => ['$subtract' => ['$lastRead13.g13', '$firstRead13.g13']],
      // 'G_14' => ['$subtract' => ['$lastRead14.g14', '$firstRead14.g14']],
      // 'G_15' => ['$subtract' => ['$lastRead15.g15', '$firstRead15.g15']],
      // 'G_16' => ['$subtract' => ['$lastRead16.g16', '$firstRead16.g16']],
      // 'G_17' => ['$subtract' => ['$lastRead17.g17', '$firstRead17.g17']],
      // 'G_18' => ['$subtract' => ['$lastRead18.g18', '$firstRead18.g18']],
      // 'G_19' => ['$subtract' => ['$lastRead19.g19', '$firstRead19.g19']],
      // 'G_20' => ['$subtract' => ['$lastRead20.g20', '$firstRead20.g20']],
      // 'G_21' => ['$subtract' => ['$lastRead21.g21', '$firstRead21.g21']],
      // 'G_22' => ['$subtract' => ['$lastRead22.g22', '$firstRead22.g22']],
      // 'G_23' => ['$subtract' => ['$lastRead23.g23', '$firstRead23.g23']],
      // 'G_24' => ['$subtract' => ['$lastRead24.g24', '$firstRead24.g24']],
      // 'G_25' => ['$subtract' => ['$lastRead25.g25', '$firstRead25.g25']],
      // 'G_26' => ['$subtract' => ['$lastRead26.g26', '$firstRead26.g26']],
      // 'G_27' => ['$subtract' => ['$lastRead27.g27', '$firstRead27.g27']],
      // 'G_28' => ['$subtract' => ['$lastRead28.g28', '$firstRead28.g28']],
      // 'G_29' => ['$subtract' => ['$lastRead29.g29', '$firstRead29.g29']],
      // 'G_30' => ['$subtract' => ['$lastRead30.g30', '$firstRead30.g30']],
      // 'G_31' => ['$subtract' => ['$lastRead31.g31', '$firstRead31.g31']],

    ]],
  ]);
  $docs = $cursor->toArray();
  return $docs;
}
function fetchDayWise($date, $tag_values, $numberOfMeters, $value)
{
  include('../mongodb_conn.php');
  $collection = $db->naubaharunit2_activetags;
  $day = date('d', strtotime($date));
  $day = intval($day);
  $month = date('m', strtotime($date));
  $month = intval($month);
  $year = date('Y', strtotime($date));
  $year = intval($year);
  $currentDayUNIX = GetUNIXday($date);

  $cursor = $collection->aggregate([
    [
      '$project' => [
        'UNIXtimestamp' => 1,
        $tag_values[0] => 1,
        $tag_values[1] => 1,
        $tag_values[2] => 1,
        // $tag_values[3] => 1,
        // $tag_values[4] => 1,
        // $tag_values[5] => 1,
        // $tag_values[6] => 1,
        // $tag_values[7] => 1,
        // $tag_values[8] => 1,
        // $tag_values[9] => 1,
        // $tag_values[10] => 1,
        // $tag_values[11] => 1,
        // $tag_values[12] => 1,
        // $tag_values[13] => 1,
        // $tag_values[14] => 1,
        // $tag_values[15] => 1,
        // $tag_values[16] => 1,
        // $tag_values[17] => 1,
        // $tag_values[18] => 1,
        // $tag_values[19] => 1,
        // $tag_values[20] => 1,
        // $tag_values[21] => 1,
        // $tag_values[22] => 1,
        // $tag_values[23] => 1,
        // $tag_values[24] => 1,
        // $tag_values[25] => 1,
        // $tag_values[26] => 1,
        // $tag_values[27] => 1,
        // $tag_values[28] => 1,
        // $tag_values[29] => 1
        // $tag_values[30] => 1
      ]
    ],
    ['$match' => ['UNIXtimestamp' => ['$gte' => $currentDayUNIX]]],
    ['$project' => [
      'g1' => '$' . $tag_values[0],
      'g2' => '$' . $tag_values[1],
      'g3' => '$' . $tag_values[2],
      // 'g4' => '$' . $tag_values[3],
      // 'g5' => '$' . $tag_values[4],
      // 'g6' => '$' . $tag_values[5],
      // 'g7' => '$' . $tag_values[6],
      // 'g8' => '$' . $tag_values[7],
      // 'g9' => '$' . $tag_values[8],
      // 'g10' => '$' . $tag_values[9],
      // 'g11' => '$' . $tag_values[10],
      // 'g12' => '$' . $tag_values[11],
      // 'g13' => '$' . $tag_values[12],
      // 'g14' => '$' . $tag_values[13],
      // 'g15' => '$' . $tag_values[14],
      // 'g16' => '$' . $tag_values[15],
      // 'g17' => '$' . $tag_values[16],
      // 'g18' => '$' . $tag_values[17],
      // 'g19' => '$' . $tag_values[18],
      // 'g20' => '$' . $tag_values[19],
      // 'g21' => '$' . $tag_values[20],
      // 'g22' => '$' . $tag_values[21],
      // 'g23' => '$' . $tag_values[22],
      // 'g24' => '$' . $tag_values[23],
      // 'g25' => '$' . $tag_values[24],
      // 'g26' => '$' . $tag_values[25],
      // 'g27' => '$' . $tag_values[26],
      // 'g28' => '$' . $tag_values[27],
      // 'g29' => '$' . $tag_values[28],
      // 'g30' => '$' . $tag_values[29],
      // 'g31' => '$' . $tag_values[30],
      'day' => ['$dayOfMonth' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'month' => ['$month' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'year' => ['$year' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'day1' => ['$dayOfWeek' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
    ]],
    ['$match' => ['day' => $day]],
    ['$group' => [
      '_id' => ['year' => '$year', 'month' => '$month', 'date' => '$day', 'day' => '$day1'],
      'document' => ['$push' => '$$ROOT']
    ]],
    [
      '$project' => [
        'firstRead1' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g1', 0]]]]],
        'lastRead1' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g1', 0]]]]],
        'firstRead2' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g2', 0]]]]],
        'lastRead2' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g2', 0]]]]],
        'firstRead3' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g3', 0]]]]],
        'lastRead3' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g3', 0]]]]],
        // 'firstRead4' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g4', 0]]]]],
        // 'lastRead4' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g4', 0]]]]],
        // 'firstRead5' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g5', 0]]]]],
        // 'lastRead5' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g5', 0]]]]],
        // 'firstRead6' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g6', 0]]]]],
        // 'lastRead6' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g6', 0]]]]],
        // 'firstRead7' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g7', 0]]]]],
        // 'lastRead7' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g7', 0]]]]],
        // 'firstRead8' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g8', 0]]]]],
        // 'lastRead8' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g8', 0]]]]],
        // 'firstRead9' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g9', 0]]]]],
        // 'lastRead9' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g9', 0]]]]],
        // 'firstRead10' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g10', 0]]]]],
        // 'lastRead10' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g10', 0]]]]],
        // 'firstRead11' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g11', 0]]]]],
        // 'lastRead11' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g11', 0]]]]],
        // 'firstRead12' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g12', 0]]]]],
        // 'lastRead12' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g12', 0]]]]],
        // 'firstRead13' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g13', 0]]]]],
        // 'lastRead13' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g13', 0]]]]],
        // 'firstRead14' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g14', 0]]]]],
        // 'lastRead14' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g14', 0]]]]],
        // 'firstRead15' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g15', 0]]]]],
        // 'lastRead15' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g15', 0]]]]],
        // 'firstRead16' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g16', 0]]]]],
        // 'lastRead16' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g16', 0]]]]],
        // 'firstRead17' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g17', 0]]]]],
        // 'lastRead17' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g17', 0]]]]],
        // 'firstRead18' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g18', 0]]]]],
        // 'lastRead18' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g18', 0]]]]],
        // 'firstRead19' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g19', 0]]]]],
        // 'lastRead19' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g19', 0]]]]],
        // 'firstRead20' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g20', 0]]]]],
        // 'lastRead20' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g20', 0]]]]],
        // 'firstRead21' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g21', 0]]]]],
        // 'lastRead21' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g21', 0]]]]],
        // 'firstRead22' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g22', 0]]]]],
        // 'lastRead22' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g22', 0]]]]],
        // 'firstRead23' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g23', 0]]]]],
        // 'lastRead23' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g23', 0]]]]],
        // 'firstRead24' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g24', 0]]]]],
        // 'lastRead24' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g24', 0]]]]],
        // 'firstRead25' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g25', 0]]]]],
        // 'lastRead25' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g25', 0]]]]],
        // 'firstRead26' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g26', 0]]]]],
        // 'lastRead26' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g26', 0]]]]],
        // 'firstRead27' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g27', 0]]]]],
        // 'lastRead27' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g27', 0]]]]],
        // 'firstRead28' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g28', 0]]]]],
        // 'lastRead28' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g28', 0]]]]],
        // 'firstRead29' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g29', 0]]]]],
        // 'lastRead29' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g29', 0]]]]],
        // 'firstRead30' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g30', 0]]]]],
        // 'lastRead30' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g30', 0]]]]],
        // 'firstRead31' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g31', 0]]]]],
        // 'lastRead31' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.g31', 0]]]]],
      ]
    ],
    ['$project' => [
      'G_1' => ['$subtract' => ['$lastRead1.g1', '$firstRead1.g1']],
      'G_2' => ['$subtract' => ['$lastRead2.g2', '$firstRead2.g2']],
      'G_3' => ['$subtract' => ['$lastRead3.g3', '$firstRead3.g3']],
      // 'G_4' => ['$subtract' => ['$lastRead4.g4', '$firstRead4.g4']],
      // 'G_5' => ['$subtract' => ['$lastRead5.g5', '$firstRead5.g5']],
      // 'G_6' => ['$subtract' => ['$lastRead6.g6', '$firstRead6.g6']],
      // 'G_7' => ['$subtract' => ['$lastRead7.g7', '$firstRead7.g7']],
      // 'G_8' => ['$subtract' => ['$lastRead8.g8', '$firstRead8.g8']],
      // 'G_9' => ['$subtract' => ['$lastRead9.g9', '$firstRead9.g9']],
      // 'G_10' => ['$subtract' => ['$lastRead10.g10', '$firstRead10.g10']],
      // 'G_11' => ['$subtract' => ['$lastRead11.g11', '$firstRead11.g11']],
      // 'G_12' => ['$subtract' => ['$lastRead12.g12', '$firstRead12.g12']],
      // 'G_13' => ['$subtract' => ['$lastRead13.g13', '$firstRead13.g13']],
      // 'G_14' => ['$subtract' => ['$lastRead14.g14', '$firstRead14.g14']],
      // 'G_15' => ['$subtract' => ['$lastRead15.g15', '$firstRead15.g15']],
      // 'G_16' => ['$subtract' => ['$lastRead16.g16', '$firstRead16.g16']],
      // 'G_17' => ['$subtract' => ['$lastRead17.g17', '$firstRead17.g17']],
      // 'G_18' => ['$subtract' => ['$lastRead18.g18', '$firstRead18.g18']],
      // 'G_19' => ['$subtract' => ['$lastRead19.g19', '$firstRead19.g19']],
      // 'G_20' => ['$subtract' => ['$lastRead20.g20', '$firstRead20.g20']],
      // 'G_21' => ['$subtract' => ['$lastRead21.g21', '$firstRead21.g21']],
      // 'G_22' => ['$subtract' => ['$lastRead22.g22', '$firstRead22.g22']],
      // 'G_23' => ['$subtract' => ['$lastRead23.g23', '$firstRead23.g23']],
      // 'G_24' => ['$subtract' => ['$lastRead24.g24', '$firstRead24.g24']],
      // 'G_25' => ['$subtract' => ['$lastRead25.g25', '$firstRead25.g25']],
      // 'G_26' => ['$subtract' => ['$lastRead26.g26', '$firstRead26.g26']],
      // 'G_27' => ['$subtract' => ['$lastRead27.g27', '$firstRead27.g27']],
      // 'G_28' => ['$subtract' => ['$lastRead28.g28', '$firstRead28.g28']],
      // 'G_29' => ['$subtract' => ['$lastRead29.g29', '$firstRead29.g29']],
      // 'G_30' => ['$subtract' => ['$lastRead30.g30', '$firstRead30.g30']],
      // 'G_31' => ['$subtract' => ['$lastRead31.g31', '$firstRead31.g31']],
    ]],
  ]);
  $docs = $cursor->toArray();
  $index = 0;
  foreach ($docs as $document) {
    json_encode($document);
    // var_dump($document);
    if ($document['_id']['day'] == 1) {
      $array[] = array(
        'Days' =>  'Su',
        $value => $document['G_1'] + $document['G_2'] + $document['G_3'] + $document['G_4'] + $document['G_5'] + $document['G_6'] + $document['G_7'] + $document['G_8'] + $document['G_9'] + $document['G_10'] + $document['G_11'] + $document['G_12'] + $document['G_13'] + $document['G_14'] + $document['G_15'] + $document['G_16'] + $document['G_17'] + $document['G_18'] + $document['G_19'] + $document['G_20'] + $document['G_21'] + $document['G_22'] + $document['G_23'] + $document['G_24'] + $document['G_25'] + $document['G_26'] + $document['G_27'] + $document['G_28'] + $document['G_29'] + $document['G_30']
      );
    } else if ($document['_id']['day'] == 2) {
      $array[] = array(
        'Days' =>  'Mon',
        $value => $document['G_1'] + $document['G_2'] + $document['G_3'] + $document['G_4'] + $document['G_5'] + $document['G_6'] + $document['G_7'] + $document['G_8'] + $document['G_9'] + $document['G_10'] + $document['G_11'] + $document['G_12'] + $document['G_13'] + $document['G_14'] + $document['G_15'] + $document['G_16'] + $document['G_17'] + $document['G_18'] + $document['G_19'] + $document['G_20'] + $document['G_21'] + $document['G_22'] + $document['G_23'] + $document['G_24'] + $document['G_25'] + $document['G_26'] + $document['G_27'] + $document['G_28'] + $document['G_29'] + $document['G_30']
      );
    } else if ($document['_id']['day'] == 3) {
      $array[] = array(
        'Days' =>  'Tue',
        $value => $document['G_1'] + $document['G_2'] + $document['G_3'] + $document['G_4'] + $document['G_5'] + $document['G_6'] + $document['G_7'] + $document['G_8'] + $document['G_9'] + $document['G_10'] + $document['G_11'] + $document['G_12'] + $document['G_13'] + $document['G_14'] + $document['G_15'] + $document['G_16'] + $document['G_17'] + $document['G_18'] + $document['G_19'] + $document['G_20'] + $document['G_21'] + $document['G_22'] + $document['G_23'] + $document['G_24'] + $document['G_25'] + $document['G_26'] + $document['G_27'] + $document['G_28'] + $document['G_29'] + $document['G_30']
      );
    } else if ($document['_id']['day'] == 4) {
      $array[] = array(
        'Days' =>  'Wed',
        $value => $document['G_1'] + $document['G_2'] + $document['G_3'] + $document['G_4'] + $document['G_5'] + $document['G_6'] + $document['G_7'] + $document['G_8'] + $document['G_9'] + $document['G_10'] + $document['G_11'] + $document['G_12'] + $document['G_13'] + $document['G_14'] + $document['G_15'] + $document['G_16'] + $document['G_17'] + $document['G_18'] + $document['G_19'] + $document['G_20'] + $document['G_21'] + $document['G_22'] + $document['G_23'] + $document['G_24'] + $document['G_25'] + $document['G_26'] + $document['G_27'] + $document['G_28'] + $document['G_29'] + $document['G_30']
      );
    } else if ($document['_id']['day'] == 5) {
      $array[] = array(
        'Days' =>  'Thur',
        $value => $document['G_1'] + $document['G_2'] + $document['G_3'] + $document['G_4'] + $document['G_5'] + $document['G_6'] + $document['G_7'] + $document['G_8'] + $document['G_9'] + $document['G_10'] + $document['G_11'] + $document['G_12'] + $document['G_13'] + $document['G_14'] + $document['G_15'] + $document['G_16'] + $document['G_17'] + $document['G_18'] + $document['G_19'] + $document['G_20'] + $document['G_21'] + $document['G_22'] + $document['G_23'] + $document['G_24'] + $document['G_25'] + $document['G_26'] + $document['G_27'] + $document['G_28'] + $document['G_29'] + $document['G_30']
      );
    } else if ($document['_id']['day'] == 6) {
      $array[] = array(
        'Days' =>  'Fri',
        $value => $document['G_1'] + $document['G_2'] + $document['G_3'] + $document['G_4'] + $document['G_5'] + $document['G_6'] + $document['G_7'] + $document['G_8'] + $document['G_9'] + $document['G_10'] + $document['G_11'] + $document['G_12'] + $document['G_13'] + $document['G_14'] + $document['G_15'] + $document['G_16'] + $document['G_17'] + $document['G_18'] + $document['G_19'] + $document['G_20'] + $document['G_21'] + $document['G_22'] + $document['G_23'] + $document['G_24'] + $document['G_25'] + $document['G_26'] + $document['G_27'] + $document['G_28'] + $document['G_29'] + $document['G_30']
      );
    } else if ($document['_id']['day'] == 7) {
      $array[] = array(
        'Days' =>  'Sat',
        $value => $document['G_1'] + $document['G_2'] + $document['G_3'] + $document['G_4'] + $document['G_5'] + $document['G_6'] + $document['G_7'] + $document['G_8'] + $document['G_9'] + $document['G_10'] + $document['G_11'] + $document['G_12'] + $document['G_13'] + $document['G_14'] + $document['G_15'] + $document['G_16'] + $document['G_17'] + $document['G_18'] + $document['G_19'] + $document['G_20'] + $document['G_21'] + $document['G_22'] + $document['G_23'] + $document['G_24'] + $document['G_25'] + $document['G_26'] + $document['G_27'] + $document['G_28'] + $document['G_29'] + $document['G_30']
      );
    }
  }
  return $array;
}
if ($value == 'today') {
  $start_date = date('Y-n-j', strtotime($current_date));
  // $data has current day hours
  $data = fetchHourly($start_date, $tag_values, $numberOfMeters, 1);
  $start_date = date('Y-n-j', strtotime($current_date . ' -1 day'));
  // $data1 has previous day hours
  $data1 = fetchHourly($start_date, $tag_values, $numberOfMeters, 2);
  $size1 = sizeof($data);
  $size2 = sizeof($data1);
  $size = max($size1, $size2);
  $size = intval($size);
  // echo '<pre>',print_r($data),'</pre>';
  // echo '<pre>',print_r($data1),'</pre>';

  for ($i = 0; $i < $size; $i++) {
    // this if condition tells to print values at the same hour but previous day will always have values greater then current day 
    // because the previous day is completed but current day is still going 
    if ($data1[$i]['_id']['hour'] == $data[$i]['_id']['hour']) {
      // replaces null values with zeros
      if ($data1[$i]['G_1'] + $data1[$i]['G_2'] + $data1[$i]['G_3'] + $data1[$i]['G_4'] + $data1[$i]['G_5'] + $data1[$i]['G_6'] + $data1[$i]['G_7'] + $data1[$i]['G_8'] + $data1[$i]['G_9'] + $data1[$i]['G_10'] + $data1[$i]['G_11'] + $data1[$i]['G_12'] + $data1[$i]['G_13'] + $data1[$i]['G_14'] + $data1[$i]['G_15'] + $data1[$i]['G_16'] + $data1[$i]['G_17'] + $data1[$i]['G_18'] + $data1[$i]['G_19'] + $data1[$i]['G_20'] + $data1[$i]['G_21'] + $data1[$i]['G_22'] + $data1[$i]['G_23'] + $data1[$i]['G_24'] + $data1[$i]['G_25'] + $data1[$i]['G_26'] + $data1[$i]['G_27'] + $data1[$i]['G_28'] + $data1[$i]['G_29'] + $data1[$i]['G_30'] + $data1[$i]['G_31'] == null && $data[$i]['G_1'] + $data[$i]['G_2'] + $data[$i]['G_3'] + $data[$i]['G_4'] + $data[$i]['G_5'] + $data[$i]['G_6'] + $data[$i]['G_7'] + $data[$i]['G_8'] + $data[$i]['G_9'] + $data[$i]['G_10'] + $data[$i]['G_11'] + $data[$i]['G_12'] + $data[$i]['G_13'] + $data[$i]['G_14'] + $data[$i]['G_15'] + $data[$i]['G_16'] + $data[$i]['G_17'] + $data[$i]['G_18'] + $data[$i]['G_19'] + $data[$i]['G_20'] + $data[$i]['G_21'] + $data[$i]['G_22'] + $data[$i]['G_23'] + $data[$i]['G_24'] + $data[$i]['G_25'] + $data[$i]['G_26'] + $data[$i]['G_27'] + $data[$i]['G_28'] + $data[$i]['G_29'] + $data[$i]['G_30'] == null) {
        $array[] = array(
          'Time' =>  $data[$i]['_id']['hour'] . ':00',
          'Yesterday' => 0,
          'Today' => 0,
        );
      } elseif ($data[$i]['G_1'] + $data[$i]['G_2'] + $data[$i]['G_3'] + $data[$i]['G_4'] + $data[$i]['G_5'] + $data[$i]['G_6'] + $data[$i]['G_7'] + $data[$i]['G_8'] + $data[$i]['G_9'] + $data[$i]['G_10'] + $data[$i]['G_11'] + $data[$i]['G_12'] + $data[$i]['G_13'] + $data[$i]['G_14'] + $data[$i]['G_15'] + $data[$i]['G_16'] + $data[$i]['G_17'] + $data[$i]['G_18'] + $data[$i]['G_19'] + $data[$i]['G_20'] + $data[$i]['G_21'] + $data[$i]['G_22'] + $data[$i]['G_23'] + $data[$i]['G_24'] + $data[$i]['G_25'] + $data[$i]['G_26'] + $data[$i]['G_27'] + $data[$i]['G_28'] + $data[$i]['G_29'] + $data[$i]['G_30'] == null) {
        $array[] = array(
          'Time' =>  $data[$i]['_id']['hour'] . ':00',
          'Yesterday' => $data1[$i]['G_1'] + $data1[$i]['G_2'] + $data1[$i]['G_3'] + $data1[$i]['G_4'] + $data1[$i]['G_5'] + $data1[$i]['G_6'] + $data1[$i]['G_7'] + $data1[$i]['G_8'] + $data1[$i]['G_9'] + $data1[$i]['G_10'] + $data1[$i]['G_11'] + $data1[$i]['G_12'] + $data1[$i]['G_13'] + $data1[$i]['G_14'] + $data1[$i]['G_15'] + $data1[$i]['G_16'] + $data1[$i]['G_17'] + $data1[$i]['G_18'] + $data1[$i]['G_19'] + $data1[$i]['G_20'] + $data1[$i]['G_21'] + $data1[$i]['G_22'] + $data1[$i]['G_23'] + $data1[$i]['G_24'] + $data1[$i]['G_25'] + $data1[$i]['G_26'] + $data1[$i]['G_26'] + $data1[$i]['G_27'] + $data1[$i]['G_28'] + $data1[$i]['G_29'] + $data1[$i]['G_30'],
          'Today' => 0,
        );
      } elseif ($data1[$i]['G_1'] + $data1[$i]['G_2'] + $data1[$i]['G_3'] + $data1[$i]['G_4'] + $data1[$i]['G_5'] + $data1[$i]['G_6'] + $data1[$i]['G_7'] + $data1[$i]['G_8'] + $data1[$i]['G_9'] + $data1[$i]['G_10'] + $data1[$i]['G_11'] + $data1[$i]['G_12'] + $data1[$i]['G_13'] + $data1[$i]['G_14'] + $data1[$i]['G_15'] + $data1[$i]['G_16'] + $data1[$i]['G_17'] + $data1[$i]['G_18'] + $data1[$i]['G_19'] + $data1[$i]['G_20'] + $data1[$i]['G_21'] + $data1[$i]['G_22'] + $data1[$i]['G_23'] + $data1[$i]['G_24'] + $data1[$i]['G_25'] + $data1[$i]['G_26'] + $data1[$i]['G_26'] + $data1[$i]['G_27'] + $data1[$i]['G_28'] + $data1[$i]['G_29'] + $data1[$i]['G_30'] == null) {
        $array[] = array(
          'Time' =>  $data[$i]['_id']['hour'] . ':00',
          'Yesterday' => 0,
          'Today' => $data[$i]['G_1'] + $data[$i]['G_2'] + $data[$i]['G_3'] + $data[$i]['G_4'] + $data[$i]['G_5'] + $data[$i]['G_6'] + $data[$i]['G_7'] + $data[$i]['G_8'] + $data[$i]['G_9'] + $data[$i]['G_10'] + $data[$i]['G_11'] + $data[$i]['G_12'] + $data[$i]['G_13'] + $data[$i]['G_14'] + $data[$i]['G_15'] + $data[$i]['G_16'] + $data[$i]['G_17'] + $data[$i]['G_18'] + $data[$i]['G_19'] + $data[$i]['G_20'] + $data[$i]['G_21'] + $data[$i]['G_22'] + $data[$i]['G_23'] + $data[$i]['G_24'] + $data[$i]['G_25'] + $data[$i]['G_26'] + $data[$i]['G_27'] + $data[$i]['G_28'] + $data[$i]['G_29'] + $data[$i]['G_30'],
        );
      }
      // assigns if both values are not null
      else {
        $array[] = array(
          'Time' =>  $data[$i]['_id']['hour'] . ':00',
          'Yesterday' => $data1[$i]['G_1'] + $data1[$i]['G_2'] + $data1[$i]['G_3'] + $data1[$i]['G_4'] + $data1[$i]['G_5'] + $data1[$i]['G_6'] + $data1[$i]['G_7'] + $data1[$i]['G_8'] + $data1[$i]['G_9'] + $data1[$i]['G_10'] + $data1[$i]['G_11'] + $data1[$i]['G_12'] + $data1[$i]['G_13'] + $data1[$i]['G_14'] + $data1[$i]['G_15'] + $data1[$i]['G_16'] + $data1[$i]['G_17'] + $data1[$i]['G_18'] + $data1[$i]['G_19'] + $data1[$i]['G_20'] + $data1[$i]['G_21'] + $data1[$i]['G_22'] + $data1[$i]['G_23'] + $data1[$i]['G_24'] + $data1[$i]['G_25'] + $data1[$i]['G_26'] + $data1[$i]['G_27'] + $data1[$i]['G_28'] + $data1[$i]['G_29'] + $data1[$i]['G_30'],
          'Today' => $data[$i]['G_1'] + $data[$i]['G_2'] + $data[$i]['G_3'] + $data[$i]['G_4'] + $data[$i]['G_5'] + $data[$i]['G_6'] + $data[$i]['G_7'] + $data[$i]['G_8'] + $data[$i]['G_9'] + $data[$i]['G_10'] + $data[$i]['G_11'] + $data[$i]['G_12'] + $data[$i]['G_13'] + $data[$i]['G_14'] + $data[$i]['G_15'] + $data[$i]['G_16'] + $data[$i]['G_17'] + $data[$i]['G_18'] + $data[$i]['G_19'] + $data[$i]['G_20'] + $data[$i]['G_21'] + $data[$i]['G_22'] + $data[$i]['G_23'] + $data[$i]['G_24'] + $data[$i]['G_25'] + $data[$i]['G_26'] + $data[$i]['G_27'] + $data[$i]['G_28'] + $data[$i]['G_29'] + $data[$i]['G_30'],
        );
      }
    }
    // when previous event has happened but the current event is yet to happen 
    elseif ($data1[$i]['_id']['hour'] != $data[$i]['_id']['hour']) {
      $array[] = array(
        'Time' =>  $data1[$i]['_id']['hour'] . ':00',
        'Yesterday' => $data1[$i]['G_1'] + $data1[$i]['G_2'] + $data1[$i]['G_3'] + $data1[$i]['G_4'] + $data1[$i]['G_5'] + $data1[$i]['G_6'] + $data1[$i]['G_7'] + $data1[$i]['G_8'] + $data1[$i]['G_9'] + $data1[$i]['G_10'] + $data1[$i]['G_11'] + $data1[$i]['G_12'] + $data1[$i]['G_13'] + $data1[$i]['G_14'] + $data1[$i]['G_15'] + $data1[$i]['G_16'] + $data1[$i]['G_17'] + $data1[$i]['G_18'] + $data1[$i]['G_19'] + $data1[$i]['G_20'] + $data1[$i]['G_21'] + $data1[$i]['G_22'] + $data1[$i]['G_23'] + $data1[$i]['G_24'] + $data1[$i]['G_25'] + $data1[$i]['G_26'] + $data1[$i]['G_27'] + $data1[$i]['G_28'] + $data1[$i]['G_29'] + $data1[$i]['G_30'],
        'Today' => 0,
      );
    }
  }
} elseif ($value == 'month') {
  $m1 = date('n', strtotime($current_date));
  $y1 = date('Y', strtotime($current_date));
  $m2 = date('n', strtotime($current_date . ' +1 month'));
  $y2 = date('Y', strtotime($current_date . ' +1 month'));
  $m3 = date('n', strtotime($current_date . ' -1 month'));

  $start_date = $y1 . '-' . $m1 . '-1';
  $end_date = $y2 . '-' . $m2 . '-1';

  $data = fetchWeekly($start_date, $end_date, $tag_values, $numberOfMeters);
  $m1 = date('n', strtotime($current_date));
  $y1 = date('Y', strtotime($current_date));
  $d = cal_days_in_month(CAL_GREGORIAN, $m3, $y1);
  $p = strtotime($current_date . ' -' . $d . ' days');
  $m2 = date('n', $p);
  $y2 = date('Y', $p);
  $start_date = $y2 . '-' . $m2 . '-1';
  $end_date = $y1 . '-' . $m1 . '-1';
  $data1 = fetchWeekly($start_date, $end_date, $tag_values, $numberOfMeters);
  $size1 = sizeof($data);
  $size2 = sizeof($data1);
  $size = max($size1, $size2);
  $size = intval($size);
  $no = 1;
  // var_dump($data);
  for ($i = 0; $i < $size; $i++) {
    // $array[] = array(
    //   'Weeks' =>  'Week'.$no,
    //   'Last Month' => $data1[$i]['kWh0'],
    //   'This Month' => $data[$i]['kWh0']
    //  );
    // replaces null values with zeros
    if ($data[$i]['G_1'] + $data[$i]['G_2'] + $data[$i]['G_3'] + $data[$i]['G_4'] + $data[$i]['G_5'] + $data[$i]['G_6'] + $data[$i]['G_7'] + $data[$i]['G_8'] + $data[$i]['G_9'] + $data[$i]['G_10'] + $data[$i]['G_11'] + $data[$i]['G_12'] + $data[$i]['G_13'] + $data[$i]['G_14'] + $data[$i]['G_15'] + $data[$i]['G_16'] + $data[$i]['G_17'] + $data[$i]['G_18'] + $data[$i]['G_19'] + $data[$i]['G_20'] + $data[$i]['G_21'] + $data[$i]['G_22'] + $data[$i]['G_23'] + $data[$i]['G_24'] + $data[$i]['G_25'] + $data[$i]['G_26'] + $data[$i]['G_27'] + $data[$i]['G_28'] + $data[$i]['G_29'] + $data[$i]['G_30'] == null && $data1[$i]['G_1'] + $data1[$i]['G_2'] + $data1[$i]['G_3'] + $data1[$i]['G_4'] + $data1[$i]['G_5'] + $data1[$i]['G_6'] + $data1[$i]['G_7'] + $data1[$i]['G_8'] + $data1[$i]['G_9'] + $data1[$i]['G_10'] + $data1[$i]['G_11'] + $data1[$i]['G_12'] + $data1[$i]['G_13'] + $data1[$i]['G_14'] + $data1[$i]['G_15'] + $data1[$i]['G_16'] + $data1[$i]['G_17'] + $data1[$i]['G_18'] + $data1[$i]['G_19'] + $data1[$i]['G_20'] + $data1[$i]['G_21'] + $data1[$i]['G_22'] + $data1[$i]['G_23'] + $data1[$i]['G_24'] + $data1[$i]['G_25'] + $data1[$i]['G_26'] + $data1[$i]['G_27'] + $data1[$i]['G_28'] + $data1[$i]['G_29'] + $data1[$i]['G_30'] == null) {
      $array[] = array(
        'Weeks' =>  'Week' . $no,
        'Last Month' => 0,
        'This Month' => 0
      );
    } elseif ($data[$i]['G_1'] + $data[$i]['G_2'] + $data[$i]['G_3'] + $data[$i]['G_4'] + $data[$i]['G_5'] + $data[$i]['G_6'] + $data[$i]['G_7'] + $data[$i]['G_8'] + $data[$i]['G_9'] + $data[$i]['G_10'] + $data[$i]['G_11'] + $data[$i]['G_12'] + $data[$i]['G_13'] + $data[$i]['G_14'] + $data[$i]['G_15'] + $data[$i]['G_16'] + $data[$i]['G_17'] + $data[$i]['G_18'] + $data[$i]['G_19'] + $data[$i]['G_20'] + $data[$i]['G_21'] + $data[$i]['G_22'] + $data[$i]['G_23'] + $data[$i]['G_24'] + $data[$i]['G_25'] + $data[$i]['G_26'] + $data[$i]['G_27'] + $data[$i]['G_28'] + $data[$i]['G_29'] + $data[$i]['G_30'] == null) {
      $array[] = array(
        'Weeks' =>  'Week' . $no,
        'Last Month' => $data1[$i]['G_1'] + $data1[$i]['G_2'] + $data1[$i]['G_3'] + $data1[$i]['G_4'] + $data1[$i]['G_5'] + $data1[$i]['G_6'] + $data1[$i]['G_7'] + $data1[$i]['G_8'] + $data1[$i]['G_9'] + $data1[$i]['G_10'] + $data1[$i]['G_11'] + $data1[$i]['G_12'] + $data1[$i]['G_13'] + $data1[$i]['G_14'] + $data1[$i]['G_15'] + $data1[$i]['G_16'] + $data1[$i]['G_17'] + $data1[$i]['G_18'] + $data1[$i]['G_19'] + $data1[$i]['G_20'] + $data1[$i]['G_21'] + $data1[$i]['G_22'] + $data1[$i]['G_23'] + $data1[$i]['G_24'] + $data1[$i]['G_25'] + $data1[$i]['G_26'] + $data1[$i]['G_27'] + $data1[$i]['G_28'] + $data1[$i]['G_29'] + $data1[$i]['G_30'],
        'This Month' => 0
      );
    } elseif ($data1[$i]['kWh0'] == null) {
      $array[] = array(
        'Weeks' =>  'Week' . $no,
        'Last Month' => 0,
        'This Month' => $data[$i]['G_1'] + $data[$i]['G_2'] + $data[$i]['G_3'] + $data[$i]['G_4'] + $data[$i]['G_5'] + $data[$i]['G_6'] + $data[$i]['G_7'] + $data[$i]['G_8'] + $data[$i]['G_9'] + $data[$i]['G_10'] + $data[$i]['G_11'] + $data[$i]['G_12'] + $data[$i]['G_13'] + $data[$i]['G_14'] + $data[$i]['G_15'] + $data[$i]['G_16'] + $data[$i]['G_17'] + $data[$i]['G_18'] + $data[$i]['G_19'] + $data[$i]['G_20'] + $data[$i]['G_21'] + $data[$i]['G_22'] + $data[$i]['G_23'] + $data[$i]['G_24'] + $data[$i]['G_25'] + $data[$i]['G_26'] + $data[$i]['G_27'] + $data[$i]['G_28'] + $data[$i]['G_29'] + $data[$i]['G_30']
      );
    }
    // assigns if both values are not null
    else {
      $array[] = array(
        'Weeks' =>  'Week' . $no,
        'Last Month' => $data1[$i]['G_1'] + $data1[$i]['G_2'] + $data1[$i]['G_3'] + $data1[$i]['G_4'] + $data1[$i]['G_5'] + $data1[$i]['G_6'] + $data1[$i]['G_7'] + $data1[$i]['G_8'] + $data1[$i]['G_9'] + $data1[$i]['G_10'] + $data1[$i]['G_11'] + $data1[$i]['G_12'] + $data1[$i]['G_13'] + $data1[$i]['G_14'] + $data1[$i]['G_15'] + $data1[$i]['G_16'] + $data1[$i]['G_17'] + $data1[$i]['G_18'] + $data1[$i]['G_19'] + $data1[$i]['G_20'] + $data1[$i]['G_21'] + $data1[$i]['G_22'] + $data1[$i]['G_23'] + $data1[$i]['G_24'] + $data1[$i]['G_25'] + $data1[$i]['G_26'],
        'This Month' => $data[$i]['G_1'] + $data[$i]['G_2'] + $data[$i]['G_3'] + $data[$i]['G_4'] + $data[$i]['G_5'] + $data[$i]['G_6'] + $data[$i]['G_7'] + $data[$i]['G_8'] + $data[$i]['G_9'] + $data[$i]['G_10'] + $data[$i]['G_11'] + $data[$i]['G_12'] + $data[$i]['G_13'] + $data[$i]['G_14'] + $data[$i]['G_15'] + $data[$i]['G_16'] + $data[$i]['G_17'] + $data[$i]['G_18'] + $data[$i]['G_19'] + $data[$i]['G_20'] + $data[$i]['G_21'] + $data[$i]['G_22'] + $data[$i]['G_23'] + $data[$i]['G_24'] + $data[$i]['G_25'] + $data[$i]['G_26'] + $data1[$i]['G_27'] + $data1[$i]['G_28'] + $data1[$i]['G_29'] + $data1[$i]['G_30']
      );
    }
    $no++;
  }
} elseif ($value == 'week') {
  $current_day = date("l");
  if ($current_day == 'Monday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -7 day'));
  } elseif ($current_day == 'Tuesday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -8 day'));
  } elseif ($current_day == 'Wednesday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -9 day'));
  } elseif ($current_day == 'Thursday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -10 day'));
  } elseif ($current_day == 'Friday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -11 day'));
  } elseif ($current_day == 'Saturday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -12 day'));
  } elseif ($current_day == 'Sunday') {
    $start_date = date('Y-n-j', strtotime($current_date . ' -13 day'));
  }
  for ($i = 0; $i <= 6; $i++) {
    $info[$i] = fetchDayWise($start_date, $tag_values, $numberOfMeters, 'Last Week');
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }

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
  $current_date = date('Y-n-j', strtotime($current_date));
  $dateDiff = dateDiffInDays($start_date, $current_date);
  $dateDiff = $dateDiff + 1;

  for ($i = 0; $i < $dateDiff; $i++) {
    $info1[$i] = fetchDayWise($start_date, $tag_values, $numberOfMeters, 'This Week');
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }

  for ($i = 0; $i < 7; $i++) {
    // $array[] =$info[$i][0];
    // if($info1[$i][0]==null)
    // {
    //   $array[] = array(
    //     'Days' => $info[$i][0]['Days'],
    //     'This Week' => 0
    //    );
    // }
    // else
    // {
    // $array[] =$info1[$i][0];
    // }

    ///////////////////////

    if ($info1[$i][0]['This Week'] == null && $info[$i][0]['Last Week'] == null) {
      // echo var_dump($info1).'<br>';
      $array[] = array(
        'Days' => $info[$i][0]['Days'],
        'Last Week (kWh)' => 0,
        'This Week (kWh)' => 0
      );
    } elseif ($info1[$i][0]['This Week'] == null) {
      $array[] = array(
        'Days' => $info[$i][0]['Days'],
        'Last Week (kWh)' => $info[$i][0]['Last Week'],
        'This Week (kWh)' => 0
      );
    } elseif ($info[$i][0]['Last Week'] == null) {
      $array[] = array(
        'Days' => $info[$i][0]['Days'],
        'Last Week (kWh)' => 0,
        'This Week (kWh)' => $info1[$i][0]['This Week']
      );
    }
    // assigns if both values are not null
    else {

      $array[] = array(
        'Days' => $info[$i][0]['Days'],
        'Last Week (kWh)' => $info[$i][0]['Last Week'],
        'This Week (kWh)' => $info1[$i][0]['This Week']
      );
    }
  }
}
echo json_encode($array);
