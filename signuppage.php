<?php

include 'includes/class-autoload.inc.php';

if(isset($_POST['submit'])) { 
    $username = filter_input(INPUT_POST, 'username');
    $pword = filter_input(INPUT_POST, 'password');
echo "works";
    $loginTest = new PatientContr();
    $loginTest->signup($username, $pword);
}

?>

<!-- Sign up form -->
<h2>Sign Up</h2>
<form action="signup.php" method="post">
    <label for="usernameInput">Username</label>
    <input id="usernameInput" type="text" name="username">

    <label for="passwordInput">Password</label>
    <input id="passwordInput" type="password" name="password">

    <label for="passwordMatchInput">Re-type Password</label>
    <input id="passwordMatchInput" type="password" name="passwordMatch">

    <button type="submit" name="signup">Sign Up</button>
</form>