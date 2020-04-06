<?php

class Clinic extends Database {

    protected function getClinics() {
        $sql = "SELECT * FROM clinic";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll(); 
        return $results;
    }

    public function findClinic($tempclinicID){

        $clinicID = $tempclinicID;
        $sql = "SELECT clinic.ClinicID, clinic.ClinicAddress, clinic.ClinicCity, clinic.ClinicProvince, clinic.ClinicPostCode, clinic.ClinicPhone 
                FROM clinic INNER JOIN doctor ON clinic.ClinicID=?" ;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$clinicID]);

        $results = $stmt->fetchAll(); 
        return $results;

    }
}