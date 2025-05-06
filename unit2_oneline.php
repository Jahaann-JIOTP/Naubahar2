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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes/head.php'); ?>
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
    <style type="text/css">
        .di {
            zoom: 0.75;
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
                                            <h4 class="m-b-10">Oneline Diagram - Unit 2</h4>
                                            <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Diagrams</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Meters
                                                    Status - Unit 2</a>
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
                                            <!-- <div class="card" style="width:83.5%;height:650px;margin-top:30px;margin-left:40px"> -->
                                            <!-- <div class="card-header" style="height: 60px;border-bottom: 7px solid;border-bottom-color: #adadad">
                        </div> -->
                                            <div class="no-gutters box di" style="width: 99.5%;overflow-x:auto;">
                                                <img usemap="#workmap1" class="map" src='assets/images/new_sld20.png' style="margin-left:18px ; margin-top:14px">

                                                <div id="refresh">
                                                </div><br><br>
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
</body>

</html>
<script>
    let link = 'unit2_oneline_data.php';
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