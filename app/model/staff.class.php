<?php
class staff extends Database{

    private $staffID;
    private $clinicID;

    public function intializeOwnProfile(){

        //Query
        $this->$satffID = $tempstaffID;
        $this->clinicID = $tempClinicID;

    }

    protected function getStaffAccount($accountId) {
        try{
            $sql = "SELECT * FROM account WHERE AccountID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$accountId]);

            $results = $stmt->fetch(); 
            return $results;
        }
        catch(PDOException $e){
            echo "Error in query 'getAccountDetails': " . $e->getMessage();
            exit();
        }
    }

    public function staffSearchVists($VisitID){

        $sql = "SELECT * FROM VISIT 
        WHERE VisitID = ?";
        $stmt = $this->connect()->query($sql);
        $stmt->execute(['VisitID']);
        
        $results = $stmt->fetchll();
        return $results;

    }

    protected function postExamDetails($PatientID, $DoctorID, $ExamDate, $ExamSubject){

        $sql = "INSERT INTO EXAM(PatientID, DoctorID, ExamDate, ExamSubject) 
        VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['PatientID', 'DoctorID', 'ExamDate', 'ExamSubject']);
    }

    protected function postExamResults($PatientID, $DoctorID, $ExamDate, $ExamSubject, $ExamResults){

        $sql = "UPDATE EXAM SET ExamResults = ? WHERE PatientID = ?, DoctorID = ?, ExamDate = ?, ExamSubject = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['PatientID', 'DoctorID', 'ExamDate', 'ExamSubject', 'ExamResults']);
    }
}