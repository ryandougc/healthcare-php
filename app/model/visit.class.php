<?php

class Visit extends Database{
    protected function getVisist($visitId){
        try{
            $sql = "SELECT * FROM visit WHERE VisitID = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$visitId]);

            $results = $stmt->fetch(); 
            return $results;
        }
        catch(PDOException $e){
            echo "Error in query 'getDetails': " . $e->getMessage();
            exit();
        }
    }
}