<?php 
include '../view/header.php'; 
session_start();
?>

<h1>Welcome <?php echo $_SESSION['loginid'] ?>!</h1>

 <a class="nav-link" href="../auth/signout.php">Sign Out</a>

<?php include '../view/footer.php'; ?>