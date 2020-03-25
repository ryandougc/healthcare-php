<?php

session_start();

if($_SESSION['accType'] !== "Staff"){
    header('location: ?message=noAccess'); //Change this to rerouting
}