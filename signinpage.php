<?php

include 'includes/class-autoload.inc.php';

if(isset($_POST['submit'])) { 
    $username = filter_input(INPUT_POST, 'username');
    $pword = filter_input(INPUT_POST, 'password');
echo "works";
    $loginTest = new DoctorContr();
    $loginTest->login($username, $pword);
}

?>

<h2>Sign In</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="usernameInput">Username</label>
    <input id="usernameInput" type="text" name="username">

    <label for="passwordInput">Password</label>
    <input id="passwordInput" type="password" name="password">

    <button type="submit" name="submit">Sign In</button>
</form>