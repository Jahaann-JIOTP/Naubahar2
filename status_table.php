<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- head start -->
<?php include('includes/head.php'); ?>
<!-- head end -->

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
                      <h4 class="m-b-10">Status Table</h4>
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
                      <li class="breadcrumb-item"><a href="#!" style="color: #284497">Status Table</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><br><br>
            <div class="col-xl-12 col-md-12">
              <div class="card table-card">
                <div class="card-header">
                  <h4>Trafo 1</h4>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="fa fa fa-wrench open-card-option"></i></li>
                      <li><i class="fa fa-window-maximize full-card"></i></li>
                      <li><i class="fa fa-minus minimize-card"></i></li>
                      <li><i class="fa fa-refresh reload-card"></i></li>
                      <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-responsive-md table-striped">
                      <thead style="background-color:#1e5b9b;color: white;">
                        <tr>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>No.</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Sources</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Current Avg (A)</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Voltage L-L Avg (V)</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Real Power (KW)</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Status</center>
                          </th>
                          <th style="color:white;font-size: 15px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">1</th>
                          <td>Main</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">2</th>
                          <td>LP Compressor 1</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="meter_diagram.php?id=T_1&&meter=U_4_EM4" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">3</th>
                          <td>LP Compressor 2</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">4</th>
                          <td>HP Compressor 1</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">5</th>
                          <td>HP Compressor 2</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">6</th>
                          <td>Blowing Machine C12</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">7</th>
                          <td>Rental Boiler</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">8</th>
                          <td>Line 4</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">9</th>
                          <td>Line 4 Control</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">10</th>
                          <td>RO 4</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card table-card">
                <div class="card-header">
                  <h4>Trafo 2</h4>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="fa fa fa-wrench open-card-option"></i></li>
                      <li><i class="fa fa-window-maximize full-card"></i></li>
                      <li><i class="fa fa-minus minimize-card"></i></li>
                      <li><i class="fa fa-refresh reload-card"></i></li>
                      <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-responsive-md table-striped">
                      <thead style="background-color: #365994;color: white;">
                        <tr>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>No.</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Sources</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Current Avg (A)</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Voltage L-L Avg (V)</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Real Power (KW)</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Status</center>
                          </th>
                          <th style="color:white;font-size: 15px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">1</th>
                          <td>Main</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">2</th>
                          <td>Syrup Room2 + Juice Syrup Room</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="meter_diagram.php?id=T_1&&meter=U_4_EM4" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">3</th>
                          <td>NH3 Compressor 2</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">4</th>
                          <td>R0 2</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">5</th>
                          <td>LP Compressor 4</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">6</th>
                          <td>Turbine 3</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">7</th>
                          <td>Syrup Room 1</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">8</th>
                          <td>Line 2</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">9</th>
                          <td>NH3 Compressor 3</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">10</th>
                          <td>NH3 Compressor 7</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">11</th>
                          <td>R0 3</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">12</th>
                          <td>Sugar Dissolving</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">13</th>
                          <td>Line 1</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">14</th>
                          <td>NH3 Compressor 1</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">15</th>
                          <td>NH3 Compressor 6</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">16</th>
                          <td>RO 1</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">17</th>
                          <td>LP Compressor 3</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">18</th>
                          <td>Turbine 2</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
              <div class="card table-card">
                <div class="card-header">
                  <h4>Trafo 3</h4>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="fa fa fa-wrench open-card-option"></i></li>
                      <li><i class="fa fa-window-maximize full-card"></i></li>
                      <li><i class="fa fa-minus minimize-card"></i></li>
                      <li><i class="fa fa-refresh reload-card"></i></li>
                      <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-responsive-md table-striped">
                      <thead style="background-color: #365994;color: white;">
                        <tr>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>No.</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Sources</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Current Avg (A)</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Voltage L-L Avg (V)</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Real Power (KW)</center>
                          </th>
                          <th class="w-1" style="color:white ;font-size: 15px;">
                            <center>Status</center>
                          </th>
                          <th style="color:white;font-size: 15px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">1</th>
                          <td>Main</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">2</th>
                          <td>NH3 Compressor 5</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="meter_diagram.php?id=T_1&&meter=U_4_EM4" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">3</th>
                          <td>HP Compressor 3</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">4</th>
                          <td>Line 5 LT</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">5</th>
                          <td>Turbine 4</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">6</th>
                          <td>NH3 Compressor 4</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">7</th>
                          <td>Line 3 Juice</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">8</th>
                          <td>Syrup Room 3(Line 5) </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">9</th>
                          <td>Line 5</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">10</th>
                          <td>Line 6&7</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">11</th>
                          <td>Sugar Dissolver</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">12</th>
                          <td>NH3 Compressor 8</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">13</th>
                          <td>Blowing Machine C10</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">14</th>
                          <td>HP Compressor 4</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">15</th>
                          <td>Line 5 control</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">16</th>
                          <td>Line 8</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                        <tr align="center">
                          <th scope="row" style="text-align: center;">17</th>
                          <td>Sharink Tunnel Line 5</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="color: green;"><b>Online</b></td>
                          <td>
                            <a href="#" target="_blank">Details</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="styleSelector"> </div>
  </div>
  <!-- Main-body end -->
  <?php include('includes/footer.php'); ?>
</body>

</html>