<?php
session_start();

if(isset($_SESSION['signedin'])){
    header('location: ../app/view/welcome.php');
}

?>

<a href="../app/view/signinpage.php">Sign in</a>
<a href="../app/view/signuppage.php">Sign up</a>