<?php

    //include all of the controllers and models
include '../../model/database.class.php';
include '../../model/system.class.php';
include '../../controller/systemcontroller.php'; 


$testing = new systemController();
$testing->checkExamResults('efb735ba-c3d8-441e-98bc-1d30d614ebf2');

?>