<body>
<?php 

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../includes/sessionCheck.php');

//include all of the controllers and models
include '../model/database.class.php';
include '../model/account.class.php';
include '../model/patient.class.php';
include '../controller/accountcontroller.php';
include '../controller/patientcontroller.php';

//Include the page header
include '../view/partials/header.php'; 

//If a use is signed in, 
if(isset($_SESSION['signedin'])){
    $patient = new PatientController();
    $patientDetails = $patient->getPatientProfile($_SESSION['loginid']);
}

//Log the user out on click
if(isset($_GET['action']) && $_GET['action'] != ""){
    $account = new AccountController();
    $account->logout();
}
?>

<a href="?action=signout">Sign Out</a>

<h1>Welcome <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></h1>

<a href="viewPatientProfile.php">View your profile</a>
<br/>
<a href="editPatientProfile.php">Edit your profile</a>

<?php include '../view/partials/footer.php'; ?>

