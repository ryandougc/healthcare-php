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

    protected function getAccount($accountId) {
        try{
            $sql = "SELECT * FROM account WHERE AccountID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountId]);

            $results = $stmt->fetch(); 
            return $results;
        }
        catch(PDOException $e){
            echo "Error in query 'getAccountDetails': " . $e->getMessage();
            exit();
        }
    }

    protected function getAccounts(){
        try{
            $sql = "SELECT * FROM account";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(); 
            return $results;
        }
        catch(PDOException $e){
            echo "Error in query 'getAccountList': " . $e->getMessage();
            exit();
        }
    }

    protected function delAccount($accountId){
        try{
            $sql = "DELETE FROM account WHERE AccountID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountId]);
        }
        catch(PDOException $e){
            echo "Error in query 'delAccount': " . $e->getMessage();
            exit();
        }
    }

    protected function delPatient($accountId){
        try{
            $sql = "DELETE FROM patient WHERE PatientID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountId]);
        }
        catch(PDOException $e){
            echo "Error in query 'delPatient': " . $e->getMessage();
            exit();
        }
    }

    protected function delDoctor($accountId){
        try{
            $sql = "DELETE FROM doctor WHERE DoctorID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountId]);
        }
        catch(PDOException $e){
            echo "Error in query 'delDoctor': " . $e->getMessage();
            exit();
        }
    }

    protected function delStaff($accountId){
        try{
            $sql = "DELETE FROM staff WHERE StaffID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountId]);
        }
        catch(PDOException $e){
            echo "Error in query 'delStaff': " . $e->getMessage();
            exit();
        }
    }

    protected function putAccount(
        $accountId,
        $loginid,
        $hashed_pass,
        $firstName,
        $lastName
    ){
        try{
            $sql = "UPDATE account 
                    SET 
                        LoginID = ?,
                        AccountPassword = ?,
                        FirstName = ?,
                        LastName = ?
                    WHERE AccountID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([        
                $loginid,
                $hashed_pass,
                $firstName,
                $lastName,
                $accountId
            ]);
        }
        catch(PDOException $e){
            echo "Error in query 'createPatientProfile': " . $e->getMessage();
            exit();
        }
    }
}