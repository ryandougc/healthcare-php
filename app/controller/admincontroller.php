<?php

class AdminController extends Admin{
    private function generateAccDetails(){
        $accDetails = [];

        //Generate GUID for account
        $accDetails['guid'] = $this->generateGUID();

        //Generate secure temporary password
        $pword = random_int(10000000, 99999999);

        //Hash the password
        // $accDetails['hashedPword'] = password_hash($pword, PASSWORD_DEFAULT);  //Figure out how to send the raw temporary password to user
        $accDetails['hashedPword'] = $pword;

        return $accDetails;
    }

    public function createDoctor(  
        $loginid,
        $firstName,
        $lastName,
        $accountType,
        $doctorEmail,
        $doctorClinicSelect
    ){
        //Generate guid and password for account
        $accDetails = $this->generateAccDetails();

        //Create the doctor account
        $this->createAccount(
            $accDetails['guid'],
            $loginid,
            $accDetails['hashedPword'],
            $firstName,
            $lastName,
            $accountType
        );

        //Create the doctor profile
        $this->createDoctorProfile(
            $accDetails['guid'],
            $doctorEmail,
            $doctorClinicSelect
        );

        header('location: /healthcare-php/app/view/admin/adminHomePage.php');
    }

    public function createStaff(  
        $loginid,
        $firstName,
        $lastName,
        $accountType,
        $staffClinicSelect
    ){
        //Generate guid and password for account
        $accDetails = $this->generateAccDetails();

        //Create the doctor account
        $this->createAccount(
            $accDetails['guid'],
            $loginid,
            $accDetails['hashedPword'],
            $firstName,
            $lastName,
            $accountType
        );

        //Create the doctor profile
        $this->createStaffProfile(
            $accDetails['guid'],
            $staffClinicSelect
        );

        header('location: /healthcare-php/app/view/homepage.php?message=staffCreated');
    }

    public function createPatient(  
        $loginid,
        $firstName,
        $lastName,
        $accountType,
        $patientEmail,
        $patientPhoneNum,
        $patientAddress,
        $patientCity,
        $patientProvince,
        $patientPostCode,
        $PatientEmailNoti
    ){
        //Generate guid and password for account
        $accDetails = $this->generateAccDetails();

        //Create the doctor account
        $this->createAccount(
            $accDetails['guid'],
            $loginid,
            $accDetails['hashedPword'],
            $firstName,
            $lastName,
            $accountType
        );

        //Create the doctor profile
        $this->createPatientProfile(
            $accDetails['guid'],
            $patientEmail,
            $patientPhoneNum,
            $patientAddress,
            $patientCity,
            $patientProvince,
            $patientPostCode,
            $PatientEmailNoti
        );

        header('location: /healthcare-php/app/view/homepage.php?message=patientCreated');
    }


    public function createAdmin(  
        $loginid,
        $firstName,
        $lastName,
        $accountType
    ){
        //Generate guid and password for account
        $accDetails = $this->generateAccDetails();

        //Create the doctor account
        $this->createAccount(
            $accDetails['guid'],
            $loginid,
            $accDetails['hashedPword'],
            $firstName,
            $lastName,
            $accountType
        );

        header('location: /healthcare-php/app/view/homepage.php?message=adminCreated');
    }

    public function getAccountByID($accountId){
        return $this->getAccount($accountId);
    }

    public function getAccountList(){
        return $this->getAccounts();
    }

    public function deleteAccount($accountId, $accType){
        $this->delAccount($accountId);

        $this->delPatient($accountId);

        $this->delDoctor($accountId);

        $this->delStaff($accountId);

        header('location: adminHomePage.php?message=accountDeleted');
    }

    public function updateAccount(
        $accountId,
        $loginid,
        $pword,
        $firstName,
        $lastName
    ){
        //Hash password
        $hashed_pass = password_hash($pword, PASSWORD_DEFAULT);

        $this->putAccount(
            $accountId,
            $loginid,
            $hashed_pass,
            $firstName,
            $lastName
        );

        header('location: adminHomePage.php');
    }

}