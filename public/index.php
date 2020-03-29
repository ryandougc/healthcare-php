<body class="bodysignin">

<?php
include '../app/view/partials/header.php';
/*session_start();

if(isset($_SESSION['signedin'])){
    header('location: ./app/view/homepage.php');
}*/
?>


<div class="container my-4">
        <div class="text-center">
                <h1 class="display-1 mb-3 font-weight-normal">Healthcare</h1>
                <div class="border border-dark rounded-pill p-4 mb-4" >
                        <div class="text-center">
                                <a href="../app/view/signinpage.php">
                                <button class="btn btn-primary">Sign In</button>
                                
                                <a href="../app/view/signuppage.php">
                                <button class="btn btn-primary">Sign Up</button>
                        </div>
                </div>
        </div>
</div>
<?php include '../app/view/partials/footer.php'; ?>

<!-- class="m-5" -->