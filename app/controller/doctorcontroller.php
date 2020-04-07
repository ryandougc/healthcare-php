<?php 

include '../../model/doctor.class.php';


class doctorController {


    public function getDoctorProfile($loginID){

        $doctorModel = new doctorModel();
        $doctorModel->getAccount($loginID);
        $doctorProfile = $doctorModel->getProfile();

        return $doctorProfile;
        
    }

    public function getDoctorAccount($loginID){

        $doctorModel = new doctorModel();
        $doctorAccount = $doctorModel->getAccount($loginID);

        return $doctorAccount;
        
    }

    public function updateDoctorProfile($email){

        $doctorModel = new doctorModel();
        $doctorModel->updateProfile($email);

    }

    public function updateDoctorAccount($fName, $lName, $password){

        $doctorModel = new doctorModel();
        $doctorModel->getAccount($loginID);
        $doctorModel->updateAccount($fName, $lName, $password); 

    }


    public function docSearchVists($VisitID, $loginid){
        $doctorModel = new doctorModel();
        $result = $doctorModel->SearchVists($VisitID, $loginid);

        return $result;

    }

   
}