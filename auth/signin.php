<?php

//Require this renders the database init file
require('../model/db_connect.php');
//Require any databse models here
require('../model/account.php');

//Get the inputs from the signup form and sanitize them
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

//If any of the inputs are empty (no value) then send an error msg
if(empty($username) || empty($password)){
    header('location: index.php?message=emptyFields');
    exit();
}else {
    //Get account from database
    $account = findAccount($username, $password);

    //If there is no account, send an error msg
    if($account == NULL){
        header('location: index.php?message=noAccount');
        exit();
    }else { 
        if(password_verify($password, $account['pword'])){
            //Start a session
            session_start();
            //Assign session variables
            $_SESSION['signedin'] = true;
            $_SESSION['loginid'] = $account['loginid'];
            header('location: ../home/welcome.php');
            exit();
        }else {
            header('location: index.php?message=passwordIncorrect');
            exit();
        }
    }
}

?>