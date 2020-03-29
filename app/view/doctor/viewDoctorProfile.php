<body>
<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to doctors
require_once('../../includes/doctorAccess.php');

//include all of the controllers and models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/doctor.class.php';
include '../../controller/doctorcontroller.php';

//Get the Doctor profile data
$doctor = new DoctorController();
$doctorDetails = $doctor->getDoctorProfile($_SESSION['loginid']);

?>

<h3>Doctor Full Name:</h5>
<p><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></p>

<h3>Doctor Specialization:</h5>
<p><?php echo $doctorDetails['DoctorSpecialization']; ?></p>

<h3>Doctor's Clinic Address:</h3>
<p><?php echo $doctorDetails['DoctorClinicAddress']; ?></p>

<h3>Doctor's Consultancy Fee:</h3>
<p><?php echo $doctorDetails['DoctorClinicAddress']; ?></p>

<h3>Doctor Phone:</h3>
<p><?php echo $doctorDetails['DoctorPhone']; ?></p>

<h3>Doctor Email:</h3>
<p><?php echo $doctorDetails['DoctorEmail']; ?></p>

