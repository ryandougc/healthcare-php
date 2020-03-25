<?php 

include '../model/database.class.php';
include '../model/account.class.php';
include '../controller/accountcontroller.php';

include '../view/partials/header.php'; 

session_start();

if(isset($_GET['action']) && $_GET['action'] != ""){
    $account = new AccountController();
    $account->logout();
}

?>

<a href="?action=signout">Sign Out</a>

<h1>Welcome <?php echo $_SESSION['loginid'] ?></h1>

<?php include '../view/partials/footer.php'; ?>

