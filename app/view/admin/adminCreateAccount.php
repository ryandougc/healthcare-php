<?php include '../partials/header.php'; ?>
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
include '../../view/admin/adminNavBar.php';
?>
            <!-- Create Account form -->
            <h2>Create Account</h2>
            <form class="form-editprofile" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-row">
                <label for="usernameInput">Login ID</label>
                <input class="form-control" id="usernameInput" type="text" name="loginid">
                </div>
                <div class="form-row">
                <label for="firstNameInput">First Name</label>
                <input class="form-control" id="firstNameInput" type="text" name="firstName">
                </div>
                <div class="form-row">
                <label for="lastNameInput">Last Name</label>
                <input class="form-control" id="lastNameInput" type="text" name="lastName">
                </div>
                <div class="form-row">
                <label for="accountTypeSelect">Account Type</label>
                <select class="form-control" id="accountTypeSelect" name="accountType">
                    <option disabled selected>Select an account type...</option>
                    <option value="Patient">Patient</option>
                    <option value="Staff">Staff</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Admin">Admin</option>
                </select>
                </div>
                <!-- Doctor Form -->
                <div id="DoctorForm" style="display: none;">
                    <label for="doctorEmailInput">Email</label>
                    <input class="form-control" id="doctorEmailInput" type="email" name="doctorEmail">

                    <label for="clinicSelect">Clinic</label>
                    <select class="form-control" id="clinicSelect" name="doctorClinicSelect">
                        <option disabled selected>Select a clinic...</option>
                        <!-- ...Fill in options in the clinic from database -->
                        <?php foreach($clinicList as $clinic){ 
                            echo 
                                '<option value="' . $clinic['ClinicID'] . '">' 
                                . $clinic['ClinicAddress'] 
                                . '</option>';
                        } ?>
                    </select>
                    <p></p>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="doctorSubmit" name="submit">Sign Up</button>
                </div>

                <!-- Staff Form -->
                <div id="StaffForm" style="display: none;">
                    <label for="clinicSelect">Clinic</label>
                    <select class="form-control" id="clinicSelect" name="staffClinicSelect">
                        <option disabled selected>Select a clinic...</option>
                        <!-- ...Fill in options in the clinic from database -->
                        <?php foreach($clinicList as $clinic){ 
                            echo 
                                '<option value="' . $clinic['ClinicID'] . '">' 
                                . $clinic['ClinicAddress'] 
                                . '</option>';
                        } ?>
                    </select>
                    <p></p>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="staffSubmit" name="submit">Sign Up</button>
                </div>

                <!-- Patient Form -->
                <div id="PatientForm" style="display: none;">
                    <label for="patientEmailInput">Email</label>
                    <input class="form-control" id="patientEmailInput" type="email" name="patientEmail">

                    <label for="patientPhoneNumInput">Phone Number</label>
                    <input class="form-control" id="patientPhoneNumInput" type="text" name="patientPhoneNum">

                    <label for="addresInput">Address</label>
                    <input class="form-control" id="addresInput" type="text" name="patientAddress">

                    <label for="cityInput">City</label>
                    <input class="form-control" id="cityInput" type="text" name="patientCity">

                    <label for="provinceInput">Province</label>
                    <input class="form-control" id="provinceInput" type="text" name="patientProvince">

                    <label for="postCodeInput">Postal Code</label>
                    <input class="form-control" id="postCodeInput" type="text" name="patientPostCode">

                    <div>
                    <p></p>
                        <h4>Receive Email Notifications?</h4>

                        <label for="emailNotifNoRadio">No</label>
                        <input id="emailNotifNoRadio" type="radio" name="patientEmailNotifications"  value="0" checked>

                        <label for="emailNotifYesRadio">Yes</label>
                        <input id="emailNotifYesRadio" type="radio" name="patientEmailNotifications"  value="1">
                    </div> 
                    <p></p>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="patientSubmit" name="submit">Sign Up</button>
                </div>

                <!-- Admin Form -->
                <div id="AdminForm" style="display: none;">
                <p></p>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="adminSubmit" name="submit">Sign Up</button>
                </div>
            </form>
            
        </div>
    </div>

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