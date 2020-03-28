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

?>

<h3>Patient Full Name:</h5>
<p><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></p>

<h3>Patient Phone:</h3>
<p><?php echo $patientDetails['PatientPhone']; ?></p>

<h3>Patient Email:</h3>
<p><?php echo $patientDetails['PatientEmail']; ?></p>

<h3>Patient Address:</h3>
<p><?php echo $patientDetails['PatientAddress']; ?></p>

<h3>Patient Email Notifications:</h3>
<p><?php if($patientDetails['EmailNotifications'] == 1){ echo "True"; } else{ echo "False"; } ?></p>