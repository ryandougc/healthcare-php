</head>
<body>

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
        $postCode,
        $emailNoti
    );

}

?>

<!-- Sign up form -->
<h2>Sign Up</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="usernameInput">Email</label>
    <input id="usernameInput" type="text" name="loginid">

    <label for="passwordInput">Password</label>
    <input id="passwordInput" type="password" name="pword">

    <label for="passwordMatchInput">Re-type Password</label>
    <input id="passwordMatchInput" type="password" name="pwordMatch">

    <label for="firstNameInput">First Name</label>
    <input id="firstNameInput" type="text" name="firstName">

    <label for="lastNameInput">Last Name</label>
    <input id="lastNameInput" type="text" name="lastName">

    <label for="phoneNumInput">Phone Number</label>
    <input id="phoneNumInput" type="text" name="phoneNum">

    <label for="addresInput">Address</label>
    <input id="addresInput" type="text" name="address">

    <label for="cityInput">City</label>
    <input id="cityInput" type="text" name="city">

    <label for="postCodeInput">Postal Code</label>
    <input id="postCodeInput" type="text" name="postCode">

    <div>
        <h4>Receive Email Notifications?</h4>

        <label for="emailNotifNoRadio">No</label>
        <input id="emailNotifNoRadio" type="radio" name="emailNotifications"  value="0" checked>

        <label for="emailNotifYesRadio">Yes</label>
        <input id="emailNotifYesRadio" type="radio" name="emailNotifications"  value="1">
    </div>
  
    <button type="submit" name="submit">Sign Up</button>
</form>