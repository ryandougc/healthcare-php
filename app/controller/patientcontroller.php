<?php

class PatientController extends Patient{
    public function passwordMatch(){
        if($this->pword != $this->pwordMatch){
            header('location ?message=passwordMatchError');
            exit();
        }
    } 

    public function patientSignUp(
        $loginid,
        $pword,
        $pwordMatch,
        $firstName,
        $lastName,
        $phoneNum,
        $address,
        $city,
        $postCode,
        $emailNoti
    ){
        //Check if user already exists
        if($this->getLoginDetails($loginid)){
            header('location: ?message=userExists');
            exit();
        }

        //Generate GUID for patient
        $accountId = $this->generateGUID();

        //Set the account type to 'patient'
        $accountType = "Patient";

        //Hash the password
        $hashed_pass = password_hash($pword, PASSWORD_DEFAULT);

        //Create the account
        $this->createAccount(
            $accountId,
            $loginid,
            $hashed_pass,
            $firstName,
            $lastName,
            $accountType
        );

        //Create the patient profile
        $this->createPatientProfile(
            $accountId,
            $loginid,
            $phoneNum,
            $address,
            (bool) $emailNoti
        );

        //On success, send the user the the second page of the registration
        header('location: signinpage.php?message="userCreated');
        exit();

    }
}