<?php
$servername = "65.0.16.20";
$username = "jahaann";
$password = "Jahaann#321";
$database="naubahar_project";
// $jan = $_POST["January"];
// $feb = $_POST["February"];
// $mar = $_POST["March"];
// $apr = $_POST["April"];
// $may = $_POST["May"];
// $jun = $_POST["June"];
// $jul = $_POST["July"];
// $aug = $_POST["August"];
// $sep = $_POST["September"];
// $oct = $_POST["October"];
// $nov = $_POST["November"];
// $dec = $_POST["December"];


// Create connection
$conn = new mysqli($servername, $username, $password,$database);
    if(count($_POST)>0) {
mysqli_query($conn,"UPDATE terif set January='" . $_POST['January'] . "', February='" . $_POST['February'] . "', March='" . $_POST['March'] . "', April='" . $_POST['April'] . "' ,May='" . $_POST['May'] . "', June='" . $_POST['June'] ."',July='" . $_POST['July'] . "',August='" . $_POST['August'] . "',September='" . $_POST['September'] . "',October='" . $_POST['October'] . "',November='" . $_POST['November'] . "',December='" . $_POST['December'] . "' WHERE test='" . $_POST['test'] . "'");
header('location:energy_production.php');
}

$result = mysqli_query($conn,"SELECT * FROM terif");
$row= mysqli_fetch_array($result);
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
// $sql = "INSERT INTO terif (January, February, March, April, May, June, July, August, September, October, November, December)
// VALUES ('$jan', '$feb', '$mar', '$apr', '$may', '$jun', '$jul', '$aug', '$sep', '$oct', '$nov', '$dec')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>