<?php

class AccountController extends Account{
    // private $accountId;
    // private $loginid;
    // private $pword;
    // private $pwordMatch;
    // private $firstName;
    // private $lastName;
    // private $accountType;

    // public function __controller(
    //     $accountId,
    //     $loginid,
    //     $pword,
    //     $pwordMatch,
    //     $firstName,
    //     $lastName,
    //     $accountType
    // ){
    //     $this->accountId = $accountId;
    //     $this->loginid = filter_var($loginid, FILTER_SANITIZE_STRING); //Change to filter email
    //     $this->pword = filter_var($pword, FILTER_SANITIZE_STRING);
    //     $this->pwordMatch = filter_var($pwordMatch, FILTER_SANITIZE_STRING);
    //     $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
    //     $this->loglastNameinid = filter_var($lastName, FILTER_SANITIZE_STRING);
    //     $this->accountType = $accountType;
    // }

    public function login($loginid, $pword) {
        //Filter Inputs again
        $loginid = filter_var($loginid, FILTER_SANITIZE_STRING);
        $pword = filter_var($pword, FILTER_SANITIZE_STRING);

        //Get account from database
        $account = $this->getLoginDetails($loginid, $pword);

        //If there is no account, send an error msg
        if($account == false){
            header('location: ?message=noAccount');
            exit();
        }else { 
            if(password_verify($pword, $account['pword'])){
                //Start a session
                session_start();
                //Assign session variables
                $_SESSION['signedin'] = true;
                $_SESSION['loginid'] = $account['loginid'];
                header('location: ../view/welcome.php');
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
        header('location: ../../public/');
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

        //Create the patient account
        $hashed_pass = password_hash($pword, PASSWORD_DEFAULT);
        
        $this->createAccount(
            $accountId,
            $loginid,
            $pword,
            $firstName,
            $lastName,
            $accountType
        );
    }
}

