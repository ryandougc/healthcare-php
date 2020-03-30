<?php

class VisitController extends Visit{
    public function downloadPrescription($visitId){

        $visit = $this->getVisist($visitId);

        //Get pdf file name
        $filename = $visit['Prescription'];

        //Set header type to pdf 
        header("Content-type:application/pdf");

        //Set the name of the file to be downloaded
        header("Content-Disposition:attachment;filename=". $filename);

        // The PDF source is in original.pdf
        readfile("../../prescriptions/". $filename);

    }
}