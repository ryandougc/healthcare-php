<?php

class PatientController extends Account{
    public function signup($loginid, $pword){
        //Filter Inputs again
        $loginid = filter_var($loginid, FILTER_SANITIZE_STRING);
        $pword = filter_var($pword, FILTER_SANITIZE_STRING);

        //check if user already exists
        if($this->getLoginDetails($loginid)){
            header('location: ?message=userExists');
            exit();
        }

        //Create the user
        $hashed_pass = password_hash($pword, PASSWORD_DEFAULT);
        $this->createAccount($loginid, $hashed_pass);

        //On success, send the user the the second page of the registration
        header('location: signinpage.php');
        exit();
    }
}