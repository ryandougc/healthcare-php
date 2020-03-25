<?php 

require('../includes/patientAccess.php');

include '../model/database.class.php';
include '../model/account.class.php';
include '../model/patient.class.php';
include '../controller/accountcontroller.php';
include '../controller/patientcontroller.php';


include '../view/partials/header.php'; 


if(isset($_SESSION['signedin'])){
    echo $_SESSION['loginid'];
    $patient = new PatientController();
    $patientDetails = $patient->getPatientProfile($_SESSION['loginid']);
}

if(isset($_GET['action']) && $_GET['action'] != ""){
    $account = new AccountController();
    $account->logout();
}

?>

<a href="?action=signout">Sign Out</a>

<h1>Welcome <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></h1>

<a href="">View your profile</a>

<?php include '../view/partials/footer.php'; ?>

