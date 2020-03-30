<body>

<?php

//Check if a user is logged in. Send them to the signin page if they aren't
require_once('../../includes/sessionCheck.php');
//Only give access to admins
require_once('../../includes/adminAccess.php');

include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/admin.class.php';
include '../../model/clinic.class.php';
include '../../controller/admincontroller.php';
include '../../controller/cliniccontroller.php';

//Include the page header
include '../../view/partials/header.php';

//Get clinics data
$clinic = new ClinicController();
$clinicList =$clinic->getClinicList();

if(isset($_POST['submit'])) { 
    //Get and filter inputs
    $loginid        = filter_input(INPUT_POST, 'loginid');
    $firstName      = filter_input(INPUT_POST, 'firstName');
    $lastName       = filter_input(INPUT_POST, 'lastName');
    $accountType    = filter_input(INPUT_POST, 'accountType');

    //Create admincontroller class instance
    $adminInstance = new AdminController();

    //If any input is null, reload form
    if(
        empty($loginid) 
        || empty($firstName) 
        || empty($lastName) 
        || empty($accountType)
    ){
        header('location: ?message=emptyField');
        exit();
    }

    if($_POST['submit'] == "doctorSubmit"){
        //Get and filter inputs
        $doctorEmail            = filter_input(INPUT_POST, 'doctorEmail');
        $doctorClinicSelect     = filter_input(INPUT_POST, 'doctorClinicSelect');

        //If any input is null, reload form
        if(
            empty($doctorEmail) 
            || empty($doctorClinicSelect) 
        ){
            header('location: ?message=emptyField');
            exit();
        }

        //Create doctor account
        $adminInstance->createDoctor(
            $loginid,
            $firstName,
            $lastName,
            $accountType,
            $doctorEmail,
            $doctorClinicSelect
        );

    }else if($_POST['submit'] == "staffSubmit"){
        //Get and filter inputs
        $staffClinicSelect      = filter_input(INPUT_POST, 'staffClinicSelect');

        //If any input is null, reload form
        if(
            empty($staffClinicSelect) 
        ){
            header('location: ?message=emptyField');
            exit();
        }

        //Create staff account
        $adminInstance->createStaff(
            $loginid,
            $firstName,
            $lastName,
            $accountType,
            $staffClinicSelect
        );

    }else if($_POST['submit'] == "patientSubmit"){
        //Get and filter inputs
        $patientEmail           = filter_input(INPUT_POST, 'patientEmail');
        $patientPhoneNum        = filter_input(INPUT_POST, 'patientPhoneNum');
        $patientAddress         = filter_input(INPUT_POST, 'patientAddress');
        $patientCity            = filter_input(INPUT_POST, 'patientCity');
        $patientProvince        = filter_input(INPUT_POST, 'patientProvince');
        $patientPostCode        = filter_input(INPUT_POST, 'patientPostCode');
        $patientEmailNoti       = $_POST['patientEmailNotifications'];

        //If any input is null, reload form
        if(
            empty($patientEmail) 
            || empty($patientPhoneNum) 
            || empty($patientAddress) 
            || empty($patientCity)
            || empty($patientProvince)
            || empty($patientPostCode)
        ){
            header('location: ?message=emptyField');
            exit();
        }

        //Convert $emailNoti to a BOOLEAN value
        if($patientEmailNoti == "1"){
            $patientEmailNoti = 1;
        }else {
            $patientEmailNoti = 0;
        }


        //Create patient account
        $adminInstance->createPatient(
            $loginid,
            $firstName,
            $lastName,
            $accountType,
            $patientEmail,
            $patientPhoneNum,
            $patientAddress,
            $patientCity,
            $patientProvince,
            $patientPostCode,
            $patientEmailNoti 
        );

    }else if($_POST['submit'] == "adminSubmit"){

        //Create admin account
        $adminInstance->createAdmin(
            $loginid,
            $firstName,
            $lastName,
            $accountType
        );

    }else{
        header('location: ?message=formSubmitError');
    }

}

?>

<!-- Create Account form -->
<h2>Create Account</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="usernameInput">Login ID</label>
    <input id="usernameInput" type="text" name="loginid">

    <label for="firstNameInput">First Name</label>
    <input id="firstNameInput" type="text" name="firstName">

    <label for="lastNameInput">Last Name</label>
    <input id="lastNameInput" type="text" name="lastName">

    <label for="accountTypeSelect">Account Type</label>
    <select id="accountTypeSelect" name="accountType">
        <option disabled selected>Select an account type...</option>
        <option value="Patient">Patient</option>
        <option value="Staff">Staff</option>
        <option value="Doctor">Doctor</option>
        <option value="Admin">Admin</option>
    </select>



    <!-- Doctor Form -->
    <div id="DoctorForm" style="display: none;">
        <label for="doctorEmailInput">Email</label>
        <input id="doctorEmailInput" type="email" name="doctorEmail">

        <label for="clinicSelect">Clinic</label>
        <select id="clinicSelect" name="doctorClinicSelect">
            <option disabled selected>Select a clinic...</option>
            <!-- ...Fill in options in the clinic from database -->
            <?php foreach($clinicList as $clinic){ 
                echo 
                    '<option value="' . $clinic['ClinicID'] . '">' 
                    . $clinic['ClinicAddress'] 
                    . '</option>';
            } ?>
        </select>

        <button type="submit" value="doctorSubmit" name="submit">Sign Up</button>
    </div>

    <!-- Staff Form -->
    <div id="StaffForm" style="display: none;">
        <label for="clinicSelect">Clinic</label>
        <select id="clinicSelect" name="staffClinicSelect">
            <option disabled selected>Select a clinic...</option>
            <!-- ...Fill in options in the clinic from database -->
            <?php foreach($clinicList as $clinic){ 
                echo 
                    '<option value="' . $clinic['ClinicID'] . '">' 
                    . $clinic['ClinicAddress'] 
                    . '</option>';
            } ?>
        </select>

        <button type="submit" value="staffSubmit" name="submit">Sign Up</button>
    </div>

    <!-- Patient Form -->
    <div id="PatientForm" style="display: none;">
        <label for="patientEmailInput">Email</label>
        <input id="patientEmailInput" type="email" name="patientEmail">

        <label for="patientPhoneNumInput">Phone Number</label>
        <input id="patientPhoneNumInput" type="text" name="patientPhoneNum">

        <label for="addresInput">Address</label>
        <input id="addresInput" type="text" name="patientAddress">

        <label for="cityInput">City</label>
        <input id="cityInput" type="text" name="patientCity">

        <label for="provinceInput">Province</label>
        <input id="provinceInput" type="text" name="patientProvince">

        <label for="postCodeInput">Postal Code</label>
        <input id="postCodeInput" type="text" name="patientPostCode">

        <div>
            <h4>Receive Email Notifications?</h4>

            <label for="emailNotifNoRadio">No</label>
            <input id="emailNotifNoRadio" type="radio" name="patientEmailNotifications"  value="0" checked>

            <label for="emailNotifYesRadio">Yes</label>
            <input id="emailNotifYesRadio" type="radio" name="patientEmailNotifications"  value="1">
        </div> 

        <button type="submit" value="patientSubmit" name="submit">Sign Up</button>
    </div>

    <!-- Admin Form -->
    <div id="AdminForm" style="display: none;">
        <button type="submit" value="adminSubmit" name="submit">Sign Up</button>
    </div>

</form>

<?php include '../../view/partials/footer.php'; ?>

<script>
$('#accountTypeSelect').change(function(){
    $('#DoctorForm').css("display", "none");
    $('#StaffForm').css("display", "none");
    $('#PatientForm').css("display", "none");
    $('#AdminForm').css("display", "none");
    var value = $(this).val();
    $(`#${value}Form`).css("display", "inherit");
})
</script>