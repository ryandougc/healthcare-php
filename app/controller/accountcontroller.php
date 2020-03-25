<?php

class AccountController extends Account{
    public function signin($loginid, $pword) {
        //Get account from database
        $account = $this->getLoginDetails($loginid);

        //If there is no account, send an error msg
        if($account == false){
            header('location: ?message=noAccount');
            exit();
        }else { 
            //If the inputted password matches the saved pword, start a new session
            if(password_verify($pword, $account['AccountPassword'])){
                //Start a session and assign variables
                session_start();
                $_SESSION['signedin'] = true;
                $_SESSION['loginid'] = $account['LoginID'];
                
                header('location: ../view/homepage.php');
                exit();
            }else {
                header('location: ?message=passwordIncorrect');
                exit();
            }
        }
    }

    public function logout() {
        session_start();
        $_SESSION[] = array();
        session_destroy();
        header('location: /healthcare-php/');
    }

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

