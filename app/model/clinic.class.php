<?php

class Clinic extends Database {

    protected function getClinics() {
        $sql = "SELECT * FROM clinic";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll(); 
        return $results;
    }

    protected function findClinic($clinicID){

        $sql = "SELECT * FROM clinic WHERE ClinicID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$clinicID]);

        $results = $stmt->fetchAll(); 
        return $results;

    }
}