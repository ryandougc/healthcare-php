<?php include '../partials/header.php'; ?>
<body class="bodysignin">

<?php

include '../model/database.class.php';
include '../model/account.class.php';
include '../model/patient.class.php';
include '../controller/patientcontroller.php';

if(isset($_POST['submit'])) { 
    //Get and filter inputs
    $loginid    = filter_input(INPUT_POST, 'loginid');
    $pword      = filter_input(INPUT_POST, 'pword');
    $pwordMatch = filter_input(INPUT_POST, 'pwordMatch');
    $firstName  = filter_input(INPUT_POST, 'firstName');
    $lastName   = filter_input(INPUT_POST, 'lastName');
    $phoneNum   = filter_input(INPUT_POST, 'phoneNum');
    $address    = filter_input(INPUT_POST, 'address');
    $city       = filter_input(INPUT_POST, 'city');
    $province   = filter_input(INPUT_POST, 'province');
    $postCode   = filter_input(INPUT_POST, 'postCode');
    $emailNoti  = $_POST['emailNotifications'];

    //If any input is null, reload form
    if(
        empty($loginid) 
        || empty($pword) 
        || empty($pwordMatch) 
        || empty($firstName) 
        || empty($lastName) 
        || empty($phoneNum) 
        || empty($address) 
        || empty($city) 
        || empty($province) 
        || empty($postCode)
    ){
        header('location: ?message=emptyField');
        exit();
    }

    //Check if passwords match
    if($pword !== $pwordMatch){
        header('location: ?message=pwordMatch');
        exit();
    }

    //Convert $emailNoti to a BOOLEAN value
    if($emailNoti == "1"){
        $emailNoti = 1;
    }else {
        $emailNoti = 0;
    }

    $patientSignUp = new PatientController();
    $patientSignUp->patientSignUp(
        $loginid,
        $pword,
        $pwordMatch,
        $firstName,
        $lastName,
        $phoneNum,
        $address,
        $city,
        $province,
        $postCode,
        $emailNoti
    );

}

?>

<!-- Sign up form -->


<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h2 class="h2 mb-3 font-weight-normal">Sign Up</h2>
    <div class="form-row">
    <label for="usernameInput">Email:</label>
    <input id="usernameInput" type="text" name="loginid" class="form-control" required autofocus>
    </div>
    <div class="form-row">
    <label for="passwordInput">Password:</label>
    <input id="passwordInput" type="password" name="pword" class="form-control" required>
    </div>
    <div class="form-row">
    <label for="passwordMatchInput">Re-type Password</label>
    <input id="passwordMatchInput" type="password" name="pwordMatch"class="form-control"required>
    </div>
    <div class="form-row">
    <label for="firstNameInput">First Name</label>
    <input id="firstNameInput" type="text" name="firstName" class="form-control" required>
    </div>
    <div class="form-row">
    <label for="lastNameInput">Last Name</label>
    <input id="lastNameInput" type="text" name="lastName" class="form-control" required>
    </div>
    <div class="form-row">
    <label for="phoneNumInput">Phone Number</label>
    <input id="phoneNumInput" type="text" name="phoneNum" class="form-control" required>
    </div>
    <div class="form-row">
    <label for="addresInput">Address</label>
    <input id="addresInput" type="text" name="address" class="form-control" required>
    </div>
    <div class="form-row">
    <label for="cityInput">City</label>
    <input id="cityInput" type="text" name="city" class="form-control" required>
    </div>
    <div class="form-row">
    <label for="provinceInput">Province</label>
    <input id="provinceInput" type="text" name="province" class="form-control" required>
    </div>
    <div class="form-row">
    <label for="postCodeInput">Postal Code</label>
    <input id="postCodeInput" type="text" name="postCode" class="form-control" required>

    <div >
        <h4>Receive Email Notifications?</h4>

        <label for="emailNotifNoRadio">No</label>
        <input id="emailNotifNoRadio" type="radio" name="emailNotifications"  value="0" checked>

        <label for="emailNotifYesRadio">Yes</label>
        <input id="emailNotifYesRadio" type="radio" name="emailNotifications"  value="1">
    </div>
  
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign Up</button>
</form>
<?php include './partials/footer.php'; ?>