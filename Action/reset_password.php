<?php
session_start();
if(!isset($_SESSION['use']))
{
  // not logged in
  header('Location:../index.php');
}
$con=mysqli_connect("65.0.16.20","jahaann","Jahaann#321","naubahar_project");
  $user_name = $_POST['user-name']; 
  $email = $_POST['email']; 
  $pass = $_POST['password'];
  $result = mysqli_query($con,"SELECT * FROM accounts WHERE email = '$email' and name='$user_name'"); 
  if(mysqli_num_rows($result)>0) {
  $row = mysqli_fetch_assoc($result);
  $result = mysqli_query($con,"UPDATE accounts SET pass='$pass' WHERE name='$user_name' AND email = '$email'");
  $_SESSION["on"]="Password Updated Successfully";
  header('location: ../forgot_password.php');
}
else
{
    $_SESSION["on"]="This email or Name is not Registered";
    header("location: ../forgot_password.php");
}    
?>