<?php

class Account extends Database{
    protected function getLoginDetails($loginid) {
        $sql = "SELECT * FROM account WHERE LoginID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$loginid]);

        $results = $stmt->fetch(); 
        return $results;
    }

    protected function createAccount($accountid, $loginid, $pword, $firstName, $lastName, $accountType) {
        try{
            $sql = "INSERT INTO account(AccountID, LoginID, AccountPassword, FirstName, LastName, AccountType) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountid, $loginid, $pword, $firstName, $lastName, $accountType]);
        }
        catch(PDOException $e){
            echo "Error in query 'createAccount': " . $e->getMessage();
            exit();
        }
    }

    protected function generateGUID() {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}