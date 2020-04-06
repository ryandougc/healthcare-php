<?php include '../partials/header.php'; ?>
<body>
<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to patients
require_once('../../includes/patientAccess.php');

//include all of the controllers and models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/patient.class.php';
include '../../controller/patientcontroller.php';

//Get the patient profile data
$patient = new PatientController();
$patientDetails = $patient->getPatientProfile($_SESSION['loginid']);

//not too sure how this bit would connect to the rest
/*if (isset($_POST['search'])) {
    require "3-search.php";
  }*/

include '../../view/patient/patientNavBar.php';
?>
            <h1 class="h2 mb-3 font-weight-normal"><strong><u>Visit Form</u></strong></h1>

        </div>
    </div>

<?php include '../partials/footer.php'; ?>

