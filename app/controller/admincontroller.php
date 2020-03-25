<?php

class Admin extends Account{
    public function createAnyAccount(  
        $loginid,
        $pword,
        $firstName,
        $lastName,
        $accountType
    ) {
        //Generate GUID for account
        $accountId = $this->generateGUID();

        //Hash the password
        $hashed_pass = password_hash($pword, PASSWORD_DEFAULT);

        //Create the patient account
        $this->createAccount(
            $accountId,
            $loginid,
            $hashed_pass,
            $firstName,
            $lastName,
            $accountType
        );
    }
}