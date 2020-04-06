<?php
//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
require_once('../../includes/doctorAccess.php');

//Models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/clinic.class.php';


//Controllers
include '../../controller/accountcontroller.php';
include '../../controller/doctorController.php';
include '../../controller/cliniccontroller.php';

//Header
include '../partials/header.php';
//NavBar with Logout
include '../../view/doctor/doctorNavBar.php';

?>







<?php include '../../view/partials/footer.php'; ?>