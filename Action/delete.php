<?php
session_start();
include('connection.php');
$id=$_GET['id'];
$result = mysqli_query($con,"DELETE FROM accounts WHERE id='$id';");
$_SESSION["sucessfully"]="User Deleted";
echo "</script>";
$URL="../view_user.php";
echo "<script>location.href='$URL'</script>";
?>