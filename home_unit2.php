<?php
session_start();

if (!isset($_SESSION['auth'])) {
    // not logged in
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<style type="text/css">
    .animation {
        animation: fadeInAnimation ease 2s;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
    }

    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }

        from {
            top: -150px;
        }

        to {
            top: 0px;
        }
    }

    select {
        /* styling */
        background-color: white;
        border: thin solid blue;
        border-radius: 4px;
        display: inline-block;
        font: inherit;
        /*line-height: 1.5em;*/
        padding: 0.3em 1em 0.3em 1em;
        /* reset */
        margin: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    #card1 {
        background: #7abcff;
        background: -moz-radial-gradient(center, ellipse cover, #7abcff 0, #60abf8 44%, #4096ee 100%);
        background: -webkit-gradient(radial, center center, 0, center center, 100%, color-stop(0, #7abcff), color-stop(44%, #60abf8), color-stop(100%, #4096ee));
        background: -webkit-radial-gradient(center, ellipse cover, #7abcff 0, #60abf8 44%, #4096ee 100%);
        background: -o-radial-gradient(center, ellipse cover, #7abcff 0, #60abf8 44%, #4096ee 100%);
        background: -ms-radial-gradient(center, ellipse cover, #7abcff 0, #60abf8 44%, #4096ee 100%);
        background: radial-gradient(ellipse at center, #7abcff 0, #60abf8 44%, #4096ee 100%)
    }

    .city h1 {
        padding: 0;
        margin: 5px 0;
        text-align: center;
        font-size: 11pt;
        text-transform: uppercase;
        color: #fff;
        font-weight: 400
    }

    .icon {
        width: 50%;
        height: auto;
        float: left;
        padding: 10px;
        color: gold;
        margin: 10px 0;
        position: relative
    }

    .icon .fa-sun-o {
        font-size: 70pt;
        position: absolute;
        text-shadow: 0 0 20px #fff
    }

    .icon .fa-cloud {
        font-size: 50pt;
        position: absolute;
        top: 25px;
        right: 25px;
        color: rgba(255, 255, 255, .9)
    }

    .icon .fa-cloud+.two {
        top: 15px;
        right: 5px;
        font-size: 40pt;
        color: #fff
    }

    .spin {
        animation: spin 60s linear infinite, glow 10s linear infinite
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg)
        }
    }

    .wind {
        animation: wind 7.5s ease-in-out infinite
    }

    @keyframes wind {
        50% {
            top: 30px;
            right: 15px
        }
    }

    @keyframes glow {
        50% {
            text-shadow: 0 0 5px #fff
        }
    }

    .current {
        font-size: 68pt;
        text-align: center;
        font-weight: lighter
    }

    #card1 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, .2)
    }

    .card {
        -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
        -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
        box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
    }

    /*#card1:hover
 {
    box-shadow:0 6px 10px rgba(0,0,0,.4);transform:scale(1.01)
}*/
</style>
<?php include('includes/head.php'); ?>

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
                                <div class="row align-items-center" style="margin-top:-20px ; margin-bottom:-20px">
                                    <div class="col-lg-9 col-sm-12">
                                        <div class="page-header-title">
                                            <h3 class="m-b-10">Naubahar Bottling Company (Pvt.) Ltd</h3>
                                            <h5 class="m-b-10">EMS - Unit 2</h5>
                                            <h6 class="m-b-0">Welcome to Jahaann</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Plant
                                                    Summary</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <center>
                                            <h3 style="margin-top:-25px ;">Energy Consumption</h3>
                                        </center>
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="card col-lg-12 col-sm-6 animation" style="background-color:#e6eaf3 ;  border-top-style: solid;border-radius: 10px !important;border-color: #206bc4; margin-bottom:-15px">
                                                <div class="card-body" style="background-color:#e6eaf3">
                                                    <div class="row">

                                                        <div class="col-lg-3 col-sm-6">
                                                            <div style="background:none; border-right: 2px solid rgb(167, 191, 223);">
                                                                <div class="card-body" style="height:170px;">
                                                                    <div class="d-flex">
                                                                        <h5 class="card-title" style="color: black">
                                                                            <b> Today
                                                                            </b>
                                                                        </h5>


                                                                    </div><br><br>
                                                                    <center>
                                                                        <div style="margin-top:-20px">
                                                                            <i class="fa fa-line-chart menu-icon" style="font-size:500%; color: #448aff; opacity:0.7"></i><br>
                                                                            <b><span style="padding-left: 1%;font-size: 2vw;color: black;" id="Today"></span></b><span style="color: black; font-size:126%;">&nbsp&nbsp(kWh)</span>
                                                                        </div>

                                                                </div>
                                                                </center>

                                                            </div>

                                                        </div>
                                                        <div class="col-lg-3 col-sm-6 ">
                                                            <div style="background:none; border-right: 2px solid rgb(167, 191, 223);">
                                                                <div class="card-body" style="height:170px;">
                                                                    <div class="d-flex">
                                                                        <h5 class="card-title" style="color: black">
                                                                            <b>This Week
                                                                            </b>
                                                                        </h5>

                                                                    </div><br><br>
                                                                    <center>
                                                                        <div style="margin-top:-20px">
                                                                            <i class="fa fa-line-chart menu-icon" style="font-size:500%; color:#8301ab;opacity:0.7"></i><br>
                                                                            <b><span style="padding-left: 1%;font-size: 2vw;color: black " id="Week"></span></b><span style="color: black; font-size:126%">&nbsp&nbsp(kWh)</span>
                                                                        </div>

                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div style="background:none; border-right: 2px solid rgb(167, 191, 223);">
                                                                <div class="card-body" style="height:170px;">
                                                                    <div class="d-flex">
                                                                        <h5 class="card-title" style="color: black">
                                                                            <b>This Month
                                                                            </b>
                                                                        </h5>

                                                                    </div><br><br>
                                                                    <center>
                                                                        <div style="margin-top:-20px">
                                                                            <i class="fa fa-line-chart menu-icon" style="font-size:500%;color: #11c15b;opacity:0.7"></i><br>
                                                                            <b><span style="padding-left: 1%;font-size: 2vw;color: black " id="Month"></span></b><span style="color: black; font-size:126%">&nbsp&nbsp(kWh)</span>
                                                                        </div>

                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div style="background:none;">
                                                                <div class="card-body" style="height:170px;">
                                                                    <div class="d-flex">
                                                                        <h5 class="card-title" style="color: black">
                                                                            <b>This Year
                                                                            </b>
                                                                        </h5>

                                                                    </div><br><br>
                                                                    <center>
                                                                        <div style="margin-top:-20px">
                                                                            <i class="fa fa-line-chart menu-icon" style="font-size: 500%; color:#ff5252;opacity:0.7"></i><br>
                                                                            <b><span style="padding-left: 1%;font-size: 2vw;color: black " id="Year"></span></b><span style="color: black; font-size:126%">&nbsp&nbsp(kWh)</span>
                                                                        </div>

                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <br><br>
                                        <div class="row">
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="card box-shadow" style="border-radius: 10px !important; background-color: #e6eaf3">
                                                    <div class="card-body" style="height: 400px;border-top-style: solid;border-radius: 10px !important;border-color: #206bc4;">
                                                        <div class="d-flex">
                                                            <p class="card-title" style="color: black;font-size:124%"><b>Areas Energy Consumption
                                                                    Breakdown</b></p>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_cost_pie_option" class="form-select" required name="option" onchange="energy_pie(this.options[this.selectedIndex].value);">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="Last 30 Days">Last 30 Days
                                                                        </option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="This Year">This Year</option>
                                                                        <option value="This Week">This Week</option>
                                                                        <option value="This Month">This Month</option>
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
                                                        <div id="energy_cost_pie_chart" style="width: 100%; height:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="card box-shadow" style="border-radius: 10px !important; background-color: #e6eaf3">
                                                    <div class="card-body" style="height: 400px;border-top-style: solid;border-radius: 10px !important;border-color: #206bc4;">
                                                        <div class="d-flex">
                                                            <p class="card-title" style="color: black;font-size:124%"><b>Transformers Energy Consumption
                                                                    Breakdown</b></p>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_cost_pie_option1" class="form-select" required name="option" onchange="energy_pie1(this.options[this.selectedIndex].value);">
                                                                        <option value="Today">Today</option>
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="Last 30 Days">Last 30 Days
                                                                        </option>
                                                                        <option value="Yesterday">Yesterday</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="This Year">This Year</option>
                                                                        <option value="This Week">This Week</option>
                                                                        <option value="This Month">This Month</option>
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
                                                        <div id="energy_cost_pie_chart1" style="width: 100%; height:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 col-xl-12">
                                                <div class="card box-shadow" style="border-radius: 10px !important; background-color: #e6eaf3">
                                                    <div class="card-body" style="height: 390px;border-top-style: solid; border-radius: 4px !important;border-color: #779ad5;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color:#000;"> Energy
                                                                Comparison (kWh)</h5>
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
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script type="text/javascript">
        $.ajax({
            type: "POST",
            url: "calculations/unit2/totalunit2.php?value=Today",
            data: "refreshStatus",
            success: function(status) {
                $('#Today').text(status);
            },
        });
        $.ajax({
            type: "POST",
            url: "calculations/unit2/totalunit2.php?value=This Week",
            data: "refreshStatus",
            success: function(status) {
                $('#Week').text(status);
            },
        });
        $.ajax({
            type: "POST",
            url: "calculations/unit2/totalunit2.php?value=This Month",
            data: "refreshStatus",
            success: function(status) {
                $('#Month').text(status);
            },
        });
        $.ajax({
            type: "POST",
            url: "calculations/unit2/totalunit2.php?value=This Year",
            data: "refreshStatus",
            success: function(status) {
                $('#Year').text(status);
            },
        });
        // //  functions for charts
        energy_pie("Today");

        function energy_pie(str2) {
            am4core.ready(function() {
                am4core.useTheme(am4themes_animated);
                var chart = am4core.create("energy_cost_pie_chart", am4charts.PieChart3D);
                if (chart.logo) {
                    chart.logo.disabled = true;
                }
                chart.hiddenState.properties.opacity = 0;
                chart.radius = am4core.percent(80);
                // this creates initial fade-in
                chart.legend = new am4charts.Legend();
                chart.legend.position = "right";
                chart.legend.valign = "middle";
                chart.legend.fontSize = 14;
                // chart.legend.fontWeight = "bold";
                chart.legend.maxWidth = 400;
                chart.legend.minWidth = 200;
                var markerTemplate = chart.legend.markers.template;
                markerTemplate.width = 9;
                markerTemplate.height = 9;
                chart.legend.paddingBottom = 5;
                chart.legend.scrollable = true;
                // chart.legend.valueLabels.template.disabled = true;
                chart.dataSource.url = "calculations/unit2Piechart/unit2total.php?value=" + str2;
                var series = chart.series.push(new am4charts.PieSeries());
                series.dataFields.value = "value";
                series.dataFields.category = "meter";
                series.slices.template.cornerRadius = 1;
                series.slices.template.showOnInit = true;
                series.slices.template.hiddenState.properties.shiftRadius = 1;
                series.ticks.template.disabled = true;
                series.alignLabels = false;
                series.labels.template.fontSize = 12;
                series.slices.template.tooltipText = "{category}\nKwh:{value}";

                series.ticks.template.events.on("ready", hideSmall);
                series.ticks.template.events.on("visibilitychanged", hideSmall);
                series.labels.template.events.on("ready", hideSmall);
                series.labels.template.events.on("visibilitychanged", hideSmall);

                function hideSmall(ev) {
                    if (ev.target.dataItem && (ev.target.dataItem.values.value.percent < 2)) {
                        ev.target.hide();
                    } else {
                        ev.target.show();
                    }
                }
                // Set up fills hover
                // Disable sliding out of slices
                series.slices.template.states.getKey("hover").properties.shiftRadius = 0;
                series.slices.template.states.getKey("hover").properties.scale = 1.1;
                series.labels.template.text = "{value}";
                //add legend on pie //
                series.labels.template.radius = am4core.percent(-40);
                series.labels.template.fill = am4core.color("white");
                series.labels.template.relativeRotation = 90;
                series.legendSettings.valueText = "{value} Kwh";

                series.labels.template.adapter.add("radius", function(radius, target) {
                    if (target.dataItem && (target.dataItem.values.value.percent <= 0.5)) {
                        return 0;
                    }
                    return radius;
                });
                series.labels.template.adapter.add("fill", function(color, target) {
                    if (target.dataItem && (target.dataItem.values.value.percent < 0.5)) {
                        return am4core.color("white");
                    }
                    return color;
                });
                series.colors.list = [
                    am4core.color("#74a6fa"), // ro
                    am4core.color("#a047c0"), // gRASSO
                    am4core.color("#51cd88"), // ECR
                    am4core.color("#f67f82"), // LINE
                ];
                // Responsive
                chart.responsive.enabled = true;
                chart.responsive.rules.push({
                    relevant: function(target) {
                        if (target.pixelWidth <= 600) {
                            return true;
                        }
                        return false;
                    },
                    state: function(target, stateId) {
                        if (target instanceof am4charts.PieSeries) {
                            var state = target.states.create(stateId);

                            var labelState = target.labels.template.states.create(stateId);
                            labelState.properties.disabled = true;

                            var tickState = target.ticks.template.states.create(stateId);
                            tickState.properties.disabled = true;
                            return state;
                        }

                        return null;
                    }
                });
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
    </script>
    <script>
        energy_pie1("Today");

        function energy_pie1(str2) {
            am4core.ready(function() {
                am4core.useTheme(am4themes_animated);
                var chart = am4core.create("energy_cost_pie_chart1", am4charts.PieChart3D);
                if (chart.logo) {
                    chart.logo.disabled = true;
                }
                chart.hiddenState.properties.opacity = 0;
                chart.radius = am4core.percent(80);
                chart.innerRadius = am4core.percent(40); // Added this line to make it a doughnut chart

                chart.legend = new am4charts.Legend();
                chart.legend.position = "right";
                chart.legend.valign = "middle";
                chart.legend.fontSize = 14;
                chart.legend.maxWidth = 400;
                chart.legend.minWidth = 200;
                var markerTemplate = chart.legend.markers.template;
                markerTemplate.width = 9;
                markerTemplate.height = 9;
                chart.legend.paddingBottom = 5;
                chart.legend.scrollable = true;
                chart.dataSource.url = "calculations/unit2Piechart/unit2trafo.php?value=" + str2;

                var series = chart.series.push(new am4charts.PieSeries());
                series.dataFields.value = "value";
                series.dataFields.category = "meter";
                series.slices.template.cornerRadius = 1;
                series.slices.template.showOnInit = true;
                series.slices.template.hiddenState.properties.shiftRadius = 1;
                series.ticks.template.disabled = true;
                series.alignLabels = false;
                series.labels.template.fontSize = 12;
                series.slices.template.tooltipText = "{category}\nKwh:{value}";

                series.ticks.template.events.on("ready", hideSmall);
                series.ticks.template.events.on("visibilitychanged", hideSmall);
                series.labels.template.events.on("ready", hideSmall);
                series.labels.template.events.on("visibilitychanged", hideSmall);

                function hideSmall(ev) {
                    if (ev.target.dataItem && (ev.target.dataItem.values.value.percent < 2)) {
                        ev.target.hide();
                    } else {
                        ev.target.show();
                    }
                }

                series.slices.template.states.getKey("hover").properties.shiftRadius = 0;
                series.slices.template.states.getKey("hover").properties.scale = 1.1;
                series.labels.template.text = "{value}";
                series.labels.template.radius = am4core.percent(-40);
                series.labels.template.fill = am4core.color("white");
                series.labels.template.relativeRotation = 90;
                series.legendSettings.valueText = "{value} Kwh";

                series.labels.template.adapter.add("radius", function(radius, target) {
                    if (target.dataItem && (target.dataItem.values.value.percent <= 0.5)) {
                        return 0;
                    }
                    return radius;
                });
                series.labels.template.adapter.add("fill", function(color, target) {
                    if (target.dataItem && (target.dataItem.values.value.percent < 0.5)) {
                        return am4core.color("white");
                    }
                    return color;
                });

                series.colors.list = [
                    am4core.color("#74a6fa"),
                    am4core.color("#a047c0"),
                    am4core.color("#51cd88"),
                    am4core.color("#f67f82"),
                ];

                chart.responsive.enabled = true;
                chart.responsive.rules.push({
                    relevant: function(target) {
                        return target.pixelWidth <= 600;
                    },
                    state: function(target, stateId) {
                        if (target instanceof am4charts.PieSeries) {
                            var state = target.states.create(stateId);

                            var labelState = target.labels.template.states.create(stateId);
                            labelState.properties.disabled = true;

                            var tickState = target.ticks.template.states.create(stateId);
                            tickState.properties.disabled = true;
                            return state;
                        }

                        return null;
                    }
                });

                chart.exporting.menu = new am4core.ExportMenu();
                chart.exporting.menu.align = "right";
                chart.exporting.menu.verticalAlign = "top";
                chart.exporting.formatOptions.getKey("json").disabled = true;
                chart.exporting.formatOptions.getKey("html").disabled = true;
                chart.exporting.formatOptions.getKey("csv").disabled = true;
                chart.exporting.formatOptions.getKey("pdf").disabled = true;
                chart.exporting.menu.items[0].icon =
                    "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxNnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxNiAxNiIgd2lkdGg9IjE2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM9Imh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaC9ucyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjx0aXRsZS8+PGRlZnMvPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCIgaWQ9IkNvbnMgY29yZy1udW1iZXJzIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSI+PGcgZmlsbD0iIzAwMDAwMCIgaWQ9Ikdyb3VwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNzIwLjAwMDAwMCwgLTQzMi4wMDAwMDApIj48cGF0aCBkPSJNMTksNDQ2IEwxOTAsNDQ2IEwxOTAsNDQzIEwxOTMsNDQzIEwxOTMsNDQ2IEwxOTMsNDQ4IEwxOSw0NDggWiBNMTksNDQzIEwxOTIsNDQzIEwxOTIsNDQ2IEwxOTAsNDQ2IFogTTE5Nyw0MzMgTDE5OSw0MzMgTDE5OSw0NDAgTDIwMSw0NDAgTDIwMyw0NDMgTDIwMCw0NDcgTDIwMiw0NDcgTDE5OSw0NDMgWiBNMTk3LDQzMyIgaWQ9IlJlY3RhbmdsZSAyMTciLz48L2c+PC9nPjwvc3ZnPg==";
            });
        }
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
            axis.max = 1500;
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
            axis2.max = 20000;
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
                    $.getJSON("getdataapi_1.php", function(OBJ) {
                        visits = ((OBJ.GW1_U8_Voltage_LL_V + OBJ.GW1_U26_Voltage_LL_V + OBJ.GW1_U25_Voltage_LL_V) / 3) / 10;
                        visits2 = ((OBJ.GW1_U8_Current_Avg_Amp + OBJ.GW1_U26_Current_Avg_Amp + OBJ.GW1_U25_Current_Avg_Amp));
                        // console.log(OBJ.PLC_Date_Time);
                        // console.log(OBJ.GW1_U8_Current_Avg_Amp);
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
                "name": "Voltage (V)",
                "fill": chart.colors.getIndex(0)
            }, {
                "name": "Current (A)",
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



            // Attach a listener for window resize
            window.addEventListener("resize", handleResponsive);
            handleResponsive(); // Call the function initially
        }); // end am4core.ready()
    </script>
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
                    series.columns.template.tooltipX = am4core.percent(100);
                    series.columns.template.tooltipY = am4core.percent(0);
                    series.columns.template.tooltipText = "Total Energy Usage (kWh)\n{name}:{valueY}";
                    series.tooltip.getFillFromObject = false;
                    series.tooltip.background.fill = am4core.color("#fff");
                    // series.tooltip.autoTextColor = false;
                    series.tooltip.label.fill = am4core.color("#000000");
                    series.tooltip.background.stroke = am4core.color("#000");
                    series.tooltip.background.strokeWidth = 2;
                    return series;
                }
                chart.dataSource.url = "calculations/unit2/database5.php?value=" + str2;
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
    <?php include('includes/footer.php'); ?>
</body>

</html>