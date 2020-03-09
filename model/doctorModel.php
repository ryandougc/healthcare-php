<?php
class doctorModel extends Database{

    public $doctorID;
    public $clinicID;
    public $doctorEmail;


    public function __construct($doctorID, $clinicID, $doctorEmail){
        $this->doctorID = $doctorID;
        $this->clinicID = $clinicID; 
        $this->doctorEmail = $doctorEmail;  
         
    }



    
}



?>