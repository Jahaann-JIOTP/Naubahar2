<?php
include('connection.php');
session_start();
$con=mysqli_connect("65.0.16.20","jahaann","Jahaann#321","naubahar_project");
mysqli_query($con,"UPDATE accounts set id='" . $_POST['id'] . "', name='" . $_POST['name'] . "', email='" . $_POST['email'] . "', pass='" . $_POST['password'] . "' ,user_level='" . $_POST['type'] . "', status='" . $_POST['level'] . "' WHERE id='" . $_POST['id'] . "'");
    $_SESSION['use']="User Updated sucessfully"; // delete query
    header('location:../view_user.php');

$result = mysqli_query($con,"SELECT * FROM accounts WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>