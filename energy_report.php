<?php
session_start();
if (!isset($_SESSION['auth'])) {
  // not logged in
  header('Location:index.php');
}
$start_time = date('Y-n-j G:i');
$end_time = date('Y-n-j G:i');
$date = $_POST['start_date'];
$start_time = date($date);
$start_date = date('Y-n-j', strtotime($date));
$end = $_POST['end_date'];
$end_date = date('Y-n-j', strtotime($end));
$end_time = date($end);
date_default_timezone_set("Asia/Karachi");
$current_date = date("Y-n-j");
include('calculations/mongodb_conn.php');
$collection = $db->naubahar_activetags;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head.php'); ?>
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
                      <h4 class="m-b-10">Energy Cost Report</h4>
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
                      <li class="breadcrumb-item"><a href="#!" style="color: #284497">Energy Cost Report</a>
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
                        <h4 style="padding-top:3px"> Energy Cost Report <a href="energy_cost.php"><span style="float:right; margin-top: -13px;"><i class="fa fa-arrow-circle-left" style="font-size:47px;"></i></span></a></h4>
                      </div>
                    </div>
                    <!--  <div> -->
                    <!-- Invoice card start -->
                    <div class="card" style="border-radius: 10px !important;border-top:5px solid;border-color:#7699d4;">
                      <div class="row invoice-contact">
                        <div class="col-md-12">
                          <div class="invoice-box row">
                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-12" style="margin-left:10px;height:35px">
                                  <h4 style="color: #0047AB;">Naubahar</span> B<span><img src="assets\images\Pepsi-Logo.png" width="35px" height="20px"></span>ttling Company<small class="float-right">
                                      <div style="margin-right:20px;color:black ">Energy Cost Report</div>
                                    </small></h4>
                                </div>
                              </div>
                              <hr>
                              <div class="float-right" style="padding-right: 10px;">
                                <p><?php echo date("d-m-Y", strtotime($date)) . ", " . date("h:i:sa") . " " . "-" . " " . date("d-m-Y", strtotime($end)) . "," . ' 12:00:00 AM (Pakistan Standard Time) '; ?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="dropdown" style="margin-left:12px">
                        <button class="btn  dropdown-toggle" style="background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0); color:white;" type="button" data-toggle="dropdown">Export
                          <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li style="background-color: #e9e9ed; border-bottom: 1px solid #d0d0d0;">
                            <button onclick="ExportToExcel('xlsx')" class="btn">Export To Excel</button>
                          </li>
                          <li style="background-color: #e9e9ed;">
                            <input type="button" class="btn " onclick="generate()" value="Export To PDF" />
                          </li>
                        </ul>
                      </div>
                      </p><br>
                      <div class="card-block" style="padding:0px 20px 0px 0px; ">
                        <div class="row invoive-info">
                          <!-- <div class="col-md-4 col-xs-12 invoice-client-info">
                                  <h6>FROM </h6>
                                  <h6 class="m-0"><b>Jahaann Technology</b></h6>
                                  <p class="m-0 m-t-10">22-C Block, G.E.C.H.S,<br>
                                  Phase 3 Peco Road,Lahore, Pakistan,<br>
                                  Phone: +924235949261<br>
                                  Email: info@jahaann.com</p>
                                </div> -->
                          <table width="100%">
                            <tr>
                              <td width="60%" style="border-top: 0px !important;"></td>
                              <td width="20%" height="30" style="border-top:solid 1px !important;background-color:#7699d4; text-align:center; color: white;font-size: 17px;border: solid 1px"><b>Start Date</b></td>

                              <td width="20%" style="border-top: solid 1px !important;background-color:#7699d4; text-align:center; color: white;font-size: 17px;border: solid 1px"><?php echo date("d-m-Y", strtotime($date)); ?></td>
                            </tr>
                            <tr>
                              <td width="60%" style="border-top: 0px !important;"></td>
                              <td width="20%" height="30" style="border-top:solid 1px !important;background-color:#D4D4D4;text-align:center;font-size: 17px;"><b>End Date</b></td>

                              <td width="20%" style="border-top: 0px !important;background-color:#D4D4D4;text-align:center;font-size: 17px;"><?php echo date("d-m-Y", strtotime($end)); ?></td>
                            </tr>
                            <tr>
                              <td width="60%" style="border-top: 0px !important;"><b style="font-size:22px;"></b></td>
                              <td width="20%" height="30" style="border-top:solid 1px !important;background-color:#7699d4; text-align:center; color: white; font-size: 17px;border: solid 1px"><b>Unit Cost (Rs.)</b></td>

                              <td width="20%" style="border-top:solid 1px !important;background-color:#7699d4; text-align:center; color: white;border: solid 1px"> <?php echo  number_format($_POST['unit'],2)  ?></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="table-responsive">
                            <table class="table table-bordered table-responsive-md table-striped" id="testTable" style="text-align:center;">
                              <thead>
                                <tr style="background-color:#7699d4; color: white;">
                                  <th class="w-1" style="font-size: 15px;">
                                    <center>No.</center>
                                  </th>
                                  <th class="w-1" style="font-size: 15px;">
                                    <center>Sources</center>
                                  </th>
                                  <th class="w-1" style="font-size: 15px;">
                                    <center>kWh</center>
                                  </th>
                                  <th class="w-1" style="font-size: 15px;">
                                    <center>Cost for Tariff (Rs.)</center>
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i = 1;
                                $total_cost = 0;
                                foreach ($_POST['radio'] as $sources) {
                                  $Tag = $sources . '_ActiveEnergy_Delivered_kWh';
                                  $start = $start_date;
                                  $mongotime1 = new MongoDB\BSON\UTCDateTime(strtotime($start . 'T00:00:00+05:00'));
                                  $val1 = json_decode(json_encode($mongotime1), true);
                                  foreach ($val1 as $key => $value) {
                                    foreach ($value as $sub_key => $sub_value) {
                                      $a1 = $sub_value;
                                    }
                                  }
                                  $start_date1 = intval($a1);
                                  $ending = date('Y-n-j', strtotime($end_date));
                                  $endd = $ending;
                                  $mongotime2 = new MongoDB\BSON\UTCDateTime(strtotime($endd . 'T23:45:20+05:00'));
                                  $val2 = json_decode(json_encode($mongotime2), true);
                                  foreach ($val2 as $key => $value) {
                                    foreach ($value as $sub_key => $sub_value2) {
                                      $a2 = $sub_value2;
                                    }
                                  }
                                  $new_end1 = intval($a2);
                                  $where = array(
                                    'UNIXtimestamp' =>  array('$gte' => $start_date1, '$lte' => $new_end1)
                                  );
                                  $select_fields = array(
                                    $Tag => 1,
                                    'timestamp' => 1,
                                    'UNIXtimestamp' => 1
                                  );
                                  $options = array(
                                    'projection' => $select_fields
                                  );
                                  $cursor = $collection->find($where, $options);   //This is the main line
                                  // var_dump($cursor);

                                  $docs = $cursor->toArray();
                                  $index = 0;
                                  foreach ($docs as $document) {
                                    json_encode($document);
                                    // var_dump($document);
                                    foreach ($document as $key => $value) {
                                      $term[$index][$key] = $value;
                                      if (!empty($document[$Tag])) {
                                        $arr[] = $document[$Tag];
                                      }
                                    }
                                    $index++;
                                  }
                                  $index--;
                                  // var_dump($term);
                                  // var_dump($document);
                                  if (!empty($arr)) {
                                    $first_index = key($arr);
                                    $first = $arr[$first_index];
                                    // echo $first.'first<br>';
                                    $end = end($arr);

                                    // echo $end.'end<br>';
                                    $kwh = $end - $first;
                                    $kwh = round($kwh, 2);
                                  } else {
                                    $kwh = 0;
                                  }
                                  unset($arr);
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
                                  <tr align="center">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $meters; ?></td>
                                    <td><?php echo number_format($kwh); ?></td>
                                    <td><?php echo number_format(round($kwh * $_POST['unit'], 2)); ?></td>
                                  </tr>
                                <?php

                                  $i++;
                                  $total_cost += $kwh * $_POST['unit'];
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <table class="table table-responsive invoice-table invoice-total">
                            <tbody>

                              <tr>
                              <tr class="text-info">
                                <td>
                                  <h5 class="text-primary">Energy Cost Total (Rs.) :</h5>
                                </td>
                                <td>
                                  <h5 class="text-primary">&nbsp;<?php echo number_format($total_cost);  ?></h5>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
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
    function ExportToExcel(type, fn, dl) {
      var elt = document.getElementById('testTable');
      var wb = XLSX.utils.table_to_book(elt, {
        sheet: "sheet1"
      });
      return dl ?
        XLSX.write(wb, {
          bookType: type,
          bookSST: true,
          type: 'base64'
        }) :
        XLSX.writeFile(wb, fn || ('Energy_Cost.' + (type || 'xlsx')));
    }
  </script>
  <script src="assets\js\script1.js"></script>
  <script type="text/javascript" src="./js_libraries/jspdf.debug.js"></script>
  <script type="text/javascript" src="./js_libraries/jspdf.plugin.autotable.js"></script>
</body>

</html>