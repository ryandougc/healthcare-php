<?php
//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
require_once('../../includes/doctorAccess.php');

//Models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/system.class.php';


//Controllers
include '../../controller/accountcontroller.php';



//Header
include '../partials/header.php';
//NavBar with Logout
include '../../view/doctor/doctorNavBar.php';

$exam = new System();


if(isset($_POST['search'])) { 

    //Exam ID
    $examID = filter_input(INPUT_POST, 'search');

    $results = $exam->getExamREsults($examID);

    foreach($results as $result){
        echo $result['ExamID'].'<br>';
        echo $result['PatientID'].'<br>';
        echo $result['DoctorID'].'<br>';
        echo $result['ExamDate'].'<br>';
        echo $result['ExamSubject'].'<br>';
        echo $result['ExamResults'].'<br>';
    }
}

?>


<h1 class="h2 mb-3 font-weight-normal"><strong><u>Exam Search</u></strong></h1>
<!--Search bar-->
<form class="form-inline d-flex md-form form-sm mt-0" action="#!" method="post">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-200" type="search" name="search" placeholder="Search" aria-label="Search">
                <input type="submit" class="btn btn-primary m-1" name="search"/>
            </form>
        </div>
    </div>






<?php include '../../view/partials/footer.php'; ?>