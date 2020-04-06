<?php

//Header
include '../partials/header.php';
//NavBar with Logout
include '../../view/doctor/doctorNavBar.php';


//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
require_once('../../includes/doctorAccess.php');

//Models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/patient.class.php';

//Controllers
include '../../controller/accountcontroller.php';
include '../../controller/patientcontroller.php';

$patientController = new PatientController();


if(isset($_POST['search'])) { 

    //Patient loginid
    $loginid = filter_input(INPUT_POST, 'search');

    $results = $patientController->getPatientProfile($loginid);

    foreach($results as $result){
        echo $result['PatientID'].'<br>';
        echo $result['PatientEmail'].'<br>';
        echo $result['PatientPhone'].'<br>';
        echo $result['PatientAddress'].'<br>';
        echo $result['PatientCity'].'<br>';
        echo $result['PatientProvince'].'<br>';
        echo $result['PatientPostCode'].'<br>';
        echo $result['EmailNotifications'].'<br>';
    }
}

?>



<h1 class="h2 mb-3 font-weight-normal"><strong><u>Patient Search</u></strong></h1>

          <!--Search bar-->
          <form class="form-inline d-flex md-form form-sm mt-0" action="#!">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-200" type="search" name="search" placeholder="Search" aria-label="Search">
                <input type="submit" class="btn btn-primary m-1" name="search"/>
            </form>
        </div>
    </div>




<?php include '../../view/partials/footer.php'; ?>