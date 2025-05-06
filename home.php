<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location:index.php');
}
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('includes/head.php'); ?>
    <style>
        .form-select {
            padding: 2px 0px 1px 6px;
            border: solid 1px #9f9fa3;
            border-radius: 3px;
            background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #CAD9E3), to(#FFFFFF));
            background: -moz-linear-gradient(top, #FFFFFF, #CAD9E3 1px, #FFFFFF 25px);
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
            -moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
            -webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
            width: 130px;
            height: 28px;
            font-size: 14px;
            font-family: "Arial";
        }

        .form-select1 {
            padding: 2px 0px 1px 6px;
            border: solid 1px #9f9fa3;
            border-radius: 3px;
            background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #CAD9E3), to(#FFFFFF));
            background: -moz-linear-gradient(top, #FFFFFF, #CAD9E3 1px, #FFFFFF 25px);
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
            -moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
            -webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
            width: 205px;
            height: 32px;
            font-size: 14px;
            font-family: "Arial";
        }

        .card-title {
            float: left;
            height: 35px;
            font-size: 1.2vw;
            font-weight: bold;
            color: #626469;
            color: var(--detail-label-color);
        }

        .card-title1 {
            height: 35px;
            font-size: 1.2vw;
            font-weight: bold;
            color: var(--detail-label-color);
        }

        .style1 {
            color: #383838;
        }

        .style2 {
            color: #383838;
            padding-top: 3px;
            font-size: 2.1vw;
        }

        .borders {
            position: relative;
            border: 1.2px solid #5d5151;
        }

        .borders1 {
            position: relative;
            border: 1px solid #808080;
        }

        .blur {
            box-shadow:
                0 0 0 4px hsl(0, 0%, 80%),
                0 0 0 5px hsl(0, 0%, 90%);
        }

        @import url('https://fonts.googleapis.com/css2?family=Marcellus&display=swap');

        .div1 {
            background: url('https://i.imgur.com/sTfvzrM.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: local;
            border-radius: 5px;
        }

        .div2 {
            height: 30px;
            background-color: #9fe0fa;
            border-radius: 5px;
        }

        h1 {
            font-size: 3vw;
        }

        sup {
            font-size: 1.2vw;
            position: relative;
            top: -2rem;
        }

        .gfg {
            margin: 3%;
            position: relative;
        }

        .animation {
            animation: fadeInAnimation ease 3s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
            animation-delay: 3s;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }

            from {
                top: -170px;
            }

            to {
                top: 0px;
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
                                <div class="row align-items-center" style="margin-top:-20px ; margin-bottom:-20px">
                                    <div class="col-lg-10 col-sm-12">
                                        <div class="page-header-title">
                                            <h3 class="m-b-10">Naubahar Bottling Company (Pvt.) Ltd</h3>
                                            <h5 class="m-b-10">EMS - Unit 1</h5>
                                            <h6 class="m-b-0">Welcome to Jahaann</h6>
                                        </div>
                                    </div>
                                    <?php
                                    $apiKey = "489a3eb5ccabc52d1145eee38cc114eb";
                                    $cityId = "1177662";
                                    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
                                    $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                    curl_setopt($ch, CURLOPT_VERBOSE, 0);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    $response = curl_exec($ch);
                                    curl_close($ch);
                                    $data = json_decode($response);
                                    $currentTime = time();
                                    //echo $response;
                                    ?>
                                    <!-- <div class="col-lg-2 col-sm-12 ml-auto"
                                        style="float:right ;height:90px;">
                                        <div class="" id="card1" style="border-radius: 10px !important;background:none">
                                            <div class="" style="width:400px ;">
                                                <div class="d-flex">
                                                    <div class="city" style="font-size:16px ;">
                                                        <h4><?php //echo $data->name; 
                                                            ?>, Pakistan</h4>
                                                    </div>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-sun-o spin glow"></i>
                                                    <i class="fa fa-cloud wind"></i>
                                                    <i class="fa fa-cloud two"></i>
                                                </div>
                                                <div class="current">
                                                    <span
                                                        style="font-size: 36px;color: white;"><?php //echo $data->main->temp_max; 
                                                                                                ?>&deg;<sup>c</sup></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --><br><br>
                                </div>
                            </div>
                        </div>
                        <!-- Page-top end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- sales start -->
                                            <div class="col-lg-6 col-xl-7 col-md-12 col-sm-12">
                                                <div class="card style1 animation" style="background-color: #e6eaf3; border-top:3px solid; border-top-color: #779ad5;height:320px;">
                                                    <div class="card-block text-center"><span class="card-title1 style1"><img src="assets/images/output-onlinegiftools.gif" alt="" height="33px" width="auto"> Total
                                                            Consumption</span><br><br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <h6 style="font-size: 1.3vw ;">Today</h6>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-8">
                                                                        <i class="fa fa-line-chart menu-icon" style="font-size: 3vw; color: #448aff;"></i><br><br>
                                                                    </div>
                                                                </div>
                                                                <h5 class="item style2 " id="Status"><i class="fa fa-caret-up text-c-green m-r-10"></i>
                                                                </h5><Span style="font-size: 1vw;"><b>kWh</b></Span>
                                                            </div>
                                                            <div class="col">
                                                                <h6 style="font-size: 1.3vw;">This Week</h6>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-8">
                                                                        <i class="fa fa-line-chart menu-icon" style="font-size: 3vw;color: #11c15b"></i><br><br>
                                                                    </div>
                                                                </div>
                                                                <h5 class="item style2 " id="Status1"><i class="fa fa-caret-down text-c-red m-r-10"></i>
                                                                </h5><Span style="font-size: 1vw;"><b>kWh</b></Span>
                                                            </div>
                                                            <div class="col">
                                                                <h6 style="font-size: 1.3vw ;">This Month</h6>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-8">
                                                                        <i class="fa fa-line-chart menu-icon" style="font-size: 3vw; color:#8301ab;"></i><br><br>
                                                                    </div>
                                                                </div>
                                                                <h5 class="item style2 " id="Status2"><i class="fa fa-caret-up text-c-green m-r-10"></i>
                                                                </h5><Span style="font-size: 1vw;"><b>kWh</b></Span>
                                                            </div>
                                                            <div class="col">
                                                                <h6 style="font-size: 1.3vw ;"> This Year</h6>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-8">
                                                                        <i class="fa fa-line-chart menu-icon" style="font-size: 3vw; color:#ff5252;"></i><br><br>
                                                                    </div>
                                                                </div>
                                                                <h5 class="item style2 " id="Status3"><i class="fa fa-caret-down text-c-red m-r-10"></i>
                                                                </h5><Span style="font-size: 1vw;"><b>kWh</b></Span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- sales end -->
                                            <!-- Weather -->
                                            <div class="col-lg-6 col-xl-5 col-md-12 col-sm-12" style="font-size:medium;">
                                                <div class="card table-card style1 animation" style="background-color: #e6eaf3; border-top:3px solid; border-top-color: #779ad5;">
                                                    <div class="card-header-right" style="z-index: 1;">
                                                        <i class="fa fa-window-maximize full-card" style="color: black; float:right; margin-top:5px; margin-right:10px"></i>
                                                    </div>
                                                    <div class="card-body" style=" height:320px; margin-top:-22px">

                                                        <div id="chartdiv1" style="width: 100%; height:100%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Weather End -->
                                            <!-- table -->
                                            <div class="col-lg-12 col-xl-12" style="font-size:medium;">
                                                <div class="card table-card style1" style="background-color: #e6eaf3; border-top:3px solid; border-top-color: #779ad5;">
                                                    <div class="card-header style1" style="background-color:#7ea5c5">
                                                        <h5 style="font-size:large;color:white"><b>Real Time Values </b>
                                                        </h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option" style="color: white"></i>
                                                                </li>
                                                                <li><i class="fa fa-window-maximize full-card" style="color: white"></i></li>
                                                                <!-- <li><i class="fa fa-minus minimize-card" style="color: white"></i></li> -->
                                                                <li><i class="fa fa-refresh reload-card" style="color: white"></i></li>
                                                                <li><i class="fa fa-trash close-card" style="color: white"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="no-gutters box" style=" overflow:auto; height:350px;">
                                                        <div>
                                                            <img src="assets/images/u12.png" alt="" width="1780px">

                                                        </div>
                                                        <div id="refresh">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>



                                            <!-- table end -->

                                            <div class="col-lg-12 col-xl-6">
                                                <div class="card" style="border-radius: 5px !important;border: #9f9fa3 1px solid;background-color: #e6eaf3;">
                                                    <div class="card-body" style="height: 500px;border-top-style: solid; border-radius: 4px !important;border-color: #779ad5;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title style1">Energy Usage (kWh)</h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_cost_bar_option" class="form-select" required name="option" onchange="energy_bar1(this.options[this.selectedIndex].value);">
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="Last 30 Days">Last 30 Days
                                                                        </option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <!-- <option value="This Year">This Year</option> -->
                                                                        <option value="This Week">This Week</option>
                                                                        <option value="This Year">This Year</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li><i class="fa fa-window-maximize full-card style1" style="margin-top:06px;padding-left:5px;font-size: 1.20em"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div id="bar_chart" style="width: 100%; height: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-xl-6">
                                                <div class="card" style="border-radius: 5px !important;border: #9f9fa3 1px solid;color: #6f707d; background-color: #e6eaf3;">
                                                    <div class="card-body" style="height: 500px;border-top-style: solid; border-radius: 4px !important;border-color: #779ad5;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title style1"> Energy Comparison (kWh)</h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_cost_bar_option" class="form-select1" name="option" onchange="energy_bar(this.options[this.selectedIndex].value);">
                                                                        <option value="today">Today over Yesterday
                                                                        </option>
                                                                        <option value="week">This Week over Last Week
                                                                        </option>
                                                                        <option value="month">This Month over Last Month
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li><i class="fa fa-window-maximize full-card style1" style="margin-top:06px;padding-left:5px;font-size: 1.20em"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div id="energy_bar_chart" style="width: 100%; height: 95%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-12 col-xl-12 col-sm-12">
                                                <div class="card"
                                                    style="border-radius: 5px !important;border: #9f9fa3 1px solid ;background-color: #e6eaf3;">
                                                    <div class="card-body"
                                                        style="height: 470px;border-top-style: solid; border-radius: 4px !important;border-color: #779ad5;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title style1">Live Power Consumption (kW)</h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                </div>
                                                            </div>
                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li><i class="fa fa-window-maximize full-card style1"
                                                                            style="margin-top:06px;padding-left:5px;font-size: 1.20em"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div id="chartdiv" style="width: 100%; height:90%"></div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>

                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                            <!-- Main-body end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script>
        let link = 'diagram_data_u.php';
        $(function() {
            $("#refresh").load(link);
            $(function() {
                $(document).on('click', '.anchor', function() {
                    console.log("abc");
                    link = $(this).data('link');
                    console.log(link);
                    $("#refresh").load(link);
                });
            });
            setInterval(function() {
                $("#refresh").load(link)
            }, 5000);
        });
    </script>
    <script type="text/javascript">
        function energy_bar1(str2) {
            var filename = "";
            if (str2 == 'Last 7 Days') {
                filename = 'Last 7 Days Comparison';
            } else if (str2 == 'Last 30 Days') {
                filename = 'Last 30 Days Comparison';

            } else if (str2 == 'Last Week') {
           
                filename = 'Last Week Comparison';

            }







            am4core.ready(function() {
                am4core.useTheme(am4themes_animated);
                var chart = am4core.create('bar_chart', am4charts.XYChart);
                if (chart.logo) {
                    chart.logo.disabled = true;
                }

                chart.legend = new am4charts.Legend();
                chart.legend.position = "right";
                chart.legend.valign = "middle";
                chart.legend.fontSize = 15;
                chart.legend.maxWidth = 230;

                var markerTemplate = chart.legend.markers.template;
                markerTemplate.width = 9;
                markerTemplate.height = 9;
                chart.legend.paddingBottom = 2;
                chart.legend.scrollable = true;

                var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                xAxis.dataFields.category = "Area";
                xAxis.renderer.grid.template.location = 0;
                xAxis.renderer.minGridDistance = 20;
                xAxis.renderer.labels.template.horizontalCenter = "right";
                xAxis.renderer.labels.template.verticalCenter = "middle";
                xAxis.renderer.labels.template.rotation = 270;
                xAxis.tooltip.disabled = true;
                xAxis.renderer.minHeight = 110;

                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.renderer.minWidth = 0;

                // Set a fixed minimum and maximum value for the Y-axis
                // Example: valueAxis.min = 0;
                // Example: valueAxis.max = 1000;

                chart.colors.list = [
                    am4core.color("#670110"), // water treatment
                    am4core.color("#63ab30"), // Turbine 1
                    am4core.color("#FF6F91"), // syrup room
                    am4core.color("#FF9671"), // Air comressor(3+4)
                    am4core.color("#FFC75F"), // Air comressor(1+2)
                    am4core.color("#8975a8"), // Grasso 4
                    am4core.color("#028cc7"), // Grasso 3
                    am4core.color("#0245f6"), // Grasso 2
                    am4core.color("#3d019f"), // Grasso 1
                    am4core.color("#8301ab"), // Eporators
                    am4core.color("#a31749"), // Line 5
                    am4core.color("#f62611"), // Line 4
                    am4core.color("#808000"), // Line 3
                    am4core.color("#f39402"), // Line 1
                    am4core.color("#313131"), // Boiler
                    am4core.color("#949494") // Turbine 2
                ];

                var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
                yAxis.renderer.line.strokeOpacity = 0.9;
                yAxis.renderer.line.strokeWidth = 1;
                yAxis.renderer.line.stroke = am4core.color("black");

                function createSeries(value, name) {
                    var series = chart.series.push(new am4charts.ColumnSeries());
                    series.sequencedInterpolation = true;
                    series.dataFields.valueY = value;
                    series.dataFields.categoryX = 'Area';
                    series.name = name;
                    series.columns.template.tooltipX = am4core.percent(50);
                    series.columns.template.tooltipY = am4core.percent(0);
                    series.columns.template.tooltipText = "{name}\nKwh:{valueY}";
                    series.columns.template.strokeWidth = 0;
                    // series.columns.template = "middle";
                    // series.columns.template.verticalCenter = "left";


                    series.tooltip.pointerOrientation = "vertical";
                    series.columns.template.column.fillOpacity = 0.8;

                    // series.legendSettings.itemValueText = "{valueY} Kwh";
                    series.legendSettings.valueText = "{valueY.close} Kwh";
                    // series.legendSettings.itemValueText = "[bold]{valueY} Kwh[/bold]";
                    // Set the width of the columns (adjust this value as needed)
                    series.columns.template.width = am4core.percent(1000);

                    return series;
                }

                chart.dataSource.url = "calculations/unit2barchart/test.php?value=" + str2;

                // Example series creation for one category
                createSeries('Water Treatment', 'Water Treatment');
                createSeries('Turbine 1', 'Turbine 1');
                createSeries('Syrup Room', 'Syrup Room');
                createSeries('Air Comp(3+4+5)', 'Air Comp(3+4+5)');
                createSeries('Air Comp(1+2)', 'Air Comp(1+2)');
                createSeries('Grasso 4', 'Grasso 4');
                createSeries('Grasso 3', 'Grasso 3');
                createSeries('Grasso 2', 'Grasso 2');
                createSeries('Grasso 1', 'Grasso 1');
                createSeries('Evaporators', 'Evaporators');
                createSeries('Line - 5', 'Line - 5');
                createSeries('Line - 4', 'Line - 4');
                createSeries('Line - 3', 'Line - 3');
                createSeries('Line - 1', 'Line - 1');
                createSeries('Boiler', 'Boiler');
                // createSeries('Turbine - 2', 'Turbine - 2');c
                // Create series for other categories similarly

                chart.cursor = new am4charts.XYCursor();
                yAxis.cursorTooltipEnabled = false;
                xAxis.cursorTooltipEnabled = false;
                chart.exporting.filePrefix = filename;

                chart.exporting.menu = new am4core.ExportMenu();
                chart.exporting.menu.align = "right";
                chart.exporting.menu.verticalAlign = "top";
                chart.exporting.formatOptions.getKey("json").disabled = true;
                chart.exporting.formatOptions.getKey("html").disabled = true;
                chart.exporting.formatOptions.getKey("csv").disabled = true;
                chart.exporting.formatOptions.getKey("pdf").disabled = true;
                chart.exporting.menu.items[0].icon = "data:image/svg+xml;base64,..."; // Replace with your export icon
            });
        }

        energy_bar1("Last 7 Days");
    </script>
    <!-- // end am4core.ready() -->
    <script type="text/javascript">
        function energy_bar(str2) {
            var w1 = "";
            var w2 = "";
            var xaxis = "";
            var yaxis1 = "";
            var yaxis2 = "";
            var filename = "";
            if (str2 == 'week') {
                w1 = 'Last Week (kWh)';
                w2 = 'This Week (kWh)';
                xaxis = "Days";
                yaxis1 = "Last Week (kWh)";
                yaxis2 = "This Week (kWh)";
                filename = 'Week Over Last Week Comparison';
            } else if (str2 == 'today') {
                w1 = 'Yesterday (kWh)';
                w2 = 'Today (kWh)';
                xaxis = "Time";
                yaxis1 = "Yesterday";
                yaxis2 = "Today";
                filename = 'Today Over Yesterday Comparison';

            } else if (str2 == 'month') {
                w1 = 'Last Month (kWh)';
                w2 = 'This Month (kWh)';
                xaxis = "Weeks";
                yaxis1 = "Last Month";
                yaxis2 = "This Month";
                filename = 'This Month Over Last Comparison';

            }

            am4core.ready(function() {
                am4core.useTheme(am4themes_animated);
                var chart = am4core.create('energy_bar_chart', am4charts.XYChart)
                if (chart.logo) {
                    chart.logo.disabled = true;
                }
                chart.legend = new am4charts.Legend();
                chart.legend.position = "right";
                chart.legend.valign = "middle";
                chart.legend.maxWidth = 180;
                chart.legend.scrollable = true;
                var markerTemplate = chart.legend.markers.template;
                markerTemplate.width = 9;
                markerTemplate.height = 9;
                chart.legend.paddingBottom = 5
                var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
                xAxis.dataFields.category = xaxis
                xAxis.renderer.grid.template.location = 0;
                xAxis.renderer.line.strokeOpacity = 1;
                xAxis.renderer.minGridDistance = 50;
                // xAxis.renderer.labels.template.fontSize = 10;
                xAxis.renderer.cellStartLocation = 0.1;
                xAxis.renderer.cellEndLocation = 0.9;
                chart.colors.list = [
                    am4core.color("#eeb299"), // R0 1
                    am4core.color("#bd2d18"), // R0 2
                ];
                var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
                yAxis.title.text = "Active Energy (Kwh)";
                yAxis.renderer.line.strokeOpacity = 0.9;
                yAxis.renderer.line.strokeWidth = 1;
                yAxis.renderer.line.stroke = am4core.color("black");
                yAxis.min = 0;
                // yAxis.max = 15000;
                //ADD LABEL IN CHART
                var topContainer = chart.chartContainer.createChild(am4core.Container);
                topContainer.layout = "absolute";
                topContainer.toBack();
                topContainer.paddingBottom = 15;
                topContainer.width = am4core.percent(100);
                var axisTitle = topContainer.createChild(am4core.Label);
                axisTitle.text = "Period Over Period Chart";
                axisTitle.fontWeight = 600;
                axisTitle.align = "center";
                axisTitle.paddingLeft = 10;
                //END LABEL IN CHART
                // var label = chart.createChild(am4core.Label);
                // label.text = "Date";
                // label.fontSize = 20;
                // label.align = "center";
                function createSeries(value, name, xaxis) {
                    var series = chart.series.push(new am4charts.ColumnSeries())
                    series.dataFields.valueY = value
                    series.dataFields.categoryX = xaxis
                    series.name = name
                    series.tooltip.label.textAlign = "middle";
                    if (name == w2) {
                        series.tooltip.pointerOrientation = "horizontal";
                        series.tooltip.dy = 50; // Adjust the value as needed
                    } else if (name == w1) {
                        series.tooltip.pointerOrientation = "horizontal";
                        series.tooltip.dy = -50; // Adjust the value as needed
                    }
                    series.columns.template.tooltipX = am4core.percent(100);
                    series.columns.template.tooltipY = am4core.percent(0);
                    series.columns.template.tooltipText = "Total Main LT Energy Usage (kWh)\n{name}:{valueY}";
                    series.tooltip.getFillFromObject = false;
                    series.tooltip.background.fill = am4core.color("#fff");
                    // series.tooltip.autoTextColor = false;
                    series.tooltip.label.fill = am4core.color("#000000");
                    series.tooltip.background.stroke = am4core.color("#000");
                    series.tooltip.background.strokeWidth = 2;
                    return series;
                }
                chart.dataSource.url = "calculations/database5.php?value=" + str2;
                //calculations/database4.php
                // createSeries('value1', 'Main LT');
                createSeries(yaxis1, w1, xaxis);
                createSeries(yaxis2, w2, xaxis);
                chart.cursor = new am4charts.XYCursor();

                yAxis.cursorTooltipEnabled = false;
                xAxis.cursorTooltipEnabled = false;
                chart.exporting.filePrefix = filename;
                chart.exporting.menu = new am4core.ExportMenu();
                // chart.exporting.export("png");
                chart.exporting.menu.align = "right";
                chart.exporting.menu.verticalAlign = "top";
                chart.exporting.formatOptions.getKey("json").disabled = true;
                chart.exporting.formatOptions.getKey("html").disabled = true;
                chart.exporting.formatOptions.getKey("csv").disabled = true;
                chart.exporting.formatOptions.getKey("pdf").disabled = true;
                chart.exporting.menu.items[0].icon =
                    "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxNnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxNiAxNiIgd2lkdGg9IjE2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6c2tldGNoPSJodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2gvbnMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48dGl0bGUvPjxkZWZzLz48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJJY29ucyB3aXRoIG51bWJlcnMiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIj48ZyBmaWxsPSIjMDAwMDAwIiBpZD0iR3JvdXAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03MjAuMDAwMDAwLCAtNDMyLjAwMDAwMCkiPjxwYXRoIGQ9Ik03MjEsNDQ2IEw3MzMsNDQ2IEw3MzMsNDQzIEw3MzUsNDQzIEw3MzUsNDQ2IEw3MzUsNDQ4IEw3MjEsNDQ4IFogTTcyMSw0NDMgTDcyMyw0NDMgTDcyMyw0NDYgTDcyMSw0NDYgWiBNNzI2LDQzMyBMNzMwLDQzMyBMNzMwLDQ0MCBMNzMyLDQ0MCBMNzI4LDQ0NSBMNzI0LDQ0MCBMNzI2LDQ0MCBaIE03MjYsNDMzIiBpZD0iUmVjdGFuZ2xlIDIxNyIvPjwvZz48L2c+PC9zdmc+";
            });
        }
        energy_bar("today");
    </script>
    <script type="text/javascript">
        am4core.ready(function() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end
            // create chart
            var chart = am4core.create("chartdiv1", am4charts.GaugeChart);
            if (chart.logo) {
                chart.logo.disabled = true;
            }
            chart.hiddenState.properties.opacity = 0;
            var axis = chart.xAxes.push(new am4charts.ValueAxis());
            axis.min = 0;
            axis.max = 500;
            axis.strictMinMax = true;
            axis.renderer.inside = true;
            // chart.innerRadius = -20;
            //axis.renderer.ticks.template.inside = true;
            //axis.stroke = chart.colors.getIndex(3);
            axis.renderer.radius = am4core.percent(95);
            //axis.renderer.radius = 80;
            axis.renderer.line.strokeOpacity = 1;
            axis.renderer.line.strokeWidth = 6;
            axis.renderer.line.stroke = chart.colors.getIndex(0);
            axis.renderer.ticks.template.disabled = false
            axis.renderer.ticks.template.stroke = chart.colors.getIndex(0);
            axis.renderer.labels.template.radius = 40;
            axis.renderer.ticks.template.strokeOpacity = 1;
            axis.renderer.grid.template.disabled = true;
            axis.renderer.ticks.template.length = 10;
            axis.hiddenState.properties.opacity = 1;
            axis.hiddenState.properties.visible = true;
            axis.setStateOnChildren = true;
            axis.renderer.hiddenState.properties.endAngle = 180;
            // axis.renderer.labels.template.adapter.add("text", function(text) {
            //   return text + "%";
            // })

            var axis2 = chart.xAxes.push(new am4charts.ValueAxis());
            axis2.min = 0;
            axis2.max = 1500;
            axis2.strictMinMax = true;

            axis2.renderer.line.strokeOpacity = 1;
            axis2.renderer.line.strokeWidth = 6;
            axis2.renderer.line.stroke = "#fe5252";
            axis2.renderer.ticks.template.stroke = "#fe5252";

            axis2.renderer.ticks.template.disabled = false
            axis2.renderer.ticks.template.strokeOpacity = 1;
            axis2.renderer.grid.template.disabled = true;
            axis2.renderer.ticks.template.length = 10;
            axis2.hiddenState.properties.opacity = 1;
            axis2.hiddenState.properties.visible = true;
            axis2.setStateOnChildren = true;
            axis2.renderer.hiddenState.properties.endAngle = 180;

            var hand = chart.hands.push(new am4charts.ClockHand());
            hand.fill = axis.renderer.line.stroke;
            hand.stroke = axis.renderer.line.stroke;
            hand.axis = axis;
            hand.pin.radius = 14;
            hand.startWidth = 10;

            var hand2 = chart.hands.push(new am4charts.ClockHand());
            hand2.fill = axis2.renderer.line.stroke;
            hand2.stroke = axis2.renderer.line.stroke;
            hand2.axis = axis2;
            hand2.pin.radius = 10;
            hand2.startWidth = 10;

            function startInterval() {
                interval = setInterval(function() {
                    $.getJSON("getdataapi.php", function(OBJ) {
                        visits = (OBJ.U_1_Voltage_LL_V);
                        visits2 = (OBJ.U_1_Current_Avg_Amp);
                        // console.log(OBJ.U_1_Current_Avg_Amp);
                        // console.log(OBJ.U_1_Voltage_LL_V);
                        hand.showValue(visits);
                        label.text = Math.round(hand.value).toString();
                        hand2.showValue(visits2);
                        label2.text = Math.round(hand2.value).toString();
                    });
                }, 1000);
            }
            startInterval();
            var legend = new am4charts.Legend();
            legend.isMeasured = false;
            legend.y = am4core.percent(100);
            legend.verticalCenter = "bottom";
            legend.parent = chart.chartContainer;
            legend.data = [{
                "name": "Voltage",
                "fill": chart.colors.getIndex(0)
            }, {
                "name": "Current",
                "fill": "#fe5252"
            }];
            legend.itemContainers.template.events.on("hit", function(ev) {
                var index = ev.target.dataItem.index;

                if (!ev.target.isActive) {
                    chart.hands.getIndex(index).hide();
                    chart.xAxes.getIndex(index).hide();
                    labelList.getIndex(index).hide();
                } else {
                    chart.hands.getIndex(index).show();
                    chart.xAxes.getIndex(index).show();
                    labelList.getIndex(index).show();
                }
            });

            var labelList = new am4core.ListTemplate(new am4core.Label());
            labelList.template.isMeasured = false;
            labelList.template.background.strokeWidth = 2;
            labelList.template.fontSize = 18;
            labelList.template.padding(10, 20, 10, 20);
            labelList.template.y = am4core.percent(50);
            labelList.template.horizontalCenter = "middle";

            var label = labelList.create();
            label.parent = chart.chartContainer;
            label.x = am4core.percent(40);
            label.background.stroke = chart.colors.getIndex(0);
            label.fill = chart.colors.getIndex(0);
            label.text = "0";

            var label2 = labelList.create();
            label2.parent = chart.chartContainer;
            label2.x = am4core.percent(60);
            label2.background.stroke = "#fe5252";
            label2.fill = "#fe5252";
            label2.text = "0";
        }); // end am4core.ready()
    </script>
    <script>
        var auto_refresh = setInterval(function() {
            $.ajax({
                type: "POST",
                url: "calculations/total_energy_com.php?value=Today",
                data: "refreshStatus",
                success: function(status) {
                    $('#Status').text(status);
                },
            });
        }, 5000);
        var auto_refresh = setInterval(function() {
            $.ajax({
                type: "POST",
                url: "calculations/total_energy_com.php?value=This Week",
                data: "refreshStatus",
                success: function(status) {
                    $('#Status1').text(status);
                },
            });
        }, 5000);
        var auto_refresh = setInterval(function() {
            $.ajax({
                type: "POST",
                url: "calculations/total_energy_com.php?value=This Month",
                data: "refreshStatus",
                success: function(status) {
                    $('#Status2').text(status);
                },
            });
        }, 5000);
        var auto_refresh = setInterval(function() {
            $.ajax({
                type: "POST",
                url: "calculations/total_energy_com.php?value=This Year",
                data: "refreshStatus",
                success: function(status) {
                    $('#Status3').text(status);
                },
            });
        }, 5000);
    </script>
</body>

</html>