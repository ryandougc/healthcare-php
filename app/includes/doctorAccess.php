<?php
if($_SESSION['accType'] !== "Doctor"){
    header('location: ?message=noAccess'); //Change this to rerouting
}