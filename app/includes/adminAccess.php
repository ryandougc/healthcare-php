<?php
if($_SESSION['accType'] !== "Admin"){
    header('location: ?message=noAccess'); //Change this to rerouting
}