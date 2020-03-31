<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to patients
require_once('../../includes/doctorAccess.php');

//include all of the controllers and models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/doctor.class.php';
include '../../controller/accountcontroller.php';
include '../../controller/doctorController.php';

//Include the page header
include '../../view/partials/header.php'; 

//Include the navBar
include '../../view/doctor/doctorNavBar.php';

?>








<?php include '../../view/partials/footer.php'; ?>