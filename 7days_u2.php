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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recent Alarms</title>
  <style>
    table {
      background: #f5f5f5;
      box-shadow: inset 0 1px 0 #fff;
      font-size: 16px;
      line-height: 24px;
      margin: 30px auto;
      text-align: left;
      width: 100%;
    }

    th {
      color: #333333;
      width: 50px;
      background-color: #ffffff;
      font-weight: bold;
      font-size: 16px;
      border-top: solid 2px #6794dc;
      border-radius: 5px;
      text-align: center;
      font-family: Arial, Vardana;
    }

    td {
      border-top: 1px solid #fff;
      border-bottom: 1px solid #e8e8e8;
      padding: 11px 16px 12px 20px;
      position: relative;
      transition: all 300ms;
      /* height: 35px;*/
      text-align: center;
      font-size: 14.5px;
      font-family: Arial, Vardana;
      /*color: #333333;*/
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

    #select {
      width: 200px;
      border-width: 1px;
      border-color: #9f9fa3;
      border-style: solid;
      border-radius: 3px;
      background-color: #fff;
      -webkit-box-shadow: inset 0px 1px 3px 0px rgb(98 100 105 / 20%);
      box-shadow: inset 0px 1px 3px 0px rgb(98 100 105 / 20%);
      height: 28px;
      font-size: 17px;
      font-family: "Arial";
      color: rgb(0, 0, 0);
      padding: 2px 0px 1px 6px;
      float: right;
    }
  </style>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <!-- Pre-loader start -->
  <?php include('includes/preloader.php'); ?>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      <!-- header start -->
      <?php include('includes/header1.php'); ?>
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
                      <h4 class="m-b-10">Recent Alarms - Unit 2</h4>
                      <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <ul class="breadcrumb-title">
                      <li class="breadcrumb-item">
                        <a href="#"> <i class="fa fa-home"></i> </a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!" style="color: #284497">Alarms</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div>
                <?php
                // Username is root
                $user = 'jahaann';
                $password = 'Jahaann#321';
                // Database name is geeksforgeeks
                $database = 'alarms_unit2';
                // Server is 65.0.16.20 with
                // port number 3306
                $Username = '65.0.16.20';
                $mysqli = new mysqli(
                  $Username,
                  $user,
                  $password,
                  $database
                );
                $con = mysqli_connect('65.0.16.20', 'jahaann', 'Jahaann#321', 'alarms_unit2');
                // Checking for connections
                if ($mysqli->connect_error) {
                  die('Connect Error (' .
                    $mysqli->connect_errno . ') ' .
                    $mysqli->connect_error);
                }
                $sql = "
                    SELECT * FROM (
                        SELECT 
                            t1.Source, 
                            t1.Status, 
                            t1.Value,
                            t2.start, 
                            t2.end,
                            CONCAT(
                                FLOOR(MOD(TIMESTAMPDIFF(SECOND, t2.start, t2.end), 216000) / 3600), ' hours ',
                                FLOOR(MOD(TIMESTAMPDIFF(SECOND, t2.start, t2.end), 3600) / 60), ' Minutes ',
                                MOD(TIMESTAMPDIFF(SECOND, t2.start, t2.end), 60), ' Seconds '
                            ) AS Duration
                        FROM test_unit2 t1
                        JOIN (
                            SELECT 
                                Source, 
                                Status, 
                                MIN(Time) AS start, 
                                MAX(Time) AS end
                            FROM test_unit2
                            GROUP BY Source, Status
                        ) t2 ON t1.Source = t2.Source 
                            AND t1.Status = t2.Status 
                            AND t1.Time = t2.end
                    ) AS SUB
                    WHERE start >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                    AND DAY(start) != DAY(CURDATE())
                    ORDER BY start DESC;
                ";

                $result = $mysqli->query($sql);
                $mysqli->close();
                ?>
                <!-- /.card-header -->
                <div id='content'>
                  <div class="card-body" style="overflow:auto;">
                    <table class="display" id="example">
                      <thead>
                        <tr>
                          <th>
                            <h4 style="color: #333333;font-family: Arial, Verdana;line-height:1.428571429 ; font-weight: bold;font-size: 20px;left: 5px;width: 137px;"><b>Alarm History</b>__Recent Alarms</h4>
                          </th>
                          <th>
                            <div style="margin-left: 350px;" class="dropdown">
                              <select name="forma" id="select" size="1" onchange="window.location.href=this.value;">
                                <option value="7days_u2.php">Last 7 days</a></option>
                                <option value="Today_u2.php">Today</a></option>
                                <option value="15days_u2.php">Last 15 days</a></option>
                                <option value="30days_u2.php">Last 30 days</a></option>
                              </select>
                          <th></th>
                          <th></th>
                          <th></th>
                  </div>
                </div>
                </th>
                </tr>
                <tr>
                  <th></th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Duration</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  while ($rows = $result->fetch_assoc()) {
                  ?>
                    <tr>
                      <?php if ($rows['Status'] == 'Low Power Factor' || $rows['Status'] == 'Low Voltage') {
                      ?>
                        <td class="gfgusername" width="100%" height="30" style="border-left: 5px solid #C69F26;text-align: left;  font-weight: 550;"><b><?php echo $rows['Source']; ?></b><span style="color:#C69F26">(<?php echo $rows['Status']; ?>)</span> <br> <?php echo $rows['Value']; ?> </td>
                      <?php } elseif ($rows['Status'] == 'High Current' || $rows['Status'] == 'High Voltage') { ?>
                        <td class="gfgusername" width="100%" height="30" style="border-left: 5px solid red;  text-align: left;  font-weight: 550; "><b><?php echo $rows['Source']; ?></b> <span style="color:red">(<?php echo $rows['Status']; ?>)</span><br> <?php echo $rows['Value']; ?> </td>
                      <?php }  ?>
                      <td class="gfgpp" width="100%" height="30" style="font-weight: 500;"><?php echo  $rows['start']; ?> </td>
                      <td class="gfgpp" width="100%" height="30" style="font-weight: 500;"><?php echo  $rows['end']; ?> </td>
                      <td><?php echo $rows['Duration']; ?>

                      <td class=" gfgpps" style=" font-weight: 500;display: none;"> <?php echo $rows['start']; ?> </td>
                      <td class=" gfgscores" style="display: none;"> <?php echo $rows['Value']; ?> </td>

                      <?php if ($rows['Status'] == 'Low Power Factor' || $rows['Status'] == 'Low Voltage') {
                      ?>
                        <td class=" gfgarticles" style="display: none;">
                          <h4 style=color:blue>Low Priority Alarm</h4>
                        </td>
                      <?php } elseif ($rows['Status'] == 'High Current' || $rows['Status'] == 'High Voltage') { ?>
                        <td class=" gfgarticles" style="display: none;">
                          <h4 style=color:red>High Priority Alarm</h4>
                        </td>
                      <?php } ?>
                      <td class=" gfget" style="display: none;"><?php echo $rows['Time']; ?> </td>

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
  </div>
  <?php include('includes/footer.php'); ?>
  <script>
    $(function() {
      // ON SELECTING ROW
      $(".gfgselect").click(function() {
        //FINDING ELEMENTS OF ROWS AND STORING THEM IN VARIABLES
        var a =
          $(this).parents("tr").find(".gfgusername").text();
        var c =
          $(this).parents("tr").find(".gfgpp").text();
        var d =
          $(this).parents("tr").find(".gfgscores").text();
        var e =
          $(this).parents("tr").find(".gfgarticles").text();
        var f =
          $(this).parents("tr").find(".gfget").text();
        var p = "";
        // CREATING DATA TO SHOW ON MODEL
        p +=
          "<p id='a' name='GFGusername'  style='color:#036ffc;border-left:7px dotted  Green;border-bottom:2px solid black' >Id : " +
          a + " </p>";

        p +=
          "<p id='c' name='GFGpp'  style='color:#036ffc;border-left:7px dotted  Green;border-bottom:2px solid black'>Occurrence_date : " +
          c + "</p>";
        p +=
          "<p id='d' name='GFGscores'  style='color:#036ffc;border-left: 7px  dotted  Green;border-bottom:2px solid black'>Value: " +
          d + " </p>";
        p +=
          "<p id='e' name='GFGcoding'  style='color:#036ffc;border-left:7px dotted  Green;border-bottom:2px solid black'>Status: " +
          e + " </p>";
        //           p += 
        //   "<p id='e' name='GFGcoding'  style='color:#036ffc;border-left:7px dotted  Green;border-bottom:2px solid black'>Occurrence_Time : "
        //           + f + " </p>";
        //CLEARING THE PREFILLED DATA
        $("#divGFG").empty();
        //WRITING THE DATA ON MODEL
        $("#divGFG").append(p);
      });
    });
  </script>
  <div class="container">

    <!-- Button to Open the Modal -->


    <!-- The Modal -->
    <div class="modal fade" role="dialog" id="gfgmodal">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h3 id="myModalLabel">Alarms Naubahar Unit 1</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body" id="divGFG">
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

  </div>

  <?php
  function getDateTimeDiff($date)
  {
    $now_timestamp = strtotime(date('Y-m-d H:i:s'));
    $diff_timestamp = $now_timestamp - strtotime($date);

    if ($diff_timestamp < 60) {
      return 'few seconds ago';
    } else if ($diff_timestamp >= 60 && $diff_timestamp < 3600) {
      return round($diff_timestamp / 60) . ' mins ago';
    } else if ($diff_timestamp >= 3600 && $diff_timestamp < 86400) {
      return round($diff_timestamp / 3600) . ' hours ago';
    } else if ($diff_timestamp >= 86400 && $diff_timestamp < (86400 * 30)) {
      return round($diff_timestamp / (86400)) . ' days ago ';
    } else if ($diff_timestamp >= (86400 * 30) && $diff_timestamp < (86400 * 365)) {
      return round($diff_timestamp / (86400 * 30)) . ' months ago';
    } else {
      return round($diff_timestamp / (86400 * 365)) . ' years ago ';
    }
  }
  ?>
  <script>
    $("Select").click(function() {
      var open = $(this).data("isopen");
      if (open) {
        window.location.href = $(this).val()
      }
      //set isopen to opposite so next time when use clicked select box
      //it wont trigger this event
      $(this).data("opposite", !open);
    });
  </script>
</body>

</html>