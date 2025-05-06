<?php
$value = $_GET['value'];
// $value = 'This Year';
//  $value = 'This Month';
session_start();
include('../mongodb_conn.php');
$collection = $db->naubaharunit2_activetags;
error_reporting(E_ERROR | E_PARSE);
$array = array();
$data = array();
$numberOfMeters = 3;
$current_date = date('Y-m-d');
$tag_values = array(
  'GW2_U3_ActiveEnergy_Delivered_kWh',
  'GW2_U4_ActiveEnergy_Delivered_kWh',
  'GW2_U2_ActiveEnergy_Delivered_kWh'
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
  $mongotime = new MongoDB\BSON\UTCDateTime(strtotime($day . 'T00:00:00+05:00'));
  $val = json_decode(json_encode($mongotime), true);
  foreach ($val as $key => $value) {
    foreach ($value as $sub_key => $sub_value) {
      $a = $sub_value;
    }
  }
  return intval($a);
}
function fetchWeekly($monthStart, $monthEnd, $tag_values, $numberOfMeters)
{
  include('../mongodb_conn.php');
  $collection = $db->naubaharunit2_activetags;
  $monthStartUnix = GetUNIXday($monthStart);
  $monthEndUnix = GetUNIXday($monthEnd);
  $cursor = $collection->aggregate([
    ['$project' => ['UNIXtimestamp' => 1, $tag_values[0] => 1, $tag_values[1] => 1, $tag_values[2] => 1]],
    ['$match' => ['UNIXtimestamp' => ['$gte' => $monthStartUnix, '$lte' => $monthEndUnix]]],
    ['$project' => [
      'UNIXtimestamp' => 1,
      'date' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]],
      'u1' => '$' . $tag_values[0], 'u2' => '$' . $tag_values[1], 'u3' => '$' . $tag_values[2],
    ]],
    ['$project' => [
      'UNIXtimestamp' => 1,
      'date' => ['$dateToString' => ['format' => '%Y-%m-%d', 'date' => '$date']],
      'u1' => 1, 'u2' => 1, 'u3' => 1,
    ]],
    ['$project' => [
      'date' => 1,
      'week' => ['$week' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'u1' => 1, 'u2' => 1, 'u3' => 1,
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
        'firstRead1' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
        'lastRead1' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
        'firstRead2' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u2', 0]]]]],
        'lastRead2' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u2', 0]]]]],
        'firstRead3' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u3', 0]]]]],
        'lastRead3' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u3', 0]]]]],
      ]
    ],
    ['$project' => [
      'day1' => '$firstRead1.date',
      'day2' => '$lastRead1.date',
      'kWh0' => ['$subtract' => ['$lastRead1.u1', '$firstRead1.u1']],
      'kWh1' => ['$subtract' => ['$lastRead2.u2', '$firstRead2.u2']],
      'kWh2' => ['$subtract' => ['$lastRead3.u3', '$firstRead3.u3']],
    ]],
  ]);
  $docs = $cursor->toArray();
  $index = 0;
  foreach ($docs as $document) {
    json_encode($document);
    // var_dump($document);
    for ($i = 0; $i < $numberOfMeters; $i++) {

      $array[] = array(
        'meter' =>  $document['day1'] . ' ~ ' . $document['day2'],
        // 'meter' =>  ' ~ ',
        'value' . $i => $document['kWh' . $i]
      );
    }
    $index++;
  }
  return $array;
}
function fetchHourly($date, $tag_values, $numberOfMeters)
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
    ['$project' => ['UNIXtimestamp' => 1, $tag_values[0] => 1, $tag_values[1] => 1, $tag_values[2] => 1]],
    ['$match' => ['UNIXtimestamp' => ['$gte' => $currentDayUNIX]]],
    ['$project' => [
      'hour' => ['$hour' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'day' => ['$dayOfMonth' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'month' => ['$month' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'year' => ['$year' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'u1' => '$' . $tag_values[0], 'u2' => '$' . $tag_values[1], 'u3' => '$' . $tag_values[2],
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
      '$project' =>
      [
        'firstRead1' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
        'lastRead1' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
        'firstRead2' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u2', 0]]]]],
        'lastRead2' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u2', 0]]]]],
        'firstRead3' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u3', 0]]]]],
        'lastRead3' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u3', 0]]]]],
      ]
    ],
    ['$project' => [
      'kWh0' => ['$subtract' => ['$lastRead1.u1', '$firstRead1.u1']],
      'kWh1' => ['$subtract' => ['$lastRead2.u2', '$firstRead2.u2']],
      'kWh2' => ['$subtract' => ['$lastRead3.u3', '$firstRead3.u3']],
    ]],
  ]);
  $docs = $cursor->toArray();
  $index = 0;
  foreach ($docs as $document) {
    json_encode($document);
    // var_dump($document);
    for ($i = 0; $i < $numberOfMeters; $i++) {

      $array[] = array(
        'meter' =>  $document['_id']['hour'] . ':00',
        'value' . $i => $document['kWh' . $i]
      );
    }
    $index++;
  }
  return $array;
}
function fetchDayWise($date, $tag_values, $numberOfMeters)
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
    ['$project' => ['UNIXtimestamp' => 1, $tag_values[0] => 1, $tag_values[1] => 1, $tag_values[2] => 1]],
    ['$match' => ['UNIXtimestamp' => ['$gte' => $currentDayUNIX]]],
    ['$project' => [
      'day' => ['$dayOfMonth' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'month' => ['$month' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'year' => ['$year' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'u1' => '$' . $tag_values[0], 'u2' => '$' . $tag_values[1], 'u3' => '$' . $tag_values[2],
    ]],
    ['$match' => ['year' => $year, 'month' => $month, 'day' => $day]],
    [
      '$group' => [
        '_id' => ['year' => '$year', 'month' => '$month', 'day' => '$day',],
        'document' => ['$push' => '$$ROOT'],
      ]
    ],
    [
      '$project' => [
        'firstRead1' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
        'lastRead1' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
        'firstRead2' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u2', 0]]]]],
        'lastRead2' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u2', 0]]]]],
        'firstRead3' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u3', 0]]]]],
        'lastRead3' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u3', 0]]]]],
      ]
    ],
    ['$project' => [
      'kWh0' => ['$subtract' => ['$lastRead1.u1', '$firstRead1.u1']],
      'kWh1' => ['$subtract' => ['$lastRead2.u2', '$firstRead2.u2']],
      'kWh2' => ['$subtract' => ['$lastRead3.u3', '$firstRead3.u3']],
    ]],
  ]);
  $docs = $cursor->toArray();
  $index = 0;
  foreach ($docs as $document) {
    json_encode($document);
    for ($i = 0; $i < $numberOfMeters; $i++) {

      $array[] = array(
        'meter' =>  $date,
        'HPAC_' . ($i+1) => $document['kWh' . $i]
      );
    }
    $index++;
  }
  return $array;
}
if ($value == 'Today') {
  $data = fetchHourly($current_date, $tag_values, $numberOfMeters);
  echo json_encode($data);
} elseif ($value == 'Yesterday') {
  $start_date = date('Y-n-j', strtotime($current_date . ' -1 day'));
  $data = fetchHourly($start_date, $tag_values, $numberOfMeters);
} elseif ($value == 'This Month') {
  $start_date = date('Y', strtotime($current_date)) . '-' . date('n', strtotime($current_date)) . '-01';
  $end_date = date('Y-n-j', strtotime($current_date));
  $info = array();
  for ($i = 0; $i <= 31; $i++) {
    $info[$i] = fetchDayWise($start_date, $tag_values, $numberOfMeters);
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }
  $g = 0;
  // echo json_encode($info[14]);
  for ($x = 0; $x < sizeof($info); $x++) {
    if ($info[$x] != null) {
      for ($y = 0; $y < $numberOfMeters; $y++) {
        $data[$g] = $info[$x][$y];
        $g++;
      }
    }
  }


  echo json_encode($data);
} elseif ($value == 'Previous Month') {
  $m1 = date('n', strtotime($current_date));
  $m2 = date('n', strtotime($current_date . ' -1 month'));
  $start_date = '2023-' . $m2 . '-1';
  $end_date = '2023-' . $m1 . '-1';
  $data = fetchWeekly($start_date, $end_date, $tag_values, $numberOfMeters);
} elseif ($value == 'Last 7 Days') {
  $current_date = date('Y-n-j', strtotime($current_date));
  $start_date = date('Y-n-j', strtotime($current_date . ' -7 day'));
  $info = array();
  for ($i = 0; $i <= 6; $i++) {
    $info[$i] = fetchDayWise($start_date, $tag_values, $numberOfMeters);
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }
  $g = 0;
  // echo json_encode($info[14]);
  for ($x = 0; $x < sizeof($info); $x++) {
    if ($info[$x] != null) {
      for ($y = 0; $y < $numberOfMeters; $y++) {
        $data[$g] = $info[$x][$y];
        $g++;
      }
    }
  }


  echo json_encode($data);
} elseif ($value == 'Last 30 Days') {
  $current_date = date('Y-n-j', strtotime($current_date));
  $start_date = date('Y-n-j', strtotime($current_date . ' -30 day'));
  $info = array();
  for ($i = 0; $i <= 29; $i++) {
    $info[$i] = fetchDayWise($start_date, $tag_values, $numberOfMeters);
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }
  $g = 0;
  // echo json_encode($info[14]);
  for ($x = 0; $x < sizeof($info); $x++) {
    if ($info[$x] != null) {
      for ($y = 0; $y < $numberOfMeters; $y++) {
        $data[$g] = $info[$x][$y];
        $g++;
      }
    }
  }


  echo json_encode($data);
} elseif ($value == 'Last Week') {
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
    $info[$i] = fetchDayWise($start_date, $tag_values, $numberOfMeters);
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }
  $g = 0;
  // echo json_encode($info[14]);
  for ($x = 0; $x < sizeof($info); $x++) {
    if ($info[$x] != null) {
      for ($y = 0; $y < $numberOfMeters; $y++) {
        $data[$g] = $info[$x][$y];
        $g++;
      }
    }
  }


  echo json_encode($data);
} elseif ($value == 'This Week') {
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
    $info[$i] = fetchDayWise($start_date, $tag_values, $numberOfMeters);
    $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
  }
  $g = 0;
  // echo json_encode($info[14]);
  for ($x = 0; $x < sizeof($info); $x++) {
    if ($info[$x] != null) {
      for ($y = 0; $y < $numberOfMeters; $y++) {
        $data[$g] = $info[$x][$y];
        $g++;
      }
    }
  }


  echo json_encode($data);
} elseif ($value == 'This Year') {
  $monthly = array();
  $cursor = $collection->aggregate([
    ['$project' => ['UNIXtimestamp' => 1, $tag_values[0] => 1, $tag_values[1] => 1, $tag_values[2] => 1]],
    ['$project' => [
      'UNIXtimestamp' => 1,
      'u1' => '$' . $tag_values[0], 'u2' => '$' . $tag_values[1], 'u3' => '$' . $tag_values[2],
    ]],
    ['$group' =>
    [
      '_id' => ['month' => ['$month' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]]],
      'document' => ['$push' => '$$ROOT'],

    ]],
    ['$sort' => ['_id' => 1]],
    [
      '$project' => [
        'firstRead1' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
        'lastRead1' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
        'firstRead2' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u2', 0]]]]],
        'lastRead2' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u2', 0]]]]],
        'firstRead3' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u3', 0]]]]],
        'lastRead3' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u3', 0]]]]],
      ]

    ],
    ['$project' => [
      'kWh0' => ['$subtract' => ['$lastRead1.u1', '$firstRead1.u1']],
      'kWh1' => ['$subtract' => ['$lastRead2.u2', '$firstRead2.u2']],
      'kWh2' => ['$subtract' => ['$lastRead3.u3', '$firstRead3.u3']],
    ]]
  ]);   //This is the main line
  $docs = $cursor->toArray();
  $index = 0;
  foreach ($docs as $document) {
    json_encode($document);
    //  var_dump($document);
    $monthly[] = array(
      'month' =>  $document['_id']['month'],
      'value0' => $document['kWh0'],
      'value1' => $document['kWh1'],
      'value2' => $document['kWh2'],
    );
    $index++;
  }
  // var_dump($monthly);
  $start_date = date('Y') . '-1-' . '1';
  $end_date = $current_date;
  function dateDiffInMonths($start_date, $end_date)
  {
    // Calculating the difference in timestamps
    $diff = strtotime($end_date) - strtotime($start_date);
    return abs(round($diff / 2592000));
  }
  $dateDiff = dateDiffInMonths($start_date, $end_date);
  $m = 1;
  for ($i = 0; $i <= (sizeof($monthly) - 1); $i++) {
    if ($monthly[$i]['month'] == 1) {
      $orgname = 'Jan';
    } elseif ($monthly[$i]['month'] == 2) {
      $orgname = 'Feb';
    } elseif ($monthly[$i]['month'] == 3) {
      $orgname = 'Mar';
    } elseif ($monthly[$i]['month'] == 4) {
      $orgname = 'Apr';
    } elseif ($monthly[$i]['month'] == 5) {
      $orgname = 'May';
    } elseif ($monthly[$i]['month'] == 6) {
      $orgname = 'Jun';
    } elseif ($monthly[$i]['month'] == 7) {
      $orgname = 'Jul';
    } elseif ($monthly[$i]['month'] == 8) {
      $orgname = 'Aug';
    } elseif ($monthly[$i]['month'] == 9) {
      $orgname = 'Sep';
    } elseif ($monthly[$i]['month'] == 10) {
      $orgname = 'Oct';
    } elseif ($monthly[$i]['month'] == 11) {
      $orgname = 'Nov';
    } elseif ($monthly[$i]['month'] == 12) {
      $orgname = 'Dec';
    }

    $count1 = $monthly[$i]['value0'];
    $count2 = $monthly[$i]['value1'];
    $count3 = $monthly[$i]['value2'];


    $array1[] = array(
      'meter' =>  $orgname,
      'value0' => (int)$count1
    );
    $array1[] = array(
      'meter' =>  $orgname,
      'value1' => (int)$count2
    );
    $array1[] = array(
      'meter' =>  $orgname,
      'value2' => (int)$count3
    );
    $data = json_encode($array1);
  }
  $data = json_decode($data);
  echo  json_encode($data);
}
