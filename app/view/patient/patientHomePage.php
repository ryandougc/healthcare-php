<?php 

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to patients
require_once('../../includes/patientAccess.php');

//include all of the controllers and models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/patient.class.php';
include '../../controller/accountcontroller.php';
include '../../controller/patientcontroller.php'; 
include '../partials/header.php';
?>


<?php include '../../view/partials/footer.php'; ?>

