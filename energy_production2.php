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
    <style>
    #hideValuesOnSelect {
        display: none;
    }

    #hideValuesOnSelect1 {
        display: none;
    }

    #hideValuesOnSelect2 {
        display: none;
    }

    .form-group {

        font-size: 15.5px;
        font-weight: bold;

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
                                            <h4 class="m-b-10">Energy Production Report Unit 2</h4>
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
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Energy
                                                    Production Report Unit 2</a>
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
                                        <div class="card" style="border-radius: 10px !important;">
                                            <div class="card-header"
                                                style="border-top:5px solid;border-color:#7699d4;height:70px; padding: 0.5rem 1rem;border-bottom: 1px solid #e7eaed;">
                                                <h4 style="padding-top:3px"> Energy Production Report Unit 2
                                                    <a href="add-prduction2.php"
                                                        class="btn waves-effect waves-light hor-grd btn-grd-primary"
                                                        style="color:white ; width:175px; border-radius:30px; float:right"><span
                                                            class=""></span>Add Production</a>
                                                    <a href="#edit1" data-toggle="modal"
                                                        class="btn waves-effect waves-light hor-grd btn-grd-danger"
                                                        style="color:white ; width:150px; border-radius:30px; float:right"><span
                                                            class=""></span>Add Triff</a>
                                                    <?php include('Model3.php'); ?>
                                                </h4>
                                            </div>
                                            <div class="card-block">
                                                <form action="energy_production_report2.php" method="POST">
                                                    <div class="form-group row" style="margin-top: 20px;">
                                                        <label class="col-sm-2 col-form-label">Title</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control"
                                                                aria-describedby="emailHelp" name="title"
                                                                value="Energy Production Report">
                                                            <small class="form-hint">Report Title as per your
                                                                format.</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Reporting Period</label>
                                                        <div class="col-sm-4">
                                                            <select
                                                                onchange="displayDivDemo('hideValuesOnSelect', this); displayDivDemo1('hideValuesOnSelect1', this); displayDivDemo2('hideValuesOnSelect2', this)"
                                                                class="form-select custom-select" required name="option"
                                                                style="width:74%">
                                                                <option value="">Select Options</option>
                                                                <option value="weekly">Weekly</option>
                                                                <option value="month">Monthly</option>
                                                                <!--  <option value="This Year">Yearly</option> -->
                                                                <option value="Fixed Date">Fixed Date...</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div id="hideValuesOnSelect">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Start Date</label>
                                                            <div class="col-sm-3">
                                                                <input id="start" type="date"
                                                                    name="start_date" class="form-control "
                                                                    placeholder="Select a date"  />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">End Date</label>
                                                            <div class="col-sm-3">
                                                                <input id="end" type="date" name="end_date"
                                                                    class="form-control " placeholder="Select a date" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="hideValuesOnSelect1">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Month</label>
                                                            <div class="col-sm-3">
                                                                <input id="calendar-simple" type="month"
                                                                    name="month_date" class="form-control "
                                                                    placeholder="Select a Month"/>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div id="hideValuesOnSelect2">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Week</label>
                                                            <div class="col-sm-3">
                                                                <input id="calendar-simple" type="week" name="week_date"
                                                                    class="form-control " placeholder="Select a Week"   />
                                                            </div>
                                                        </div>

                                                    </div>
                                            </div>
                                            <div class="form-group row" style="margin-left: 10px">
                                                <input type="submit" value="Generate Report"
                                                    class="btn waves-effect waves-light hor-grd btn-grd-primary">&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            </div>
                                            </form>

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

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script>
    function displayDivDemo(id, elementValue) {
        document.getElementById(id).style.display = elementValue.value == 'Fixed Date' ? 'block' : 'none';

    }
    </script>
    <script>
    function displayDivDemo1(id, elementValue) {
        document.getElementById(id).style.display = elementValue.value == 'month' ? 'block' : 'none';
    }
    </script>
    <script>
    function displayDivDemo2(id, elementValue) {
        document.getElementById(id).style.display = elementValue.value == 'weekly' ? 'block' : 'none';
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