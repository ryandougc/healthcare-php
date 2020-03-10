<?php
session_start();

if(isset($_SESSION['signedin'])){
    header('location: home/welcome.php');
}


?>

<a href="signinpage.php">Sign in</a>
<a href="signuppage.php">Sign up</a>