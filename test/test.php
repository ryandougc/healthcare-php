<?php

//include "../test/testModel.php";


/*
Reminder
12 is an int
'12' is a string 
do all variable type declaration here
*/


//grab info from html fields
$id = 12; 
$email = 'Email@email.com'; 
$phone = 'phone'; 
$city = 'NotVancouver'; 
$emailNotification = true; 


//through into array
$inputArr = array($id, $email, $phone, $city, $emailNotification); 

//through array into method

$model->addPatientInfo($input);
//$model->addPatientInfo($pdo);


