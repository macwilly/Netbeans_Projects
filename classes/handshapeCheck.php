<?php

include './handshapeClass.php';
session_start();

$target_dir = "../images/";

$description = filter_input(INPUT_POST, 'inputHSDescription', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$eDescription = filter_input(INPUT_POST, 'inputHSEMBRDescription', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$active = filter_input(INPUT_POST, 'optionsActive', FILTER_SANITIZE_NUMBER_INT);
$fileName = basename($_FILES["handshapeImage"]["name"]);
$target_file = $target_dir . basename($_FILES["handshapeImage"]["name"]);
$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
$uploadOk = 0;

//print_r($_POST);
//we do not check to see if the file already exists  just allow users to overwrite

//echo 'here';
$check = getimagesize($_FILES["handshapeImage"]["tmp_name"]);
if ($check !== FALSE) {
    //it is a file
    $uploadOk = 1;
} else {
    //not a file through an error 
    $uploadOk = 2;
}



if ($_FILES["handshapeImage"]["size"] > 2000000) {
    //file size is to large
    $uploadOk = 3;
}

if ($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png" && $fileType != "gif") {
    //not a file that we are looking for
    $uploadOk = 4;
}


if ($uploadOk == 1) {
    //add the file to the database first
    if(insertHS($description,$eDescription,$fileName,$active)){
        if(move_uploaded_file($_FILES["handshapeImage"]["tmp_name"],$target_file)){
            $url = "../pages/handshapes.php";
        }else{
            deleteHS($description,$eDescription,$fileName,$active);
            $url = "../pages/handshape.php?error=1";
        }
    }
} else {
    $url = "../pages/handshape.php?error=2";
}

header("Location: " . $url);

function insertHS($_description, $_eDescription, $_fileName,$_active) {
    $hs = new handShapeClass($_description, $_eDescription, $_fileName,$_active);
    $ok = $hs->insertHandShape();
    return $ok;
}

function deleteHS($_description, $_eDescription, $_fileName,$_active) {
    $hs = new handShapeClass($_description, $_eDescription, $_fileName,$_active);
    $hs->deleteHandshape();
}
