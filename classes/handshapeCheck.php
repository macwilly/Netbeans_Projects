<?php

include './handShapeClass.php';
session_start();

$target_dir = "../images/handshape/";

$description = filter_input(INPUT_POST, 'inputHSDescription', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$eDescription = filter_input(INPUT_POST, 'inputHSEMBRDescription', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$active = filter_input(INPUT_POST, 'optionsActive', FILTER_SANITIZE_NUMBER_INT);
$fileName = basename($_FILES["handshapeImage"]["name"]);
$inEd = $_POST["insertEdit"];
if ($inEd == 2) {
    $hsi = $_POST["handshapeId"];
}

if ($fileName != "") { // there is a file name 
    $target_file = $target_dir . basename($_FILES["handshapeImage"]["name"]);
    $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $uploadOk = checkImage($fileType);
} else {//there is not a file name 
    if ($inEd == 1) { // inserting a new handshape
        $fileName = "na";
        $uploadOk = 1;
    } else {//updating a handshape
        $uploadOk = 1;
        $fileName = "na";
    }
}



//print_r($_POST);
//we do not check to see if the file already exists  just allow users to overwrite

if ($uploadOk == 1 && $inEd == 1 && $fileName != "na") {
    //add the handshap to the database first
    if (insertHS($description, $eDescription, $fileName, $active)) {
        if (move_uploaded_file($_FILES["handshapeImage"]["tmp_name"], $target_file)) {
            $url = "../pages/handshapes.php";
        } else {
            deleteHS($description, $eDescription, $fileName, $active);
            $url = "../pages/handshape.php?error=1";
        }
    }
} elseif ($uploadOk == 1 && $inEd == 1 && $fileName == "na") {//inserting a new handshape with no image
    if (insertHS($description, $eDescription, $fileName, $active)) {
        $url = "../pages/handshapes.php";
    } else {
        $url = "../pages/handshape.php?error=1";
    }
} elseif ($uploadOk == 1 && $inEd == 2 && $fileName != "na") {//updating an handshape with image
    //update the handshape
    if (updateHSImage($hsi, $description, $eDescription, $fileName, $active)) {
        //add the file
        if (move_uploaded_file($_FILES["handshapeImage"]["tmp_name"], $target_file)) {
            $url = "../pages/handshapes.php";
        } else {
//            deleteHS($description, $eDescription, $fileName, $active);
            $url = "../pages/handshape.php?error=1";
        }
    }
} elseif ($uploadOk == 1 && $inEd == 2 && $fileName == "na") {//updating handshape and there was no change to the image
    if (updateHS($hsi, $description, $eDescription, $active)) {
        $url = "../pages/handshapes.php";
    } else {
        $url = "../pages/handshape.php?error=1";
    }
} else {
    $url = "../pages/handshape.php?error=2";
}

//go to location
header("Location: " . $url);

function insertHS($_description, $_eDescription, $_fileName, $_active) {
    $hs = new handShapeClass($_description, $_eDescription, $_fileName, $_active);
    $ok = $hs->insertHandShape();
    return $ok;
}

function deleteHS($_description, $_eDescription, $_fileName, $_active) {
    $hs = new handShapeClass($_description, $_eDescription, $_fileName, $_active);
    $hs->deleteHandshape();
}

function updateHSImage($_hsi, $_description, $_eDescription, $_fileName, $_active) {
    $hs = new handShapeClass($_hsi);
    $hs->set_description($_description);
    $hs->set_embrDescription($_eDescription);
    $hs->set_imageLocation($_fileName);
    $hs->set_active($_active);
    $ok = $hs->updateHandShapeImage();
    return $ok;
}

function updateHS($_hsi, $_description, $_eDescription, $_active) {
    $hs = new handShapeClass($_hsi);
    $hs->set_description($_description);
    $hs->set_embrDescription($_eDescription);
    $hs->set_active($_active);
    $ok = $hs->updateHandShape();
    return $ok;
}

function checkImage($fileType) {

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

    return $uploadOk;
}
