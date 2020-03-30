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