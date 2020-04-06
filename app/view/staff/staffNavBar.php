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
                    <a href="staffHomePage.php">Home</a>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Profile</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li><a href="viewStaffProfile.php">View Profile</a></li>
                        <li><a href="editStaffProfile.php">Change Profile</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="staffPostExamDetails.php">Post Exam Details</a>
                </li>
                <li>
                    <a href="staffSearchVisit.php">Search Visits</a>
                </li>
                <li>
                    <a href="staffPostExamResults.php">Post Exam Results</a>
                </li>
            </ul>
        </nav>

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


       

     



