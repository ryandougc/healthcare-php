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
                $_SESSION['accID'] = $account['AccountID'];
                $_SESSION['accType'] = $account['AccountType'];
                $_SESSION['firstName'] = $account['FirstName'];
                $_SESSION['lastName'] = $account['LastName'];
                
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


}

