<?php
include '../app/view/partials/header.php';
/*session_start();

if(isset($_SESSION['signedin'])){
    header('location: ./app/view/homepage.php');
}*/
?>

<a href="app/view/signinpage.php">
        <button>Sign In</button>
<a href="app/view/signuppage.php">
        <button>Sign Up</button>

<?php include '../view/partials/footer.php'; ?>