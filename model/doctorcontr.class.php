<?php

class DoctorContr extends Account{
    public function login($loginid, $pword) {
            //Get account from database
            $account = $this->getLoginDetails($loginid, $pword);

            //If there is no account, send an error msg
            if($account == false){
                header('location: index.php?message=noAccount');
                exit();
            }else { 
                if(password_verify($pword, $account['pword'])){
                    //Start a session
                    session_start();
                    //Assign session variables
                    $_SESSION['signedin'] = true;
                    $_SESSION['loginid'] = $account['loginid'];
                    header('location: home/welcome.php');
                    exit();
                }else {
                    header('location: index.php?message=passwordIncorrect');
                    exit();
                }
            }
    }

    public function logout(){
        session_start();
        $_SESSION[] = array();
        session_destroy();
        header('location: signedout.php');
    }
}