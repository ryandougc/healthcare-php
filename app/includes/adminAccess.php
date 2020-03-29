<?php
if($_SESSION['accType'] !== "Admin"){
    header('location: /healthcare-php/app/view/signinpage.php?message=noAccess'); //Change this to rerouting
}