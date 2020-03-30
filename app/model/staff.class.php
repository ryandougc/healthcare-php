<?php
class staff extends Database{

    public function searchVists($VisitID){

        $sql = "SELECT * FROM VISIT 
        WHERE VisitID = ?";
        $stmt = $this->connect()->query($sql);
        $stmt->execute(['VisitID']);
        
        $results = $stmt->fetchll();
        return $results;

    }

    protected function postExamDetails($PatientID, $DoctorID, $ExamDate, $ExamSubject){

        $sql = "INSERT INTO EXAM_RESULTS(PatientID, DoctorID, ExamDate, ExamSubject) 
        VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['PatientID', 'DoctorID', 'ExamDate', 'ExamSubject']);
    }

    protected function postExamResults($PatientID, $DoctorID, $ExamDate, $ExamSubject, $ExamResults){

        $sql = "UPDATE EXAM_RESULTS SET ExamResults = ? WHERE PatientID = ?, DoctorID = ?, ExamDate = ?, ExamSubject = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['PatientID', 'DoctorID', 'ExamDate', 'ExamSubject', 'ExamResults']);
    }
}