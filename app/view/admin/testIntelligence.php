<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to patients
require_once('../../includes/adminAccess.php');

//include all of the controllers and models
include '../../model/database.class.php';
include '../../model/system.class.php';
include '../../controller/systemcontroller.php';
 
 $testIntel = new SystemController();

 $testIntel->checkExamResults('efb735ba-c3d8-441e-98bc-1d30d614ebf2');

?>