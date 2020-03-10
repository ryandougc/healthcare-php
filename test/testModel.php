<?php


Class testModel {

    public $PatientID;
    public $PatientEmail;
    public $PatientPhone;
    public $PatientAddress;
    public $EmailNotifications;


    public function __construct($pID, $pEmail, $pPhone, $pAdr, $pBoolean) {

        $this->PatientID = $pID;
        $this->PatientEmail = $pEmail;
        $this->PatientPhone = $pPhone;
        $this->PatientAddress = $pAdr;
        $this->EmailNotifications = $pBoolean;
    
        
    }


    public function addPatientInfo() {

                try{    
                        //Change port number to 3306 before executing
                        $pdo = new PDO('mysql:localhost;port=3307;dbname=healthcare_system', 'dev', 'healthcare');
                        $stmt = $pdo->prepare("INSERT INTO PATIENT (PatientID, PatientEmail, PatientPhone, PatientAddress, EmailNotifications) 
                                                VALUES (:ID, :Email, :Phone, :Adr , :Notif) ");


                        //PDO::PARAM does automatic sanitization 
                        $stmt->bindParam(':ID', $this->PatientID, PDO::PARAM_INT); 
                        $stmt->bindParam(':Email', $this->PatientEmail, PDO::PARAM_STR);
                        $stmt->bindParam(':Phone', $this->PatientPhone, PDO::PARAM_STR);
                        $stmt->bindParam(':Adr', $this->PatientAddress, PDO::PARAM_STR);
                        $stmt->bindParam(':Notif', $this->EmailNotifications, PDO::PARAM_BOOL);
                        $stmt->execute();

                        echo "statement executed";

                    } catch (PDOException $e) {
                        throw new PDOException($e->getMessage(), (int)$e->getCode());
                }

    }


}