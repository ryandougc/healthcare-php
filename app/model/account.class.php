<?php

class Account extends Database{
    protected function getLoginDetails($loginid) {
        $sql = "SELECT loginid, pword FROM account WHERE loginid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$loginid]);

        $results = $stmt->fetch(); 
        return $results;
    }

    protected function createAccount($loginid, $pword) {
        $sql = "INSERT INTO account(loginid, pword) VALUES (?, ?) ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$loginid, $pword]);
    }
}