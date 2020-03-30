<?php

include '../../model/database.class.php';
include '../../model/account.class.php';
include '../../model/visit.class.php';
include '../../controller/visitcontroller.php';

$patient = new VisitController();

$patient->downloadPrescription('d185ccbd-2034-42ea-bedc-9fccba4a1c91');