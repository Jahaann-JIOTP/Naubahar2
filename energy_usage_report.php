<?php
session_start();
if (!isset($_SESSION['auth'])) {
  // not logged in
  header('Location:index.php');
}
$date = $_POST['start_date'];
$start_date = date('Y-n-j', strtotime($date));
$end = $_POST['end_date'];
$current_date = date("Y-n-j");
$end_date = date('Y-n-j', strtotime($end));
$end_date = date('Y-m-d', strtotime($end_date . ' +1 day'));
date_default_timezone_set("Asia/Karachi");
$currentDateTime = date('d-m-Y H:i:s A');

$U1Total = 0;
$U2Total = 0;
$U3Total = 0;
$U4Total = 0;
$U5Total = 0;
$U6Total = 0;
$U7Total = 0;
$U8Total = 0;
$U9Total = 0;
$U10Total = 0;
$U11Total = 0;
$U12Total = 0;
$U13Total = 0;
$U14Total = 0;
$U15Total = 0;
$U16Total = 0;
$U17Total = 0;
$UTotal = 0;
$subtotal = 0;
$tag_values1 = array(
  'U_1_ActiveEnergy_Delivered_kWh',
  'U_2_ActiveEnergy_Delivered_kWh',
  'U_3_ActiveEnergy_Delivered_kWh',
  'U_4_ActiveEnergy_Delivered_kWh',
  'U_5_ActiveEnergy_Delivered_kWh',
  'U_6_ActiveEnergy_Delivered_kWh',
  'U_7_ActiveEnergy_Delivered_kWh',
  'U_8_ActiveEnergy_Delivered_kWh',
  'U_9_ActiveEnergy_Delivered_kWh',
  'U_10_ActiveEnergy_Delivered_kWh',
  'U_11_ActiveEnergy_Delivered_kWh',
  'U_12_ActiveEnergy_Delivered_kWh',
  'U_13_ActiveEnergy_Delivered_kWh',
  'U_14_ActiveEnergy_Delivered_kWh',
  'U_15_ActiveEnergy_Delivered_kWh',
  'U_16_ActiveEnergy_Delivered_kWh',
  'U_17_ActiveEnergy_Delivered_kWh',
);





function GetUNIXday($day)
{
  $mongotime = new MongoDB\BSON\UTCDateTime(strtotime($day . 'T00:00:0+05:00'));
  $val = json_decode(json_encode($mongotime), true);
  foreach ($val as $key => $value) {
    foreach ($value as $sub_key => $sub_value) {
      $a = $sub_value;
    }
  }
  return intval($a);
}
function fetchDayWise($date1, $date2, $tag_values, $numberOfMeters)
{
  include('mongodb_conn.php');
  $collection = $db->naubahar_activetags;
  $startDayUNIX = GetUNIXday($date1);
  // echo($startDayUNIX);
  $endDayUNIX = GetUNIXday($date2);
  // echo($endDayUNIX);
  $cursor = $collection->aggregate([
    ['$project' => [
      'UNIXtimestamp' => 1,
      $tag_values[0] => 1,
      $tag_values[1] => 1,
      $tag_values[2] => 1,
      $tag_values[3] => 1,
      $tag_values[4] => 1,
      $tag_values[5] => 1,
      $tag_values[6] => 1,
      $tag_values[7] => 1,
      $tag_values[8] => 1,
      $tag_values[9] => 1,
      $tag_values[10] => 1,
      $tag_values[11] => 1,
      $tag_values[12] => 1,
      $tag_values[13] => 1,
      $tag_values[14] => 1,
      $tag_values[15] => 1,
      $tag_values[16] => 1,

    ]],
    ['$match' => ['UNIXtimestamp' => ['$gte' => $startDayUNIX, '$lt' => $endDayUNIX]]],
    ['$project' => [


      'u1' => '$' . $tag_values[0],
      'u2' => '$' . $tag_values[1],
      'u3' => '$' . $tag_values[2],
      'u4' => '$' . $tag_values[3],
      'u5' => '$' . $tag_values[4],
      'u6' => '$' . $tag_values[5],
      'u7' => '$' . $tag_values[6],
      'u8' => '$' . $tag_values[7],
      'u9' => '$' . $tag_values[8],
      'u10' => '$' . $tag_values[9],
      'u11' => '$' . $tag_values[10],
      'u12' => '$' . $tag_values[11],
      'u13' => '$' . $tag_values[12],
      'u14' => '$' . $tag_values[13],
      'u15' => '$' . $tag_values[14],
      'u16' => '$' . $tag_values[15],
      'u17' => '$' . $tag_values[16],

      'day' => ['$dayOfMonth' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'month' => ['$month' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      'year' => ['$year' => ['$add' => [['$toDate' => ['$multiply' => ['$UNIXtimestamp', 1000]]], 18000000]]],
      // 'time' => '$UNIXtimestamp',
    ]],
    ['$group' => ['_id' => ['year' => '$year', 'month' => '$month', 'day' => '$day'], 'document' => ['$push' => '$$ROOT']]],
    ['$project' => [

      'firstRead1' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
      'lastRead1' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u1', 0]]]]],
      'firstRead2' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u2', 0]]]]],
      'lastRead2' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u2', 0]]]]],
      'firstRead3' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u3', 0]]]]],
      'lastRead3' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u3', 0]]]]],
      'firstRead4' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u4', 0]]]]],
      'lastRead4' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u4', 0]]]]],
      'firstRead5' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u5', 0]]]]],
      'lastRead5' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u5', 0]]]]],
      'firstRead6' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u6', 0]]]]],
      'lastRead6' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u6', 0]]]]],
      'firstRead7' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u7', 0]]]]],
      'lastRead7' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u7', 0]]]]],
      'firstRead8' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u8', 0]]]]],
      'lastRead8' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u8', 0]]]]],
      'firstRead9' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u9', 0]]]]],
      'lastRead9' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u9', 0]]]]],
      'firstRead10' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u10', 0]]]]],
      'lastRead10' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u10', 0]]]]],
      'firstRead11' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u11', 0]]]]],
      'lastRead11' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u11', 0]]]]],
      'firstRead12' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u12', 0]]]]],
      'lastRead12' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u12', 0]]]]],
      'firstRead13' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u13', 0]]]]],
      'lastRead13' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u13', 0]]]]],
      'firstRead14' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u14', 0]]]]],
      'lastRead14' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u14', 0]]]]],
      'firstRead15' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u15', 0]]]]],
      'lastRead15' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u15', 0]]]]],
      'firstRead16' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u16', 0]]]]],
      'lastRead16' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u16', 0]]]]],
      'firstRead17' => ['$min' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u17', 0]]]]],
      'lastRead17' => ['$max' => ['$filter' => ['input' => '$document', 'as' => 'doc', 'cond' => ['$gt' => ['$$doc.u17', 0]]]]],
    ]],

    ['$sort' => ['_id.year' => 1, '_id.month' => 1, '_id.day' => 1]]
  ]);



  $docs = $cursor->toArray();
  $previous = null; // Variable to store the previous value  
  $previous2 = null;
  $previous3 = null;
  $previous4 = null;
  $previous5 = null;
  $previous6 = null;
  $previous7 = null;
  $previous8 = null;
  $previous9 = null;
  $previous10 = null;
  $previous11 = null;
  $previous12 = null;
  $previous13 = null;
  $previous14 = null;
  $previous15 = null;
  $previous16 = null;
  $previous17 = null;
  foreach ($docs as $doc) {
    $firstRead = $doc['firstRead1']['u1'] ?? 0;
    $lastRead = $doc['lastRead1']['u1'] ?? 0;
    $firstRead2 = $doc['firstRead2']['u2'] ?? 0;
    $lastRead2 = $doc['lastRead2']['u2'] ?? 0;
    $firstRead3 = $doc['firstRead3']['u3'] ?? 0;
    $lastRead3 = $doc['lastRead3']['u3'] ?? 0;
    $firstRead4 = $doc['firstRead4']['u4'] ?? 0;
    $lastRead4 = $doc['lastRead4']['u4'] ?? 0;
    $firstRead5 = $doc['firstRead5']['u5'] ?? 0;
    $lastRead5 = $doc['lastRead5']['u5'] ?? 0;
    $firstRead6 = $doc['firstRead6']['u6'] ?? 0;
    $lastRead6 = $doc['lastRead6']['u6'] ?? 0;
    $firstRead7 = $doc['firstRead7']['u7'] ?? 0;
    $lastRead7 = $doc['lastRead7']['u7'] ?? 0;
    $firstRead8 = $doc['firstRead8']['u8'] ?? 0;
    $lastRead8 = $doc['lastRead8']['u8'] ?? 0;
    $firstRead9 = $doc['firstRead9']['u9'] ?? 0;
    $lastRead9 = $doc['lastRead9']['u9'] ?? 0;
    $firstRead10 = $doc['firstRead10']['u10'] ?? 0;
    $lastRead10 = $doc['lastRead10']['u10'] ?? 0;
    $firstRead11 = $doc['firstRead11']['u11'] ?? 0;
    $lastRead11 = $doc['lastRead11']['u11'] ?? 0;
    $firstRead12 = $doc['firstRead12']['u12'] ?? 0;
    $lastRead12 = $doc['lastRead12']['u12'] ?? 0;
    $firstRead13 = $doc['firstRead13']['u13'] ?? 0;
    $lastRead13 = $doc['lastRead13']['u13'] ?? 0;
    $firstRead14 = $doc['firstRead14']['u14'] ?? 0;
    $lastRead14 = $doc['lastRead14']['u14'] ?? 0;
    $firstRead15 = $doc['firstRead15']['u15'] ?? 0;
    $lastRead15 = $doc['lastRead15']['u15'] ?? 0;
    $firstRead16 = $doc['firstRead16']['u16'] ?? 0;
    $lastRead16 = $doc['lastRead16']['u16'] ?? 0;
    $firstRead17 = $doc['firstRead17']['u17'] ?? 0;
    $lastRead17 = $doc['lastRead17']['u17'] ?? 0;


    // Subtract the values

    if ($previous === null) {
      $U_1 = $lastRead - $firstRead;
      $previous = $lastRead;
    } else {
      $U_1 = $lastRead - $previous;
      $previous = $lastRead;
    }

    if ($previous2 === null) {
      $U_2 = $lastRead2 - $firstRead2;
      $previous2 = $lastRead2;
    } else {
      $U_2 = $lastRead2 - $previous2;
      $previous2 = $lastRead2;
    }

    if ($previous3 === null) {
      $U_3 = $lastRead3 - $firstRead3;
      $previous3 = $lastRead3;
    } else {
      $U_3 = $lastRead3 - $previous3;
      $previous3 = $lastRead3;
    }

    if ($previous4 === null) {
      $U_4 = $lastRead4 - $firstRead4;
      $previous4 = $lastRead4;
    } else {
      $U_4 = $lastRead4 - $previous4;
      $previous4 = $lastRead4;
    }


    if ($previous5 === null) {
      $U_5 = $lastRead5 - $firstRead5;
      $previous5 = $lastRead5;
    } else {
      $U_5 = $lastRead5 - $previous5;
      $previous5 = $lastRead5;
    }

    if ($previous6 === null) {
      $U_6 = $lastRead6 - $firstRead6;
      $previous6 =  $lastRead6;
    } else {
      $U_6 = $lastRead6 - $previous6;
      $previous6 =  $lastRead6;
    }

    if ($previous7 === null) {
      $U_7 = $lastRead7 - $firstRead7;
      $previous7 = $lastRead7;
    } else {
      $U_7 = $lastRead7 - $previous7;
      $previous7 = $lastRead7;
    }

    if ($previous8 === null) {
      $U_8 = $lastRead8 - $firstRead8;
      $previous8 = $lastRead8;
    } else {
      $U_8 = $lastRead8 - $previous8;
      $previous8 = $lastRead8;
    }


    if ($previous9 === null) {
      $U_9 = $lastRead9 - $firstRead9;
      $previous9 = $lastRead9;
    } else {
      $U_9 = $lastRead9 - $previous9;
      $previous9 = $lastRead9;
    }

    if ($previous10 === null) {
      $U_10 = $lastRead10 - $firstRead10;
      $previous10  = $lastRead10;
    } else {
      $U_10 = $lastRead10 - $previous10;
      $previous10  = $lastRead10;
    }

    if ($previous11 === null) {
      $U_11 = $lastRead11 - $firstRead11;
      $previous11 = $lastRead11;
    } else {
      $U_11 = $lastRead11 - $previous11;
      $previous11 = $lastRead11;
    }

    if ($previous12 === null) {
      $U_12 = $lastRead12 - $firstRead12;
      $previous12 = $lastRead12;
    } else {
      $U_12 = $lastRead12 - $previous12;
      $previous12 = $lastRead12;
    }

    if ($previous13 === null) {
      $U_13 = $lastRead13 - $firstRead13;
      $previous13 = $lastRead13;
    } else {
      $U_13 = $lastRead13 - $previous13;
      $previous13 = $lastRead13;
    }

    if ($previous14 === null) {
      $U_14 = $lastRead14 - $firstRead14;
      $previous14 = $lastRead14;
    } else {
      $U_14 = $lastRead14 - $previous14;
      $previous14 = $lastRead14;
    }

    if ($previous15 === null) {
      $U_15 = $lastRead15 - $firstRead15;
      $previous15 = $lastRead15;
    } else {
      $U_15 = $lastRead15 - $previous15;
      $previous15 = $lastRead15;
    }


    if ($previous16 === null) {
      $U_16 = $lastRead16 - $firstRead16;
      $previous16 = $lastRead16;
    } else {
      $U_16 = $lastRead16 - $previous16;
      $previous16 = $lastRead16;
    }


    if ($previous17 === null) {
      $U_17 = $lastRead17 - $firstRead17;
      $previous17 = $lastRead17;
    } else {
      $U_17 = $lastRead17 - $previous17;
      $previous17 = $lastRead17;
    }

    // Update the 'U_1' field in the document
    $doc['U_1'] = $U_1;
    $doc['U_2'] = $U_2;
    $doc['U_3'] = $U_3;
    $doc['U_4'] = $U_4;
    $doc['U_5'] = $U_5;
    $doc['U_6'] = $U_6;
    $doc['U_7'] = $U_7;
    $doc['U_8'] = $U_8;
    $doc['U_9'] = $U_9;
    $doc['U_10'] = $U_10;
    $doc['U_11'] = $U_11;
    $doc['U_12'] = $U_12;
    $doc['U_13'] = $U_13;
    $doc['U_14'] = $U_14;
    $doc['U_15'] = $U_15;
    $doc['U_16'] = $U_16;
    $doc['U_17'] = $U_17;
  }

  // Modify the output array structure as required
  $output = [];
  // var_dump($output);

  foreach ($docs as $doc) {
    $outputDoc = [
      '_id' => $doc['_id'],
      'U_1' => $doc['U_1'],
      'U_2' => $doc['U_2'],
      'U_3' => $doc['U_3'],
      'U_4' => $doc['U_4'],
      'U_5' => $doc['U_5'],
      'U_6' => $doc['U_6'],
      'U_7' => $doc['U_7'],
      'U_8' => $doc['U_8'],
      'U_9' => $doc['U_9'],
      'U_10' => $doc['U_10'],
      'U_11' => $doc['U_11'],
      'U_12' => $doc['U_12'],
      'U_13' => $doc['U_13'],
      'U_14' => $doc['U_14'],
      'U_15' => $doc['U_15'],
      'U_16' => $doc['U_16'],
      'U_17' => $doc['U_17'],


    ];

    // Add this modified document to the final output array
    $output[] = $outputDoc;
  }

  // Output your modified array
  // var_dump($outputDoc['U_3']);

  return $output;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head.php'); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <style type="text/css">
    div.dataTables_wrapper {
      width: 100%;
      margin: 0 auto;
    }

    table {
      border-collapse: separate;
      border-spacing: 0;
      width: 100%;
    }

    th,
    td {
      padding: 6px 15px;
    }

    th {
      background: #42444e;
      color: #fff;
      text-align: left;
    }

    tr:first-child th:first-child {
      border-top-left-radius: 6px;
    }

    tr:first-child th:last-child {
      border-top-right-radius: 6px;
    }

    td {
      border-right: 1px solid #c6c9cc;
      border-bottom: 1px solid #c6c9cc;
    }

    td:first-child {
      border-left: 1px solid #c6c9cc;
    }

    tr:nth-child(even) td {
      background: #eaeaed;
    }

    tr:last-child td:first-child {
      border-bottom-left-radius: 6px;
    }

    tr:last-child td:last-child {
      border-bottom-right-radius: 6px;
    }
  </style>
</head>

<body>
  <!-- Pre-loader start -->
  <?php include('includes/preloader.php'); ?>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      <?php include('includes/header.php'); ?>
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          <?php include('includes/sidebar.php'); ?>
          <div class="pcoded-content">
            <!-- Page-header start -->
            <div class="page-header">
              <div class="page-block">
                <div class="row align-items-center">
                  <div class="col-md-8">
                    <div class="page-header-title">
                      <h4 class="m-b-10">Energy Usage Report</h4>
                      <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <ul class="breadcrumb-title">
                      <li class="breadcrumb-item">
                        <a href="#"> <i class="fa fa-home"></i> </a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!">Reports</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!" style="color: #284497">Energy Usage Report</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page-header end -->
            <div class="pcoded-inner-content">
              <!-- Main-body start -->
              <div class="main-body">
                <div class="page-wrapper">
                  <!-- Page-body start -->
                  <div class="page-body">
                    <!-- Main content starts -->
                    <div class="card" style="border-radius: 10px !important;">
                      <div class="card-header" style="border-top:5px solid;border-color:#7699d4;height:50px; padding: 0.5rem 1rem;border-bottom: 1px solid #9f9fa3;border-left: 1px solid #9f9fa3;border-right:1px solid #9f9fa3;border-radius: 6px ">
                        <h4 style="padding-top:3px"> Energy Usage Report<a href="energy_usage.php"><span style="float:right; margin-top: -13px;"><i class="fa fa-arrow-circle-left" style="font-size:47px;"></i></span></a></h4>
                      </div>
                    </div><br>
                    <div>
                      <!-- Invoice card start -->
                      <div class="card" style="border-radius: 10px !important;border-top:5px solid;border-color:#7699d4;">
                        <div class="row invoice-contact">
                          <div class="col-md-12">
                            <div class="invoice-box row">
                              <div class="col-sm-12">
                                <div class="row">
                                  <div class="col-12" style="margin-left:10px;height:50px">
                                    <p>
                                      <?php echo date("d-m-Y", strtotime($date)) . ", " . date("h:i:sa") . " " . "-" . " " . date("d-m-Y", strtotime($end)) . "," . ' 12:00:00 AM (Pakistan Standard Time) '; ?>
                                    <h4 style="color: #0047AB;">Naubahar</span> B<span><img src="assets\images\Pepsi-Logo.png" width="35px" height="20px"></span>ttling Company<small class="float-right">
                                        <div style="margin-right:20px;color:black ">Energy Usage Report</div>
                                      </small></h4>
                                  </div>
                                </div>
                                <hr>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-block">
                          <div class="row invoice-info">
                            <div class="col-md-4 col-sm-8 offset-md-1 invoice-col" style=" background-color:#f4f4f4; border-left: 3px solid #7699d4;">
                              From
                              <address>
                                <strong>Jahaann Technology</strong><br>
                                22-C Block, G.E.C.H.S,<br>
                                Phase 3 Peco Road,Lahore, Pakistan,<br>
                                Phone: +924235949261<br>
                                Email: info@jahaann.com,
                              </address>
                            </div>
                            <div class="col-md-4 col-sm-8 offset-md-1 invoice-col" style=" background-color:#f4f4f4; border-left: 3px solid #7699d4;">
                              To
                              <address>
                                <strong>Naubahar</strong><br>
                                38-40 Small Industrial, Estate Model Town,,<br>
                                Gujranwala Punjab 52250 Pakistan.<br>
                                Phone:+92-55-3253606<br>
                              </address>
                            </div>
                          </div><br><br>
                        </div>
                        <div class="dropdown" style="margin-left:12px">
                          <button class="btn  dropdown-toggle" style="background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0); color:white;" type="button" data-toggle="dropdown">Export
                            <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li style="background-color: #e9e9ed; border-bottom: 1px solid #d0d0d0;">
                              <button class="btn " id="btnExport" onclick="fnExcelReport();">Export To Excel</button>
                            </li>
                            <li style="background-color: #e9e9ed;">
                              <input type="button" class="btn" onclick="generate()" value="Export To PDF" />
                            </li>
                          </ul>
                        </div>
                        </p><br>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="table-responsive">
                              <table class=" table-responsive-md table-striped" id="testTable" style="text-align:center;">
                                <thead>
                                  <tr style="background-color:#ebecec ; border-bottom: 3px solid #1348A8;">
                                    <th class="text-center" style="font-size:larger;font-weight:900;background-color:#7699d4; color: white">Date</th>
                                    <?php
                                    $count = count($_POST['radio']);
                                    foreach ($_POST['radio'] as $sources) {
                                      if ($sources == 'U_1') {
                                        $meters = 'Main LT';
                                      } elseif ($sources == 'U_2') {
                                        $meters = 'Water Treatment';
                                      } elseif ($sources == 'U_3') {
                                        $meters = 'Turbine 1';
                                      } elseif ($sources == 'U_4') {
                                        $meters = 'Syrup Room';
                                      } elseif ($sources == 'U_5') {
                                        $meters = 'Air Compressor(3+4+5)';
                                      } elseif ($sources == 'U_6') {
                                        $meters = 'Air Compressor(1+2)';
                                      } elseif ($sources == 'U_7') {
                                        $meters = 'Grasso 4';
                                      } elseif ($sources == 'U_8') {
                                        $meters = 'Grasso 3';
                                      } elseif ($sources == 'U_9') {
                                        $meters = 'Grasso 2';
                                      } elseif ($sources == 'U_10') {
                                        $meters = 'Grasso 1';
                                      } elseif ($sources == 'U_11') {
                                        $meters = 'Evaporators';
                                      } elseif ($sources == 'U_12') {
                                        $meters = 'Line-5';
                                      } elseif ($sources == 'U_13') {
                                        $meters = 'Line-4';
                                      } elseif ($sources == 'U_14') {
                                        $meters = 'Line-3';
                                      } elseif ($sources == 'U_15') {
                                        $meters = 'Line-1';
                                      } elseif ($sources == 'U_16') {
                                        $meters = 'Boiler';
                                      } elseif ($sources == 'U_17') {
                                        $meters = 'Turbine-2';
                                      };
                                    ?>
                                      <th class="text-center" style="font-size:larger;font-weight:900;background-color:#7699d4; color: white"><?php echo $meters; ?>&nbsp; (kWh)</th>
                                    <?php } ?>
                                    <th class="text-center" style="font-size:larger;font-weight:900;background-color:#7699d4; color: white">Sub Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $data = fetchDayWise($start_date, $end_date, $tag_values1, 1);
                                  foreach ($data as $rows) { ?>
                                    <tr>
                                      <td class="text-center"><?php echo ($rows['_id']['year']) . '-' . ($rows['_id']['month']) . '-' . ($rows['_id']['day']); ?></td>
                                      <?php
                                      foreach ($_POST['radio'] as $sources) {
                                        if ($sources == 'U_1' && $rows['U_1'] != null) {
                                          $meters = $rows['U_1'];
                                          $U1Total += $meters;
                                        } elseif ($sources == 'U_2' && $rows['U_2'] != null) {
                                          $meters = $rows['U_2'];
                                          $U2Total += $meters;
                                        } elseif ($sources == 'U_3' && $rows['U_3'] != null) {
                                          $meters = $rows['U_3'];
                                          $U3Total += $meters;
                                        } elseif ($sources == 'U_4' && $rows['U_4'] != null) {
                                          $meters = $rows['U_4'];
                                          $U4Total += $meters;
                                        } elseif ($sources == 'U_5' && $rows['U_5'] != null) {
                                          $meters = $rows['U_5'];
                                          $U5Total += $meters;
                                        } elseif ($sources == 'U_6' && $rows['U_6'] != null) {
                                          $meters = $rows['U_6'];
                                          $U6Total += $meters;
                                        } elseif ($sources == 'U_7' && $rows['U_7'] != null) {
                                          $meters = $rows['U_7'];
                                          $U7Total += $meters;
                                        } elseif ($sources == 'U_8' && $rows['U_8'] != null) {
                                          $meters = $rows['U_8'];
                                          $U8Total += $meters;
                                        } elseif ($sources == 'U_9' && $rows['U_9'] != null) {
                                          $meters = $rows['U_9'];
                                          $U9Total += $meters;
                                        } elseif ($sources == 'U_10' && $rows['U_10'] != null) {
                                          $meters = $rows['U_10'];
                                          $U10Total += $meters;
                                        } elseif ($sources == 'U_11' && $rows['U_11'] != null) {
                                          $meters = $rows['U_11'];
                                          $U11Total += $meters;
                                        } elseif ($sources == 'U_12' && $rows['U_12'] != null) {
                                          $meters = $rows['U_12'];
                                          $U12Total += $meters;
                                        } elseif ($sources == 'U_13' && $rows['U_13'] != null) {
                                          $meters = $rows['U_13'];
                                          $U13Total += $meters;
                                        } elseif ($sources == 'U_14' && $rows['U_14'] != null) {
                                          $meters = $rows['U_14'];
                                          $U14Total += $meters;
                                        } elseif ($sources == 'U_15' && $rows['U_15'] != null) {
                                          $meters = $rows['U_15'];
                                          $U15Total += $meters;
                                        } elseif ($sources == 'U_16' && $rows['U_16'] != null) {
                                          $meters = $rows['U_16'];
                                          $U16Total += $meters;
                                        } elseif ($sources == 'U_17' && $rows['U_17'] != null) {
                                          $meters = $rows['U_17'];
                                          $U17Total += $meters;
                                        } else {
                                          $meters = 0;
                                        }
                                      ?>
                                        <td class="text-center"><?php echo number_format($meters);
                                                                $subtotal += $meters; ?></td>
                                      <?php } ?>
                                      <td class="text-center"><?php echo number_format($subtotal);
                                                              $UTotal += $subtotal;
                                                              $subtotal = 0; ?> </td>
                                    </tr>
                                  <?php } ?>
                                  <tr class="text-center">
                                    <th class="text-center" style="font-weight:bold; background-color: #7699d4;">Total</th>
                                    <?php
                                    foreach ($_POST['radio'] as $sources) {
                                      if ($sources == 'U_1') {
                                        $meters = $U1Total;
                                      } elseif ($sources == 'U_2') {
                                        $meters = $U2Total;
                                      } elseif ($sources == 'U_3') {
                                        $meters = $U3Total;
                                      } elseif ($sources == 'U_4') {
                                        $meters = $U4Total;
                                      } elseif ($sources == 'U_5') {
                                        $meters = $U5Total;
                                      } elseif ($sources == 'U_6') {
                                        $meters = $U6Total;
                                      } elseif ($sources == 'U_7') {
                                        $meters = $U7Total;
                                      } elseif ($sources == 'U_8') {
                                        $meters = $U8Total;
                                      } elseif ($sources == 'U_9') {
                                        $meters = $U9Total;
                                      } elseif ($sources == 'U_10') {
                                        $meters = $U10Total;
                                      } elseif ($sources == 'U_11') {
                                        $meters = $U11Total;
                                      } elseif ($sources == 'U_12') {
                                        $meters = $U12Total;
                                      } elseif ($sources == 'U_13') {
                                        $meters = $U13Total;
                                      } elseif ($sources == 'U_14') {
                                        $meters = $U14Total;
                                      } elseif ($sources == 'U_15') {
                                        $meters = $U15Total;
                                      } elseif ($sources == 'U_16') {
                                        $meters = $U16Total;
                                      } elseif ($sources == 'U_17') {
                                        $meters = $U17Total;
                                      }; ?>
                                      <th class="text-center" style="background-color: #7699d4;"><?php echo number_format($meters); ?></th>
                                    <?php } ?>
                                    <th class="text-center" style="font-size:larger;font-weight:900;background-color:#1e5b9b;color: white"><?php echo number_format($UTotal); ?> &nbsp; (kWh)</th>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <hr>
                        </div><br>
                        <?php
                        date_default_timezone_set("Asia/Karachi");
                        $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'); ?>
                        <table width="100%">
                          <tr>
                            <td style="border-top: 0px !important;" width="30%">
                              <?php
                              echo "Generated on: " . date("h:i") . ", " . "Date:" . " " .  date("Y-m-d");
                              ?>
                            </td>
                            <td style="border-top: 0px !important;" width="20%">Generated By: <b>Jahaann Technologies</b></td>
                            <td style="border-top: 0px !important;" width="10%" align="right">Email: <b><a href="mailto:info@jahaann.com">info@jahaann.com</a></b></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <!-- Invoice card end -->
                  </div>
                </div>
                <!-- Container ends -->
              </div>
            </div>
          </div>
        </div>
        <div id="styleSelector">
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <?php include('includes/footer.php'); ?>
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  <script type="text/javascript">
    function fnExcelReport() {
      var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
      var textRange;
      var j = 0;
      tab = document.getElementById('testTable'); // id of table

      for (j = 0; j < tab.rows.length; j++) {
        tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
        //tab_text=tab_text+"</tr>";
      }

      tab_text = tab_text + "</table>";
      tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
      tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
      tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

      var ua = window.navigator.userAgent;
      var msie = ua.indexOf("MSIE ");

      if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
      {
        txtArea1.document.open("txt/html", "replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus();
        sa = txtArea1.document.execCommand("SaveAs", true, "Energy Usage_Report.xls");
      } else //other browser not tested on IE 11
        try {
          var blob = new Blob([tab_text], {
            type: "application/vnd.ms-excel"
          });
          window.URL = window.URL || window.webkitURL;
          link = window.URL.createObjectURL(blob);
          a = document.createElement("a");
          if (document.getElementById("caption") != null) {
            a.download = document.getElementById("caption").innerText;
          } else {
            a.download = 'Energy Usage_Report';
          }

          a.href = link;

          document.body.appendChild(a);

          a.click();

          document.body.removeChild(a);
        } catch (e) {}


      return false;

      // return (sa);
    }
  </script>
  <script type="text/javascript">
    var headerImgData;
    headerImgData = 'data:image/png;base64,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';

    function generate() {
      var doc = new jsPDF('l', 'pt', 'a4', );
      // header of pdf 
      var header = function(data) {
        doc.setFontSize(18);
        doc.setTextColor(40);
        doc.setFontStyle('normal'); //margin,width , height  
        doc.addImage(headerImgData, 'JPEG', data.settings.margin.left, 20, 70, 80);
        doc.setTextColor(100);
        doc.text(570, 65, 'Naubahar Bottling Company', 'right');
        doc.setDrawColor(0, 0, 0);
        doc.line(10, 10, 840 - 10, 10);
        doc.line(10, 10, 10, 120 - 10);
        doc.setLineWidth(2);
        doc.line(10, 120 - 10, 840 - 10, 120 - 10);
        doc.setLineWidth(1);
        doc.line(840 - 10, 120 - 10, 840 - 10, 10);
        doc.line(10, 150 - 10, 840 - 10, 150 - 10);
        // get date 
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        today1 = dd + '/' + mm + '/' + yyyy;
        // get time in 12 h format 
        var today = new Date();
        var hours = today.getHours();
        var minutes = today.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        strTime = hours + ':' + minutes + ' ' + ampm;
        doc.setFontSize(10);
        doc.setFontStyle('normal');
        doc.text(strTime, 730, 125);
        doc.text("Reported Date:  " + today1, 605, 125);
      };
      // page content headings design 
      doc.setFillColor(0, 122, 239);
      doc.rect(20, 150, 790, 20, 'F');
      doc.setFontSize(16);
      doc.setTextColor(255, 255, 255)
      doc.text(150, 165, 'Energy Usage Report', 'center');
      // page content borders 
      doc.setLineWidth(1);
      doc.setDrawColor(0, 0, 0);
      //left border
      doc.line(10, 550, 10, 120 - 10);
      //right border
      doc.line(840 - 10, 550, 840 - 10, 120 - 10);
      //bottom border
      doc.line(10, 550, 840 - 10, 550);
      var footer = function(data) {

        // fonts of footer texts
        doc.setFontSize(10);
        doc.setFontStyle('normal');

        // single line specs for footer border
        doc.setLineWidth(3);
        doc.setDrawColor(0, 0, 0);
        doc.line(10, 560, 840 - 10, 560);

        // get page numbers 
        const pageCount = doc.internal.getNumberOfPages();

        // For each page, print the page number and the total pages
        for (var i = 1; i <= pageCount; i++) {
          // Go to page i
          doc.setPage(i);
          //Print Page 1 of 4 for example
          doc.text('Page ' + String(i) + ' of ' + String(pageCount), 530, 820);
        } // get date 
        var today = new Date();
        var dd = today.getDate();

        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();

        today1 = dd + '/' + mm + '/' + yyyy;

        // get time in 12 h format 
        var hours = today.getHours();
        var minutes = today.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        strTime = hours + ':' + minutes + ' ' + ampm;
        doc.setTextColor(0, 0, 0);
        doc.text("Generated on: " + today1, 10, 580);
        doc.text(strTime, 140, 580);


      }

      var options = { // variable for autotable for table specs 

        beforePageContent: header,

        afterPageContent: footer,

        margin: {
          top: 200,
          left: 20,
          right: 20,
          bottom: 45
        },
        //drawHeaderCell: function (cell, data) {        >>>>>>>>>>>controling individual column
        //  console.log(cell.text[0]);

        //  if (cell.text[0] ==='No.') {//paint.Name header red
        // cell.styles.fontSize= 12;
        //   cell.styles.textColor = [255,255,255];
        //   cell.styles.fillColor = "#43a089";
        //   console.log('pop');
        // } else {
        //     cell.styles.textColor = 255;
        //     cell.styles.fontSize = 10;

        // }
        //},


        startY: false,
        theme: 'grid',
        tableWidth: 'auto',
        columnWidth: 'wrap',
        showHeader: 'everyPage',
        tableLineColor: 200,
        tableLineWidth: 2,
        columnStyles: {
          0: {
            columnWidth: 'auto',
            halign: 'center'
          },
          1: {
            columnWidth: 'auto',
            halign: 'center'
          },
          2: {
            columnWidth: 'auto',
            halign: 'center'
          },
          3: {
            columnWidth: 'auto',
            halign: 'center'
          },
          4: {
            columnWidth: 'auto',
            halign: 'center'
          },
          5: {
            columnWidth: 'auto',
            halign: 'center'
          },
          6: {
            columnWidth: 'auto',
            halign: 'center'
          },
          7: {
            columnWidth: 'auto',
            halign: 'center'
          },
          8: {
            columnWidth: 'auto',
            halign: 'center'
          },
          9: {
            columnWidth: 'auto',
            halign: 'center'
          },
          10: {
            columnWidth: 'auto',
            halign: 'center'
          },
          11: {
            columnWidth: 'auto',
            halign: 'center'
          },
          12: {
            columnWidth: 'auto',
            halign: 'center'
          },
          13: {
            columnWidth: 'auto',
            halign: 'center'
          },
          14: {
            columnWidth: 'auto',
            halign: 'center'
          },
          15: {
            columnWidth: 'auto',
            halign: 'center'
          },
          16: {
            columnWidth: 'auto',
            halign: 'center'
          },
          17: {
            columnWidth: 'auto',
            halign: 'center'
          },


        },
        headerStyles: {
          //   theme:'plain',
          halign: 'center',
          fontSize: 6,
          textColor: [0, 0, 0],
          fillColor: [62, 161, 255],
        },
        footerStyles: {
          theme: 'plain',
          halign: 'center'
        },
        styles: {

          overflow: 'linebreak',
          columnWidth: 'wrap',
          font: 'arial',
          fontSize: 5,
          textColor: [0, 0, 0],
          //fillColor: [180,218,255],
          cellPadding: 8,
          overflowColumns: 'linebreak',
          halign: 'right'
        },
      };



      let odd_no = 0;
      var res1 = doc.autoTableHtmlToJson(document.getElementById("testTable"));

      doc.autoTable(res1.columns, res1.rows, options);

      doc.save("Energy_Usage_Report" + today1 + ".pdf");
    }
  </script>
  <script type="text/javascript" src="./js_libraries/jspdf.debug.js"></script>
  <script type="text/javascript" src="./js_libraries/jspdf.plugin.autotable.js"></script>
</body>

</html>