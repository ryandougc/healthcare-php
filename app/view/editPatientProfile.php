<body>
<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../includes/sessionCheck.php');
//Only give access to patients
require_once('../includes/patientAccess.php');

//include all of the controllers and models
include '../model/database.class.php';
include '../model/account.class.php';
include '../model/patient.class.php';
include '../controller/patientcontroller.php';

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
        $postCode,
        $emailNoti
    );
}

?>

<!-- Sign up form -->
<h2>Update Patient Profile</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="phoneNumInput">Phone Number</label>
    <input id="phoneNumInput" type="text" name="phoneNum" value="<?php echo $patientDetails['PatientPhone']; ?>">

    <label for="addresInput">Address</label>
    <input id="addresInput" type="text" name="address" value="<?php echo $patientDetails['PatientAddress']; ?>">

    <label for="cityInput">City</label>
    <input id="cityInput" type="text" name="city">

    <label for="postCodeInput">Postal Code</label>
    <input id="postCodeInput" type="text" name="postCode">

    <div>
        <h4>Receive Email Notifications?</h4>

        <label for="emailNotifNoRadio">No</label>
        <input id="emailNotifNoRadio" type="radio" name="emailNotifications"  value="0" <?php if($patientDetails['EmailNotifications'] == 0) {echo 'checked'; }?>>

        <label for="emailNotifYesRadio">Yes</label>
        <input id="emailNotifYesRadio" type="radio" name="emailNotifications"  value="1" <?php if($patientDetails['EmailNotifications'] == 1) {echo 'checked'; }?>>
    </div>
  
    <button type="submit" name="submit">Update</button>
</form>