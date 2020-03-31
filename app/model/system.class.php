<?php

class System extends Database{
    protected function getExamResults($examId){
        try{
            $sql = "SELECT ExamResults, DoctorID FROM EXAM WHERE ExamID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$examId]);

            $results = $stmt->fetch(); 
            return $results;
        }
        catch(PDOException $e){
            echo "Error in query 'getExamResults': " . $e->getMessage();
            exit();
        }
    }

    protected function getDoctorEmail($doctorId){
        try{
            $sql = "SELECT DoctorEmail FROM DOCTOR WHERE DoctorID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$doctorId]);

            $results = $stmt->fetch(); 
            return $results;
        }
        catch(PDOException $e){
            echo "Error in query 'getDoctorEmail': " . $e->getMessage();
            exit();
        }
    }
}