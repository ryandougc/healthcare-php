<?php

include '../model/database.class.php';
include '../model/account.class.php';
include '../controller/accountcontroller.php';

if(isset($_POST['submit'])) { 
    $loginid = filter_input(INPUT_POST, 'loginid');
    $pword = filter_input(INPUT_POST, 'pword');

    $signIn = new AccountController();
    $signIn->signin($loginid, $pword);
}

?>

<h2>Sign In</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="usernameInput">Username</label>
    <input id="usernameInput" type="text" name="loginid">

    <label for="passwordInput">Password</label>
    <input id="passwordInput" type="password" name="pword">

    <button type="submit" name="submit">Sign In</button>
</form>