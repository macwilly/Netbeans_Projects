<?php

include './signClass.php';

$fileType = pathinfo(basename($_FILES["csvFile"]["name"]), PATHINFO_EXTENSION);
if($fileType != 'csv'){
    $url = '../pages/csvError.php?type=1&error=notcsv';
}

header('Location: ' . $url);