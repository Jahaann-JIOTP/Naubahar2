<?php

date_default_timezone_set("Asia/Karachi");
$servername = "65.0.16.20";
$username = "jahaann";
$password = "Jahaann#321";
$database = "naubahar_project";

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = '2024-7-17';
    $productionValue = 16134;

    $sql = "UPDATE production SET `$date` = $productionValue";

    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }
// }
echo "test";
$con->close();
?>