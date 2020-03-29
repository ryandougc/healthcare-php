<?php
session_start();

if(!isset($_SESSION['signedin'])){
    header('location: /healthcare-php/app/view/signinpage.php?message=mustSignin');
    exit();
}
