<?php

include "../app/model/database.class.php";

Class testModel {

    public $Array; 

    public function addPatientInfo($inputArray) {

        $database = new Database();

        $this->Array = $inputArray;

                try{    
                        
                        $sql = "INSERT INTO PATIENT (PatientID, PatientEmail, PatientPhone, PatientAddress, EmailNotifications) 
                                VALUES (:ID, :Email, :Phone, :Adr , :Notif) ";

                        
                        $stmt = $this->connect()->prepare($sql);

                        $stmt->bindParam(':ID', $this->inputArray[0], PDO::PARAM_INT); 
                        $stmt->bindParam(':Email', $this->inputArray[1], PDO::PARAM_STR);
                        $stmt->bindParam(':Phone', $this->inputArray[2], PDO::PARAM_STR);
                        $stmt->bindParam(':Adr', $this->inputArray[3], PDO::PARAM_STR);
                        $stmt->bindParam(':Notif', $this->inputArray[4], PDO::PARAM_BOOL);
                        $stmt->execute();

                        echo "statement executed";

                    } catch (PDOException $e) {
                        throw new PDOException($e->getMessage(), (int)$e->getCode());
                }

    }


}