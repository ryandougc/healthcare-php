<?php

class SystemController extends System{
    public function checkExamResults($examId){

        //get Exam results
        $exam = $this->getExamResults($examId);

        //Split exam results into an array of words
        $examResults = explode(" ", $exam['ExamResults']);

        //Init array of keywords to seach for
        $negativeKeywords = [
            "positive", 
            "terminal",
            "corona",
            "covid-19",
            "coronavirus",
            "sick",
            "disease",
            "cancer",
            "irreversible",
            "amputate",
            "stage 4",
            "stage 3",
            "stage 2",
            "stage 1",
            "ICU",
            "illness"
        ];

        foreach($examResults as $word){
            if(in_array ($word, $negativeKeywords)){
                $doctorEmail = $this->getDoctorEmail($exam['DoctorID']);

                $emailMessage = 'A negative result was returned from an exam for one of your patients. Please click the link below to view the details. <br/>
                                <a href="http://localhost/healthcare-php/app/view/doctor/doctorHomePage.php">Here</a>';

                $emailMessage = wordwrap($emailMessage,70);

                $headers = "From: no-reply@healthcaresystem-php.com";

                mail($doctorEmail['DoctorEmail'], "Negative Exam Results", $emailMessage, $headers);
                exit();
            }
        }

    }
}