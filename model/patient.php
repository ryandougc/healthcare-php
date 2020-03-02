<?php

function createPatient($username, $hashed_pass){
    global $db;
    $query = "INSERT INTO account (loginid, pword)
                VALUES (:username, :hashed_pass)";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':hashed_pass', $hashed_pass);
    $statement->execute();
    $statement->closeCursor();
}

?>