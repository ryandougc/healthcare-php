<?php

include "../test/testModel.php";


//Another possible way of handling PDO
//$database = 'mysql:localhost;port=3307;dbname=healthcare_system';
//$usr = 'dev';
//$pass = 'healthcare';
//$pdo = new PDO($database,$user,$pass);


/*
Reminder
12 is an int
'12' is a string 
do all variable type declaration here
*/
$model = new testModel(12,'pEmail@email.com', '69420', 'NotVancouver', true);


$model->addPatientInfo();
//$model->addPatientInfo($pdo);


