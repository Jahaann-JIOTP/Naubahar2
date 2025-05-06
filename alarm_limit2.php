

<?php
session_start();
if (!isset($_SESSION['auth'])) {
    // not logged in
    header('Location:index.php');
}
?>
<!-- <style>
  img[usemap], map area{
    outline: auto !important;
}
</style> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="reset.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" />
    <style type="text/css">
        h1 {
            font-size: 25px;
            padding: 15px;
            color: white;
            /* background-color: white; */
            text-align: center;
        }

        h2 {
            font-size: 18px;
            padding: 15px;
            text-transform: uppercase;
            text-align: center;
        }

        body {

            color: black;
            /* font-family: 'Oswald', sans-serif; */
        }

        h3 {
            font-size: 16px;
            padding: 15px;
            text-transform: uppercase;
            /* text-align: left; */
            margin-left: 20px;
            font-weight: 500;
            line-height: 2.7;
            letter-spacing: 0.8px;
        }

        th {
            border: 2px solid #096bc2;
        }

        table {
            text-align: center;
            margin: 20px auto;
        }

        td {
            border: 2px solid #096bc2;
            width: 300px;
        }

        .container {
            max-width: 940px;
            margin: 0 auto;
            /* height: 800px; */
        }


        .left1 {
            width: 150px;
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
                                            <h4 class="m-b-10">Alarms Limit Unit-2</h4>
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
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Alarms Limit Unit-2</a>
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
                                        <div class="card" style="border-top:solid 5px #3f629d ;border-radius:10px !important;">
                                            <div class="row">
                                                <div class=" col-12">
                                                    <div class="container col-12">
                                                        <table>
                                                            <thead>
                                                                <tr style="background-color:#1e5b9b;">
                                                                    <th colspan="3">
                                                                        <h1>Alarms Indication</h1>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <h2>Color</h2>
                                                                    </th>
                                                                    <th>
                                                                        <h2>Status</h2>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3 style=" background-color: #FFC107; width:44px; margin-left:50px"></h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>Low</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3 style=" background-color: red; width:44px; margin-left:50px"></h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>High</h3>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="container col-12">
                                                        <table>
                                                            <thead>
                                                                <tr style="background-color:#1e5b9b;">
                                                                    <th colspan="3">
                                                                        <h1>Power Factor</h1>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <h2>Sources</h2>
                                                                    </th>
                                                                    <th>
                                                                        <h2>Status</h2>
                                                                    </th>
                                                                    <th>
                                                                        <h2>Range (&#8804;)</h2>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>All Meters</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: #f2c854; font-weight: 700;">Low</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3> -89</h3>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="container col-12">
                                                        <table>
                                                            <thead>
                                                                <tr style="background-color:#1e5b9b;">
                                                                    <th colspan="3">
                                                                        <h1>Voltage</h1>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <h2>Sources</h2>
                                                                    </th>
                                                                    <th>
                                                                        <h2>Status</h2>
                                                                    </th>
                                                                    <th>
                                                                        <h2>Range</h2>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>All Meters</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: #f2c854; font-weight: 700;">Low</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>&#8804; 370</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>All Meters</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>&#8805; 440</h3>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                               <!--  <div class=" col-6">
                                                    <div class="container col-12">
                                                        <table>
                                                            <thead>
                                                                <tr style="background-color: #284497;">
                                                                    <th colspan="3">
                                                                        <h1>Current (A)</h1>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <h2>Sources</h2>
                                                                    </th>
                                                                    <th>
                                                                        <h2>Status</h2>
                                                                    </th>
                                                                    <th>
                                                                        <h2>Range (&#8805;)</h2>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Main LT</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>1540</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Water Treatment</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>90</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Turbine-1</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>26</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Syrup Room</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>37</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Air Compressor(3+4+5)</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>260</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Air Compressor(1+2)</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>142</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Grasso 4</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>306</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Grasso 2</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>220</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Grasso 1</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>193</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Evaporators</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>132</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Line 5</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>138</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Line 4</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>150</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Line-3</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>130</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Line-1</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>142</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Boiler</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>95</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="left1">
                                                                        <h3>Turbine-2</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3 style="color: red; font-weight: 700;">High</h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>30</h3>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>

</html>