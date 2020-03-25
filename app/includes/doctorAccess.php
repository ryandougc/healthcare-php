<?php

session_start();

if($_SESSION['accType'] !== "Doctor"){
    header('location: ?message=noAccess'); //Change this to rerouting
}