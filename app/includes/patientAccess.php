<?php
if($_SESSION['accType'] !== "Patient"){
    header('location: /healthcare-php/app/view/noAccess.php'); //Change this to rerouting
}