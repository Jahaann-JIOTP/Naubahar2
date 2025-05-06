<?php
include('connection.php');
session_start();
 $UserName=$_POST['name'];
 $Email=$_POST['email'];
 $Password=$_POST['password'];
 $usertype=$_POST['type'];
 $userlevel=$_POST['level'];

    $sql = "SELECT * FROM accounts  WHERE email = '$Email'";
    $result = mysqli_query($con, $sql);

if (mysqli_num_rows($result)>0)
{

$_SESSION['registered']="Email already registered";
	header('location:../user.php');

}
else{
$sql = "INSERT INTO accounts (name, email, pass, user_level, status ) VALUES ('$UserName', '$Email', '$Password' , '$usertype' , '$userlevel')";
$_SESSION['registered']="successfully registered";
	header('location:../user.php');
}
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>