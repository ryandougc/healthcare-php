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
                <li class="active">
                    <a href="doctorHomePage.php">Home</a>
                </li>
                <li class="active">
                    <a href="viewDoctorProfile.php">Profile</a>
                </li>
                <li>
                    <a href="editDoctorProfile.php">Change Profile</a>
                </li>
                <li>
                    <a href="">Visits</a>
                </li>
                <li>
                    <a href="">Exams</a>
                </li>
                <li>
                    <a href="">Exam Results</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        </ul>
                    </div>
                    <a href="?action=signout">Sign Out</a>
                </div>
            </nav>
            <!--<h1>Welcome <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></h1>-->

            <h1>Welcome Doctor</h1>
        </div>
    </div>