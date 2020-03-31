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

