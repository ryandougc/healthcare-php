<?php include '../partials/header.php'; ?>
<body>
<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to staffs
require_once('../../includes/staffAccess.php');

//include all of the controllers and models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/staff.class.php';
include '../../controller/staffController.php';

//Get the Staff profile data
//$staff = new StaffController();
//$staffDetails = $staff->getStaffProfile($_SESSION['loginid']);


//NavBar with Logout
include '../../view/staff/staffNavBar.php';

?>
            <h1 class="h2 mb-3 font-weight-normal">Profile</h1>
            <h3>Full Name:</h3>
            <p><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></p>

            <h3>Clinic Address:</h3>
            <p><?php echo $staffDetails['StaffClinicAddress']; ?></p>

            <h3>Phone:</h3>
            <p><?php echo $staffDetails['StaffPhone']; ?></p>
        </div>
    </div>

<?php include '../../view/partials/footer.php'; ?>