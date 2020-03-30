<?php include '../partials/header.php'; ?>
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

    $results = $this->docSearchVists($VisitID);

    foreach($results as $result){
        echo $result['VisitID'].'<br>';
        echo $result['DoctorID'].'<br>';
        echo $result['ClinicID'].'<br>';
        echo $result['PatientID'].'<br>';
        echo $result['VisitDate'].'<br>';
        echo $result['Prescription'].'<br>';
        echo $result['DoctorNotes'].'<br>';
        echo $result['SuggestedExam'].'<br>';
    }