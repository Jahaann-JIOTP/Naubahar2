<li class="header-notification" id="load1">
                            <a href="#!" class="waves-effect waves-light">
                                <!-- //bell ring  main// -->
                                <?php
                                // Create connection
                                $conn = mysqli_connect("65.0.16.20", "jahaann", "Jahaann#321", "alarms_unit2");

                                // $result = $conn->query("SELECT Source,Status,Value, count(Source) as alarms FROM bell_unit2");
                                $result = $conn->query("SELECT MAX(Source) as Source, MAX(Status) as Status, MAX(Value) as Value, COUNT(Source) as alarms FROM bell_unit2");
                                if (isset($_POST['submit_button'])) {
                                    mysqli_query($conn, 'TRUNCATE TABLE `bell_unit2`');
                                    mysqli_query($conn, 'TRUNCATE TABLE `bell_results_unit2`');
                                }
                                while ($rows = $result->fetch_assoc()) {

                                    // echo $rows['Status'];
                                    if ($rows['alarms'] == 0) {
                                        echo '<i class="fa fa-bell" style="font-size:25px;color:White"></i>';
                                    } else {
                                        echo '<img src="assets\output-onlinegiftools(3).GIF" style="width:40px">';
                                        // echo "<audio src='http://freesoundeffect.net/sites/default/files/electronic-alarm-loop--4-sound-effect-21649170.mp3'  autoplay ></audio>";
                                    }

                                    mysqli_close($conn);

                                ?>
                                    <!-- //bell ring  main end// -->
                            </a>
                            <ul class="show-notification" style="width:400px;">
                                <li>
                                    <h6>Alarms</h6>
                                    <label class="label label-danger">New</label>
                                </li>
                                <!-- //Acknowledge Button// -->
                                <li>
                                    <?php
                                    if ($rows['alarms'] == 0) {
                                        echo ' <i style="font-size:20px;color:Black"><i class="fa fa-bell" 
                                style="font-size:20px;color:Blue"></i>   No Alarm....</i>';
                                    } else {
                                        echo '<i style="font-size:20px;color:Red"></i>';
                                        echo "<form id='myForm' action='' method='POST'>
                                <input type='submit'  name='submit_button' value='Acknowledge' 
                                id='submit1''></input>
                                </form>";
                                    }

                                    ?>
                                <?php } ?>
                                </li>
                                <!-- //Acknowledge Button end// -->
                                <li>
                                    <?php
                                    // Create connection
                                    $conn = mysqli_connect("65.0.16.20", "jahaann", "Jahaann#321", "alarms_unit2");
                                    // Check connection
                                    $result = $conn->query("SELECT *  FROM bell_results_unit2 ORDER BY Time DESC LIMIT 5");
                                    while ($rows = $result->fetch_assoc()) {
                                    ?>
                                        <!-- // Main LT// -->
                                        <a href="#" class="dropdown-item" style="font-size:13px;">
                                            <!-- \voltage -->
                                            <?php
                                            // second bell //
                                            if ($rows['Status'] == 'Low Power Factor' || $rows['Status'] == 'Low Voltage') { ?>
                                                <img src="assets\output-onlinegiftools(1).GIF" alt="" height="30px" width="5px">
                                            <?php } elseif ($rows['Status'] == 'High Current' || $rows['Status'] == 'High Voltage') { ?>
                                                <img src="assets\output-onlinegiftools(3).GIF" alt="" height="30px" width="5px">
                                            <?php } ?>
                                            <!-- // second bell end // -->

                                            <?php echo $rows['Source']; ?><br>
                                            <?php echo $rows['Status']; ?>

                                            <span class="float-right text-muted text-sm"><?php
                                                                                            date_default_timezone_set('Asia/Karachi');
                                                                                            echo $rows['Time'];
                                                                                            ?></span>
                                            <hr>
                                        <?php } ?>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <!-- \voltage -->
                                            <a href="recent_u2.php" class="dropdown-item">
                                                <p class="text-center">
                                                    <h4 class="text-center"><b>Details</b></h4>
                                                </p>
                                                <!--  <span class="float-right text-muted text-sm">2 days</span> -->
                                            </a>
                                        </a>
                                </li>
                            </ul>
                        </li>