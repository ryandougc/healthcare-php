<?php 

class doctorController{

    private $Array = []; 


    public function getDoctorProfile(){


        $doctor = new doctorModel();
        $doctor->getAccount();

        echo $doctor;

    
    }

    public function getOwnProfile(){

        $docModel = new doctorModel();

        $docModel->getOwnProfile(); 

        echo $profile;


    }

   
}