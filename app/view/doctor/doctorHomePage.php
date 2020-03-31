<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
require_once('../../includes/doctorAccess.php');

//Controllers and models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/doctor.class.php';
include '../../controller/accountcontroller.php';
include '../../controller/doctorController.php';

//Page header
include '../../view/partials/header.php'; 

//NavBar with Logout
include '../../view/doctor/doctorNavBar.php';

//Get users name
$name = $_SESSION['firstName'] . " " . $_SESSION['lastName'];

?>



<h1>Welcome <?php echo $name?> </h1>



  
    </div>
</div>


<?php 
//Page footer
include '../../view/partials/footer.php'; 
?>