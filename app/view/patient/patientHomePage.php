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
include '../../controller/accountcontroller.php';
include '../../controller/patientcontroller.php'; 

//If a use is signed in, 
if(isset($_SESSION['signedin'])){
    $patient = new PatientController();
    $patientDetails = $patient->getPatientProfile($_SESSION['loginid']);
}

//Log the user out on clickz
if(isset($_GET['action']) && $_GET['action'] == "signout"){
    $account = new AccountController();
    $account->logout();
}
?>

<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Healthcare</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="patientHomePage.php">Home</a>
                </li>
                <li>
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
                    <a href="?action=signout">Sign Out</a>
                </div>
            </nav>
            <h1>Welcome <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></h1>

            <a href="viewPatientProfile.php">View your profile</a>
            <br/>
            <a href="editPatientProfile.php">Edit your profile</a>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

<?php include '../../view/partials/footer.php'; ?>

