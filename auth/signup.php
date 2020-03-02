<?php
//Require this renders the database init file
require('../model/db_connect.php');
//Require any databse models here
require('../model/account.php');
require('../model/patient.php');

//Get the inputs from the signup form and sanitize them
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$passwordMatch = filter_input(INPUT_POST, 'passwordMatch');

//If any of the inputs are empty (no value) then send an error msg
if(empty($username) || empty($password) || empty($passwordMatch)){
    header('location: index.php?message=emptyFields');
    exit();
}else if($password !== $passwordMatch){
    header('location: index.php?message=passwordMatchError');
    exit();
}else {
    //If the username is already in use, send error msg
    $previousAccount = checkAccountExists($username);
    if($previousAccount > 0){
        header('location: signuppage.php?message=accountExists');
        exit();
    }

    //Create the user
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    createPatient($username, $hashed_pass);

    //Start a session
    session_start();
    //Assign session variables
    $_SESSION['signedin'] = true;
    $_SESSION['loginid'] = $username;

    //On success, send the user the the second page of the registration
    header('location: ../home/welcome.php');
}

?>