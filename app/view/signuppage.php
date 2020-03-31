<?php

//model
include '../model/database.class.php';
include '../model/account.class.php';
include '../model/patient.class.php';

//controllers
include '../controller/patientcontroller.php';

//html header
include './partials/header.php'; 

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

<body class="bodysignin">

<!-- Sign up form -->
<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h2 class="h2 mb-4 font-weight-normal">Sign Up</h2>
    <div class="form-row">
        <input id="usernameInput" type="text" name="loginid" class="form-control" placeholder="Email" required autofocus>
    </div>
    <div class="form-row">
        <input id="passwordInput" type="password" name="pword" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-row">
        <input id="passwordMatchInput" type="password" name="pwordMatch" placeholder="Re-type Password" class="form-control" required>
    </div>
    <div class="form-row">
        <input id="firstNameInput" type="text" name="firstName" placeholder="First Name" class="form-control" required>
    </div>
    <div class="form-row">
        <input id="lastNameInput" type="text" name="lastName" placeholder="Last Name" class="form-control" required>
    </div>
    <div class="form-row">
        <input id="phoneNumInput" type="text" name="phoneNum" placeholder="Phone Number" class="form-control" required>
    </div>
    <div class="form-row">
        <input id="addresInput" type="text" name="address" placeholder="Address" class="form-control" required>
    </div>
    <div class="form-row">
        <input id="cityInput" type="text" name="city" placeholder="City" class="form-control" required>
    </div>
    <div class="form-row">
        <input id="provinceInput" type="text" name="province" placeholder="Province" class="form-control" required>
    </div>
    <div class="form-row">
        <input id="postCodeInput" type="text" name="postCode" placeholder="Postal Code" class="form-control" required>
    </div>

    <br>
    <div>
        <h5>Receive Email Notifications?</h5>

        <label for="emailNotifNoRadio">No</label>
        <input id="emailNotifNoRadio" type="radio" name="emailNotifications"  value="0" checked>

        <label for="emailNotifYesRadio">Yes</label>
        <input id="emailNotifYesRadio" type="radio" name="emailNotifications"  value="1">
    </div>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign Up</button>
</form>


<?php include './partials/footer.php'; ?>