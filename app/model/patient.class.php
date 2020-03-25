<?php

class Patient extends Account {
    public function createPatientProfile($patientId, $email, $phone, $address, $emailNotifications) {
        try{
            $sql = "INSERT INTO patient(PatientID, PatientEmail, PatientPhone, PatientAddress, EmailNotifications) VALUES(?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$patientId, $email, $phone, $address, $emailNotifications]);
        }
        catch(PDOException $e){
            echo "Error in query 'createPatientProfile': " . $e->getMessage();
            exit();
        }
    }

    public function getProfile($loginid){
        $sql = "SELECT * FROM patient WHERE PatientEmail = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$loginid]);

        $results = $stmt->fetch(); 
        return $results;
    }
}