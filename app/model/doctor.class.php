<?php
class doctorModel extends Database{

    private $doctorID;
    private $clinicID;
    private $doctorEmail;


    public function intializeOwnProfile(){

        //Query
        $this->$doctorID = $tempDoctorID;
        $this->clinicID = $tempClinicID;
        $this->doctorEmail = $tempEmail; 

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


    public function retrieveDoctorProfile() {

        //Query
        //Return data

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