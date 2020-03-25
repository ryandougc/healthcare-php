<?php
if($_SESSION['accType'] !== "Patient"){
    header('location: ?message=noAccess'); //Change this to rerouting
}