<?php

function checkAccountExists($username){
    global $db;
    $query = "SELECT loginid FROM account
                WHERE loginid = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $count = $statement->rowCount();
    $statement->closeCursor();
    return $count;
}

function findAccount($loginid, $password){
    global $db;
    $query = "SELECT loginid, pword FROM account
                WHERE loginid = :loginid";
    if($statement = $db->prepare($query)){
        $statement->bindValue(':loginid', $loginid);
        if($statement->execute()){
            if($user = $statement->fetch()){
                $statement->closeCursor();
                return $user;
            }
        }
    }
    return NULL;
}

function checkPasswords($password, $hashed_pword){
    if(password_verify($password, $hashed_pword)){
        return true;
    }else {
        return false;
    }
}

?>