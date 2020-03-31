<?php
class doctorModel extends Database{

    private $doctorID;
    private $accountID;
    private $loginID;
    private $firstName;
    private $lastName;
    private $clinicID;
    private $doctorEmail;

    public function getAccount($temploginID) {

        $this->loginID = $temploginID;

        try{
          
            $sql = "SELECT * FROM ACCOUNT WHERE LoginID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->loginID]);
            
            $results = $stmt->fetch(); 
            $this->accountID = $results['AccountID'];
            $this->doctorID = $results['AccountID'];
            $this->loginID = $results['LoginID'];
            $this->firstName = $results['FirstName'];
            $this->lastName = $results['LastName'];

        }
        catch(PDOException $e){
            echo "Error in query 'getAccount': " . $e->getMessage();
            exit();
        }
    }

    public function getDoctorProfile(){
        
        try{
            $sql = "SELECT * FROM DOCTOR WHERE DoctorID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->doctorID]);
            
            $results = $stmt->fetch(); 
            $this->clinicID = $results['ClinicID'];
            $this->doctorEmail = $results['DoctorEmail'];
        }
        catch(PDOException $e){
            echo "Error in query 'getDoctorProfile': " . $e->getMessage();
            exit();
        }

    }

    public function getDoctorName(){

        $DoctorName = $this->firstName . $this->lastName; 
        return $DoctorName; 
    }

    public function getDoctorEmail(){

        return $this->doctorEmail;

    }

    protected function updateAccount($fName,$lname, $password){

        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

        try{
            $sql = "UPDATE ACCOUNT SET AccountPassword' = ?, 'FirstName' = ?, 'LastName' = ? WHERE 'DoctorID' = ?"; 
            $stmt = $this->connect()->query($sql);
            $stmt->execute([$hashed_pass, $fName, $lName, $this->accountID]);
            
        } catch(PDOException $e){
            echo "Error in query 'docSearchVists': " . $e->getMessage();
            exit();
        }


    }

    protected function updateDoctorProfile($email, $clinic){

        try{
            $sql = "UPDATE DOCTOR SET 'ClinicID' = ?, 'DoctorEmail' = ? WHERE 'DoctorID' = ?"; 
            $stmt = $this->connect()->query($sql);
            $stmt->execute([$clinic, $email, $this->accountID]);

        } catch(PDOException $e){
            echo "Error in query 'docSearchVists': " . $e->getMessage();
            exit();
        }

       
    }

    public function docSearchVists($VisitID){

    try{
        $sql = "SELECT * FROM VISIT 
        WHERE VisitID = ?";
        $stmt = $this->connect()->query($sql);
        $stmt->execute(['VisitID']);
    
        $results = $stmt->fetchll();
        return $results;
    }
    catch(PDOException $e){
        echo "Error in query 'docSearchVists': " . $e->getMessage();
        exit();
    }
    }
    
    protected function postVistDetails($VisitID, $DoctorID, $ClinicID,
    $PatientID, $VisitDate, $Prescription, $DoctorNotes, $SuggestedExam){

    try{
        $sql = "INSERT INTO Visit(VisitID, DoctorID, ClinicID,
        PatientID, VisitDate, Prescription, DoctorNotes, SuggestedExam) 
        VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['VisitID', 'DoctorID', 'ClinicID',
        'PatientID', 'VisitDate', 'Prescription', 'DoctorNotes', 'SuggestedExam']);
    }
    catch(PDOException $e){
        echo "Error in query 'postVistDetails': " . $e->getMessage();
        exit();
    }
    }

    protected function postPrescription($Prescription, $VistID){
    try{
        $sql = "UPDATE Visit SET Prescription = ? WHERE VisitID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['Prescription', 'VisitID']);      
    }
    catch(PDOException $e){
        echo "Error in query 'postPrescription': " . $e->getMessage();
        exit();
    } 
    }

}