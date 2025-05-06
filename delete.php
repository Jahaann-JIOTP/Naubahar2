<?php

session_start();
$Value = $_GET['id']; // get id through query string
$con = mysqli_connect('65.0.16.20', 'root', '','alarms');
$del = mysqli_query($con,"DELETE FROM record WHERE   Value  = '$Value'");
{
    $_SESSION['sucessfully']="Alarm Deleted Sucessfully"; // delete query
    header('location:alarm_u1.php');
}

?>