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

//Log the user out on click
if(isset($_GET['action']) && $_GET['action'] == "signout"){
    $account = new AccountController();
    $account->logout();
}

include '../../view/patient/patientNavBar.php';
?>
        
            <h1>Welcome: <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></h1>
        </div>
    </div>

<?php include '../../view/partials/footer.php'; ?>

