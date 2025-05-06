<?php
include('connection.php');
session_start(); 
 if (isset($_POST['upload'])) {
 $filename = $_FILES["uploadfile"]["name"];
 $tempname = $_FILES["uploadfile"]["tmp_name"];    
 $folder = "uploads/".$filename;  
$company = $_POST['com'];
$country = $_POST['coun'];
$Description = $_POST['des'];
$Address = $_POST['addr'];
$Phone = $_POST['phone'];
$Cell = $_POST['cell'];
$id=$_SESSION["auth"];
$email=$_SESSION["user"];
$name=$_SESSION["name"];
$status=$_SESSION["stat"];
$userlevel=$_SESSION["user_level"];
$password=$_SESSION["pass"];
}
$result = mysqli_query($con,"SELECT * FROM accounts WHERE  id= '$id'");
$row = mysqli_fetch_assoc($result);
if (empty($_POST['addr'])) {
  $Address=$row["address"];
}
else{
  $Address=$Address;
}
if (empty($company)) {
  $company=$row["company"];
}
else{
  $company=$company;
}
if (empty($country)) {
  $country=$row["country"];
}
else{
  $country=$country;
}
if (empty($Cell)) {
  $Cell=$row["cell"];
}
else{
  $Cell=$Cell;
}
if (empty($Phone)) {
  $Phone=$row["phone"];
}
else{
  $Phone=$Phone;
}
if (empty($Description)) {
  $Description=$row["description"];
}
else{
  $Description=$Description;
}
if (empty($filename)) {
    $filename=$row["avatar"];
   }
   else{
    $filename=$filename;
   }

mysqli_query($con,"UPDATE accounts set id='$id', email='$email', name='$name', status='$status', user_level='$userlevel' , pass='$password', avatar='$filename', company='$company',country='$country',description='$Description',address='$Address',phone='$Phone',cell='$Cell' WHERE id='$id'");
 if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
    $_SESSION['sucessfully']="Your Information Uploaded sucessfully"; // delete query
    header("location:../profile.php");
?>	