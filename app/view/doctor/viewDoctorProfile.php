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

?>

<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Healthcare</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="patientHomePage.php">Home</a>
                </li>
                <li class="active">
                    <a href="viewPatientProfile.php">Profile</a>
                </li>
                <li>
                    <a href="editPatientProfile.php">Change Profile</a>
                </li>
                <li>
                    <a href="">Visits</a>
                </li>
                <li>
                    <a href="">Exams</a>
                </li>
                <li>
                    <a href="">Exam Results</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>

            <h1 class="h2 mb-3 font-weight-normal"><strong><u>Doctor Full Name:</u></strong></h1>
            <p><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></p>

            <h3>Doctor Specialization:</h3>
            <p><?php echo $doctorDetails['DoctorSpecialization']; ?></p>

            <h3>Doctor's Clinic Address:</h3>
            <p><?php echo $doctorDetails['DoctorClinicAddress']; ?></p>

            <h3>Doctor's Consultancy Fee:</h3>
            <p><?php echo $doctorDetails['DoctorConsultancyFee']; ?></p>

            <h3>Doctor Phone:</h3>
            <p><?php echo $doctorDetails['DoctorPhone']; ?></p>

            <h3>Doctor Email:</h3>
            <p><?php echo $doctorDetails['DoctorEmail']; ?></p>
        </div>
    </div>

<?php include '../../view/partials/footer.php'; ?>