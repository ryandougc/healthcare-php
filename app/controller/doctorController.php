<?php 

include '../../model/doctor.class.php';

class doctorController {


    public function getDoctorProfile($loginID){

        $doctorModel = new doctorModel();
        $doctorModel->getAccount($loginID);
        $doctorProfile = $doctorModel->getDoctorProfile();
        return $doctorProfile; 
        
    }

    public function getEmail($loginID){

        $doctorModel = new doctorModel();
        $doctorModel->getAccount($loginID);
        $doctorModel->getDoctorProfile();
        $docEmail = $doctorModel->getDoctorEmail();
        return $docEmail;
    }

    public function updateDoctorProfile($fName, $lName, $email, $clinic){

        $doctorModel = new doctorModel();
        $doctor->updateAccount($fName, $lName, $password); 
        $doctor->updateDoctorProfile($email, $clinic);

    }

   
}