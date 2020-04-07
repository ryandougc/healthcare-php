<?php 
include '../partials/header.php';
include '../../view/doctor/doctorNavBar.php';

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
require_once('../../includes/doctorAccess.php');

//models
include '../../model/database.class.php';
include '../../model/account.class.php';

//controller
include '../../controller/doctorcontroller.php';

//Get the Doctor profile data
$doctorController = new DoctorController();
$loginid = $_SESSION['loginid'];
$doctorDetails = $doctorController->getDoctorProfile($loginid);

if(isset($_POST['search'])) { 

    $VisitID = filter_input(INPUT_POST, 'search');

    $results = $doctorController->docSearchVists($VisitID, $loginid);

    foreach($results as $result){
        echo '<br>';
        echo $result['VisitID'].'<br>';
        echo $result['DoctorID'].'<br>';
        echo $result['ClinicID'].'<br>';
        echo $result['PatientID'].'<br>';
        echo $result['VisitDate'].'<br>';
        echo $result['Prescription'].'<br>';
        echo $result['DoctorNotes'].'<br>';
        echo $result['SuggestedExam'].'<br>';
    }
}

?>


<h1 class="h2 mb-3 font-weight-normal"><strong><u>Search Visit</u></strong></h1>

            <!--Search bar-->
            <form class="form-inline d-flex md-form form-sm mt-0" action="#!" method="post">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-200" type="search" name="search" placeholder="Search" aria-label="Search">
                <input type="submit" class="btn btn-primary m-1" name="search"/>
            </form>
        </div>
    </div>



<?php include '../../view/partials/footer.php'; ?>