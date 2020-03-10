<?php

include 'includes/class-autoload.inc.php';

session_start();

if(isset($_SESSION['signedin'])){
    header('location: home/welcome.php');
}else {
    header('location: auth/index.php');
}

?>

