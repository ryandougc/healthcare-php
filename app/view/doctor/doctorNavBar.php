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
                <li>
                    <a href="doctorProfile.php">Profile</a>
                </li>
                <li>
                    <a href="">Patient</a>
                </li>
                <li>
                    <a href="">Exams</a>
                </li>
            </ul>
        </nav>

        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                        <!--Search bar-->
                        <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" action="search.php">
                            <i class="fas fa-search" aria-hidden="true"></i>
                            <input class="form-control form-control-sm ml-3 w-200" type="search" placeholder="Search" aria-label="Search">
                        </form>

                        <a href="?action=signout">Sign Out</a>
                </div>
            </nav>


       

     



