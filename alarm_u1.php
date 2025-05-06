<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location:index.php');
}
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set('Asia/Karachi');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/head.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">
    <style>
        table {
            margin: 0 auto;
            background: #f5f5f5;
            border-collapse: separate;
            box-shadow: inset 0 1px 0 #fff;
            overflow-y: scroll;
            font-size: 14px;
            line-height: 24px;
            margin: 30px auto;
            text-align: left;
            width: 800px;
        }

        th {
            color: #333333;
            width: 200px;
            background-color: #F2F2F2;
            border: 2px solid #CBCBCB;
            border-color: #cbcbcb;
            padding: 10px 18px;

        }

        td {
            border-top: 1px solid #fff;
            border-bottom: 1px solid #e8e8e8;
            padding: 10px 15px;
            position: relative;
            transition: all 300ms;
            height: 35px;
        }

        td:first-child {
            box-shadow: inset 1px 0 0 #fff;
        }

        td:last-child {
            border-right: 1px solid #e8e8e8;
            box-shadow: inset -1px 0 0 #fff;
        }

        tr {
            background: url(https://jackrugile.com/images/misc/noise-diagonal.png);
        }

        tr:nth-child(odd) td {
            background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png);
        }

        tr:last-of-type td {
            box-shadow: inset 0 -1px 0 #fff;
        }

        tr:last-of-type td:first-child {
            box-shadow: inset 1px -1px 0 #fff;
        }

        tr:last-of-type td:last-child {
            box-shadow: inset -1px -1px 0 #fff;
        }

        tbody:hover tr:hover td {
            background-color: rgb(197, 228, 255);
        }

        table.dataTable.display>tbody>tr.odd>.sorting_1,
        table.dataTable.order-column.stripe>tbody>tr.odd>.sorting_1 {
            box-shadow: unset;

        }

        .summaryViewTable.dataTable td {
            border-bottom: solid 1px #cbcbcb;
        }

        table.summaryViewTable tbody td {
            padding: 10px 8px 10px 8px;
        }

        table.summaryViewTable {
            border-right: 2px solid #CBCBCB;
        }

        button {
            align-items: center;
            appearance: none;
            background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0);
            border: 0;
            border-radius: 6px;
            box-shadow: rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, rgba(58, 65, 111, .5) 0 -3px 0 inset;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        button:focus {
            box-shadow: #3c4fe0 0 0 0 1.5px inset, rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
        }

        button:hover {
            box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        button:active {
            box-shadow: #3c4fe0 0 3px 7px inset;
            transform: translateY(2px);
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
            <!-- header start -->
            <?php include('includes/header.php'); ?>
            <!-- header end -->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- sidebar start -->
                    <?php include('includes/sidebar.php'); ?>
                    <!-- sidebar end -->
                    <div class="pcoded-content">
                        <!-- Page-top start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h4 class="m-b-10">Alarm Status -All Alarms (Unit 1)</h4>
                                            <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"> <i class="fa fa-bell"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Alarms</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Alarms History</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $user = 'jahaann';
                            $password = 'Jahaann#321';
                            $database = 'testing';
                            $Username = '65.0.16.20';
                            $mysqli = new mysqli(
                                $Username,
                                $user,
                                $password,
                                $database
                            );
                            $con = mysqli_connect('65.0.16.20', 'jahaann', 'Jahaann#321', 'testing');
                            if ($mysqli->connect_error) {
                                die('Connect Error (' .
                                    $mysqli->connect_errno . ') ' .
                                    $mysqli->connect_error);
                            }
                            $sql = "
                                                    SELECT 
                                t.Source,
                                t.Status,
                                t.Value,
                                t.Time AS LastOccurence,
                                e.EventCount AS Occurences
                            FROM test t
                            JOIN (
                                SELECT Source, Status, MAX(Time) AS max_time, COUNT(*) AS EventCount
                                FROM test
                                GROUP BY Source, Status
                            ) e 
                            ON t.Source = e.Source 
                            AND t.Status = e.Status 
                            AND t.Time = e.max_time;

                        ";
                            $result = $mysqli->query($sql);

                            $mysqli->close();
                            ?>
                        </div>
                        <div class="card-body" style="overflow:auto;">
                            <table class="summaryViewTable hoverRows alarmSummaryViewTable dataTable no-footer" id="example">
                                <thead>
                                    <tr>
                                        <th>State</th>
                                        <th>Sources</th>
                                        <!-- <th>Value </th> -->
                                        <th>Status</th>
                                        <th>Last Occurence</th>
                                        <th>Occurences</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // var_dump($result->fetch_assoc());
                                    while ($rows = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <!--State Start-->
                                            <?php

                                            if ($rows['Status'] == 'Low Power Factor' || $rows['Status'] == 'Low Voltage') {
                                            ?>
                                                <td style="border-left: 5px solid #f7c90b;"><img src="assets\yellow.png" alt="jpg" width=15px style="margin-right: 50px;opacity: 0.5">
                                                    <?php echo  timeAgo($rows['LastOccurence']); ?> </td>
                                            <?php } elseif ($rows['Status'] == 'High Current' || $rows['Status'] == 'High Voltage') { ?>
                                                <td style="border-left: 5px solid red;"> <img src="assets\red.png" alt="jpg" width=15px style="margin-right: 50px;opacity: 0.4">
                                                    <?php echo  timeAgo($rows['LastOccurence']); ?> </td>
                                            <?php } ?>
                                            <td><?php echo $rows['Source']; ?></td>
                                            <?php if ($rows['Status'] == 'Low Power Factor' || $rows['Status'] == 'Low Voltage') { ?>
                                                <td style="color:#f7c90b;font-size:14px;font-weight: 800; !important">
                                                    <?php echo $rows['Status']; ?></td>
                                            <?php } elseif ($rows['Status'] == 'High Current' || $rows['Status'] == 'High Voltage') { ?>
                                                <td style="color:red;font-size:14px;font-weight: 800; !important">
                                                    <?php echo $rows['Status']; ?></td>
                                            <?php } ?>
                                            <td><?php echo $rows['LastOccurence']; ?></td>
                                            <td><?php echo $rows['Occurences']; ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./dist/js/tabler.min.js" defer></script>
    <script src="./dist/js/demo.min.js" defer></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <?php include('includes/footer.php'); ?>
    </div>
    <?php
    // $time_elapsed = timeAgo($date); //The argument $time_ago is in timestamp (Y-m-d H:i:s)format.
    function timeAgo($date)
    {
        date_default_timezone_set('Asia/Karachi');
        $time_ago = strtotime($date);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed;
        $minutes    = round($time_elapsed / 60);
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400);
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640);
        $years      = round($time_elapsed / 31207680);
        // Seconds
        if ($seconds <= 60) {
            return "just now";
        }
        //Minutes
        else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "one minute ago";
            } else {
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if ($hours <= 24) {
            if ($hours == 1) {
                return "an hour ago";
            } else {
                return "$hours hrs ago";
            }
        }
        //Days
        else if ($days <= 7) {
            if ($days == 1) {
                return "yesterday";
            } else {
                return "$days days ago";
            }
        }
        //Weeks
        else if ($weeks <= 4.3) {
            if ($weeks == 1) {
                return "a week ago";
            } else {
                return "$weeks weeks ago";
            }
        }
        //Months
        else if ($months <= 12) {
            if ($months == 1) {
                return "a month ago";
            } else {
                return "$months months ago";
            }
        }
        //Years
        else {
            if ($years == 1) {
                return "one year ago";
            } else {
                return "$years years ago";
            }
        }
    }
    ?>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                order: [
                    [3, 'desc']
                ],
                lengthChange: false,
                buttons: [{
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        'excel',
                        'pdf',
                    ]
                }]
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
</body>

</html>