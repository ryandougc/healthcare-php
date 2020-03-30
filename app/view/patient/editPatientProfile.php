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

include '../partials/header.php';

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

?>

<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Healthcare</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="patientHomePage.php">Home</a>
                </li>
                <li class="active">
                    <a href="viewPatientProfile.php">Profile</a>
                </li>
                <li>
                    <a href="editPatientProfile.php">Change Profile</a>
                </li>
                <li>
                    <a href="">Visits</a>
                </li>
                <li>
                    <a href="">Exams</a>
                </li>
                <li>
                    <a href="">Exam Results</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>

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
                <input id="cityInput" class="form-control" type="text" name="city">
                </div>
                <div class="form-row">
                <label for="provinceInput">Province</label>
                <input id="provinceInput" class="form-control" type="text" name="province">
                </div>
                <div class="form-row">
                <label for="postCodeInput">Postal Code</label>
                <input id="postCodeInput" class="form-control" type="text" name="postCode">

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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" 
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" 
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

<?php include '../partials/footer.php'; ?>