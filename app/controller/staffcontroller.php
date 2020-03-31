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

}