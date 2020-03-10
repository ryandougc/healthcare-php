<?php

class PatientContr extends Account{
    public function signup($loginid, $pword){
        //check if user already exists

        //Create the user
        $hashed_pass = password_hash($pword, PASSWORD_DEFAULT);
        $this->createAccount($loginid, $hashed_pass);

        //On success, send the user the the second page of the registration
        echo "added account";
    }
}