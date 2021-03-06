<?php
//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
require_once('../../includes/doctorAccess.php');

//Models
include '../../model/database.class.php';
include '../../model/account.class.php';


//Controllers
include '../../controller/accountcontroller.php';
include '../../controller/doctorcontroller.php';


//Header
include '../partials/header.php';
//NavBar with Logout
include '../../view/doctor/doctorNavBar.php';

//Get the doctor profile data
$doctorController = new doctorController();
//$clinicController = new ClinicController();
$loginid = $_SESSION['loginid'];
$doctorAccount = $doctorController->getDoctorAccount($loginid);
$doctorProfile = $doctorController->getDoctorProfile($loginid);

//$clinicID = $doctorProfile['ClinicID'];
//$clinicInfo = $clinicController->getClinicInfo($clinicID);

//On submit, do this
if(isset($_POST['update'])) {

    //Get and filter inputs
    $fName = filter_input(INPUT_POST, 'firstName');
    $lName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

                    
    //If any input is null, reload form
    
    if(
        empty($fName) 
        || empty($lName) 
        //|| empty($email)
        || empty($password)
    ){
        header('location: ?message=emptyField');
        exit();
    } else{

       // $doctorProfile->updateDoctorProfile($email);

        $doctorAccount->updateDoctorAccount(
            $fName,
            $lName,
            $password
        );
    }
    


}

?>

        <div class="container"> 
            <form class="text-center border border-light p-5" action="#!" method="post">
                <h2 class="h2 mb-4 font-weight-normal">Update Profile</h2>
                    <div class="form-row">
                        <div class="col">
                            <!-- First Name -->
                            <input type="text" class="form-control mb-4" name="firstName" placeholder=<?php echo $doctorAccount['FirstName']; ?>>  
                        </div>
                            <!-- Last Name -->
                        <div class="col"> 
                            <input type="text" class="form-control mb-4" name="lastName" placeholder=<?php echo $doctorAccount['LastName']; ?>>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col"> 
                            <!-- Email -->
                            <input type="email" class="form-control mb-4" name="email" placeholder=<?php echo $doctorProfile['DoctorEmail']; ?>>
                        </div>
                        <div class="col"> 
                            <!-- Email -->
                            <input type="password" class="form-control mb-4" name="password" placeholder="New Password">
                        </div>
                    </div>
                    <!--Select a Clinic Bar -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" ><?php echo $doctorProfile['ClinicID']; ?></label>
                        </div>
                    </div>

                <!-- Update button -->
                <br>
                <button type ="submit" class="btn btn-primary btn-block" type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</div>

<?php include '../../view/partials/footer.php'; ?>