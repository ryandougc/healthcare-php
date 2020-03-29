<?php

class Clinic extends Database {
    protected function getClinics() {
        $sql = "SELECT * FROM clinic";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll(); 
        return $results;
    }
}