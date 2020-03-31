<?php include '../partials/header.php'; ?>
<body>
<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to patients
require_once('../../includes/patientAccess.php');

//include all of the controllers and models
include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/patient.class.php';
include '../../controller/patientcontroller.php';

//Get the patient profile data
$patient = new PatientController();
$patientDetails = $patient->getPatientProfile($_SESSION['loginid']);

//On submit, do this
if(isset($_POST['submit'])) { 
    //Get and filter inputs
    $phoneNum   = filter_input(INPUT_POST, 'phoneNum');
    $address    = filter_input(INPUT_POST, 'address');
    $city       = filter_input(INPUT_POST, 'city');
    $postCode   = filter_input(INPUT_POST, 'postCode');
    $emailNoti  = $_POST['emailNotifications'];

    //If any input is null, reload form
    if(
        empty($phoneNum) 
        || empty($address) 
        || empty($city) 
        || empty($province) 
        || empty($postCode)
    ){
        header('location: ?message=emptyField');
        exit();
    }

    //Convert $emailNoti to a BOOLEAN value
    if($emailNoti == "1"){
        $emailNoti = 1;
    }else {
        $emailNoti = 0;
    }
    
    $patientSignUp = new PatientController();
    $patientSignUp->updatePatientProfile(
        $_SESSION['accID'],
        $phoneNum,
        $address,
        $city,
        $province,
        $postCode,
        $emailNoti
    );
}
include '../../view/patient/patientNavBar.php';
?>
            <!-- Sign up form -->
            <h2>Update Patient Profile</h2>
            <form class="form-editprofile" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-row">
                    <label for="phoneNumInput">Phone Number</label>
                    <input id="phoneNumInput" class="form-control" type="text" name="phoneNum" 
                    value="<?php echo $patientDetails['PatientPhone']; ?>">
                </div>
                <div class="form-row">
                    <label for="addresInput">Address</label>
                    <input id="addresInput" class="form-control" type="text" name="address" 
                    value="<?php echo $patientDetails['PatientAddress']; ?>">
                </div>
                <div class="form-row">
                    <label for="cityInput">City</label>
                    <input id="cityInput" class="form-control" type="text" name="city"
                    value="<?php echo $patientDetails['PatientCity']; ?>">
                </div>
                <div class="form-row">
                    <label for="provinceInput">Province</label>
                    <input id="provinceInput" class="form-control" type="text" name="province"
                    value="<?php echo $patientDetails['PatientProvince']; ?>">
                </div>
                    <div class="form-row">
                    <label for="postCodeInput">Postal Code</label>
                    <input id="postCodeInput" class="form-control" type="text" name="postCode"
                value="<?php echo $patientDetails['PatientPostCode']; ?>">

                <div>
                    <h4>Receive Email Notifications?</h4>

                    <label for="emailNotifNoRadio">No</label>
                    <input id="emailNotifNoRadio" type="radio" name="emailNotifications"  value="0" <?php if($patientDetails['EmailNotifications'] == 0) {echo 'checked'; }?>>

                    <label for="emailNotifYesRadio">Yes</label>
                    <input id="emailNotifYesRadio" type="radio" name="emailNotifications"  value="1" <?php if($patientDetails['EmailNotifications'] == 1) {echo 'checked'; }?>>
                </div>
            
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>

<?php include '../partials/footer.php'; ?>