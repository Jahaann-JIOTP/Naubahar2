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

    .card-title {
        color: #626469;
        font-weight: bold;
        font-size: 20px;
    }

    /* arrows */
    select.form-select {
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

    .button-70 {
        background-image: linear-gradient(#0dccea, #0d70ea);
        border: 0;
        border-radius: 4px;
        box-shadow: rgba(0, 0, 0, .3) 0 5px 15px;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        font-family: Montserrat, sans-serif;
        font-size: .9em;
        margin: 5px;
        padding: 10px 15px;
        text-align: center;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }
</style>
<!-- head end -->
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    function downloadExcel(data, filename) {
        // Create a Blob from the data
        var blob = new Blob([data], {
            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        });

        // Create a temporary link element
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = filename;

        // Trigger the download by simulating a click event
        link.click();

        // Clean up the temporary link
        setTimeout(function() {
            window.URL.revokeObjectURL(link.href);
            link.remove();
        }, 100);
    }
    var excelButton = document.createElement('button');
    excelButton.classList.add("button-70");
    excelButton.setAttribute('style', 'float:right')
    excelButton.textContent = 'Export Excel';

    function drawChart() {

        var str = document.getElementById("ec_start_date").value;
        var str2 = document.getElementById("ec_end_date").value;
        var str3 = document.getElementById("ec_name").value;
        var str4 = document.getElementById("ec_para").value;
        var str5 = document.getElementById("ec_location").value;

        function googlechart(jsonData1) {
            //The DataTable object is used to hold the data passed into a visualization.
            var data = new google.visualization.DataTable(jsonData1);

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
            // console.log(str4);
            var units = "";
            if (str4 == '_Frequency_Hz') {
                units = 'Hz';
            } else if (str4 == '_ActivePower_A_kW' || str4 == '_ActivePower_B_kW' || str4 == '_ActivePower_C_kW' || str4 == '_ActivePower_Total_kW') {
                units = 'kW';
            } else if (str4 == '_ActiveEnergy_Delivered_kWh') {
                units = 'kWh';
            } else if (str4 == '_Current_AN_Amp' || str4 == '_Current_BN_Amp' || str4 == '_Current_CN_Amp' || str4 == '_Current_Avg_Amp') {
                units = 'Amp';
            } else if (str4 == '_Voltage_AB_V' || str4 == '_Voltage_BC_V' || str4 == '_Voltage_CA_V' || str4 == '_Voltage_AN_V' || str4 == '_Voltage_BN_V' || str4 == '_Voltage_CN_V' || str4 == '_Voltage_LL_V' || str4 == '_Voltage_LN_V') {
                units = 'Volt';
            } else if (str4 == '_ReactivePower_A_kVAR' || str4 == '_ReactivePower_B_kVAR' || str4 == '_ReactivePower_C_kVAR' || str4 == '_ReactivePower_Total_kVAR') {
                units = 'KVAR';
            } else if (str4 == '_ApparentPower_A_kVA' || str4 == '_ApparentPower_B_kVA' || str4 == '_ApparentPower_C_kVA' || str4 == '_ApparentPower_Total_kVA') {
                units = 'kVA';
            } else if (str4 == '_PowerFactor_A' || str4 == '_PowerFactor_B' || str4 == '_PowerFactor_C' || str4 == '_PowerFactor_Total') {
                units = 'PF';
            } else if (str4 == '_ApparentEnergy_DelpRec_kVAh') {
                units = 'kVAh';
            } else if (str4 == '_ReactiveEnergy_Delivered_kVAR') {
                units = 'kVAR';
            } else if (str4 == '_ReactiveEnergy_Received_kVARh') {
                units = 'kVARh';
            } else if (str4 == '_ActiveEnergy_Received_kWh') {
                units = 'kWh';
            } else if (str4 == '_Harmonics_V1_THD' || str4 == '_Harmonics_V2_THD' || str4 == '_Harmonics_V3_THD') {
                units = 'THD V';
            } else if (str4 == '_Harmonics_I1_THD' || str4 == '_Harmonics_I2_THD' || str4 == '_Harmonics_I3_THD') {
                units = 'THD A';
            }

            function setOptions(wrapper, units) {
                // Set chart options
                var options = {
                    // colors: ['#f68d00'],
                    height: 380,
                    vAxis: {
                        title: '(' + units + ')',
                        titleTextStyle: {
                            fontSize: 18 // Set the desired font size
                        },
                        // minValue: 0, // Set the minimum value of the y-axis to zero
                    },
                    hAxis: {
                        title: 'Dates'
                    },
                    series: {
                        0: {
                            lineWidth: 2, // Set the line width of the first series
                            // pointSize: 5, // Set the size of data points on the first series
                        },
                    },
                };

                // Apply options to the wrapper
                wrapper.setOptions(options);
            }

            setOptions(chart, units);


            dash.bind([control], [chart]);
            dash.draw(data);
            google.visualization.events.addListener(control, 'statechange', function() {
                var v = control.getState();
                document.getElementById('dbgchart').innerHTML = v.range.start + ' to ' + v.range.end;
                return 0;
            });
            // Add the Export Excel functionality
            // Remove any existing export button
            var previousButton = document.getElementById('export_div').querySelector('button');
            if (previousButton) {
                previousButton.remove();
            }
            excelButton.addEventListener('click', function() {
                // Create a new Workbook
                var wb = XLSX.utils.book_new();

                // Create a new Worksheet
                var ws = XLSX.utils.aoa_to_sheet([]);

                // Set the column headers
                XLSX.utils.sheet_add_aoa(ws, [
                    ['Date and Time', data.getColumnLabel(1)]
                ], {
                    origin: -1
                });

                // Add the data rows
                for (var i = 0; i < data.getNumberOfRows(); i++) {
                    var dateTime = data.getFormattedValue(i, 0); // Assuming the date and time are in the first column
                    var value = data.getValue(i, 1); // Assuming the chart value is in the second column
                    XLSX.utils.sheet_add_aoa(ws, [
                        [dateTime, value]
                    ], {
                        origin: -1
                    });
                }
                // Set the column width
                var columnWidths = [{
                        wch: 25
                    }, // Width of the first column (Date and Time)
                    {
                        wch: 13
                    } // Width of the second column (Chart value)
                ];
                ws['!cols'] = columnWidths;


                // Add the Worksheet to the Workbook
                XLSX.utils.book_append_sheet(wb, ws, 'Chart Data');

                // Convert the Workbook to Excel binary format
                var excelData = XLSX.write(wb, {
                    bookType: 'xlsx',
                    type: 'binary'
                });

                // Create a filename for the Excel file
                var filename = 'chart_data.xlsx';

                // Convert the Excel binary data to a Uint8Array
                var buf = new ArrayBuffer(excelData.length);
                var view = new Uint8Array(buf);
                for (var i = 0; i < excelData.length; i++) {
                    view[i] = excelData.charCodeAt(i) & 0xFF;
                }

                // Trigger the file download
                downloadExcel(buf, filename);
            });
            document.getElementById('export_div').appendChild(excelButton);

        }

        if (str3 != "" && str4 != "" && str5 == "U") {

            $('#dashboard').show();
            var jsonData = $.ajax({
                url: "calculations/trends_data_calculation.php?start_date=" + str + "&end_date=" + str2 + "&meter=" + str3 + "&tag=" + str4 + "&location=" + str5,
                dataType: "json",
                async: false
            }).responseText;

            googlechart(jsonData);

        } else if (str3 != "" && str4 != "" && str5 != "") {

            $('#dashboard').show();
            var jsonData = $.ajax({
                url: "calculations/trends_data_calculationUnit2.php?start_date=" + str + "&end_date=" + str2 + "&meter=" + str3 + "&tag=" + str4 + "&location=" + str5,
                dataType: "json",
                async: false
            }).responseText;
            googlechart(jsonData);

        }

    }
    google.load('visualization', '1', {
        packages: ['controls', 'charteditor']
    });
</script>
<script>
    $(document).ready(function() {
        $('#ec_name').hide();
        $('#dashboard').hide();
        $('#ec_para').hide();
        $("#ec_location").change(function() {
            var loc = $("#ec_location").val();
            if (loc == "") {
                $('#ec_name').empty();
                $('#ec_name').hide();
                $('#dashboard').hide();
                $('#ec_para').hide();
            } else if (loc == "U") {
                $('#ec_name').show();
                $('#ec_para').show();
                $('#ec_name').empty();
                $('#ec_para').empty();
                $('#dashboard').hide();
                $('#ec_name').append('<option value="">Select an Option</option>');
                $('#ec_name').append('<option value="_1">Main LT</option>');
                $('#ec_name').append('<option value="_2">Water Treatment </option>');
                $('#ec_name').append('<option value="_3">Turnine 1</option>');
                $('#ec_name').append('<option value="_4">Syrup Room</option>');
                $('#ec_name').append('<option value="_5">Air Compressor(3+4+5)</option>');
                $('#ec_name').append('<option value="_6">Air Compressor(1+2)</option>');
                $('#ec_name').append('<option value="_7">Grasso 4</option>');
                $('#ec_name').append('<option value="_8">Grasso 3</option>');
                $('#ec_name').append('<option value="_9">Grasso 2</option>');
                $('#ec_name').append('<option value="_10">Grasso 1</option>');
                $('#ec_name').append('<option value="_11">Evaporators</option>');
                $('#ec_name').append('<option value="_12">Line - 5</option>');
                $('#ec_name').append('<option value="_13">Line 4</option>');
                $('#ec_name').append('<option value="_14">Line 3</option>');
                $('#ec_name').append('<option value="_15">Line 1</option>');
                $('#ec_name').append('<option value="_16">Boiler</option>');
                // $('#ec_name').append('<option value="_17">Turbine 2</option>');
                $('#ec_para').append('<option value="">Select an Option</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Delivered_kWh">ActiveEnergy_Delivered</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Received_kWh">ActiveEnergy_Recv</option>');
                $('#ec_para').append('<option value="_ActivePower_A_kW">ActivePower-Phase1</option>');
                $('#ec_para').append('<option value="_ActivePower_B_kW">ActivePower-Phase2</option>');
                $('#ec_para').append('<option value="_ActivePower_C_kW">ActivePower-Phase3</option>');
                $('#ec_para').append('<option value="_ActivePower_Total_kW">ActivePower-Total</option>');
                $('#ec_para').append('<option value="_ApparentPower_A_kVA">ApparentPower-Phase1</option>');
                $('#ec_para').append('<option value="_ApparentPower_B_kVA">ApparentPower-Phase2</option>');
                $('#ec_para').append('<option value="_ApparentPower_C_kVA">ApparentPower-Phase3</option>');
                $('#ec_para').append('<option value="_ApparentPower_Total_kVA">ApparentPower-Total</option>');
                $('#ec_para').append('<option value="_ApparentEnergy_DelpRec_kVAh">AppEnergy Total</option>');
                $('#ec_para').append('<option value="_Current_AN_Amp">Current A</option>');
                $('#ec_para').append('<option value="_Current_BN_Amp">Current B</option>');
                $('#ec_para').append('<option value="_Current_CN_Amp">Current C</option>');
                $('#ec_para').append('<option value="_Current_Avg_Amp">Avg Current</option>');
                $('#ec_para').append('<option value="_Frequency_Hz">Frequency-HZ</option>');
                $('#ec_para').append('<option value="_Harmonics_V1_THD">Voltage Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_V2_THD">Voltage Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_V3_THD">Voltage Harmonics C</option>');
                $('#ec_para').append('<option value="_Harmonics_I1_THD">Current Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_I2_THD">Current Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_I3_THD">Current Harmonics C</option>');
                $('#ec_para').append('<option value="_PowerFactor_A">PowerFactor-Phase1</option>');
                $('#ec_para').append('<option value="_PowerFactor_B">PowerFactor-Phase2</option>');
                $('#ec_para').append('<option value="_PowerFactor_C">PowerFactor-Phase3</option>');
                $('#ec_para').append('<option value="_PowerFactor_Total">PowerFactor Average</option>');
                $('#ec_para').append('<option value="_ReactivePower_A_kVAR">ReAPower-Phase1</option>');
                $('#ec_para').append('<option value="_ReactivePower_B_kVAR">ReAPower-Phase2</option>');
                $('#ec_para').append('<option value="_ReactivePower_C_kVAR">ReAPower-Phase3</option>');
                $('#ec_para').append('<option value="_ReactivePower_Total_kVAR">ReAPower-Total</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Delivered_kVAR">Reactive_Energy Delv</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Received_kVARh">Reactive_Energy Recv</option>');
                $('#ec_para').append('<option value="_Voltage_LL_V">LL-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_LN_V">LN-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_AB_V">Voltage AB</option>');
                $('#ec_para').append('<option value="_Voltage_BC_V">Voltage BC</option>');
                $('#ec_para').append('<option value="_Voltage_CA_V">Voltage CA</option>');
                $('#ec_para').append('<option value="_Voltage_AN_V">Voltage-1N</option>');
                $('#ec_para').append('<option value="_Voltage_BN_V">Voltage-2N</option>');
                $('#ec_para').append('<option value="_Voltage_CN_V">Voltage-3N</option>');
            } else if (loc == "TF") {
                $('#ec_name').show();
                $('#ec_para').show();
                $('#ec_name').empty();
                $('#ec_para').empty();
                $('#dashboard').hide();
                $('#ec_name').append('<option value="">Select an Option</option>');
                $('#ec_name').append('<option value="GW1_U25">TF-1</option>');
                $('#ec_name').append('<option value="GW1_U8">TF-2</option>');
                $('#ec_name').append('<option value="GW1_U26">TF-3</option>');
                $('#ec_para').append('<option value="">Select an Option</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Delivered_kWh">ActiveEnergy_Delivered</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Received_kWh">ActiveEnergy_Recv</option>');
                $('#ec_para').append('<option value="_ActivePower_A_kW">ActivePower-Phase1</option>');
                $('#ec_para').append('<option value="_ActivePower_B_kW">ActivePower-Phase2</option>');
                $('#ec_para').append('<option value="_ActivePower_C_kW">ActivePower-Phase3</option>');
                $('#ec_para').append('<option value="_ActivePower_Total_kW">ActivePower-Total</option>');
                $('#ec_para').append('<option value="_ApparentPower_A_kVA">ApparentPower-Phase1</option>');
                $('#ec_para').append('<option value="_ApparentPower_B_kVA">ApparentPower-Phase2</option>');
                $('#ec_para').append('<option value="_ApparentPower_C_kVA">ApparentPower-Phase3</option>');
                $('#ec_para').append('<option value="_ApparentPower_Total_kVA">ApparentPower-Total</option>');
                $('#ec_para').append('<option value="_ApparentEnergy_DelpRec_kVAh">AppEnergy Total</option>');
                $('#ec_para').append('<option value="_Current_AN_Amp">Current A</option>');
                $('#ec_para').append('<option value="_Current_BN_Amp">Current B</option>');
                $('#ec_para').append('<option value="_Current_CN_Amp">Current C</option>');
                $('#ec_para').append('<option value="_Current_Avg_Amp">Avg Current</option>');
                $('#ec_para').append('<option value="_Frequency_Hz">Frequency-HZ</option>');
                $('#ec_para').append('<option value="_Harmonics_V1_THD">Voltage Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_V2_THD">Voltage Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_V3_THD">Voltage Harmonics C</option>');
                $('#ec_para').append('<option value="_Harmonics_I1_THD">Current Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_I2_THD">Current Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_I3_THD">Current Harmonics C</option>');
                $('#ec_para').append('<option value="_PowerFactor_A">PowerFactor-Phase1</option>');
                $('#ec_para').append('<option value="_PowerFactor_B">PowerFactor-Phase2</option>');
                $('#ec_para').append('<option value="_PowerFactor_C">PowerFactor-Phase3</option>');
                $('#ec_para').append('<option value="_PowerFactor_Total">PowerFactor Average</option>');
                $('#ec_para').append('<option value="_ReactivePower_A_kVAR">ReAPower-Phase1</option>');
                $('#ec_para').append('<option value="_ReactivePower_B_kVAR">ReAPower-Phase2</option>');
                $('#ec_para').append('<option value="_ReactivePower_C_kVAR">ReAPower-Phase3</option>');
                $('#ec_para').append('<option value="_ReactivePower_Total_kVAR">ReAPower-Total</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Delivered_kVAR">Reactive_Energy Delv</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Received_kVARh">Reactive_Energy Recv</option>');
                $('#ec_para').append('<option value="_Voltage_LL_V">LL-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_LN_V">LN-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_AB_V">Voltage AB</option>');
                $('#ec_para').append('<option value="_Voltage_BC_V">Voltage BC</option>');
                $('#ec_para').append('<option value="_Voltage_CA_V">Voltage CA</option>');
                $('#ec_para').append('<option value="_Voltage_AN_V">Voltage-1N</option>');
                $('#ec_para').append('<option value="_Voltage_BN_V">Voltage-2N</option>');
                $('#ec_para').append('<option value="_Voltage_CN_V">Voltage-3N</option>');

            } else if (loc == "RO_Sec") {
                $('#ec_name').show();
                $('#ec_para').show();
                $('#ec_name').empty();
                $('#ec_para').empty();
                $('#dashboard').hide();
                $('#ec_name').append('<option value="">Select an Option</option>');
                $('#ec_name').append('<option value="GW2_U9">RO-1</option>');
                $('#ec_name').append('<option value="GW2_U10">RO-2</option>');
                $('#ec_name').append('<option value="GW1_U22">RO-3</option>');
                $('#ec_name').append('<option value="GW2_U8">RO-4</option>');
                $('#ec_para').append('<option value="">Select an Option</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Delivered_kWh">ActiveEnergy_Delivered</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Received_kWh">ActiveEnergy_Recv</option>');
                $('#ec_para').append('<option value="_ActivePower_A_kW">ActivePower-Phase1</option>');
                $('#ec_para').append('<option value="_ActivePower_B_kW">ActivePower-Phase2</option>');
                $('#ec_para').append('<option value="_ActivePower_C_kW">ActivePower-Phase3</option>');
                $('#ec_para').append('<option value="_ActivePower_Total_kW">ActivePower-Total</option>');
                $('#ec_para').append('<option value="_ApparentPower_A_kVA">ApparentPower-Phase1</option>');
                $('#ec_para').append('<option value="_ApparentPower_B_kVA">ApparentPower-Phase2</option>');
                $('#ec_para').append('<option value="_ApparentPower_C_kVA">ApparentPower-Phase3</option>');
                $('#ec_para').append('<option value="_ApparentPower_Total_kVA">ApparentPower-Total</option>');
                $('#ec_para').append('<option value="_ApparentEnergy_DelpRec_kVAh">AppEnergy Total</option>');
                $('#ec_para').append('<option value="_Current_AN_Amp">Current A</option>');
                $('#ec_para').append('<option value="_Current_BN_Amp">Current B</option>');
                $('#ec_para').append('<option value="_Current_CN_Amp">Current C</option>');
                $('#ec_para').append('<option value="_Current_Avg_Amp">Avg Current</option>');
                $('#ec_para').append('<option value="_Frequency_Hz">Frequency-HZ</option>');
                $('#ec_para').append('<option value="_Harmonics_V1_THD">Voltage Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_V2_THD">Voltage Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_V3_THD">Voltage Harmonics C</option>');
                $('#ec_para').append('<option value="_Harmonics_I1_THD">Current Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_I2_THD">Current Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_I3_THD">Current Harmonics C</option>');
                $('#ec_para').append('<option value="_PowerFactor_A">PowerFactor-Phase1</option>');
                $('#ec_para').append('<option value="_PowerFactor_B">PowerFactor-Phase2</option>');
                $('#ec_para').append('<option value="_PowerFactor_C">PowerFactor-Phase3</option>');
                $('#ec_para').append('<option value="_PowerFactor_Total">PowerFactor Average</option>');
                $('#ec_para').append('<option value="_ReactivePower_A_kVAR">ReAPower-Phase1</option>');
                $('#ec_para').append('<option value="_ReactivePower_B_kVAR">ReAPower-Phase2</option>');
                $('#ec_para').append('<option value="_ReactivePower_C_kVAR">ReAPower-Phase3</option>');
                $('#ec_para').append('<option value="_ReactivePower_Total_kVAR">ReAPower-Total</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Delivered_kVAR">Reactive_Energy Delv</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Received_kVARh">Reactive_Energy Recv</option>');
                $('#ec_para').append('<option value="_Voltage_LL_V">LL-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_LN_V">LN-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_AB_V">Voltage AB</option>');
                $('#ec_para').append('<option value="_Voltage_BC_V">Voltage BC</option>');
                $('#ec_para').append('<option value="_Voltage_CA_V">Voltage CA</option>');
                $('#ec_para').append('<option value="_Voltage_AN_V">Voltage-1N</option>');
                $('#ec_para').append('<option value="_Voltage_BN_V">Voltage-2N</option>');
                $('#ec_para').append('<option value="_Voltage_CN_V">Voltage-3N</option>');

            } else if (loc == "GR") {
                $('#ec_name').show();
                $('#ec_para').show();
                $('#ec_name').empty();
                $('#ec_para').empty();
                $('#dashboard').hide();
                $('#ec_name').append('<option value="">Select an Option</option>');
                $('#ec_name').append('<option value="GW1_U19">GR-1</option>');
                $('#ec_name').append('<option value="GW1_U18">GR-2 </option>');
                $('#ec_name').append('<option value="GW1_U17">GR-3</option>');
                $('#ec_name').append('<option value="GW1_U16">GR-4</option>');
                $('#ec_name').append('<option value="GW1_U15">GR-5</option>');
                $('#ec_name').append('<option value="GW1_U20">GR-6</option>');
                $('#ec_name').append('<option value="GW1_U21">GR-7</option>');
                $('#ec_para').append('<option value="">Select an Option</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Delivered_kWh">ActiveEnergy_Delivered</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Received_kWh">ActiveEnergy_Recv</option>');
                $('#ec_para').append('<option value="_ActivePower_A_kW">ActivePower-Phase1</option>');
                $('#ec_para').append('<option value="_ActivePower_B_kW">ActivePower-Phase2</option>');
                $('#ec_para').append('<option value="_ActivePower_C_kW">ActivePower-Phase3</option>');
                $('#ec_para').append('<option value="_ActivePower_Total_kW">ActivePower-Total</option>');
                $('#ec_para').append('<option value="_ApparentPower_A_kVA">ApparentPower-Phase1</option>');
                $('#ec_para').append('<option value="_ApparentPower_B_kVA">ApparentPower-Phase2</option>');
                $('#ec_para').append('<option value="_ApparentPower_C_kVA">ApparentPower-Phase3</option>');
                $('#ec_para').append('<option value="_ApparentPower_Total_kVA">ApparentPower-Total</option>');
                $('#ec_para').append('<option value="_ApparentEnergy_DelpRec_kVAh">AppEnergy Total</option>');
                $('#ec_para').append('<option value="_Current_AN_Amp">Current A</option>');
                $('#ec_para').append('<option value="_Current_BN_Amp">Current B</option>');
                $('#ec_para').append('<option value="_Current_CN_Amp">Current C</option>');
                $('#ec_para').append('<option value="_Current_Avg_Amp">Avg Current</option>');
                $('#ec_para').append('<option value="_Frequency_Hz">Frequency-HZ</option>');
                $('#ec_para').append('<option value="_Harmonics_V1_THD">Voltage Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_V2_THD">Voltage Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_V3_THD">Voltage Harmonics C</option>');
                $('#ec_para').append('<option value="_Harmonics_I1_THD">Current Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_I2_THD">Current Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_I3_THD">Current Harmonics C</option>');
                $('#ec_para').append('<option value="_PowerFactor_A">PowerFactor-Phase1</option>');
                $('#ec_para').append('<option value="_PowerFactor_B">PowerFactor-Phase2</option>');
                $('#ec_para').append('<option value="_PowerFactor_C">PowerFactor-Phase3</option>');
                $('#ec_para').append('<option value="_PowerFactor_Total">PowerFactor Average</option>');
                $('#ec_para').append('<option value="_ReactivePower_A_kVAR">ReAPower-Phase1</option>');
                $('#ec_para').append('<option value="_ReactivePower_B_kVAR">ReAPower-Phase2</option>');
                $('#ec_para').append('<option value="_ReactivePower_C_kVAR">ReAPower-Phase3</option>');
                $('#ec_para').append('<option value="_ReactivePower_Total_kVAR">ReAPower-Total</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Delivered_kVAR">Reactive_Energy Delv</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Received_kVARh">Reactive_Energy Recv</option>');
                $('#ec_para').append('<option value="_Voltage_LL_V">LL-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_LN_V">LN-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_AB_V">Voltage AB</option>');
                $('#ec_para').append('<option value="_Voltage_BC_V">Voltage BC</option>');
                $('#ec_para').append('<option value="_Voltage_CA_V">Voltage CA</option>');
                $('#ec_para').append('<option value="_Voltage_AN_V">Voltage-1N</option>');
                $('#ec_para').append('<option value="_Voltage_BN_V">Voltage-2N</option>');
                $('#ec_para').append('<option value="_Voltage_CN_V">Voltage-3N</option>');
            } else if (loc == "ECR") {
                $('#ec_name').show();
                $('#ec_para').show();
                $('#ec_name').empty();
                $('#ec_para').empty();
                $('#dashboard').hide();
                $('#ec_name').append('<option value="">Select an Option</option>');
                $('#ec_name').append('<option value="GW3_U3">Syrup Room L5</option>');
                $('#ec_name').append('<option value="GW3_U4">Sugar Dissolving No.2</option>');
                $('#ec_name').append('<option value="GW3_U5">Oven L5</option>');
                $('#ec_name').append('<option value="GW1_U4">New Boiler</option>');
                $('#ec_name').append('<option value="GW1_U2">Syrup Room L4</option>');
                $('#ec_name').append('<option value="GW1_U5">Sugar Dissolving No.1</option>');
                $('#ec_name').append('<option value="GW1_U3">Juice Room L3</option>');

                $('#ec_para').append('<option value="">Select an Option</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Delivered_kWh">ActiveEnergy_Delivered</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Received_kWh">ActiveEnergy_Recv</option>');
                $('#ec_para').append('<option value="_ActivePower_A_kW">ActivePower-Phase1</option>');
                $('#ec_para').append('<option value="_ActivePower_B_kW">ActivePower-Phase2</option>');
                $('#ec_para').append('<option value="_ActivePower_C_kW">ActivePower-Phase3</option>');
                $('#ec_para').append('<option value="_ActivePower_Total_kW">ActivePower-Total</option>');
                $('#ec_para').append('<option value="_ApparentPower_A_kVA">ApparentPower-Phase1</option>');
                $('#ec_para').append('<option value="_ApparentPower_B_kVA">ApparentPower-Phase2</option>');
                $('#ec_para').append('<option value="_ApparentPower_C_kVA">ApparentPower-Phase3</option>');
                $('#ec_para').append('<option value="_ApparentPower_Total_kVA">ApparentPower-Total</option>');
                $('#ec_para').append('<option value="_ApparentEnergy_DelpRec_kVAh">AppEnergy Total</option>');
                $('#ec_para').append('<option value="_Current_AN_Amp">Current A</option>');
                $('#ec_para').append('<option value="_Current_BN_Amp">Current B</option>');
                $('#ec_para').append('<option value="_Current_CN_Amp">Current C</option>');
                $('#ec_para').append('<option value="_Current_Avg_Amp">Avg Current</option>');
                $('#ec_para').append('<option value="_Frequency_Hz">Frequency-HZ</option>');
                $('#ec_para').append('<option value="_Harmonics_V1_THD">Voltage Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_V2_THD">Voltage Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_V3_THD">Voltage Harmonics C</option>');
                $('#ec_para').append('<option value="_Harmonics_I1_THD">Current Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_I2_THD">Current Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_I3_THD">Current Harmonics C</option>');
                $('#ec_para').append('<option value="_PowerFactor_A">PowerFactor-Phase1</option>');
                $('#ec_para').append('<option value="_PowerFactor_B">PowerFactor-Phase2</option>');
                $('#ec_para').append('<option value="_PowerFactor_C">PowerFactor-Phase3</option>');
                $('#ec_para').append('<option value="_PowerFactor_Total">PowerFactor Average</option>');
                $('#ec_para').append('<option value="_ReactivePower_A_kVAR">ReAPower-Phase1</option>');
                $('#ec_para').append('<option value="_ReactivePower_B_kVAR">ReAPower-Phase2</option>');
                $('#ec_para').append('<option value="_ReactivePower_C_kVAR">ReAPower-Phase3</option>');
                $('#ec_para').append('<option value="_ReactivePower_Total_kVAR">ReAPower-Total</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Delivered_kVAR">Reactive_Energy Delv</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Received_kVARh">Reactive_Energy Recv</option>');
                $('#ec_para').append('<option value="_Voltage_LL_V">LL-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_LN_V">LN-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_AB_V">Voltage AB</option>');
                $('#ec_para').append('<option value="_Voltage_BC_V">Voltage BC</option>');
                $('#ec_para').append('<option value="_Voltage_CA_V">Voltage CA</option>');
                $('#ec_para').append('<option value="_Voltage_AN_V">Voltage-1N</option>');
                $('#ec_para').append('<option value="_Voltage_BN_V">Voltage-2N</option>');
                $('#ec_para').append('<option value="_Voltage_CN_V">Voltage-3N</option>');
            } else if (loc == "LS") {
                $('#ec_name').show();
                $('#ec_para').show();
                $('#ec_name').empty();
                $('#ec_para').empty();
                $('#dashboard').hide();
                $('#ec_name').append('<option value="">Select an Option</option>');
                $('#ec_name').append('<option value="GW1_U6">Line-1</option>');
                $('#ec_name').append('<option value="GW1_U7">Line-2</option>');
                $('#ec_name').append('<option value="GW1_U23">Line-3</option>');
                // $('#ec_name').append('<option value="GW2_U2">Line-4</option>');
                $('#ec_name').append('<option value="GW3_U2">Line-5</option>');
                $('#ec_name').append('<option value="GW1_U24">Line-6</option>');
                $('#ec_name').append('<option value="GW3_U6">Line-8</option>');
                $('#ec_para').append('<option value="">Select an Option</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Delivered_kWh">ActiveEnergy_Delivered</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Received_kWh">ActiveEnergy_Recv</option>');
                $('#ec_para').append('<option value="_ActivePower_A_kW">ActivePower-Phase1</option>');
                $('#ec_para').append('<option value="_ActivePower_B_kW">ActivePower-Phase2</option>');
                $('#ec_para').append('<option value="_ActivePower_C_kW">ActivePower-Phase3</option>');
                $('#ec_para').append('<option value="_ActivePower_Total_kW">ActivePower-Total</option>');
                $('#ec_para').append('<option value="_ApparentPower_A_kVA">ApparentPower-Phase1</option>');
                $('#ec_para').append('<option value="_ApparentPower_B_kVA">ApparentPower-Phase2</option>');
                $('#ec_para').append('<option value="_ApparentPower_C_kVA">ApparentPower-Phase3</option>');
                $('#ec_para').append('<option value="_ApparentPower_Total_kVA">ApparentPower-Total</option>');
                $('#ec_para').append('<option value="_ApparentEnergy_DelpRec_kVAh">AppEnergy Total</option>');
                $('#ec_para').append('<option value="_Current_AN_Amp">Current A</option>');
                $('#ec_para').append('<option value="_Current_BN_Amp">Current B</option>');
                $('#ec_para').append('<option value="_Current_CN_Amp">Current C</option>');
                $('#ec_para').append('<option value="_Current_Avg_Amp">Avg Current</option>');
                $('#ec_para').append('<option value="_Frequency_Hz">Frequency-HZ</option>');
                $('#ec_para').append('<option value="_Harmonics_V1_THD">Voltage Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_V2_THD">Voltage Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_V3_THD">Voltage Harmonics C</option>');
                $('#ec_para').append('<option value="_Harmonics_I1_THD">Current Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_I2_THD">Current Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_I3_THD">Current Harmonics C</option>');
                $('#ec_para').append('<option value="_PowerFactor_A">PowerFactor-Phase1</option>');
                $('#ec_para').append('<option value="_PowerFactor_B">PowerFactor-Phase2</option>');
                $('#ec_para').append('<option value="_PowerFactor_C">PowerFactor-Phase3</option>');
                $('#ec_para').append('<option value="_PowerFactor_Total">PowerFactor Average</option>');
                $('#ec_para').append('<option value="_ReactivePower_A_kVAR">ReAPower-Phase1</option>');
                $('#ec_para').append('<option value="_ReactivePower_B_kVAR">ReAPower-Phase2</option>');
                $('#ec_para').append('<option value="_ReactivePower_C_kVAR">ReAPower-Phase3</option>');
                $('#ec_para').append('<option value="_ReactivePower_Total_kVAR">ReAPower-Total</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Delivered_kVAR">Reactive_Energy Delv</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Received_kVARh">Reactive_Energy Recv</option>');
                $('#ec_para').append('<option value="_Voltage_LL_V">LL-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_LN_V">LN-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_AB_V">Voltage AB</option>');
                $('#ec_para').append('<option value="_Voltage_BC_V">Voltage BC</option>');
                $('#ec_para').append('<option value="_Voltage_CA_V">Voltage CA</option>');
                $('#ec_para').append('<option value="_Voltage_AN_V">Voltage-1N</option>');
                $('#ec_para').append('<option value="_Voltage_BN_V">Voltage-2N</option>');
                $('#ec_para').append('<option value="_Voltage_CN_V">Voltage-3N</option>');
            } else if (loc == "LP") {
                $('#ec_name').show();
                $('#ec_para').show();
                $('#ec_name').empty();
                $('#ec_para').empty();
                $('#dashboard').hide();
                $('#ec_name').append('<option value="">Select an Option</option>');
                $('#ec_name').append('<option value="GW2_U12">GA90-VSD(Old)</option>');
                $('#ec_name').append('<option value="GW2_U11">GA90-Old</option>');
                $('#ec_name').append('<option value="GW2_U14">GA90-VSD(New)</option>');
                $('#ec_name').append('<option value="GW2_U13">GA90-New</option>');

                $('#ec_para').append('<option value="">Select an Option</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Delivered_kWh">ActiveEnergy_Delivered</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Received_kWh">ActiveEnergy_Recv</option>');
                $('#ec_para').append('<option value="_ActivePower_A_kW">ActivePower-Phase1</option>');
                $('#ec_para').append('<option value="_ActivePower_B_kW">ActivePower-Phase2</option>');
                $('#ec_para').append('<option value="_ActivePower_C_kW">ActivePower-Phase3</option>');
                $('#ec_para').append('<option value="_ActivePower_Total_kW">ActivePower-Total</option>');
                $('#ec_para').append('<option value="_ApparentPower_A_kVA">ApparentPower-Phase1</option>');
                $('#ec_para').append('<option value="_ApparentPower_B_kVA">ApparentPower-Phase2</option>');
                $('#ec_para').append('<option value="_ApparentPower_C_kVA">ApparentPower-Phase3</option>');
                $('#ec_para').append('<option value="_ApparentPower_Total_kVA">ApparentPower-Total</option>');
                $('#ec_para').append('<option value="_ApparentEnergy_DelpRec_kVAh">AppEnergy Total</option>');
                $('#ec_para').append('<option value="_Current_AN_Amp">Current A</option>');
                $('#ec_para').append('<option value="_Current_BN_Amp">Current B</option>');
                $('#ec_para').append('<option value="_Current_CN_Amp">Current C</option>');
                $('#ec_para').append('<option value="_Current_Avg_Amp">Avg Current</option>');
                $('#ec_para').append('<option value="_Frequency_Hz">Frequency-HZ</option>');
                $('#ec_para').append('<option value="_Harmonics_V1_THD">Voltage Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_V2_THD">Voltage Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_V3_THD">Voltage Harmonics C</option>');
                $('#ec_para').append('<option value="_Harmonics_I1_THD">Current Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_I2_THD">Current Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_I3_THD">Current Harmonics C</option>');
                $('#ec_para').append('<option value="_PowerFactor_A">PowerFactor-Phase1</option>');
                $('#ec_para').append('<option value="_PowerFactor_B">PowerFactor-Phase2</option>');
                $('#ec_para').append('<option value="_PowerFactor_C">PowerFactor-Phase3</option>');
                $('#ec_para').append('<option value="_PowerFactor_Total">PowerFactor Average</option>');
                $('#ec_para').append('<option value="_ReactivePower_A_kVAR">ReAPower-Phase1</option>');
                $('#ec_para').append('<option value="_ReactivePower_B_kVAR">ReAPower-Phase2</option>');
                $('#ec_para').append('<option value="_ReactivePower_C_kVAR">ReAPower-Phase3</option>');
                $('#ec_para').append('<option value="_ReactivePower_Total_kVAR">ReAPower-Total</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Delivered_kVAR">Reactive_Energy Delv</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Received_kVARh">Reactive_Energy Recv</option>');
                $('#ec_para').append('<option value="_Voltage_LL_V">LL-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_LN_V">LN-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_AB_V">Voltage AB</option>');
                $('#ec_para').append('<option value="_Voltage_BC_V">Voltage BC</option>');
                $('#ec_para').append('<option value="_Voltage_CA_V">Voltage CA</option>');
                $('#ec_para').append('<option value="_Voltage_AN_V">Voltage-1N</option>');
                $('#ec_para').append('<option value="_Voltage_BN_V">Voltage-2N</option>');
                $('#ec_para').append('<option value="_Voltage_CN_V">Voltage-3N</option>');
            } else if (loc == "HP") {
                $('#ec_name').show();
                $('#ec_para').show();
                $('#ec_name').empty();
                $('#ec_para').empty();
                $('#dashboard').hide();
                $('#ec_name').append('<option value="">Select an Option</option>');
                $('#ec_name').append('<option value="GW2_U4">HPAC-1425</option>');
                $('#ec_name').append('<option value="GW2_U3">HPAC-2189</option>');
                $('#ec_name').append('<option value="GW2_U2">HPAC4-HP1000</option>');

                $('#ec_para').append('<option value="">Select an Option</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Delivered_kWh">ActiveEnergy_Delivered</option>');
                $('#ec_para').append('<option value="_ActiveEnergy_Received_kWh">ActiveEnergy_Recv</option>');
                $('#ec_para').append('<option value="_ActivePower_A_kW">ActivePower-Phase1</option>');
                $('#ec_para').append('<option value="_ActivePower_B_kW">ActivePower-Phase2</option>');
                $('#ec_para').append('<option value="_ActivePower_C_kW">ActivePower-Phase3</option>');
                $('#ec_para').append('<option value="_ActivePower_Total_kW">ActivePower-Total</option>');
                $('#ec_para').append('<option value="_ApparentPower_A_kVA">ApparentPower-Phase1</option>');
                $('#ec_para').append('<option value="_ApparentPower_B_kVA">ApparentPower-Phase2</option>');
                $('#ec_para').append('<option value="_ApparentPower_C_kVA">ApparentPower-Phase3</option>');
                $('#ec_para').append('<option value="_ApparentPower_Total_kVA">ApparentPower-Total</option>');
                $('#ec_para').append('<option value="_ApparentEnergy_DelpRec_kVAh">AppEnergy Total</option>');
                $('#ec_para').append('<option value="_Current_AN_Amp">Current A</option>');
                $('#ec_para').append('<option value="_Current_BN_Amp">Current B</option>');
                $('#ec_para').append('<option value="_Current_CN_Amp">Current C</option>');
                $('#ec_para').append('<option value="_Current_Avg_Amp">Avg Current</option>');
                $('#ec_para').append('<option value="_Frequency_Hz">Frequency-HZ</option>');
                $('#ec_para').append('<option value="_Harmonics_V1_THD">Voltage Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_V2_THD">Voltage Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_V3_THD">Voltage Harmonics C</option>');
                $('#ec_para').append('<option value="_Harmonics_I1_THD">Current Harmonics A</option>');
                $('#ec_para').append('<option value="_Harmonics_I2_THD">Current Harmonics B</option>');
                $('#ec_para').append('<option value="_Harmonics_I3_THD">Current Harmonics C</option>');
                $('#ec_para').append('<option value="_PowerFactor_A">PowerFactor-Phase1</option>');
                $('#ec_para').append('<option value="_PowerFactor_B">PowerFactor-Phase2</option>');
                $('#ec_para').append('<option value="_PowerFactor_C">PowerFactor-Phase3</option>');
                $('#ec_para').append('<option value="_PowerFactor_Total">PowerFactor Average</option>');
                $('#ec_para').append('<option value="_ReactivePower_A_kVAR">ReAPower-Phase1</option>');
                $('#ec_para').append('<option value="_ReactivePower_B_kVAR">ReAPower-Phase2</option>');
                $('#ec_para').append('<option value="_ReactivePower_C_kVAR">ReAPower-Phase3</option>');
                $('#ec_para').append('<option value="_ReactivePower_Total_kVAR">ReAPower-Total</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Delivered_kVAR">Reactive_Energy Delv</option>');
                $('#ec_para').append(
                    '<option value="_ReactiveEnergy_Received_kVARh">Reactive_Energy Recv</option>');
                $('#ec_para').append('<option value="_Voltage_LL_V">LL-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_LN_V">LN-Voltage </option>');
                $('#ec_para').append('<option value="_Voltage_AB_V">Voltage AB</option>');
                $('#ec_para').append('<option value="_Voltage_BC_V">Voltage BC</option>');
                $('#ec_para').append('<option value="_Voltage_CA_V">Voltage CA</option>');
                $('#ec_para').append('<option value="_Voltage_AN_V">Voltage-1N</option>');
                $('#ec_para').append('<option value="_Voltage_BN_V">Voltage-2N</option>');
                $('#ec_para').append('<option value="_Voltage_CN_V">Voltage-3N</option>');
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
                                                <a href="#"> <i class="fa fa-line-chart"></i></a>
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
                                            <div class="card" style=" border: 1px solid #9f9fa3; border-radius: 5px;background-color: #fbfbfb;margin: 5px 5px 5px 0px;border-top: 5px solid #7699d4;">
                                                <div class="card-header" style="height: 50px">
                                                    <h3 class="card-title">Customized Trends</h3>
                                                </div>
                                                <div class="card-body" style="border-radius: 10px !important;">
                                                    <div class="form-group row">
                                                        <div class="card-header-tab col-sm-12 col-xl-4 col-md-6 pb-3">
                                                            <div class="btn-actions-pane-right text-capitalize">
                                                                <div class="btn-actions-pane-right text-capitalize">
                                                                    <select id="ec_location" class="form-select ">
                                                                        <option value="">Select an Area</option>
                                                                        <optgroup label="Unit 1" style="background-color:#365994">
                                                                        </optgroup>
                                                                        <option value="U">&nbsp&nbsp&nbsp&nbsp &#x2022; LT Penal Room</option>
                                                                        <optgroup label="Unit 2" style="background-color:#365994">
                                                                        <optgroup label="&nbsp&nbsp&nbsp&nbsp Generation Sources" style="font-weight:bolder;font-size:17px"> </optgroup>
                                                                        <option value="TF">&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &#x2022; Main Transformer</optio>
                                                                            <optgroup label="&nbsp&nbsp&nbsp&nbsp Distribution Sources" style="font-weight:bolder;font-size:17px"> </optgroup>
                                                                        <option value="RO_Sec">&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &#x2022; RO Section</option>
                                                                        <option value="GR">&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &#x2022; Grasso</option>
                                                                        <option value="ECR">&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &#x2022; ECR</option>
                                                                        <option value="LS">&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &#x2022; Lines Section</option>
                                                                        <option value="LP">&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &#x2022; LPAC</option>
                                                                        <option value="HP">&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &#x2022; HPAC</option>
                                                                        </optgroup>
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
                                                            <input name="ec_start_date" value="<?php echo date("Y-m-d"); ?>" class="mb-6 mr-1 btn btn-primary" onchange="drawChart()" type="date" style="width:150px;" id="ec_start_date" required>
                                                        </div>
                                                        <div class="card-header-tab col-sm-12 col-xl-3 col-md-6 pb-3">
                                                            <div class="btn-actions-pane-right text-capitalize">
                                                                <input name="ec_end_date" value="<?php echo date("Y-m-d"); ?>" class="mb-6 mr-1 btn btn-primary" onchange="drawChart()" type="date" style="width:150px;" id="ec_end_date" required class="date-picker">
                                                            </div>
                                                        </div>
                                                        <div id="export_div" class="card-header-tab col-sm-12 col-xl-6 col-md-6 pb-3"></div>
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
    <script type="text/javascript">
        $("#ec_start_date").change(function() {
            $("#ec_end_date").prop("min", $(this).val());
            $("#ec_end_date").val(""); //clear end date input when start date changes
        });
    </script>
</body>

</html>