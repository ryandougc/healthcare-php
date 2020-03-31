<?php
//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to doctors
require_once('../../includes/doctorAccess.php');

//include all of the controllers and models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/doctor.class.php';
include '../../controller/doctorController.php';

//Header
include '../partials/header.php';

//NavBar with Logout
include '../../view/doctor/doctorNavBar.php';

//Get the doctor profile data
//$doctor = new doctorController();
//$doctorDetails = $doctor->getDoctorProfile($_SESSION['loginid']);

//On submit, do this
if(isset($_POST['submit'])) { 
    //Get and filter inputs
    $specialization = filter_input(INPUT_POST, 'specialization');
    $consultancyFee = filter_input(INPUT_POST, 'consultancyFee');
    $phoneNum   = filter_input(INPUT_POST, 'phoneNum');
    $clinicAddress    = filter_input(INPUT_POST, 'clinicAddress');
    $city       = filter_input(INPUT_POST, 'city');
    $province       = filter_input(INPUT_POST, 'province');
    $postCode   = filter_input(INPUT_POST, 'postCode');

    //If any input is null, reload form
    if(
        empty($phoneNum) 
        || empty($consultancyFee)
        || empty($clinicAddress) 
        || empty($city) 
        || empty($province) 
        || empty($postCode)
    ){
        header('location: ?message=emptyField');
        exit();
    }

    
    $doctorSignUp = new DoctorController();
    $doctorSignUp->updateDoctorProfile(
        $_SESSION['accID'],
        $phoneNum,
        $consultancyFee,
        $clinicAddress,
        $city,
        $province,
        $postCode
    );
}

?>

            <!-- Sign up form -->
            <h2>Update Doctor Profile</h2>
            <form class="form-editprofile" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-row">
                <label for="phoneNumInput">Phone Number</label>
                <input id="phoneNumInput" type="text" name="phoneNum" value="<?php echo $doctorDetails['DoctorPhone']; ?>">
                </div>
                <div class="form-row">
                <label for="consultancyFeeInput">Consultancy Fee</label>
                <input id="consultancyFeeInput" type="text" name="consultancyFee">
                </div>
                <div class="form-row">
                <label for="clinicAddresInput">Clinic Address</label>
                <input id="clinicAddresInput" type="text" name="clinicAddres" value="<?php echo $doctorDetails['DoctorClinicAddress']; ?>">
                </div>
                <div class="form-row">
                <label for="cityInput">City</label>
                <input id="cityInput" type="text" name="city">
                </div>
                <div class="form-row">
                <label for="provinceInput">Province</label>
                <input id="provinceInput" type="text" name="province">
                </div>
                <div class="form-row">
                <label for="postCodeInput">Postal Code</label>
                <input id="postCodeInput" type="text" name="postCode">
                </div>
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>

<?php include '../../view/partials/footer.php'; ?>