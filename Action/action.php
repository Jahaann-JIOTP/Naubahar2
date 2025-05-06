<?php
session_start();
include('connection.php');

  $email = $_POST['email']; 
  $pass= $_POST['password'];
  $result = mysqli_query($con,"SELECT * FROM accounts WHERE email = '$email' and pass='$pass'"); 
  if(mysqli_num_rows($result)>0) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION["auth"]=$row["id"];
  $_SESSION["user"]=$email;
$_SESSION["stat"]=$row["status"];
$_SESSION["name"]=$row["name"];
$_SESSION["user_level"]=$row["user_level"];
$_SESSION["pass"]=$row["pass"];
  $_SESSION["on"]="Login Successfully";
  header('location: ../home.php');
}
else
{
    $_SESSION["in"]="Invalid email/Password";
    header("location:../index.php");
}    
?>