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

    public function searchVists(){
        
        //Query
        //Return data

    }
    
    private function postVistDetails(){

        //recieve data
        //insert into database

    }

    private function postPrescription(){

        //recieve data
        //insert into database

    }

}