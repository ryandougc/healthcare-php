<?php

include '../model/database.class.php';
include '../model/account.class.php';
include '../controller/accountcontroller.php';

if(isset($_POST['submit'])) { 
    $loginid = filter_input(INPUT_POST, 'username');
    $pword = filter_input(INPUT_POST, 'password');

    $loginTest = new AccountController();
    $loginTest->login($loginid, $pword);
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