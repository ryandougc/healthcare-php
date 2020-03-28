<?php

class Admin extends Account {
    protected function createDoctorProfile(
        $accountId,
        $doctorEmail,
        $doctorClinicSelect
    ){
        try{
            $sql = "INSERT INTO doctor(DoctorID, ClinicID, DoctorEmail) VALUES(?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountId, $doctorClinicSelect, $doctorEmail]);
        }
        catch(PDOException $e){
            echo "Error in query 'createDoctorProfile': " . $e->getMessage();
            exit();
        }
    }

    protected function createStaffProfile(
        $accountId,
        $staffClinicSelect
    ){
        try{
            $sql = "INSERT INTO staff(StaffID, ClinicID) VALUES(?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountId, $staffClinicSelect]);
        }
        catch(PDOException $e){
            echo "Error in query 'createDoctorProfile': " . $e->getMessage();
            exit();
        }
    }

    protected function createPatientProfile(
        $accountId,
        $patientEmail,
        $patientPhone,
        $patientAddress,
        $patientCity,
        $patientProvince,
        $patientPostCode,
        $emailNotifications
    ){
        try{
            $sql = "INSERT INTO patient(PatientID, PatientEmail, PatientPhone, PatientAddress, PatientCity, PatientProvince, PatientPostCode, EmailNotifications) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountId, $patientEmail, $patientPhone, $patientAddress, $patientCity, $patientProvince, $patientPostCode, $emailNotifications]);
        }
        catch(PDOException $e){
            header('location: /healthcare-php/app/view/adminCreateAccount.php?message=pdoError');
            echo "Error in query 'createDoctorProfile': " . $e->getMessage();
            exit();
        }
    }
}