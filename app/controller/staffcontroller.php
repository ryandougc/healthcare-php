<?php

class StaffController extends Staff{

    private $Array = []; 


    public function getStaffProfile(){


        $staff = new staff();
        $staff->getStaffAccount();

        echo $staff;

    
    }

    public function getOwnProfile(){

        $staffModel = new staff();

        $staffProfile->getOwnProfile(); 

        echo $staffProfile;


    }

    public function postExamDetails($PatientID, 
    $DoctorID, 
    $ExamDate, 
    $ExamSubject
    ){
        //Put data in database
        $this->postExamDetails($PatientID, 
        $DoctorID, 
        $ExamDate, 
        $ExamSubject
        );
    }

    public function postExamResults($PatientID, 
    $DoctorID, 
    $ExamDate, 
    $ExamSubject, 
    $ExamResults
    ){
        $this->postExamResults($PatientID, 
        $DoctorID, 
        $ExamDate, 
        $ExamSubject, 
        $ExamResults
    );
    }

}