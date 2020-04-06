<?php include '../partials/header.php'; ?>
<body>
<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to patients
require_once('../../includes/adminAccess.php');

//include all of the controllers and models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/admin.class.php';
include '../../controller/accountcontroller.php';
include '../../controller/admincontroller.php';
 
// $admin = new AdminController();
// $patientDetails = $admin->getPatientProfile($_SESSION['loginid']);


//Log the user out on click
if(isset($_GET['action']) && $_GET['action'] == "signout"){
    $account = new AccountController();
    $account->logout();
}

include '../../view/admin/adminNavBar.php';
?>
            
            <h1>Welcome Admin: <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></h1>
            
        </div>
    </div>

<?php include '../../view/partials/footer.php'; ?>