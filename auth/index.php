<?php include '../view/header.php'; ?>

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

<!-- Sign in form -->
<h2>Sign In</h2>
<form action="signin.php" method="post">
    <label for="usernameInput">Username</label>
    <input id="usernameInput" type="text" name="username">

    <label for="passwordInput">Password</label>
    <input id="passwordInput" type="password" name="password">

    <button type="submit" name="signin">Sign In</button>
</form>

 <?php include '../view/footer.php'; ?>