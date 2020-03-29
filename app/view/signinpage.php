<body class="bodysignin">
<?php

    include '../model/database.class.php';
    include '../model/account.class.php';
    include '../controller/accountcontroller.php';

    include '../partials/header.php';

    //Redirect if already signed in
    session_start();
    if(isset($_SESSION['signedin'])){
      header('location: index.php');
    }

    if(isset($_POST['submit'])) { 
        $loginid = filter_input(INPUT_POST, 'loginid');
        $pword = filter_input(INPUT_POST, 'pword');

        $signIn = new AccountController();
        $signIn->signin($loginid, $pword);
    }

?>

<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <?php 
      //Check for error message
      if(isset($_GET['message'])){
          echo '<p>' . $_GET['message'] . '</p>';
      } 
  ?>

  <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>

  <label for="usernameInput" class="sr-only">Username</label>
  <input type="text" id="usernameInput" name="loginid" class="form-control" placeholder="Username" required autofocus>

  <label for="passwordInput" class="sr-only">Password</label>
  <input type="password" id="passwordInput" name="pword" class="form-control" placeholder="Password" required>
  <!--<div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>-->
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign In</button>
</form>

<?php include './partials/footer.php'; ?>