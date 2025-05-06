<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-- head start -->
<?php include('includes/head.php'); ?>
<style type="text/css">
    select {
  /* styling */
  background-color: #448aff;
  border: thin solid blue;
  border-radius: 4px;
  display: inline-block;
  font: inherit;
  color: white;
  /*line-height: 1.5em;*/
  padding: 0.3em 3.5em 0.3em 1em;
  /* reset */
  margin: 0;      
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-appearance: none;
  -moz-appearance: none;
}
/* arrows */

select.form-select{
  background-image:
    linear-gradient(45deg, transparent 50%, blue 50%),
    linear-gradient(135deg, blue 50%, transparent 50%),
    linear-gradient(to right, skyblue, skyblue);
  background-position:
    calc(100% - 20px) calc(1em + 2px),
    calc(100% - 15px) calc(1em + 2px),
    100% 0;
  background-size:
    5px 5px,
    5px 5px,
    2.5em 2.5em;
  background-repeat: no-repeat;
}
select.form-select:focus {
  background-image:
    linear-gradient(45deg, white 50%, transparent 50%),
    linear-gradient(135deg, transparent 50%, white 50%),
    linear-gradient(to right, gray, gray);
  background-position:
    calc(100% - 15px) 1em,
    calc(100% - 20px) 1em,
    100% 0;
  background-size:
    5px 5px,
    5px 5px,
    2.5em 2.5em;
  background-repeat: no-repeat;
  border-color: grey;
  outline: 0;
}
</style>
<!-- head end -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">

function drawChart() {
      var str=document.getElementById("ec_start_date").value;
      var str2=document.getElementById("ec_end_date").value;
      var str3=document.getElementById("ec_name").value;
      var str4=document.getElementById("ec_para").value;
      var str5=document.getElementById("ec_location").value;
      if(str3!=""&&str4!=""&&str5!="")
      {

        $('#dashboard').show();
        var jsonData = $.ajax({
            url: "calculations/trends_data_calculations.php?start_date="+str+"&end_date="+str2+"&meter="+str3+"&tag="+str4+"&location="+str5,
            dataType: "json",
            async: false
        }).responseText;
        //The DataTable object is used to hold the data passed into a visualization.
        var data = new google.visualization.DataTable(jsonData);
   
   
    var dash = new google.visualization.Dashboard(document.getElementById('dashboard'));

    var control = new google.visualization.ControlWrapper({
        controlType: 'ChartRangeFilter',
        containerId: 'control_div',
        options: {
            filterColumnIndex: 0,
            ui: {
                chartOptions: {
                    height: 100,
                    //width: 1500,
                    chartArea: {
                        width: '80%'
                    }
                }
            }
        }
    });

    var chart = new google.visualization.ChartWrapper({
        chartType: 'LineChart',
        containerId: 'chart_div'
    });

    function setOptions (wrapper) {
       
       // wrapper.setOption('width', 1500);
        wrapper.setOption('height', 380);
       // wrapper.setOption('chartArea.width', '80%');
     
    }
   
    setOptions(chart);
   
   
    dash.bind([control], [chart]);
    dash.draw(data);
    google.visualization.events.addListener(control, 'statechange', function () {
        var v = control.getState();
        document.getElementById('dbgchart').innerHTML = v.range.start+ ' to ' +v.range.end;
        return 0;
    });
      }
       
}
google.load('visualization', '1', {packages: ['controls', 'charteditor']});

</script>
<script>
        $(document).ready(function() {
                    $('#ec_name').hide();
                    $('#dashboard').hide();
                    $('#ec_para').hide();
            $("#ec_location").change(function() {
                var loc=$("#ec_location").val();
                if(loc=="")
                {
                    $('#ec_name').empty();
                    $('#ec_name').hide();
                    $('#dashboard').hide();
                    $('#ec_para').hide();
                }else if(loc=="T1")
                {
                    $('#ec_name').show();
                    $('#ec_para').show();
                    $('#ec_name').empty();
                    $('#ec_para').empty();
                    $('#dashboard').hide();
                    $('#ec_name').append('<option value="">Select an Option</option>');
                    $('#ec_name').append('<option value="U1">Main</option>');
                    $('#ec_name').append('<option value="U2"> LP Compressor 1</option>');
                    $('#ec_name').append('<option value="U3"> LP Compressor 2</option>');
                    $('#ec_name').append('<option value="U4"> HP Compressor 1</option>');
                    $('#ec_name').append('<option value="U5">HP Compressor 2</option>');
                    $('#ec_name').append('<option value="U6">Blowing Machine C12</option>');
                    $('#ec_name').append('<option value="U7">Rental Boiler</option>');
                    $('#ec_name').append('<option value="U8">Line 4</option>');
                    $('#ec_name').append('<option value="U9">Line 4 Control</option>');
                    $('#ec_name').append('<option value="U10">Ro 4</option>');
                    $('#ec_para').append('<option value="">Select an Option</option>');
                    $('#ec_para').append('<option value="_CurrentPh1_A">Current A</option>');
                    $('#ec_para').append('<option value="_CurrentPh2_A">Current B</option>');
                    $('#ec_para').append('<option value="_CurrentPh3_A">Current C</option>');
                    $('#ec_para').append('<option value="_CurrentAvg_A">Avg Current</option>');
                    $('#ec_para').append('<option value="_AvgVoltageLL_V">LL-Voltage </option>');
                    $('#ec_para').append('<option value="_VoltageLN_V">LN-Voltage </option>');
                    $('#ec_para').append('<option value="_Voltage_Ph1ToPh2_V">Voltage AB</option>');
                    $('#ec_para').append('<option value="_Voltage_Ph2ToPh3_V">Voltage BC</option>');
                    $('#ec_para').append('<option value="_Voltage_Ph3ToPh1_V">Voltage CA</option>');
                    $('#ec_para').append('<option value="_Voltage_pH1ToN_V">Voltage-1N</option>');
                    $('#ec_para').append('<option value="_Voltage_pH2ToN_V">Voltage-2N</option>');
                    $('#ec_para').append('<option value="_Voltage_pH3ToN_V">Voltage-3N</option>');
                    $('#ec_para').append('<option value="_Freq_Hz">Frequency-HZ</option>');
                    $('#ec_para').append('<option value="_PF_Avg">PowerFactor Average</option>');
                    $('#ec_para').append('<option value="_PF_PH1">PowerFactor-Phase1</option>');
                    $('#ec_para').append('<option value="_PF_PH2">PowerFactor-Phase2</option>');
                    $('#ec_para').append('<option value="_PF_PH3">PowerFactor-Phase3</option>');
                    $('#ec_para').append('<option value="_Activepower_Total_W">ActivePower-Total</option>');
                    $('#ec_para').append('<option value="_Activepower_PH1_W">ActivePower-Phase1</option>');
                    $('#ec_para').append('<option value="_Activepower_PH2_W">ActivePower-Phase2</option>');
                    $('#ec_para').append('<option value="_Activepower_PH3_W">ActivePower-Phase3</option>');
                    $('#ec_para').append('<option value="_AppPower_Total_VA">ApparentPower-Total</option>');
                    $('#ec_para').append('<option value="_AppPower_PH1_VA">ApparentPower-Phase1</option>');
                    $('#ec_para').append('<option value="_AppPower_PH2_VA">ApparentPower-Phase2</option>');
                    $('#ec_para').append('<option value="_AppPower_PH3_VA">ApparentPower-Phase3</option>');
                    $('#ec_para').append('<option value="_ReAPower_Total_VAR">ReAPower-Total</option>');
                    $('#ec_para').append('<option value="_ReAPower_PH1_VAR">ReAPower-Phase1</option>');
                    $('#ec_para').append('<option value="_ReAPower_PH2_VAR">ReAPower-Phase2</option>');
                    $('#ec_para').append('<option value="_ReAPower_PH3_VAR">ReAPower-Phase3</option>');
                    $('#ec_para').append('<option value="_FWD_AppEnergy_VAh">FWD_AppEnergy</option>');
                    $('#ec_para').append('<option value="_Rev_AppEnergy_VAh">Rev_AppEnergy</option>');
                    $('#ec_para').append('<option value="_FWD_ActiveEnergy_Wh">FWD_ActiveEnergy</option>');
                    $('#ec_para').append('<option value="_Rev_ActiveEnergy_Wh">Rev_ActiveEnergy</option>');
                    $('#ec_para').append('<option value="_FWD_ReAInductiveEnergy_VARh">FWD_ReAInductive</option>');
                    $('#ec_para').append('<option value="_Rev_ReAInductiveEnergy_VARh">Rev_ReAInductive</option>');
                    $('#ec_para').append('<option value="_FWD_ReACapacitiveEnergy_VARh">FWD_ReACapacitive</option>');
                    $('#ec_para').append('<option value="_Rev_ReACapacitiveEnergy_VARh">Rev_ReACapacitive</option>');
                    $('#ec_para').append('<option value="_VoltageTHD_PH1">Voltage Harmonics A</option>');
                    $('#ec_para').append('<option value="_VoltageTHD_PH2">Voltage Harmonics B</option>');
                    $('#ec_para').append('<option value="_VoltageTHD_PH3">Voltage Harmonics C</option>');
                    $('#ec_para').append('<option value="_CurrentTHD_PH1">Current Harmonics A</option>');
                    $('#ec_para').append('<option value="_CurrentTHD_PH2">Current Harmonics B</option>');
                    $('#ec_para').append('<option value="_CurrentTHD_PH3">Current Harmonics C</option>');
                }
                else if(loc=="T2")
                {
                    $('#ec_name').show();
                    $('#ec_para').show();
                    $('#ec_name').empty();
                    $('#ec_para').empty();
                    $('#dashboard').hide();
                    $('#ec_name').append('<option value="">Select an Option</option>');
                    $('#ec_name').append('<option value="U1">Main</option>');
                    $('#ec_name').append('<option value="U2">Syrup Room2 + Juice Syrup Room </option>');
                    $('#ec_name').append('<option value="U3">NH3 Compressor 2</option>');
                    $('#ec_name').append('<option value="U4">RO 2</option>');
                    $('#ec_name').append('<option value="U5">LP Compressor 4</option>');
                    $('#ec_name').append('<option value="U6">Turbine 3</option>');
                    $('#ec_name').append('<option value="U7">Syrup Room 1</option>');
                    $('#ec_name').append('<option value="U8">Line 1</option>');
                    $('#ec_name').append('<option value="U9">Line 2</option>');
                    $('#ec_name').append('<option value="U10">NH3 Compressor 1</option>');
                    $('#ec_name').append('<option value="U11">NH3 Compressor 3</option>');
                    $('#ec_name').append('<option value="U12">NH3 Compressor 6</option>');
                    $('#ec_name').append('<option value="U13">NH3 Compressor 7</option>');
                    $('#ec_name').append('<option value="U14">RO 1</option>');
                    $('#ec_name').append('<option value="U15">RO 3</option>');
                    $('#ec_name').append('<option value="U16">LP Compressor 3</option>');
                    $('#ec_name').append('<option value="U17">Sugar Dissolving</option>');
                    $('#ec_name').append('<option value="U18">Turbine 2</option>');
                     $('#ec_para').append('<option value="">Select an Option</option>');
                    $('#ec_para').append('<option value="_CurrentPh1_A">Current A</option>');
                    $('#ec_para').append('<option value="_CurrentPh2_A">Current B</option>');
                    $('#ec_para').append('<option value="_CurrentPh3_A">Current C</option>');
                    $('#ec_para').append('<option value="_CurrentAvg_A">Avg Current</option>');
                    $('#ec_para').append('<option value="_AvgVoltageLL_V">LL-Voltage </option>');
                    $('#ec_para').append('<option value="_VoltageLN_V">LN-Voltage </option>');
                    $('#ec_para').append('<option value="_Voltage_Ph1ToPh2_V">Voltage AB</option>');
                    $('#ec_para').append('<option value="_Voltage_Ph2ToPh3_V">Voltage BC</option>');
                    $('#ec_para').append('<option value="_Voltage_Ph3ToPh1_V">Voltage CA</option>');
                    $('#ec_para').append('<option value="_Voltage_pH1ToN_V">Voltage-1N</option>');
                    $('#ec_para').append('<option value="_Voltage_pH2ToN_V">Voltage-2N</option>');
                    $('#ec_para').append('<option value="_Voltage_pH3ToN_V">Voltage-3N</option>');
                    $('#ec_para').append('<option value="_Freq_Hz">Frequency-HZ</option>');
                    $('#ec_para').append('<option value="_PF_Avg">PowerFactor Average</option>');
                    $('#ec_para').append('<option value="_PF_PH1">PowerFactor-Phase1</option>');
                    $('#ec_para').append('<option value="_PF_PH2">PowerFactor-Phase2</option>');
                    $('#ec_para').append('<option value="_PF_PH3">PowerFactor-Phase3</option>');
                    $('#ec_para').append('<option value="_Activepower_Total_W">ActivePower-Total</option>');
                    $('#ec_para').append('<option value="_Activepower_PH1_W">ActivePower-Phase1</option>');
                    $('#ec_para').append('<option value="_Activepower_PH2_W">ActivePower-Phase2</option>');
                    $('#ec_para').append('<option value="_Activepower_PH3_W">ActivePower-Phase3</option>');
                    $('#ec_para').append('<option value="_AppPower_Total_VA">ApparentPower-Total</option>');
                    $('#ec_para').append('<option value="_AppPower_PH1_VA">ApparentPower-Phase1</option>');
                    $('#ec_para').append('<option value="_AppPower_PH2_VA">ApparentPower-Phase2</option>');
                    $('#ec_para').append('<option value="_AppPower_PH3_VA">ApparentPower-Phase3</option>');
                    $('#ec_para').append('<option value="_ReAPower_Total_VAR">ReAPower-Total</option>');
                    $('#ec_para').append('<option value="_ReAPower_PH1_VAR">ReAPower-Phase1</option>');
                    $('#ec_para').append('<option value="_ReAPower_PH2_VAR">ReAPower-Phase2</option>');
                    $('#ec_para').append('<option value="_ReAPower_PH3_VAR">ReAPower-Phase3</option>');
                    $('#ec_para').append('<option value="_FWD_AppEnergy_VAh">FWD_AppEnergy</option>');
                    $('#ec_para').append('<option value="_Rev_AppEnergy_VAh">Rev_AppEnergy</option>');
                    $('#ec_para').append('<option value="_FWD_ActiveEnergy_Wh">FWD_ActiveEnergy</option>');
                    $('#ec_para').append('<option value="_Rev_ActiveEnergy_Wh">Rev_ActiveEnergy</option>');
                    $('#ec_para').append('<option value="_FWD_ReAInductiveEnergy_VARh">FWD_ReAInductive</option>');
                    $('#ec_para').append('<option value="_Rev_ReAInductiveEnergy_VARh">Rev_ReAInductive</option>');
                    $('#ec_para').append('<option value="_FWD_ReACapacitiveEnergy_VARh">FWD_ReACapacitive</option>');
                    $('#ec_para').append('<option value="_Rev_ReACapacitiveEnergy_VARh">Rev_ReACapacitive</option>');
                    $('#ec_para').append('<option value="_VoltageTHD_PH1">Voltage Harmonics A</option>');
                    $('#ec_para').append('<option value="_VoltageTHD_PH2">Voltage Harmonics B</option>');
                    $('#ec_para').append('<option value="_VoltageTHD_PH3">Voltage Harmonics C</option>');
                    $('#ec_para').append('<option value="_CurrentTHD_PH1">Current Harmonics A</option>');
                    $('#ec_para').append('<option value="_CurrentTHD_PH2">Current Harmonics B</option>');
                    $('#ec_para').append('<option value="_CurrentTHD_PH3">Current Harmonics C</option>');
                }else if(loc=="T3")
                {
                    $('#ec_name').show();
                    $('#ec_para').show();
                    $('#ec_name').empty();
                    $('#ec_para').empty();
                    $('#dashboard').hide();
                     $('#ec_name').append('<option value="">Select an Option</option>');
                    $('#ec_name').append('<option value="U1">Main</option>');
                    $('#ec_name').append('<option value="U2">NH3 Compressor 5 </option>');
                    $('#ec_name').append('<option value="U3">HP Compressor 3</option>');
                    $('#ec_name').append('<option value="U4">Line 5LT</option>');
                    $('#ec_name').append('<option value="U5">Turbine 4</option>');
                    $('#ec_name').append('<option value="U6">NH3 Compressor 4</option>');
                    $('#ec_name').append('<option value="U7">NH3 Compressor 8</option>');
                    $('#ec_name').append('<option value="U8">Line 3</option>');
                    $('#ec_name').append('<option value="U9">Blowing Machine C10</option>');
                    $('#ec_name').append('<option value="U10">Syrup Room 3</option>');
                    $('#ec_name').append('<option value="U11">HP Compressor 4</option>');
                    $('#ec_name').append('<option value="U12">Line 5</option>');
                    $('#ec_name').append('<option value="U13">Line 5 Control</option>');
                    $('#ec_name').append('<option value="U14">Line 6&7</option>');
                    $('#ec_name').append('<option value="U15">Line 8</option>');
                    $('#ec_name').append('<option value="U16">Sugar Dissolver</option>');
                    $('#ec_name').append('<option value="U17">Sharink Tunnel Line 5</option>');
                     $('#ec_para').append('<option value="">Select an Option</option>');
                    $('#ec_para').append('<option value="_CurrentPh1_A">Current A</option>');
                    $('#ec_para').append('<option value="_CurrentPh2_A">Current B</option>');
                    $('#ec_para').append('<option value="_CurrentPh3_A">Current C</option>');
                    $('#ec_para').append('<option value="_CurrentAvg_A">Avg Current</option>');
                    $('#ec_para').append('<option value="_AvgVoltageLL_V">LL-Voltage </option>');
                    $('#ec_para').append('<option value="_VoltageLN_V">LN-Voltage </option>');
                    $('#ec_para').append('<option value="_Voltage_Ph1ToPh2_V">Voltage AB</option>');
                    $('#ec_para').append('<option value="_Voltage_Ph2ToPh3_V">Voltage BC</option>');
                    $('#ec_para').append('<option value="_Voltage_Ph3ToPh1_V">Voltage CA</option>');
                    $('#ec_para').append('<option value="_Voltage_pH1ToN_V">Voltage-1N</option>');
                    $('#ec_para').append('<option value="_Voltage_pH2ToN_V">Voltage-2N</option>');
                    $('#ec_para').append('<option value="_Voltage_pH3ToN_V">Voltage-3N</option>');
                    $('#ec_para').append('<option value="_Freq_Hz">Frequency-HZ</option>');
                    $('#ec_para').append('<option value="_PF_Avg">PowerFactor Average</option>');
                    $('#ec_para').append('<option value="_PF_PH1">PowerFactor-Phase1</option>');
                    $('#ec_para').append('<option value="_PF_PH2">PowerFactor-Phase2</option>');
                    $('#ec_para').append('<option value="_PF_PH3">PowerFactor-Phase3</option>');
                    $('#ec_para').append('<option value="_Activepower_Total_W">ActivePower-Total</option>');
                    $('#ec_para').append('<option value="_Activepower_PH1_W">ActivePower-Phase1</option>');
                    $('#ec_para').append('<option value="_Activepower_PH2_W">ActivePower-Phase2</option>');
                    $('#ec_para').append('<option value="_Activepower_PH3_W">ActivePower-Phase3</option>');
                    $('#ec_para').append('<option value="_AppPower_Total_VA">ApparentPower-Total</option>');
                    $('#ec_para').append('<option value="_AppPower_PH1_VA">ApparentPower-Phase1</option>');
                    $('#ec_para').append('<option value="_AppPower_PH2_VA">ApparentPower-Phase2</option>');
                    $('#ec_para').append('<option value="_AppPower_PH3_VA">ApparentPower-Phase3</option>');
                    $('#ec_para').append('<option value="_ReAPower_Total_VAR">ReAPower-Total</option>');
                    $('#ec_para').append('<option value="_ReAPower_PH1_VAR">ReAPower-Phase1</option>');
                    $('#ec_para').append('<option value="_ReAPower_PH2_VAR">ReAPower-Phase2</option>');
                    $('#ec_para').append('<option value="_ReAPower_PH3_VAR">ReAPower-Phase3</option>');
                    $('#ec_para').append('<option value="_FWD_AppEnergy_VAh">FWD_AppEnergy</option>');
                    $('#ec_para').append('<option value="_Rev_AppEnergy_VAh">Rev_AppEnergy</option>');
                    $('#ec_para').append('<option value="_FWD_ActiveEnergy_Wh">FWD_ActiveEnergy</option>');
                    $('#ec_para').append('<option value="_Rev_ActiveEnergy_Wh">Rev_ActiveEnergy</option>');
                    $('#ec_para').append('<option value="_FWD_ReAInductiveEnergy_VARh">FWD_ReAInductive</option>');
                    $('#ec_para').append('<option value="_Rev_ReAInductiveEnergy_VARh">Rev_ReAInductive</option>');
                    $('#ec_para').append('<option value="_FWD_ReACapacitiveEnergy_VARh">FWD_ReACapacitive</option>');
                    $('#ec_para').append('<option value="_Rev_ReACapacitiveEnergy_VARh">Rev_ReACapacitive</option>');
                    $('#ec_para').append('<option value="_VoltageTHD_PH1">Voltage Harmonics A</option>');
                    $('#ec_para').append('<option value="_VoltageTHD_PH2">Voltage Harmonics B</option>');
                    $('#ec_para').append('<option value="_VoltageTHD_PH3">Voltage Harmonics C</option>');
                    $('#ec_para').append('<option value="_CurrentTHD_PH1">Current Harmonics A</option>');
                    $('#ec_para').append('<option value="_CurrentTHD_PH2">Current Harmonics B</option>');
                    $('#ec_para').append('<option value="_CurrentTHD_PH3">Current Harmonics C</option>');
                }
                
            });
        });
</script>
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
                                            <h4 class="m-b-10">Customized Trends</h4>
                                            <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Trends</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Customized Trends</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="content-wrapper">
                            <div class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-12">
                                            <div class="card" >
                                                <div class="card-header" style="background-color: #365994;color:white">
                                                    <h3 class="card-title">Customized Trends</h3>
                                                </div> 
                                                <div class="card-body"style="height: 800px;border-radius: 10px !important;">
                                                    <div class="form-group row">
                                                        <div class="card-header-tab col-sm-12 col-xl-4 col-md-6 pb-3">
                                                            <div class="btn-actions-pane-right text-capitalize">
                                                                <div class="btn-actions-pane-right text-capitalize" >
                                                                    <select id="ec_location"  class="form-select ">
                                                                        <option value="">Select an Area</option>
                                                                        <option value="T1">Trafo 1</option>
                                                                        <option value="T2">Trafo 2</option>
                                                                        <option value="T3">Trafo 3</option>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-header-tab col-sm-12 col-xl-3 col-md-3 pb-3">
                                                            <div class="btn-actions-pane-right text-capitalize">
                                                                <div class="btn-actions-pane-right text-capitalize">
                                                                    <select id="ec_name" onchange="drawChart()" class="form-select ">
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-header-tab col-sm-6 col-xl-3 col-md-3 pb-3">
                                                            <div class="btn-actions-pane-right text-capitalize">
                                                                <select id="ec_para" onchange="drawChart()" class="form-select">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="card-header-tab col-sm-12 col-xl-3 col-md-6 pb-3">
                                                            <input name="ec_start_date"  value="<?php echo date("Y-m-d"); ?>" class="mb-6 mr-1 btn btn-primary"  onchange="drawChart()" type="date" style="width:150px;" id="ec_start_date" required>
                                                        </div>
                                                        <div class="card-header-tab col-sm-12 col-xl-3 col-md-6 pb-3">
                                                            <div class="btn-actions-pane-right text-capitalize">
                                                                <input name="ec_end_date"  value="<?php echo date("Y-m-d"); ?>" class="mb-6 mr-1 btn btn-primary"  onchange="drawChart()" type="date" style="width:150px;" id="ec_end_date" required class="date-picker">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pt-0 card-body" id="txt_hint2">
                                                        <!-- KWh of each energy source will be shown here-->
                                                        <div id="dashboard">
                                                            <div id="chart_div" class="chart"></div>
                                                            <div id="control_div" class="chart"></div>
                                                            <p><span id='dbgchart'></span></p>
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
            </div>
        </div>
        <div id="styleSelector"> </div>
    </div>                     
    <!-- Main-body end -->
    <?php include('includes/footer.php'); ?>   
</body>
</html>
