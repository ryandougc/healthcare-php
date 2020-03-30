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
    
    private function postVistDetails($VisitID, $DoctorID, $ClinicID,
    $PatientID, $VisitDate, $DoctorNotes, $SuggestedExam){

        $sql = "INSERT INTO Visit(VisitID, DoctorID, ClinicID,
        PatientID, VisitDate, DoctorNotes, SuggestedExam) 
        VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['VisitID', 'DoctorID', 'ClinicID',
        'PatientID', 'VisitDate', 'DoctorNotes', 'SuggestedExam']);

    }

    private function postPrescription(Prescription){

        $sql = "INSERT INTO Visit(Prescription) 
        WHERE VisitID = ?
        VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['Prescription']);
        

    }

}