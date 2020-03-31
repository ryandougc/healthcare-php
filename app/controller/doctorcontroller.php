<?php 

include '../../model/doctor.class.php';

class doctorController {


    public function getDoctorProfile($loginID){

        $doctorModel = new doctorModel();
        $doctor = $doctorModel->getAccount($loginID);
        return $doctor;

    }

    public function getEmail(){

        
        $doctor = new doctorModel();
        $email = $doctor->getEmail();

        return $email;

    
    }

    public function updateDoctorProfile($fName, $lName, $email, $clinic){

        $doctorModel = new doctorModel();
        $doctor->updateDoctorProfile($fName, $lName, $email, $clinic);

    }

   
}