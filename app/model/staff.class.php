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

    protected function postExamDetails(){

        
    }
}