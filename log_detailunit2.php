<?php
session_start();
if (!isset($_SESSION['auth'])) {
  // not logged in
  header('Location:index.php');
}
$meter = $_GET['meter'];
$type = $_GET['type'];
$val = $_GET['val'];
include('Action/mongodb_conn.php');
$collection = $db->naubahar_unit2;
$current_date = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head.php'); ?>
  <style>
    .card-header {
      color: #626469;
      font-weight: bold;
      font-size: 20px;
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
      <?php include('includes/header1.php'); ?>
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
                      <h4 class="m-b-10">Logs Detailed</h4>
                      <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <ul class="breadcrumb-title">
                      <li class="breadcrumb-item">
                        <a href="#"> <i class="fa fa-home"></i> </a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!">Diagrams</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!" style="color: #284497">Oneline Diagram</a>
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
                    <!-- Basic table card start -->
                    <div class="card" style=" border: 1px solid #9f9fa3; border-radius: 5px;background-color: #fbfbfb;margin: 5px 5px 5px 0px;border-top: 5px solid #7699d4;">
                      <div class="card-header" style="height: 50px;">
                        <h4>Logs</h4>
                      </div>
                      <div class="col-lg-12 row" style="padding-top: 10px;">
                        <div class="btn-actions-pane-right text-capitalize col-lg-6">
                          <div class="btn-actions-pane-right text-capitalize">
                            <label style="font-size: 15px;color: #337ab7;"><b>Start Date: </b></label>
                            <input name="ec_start_date" value="<?php echo date("Y-m-d"); ?>" class="mb-6 mr-1 btn btn-primary" onchange="volt_display()" type="date" style="width:150px;" id="ec_start_date" required>
                          </div>
                        </div><br>
                        <div class="btn-actions-pane-right text-capitalize col-lg-6">
                          <div class="btn-actions-pane-right text-capitalize">
                            <label style="font-size: 15px;color: #337ab7;"><b>End Date: </b></label>
                            <input name="ec_end_date" value="<?php echo date("Y-m-d"); ?>" class="mb-6 mr-1 btn btn-primary" onchange="volt_display()" type="date" style="width:150px;" id="ec_end_date" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 row">
                        <div class="col-lg-6">
                          <div class="text-capitalize">
                            <br>
                            <button class="btn " id="btnExport" onclick="fnExcelReport();" style="background-color:#d64d3d;color:white">EXPORT</button>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="text-capitalize" style="text-align: right;">
                            <br>
                            <button class="btn" onclick="history.back()" style="margin-left:3px;margin-left:3px;background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0);color:white">Back to log</button>
                          </div>
                        </div>
                      </div>
                      <div class="no-gutters box" style="overflow-x: scroll;width: 100%;min-height: 600px;padding-top: 20px;">
                        <table class="table table-striped table-advance table-hover" id="headerTable">
                          <?php if ($val == 'volt') { ?>
                            <tr>
                              <th style="text-align:center;">Time</th>
                              <th style="text-align:center;">Voltage A-B</th>
                              <th style="text-align:center;">Voltage B-C</th>
                              <th style="text-align:center;">Voltage C-A</th>
                              <th style="text-align:center;">Voltage A-N</th>
                              <th style="text-align:center;">Voltage B-N</th>
                              <th style="text-align:center;">Voltage C-N</th>
                              <th style="text-align:center;">Voltage L-N</th>
                              <th style="text-align:center;">Voltage L-L</th>
                            </tr>
                          <?php } elseif ($val == 'current') { ?>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Current AN</th>
                            <th style="text-align:center;">Current BN</th>
                            <th style="text-align:center;">Current CN</th>
                            <th style="text-align:center;">Current Avg</th>
                          <?php } elseif ($val == 'power_factor') {
                          ?>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Power Factor A</th>
                            <th style="text-align:center;">Power Factor B</th>
                            <th style="text-align:center;">Power Factor C</th>
                            <th style="text-align:center;">Power Factor Avg</th>
                          <?php } elseif ($val == 'active_power') {
                          ?>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Active Power A</th>
                            <th style="text-align:center;">Active Power B</th>
                            <th style="text-align:center;">Active Power C</th>
                            <th style="text-align:center;">Active Power Total</th>
                          <?php } elseif ($val == 'reactive_power') { ?>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Reactive Power A</th>
                            <th style="text-align:center;">Reactive Power B</th>
                            <th style="text-align:center;">Reactive Power C</th>
                            <th style="text-align:center;">Reactive Power Avg</th>
                          <?php } elseif ($val == 'apparent_power') { ?>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Apparent Power A</th>
                            <th style="text-align:center;">Apparent Power B</th>
                            <th style="text-align:center;">Apparent Power C</th>
                            <th style="text-align:center;">Apparent Power Avg</th>
                          <?php } elseif ($val == 'harmonics') { ?>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Harmonics IA</th>
                            <th style="text-align:center;">Harmonics IB</th>
                            <th style="text-align:center;">Harmonics IC</th>
                            <th style="text-align:center;">Harmonics VA</th>
                            <th style="text-align:center;">Harmonics VB</th>
                            <th style="text-align:center;">Harmonics VC</th>
                          <?php } elseif ($val == 'active_energy') { ?>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Active Energy DLVR A</th>
                            <th style="text-align:center;">Active Energy DLVR B</th>
                            <th style="text-align:center;">Active Energy DLVR C</th>
                            <th style="text-align:center;">Active Energy Total</th>
                            <th style="text-align:center;">Active Energy RECV A</th>
                            <th style="text-align:center;">Active Energy RECV B</th>
                            <th style="text-align:center;">Active Energy RECV C</th>
                            <th style="text-align:center;">Active Energy RECV Total</th>
                          <?php } elseif ($val == 'rective_energy') { ?>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Rective Energy DLVR A</th>
                            <th style="text-align:center;">Rective Energy DLVR B</th>
                            <th style="text-align:center;">Rective Energy DLVR C</th>
                            <th style="text-align:center;">Rective Energy Total</th>
                            <th style="text-align:center;">Rective Energy RECV A</th>
                            <th style="text-align:center;">Rective Energy RECV B</th>
                            <th style="text-align:center;">Rective Energy RECV C</th>
                            <th style="text-align:center;">Rective Energy Total</th>
                          <?php } elseif ($val == 'apparent_energy') { ?>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Apparent Energy A</th>
                            <th style="text-align:center;">Apparent Energy B</th>
                            <th style="text-align:center;">Apparent Energy C</th>
                            <th style="text-align:center;">Apparent Energy Total</th>
                          <?php } ?>
                          <tbody id="showresults"></tbody>
                        </table>
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
    <?php include('includes/footer.php'); ?>
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="  crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script type="text/javascript">
      function volt_display() {
        // call ajax function to get sports data
        var str = document.getElementById("ec_start_date").value;
        var str2 = document.getElementById("ec_end_date").value;
        $.ajax({
          url: "show_logunit2.php?s=" + str + "&e=" + str2 + "&meter=<?php echo $meter; ?>&val=<?php echo $val; ?>",
          success: function(response) {
            $('#showresults').html(response);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      }
      window.onload = function() {
        volt_display();
      };
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
</script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function fnExcelReport() {
        var tab_text = "<table border='2px'><tr bgcolor='#87AFC6' style='height: 75px; text-align:center; width: 250px'>";
        var textRange;
        var j = 0;
        tab = document.getElementById('headerTable'); // id of table

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
          sa = txtArea1.document.execCommand("SaveAs", true, "Logs.xls");
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
              a.download = 'Logs';
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
    $("#ec_start_date").change(function() {
      $("#ec_end_date").prop("min", $(this).val());
      $("#ec_end_date").val(""); //clear end date input when start date changes
    });
  </script>
</body>

</html>