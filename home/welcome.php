<?php 

$header = include '../view/header.php'; 
echo $header;

session_start();

$session = $_SESSION['login']; 

echo "<h1>Welcome ". $session . "!</h1>";
echo "<a class='nav-link href='../auth/signout.php'>Sign Out</a>";


$footer = include '../view/footer.php'; 
echo $footer;