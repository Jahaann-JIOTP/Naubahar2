<?php
$page_name = basename(($_SERVER['PHP_SELF']) . "?" . ($_SERVER['QUERY_STRING']));
$page = basename($_SERVER['PHP_SELF']);
// $page =explode(".", $page);
// $page_name2 =explode(".", $page_name);
// $page_name1 =explode("?", $page_name2[1]);
// $page_name=$page_name2[0].'?'.$page_name1[1];
include('Action/connection.php');
$id = $_SESSION["auth"];
$result = mysqli_query($con, "SELECT * FROM accounts WHERE  id= '$id'");
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (!empty($row["avatar"])) {
        $avatar = 'Action/uploads/' . $row["avatar"];
    } else {
        $avatar = "assets/images/profile_pic.png";
    }
}
?>
<style type="text/css">
    .sidebar-wrapper {
        background-image: url(assets/images/breadcrumb-bg.jpg);
        background-size: cover;
        position: relative;
        border-radius: 0;
        color: #fff;
        width: 235px;
        overflow: auto;
        height: 130%;
    }

    .pcoded[fream-type="theme1"] .sidebar-wrapper:before,
    .pcoded[fream-type="theme1"] .sidebar-wrapper:before {
        background: rgba(68, 138, 255, 0.5);


    }

    .sidebar-wrapper:before {
        content: "";
        width: 100%;
        height: 150%;
        position: absolute;
    }

    .pcoded-mtext {
        color: white;
        font-size: 15px;
        font-family: Arial;
    }

    .pcoded-micon {
        color: white;
    }

    .pcoded-hasmenu:onlick {
        background-color: white;
    }

    .active {
        background-color: #448aff;
    }

    .pcoded-navbar::-webkit-scrollbar {
        display: none;
    }
</style>
<nav class="pcoded-navbar navbar-collapsed" style="overflow-y:auto; overflow-x:hidden;">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header" style="height: 120px">
                <img class="img-80 img-radius" src="<?php echo $avatar; ?>" alt="User-Profile-Image" style="margin-top:3px">
                <div class="user-details">
                    <span id="more-details"><?php echo $_SESSION["name"]; ?><i class="fa fa-caret-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="profile.php"><i class="ti-user"></i>View Profile</a>
                        <a href="Action/logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-wrapper">
            <!-- <div class="p-15 p-b-0">
          <form class="form-material">
              <div class="form-group form-primary">
                  <input type="text" name="footer-email" class="form-control" required="">
                  <span class="form-bar"></span>
                  <label class="float-label"><i class="fa fa-search m-r-10"></i>Search</label>
              </div>
          </form>
      </div> -->
            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation" style="color: #1434A4;font-size:medium;">Dasboards
            </div>
            <ul class="pcoded-item">

                <li class="pcoded-hasmenu <?php if ($page == 'home.php' || $page == 'cost_comparison_u1.php' || $page == 'status_table_u1.php') {
                                                echo 'pcoded-trigger ';
                                            }  ?>">
                    <a href="#" class="waves-effect waves-dark  <?php if ($page == 'home.php' || $page == 'cost_comparison_u1.php' || $page == 'status_table_u1.php') {
                                                                    echo 'active';
                                                                } ?>">
                        <span class="pcoded-micon"><i class="fa fa-dashboard fa-lg"></i><b></b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Unit 1</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">

                        <li class=" <?php if ($page == 'home.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="home.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-dollar fa-lg" style="color: red"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Plant Summary</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>

                        <li class="<?php if ($page == 'status_table_u1.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="status_table_u1.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class='fa fa-table fa-lg' style="color: red"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Status Table</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu  <?php if ($page == 'home_unit2.php' || $page == 'ECR_unit2.php' || $page == 'Grasso_unit2.php' || $page == 'Ro_unit2.php' || $page == 'line_unit2.php' ||  $page == 'LPAC_unit2.php' ||  $page == 'HP_unit2.php') {
                                                        echo 'pcoded-trigger ';
                                                    }  ?>">
                    <a href="#" class="waves-effect waves-dark nav-link <?php if ($page == 'home_unit2.php' || $page == 'ECR_unit2.php' || $page == 'Grasso_unit2.php' || $page == 'Ro_unit2.php') {
                                                                            echo 'active';
                                                                        } ?>">
                        <span class="pcoded-micon"><i class="fa fa-dashboard fa-lg"></i><b></b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Unit 2</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">

                        <li class="<?php if ($page == 'home_unit2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="home_unit2.php" class="waves-effect waves-dark">
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Plant Summary</span>
                            </a>
                        </li>

                        <li class="<?php if ($page == 'Ro_unit2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="Ro_unit2.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-dollar fa-lg" style="color: red"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">RO
                                    Section</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'Grasso_unit2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="Grasso_unit2.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-dollar fa-lg" style="color: red"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Grasso Section</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'ECR_unit2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="ECR_unit2.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-dollar fa-lg" style="color: red"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">ECR Section</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'line_unit2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="line_unit2.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-dollar fa-lg" style="color: red"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Line Section</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'LPAC_unit2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="LPAC_unit2.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-dollar fa-lg" style="color: red"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">LPAC Section</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'HP_unit2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="HP_unit2.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-dollar fa-lg" style="color: red"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">HPAC Section</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
            <div class="pcoded-navigation-label" data-i18n="nav.category.forms" style="color: #1434A4;font-size:medium">
                Diagrams</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="<?php if ($page == 'unit1.php' || $page_name == 'meter_diagram_u1.php?meter=U_1' || $page_name == 'meter_diagram_u1.php?meter=U_2' || $page_name == 'meter_diagram_u1.php?meter=U_3' || $page_name == 'meter_diagram_u1.php?meter=U_4' || $page_name == 'meter_diagram_u1.php?meter=U_5' || $page_name == 'meter_diagram_u1.php?meter=U_6' || $page_name == 'meter_diagram_u1.php?meter=U_7' || $page_name == 'meter_diagram_u1.php?meter=U_8' || $page_name == 'meter_diagram_u1.php?meter=U_9' || $page_name == 'meter_diagram_u1.php?meter=U_10' || $page_name == 'meter_diagram_u1.php?meter=U_11' || $page_name == 'meter_diagram_u1.php?meter=U_12' || $page_name == 'meter_diagram_u1.php?meter=U_13' || $page_name == 'meter_diagram_u1.php?meter=U_14' || $page_name == 'meter_diagram_u1.php?meter=U_15' || $page_name == 'meter_diagram_u1.php?meter=U_16' || $page_name == 'meter_diagram_u1.php?meter=U_17' || $page_name == 'log.php?type=volt&&meter=U_1' || $page_name == 'log.php?type=volt&&meter=U_2' || $page_name == 'log.php?type=volt&&meter=U_3' || $page_name == 'log.php?type=volt&&meter=U_4' || $page_name == 'log.php?type=volt&&meter=U_5' || $page_name == 'log.php?type=volt&&meter=U_6' || $page_name == 'log.php?type=volt&&meter=U_7' || $page_name == 'log.php?type=volt&&meter=U_8' || $page_name == 'log.php?type=volt&&meter=U_9' || $page_name == 'log.php?type=volt&&meter=U_10' || $page_name == 'log.php?type=volt&&meter=U_11' || $page_name == 'log.php?type=volt&&meter=U_12' || $page_name == 'log.php?type=volt&&meter=U_13' || $page_name == 'log.php?type=volt&&meter=U_14' || $page_name == 'log.php?type=volt&&meter=U_15' || $page_name == 'log.php?type=volt&&meter=U_16' || $page_name == 'log.php?type=volt&&meter=U_17' || $page_name == 'log_detail.php?meter=U_1&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_2&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_3&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_4&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_5&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_6&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_7&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_8&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_9&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_10&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_11&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_12&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_13&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_14&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_15&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_16&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_17&val=volt&type=volt' || $page_name == 'log_detail.php?meter=U_1&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_2&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_3&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_4&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_5&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_6&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_7&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_8&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_8&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_9&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_10&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_11&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_12&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_13&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_14&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_15&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_16&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_17&val=current&type=volt' || $page_name == 'log_detail.php?meter=U_1&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_2&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_3&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_4&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_5&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_6&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_7&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_8&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_9&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_10&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_11&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_12&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_13&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_14&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_15&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_16&val=power_factor&type=volt' || $page_name == 'log_detail.php?meter=U_17&val=power_factor&type=volt' || $page_name == 'log.php?type=power&&meter=U_1' || $page_name == 'log.php?type=power&&meter=U_2' || $page_name == 'log.php?type=power&&meter=U_3' || $page_name == 'log.php?type=power&&meter=U_4' || $page_name == 'log.php?type=power&&meter=U_5' || $page_name == 'log.php?type=power&&meter=U_6' || $page_name == 'log.php?type=power&&meter=U_7' || $page_name == 'log.php?type=power&&meter=U_8' || $page_name == 'log.php?type=power&&meter=U_9' || $page_name == 'log.php?type=power&&meter=U_10' || $page_name == 'log.php?type=power&&meter=U_11' || $page_name == 'log.php?type=power&&meter=U_12' || $page_name == 'log.php?type=power&&meter=U_13' || $page_name == 'log.php?type=power&&meter=U_14' || $page_name == 'log.php?type=power&&meter=U_15' || $page_name == 'log.php?type=power&&meter=U_16' || $page_name == 'log.php?type=power&&meter=U_17' || $page_name == 'log.php?type=energy&&meter=U_1' || $page_name == 'log.php?type=energy&&meter=U_2' || $page_name == 'log.php?type=energy&&meter=U_3' || $page_name == 'log.php?type=energy&&meter=U_4' || $page_name == 'log.php?type=energy&&meter=U_5' || $page_name == 'log.php?type=energy&&meter=U_6' || $page_name == 'log.php?type=energy&&meter=U_7' || $page_name == 'log.php?type=energy&&meter=U_8' || $page_name == 'log.php?type=energy&&meter=U_9' || $page_name == 'log.php?type=energy&&meter=U_10' || $page_name == 'log.php?type=energy&&meter=U_11' || $page_name == 'log.php?type=energy&&meter=U_12' || $page_name == 'log.php?type=energy&&meter=U_13' || $page_name == 'log.php?type=energy&&meter=U_14' || $page_name == 'log.php?type=energy&&meter=U_15' || $page_name == 'log.php?type=energy&&meter=U_16' || $page_name == 'log.php?type=energy&&meter=U_17' || $page_name == 'log_detail.php?meter=U_1&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_2&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_3&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_4&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_5&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_6&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_7&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_8&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_9&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_10&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_11&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_12&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_13&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_14&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_15&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_16&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_17&val=active_power&type=power' || $page_name == 'log_detail.php?meter=U_1&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_2&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_3&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_4&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_5&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_6&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_7&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_8&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_9&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_10&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_11&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_12&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_13&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_14&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_15&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_16&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_17&val=reactive_power&type=power' || $page_name == 'log_detail.php?meter=U_1&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_2&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_3&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_4&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_5&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_6&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_7&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_8&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_9&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_10&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_11&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_12&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_13&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_14&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_15&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_16&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_17&val=apparent_power&type=power' || $page_name == 'log_detail.php?meter=U_1&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_2&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_3&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_4&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_5&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_6&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_7&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_8&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_9&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_10&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_11&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_12&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_13&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_14&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_15&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_16&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_17&val=harmonics&type=power' || $page_name == 'log_detail.php?meter=U_1&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_2&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_3&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_4&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_5&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_6&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_7&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_8&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_9&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_10&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_11&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_12&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_13&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_14&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_15&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_16&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_17&val=active_energy&type=energy' || $page_name == 'log_detail.php?meter=U_1&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_2&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_3&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_4&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_5&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_6&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_7&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_8&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_9&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_10&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_11&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_12&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_13&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_14&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_15&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_16&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_17&val=rective_energy&type=energy' || $page_name == 'log_detail.php?meter=U_1&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_2&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_3&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_4&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_5&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_6&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_7&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_8&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_9&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_10&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_11&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_12&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_13&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_14&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_15&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_16&val=apparent_energy&type=energy' || $page_name == 'log_detail.php?meter=U_17&val=apparent_energy&type=energy') {
                                echo 'active';
                            } ?>">
                    <a href="unit1.php" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-sitemap fa-lg" style="color: white"></i><b>FC</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main" style="color: white">Unit 1
                            (SLD)</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="<?php if ($page == 'unit2_oneline.php' || $page == 'meter_diagram_unit2.php' || $page == 'log_unit2.php' || $page == 'log_detailunit2.php') {
                                echo 'active';
                            } ?>">
                    <a href="unit2_oneline.php" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-sitemap fa-lg" style="color: white"></i><b>FC</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main" style="color: white">Unit 2
                            (SLD)</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <!-- <li class="<?php //if ($page == 'oneline.php' || $page == 'diagram.php' || $page == 'meter_diagram_unit2.php' || $page == 'log_unit2.php' || $page == 'log_detailunit2.php') {
                                //echo 'active';
                                // } 
                                ?>">
                    <a href="oneline.php" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-sitemap fa-lg"
                                style="color: white"></i><b>FC</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main" style="color: white">Area
                            Wise (Unit 2)</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li> -->
            </ul>
            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation" style="color: #1434A4;font-size:medium">Alarms
            </div>
            <ul class="pcoded-item">
                <li class="pcoded-hasmenu <?php if ($page == 'alarm_u1.php' || $page == 'recent.php' || $page == 'alarm_limit.php' || $page == 'config.php' || $page == 'phase-alarm.php' || $page == 'Today.php' || $page == '2days.php' || $page == '3days.php' || $page == '5days.php' || $page == '7days.php' || $page == '15days.php' || $page == '30days.php' || $page == '60days.php' || $page == '90days.php' || $page == '6months.php') {
                                                echo 'pcoded-trigger ';
                                            }  ?>">
                    <a href="#" class="waves-effect waves-dark  <?php if ($page == 'alarm_u1.php' || $page == 'recent.php' || $page == 'alarm_limit.php' || $page == 'config.php' || $page == 'phase-alarm.php' || $page == 'Today.php' || $page == '2days.php' || $page == '3days.php' || $page == '5days.php' || $page == '7days.php' || $page == '15days.php' || $page == '30days.php' || $page == '60days.php' || $page == '90days.php' || $page == '6months.php') {
                                                                    echo 'active';
                                                                } ?>">
                        <span class="pcoded-micon"><i class="fa fa-bell" style=" font-size: large;"></i><b></b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Unit 1</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">

                        <li class=" <?php if ($page == 'alarm_u1.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="alarm_u1.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-bell" style="color: White"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">All Alarms</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'recent.php' || $page == 'Today.php' || $page == '2days.php' || $page == '3days.php' || $page == '5days.php' || $page == '7days.php' || $page == '15days.php' || $page == '30days.php' || $page == '60days.php' || $page == '90days.php' || $page == '6months.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="recent.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-dollar fa-lg" style="color: red"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Recent Alarms</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class=" <?php if ($page == 'alarm_limit.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="alarm_limit.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-bell" style="color: White"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Alarms Limit</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu <?php if ($page == 'alarm_u2.php' || $page == 'recent_u2.php' || $page == 'alarm_limit2.php' || $page == 'config.php' || $page == 'phase-alarm.php' || $page == 'Today_u2.php' || $page == '2days.php' || $page == '3days.php' || $page == '5days.php' || $page == '7days_u2.php' || $page == '15days_u2.php' || $page == '30days_u2.php' || $page == '60days.php' || $page == '90days.php' || $page == '6months.php') {
                                                echo 'pcoded-trigger ';
                                            }  ?>">
                    <a href="#" class="waves-effect waves-dark  <?php if ($page == 'alarm_u2.php' || $page == 'recent_u2.php' || $page == 'alarm_limit2.php' || $page == 'config.php' || $page == 'phase-alarm.php' || $page == 'Today_u2.php' || $page == '2days.php' || $page == '3days.php' || $page == '5days.php' || $page == '7days_u2.php' || $page == '15days_u2.php' || $page == '30days_u2.php' || $page == '60days.php' || $page == '90days.php' || $page == '6months.php') {
                                                                    echo 'active';
                                                                } ?>">
                        <span class="pcoded-micon"><i class="fa fa-bell" style=" font-size: large;"></i><b></b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Unit 2 </span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">

                        <li class=" <?php if ($page == 'alarm_u2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="alarm_u2.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-bell" style="color: White"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">All Alarms</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'recent_u2.php' || $page == 'Today_u2.php' || $page == '2days.php' || $page == '3days.php' || $page == '5days.php' || $page == '7days_u2.php' || $page == '15days_u2.php' || $page == '30days_u2.php' || $page == '60days.php' || $page == '90days.php' || $page == '6months.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="recent_u2.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-dollar fa-lg" style="color: red"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Recent Alarms</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class=" <?php if ($page == 'alarm_limit2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="alarm_limit2.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-bell" style="color: White"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Alarms Limit</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="pcoded-navigation-label" data-i18n="nav.category.forms" style="color:#1434A4;font-size:medium">
                Trends</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="<?php if ($page == 'customize_trends.php') {
                                echo 'active';
                            } ?>">
                    <a href="customize_trends.php" class="waves-effect waves-dark">
                        <span class="pcoded-micon"> <i class="fa fa-line-chart fa-lg" style="color: white"></i><b>FC</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main" style="color: white">Customized
                            Trends</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            <div class="pcoded-navigation-label" data-i18n="nav.category.other" style="color: #1434A4;font-size:medium">
                Reports</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="nav-item pcoded-hasmenu  <?php if ($page == 'energy_usage_hourly_u1.php' || $page == 'energy_usage_hourly_report1.php' || $page == 'energy_cost.php' || $page == 'energy_report.php' || $page == 'energy_usage.php' || $page == 'energy_usage_report.php' || $page == 'energy_production.php' || $page == 'energy_production_report.php' || $page == 'add-prduction.php') {
                                                        echo 'pcoded-trigger ';
                                                    }  ?>">
                    <a href="#" class="waves-effect waves-dark nav-link <?php if ($page == 'energy_usage_hourly_u1.php' || $page == 'energy_usage_hourly_report1.php' || $page == 'energy_cost.php' || $page == 'energy_usage.php' || $page == 'energy_usage_report.php' || $page == 'energy_production.php' || $page == 'energy_production_report.php' || $page == 'add-prduction.php' || $page == 'energy_report.php') {
                                                                            echo 'active';
                                                                        } ?>">
                        <span class="pcoded-micon"><i class="fa fa-file fa-lg" style="color: white"></i><b></b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Unit 1</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="<?php if ($page == 'energy_cost.php' || $page == 'energy_report.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="energy_cost.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-file fa-lg" style="color: white"></i><b>M</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.main" style="color: black">Energy
                                    Cost
                                    Report</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'energy_usage.php' || $page == 'energy_usage_report.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="energy_usage.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-file fa-lg" style="color: white"></i><b>M</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.main" style="color: black">Energy
                                    Usage
                                    Report</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'energy_usage_hourly_u1.php' || $page == 'energy_usage_hourly_report1.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="energy_usage_hourly_u1.php" class="waves-effect waves-dark">
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Hourly Energy Usage Report</span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'energy_production.php' || $page == 'energy_production_report.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="energy_production.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-file fa-lg" style="color: white"></i><b>M</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.main" style="color: black">Customized
                                    Report</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'add-prduction.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="add-prduction.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-file fa-lg" style="color: white"></i><b>M</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.main" style="color: black">Add
                                    Production</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu  <?php if ($page == 'energy_usage2.php' || $page == 'energy_cost_unit2.php' || $page == 'energy_usage_report2.php' || $page == 'energy_cost_report_unit2.php' || $page == 'add-prduction2.php' || $page == 'energy_production2.php' || $page == 'energy_production_report2.php' || $page == 'energy_usage_hourly_u2.php' || $page == 'energy_usage_hourly_report2.php') {
                                                        echo 'pcoded-trigger ';
                                                    }  ?>">
                    <a href="#" class="waves-effect waves-dark nav-link <?php if ($page == 'energy_usage2.php' || $page == 'energy_cost_unit2.php' || $page == 'energy_usage_report2.php' || $page == 'energy_cost_report_unit2.php' || $page == 'add-prduction2.php' || $page == 'energy_production2.php' || $page == 'energy_production_report2.php' || $page == 'energy_usage_hourly_u2.php' || $page == 'energy_usage_hourly_report2.php') {
                                                                            echo 'active';
                                                                        } ?>">
                        <span class="pcoded-micon"><i class="fa fa-file fa-lg" style="color: white"></i><b></b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Unit 2</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="<?php if ($page == 'energy_cost_unit2.php' || $page == 'energy_cost_report_unit2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="energy_cost_unit2.php" class="waves-effect waves-dark">

                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Energy Cost Report</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'energy_usage2.php' || $page == 'energy_usage_report2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="energy_usage2.php" class="waves-effect waves-dark">
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Energy Usage Report</span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'energy_usage_hourly_u2.php' || $page == 'energy_usage_hourly_report2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="energy_usage_hourly_u2.php" class="waves-effect waves-dark">
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main" style="color: black">Hourly Energy Usage Report</span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'energy_production2.php' || $page == 'energy_production_report2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="energy_production2.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-file fa-lg" style="color: white"></i><b>M</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.main" style="color: black">Customized
                                    Report</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?php if ($page == 'add-prduction2.php') {
                                        echo 'active';
                                    } ?>">
                            <a href="add-prduction2.php" class="waves-effect waves-dark">

                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.main" style="color: black">Add
                                    Production</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="pcoded-navigation-label" data-i18n="nav.category.other" style="color: #1434A4;font-size:medium">
                User Managment
            </div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="<?php if ($page == 'user.php') {
                                echo 'active';
                            } ?>">
                    <a href="user.php" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-user fa-lg" aria-hidden="true" style="color: white"></i><b>M</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.main" style="color: white">Add User</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="<?php if ($page == 'view_user.php' || $page == 'edit.php') {
                                echo 'active';
                            } ?>">
                    <a href="view_user.php" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa fa-users fa-lg" style="color: white"></i><b>M</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.main" style="color: white">View
                            User</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="../assets/js/vendor-all.min.js">
</script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js">
</script>
<script src="../assets/js/pcoded.min.js">
</script>