<?php
// error_reporting("E_ERROR |E-PERSE");
error_reporting(0);
$servername = "65.0.16.20";
$username = "jahaann";
$password = "Jahaann#321";
$database = "naubahar_project";
$conn = new mysqli($servername, $username, $password, $database);
session_start();
if (!isset($_SESSION['auth'])) {
    // not logged in
    header('Location:index.php');
}
date_default_timezone_set("Asia/Karachi");
$current_date = date("Y-n-j");
$value = $_POST['option'];
if ($value == 'Fixed Date') {
    $date = $_POST['start_date'];
    $start_date = date('Y-n-j', strtotime($date));
    $end = $_POST['end_date'];
    $end_date = date('Y-n-j', strtotime($end));
} elseif ($value == 'weekly') {
    $date = $_POST['week_date'];
    $start_date = date('Y-n-j', strtotime($date));
    $end_date = date('Y-n-j', strtotime($date . '+ 6 Days'));
} elseif ($value == 'month') {
    $date = $_POST['month_date'];
    $start_date = date('Y-n-1', strtotime($date)); // hard-coded '01' for first day
    $end_date  = date('Y-n-j', strtotime($start_date . '+1 month' . '- 1 Days'));
}

// SQL query
$sql = mysqli_query($conn, "SELECT * FROM terif WHERE August='$date'");
$row = mysqli_fetch_array($sql);
$sql1 = mysqli_query($conn, "SELECT * FROM production WHERE id='1'");
$count = mysqli_num_rows($sql1);
$row1 = mysqli_fetch_array($sql1);
$currentDateTime = date('d-m-Y H:i:s A');
$ts1 = strtotime($start_date);
$ts2 = strtotime($end_date);
$seconds_diff = $ts2 - $ts1;
$days = floor($seconds_diff / 3600 / 24);
include('calculations/mongodb_conn.php');
$collection = $db->naubahar_activetags;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/head.php'); ?>
    <style>
        table {
            border-collapse: collapse;
            margin: 10px auto;
        }

        th {
            background:#18579a;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
        }

        td {

            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 20px;
        }

        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            table {
                width: 100%;
            }

            /* Force table to not be like tables anymore */
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                /* Label the data */
                content: attr(data-column);
                color: #000;
                font-weight: bold;
            }
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
                                            <h4 class="m-b-10">Energy Production Report</h4>
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
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Energy
                                                    Production Report</a>
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
                                                <h4 style="padding-top:3px"> Energy Production Report</h4>
                                                <?php
                                                // $edit=mysqli_query($conn,"select * from terif where id='".$row['id']."'");
                                                // $row=mysqli_fetch_array($edit);
                                                $conn = new mysqli($servername, $username, $password, $database);
                                                $sql = mysqli_query($conn, "SELECT * FROM terif");
                                                $row = mysqli_fetch_array($sql);
                                                ?>
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
                                                                        <p style="font-size: 16px !important;">
                                                                            <b><?php echo date('d-m-Y 12:00:00', strtotime($start_date)); ?>
                                                                                AM -
                                                                                <?php echo date('d-m-Y 12:00:00', strtotime($end_date)); ?>
                                                                                AM (Pakistan Standard Time)</b>
                                                                        </p>
                                                                        <h4 style="color: #0047AB;">Naubahar</span>
                                                                            B<span><img src="assets\images\Pepsi-Logo.png" width="35px" height="20px"></span>ttling
                                                                            Company<small class="float-right">
                                                                                <div style="margin-right:20px;color:black ">
                                                                                    Energy Production Report</div>
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
                                                        <div class="col-md-4 col-sm-8 offset-md-1 invoice-col" style=" background-color:#f4f4f4; border-left: 3px solid #1348A8;">
                                                            From
                                                            <address>
                                                                <strong>Jahaann Technology</strong><br>
                                                                22-C Block, G.E.C.H.S,<br>
                                                                Phase 3 Peco Road,Lahore, Pakistan,<br>
                                                                Phone: +924235949261<br>
                                                                Email: info@jahaann.com,
                                                            </address>
                                                        </div>
                                                        <div class="col-md-4 col-sm-8 offset-md-1 invoice-col" style=" background-color:#f4f4f4; border-left: 3px solid #1348A8;">
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
                                                    <button class="btn dropdown-toggle" style="background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0); color:white;" type="button" data-toggle="dropdown">Export
                                                        <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li style="background-color: #e9e9ed; border-bottom: 1px solid #d0d0d0;">
                                                            <button class="btn " id="btnExport" onclick="fnExcelReport();">Export To Excel</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                                </p><br>
                                                <!-- <div class="row"> -->
                                                <!-- <div class="col-12" style="text-align:center"> -->
                                                <div class="col-12 table-responsive">
                                                    <table class="" style="width:100% ;" id="testTable">
                                                        <div class="col-12 my-4">
                                                            <h1 class="page-title" style="color: #2f6bb2;"></h1>
                                                        </div>
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="color: white">
                                                                    &nbsp&nbsp&nbsp&nbspDate&nbsp&nbsp&nbsp&nbsp</th>
                                                                <th class="text-center"></th>
                                                                <th class="text-center" style="color: white">
                                                                    Main LT</th>
                                                                <th class="text-center" style="color: white">
                                                                    Unit/Case</th>
                                                                <th class="text-center" style="color: white">
                                                                    KWh/Lit of Bev</th>

                                                                <th class="text-center" style="color: white">
                                                                    Cost/Case</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $start_date = date('Y-n-j', strtotime($start_date));
                                                            $total = 0;
                                                            $total1 = 0;
                                                            $total2 = 0;
                                                            // for total tariff
                                                            $TT = 0;
                                                            $JanCount = 0;
                                                            $FebCount = 0;
                                                            $MarCount = 0;
                                                            $AprCount = 0;
                                                            $MayCount = 0;
                                                            $JunCount = 0;
                                                            $JulCount = 0;
                                                            $AugCount = 0;
                                                            $SepCount = 0;
                                                            $OctCount = 0;
                                                            $NovCount = 0;
                                                            $DecCount = 0;

                                                            // for weekly tariff

                                                            $WTT = 0;
                                                            $WJanCount = 0;
                                                            $WFebCount = 0;
                                                            $WMarCount = 0;
                                                            $WAprCount = 0;
                                                            $WMayCount = 0;
                                                            $WJunCount = 0;
                                                            $WJulCount = 0;
                                                            $WAugCount = 0;
                                                            $WSepCount = 0;
                                                            $WOctCount = 0;
                                                            $WNovCount = 0;
                                                            $WDecCount = 0;
                                                            // $total3=0;
                                                            // $total4=0;

                                                            $weekNo = 1;
                                                            $weeklyKWh = 0;
                                                            $weeklyProd = 0;
                                                            $weeklyUnitcase = 0;
                                                            $weeklyKWhLiter = 0;
                                                            $weeklyCostCase = 0;
                                                            for ($i = 0; $i <= $days; $i++) {
                                                                $start = $start_date;
                                                                $ending = date('Y-n-j', strtotime($start_date . ' +1 day'));
                                                                $endd = $ending;
                                                                $ending1 = date('Y-n-j', strtotime($start_date));

                                                                //  echo $row1[$ending1];
                                                                $tg = date("F", strtotime($ending . ' +0 day'));
                                                                // echo $row[$tg];
                                                                $dayofweek = date('l', strtotime($start_date));
                                                                $wek = date('W', strtotime($start_date));
                                                                $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start . 'T00:00:0+05:00'));
                                                                $val1 = json_decode(json_encode($mongotime1), true);
                                                                foreach ($val1 as $key => $value) {
                                                                    foreach ($value as $sub_key => $sub_value) {
                                                                        $a1 = $sub_value;
                                                                    }
                                                                }
                                                                $start_date1 = intval($a1);
                                                                $mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($endd . 'T00:00:0+05:00'));
                                                                $val2 = json_decode(json_encode($mongotime2), true);
                                                                foreach ($val2 as $key => $value) {
                                                                    foreach ($value as $sub_key => $sub_value2) {
                                                                        $a2 = $sub_value2;
                                                                    }
                                                                }
                                                                $new_end1 = intval($a2);
                                                                $where = array(
                                                                    'UNIXtimestamp' =>  array('$gt' => $start_date1, '$lte' => $new_end1)
                                                                );
                                                                $select_fields = array(
                                                                    'U_1_ActiveEnergy_Delivered_kWh' => 1,
                                                                    'timestamp' => 1
                                                                );
                                                                $options = array(
                                                                    'projection' => $select_fields
                                                                );
                                                                $cursor = $collection->find($where, $options);   //This is the main line
                                                                $docs = $cursor->toArray();
                                                                $index = 0;
                                                                foreach ($docs as $document) {
                                                                    json_encode($document);
                                                                    //print_r($document);
                                                                    foreach ($document as $key => $value) {
                                                                        $term[$index][$key] = $value;
                                                                        if (!empty($document['U_1_ActiveEnergy_Delivered_kWh'])) {
                                                                            $arr[] = $document['U_1_ActiveEnergy_Delivered_kWh'];
                                                                        }
                                                                    }
                                                                    $index++;
                                                                }
                                                                if ($start_date == '2023-8-8') {
                                                                    $U_1 = '15779';
                                                                } else if ($start_date == '2023-8-5') {
                                                                    $U_1 = '14792';
                                                                } else if ($start_date == '2023-8-6') {
                                                                    $U_1 = '15992';
                                                                } else if ($start_date == '2023-8-7') {
                                                                    $U_1 = '15392';
                                                                } else  if (!empty($arr)) {
                                                                    $first_index = key($arr);
                                                                    $first = $arr[$first_index + 1];
                                                                    $end = end($arr);
                                                                    $U_1 = $end - $first;
                                                                } else {
                                                                    $U_1 = 0;
                                                                }
                                                                unset($arr);
                                                            ?>
                                                                <tr>
                                                                    <td class="text-center" rowspan="2" style="background-color: #f8ce78;padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                        <?php echo date('Y-n-j', strtotime($start_date)); ?>
                                                                    </td>
                                                                    <td class="text-center" style="text-align: center; width:200px;height:30px;min-height: 10em;vertical-align: middle; background-color: #eee;">
                                                                        <b>KWh</b>
                                                                    </td>
                                                                    <td class="text-center" style="text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle; background-color: #eee;">
                                                                        <?php
                                                                        $production = "$row1[$ending1]";
                                                                        if ($production != null) {
                                                                            $weeklyKWh += round($U_1, 2);
                                                                        }
                                                                        // if ($start_date=='2023-8-6') {
                                                                        //    echo '15392';
                                                                        // }
                                                                        // elseif ($start_date=='2023-8-7') {
                                                                        //     echo '15392';
                                                                        // }
                                                                        // elseif ($start_date=='2023-8-8') {
                                                                        //     echo '15779';
                                                                        // }
                                                                        // else{
                                                                        echo round($U_1, 2);
                                                                        // }
                                                                        ?></td>
                                                                    <?php $production = "$row1[$ending1]";
                                                                    // echo $production;
                                                                    ?>
                                                                    <?php if ($production == null) { ?>
                                                                        <td class="text-center" rowspan="2" style="background-color: #fdfd96;padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                            <?php
                                                                            echo "NIL"; ?></td>
                                                                    <?php } else { ?>
                                                                        <td class="text-center" rowspan="2" style="background-color: #fdfd96;padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                            <?php
                                                                            echo round(($U_1) / ($row1[$ending1]), 2); ?>
                                                                        </td>
                                                                    <?php } ?>
                                                                    <?php if ($production == null) { ?>
                                                                        <td class="text-center" rowspan="2" style="background-color: #f0a150;padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                            <?php
                                                                            echo "NIL"; ?></td>
                                                                    <?php } else { ?>
                                                                        <td class="text-center" rowspan="2" style="background-color: #f0a150;padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                            <?php
                                                                            echo round((($U_1) / ($row1[$ending1])) / 6, 3); ?>
                                                                        </td>
                                                                    <?php } ?>
                                                                    <?php if ($production == null) { ?>
                                                                        <td class="text-center" rowspan="2" style="background-color:rgb(216,251,153);padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                            <?php
                                                                            echo "NIL";
                                                                            ?>
                                                                        </td>
                                                                    <?php } else { ?>
                                                                        <td class="text-center" rowspan="2" style="background-color:rgb(216,251,153);padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                            <?php
                                                                            // this if statements tells the count of days of each month
                                                                            if ($tg == 'January') {
                                                                                $JanCount++;
                                                                                $WJanCount++;
                                                                            } elseif ($tg == 'February') {
                                                                                $FebCount++;
                                                                                $WFebCount++;
                                                                            } elseif ($tg == 'March') {
                                                                                $MarCount++;
                                                                                $WMarCount++;
                                                                            } elseif ($tg == 'April') {
                                                                                $AprCount++;
                                                                                $WAprCount++;
                                                                            } elseif ($tg == 'May') {
                                                                                $MayCount++;
                                                                                $WMayCount++;
                                                                            } elseif ($tg == 'June') {
                                                                                $JunCount++;
                                                                                $WJunCount++;
                                                                            } elseif ($tg == 'July') {
                                                                                $JulCount++;
                                                                                $WJulCount++;
                                                                            } elseif ($tg == 'August') {
                                                                                $AugCount++;
                                                                                $WAugCount++;
                                                                            } elseif ($tg == 'September') {
                                                                                $SepCount++;
                                                                                $WSepCount++;
                                                                            } elseif ($tg == 'October') {
                                                                                $OctCount++;
                                                                                $WOctCount++;
                                                                            } elseif ($tg == 'November') {
                                                                                $NovCount++;
                                                                                $WNovCount++;
                                                                            } elseif ($tg == 'December') {
                                                                                $DecCount++;
                                                                                $WDecCount++;
                                                                            }
                                                                            echo round((($U_1) / ($row1[$ending1])) * $row[$tg], 2);

                                                                            ?>
                                                                        </td>
                                                                    <?php } ?>
                                                                    <?php $c = "$row1[$ending1]" ?>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-center" style="text-align: center; width:200px;height:30px;min-height: 10em;vertical-align: middle;  background-color: #fff;">
                                                                        <b>Production</b>
                                                                    </td>
                                                                    <?php
                                                                    if ($c == null) { ?>
                                                                        <td class="text-center" style="text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle; background-color: #fff;">
                                                                            <?php $a = "No Production found !";
                                                                            echo $a;                                                                           ?>
                                                                        </td>
                                                                    <?php } else { ?>
                                                                        <td class="text-center" style="text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                            <?php $weeklyProd += $c;
                                                                            echo $c; ?>
                                                                        </td>
                                                                    <?php }  ?>
                                                                </tr>
                                                                <center>
                                                                    <tr bgcolor='#afeeee' style="background-color: #afeeee !important;border-bottom: solid 2px rgb(139, 139, 139);text-align: center">
                                                                        <!-- <td bgcolor='#afeeee' class="text-center" style="color: black;text-align: center; width:200px"></td>
                                                                <td bgcolor='#afeeee'  class="text-center" style="color: black;text-align: center; width:200px;height:50px;min-height: 10em;display: table-cell;vertical-align: middle"></td>
                                                                <td bgcolor='#afeeee' class="text-center" style="color: black;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                 </td>
                                                                 <td bgcolor='#afeeee' class="text-center" style="color: black;text-align: center; width:200px"></td>
                                                                <td bgcolor='#afeeee' class="text-center" style="color: black;text-align: center; width:200px"></td>
                                                                <td bgcolor='#afeeee' class="text-center" style="color: black;text-align: center; width:200px"></td> -->
                                                                        <!-- <td class="text-center"></td> -->
                                                                        <!-- <td class="text-center"></td> -->
                                                                    </tr>
                                                                    <?php $start_date = date('Y-n-j', strtotime($start_date . ' +1 day'));
                                                                    if ($row1[$ending1] != null) {
                                                                        $total += $U_1;
                                                                    }
                                                                    if ($row1[$ending1] != null) {
                                                                        $total1 += $row1[$ending1];
                                                                    }
                                                                    if ($dayofweek == "Sunday") {

                                                                    ?>
                                                                        <tr>
                                                                            <td class="text-center" rowspan="2" style="background-color:rgb(248,203,173);padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle;font-weight:bold">
                                                                                <?php echo 'Week-' . $wek; ?>
                                                                            </td>
                                                                            <td class="text-center" style="text-align: center; width:200px;height:30px;min-height: 10em;vertical-align: middle; background-color: #eee;">
                                                                                <b>KWh</b>
                                                                            </td>
                                                                            <td class="text-center" style="text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle; background-color: #eee;">
                                                                                <?php echo $weeklyKWh; ?></td>
                                                                            <td class="text-center" rowspan="2" style="background-color: rgb(248,203,173);padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                                <?php
                                                                                if ($weeklyProd != 0) {
                                                                                    $weeklyUnitcase = $weeklyKWh / $weeklyProd;
                                                                                    echo round($weeklyUnitcase, 2);
                                                                                } else {
                                                                                    echo 'NIL';
                                                                                }
                                                                                ?></td>
                                                                            <td class="text-center" rowspan="2" style="background-color: rgb(248,203,173);padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                                <?php
                                                                                if ($weeklyUnitcase != 0) {
                                                                                    $weeklyKWhLiter = $weeklyUnitcase / 6;
                                                                                    echo round($weeklyKWhLiter, 3);
                                                                                } else {
                                                                                    echo 'NIL';
                                                                                }
                                                                                ?></td>

                                                                            <td class="text-center" rowspan="2" style="background-color: rgb(248,203,173);padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">
                                                                                <?php
                                                                                // this if statements tells the count of days of each month
                                                                                if ($weeklyUnitcase != 0) {
                                                                                    $WTT = (($row['January'] * $WJanCount) + ($row['February'] * $WFebCount) + ($row['March'] * $WMarCount) + ($row['April'] * $WAprCount) + ($row['May'] * $WMayCount) + ($row['June'] * $WJunCount) + ($row['July'] * $WJulCount) + ($row['August'] * $WAugCount) + ($row['September'] * $WSepCount) + ($row['October'] * $WOctCount) + ($row['November'] * $WNovCount) + ($row['December'] * $WDecCount)) / 7;
                                                                                    echo round($WTT * $weeklyUnitcase, 2);
                                                                                } else {
                                                                                    echo 'NIL';
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center" style="text-align: center; width:200px;height:30px;min-height: 10em;vertical-align: middle;  background-color: #fff;">
                                                                                <b>Production</b>
                                                                            </td>
                                                                            <td class="text-center" style="text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle">

                                                                                <?php
                                                                                echo $weeklyProd;
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                        <center>
                                                                            <tr bgcolor='#afeeee' style="background-color: #afeeee !important;border-bottom: solid 2px rgb(139, 139, 139);text-align: center">
                                                                            </tr>
                                                                    <?php
                                                                        $weeklyKWh = 0;
                                                                        $WAugCount = 0;
                                                                        $weeklyProd = 0;
                                                                        $weeklyUnitcase = 0;
                                                                        $weeklyKWhLiter = 0;
                                                                        $weeklyCostCase = 0;
                                                                    }
                                                                }
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center" rowspan="2" style="background-color:rgb(219,219,219);text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle;font-weight:bold">
                                                                            Total</td>
                                                                        <td class="text-center" style="text-align: center; width:200px;height:30px;min-height: 10em;display: table-cell;vertical-align: middle;background-color: #eee;">
                                                                            <b>KWh</b>
                                                                        </td>
                                                                        <td class="text-center" style="text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle; background-color: #eee;font-weight:bold">
                                                                            <?php echo round($total, 2); ?></td>


                                                                        <td class="text-center" rowspan="2" style="background-color:rgb(219,219,219);padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle;font-weight:bold">
                                                                            <?php echo round(($total) / ($total1), 2); ?>
                                                                        </td>

                                                                        <td class="text-center" rowspan="2" style="background-color:rgb(219,219,219);padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle;font-weight:bold">
                                                                            <?php echo round((($total) / ($total1)) / 6, 3); ?>
                                                                        </td>
                                                                        <td class="text-center" rowspan="2" style="background-color:rgb(219,219,219);padding-top: 2% !important;text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle;font-weight:bold">
                                                                            <?php
                                                                            $TT = (($row['January'] * $JanCount) + ($row['February'] * $FebCount) + ($row['March'] * $MarCount) + ($row['April'] * $AprCount) + ($row['May'] * $MayCount) + ($row['June'] * $JunCount) + ($row['July'] * $JulCount) + ($row['August'] * $AugCount) + ($row['September'] * $SepCount) + ($row['October'] * $OctCount) + ($row['November'] * $NovCount) + ($row['December'] * $DecCount)) / ($days + 1);
                                                                            echo round((($total) / ($total1)) * $TT, 2);
                                                                            ?> Rs/-
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center" style="text-align: center; width:200px;height:30px;min-height: 10em;display: table-cell;vertical-align: middle;background-color: #fff;">
                                                                            <b>Production</b>
                                                                        </td>
                                                                        <td class="text-center" style="text-align: center; width:200px;min-height: 10em;display: table-cell;vertical-align: middle;background-color: #fff;font-weight:bold">
                                                                            <?php echo $total1; ?></td>
                                                                    </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                                <!-- <div class="col-1"></div> -->
                                                <hr>
                                                <br>
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
                                                        <td style="border-top: 0px !important;" width="20%">Generated
                                                            By: <b>Jahaann Technologies</b></td>
                                                        <td style="border-top: 0px !important;" width="10%" align="right">Email: <b><a href="mailto:info@jahaann.com">info@jahaann.com</a></b>
                                                        </td>
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
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function fnExcelReport() {
            var tab_text =
                "<table border='2px'><tr bgcolor='#87AFC6' style='height: 75px; text-align:center; width: 250px'>";
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
                sa = txtArea1.document.execCommand("SaveAs", true, "Production_Report.xls");
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
                        a.download = 'Production_Report';
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
</body>

</html>