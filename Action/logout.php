<?php
 session_start();
 if(!isset($_SESSION['use']))
{
  // not logged in
  header('Location:../index.php');
}
 session_destroy();
echo "<script language='javascript' type='text/javascript'>";
echo "alert('Logout successfully');";
echo "</script>";
  // echo "Logout Successfully ";

$URL="../index.php";
echo "<script>location.href='$URL'</script>";

     // function that Destroys Session 

  // header("Location: index.php");
  // header('Location: /index.php?msg=' . urlencode(base64_encode("You have been successfully logged out!")));
  // header('location: index.php?status=logout');
?>