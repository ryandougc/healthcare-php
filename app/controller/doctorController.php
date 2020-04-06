<?php 

include '../../model/doctor.class.php';


class doctorController {


    public function getDoctorProfile($loginID){

        $doctorModel = new doctorModel($loginID);
        $doctorModel->getAccount();
        $doctorProfile = $doctorModel->getProfile();

        return $doctorProfile;

        
    }

    public function getDoctorAccount($loginID){

        $doctorModel = new doctorModel($loginID);
        $doctorAccount = $doctorModel->getAccount();

        return $doctorAccount;
        
    }

    public function updateDoctorProfile($loginID, $fName, $lName, $email, $password){

        $doctorModel = new doctorModel($loginID);
        $doctorModel->updateAccount($fName, $lName, $password); 
        $doctorModel->updateProfile($email);
        header('location: ?message=updated');

    }

   
}