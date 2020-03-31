<?php
class doctorModel extends Database{

    private $doctorID;
    private $firstName;
    private $lastName;
    private $clinicID;
    private $doctorEmail;

    public function getAccount($loginID) {
        try{
           
            $sql = "SELECT * FROM account WHERE AccountID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$loginID]);

            $results = $stmt->fetch(); 
            return $results;
        }
        catch(PDOException $e){
            echo "Error in query 'getAccountDetails': " . $e->getMessage();
            exit();
        }
    }

    protected function getDoctorProfile(){

        $doctorID;
        $firstName;
        $lastName;
        $clinicID;
        $doctorEmail;

    }

    protected function getDoctorEmail(){

       $email = $this->doctorEmail;
       return $email; 
    }

    protected function updateDoctorProfile(){



    }

    public function searchVists($VisitID){
        $sql = "SELECT * FROM VISIT 
        WHERE VisitID = ?";
        $stmt = $this->connect()->query($sql);
        $stmt->execute(['VisitID']);
        $names = $stmt->fetchll();

        foreach($names as $name)
        {
        echo $row['ClincID'].'<br>';
        echo $row['PatientID'].'<br>';
        echo $row['VisitDate'].'<br>';
        echo $row['Prescription'].'<br>';
        echo $row['DoctorNotes'].'<br>';
        echo $row['SuggestedExam'].'<br>';
        }

    }
    
    private function postVistDetails(){

        //recieve data
        //insert into database

    }

    private function postPrescription(){

        //recieve data
        //insert into database
        $sql = "INSERT Prescription FROM VISIT WHERE Prescription = ?";
        $stmt = $this->connect()->prepare($sql);
        

    }

}