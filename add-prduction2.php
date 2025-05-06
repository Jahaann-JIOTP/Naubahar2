<?php
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(0);
session_start();
if (!isset($_SESSION['auth'])) {
    // not logged in
    header('Location:index.php');
}
date_default_timezone_set("Asia/Karachi");
$servername = "65.0.16.20";
$username = "jahaann";
$password = "Jahaann#321";
$database = "naubahar_project";
// $_POST['date'] = date('Y-n-j');
$col = $_POST['date'];
$con = new mysqli($servername, $username, $password, $database);
// if(count($_POST)>0) {
// $sql = mysqli_query($conn,"INSERT INTO production (date, pro)
//  VALUES ('". $_POST['date'] . "','" . $_POST['value'] . "')");
// }
if (count($_POST) > 0) {
    $sql = mysqli_query($con, "ALTER TABLE production2 ADD `$col` BLOB");
}
//     $sql = mysqli_query($conn,"INSERT INTO production (`$col`)
//   VALUES ('" . $_POST['val'] . "')");
if (count($_POST) > 0) {
    $sql2 = mysqli_query($con, "UPDATE production2 set `$col` = '" . $_POST['val'] . "'");
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }

    table {
        width: 750px;
        border-collapse: collapse;
        margin: 50px auto;
    }

    tr:nth-of-type(odd) {
        background: #16569a;
        color: white;
    }

    td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
        font-size: 18px;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    :root {
        --e_blue: #16569a;
        --e_light: #FAFAFA;
    }

    .my-wrap {
        font-family: 'Poppins', sans-serif;
    }

    .custom-form {
        position: relative;
        margin-bottom: 1rem;
    }

    .custom-form>.custom-form-label>label {
        position: relative;
        padding: 0.2rem 1.5rem;
        text-align: center;
        font-size: 80%;
        margin-bottom: 0;
    }

    .custom-form>.custom-form-label>label {
        color: #fff;
        background: var(--e_blue);
    }

    .custom-form>.custom-form-label>label::before {
        top: 4px;
        left: -12px;
        border-radius: 6px 0 0 0;
        transform: rotate(35deg);
        background: linear-gradient(145deg, var(--e_blue) 56%, #ffffff00 50%);
    }

    .custom-form>.custom-form-label>label::before {
        background: linear-gradient(145deg, var(--e_blue) 56%, #ffffff00 50%);
    }

    .custom-form>.custom-form-label>label::before,
    .custom-form>.custom-form-label>label::after {
        position: absolute;
        content: '';
        display: block;
        width: 31px;
        height: 31px;
    }

    .custom-form>.custom-form-label>label::after {
        top: 4px;
        right: -12px;
        border-radius: 0 6px 0 0;
        transform: rotate(-35deg);
        background: linear-gradient(215deg, #fff 56%, #ffffff00 50%);
    }

    .custom-form>.custom-form-label>label::after {
        background: linear-gradient(215deg, var(--e_blue) 56%, #ffffff00 50%);
    }

    .custom-form-panel {
        height: 90%;
    }

    .custom-form>.custom-form-control {
        padding: .6rem 1rem;
        border-radius: 7px;
        min-width: 295px;
        text-align: center;
    }

    .custom-form>.custom-form-control {
        border: solid 2px var(--e_blue);
        color: var(--e_blue);
        background: #FAFAFA;
    }

    *:focus {
        outline: none;
    }

    button {
        background-image: linear-gradient(#16569a, #406e9f, #6794c5, #add8f0);
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

    #dt,
    #ndt {
        height: 45px;
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
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h4 class="m-b-10">Add Daily Production Unit 2</h4>
                                            <h6 class="m-b-0" style="color: #284497">Welcome to Jahaann</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="#"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!" style="color: #284497">Add Daily
                                                    Production Unit 2</a>
                                            </li>
                                        </ul>
                                    </div>
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
                                        <form class="text-center my-wrap pt-5 pb-5" method="POST" action="">
                                            <h1 class="h3 mb-3 font-weight-bold text-uppercase" style="color: var(--e_blue)">Add Daily Production Unit 2</h1>
                                            <div class="custom-form">
                                                <div class="custom-form-label">
                                                    <label for="date">Date</label>
                                                </div>
                                                <input type="date" id="dt" onchange="mydate1();" name="date" autocomplete="off" class="custom-form-control" placeholder="" required value="<?php echo date('Y-n-j'); ?>">
                                                <input type="text" id="ndt" onclick="mydate();" hidden name="date" autocomplete="off" class="custom-form-control" placeholder="" required value="<?php echo date('Y-n-j'); ?>">
                                            </div>
                                            <div class="custom-form">
                                                <div class="custom-form-label">
                                                    <label for="value">Production</label>
                                                </div>
                                                <input type="number" name="val" autocomplete="off" class="custom-form-control" placeholder="Enter Production" required>
                                            </div>
                                            <button type="submit" value="submit">submit</button>
                                        </form>
                                        <div class="card">
                                            <div class="card-header" style="height:65px;color:rgb(34, 33, 33); border-top-style: solid;border-radius: 10px !important;border-color: #206bc4;background-color:#7ea5c5">
                                                <h4>History Of Daily Production Unit 2</h4>
                                            </div>
                                            <div class="" style="overflow: auto;">
                                                <?php
                                                //get results from database
                                                $result1 = mysqli_query($con, "SELECT * FROM production2");
                                                // var_dump($result);
                                                // var_dump(mysqli_num_rows($result)); 
                                                $all_property = array();  //declare an array for saving property

                                                //showing property
                                                echo '<table class="data-table">
                                                    <tr class="data-heading">';  //initialize table tag
                                                while ($property = mysqli_fetch_field($result1)) {
                                                    echo '<td>' . $property->name . '</td>';  //get field name for header
                                                    $all_property[] = $property->name;  //save those to array
                                                }
                                                echo '</tr>'; //end tr tag

                                                //showing all data
                                                while ($row = mysqli_fetch_array($result1)) {
                                                    echo "<tr>";
                                                    foreach ($all_property as $item) {
                                                        echo '<td>' . $row[$item] . '</td>'; //get items using property value
                                                    }
                                                    echo '</tr>';
                                                }
                                                echo "</table>";
                                                ?>
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
    <script>
        function mydate() {
            //alert("");
            document.getElementById("dt").hidden = false;
            document.getElementById("ndt").hidden = true;
        }

        function mydate1() {
            d = new Date(document.getElementById("dt").value);
            dt = d.getDate();
            mn = d.getMonth();
            mn++;
            yy = d.getFullYear();
            document.getElementById("ndt").value = yy + "-" + mn + "-" + dt
            document.getElementById("ndt").hidden = false;
            document.getElementById("dt").hidden = true;
        }
    </script>
</body>

</html>