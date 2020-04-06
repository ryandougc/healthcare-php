<?php

class ClinicController extends Clinic {
    public function getClinicList(){
        $clinicList = $this->getClinics();

        return $clinicList;
    }

    public function getClinicInfo($clinicID){
        $clinicInfo = $this->findClinic($clinicID);

        return $clinicInfo;
        
    }
}