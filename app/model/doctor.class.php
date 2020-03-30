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

    public function getOwnProfile(){

        $profile = array($this->doctorID, $this->clincID, $this->doctorEmail);


        return $profile;

    }


    public function retrieveDoctorProfile() {

        //Query
        //Return data

    }

    public function searchVists($VisitID){

        $sql = "SELECT * FROM VISIT 
        WHERE VisitID = ?";
        $stmt = $this->connect()->query($sql);
        $stmt->execute(['VisitID']);
        
        $results = $stmt->fetchll();
        return $results;

    }
    
    protected function postVistDetails($VisitID, $DoctorID, $ClinicID,
    $PatientID, $VisitDate, $Prescription, $DoctorNotes, $SuggestedExam){

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