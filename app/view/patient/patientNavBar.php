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
                    <a href="patientHomePage.php">Home</a>
                </li>
                <li>
                    <a href="viewPatientProfile.php">Profile</a>
                </li>
                <li>
                    <a href="editPatientProfile.php">Change Profile</a>
                </li>
                <li>
                    <a href="searchPatientVisits.php">Visits</a>
                </li>
                <li>
                    <a href="searchPatientExams.php">Exams</a>
                </li>
                <li>
                    <a href="searchPatientExamResults.php">Exam Results</a>
                </li>
            </ul>
        </nav>

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


       

     



