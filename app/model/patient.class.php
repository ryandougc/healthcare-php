<?php

class Patient extends Account {
    public function createPatientProfile($patientId, $email, $phone, $address, $city, $province, $postCode, $emailNotifications) {
        try{
            $sql = "INSERT INTO patient(PatientID, PatientEmail, PatientPhone, PatientAddress, PatientCity, PatientProvince, PatientPostCode, EmailNotifications) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$patientId, $email, $phone, $address, $city, $province, $postCode, $emailNotifications]);
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

    protected function checkPatientExists($patientId) {
        $sql = "SELECT PatientID FROM patient WHERE PatientID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$patientId]);

        $results = $stmt->fetch(); 
        return $results;
    }

    public function putPatientProfile($patientId, $phone, $address, $city, $province, $postCode, $emailNotifications) {
        try{
            $sql = "UPDATE patient 
                    SET 
                        PatientPhone = ?,
                        PatientAddress = ?,
                        PatientCity = ?,
                        PatientProvince = ?,
                        PatientPostCode = ?,
                        EmailNotifications = ?
                    WHERE PatientID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$phone, $address, $city, $province, $postCode, $emailNotifications, $patientId]);
        }
        catch(PDOException $e){
            echo "Error in query 'createPatientProfile': " . $e->getMessage();
            exit();
        }
    }

    public function patientSearchVists($VisitID){

        $sql = "SELECT PatientID, VisitDate, Prescription, SuggestedExam
        FROM VISIT 
        WHERE VisitID = ?";
        $stmt = $this->connect()->query($sql);
        $stmt->execute(['VisitID']);
        
        $results = $stmt->fetchll();
        return $results;

    }
}