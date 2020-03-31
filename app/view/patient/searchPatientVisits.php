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

include '../../view/patient/patientNavBar.php';
?>
            <h1 class="h2 mb-3 font-weight-normal"><strong><u>Visit Search</u></strong></h1>

            <!--Search bar-->
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" action="search.php">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-200" type="search" placeholder="Search" aria-label="Search">
            </form>

        </div>
    </div>

<?php include '../partials/footer.php'; ?>

