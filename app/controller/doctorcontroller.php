<?php 

class doctorController{

    private $Array = []; 


    public function getDoctorProfile($inputArray){

        //recieve array of data
        $this->Array = $inputArray; 

        $docModel = new doctorModel();

        //pass array to method
        $docModel->getDoctorProfile($Array);

        //send data to views
        
        

    }

    public function getOwnProfile(){

        $docModel = new doctorModel();

        $docModel->getOwnProfile(); 

        echo $profile;


    }

   
}