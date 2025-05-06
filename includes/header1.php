<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        input[type=submit] {
            padding: 5px 15px;
            /* background:#555;  */
            border: 0 none;
            cursor: pointer;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            /* margin-left: 200px; */
            margin-top: 0 none;
            appearance: none;
            background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
            border: 0;
            border-radius: 6px;
            box-shadow: rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, rgba(58, 65, 111, .5) 0 -3px 0 inset;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        .led-box {
            height: 30px;
            width: 100%;
            margin: 10px 0;
            float: left;
        }

        .led-box p {
            font-size: 12px;
            text-align: center;
            color: black;
        }

        .led-green {
            margin: 0 auto;
            margin-top: 4px;
            /*  margin-top: 4px;*/
            width: 24px;
            height: 24px;
            background-color: #ABFF00;
            border-radius: 50%;
            box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #304701 0 -1px 9px, #89FF00 0 2px 12px;
        }

        .led-red {
            margin: 0 auto;
            margin-top: 4px;
            width: 24px;
            height: 24px;
            background-color: #F00;
            border-radius: 50%;
            box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 12px;
            -webkit-animation: blinkRed 0.5s infinite;
            -moz-animation: blinkRed 0.5s infinite;
            -ms-animation: blinkRed 0.5s infinite;
            -o-animation: blinkRed 0.5s infinite;
            animation: blinkRed 0.5s infinite;
        }

        @-webkit-keyframes blinkRed {
            from {
                background-color: #F00;
            }

            50% {
                background-color: #A00;
                box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;
            }

            to {
                background-color: #F00;
            }
        }

        @-moz-keyframes blinkRed {
            from {
                background-color: #F00;
            }

            50% {
                background-color: #A00;
                box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;
            }

            to {
                background-color: #F00;
            }
        }

        @-ms-keyframes blinkRed {
            from {
                background-color: #F00;
            }

            50% {
                background-color: #A00;
                box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;
            }

            to {
                background-color: #F00;
            }
        }

        @-o-keyframes blinkRed {
            from {
                background-color: #F00;
            }

            50% {
                background-color: #A00;
                box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;
            }

            to {
                background-color: #F00;
            }
        }

        @keyframes blinkRed {
            from {
                background-color: #F00;
            }

            50% {
                background-color: #A00;
                box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #441313 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;
            }

            to {
                background-color: #F00;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar header-navbar pcoded-header">
        <div class="navbar-wrapper">
            <div class="navbar-logo">
                <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                    <i class="ti-menu"></i>
                </a>
                <div class="mobile-search waves-effect waves-light">
                    <div class="header-search">
                        <div class="main-search morphsearch-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                <input type="text" class="form-control" placeholder="Enter Keyword">
                                <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="index.php" class="show">
                    <img class="img-fluid" height="40" width="150" style="padding-bottom: 20px" src="assets/images/icon.png" alt="Theme-Logo" />
                </a>
                <a class="mobile-options waves-effect waves-light">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-container container-fluid">
                <ul class="nav-left">
                    <li>
                        <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                    </li>
                    <li>
                        <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                            <i class="ti-fullscreen"></i>
                        </a>
                    </li>
                    <li>
                        <div id="load_unit2" style="margin-top: -4px;">
                            <div class="header-dots">
                                <?php
                                $conn = mysqli_connect("65.0.16.20", "jahaann", "Jahaann#321", 'status');
                                $result = $conn->query("SELECT id,status as status FROM unit_2");
                                while ($rows = $result->fetch_assoc()) {
                                    if ($rows['status'] == 'up') {
                                ?>
                                        <div class="led-box">
                                            <div class="led-green"></div>
                                            <p style="color: white;margin-top:-10px">Link Up</p>
                                        </div>
                                    <?php } else {
                                    ?>
                                        <div class="led-box">
                                            <div class="led-red"></div>
                                            <p style="color: white;margin-top:-10px">Link Down</p>
                                        </div>
                                    <?php } ?>

                                <?php }
                                ?>
                            </div>
                        </div>
                    </li>
                </ul>
                <div>
                    <ul class="nav-right">
                        <!-- //alarms li -->
                        
                        <li class="">
                            <a href="" data-toggle="modal" data-target="#feedbackFormModal" class="waves-effect waves-light" style="color: white">Feedback</a>
                            <?php include('Modal1.php'); ?>
                        </li>
                        <li class="user-profile header-notification">
                            <a href="#!" class="waves-effect waves-light">
                                <img src="assets/images/profile_pic.png" class="img-radius" alt="User-Profile-Image">
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li class="waves-effect waves-light">
                                    <a href="profile.php">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                <li class="waves-effect waves-light">
                                    <a href="Action/logout.php">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                </div>
                </li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </nav>
    <script>
        $("#myForm").submit(function(e) {
            e.preventDefault();
        });
        var form = document.getElementById("sub");

        function handleForm(event) {
            event.preventDefault();
        }
        form.addEventListener('submit', handleForm);
    </script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $("#load1").load(window.location.href + " #load1");
            }, 5000);
        });
    </script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $("#load_unit2").load(window.location.href + " #load_unit2");
            }, 5000);
        });
    </script>
</body>

</html>