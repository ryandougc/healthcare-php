<?php

class ClinicController extends Clinic {
    public function getClinicList(){
        $clinicList = $this->getClinics();

        return $clinicList;
    }
}