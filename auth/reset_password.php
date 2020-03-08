<?php
session_start();
//error_reporting(0);
// Code for updating Password
if(isset($_POST['change']))
{
$cno=$_SESSION['cnumber'];
$email=$_SESSION['email'];
$newpassword=md5($_POST['password']);
$query=mysqli_query($con,"update doctors set password='$newpassword' where contactno='$cno' and docEmail='$email'");
if ($query) {
echo "<script>alert('Password successfully updated.');</script>";
echo "<script>window.location.href ='index.php'</script>";
}

}


?>