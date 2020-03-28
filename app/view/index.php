<?php

session_start();
if($_SESSION['signedin']){
    if($_SESSION['accType'] == "Admin"){
    header('location: /healthcare-php/app/view/admin/adminHomePage.php');
} else if($_SESSION['accType'] == "Doctor"){
    header('location: /healthcare-php/app/view/doctor/doctorHomePage.php');
} else if($_SESSION['accType'] == "Patient"){
    header('location: /healthcare-php/app/view/patient/patientHomePage.php');
} else if($_SESSION['accType'] == "Staff"){
    header('location: /healthcare-php/app/view/staff/staffHomePage.php');
}
}else{
    header('location: signinpage.php');
    exit();
}