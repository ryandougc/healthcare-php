<?php
//Log the user out on click
if(isset($_GET['action']) && $_GET['action'] == "signout"){
    $account = new AccountController();
    $account->logout();
}
?>

<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Healthcare</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="doctorHomePage.php">Home</a>
                <li>
                    <a href="doctorProfile.php">Profile</a>
                </li>
                <li>
                    <a href="docSearchVisit.php">Visit</a>
                </li>
                <li>
                    <a href="docSearchPatient.php">Patient</a>
                </li>
                <li>
                    <a href="docSearchExams.php">Exams</a>
                </li>
            </ul>
        </nav>

        <div id="content">

            <!-- Page Content  -->
        <div id="content">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
            </ul>
        </div>
        <a href="?action=signout">Sign Out</a>
    </div>
</nav>


       

     



