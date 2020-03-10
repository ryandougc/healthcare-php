<?php

class AccountController extends Account{
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

    public function GUID() {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}

