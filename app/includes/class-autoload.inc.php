<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader ($className) {
    $path1 = 'model/';
    $extension1 = '.class.php';
    $fileName1 = $path1 . $className . $extension1;

    $path2 = 'controller/';
    $extension2 = '.php';
    $fileName2 = $path2 . $className . $extension2;

    $fileNameArray = [$fileName1, $fileName2];

    for($i=1;$i<=sizeof($fileNameArray);$i++){
        if(!file_exists($fileNameArray[$i])) {
            return false;
        }

        include_once $path[$i] . $className . $extension[$i];
    }
}