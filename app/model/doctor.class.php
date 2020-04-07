<?php
class doctorModel extends Database{

    public $loginID;
    private $doctorID;
    private $accountID;


    public function getAccount($temploginID) {

            $this->loginID = $temploginID;
            $sql = "SELECT * FROM ACCOUNT WHERE LoginID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->loginID]);
            
            $results = $stmt->fetch(); 
            $this->doctorID = $results['AccountID'];
            $this->accountID = $results['AccountID'];
            return $results;
        
       
    }

    public function getProfile(){
        
            $sql = "SELECT * FROM DOCTOR WHERE DoctorID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->doctorID]);
            
            $results = $stmt->fetch(); 
            return $results;

    }

    public function updateAccount($fName, $lName, $password){

        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

        
            $sql = "UPDATE ACCOUNT SET AccountPassword=?, FirstName=?, LastName=? WHERE AccountID=?"; 
            $stmt = $this->connect()->query($sql);
            $stmt->execute([$hashed_pass, $fName, $lName, $this->accountID]);
            
    }

    public function updateProfile($email){

            $sql = "UPDATE DOCTOR SET DoctorEmail=? WHERE DoctorID=?"; 
            $stmt = $this->connect()->query($sql);
            $stmt->execute([$email, $this->doctorID]);
            header ('location: ?message=updated' );
           
       
    }

    public function SearchVists($VisitID){


        $sql = "SELECT * FROM VISIT 
        WHERE VisitID = ?";
        $stmt = $this->connect()->query($sql);
        $stmt->execute([$VisitID]);
    
        $results = $stmt->fetchAll();
        return $results;
    
    }
    
    protected function postVistDetails($VisitID, $DoctorID, $ClinicID, $PatientID, $VisitDate, $Prescription, $DoctorNotes, $SuggestedExam){


        $sql = "INSERT INTO Visit(VisitID, DoctorID, ClinicID,
        PatientID, VisitDate, Prescription, DoctorNotes, SuggestedExam) 
        VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['VisitID', 'DoctorID', 'ClinicID',
        'PatientID', 'VisitDate', 'Prescription', 'DoctorNotes', 'SuggestedExam']);

    }

    protected function postPrescription($Prescription, $VistID){

        $sql = "UPDATE Visit SET Prescription = ? WHERE VisitID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['Prescription', 'VisitID']);     

    }

}