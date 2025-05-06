<?php
session_start();
if (!isset($_SESSION['auth'])) {
    // not logged in
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/head.php'); ?>
    <style type="text/css">
        .form-group label {
            font-size: 15px;
        }

        input[type="submit"] {
            width: 240px;
            height: 35px;
            display: block;
            font-size: 16px;
            font-weight: bold;
            color: black;
            text-decoration: none;
            text-transform: uppercase;
            text-align: center;
            /* text-shadow: 1px 1px 0px #c9cad1; */
            padding-top: 6px;
            margin: 10px 0 0 5px;
            position: relative;
            cursor: pointer;
            border: none;
            /* background: -webkit-linear-gradient(#16569a, #406e9f, #6794c5, #add8f0);
      background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0); */
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            box-shadow: inset 0px 1px 0px #c9cad1, 0px 5px 0px 0px #c9cad1, 0px 10px 5px #999;
        }

        .card-title {
            color: #626469;
            font-weight: bold;
            font-size: 20px;
        }

        .card {
            border: 1px solid #9f9fa3;
            border-radius: 5px;
            background-color: #fbfbfb;
            margin: 5px 5px 5px 0px;
            font-size: 14px;
            font-family: Arial, Verdana, "Helvetica Neue", "Lucida Grande", "Segoe UI", Arial, Helvetica, sans-serif;
        }

        .col-sm-1 {
            color: #626469;
            font-size: 15px;
            font-family: Arial, Verdana, "Helvetica Neue", "Lucida Grande", "Segoe UI", Arial, Helvetica, sans-serif;
        }

        input[type=text] {
            border-width: 1px;
            border-color: #9f9fa3;
            border-style: solid;
            border-radius: 3px;
            background-color: #fff;
            -webkit-box-shadow: inset 0px 1px 3px 0px rgba(98, 100, 105, 0.2);
            box-shadow: inset 0px 1px 3px 0px rgba(98, 100, 105, 0.2);
            height: 32px;
        }


        input[type=date] {
            border-width: 1px;
            border-color: #9f9fa3;
            border-style: solid;
            border-radius: 3px;
            background-color: #fff;
            -webkit-box-shadow: inset 0px 1px 3px 0px rgba(98, 100, 105, 0.2);
            box-shadow: inset 0px 1px 3px 0px rgba(98, 100, 105, 0.2);
            height: 32px;
        }
    </style>
    <style>
        .modal .modal-body {
            max-height: 350px;
            overflow-y: auto;
        }

        .modal .modal-header {
            height: 30px;
            padding-top: 3px;
            background-color: #3dcd58;
        }

        .modal .modal-title {
            border-radius: 0px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            color: #fff;
            font-weight: normal;
            font-size: 14px;
            /*padding: 5px 0px 3px 10px;*/
            margin-top: 12px;
        }

        #modal-simple {
            border: 1px solid #9f9fa3;
            box-shadow: 0 10px 20px rgb(0 0 0 / 19%), 0 6px 6px rgb(0 0 0 / 23%);
        }

        .form-check {
            margin-left: 1px;
            padding: 2px 2px 3px;
            border: 1px solid transparent;
            /*display: inline;
    display: inline-block;*/
            vertical-align: middle;
        }

        .form-check .form-check-label {
            font-size: 14px;

        }

        .form-check .form-check-input {
            margin-left: 04px
        }

        .form-group label {
            font-size: 15px;
        }

        ul li,
        ol li,
        dl li {
            line-height: 1.3;
        }

        .wickedpicker__controls__control-down,
        .wickedpicker__controls__control-up {
            color: red;
            visibility: visible;
        }

        #slide {
            background-color: #82a5e0;
            color: #fff;
            overflow: hidden;
            transition: 1s;
            width: 230px;
            height: 150px;
            /* position: absolute; */
            float: right;
            /* margin-top: 20px; */
            border-radius: 10px;
            z-index: 999;
        }

        .bttn {
            border: none;
            outline: 0 !important;
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
                                            <h4 class="m-b-10">Energy Usage Report</h4>
                                            <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"> <i class="fa fa-file"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Reports</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Energy Usage
                                                    Report</a>
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
                                            <div class="card-header" style="height:50px; padding: 0.5rem 1rem">
                                                <h4 style="padding-top:9px" class="card-title"> Energy Usage Report</h4>
                                            </div>
                                            <div class="card-block">
                                                <form action="energy_usage_report.php" method="POST">
                                                    <div class="form-group row" style="margin-top: 20px;">
                                                        <label class="col-sm-1 col-form-label">Title</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" aria-describedby="emailHelp" name="title" value="Energy Consumption Report">
                                                            <small class="form-hint">Report Title as per your
                                                                format.</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Sources</label>
                                                        <div class="col-sm-3">
                                                            <div class="btn-list">
                                                                <a class="btn select2" data-toggle="modal" data-target="#modal-simple" style="width: 100%;background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0);color:  white;" required>
                                                                    Select Sources
                                                                </a>
                                                                <small class="form-hint">
                                                                    Select Sources as per your requirement.
                                                                </small>
                                                                <input id="results" type="text" class="form-control" required data-readonly>
                                                                <style type="text/css">
                                                                    input[data-readonly] {
                                                                        pointer-events: none;
                                                                    }
                                                                </style>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label"></label>
                                                        <div class="col-3">
                                                            <div id="size">
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Start Date</label>
                                                        <div class="col-md-3 col-xs-11">
                                                            <input class="form-control form-control-inline input-medium default-date-picker" size="16" id="start" type="date" name="start_date" placeholder="Select a date" required>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">End Date</label>
                                                        <div class="col-md-3 col-xs-11">
                                                            <input class="form-control form-control-inline input-medium default-date-picker" size="16" id="end" type="date" name="end_date" placeholder="Select a date" required>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group row" style="margin-left: 10px">
                                                        <input type="submit" value="Generate Report" class="btn" style="background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0);">
                                                    </div>
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
    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="height:30px;padding-top: 3px;background-color: #7699d4;">
                    <p class="modal-title">Select Sources</p>
                    <i data-dismiss="modal" aria-label="Close" style="padding-top:3px;cursor:pointer;" class="fa fa-times" aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <div>
                            <div style="padding-bottom: 10px;margin-left: 28px">
                                <input class="form-check-input" type="checkbox" id="select-all">
                                <span><b>Select All</b></span>
                            </div>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_1">
                                <span class="form-check-label">Main LT</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_2">
                                <span class="form-check-label">Water Treatment</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_3">
                                <span class="form-check-label">Turbine 1</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_4">
                                <span class="form-check-label">Syrup Room</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_5">
                                <span class="form-check-label">Air Compressor(3+4+5)</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_6">
                                <span class="form-check-label">Air Compressor(1+2)</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_7">
                                <span class="form-check-label">Grasso 4</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_8">
                                <span class="form-check-label">Grasso 3</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_9">
                                <span class="form-check-label">Grasso 2</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_10">
                                <span class="form-check-label">Grasso 1</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_11">
                                <span class="form-check-label">Evaporators</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_12">
                                <span class="form-check-label">Line - 5</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_13">
                                <span class="form-check-label">Line - 4</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_14">
                                <span class="form-check-label">Line - 3</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_15">
                                <span class="form-check-label">Line - 1</span>
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_16">
                                <span class="form-check-label">Boiler</span>
                            </label>
                            <!-- <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="radio[]" value="U_17">
                                <span class="form-check-label">Turbine - 2</span>
                            </label> -->
                        </div>
                    </div>
                </div>
                </form>
                <script>
                    function displayDivDemo(id, elementValue) {
                        document.getElementById(id).style.display = elementValue.value == 'Fixed Date' ? 'block' : 'none';
                    }
                </script>
                <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> -->
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#go").click(function() {
                            var data = $("input:checked").map(function() {
                                return $(this).closest(".form-check").find("span").text();
                            }).get().join(", ");
                            $("#results").val(data);
                        });
                    });
                    document.getElementById('select-all').onclick = function() {
                        var checkboxes = document.getElementsByName('radio[]');
                        for (var checkbox of checkboxes) {
                            checkbox.checked = this.checked;
                        }
                    }
                </script>
                <div class="modal-footer">
                <button id="go" class="btn" data-dismiss="modal" style="padding:5px 50px;background-color: #3e8fc6;color:white">OK</button>
                    <button type="button" class="btn btn-danger " data-dismiss="modal" style="padding:5px 40px;">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script>
        document.getElementById("slide_button").onclick = function() {
            if (parseInt(document.getElementById("slide").style.width) == 0) {
                document.getElementById("slide").style.width = "230px";
            } else {
                document.getElementById("slide").style.width = "0px";
            }
        }
    </script>
    <script type="text/javascript">
        $("#start").change(function() {
            $("#end").prop("min", $(this).val());
            $("#end").val(""); //clear end date input when start date changes
        });
    </script>
</body>

</html>