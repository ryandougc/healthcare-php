<?php

include '../model/database.class.php';
include '../model/account.class.php';
include '../controller/patientcontroller.php';

if(isset($_POST['submit'])) { 
    $loginid = filter_input(INPUT_POST, 'username');
    $pword = filter_input(INPUT_POST, 'password');

    $loginTest = new PatientController();
    $loginTest->signup($loginid, $pword);
}

?>

<!-- Sign up form -->
<h2>Sign Up</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="usernameInput">Username</label>
    <input id="usernameInput" type="text" name="username">

    <label for="passwordInput">Password</label>
    <input id="passwordInput" type="password" name="password">

    <label for="passwordMatchInput">Re-type Password</label>
    <input id="passwordMatchInput" type="password" name="passwordMatch">

    <button type="submit" name="submit">Sign Up</button>
</form>