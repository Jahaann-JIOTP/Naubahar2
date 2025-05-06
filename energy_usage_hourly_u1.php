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
                                            <h4 class="m-b-10">Energy Usage Report (Unit 2)</h4>
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
                                                    Report (Unit 2)</a>
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
                                        <div class="card"  style=" border: 1px solid #9f9fa3; border-radius: 5px;background-color: #fbfbfb;margin: 5px 5px 5px 0px;border-top: 5px solid #7699d4;">
                                            <div class="card-header">
                                                <h4 style="padding-top:3px"> Energy Usage Report</h4>
                                            </div>
                                            <div class="card-body">
                                                <form action="energy_usage_hourly_report1.php" method="post">
                                                    <div class="form-group row" style="margin-top: 20px;">
                                                        <label class="col-sm-1 col-form-label">Title</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" aria-describedby="emailHelp" name="title" value="Energy Usage">
                                                            <small class="form-hint">Report Title as per your
                                                                format.</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Sources</label>
                                                        <div class="col-sm-3">
                                                            <div class="btn-list ">
                                                                <!-- options -->
                                                                <div class="card">
                                                                    <div class="card-body" style="border-radius: 10px !important;">
                                                                        <div class="form-group row">
                                                                            <div class="card-header-tab col-sm-12 col-md-12 pb-3">
                                                                                <div class="btn-actions-pane-right text-capitalize">
                                                                                    <select id="meters" class="btn waves-effect waves-light hor-grd btn-grd-primary select2" style="background-color: #1348A8;text-align: left;" name="area" required>
                                                                                    <option value="">Select Meters</option>
                                                                                    <option value="ALL">&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &#x2022; Select All Meters</optio>
                                                                                    <option value="meters">&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &#x2022;Select Meters</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label"></label>
                                                                            <div class="col-12" >
                                                                                <div id="show" ></div>
                                                                            </div>
                                                                        </div><br>
                                                                    </div>
                                                                </div> <!-- card end -->
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                        <input type="submit" value="Generate Report" class="btn waves-effect waves-light hor-grd btn-grd-primary">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#meters").change(function() {
                var val = $(this).val();
                if (val == "ALL") {
                    $("#show").html(
                        "<div><input type='checkbox' value='U_1' checked name='checkbox[]'><label for='scales'>Main LT</label></div><div><input type='checkbox' value='U_2' checked name='checkbox[]'><label for='scales'>Water Treatment</label></div><div><input type='checkbox' value='U_3' checked name='checkbox[]'><label for='scales'>Turbine 1</label></div><div><input type='checkbox' value='U_4' checked name='checkbox[]'><label for='scales'>Syrup Room</label></div><div><input type='checkbox' value='U_5' name='checkbox[]'checked><label for='horns'>Air Compressor(3+4+5)</label></div><div><input type='checkbox' value='U_6' name='checkbox[]'checked><label for='horns'>Air Compressor(1+2)</label></div><div><input type='checkbox' value='U_7' name='checkbox[]'checked><label for='horns'>Grasso 4</label></div><div><input type='checkbox' value='U_8' checked name='checkbox[]'><label for='scales'>Grasso 3</label></div><div><input type='checkbox' value='U_9' name='checkbox[]'checked><label for='horns'>Grasso 2</label></div><div><input type='checkbox'  value='U_10' name='checkbox[]'checked><label for='horns'>Grasso 1</label></div>            <div><input type='checkbox'  value='U_11' name='checkbox[]'checked><label for='horns'>Evaporators</label></div>            <div><input type='checkbox'  value='U_12' name='checkbox[]'checked><label for='horns'>Line - 5</label></div>            <div><input type='checkbox'  value='U_13' name='checkbox[]'checked><label for='horns'>Line - 4</label></div>            <div><input type='checkbox'  value='U_14' name='checkbox[]'checked><label for='horns'>Line - 3</label></div><div><input type='checkbox' value='U_15' checked name='checkbox[]'><label for='scales'>Line - 1</label></div><div><input type='checkbox' value='U_16' name='checkbox[]'checked><label for='horns'>Boiler</label></div>"
                );
                } else if (val == "meters") {
                    $("#show").html(
                        "<div><input type='checkbox' value='U_1'  name='checkbox[]'><label for='scales'>Main LT</label></div><div><input type='checkbox' value='U_2'  name='checkbox[]'><label for='scales'>Water Treatment</label></div><div><input type='checkbox' value='U_3'  name='checkbox[]'><label for='scales'>Turbine 1</label></div><div><input type='checkbox' value='U_4'  name='checkbox[]'><label for='scales'>Syrup Room</label></div><div><input type='checkbox' value='U_5' name='checkbox[]'><label for='horns'>Air Compressor(3+4+5)</label></div><div><input type='checkbox' value='U_6' name='checkbox[]'><label for='horns'>Air Compressor(1+2)</label></div><div><input type='checkbox' value='U_7' name='checkbox[]'><label for='horns'>Grasso 4</label></div><div><input type='checkbox' value='U_8'  name='checkbox[]'><label for='scales'>Grasso 3</label></div><div><input type='checkbox' value='U_9' name='checkbox[]'><label for='horns'>Grasso 2</label></div><div><input type='checkbox'  value='U_10' name='checkbox[]'><label for='horns'>Grasso 1</label></div>            <div><input type='checkbox'  value='U_11' name='checkbox[]'><label for='horns'>Evaporators</label></div>            <div><input type='checkbox'  value='U_12' name='checkbox[]'><label for='horns'>Line - 5</label></div>            <div><input type='checkbox'  value='U_13' name='checkbox[]'><label for='horns'>Line - 4</label></div>            <div><input type='checkbox'  value='U_14' name='checkbox[]'><label for='horns'>Line - 3</label></div><div><input type='checkbox' value='U_15' name='checkbox[]'><label for='scales'>Line - 1</label></div><div><input type='checkbox' value='U_16' name='checkbox[]'><label for='horns'>Boiler</label></div>"
                    );
                }

            });
        });
    </script>
    <script>
        document.body.style.display = "block"
    </script>
    </div>
    <script>
        document.body.style.display = "block"
    </script>
    <script type="text/javascript">
        $("#start").change(function() {
            $("#end").prop("min", $(this).val());
            $("#end").val(""); //clear end date input when start date changes
        });
    </script>
</body>

</html>