<?php
session_start();
// if(!isset($_SESSION['auth']))
// {
//   // not logged in
//   header('Location:index.php');
// }
?>
<!DOCTYPE html>
<html lang="en">
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<style type="text/css">
.form-select { 
    padding: 2px 0px 1px 6px; 
    border: solid 1px #9f9fa3; 
    border-radius: 3px;
    background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #CAD9E3), to(#FFFFFF)); 
    background: -moz-linear-gradient(top, #FFFFFF, #CAD9E3 1px, #FFFFFF 25px); 
    box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    width:130px;
    height: 28px;
    font-size: 14px;
    font-family: "Arial";
    } 
    .card-title{
   float: left;
    height: 35px;
    font-size: 20px;
    font-weight: bold;
    color: #626469;
    color: var(--detail-label-color);
}
#chartdiv {
  width: 100%;
  height: 300px;  
}
#energy_cost_pie_chart {
  width: 100%;
  height: 300px;  
}
#cost_chart_bar1{
    width: 100%;
  height: 350px; 
}
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
                                            <h4 class="m-b-10">Energy Comparison</h4>
                                            <h6 class="m-b-0" style="color: #284497">Main</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Energy Comparison</a>
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
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-lg-12 col-xl-8">
                                                <div class="card" style="border-radius: 5px !important;border: #9f9fa3 1px solid;background-color: #fff;">
                                                    <div class="card-body" style="height: 350px;border-top-style: solid; border-radius: 4px !important;border-color: #779ad5;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: #626469;font-weight: bold;">Total Energy Usage</h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_cost_stacked" class="form-select" required name="option" onchange="energy_stacked(this.options[this.selectedIndex].value);">
                                                                        
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="This Week">This Week</option>
                                                                        <option value="Last 30 Days">Last 30 Days</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        
                                                                        <!-- <option value="This Year">This Year</option> -->
                                                                        
                                                                        <!-- <option value="This Month">This Month</option> -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-right">
                                                              <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-window-maximize full-card" style="margin-top:06px;padding-left:5px;font-size: 1.20em"></i></li>
                                                              </ul>
                                                            </div>
                                                        </div>
                                                        <div id="chartdiv" style="height:95%;width:100%"></div>
                                                    </div>
                                                </div>
                                            </div>                                    
                                           <div class="col-lg-6 col-xl-4">
                                                <div class="card" style="border-radius: 10px !important;">
                                                    <div class="card-body" style="height: 350px;border-top-style: solid;border-radius: 3px !important;border-color: #779ad5;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: #626469;font-weight: bold;">Total Energy Usage</h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_cost_pie_option" class="form-select" required name="option" onchange="energy_pie(this.options[this.selectedIndex].value);">
                                                                        
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="Today">Today</option>
                                                                          <option value="This Week">This Week</option>
                                                                          <option value="This Month">This Month</option>
                                                                          <option value="This Year">This Year</option>
                                                                          
                                                                          <option value="Last 30 Days">Last 30 Days</option>
                                                                         <!--  <option value="Yesterday">Yesterday</option> -->
                                                                           
                                                                        <!--  <option value="This Month">This Month</option> -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-right">
                                                              <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-window-maximize full-card" style="margin-top:06px;padding-left:5px;font-size: 1.20em"></i></li>
                                                              </ul>
                                                            </div>          
                                                        </div>
                                                         <div id="energy_cost_pie_chart" style="height:95%;width:100%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-8">
                                                <div class="card" style="border-radius: 10px !important;">
                                                    <div class="card-body" style="height: 350px;border-top-style: solid;border-radius: 3px !important;border-color: #779ad5;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: #626469;font-weight: bold;">Total Energy Usage</h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_cost_bar_option" class="form-select" required name="option"  onchange="energy_bar(this.options[this.selectedIndex].value);">
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="This Week">This Week</option>
                                                                        <!-- <option value="This Month">This Month</option> -->
                                                                        <option value="Last 30 Days">Last 30 Days</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <option value="This Year">This Year</option>
                                                                        <!-- <option value="Yesterday">Yesterday</option> -->      
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-right">
                                                              <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-window-maximize full-card" style="margin-top:06px;padding-left:5px;font-size: 1.20em"></i></li>
                                                              </ul>
                                                            </div>
                                                        </div>
                                                        <div id="cost_chart_bar" style="height:95%;width:100%"></div> 
                                                    </div>
                                                </div>
                                            </div>                                    
                                           <div class="col-lg-6 col-xl-4">
                                                <div class="card" style="border-radius: 10px !important;">
                                                    <div class="card-body" style="height: 350px;border-top-style: solid;border-radius: 3px !important;border-color: #779ad5;">
                                                        <div class="d-flex">
                                                            <h5 class="card-title" style="color: #626469;font-weight: bold;">Total Energy Usage</h5>
                                                            <div class="ml-auto">
                                                                <div class="dropdown">
                                                                    <select id="energy_cost_bar_option" class="form-select" required name="option"  onchange="energy_bar1(this.options[this.selectedIndex].value);">
                                                                        <option value="Last 7 Days">Last 7 Days</option>
                                                                        <option value="This Week">This Week</option>
                                                                        <option value="Last 30 Days">Last 30 Days</option>
                                                                        <option value="Last Week">Last Week</option>
                                                                        <!-- <option value="Yesterday">Yesterday</option> -->
                                                                        <!-- <option value="This Year">This Year</option> -->
                                                                        <!--  <option value="This Month">This Month</option> -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="card-header-right">
                                                              <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-window-maximize full-card" style="margin-top:06px;padding-left:5px;font-size: 1.20em"></i></li>
                                                              </ul>
                                                            </div>           
                                                        </div>
                                                        <div id="cost_chart_bar1" style="height:95%;width:100%"></div>
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
 <?php include('includes/footer.php'); ?>  
 <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<!-- <script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script> -->
 <script>
function energy_stacked(str2){
am4core.ready(function() {
am4core.useTheme(am4themes_animated);
 // am4core.useTheme(am4themes_dataviz);
 am4core.options.autoSetClassName = true;
var chart = am4core.create("chartdiv", am4charts.XYChart);
 if(chart.logo) {
    chart.logo.disabled = true ;
  }
chart.hiddenState.properties.opacity = 0;
 // this creates initial fade-in
chart.dataSource.url = "calculations/database3.php?value="+str2;
// chart.colors.step = 2;
chart.padding(30, 30, 10, 30);
chart.legend = new am4charts.Legend();
chart.legend.fontSize = 9;
var markerTemplate = chart.legend.markers.template;
markerTemplate.width = 9;
markerTemplate.height = 9;
chart.legend.paddingBottom =-10;
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "meter";
categoryAxis.renderer.line.strokeOpacity = 0.9;
categoryAxis.renderer.line.strokeWidth = 1;
categoryAxis.renderer.line.stroke = am4core.color("black");
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.line.strokeOpacity = 0.9;
valueAxis.renderer.line.strokeWidth = 1;
valueAxis.renderer.line.stroke = am4core.color("black");
valueAxis.min = 0;
valueAxis.max =120;
valueAxis.strictMinMax = true;
valueAxis.calculateTotals = true;
valueAxis.renderer.minWidth = 50;
chart.colors.list = [
  am4core.color("#609eec"),// water treatment
  am4core.color("#bd2d18"),// Turbine 1
  am4core.color("#57cd7d")// syrup room 
];
var series1 = chart.series.push(new am4charts.ColumnSeries());
series1.columns.template.width = am4core.percent(80);
series1.columns.template.tooltipText =
  "{name}\nKwh: {valueY.totalPercent.formatNumber('#.00')}%";
series1.name = "Water Treatment";
series1.dataFields.categoryX = "meter";
series1.dataFields.valueY = "value1";
series1.dataFields.valueYShow = "totalPercent";
series1.dataItems.template.locations.categoryX = 0.5;
series1.stacked = true;
series1.tooltip.pointerOrientation = "vertical";
var series2 = chart.series.push(new am4charts.ColumnSeries());
series2.columns.template.width = am4core.percent(80);
series2.columns.template.tooltipText =
  "{name}\nKwh: {valueY.totalPercent.formatNumber('#.00')}%";
series2.name = "Turbine 1";
series2.dataFields.categoryX = "meter";
series2.dataFields.valueY = "value2";
series2.dataFields.valueYShow = "totalPercent";
series2.dataItems.template.locations.categoryX = 0.5;
series2.stacked = true;
series2.tooltip.pointerOrientation = "vertical";
var series3 = chart.series.push(new am4charts.ColumnSeries());
series3.columns.template.width = am4core.percent(80);
series3.columns.template.tooltipText =
  "{name}\nKwh: {valueY.totalPercent.formatNumber('#.00')}%";
series3.name = "Syrup Room";
series3.dataFields.categoryX = "meter";
series3.dataFields.valueY = "value3";
series3.dataFields.valueYShow = "totalPercent";
series3.dataItems.template.locations.categoryX = 0.5;
series3.stacked = true;
series3.tooltip.pointerOrientation = "vertical";
// chart.scrollbarX = new am4core.Scrollbar();
chart.exporting.menu = new am4core.ExportMenu();
chart.exporting.getFormatOptions("pdfdata").addURL = false;
// chart.exporting.title = document.getElementById("energy_cost_stacked").innerHTML;
chart.exporting.filePrefix = "Energy Usage";
// chart.exporting.useWebFonts = false;
chart.exporting.menu.align = "right";
chart.exporting.menu.verticalAlign = "top";
chart.exporting.formatOptions.getKey("json").disabled = true;
chart.exporting.formatOptions.getKey("html").disabled = true;
chart.exporting.formatOptions.getKey("csv").disabled = true;
chart.exporting.formatOptions.getKey("pdf").disabled = true;
chart.exporting.adapter.add("pdfmakeDocument", function(pdf, target) {

  // Add title to the beginning
  pdf.doc.content.unshift({
    text: "Total Energy Usage",
    margin: [0, 30],
    style: {
      fontSize: 25,
      bold: true,
    }
  });

  return pdf;
});

chart.exporting.menu.items[0].icon = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxNnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxNiAxNiIgd2lkdGg9IjE2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6c2tldGNoPSJodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2gvbnMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48dGl0bGUvPjxkZWZzLz48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJJY29ucyB3aXRoIG51bWJlcnMiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIj48ZyBmaWxsPSIjMDAwMDAwIiBpZD0iR3JvdXAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03MjAuMDAwMDAwLCAtNDMyLjAwMDAwMCkiPjxwYXRoIGQ9Ik03MjEsNDQ2IEw3MzMsNDQ2IEw3MzMsNDQzIEw3MzUsNDQzIEw3MzUsNDQ2IEw3MzUsNDQ4IEw3MjEsNDQ4IFogTTcyMSw0NDMgTDcyMyw0NDMgTDcyMyw0NDYgTDcyMSw0NDYgWiBNNzI2LDQzMyBMNzMwLDQzMyBMNzMwLDQ0MCBMNzMyLDQ0MCBMNzI4LDQ0NSBMNzI0LDQ0MCBMNzI2LDQ0MCBaIE03MjYsNDMzIiBpZD0iUmVjdGFuZ2xlIDIxNyIvPjwvZz48L2c+PC9zdmc+";
}); 
}
energy_stacked("Last 7 Days");
</script> 
<script>
    function energy_pie(str2) {
        am4core.ready(function() {
            //   function am4themes_myTheme(target) {
            //   if (target instanceof am4core.ColorSet) {
            //     target.list = [
            //       am4core.color("red")
            //     ];
            //   }
            // }
            // am4core.useTheme(am4themes_myTheme);
            am4core.useTheme(am4themes_animated);
            // am4core.useTheme(am4themes_dataviz);
            // am4core.options.commercialLicense = true;
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
            chart.legend.maxHeight = 200;
            chart.legend.maxWidth = 200;
            chart.legend.scrollable = true;
            chart.dataSource.url = "calculations/database1.php?value=" + str2;
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
            // Set up fills hover
            // Disable sliding out of slices
            series.slices.template.states.getKey("hover").properties.shiftRadius = 0;
            series.slices.template.states.getKey("hover").properties.scale = 1.1;
            series.labels.template.text = "{value}";
            //add legend on pie //
            series.labels.template.radius = am4core.percent(-60);
            series.labels.template.fill = am4core.color("white");
            series.labels.template.relativeRotation = 90;
            series.labels.template.adapter.add("radius", function(radius, target) {
                if (target.dataItem && (target.dataItem.values.value.percent < 0.9)) {
                    return 0;
                }
                return radius;
            });
            series.labels.template.adapter.add("fill", function(color, target) {
                if (target.dataItem && (target.dataItem.values.value.percent < 0.9)) {
                    return am4core.color("white");
                }
                return color;
            });
            series.colors.list = [
                am4core.color("#609eec"),// water treatment
                  am4core.color("#bd2d18"),// Turbine 1
                  am4core.color("#57cd7d")// syrup room 
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
    energy_pie("Today");
    </script>
<script>
  function energy_bar(str2){
  // var str2=document.getElementById("energy_cost_bar_option").value;
  // var jsonData = $.ajax({
  // url: "claculations/database2.php?value="+str2,
  // dataType: "json",
  // async: false
  // }).responseText;
  am4core.ready(function() {
  am4core.useTheme(am4themes_animated);
  var chart = am4core.create('cost_chart_bar', am4charts.XYChart)
 if(chart.logo) {
    chart.logo.disabled = true ;
  }
chart.legend = new am4charts.Legend()
chart.legend.position = 'bottom'
chart.legend.fontSize = 9;
var markerTemplate = chart.legend.markers.template;
markerTemplate.width = 9;
markerTemplate.height = 9;
chart.legend.paddingBottom = 10
var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
xAxis.dataFields.category = 'meter'
xAxis.renderer.line.strokeOpacity = 0.9;
xAxis.renderer.line.strokeWidth = 1;
xAxis.renderer.line.stroke = am4core.color("black");
chart.colors.list = [
  am4core.color("#bd2d18"),// water treatment
  am4core.color("#609eec"),// Turbine 1
  am4core.color("#57cd7d")// syrup room
];
var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
yAxis.renderer.line.strokeOpacity = 0.9;
yAxis.renderer.line.strokeWidth = 1;
yAxis.renderer.line.stroke = am4core.color("black");
// yAxis.min = 0;
// yAxis.max = 800;
function createSeries(value, name) {
    var series = chart.series.push(new am4charts.ColumnSeries())
    series.dataFields.valueY = value
    series.dataFields.categoryX = 'meter'
    series.name = name
    series.columns.template.tooltipX = am4core.percent(100);
    series.columns.template.tooltipY = am4core.percent(0);
    series.columns.template.tooltipText = "{name}\nKwh:{valueY}";
    return series;
}
chart.dataSource.url = "calculations/database4.php?value="+str2;
// createSeries('value1', 'Main LT');
createSeries('value2', 'Water Treatment');
createSeries('value3', 'Turbine 1');
createSeries('value4', 'Syrup Room');
chart.cursor = new am4charts.XYCursor();
yAxis.cursorTooltipEnabled = false;
xAxis.cursorTooltipEnabled = false;
chart.exporting.menu = new am4core.ExportMenu();
// chart.exporting.export("png");
chart.exporting.menu.align = "right";
chart.exporting.menu.verticalAlign = "top";
chart.exporting.formatOptions.getKey("json").disabled = true;
chart.exporting.formatOptions.getKey("html").disabled = true;
chart.exporting.formatOptions.getKey("csv").disabled = true;
chart.exporting.formatOptions.getKey("pdf").disabled = true;
chart.exporting.menu.items[0].icon = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxNnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxNiAxNiIgd2lkdGg9IjE2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6c2tldGNoPSJodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2gvbnMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48dGl0bGUvPjxkZWZzLz48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJJY29ucyB3aXRoIG51bWJlcnMiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIj48ZyBmaWxsPSIjMDAwMDAwIiBpZD0iR3JvdXAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03MjAuMDAwMDAwLCAtNDMyLjAwMDAwMCkiPjxwYXRoIGQ9Ik03MjEsNDQ2IEw3MzMsNDQ2IEw3MzMsNDQzIEw3MzUsNDQzIEw3MzUsNDQ2IEw3MzUsNDQ4IEw3MjEsNDQ4IFogTTcyMSw0NDMgTDcyMyw0NDMgTDcyMyw0NDYgTDcyMSw0NDYgWiBNNzI2LDQzMyBMNzMwLDQzMyBMNzMwLDQ0MCBMNzMyLDQ0MCBMNzI4LDQ0NSBMNzI0LDQ0MCBMNzI2LDQ0MCBaIE03MjYsNDMzIiBpZD0iUmVjdGFuZ2xlIDIxNyIvPjwvZz48L2c+PC9zdmc+";
});
}
energy_bar("Last 7 Days");
</script>
<script>
  function energy_bar1(str2){
  // var str2=document.getElementById("energy_cost_bar_option").value;
  // var jsonData = $.ajax({
  // url: "claculations/database2.php?value="+str2,
  // dataType: "json",
  // async: false
  // }).responseText;
  am4core.ready(function() {
  am4core.useTheme(am4themes_animated);
  var chart = am4core.create('cost_chart_bar1', am4charts.XYChart)
 if(chart.logo) {
    chart.logo.disabled = true ;
  }
chart.legend = new am4charts.Legend()
chart.legend.position = 'bottom'
chart.legend.fontSize = 9;
var markerTemplate = chart.legend.markers.template;
markerTemplate.width = 9;
markerTemplate.height = 9;
chart.legend.paddingBottom = 10
// Create axes
var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "meter";
categoryAxis.renderer.grid.template.opacity = 0;
categoryAxis.renderer.line.strokeOpacity = 0.9;
categoryAxis.renderer.line.strokeWidth = 1;
categoryAxis.renderer.line.stroke = am4core.color("black");
categoryAxis.renderer.grid.template.location = 0;
chart.colors.list = [
  am4core.color("#bd2d18"),// water treatment
  am4core.color("#609eec"),// Turbine 1
  am4core.color("#57cd7d")// syrup room
];
var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 5;
valueAxis.renderer.grid.template.opacity = 0;
valueAxis.renderer.ticks.template.strokeOpacity = 0.5;
valueAxis.renderer.ticks.template.length = 10;
valueAxis.renderer.line.strokeOpacity = 0.9;
valueAxis.renderer.baseGrid.disabled = true;
valueAxis.renderer.minGridDistance = 40;
valueAxis.renderer.line.strokeWidth = 1;
function createSeries(value, name) {
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.valueX = value;
  series.dataFields.categoryY = "meter";
  series.name = name;
}
chart.dataSource.url = "calculations/database4.php?value="+str2;
createSeries('value2', 'Water Treatment');
createSeries('value3', 'Turbine 1');
createSeries('value4', 'Syrup Room');
chart.cursor = new am4charts.XYCursor();
yAxis.cursorTooltipEnabled = false;
xAxis.cursorTooltipEnabled = false;
chart.exporting.menu = new am4core.ExportMenu();
// chart.exporting.export("png");
chart.exporting.menu.align = "right";
chart.exporting.menu.verticalAlign = "top";
chart.exporting.formatOptions.getKey("json").disabled = true;
chart.exporting.formatOptions.getKey("html").disabled = true;
chart.exporting.formatOptions.getKey("csv").disabled = true;
chart.exporting.formatOptions.getKey("pdf").disabled = true;
chart.exporting.menu.items[0].icon = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxNnB4IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxNiAxNiIgd2lkdGg9IjE2cHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6c2tldGNoPSJodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2gvbnMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48dGl0bGUvPjxkZWZzLz48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJJY29ucyB3aXRoIG51bWJlcnMiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIj48ZyBmaWxsPSIjMDAwMDAwIiBpZD0iR3JvdXAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03MjAuMDAwMDAwLCAtNDMyLjAwMDAwMCkiPjxwYXRoIGQ9Ik03MjEsNDQ2IEw3MzMsNDQ2IEw3MzMsNDQzIEw3MzUsNDQzIEw3MzUsNDQ2IEw3MzUsNDQ4IEw3MjEsNDQ4IFogTTcyMSw0NDMgTDcyMyw0NDMgTDcyMyw0NDYgTDcyMSw0NDYgWiBNNzI2LDQzMyBMNzMwLDQzMyBMNzMwLDQ0MCBMNzMyLDQ0MCBMNzI4LDQ0NSBMNzI0LDQ0MCBMNzI2LDQ0MCBaIE03MjYsNDMzIiBpZD0iUmVjdGFuZ2xlIDIxNyIvPjwvZz48L2c+PC9zdmc+";
});
}
energy_bar1("Last 7 Days");
</script>
</body>
</html>
