<?php

session_start();

include './signClass.php';
include './sign_attributeClass.php';

$target_dir_start = "../images/sign/startImg/";
$target_dir_end = "../images/sign/endImg/";

$gloss = strtoupper(filter_input(INPUT_POST, 'inputgloss', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED));
$english = filter_input(INPUT_POST, 'inputenglish', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$asllvdLink = filter_input(INPUT_POST, 'inputasllvd');
$fish = filter_input(INPUT_POST, 'optionsFinished', FILTER_SANITIZE_NUMBER_INT);
$hand = filter_input(INPUT_POST, 'optionsHandedness', FILTER_SANITIZE_NUMBER_INT);
$embr = filter_input(INPUT_POST, 'embrtext');
$domStart = filter_input(INPUT_POST, 'sdh');
$domEnd = filter_input(INPUT_POST, 'edh');
$nonDomStart = filter_input(INPUT_POST, 'sndh');
$nonDomEnd = filter_input(INPUT_POST, 'endh');
$startFile = basename($_FILES["startImage"]["name"]);
$endFile = basename($_FILES["endImage"]["name"]);
$inEd = filter_input(INPUT_POST, 'insertEdit', FILTER_SANITIZE_NUMBER_INT);
$relatedSign = $_POST['relatedsigns'];
// || $relatedSign = implode(',', $_POST['relatedsigns']);
$numOfAtt = filter_input(INPUT_POST, 'numberOfAttributes', FILTER_SANITIZE_NUMBER_INT);
$attList = array();
$attPropList = array();

//checking to see if there are active attributes
if ($numOfAtt > 0) {
    //loop through the number of potential attributes
    for ($i = 1; $i <= $numOfAtt; $i++) {
        if ($_POST['selAttr' . $i] != 'none') {
            array_push($attList, $_POST['selAttr' . $i]);
            array_push($attPropList, $_POST['attrProp' . $i]);
        }
    }
}


//checking the files. 
if ($startFile != "") {
    $target_file_start = $target_dir_start . basename($_FILES["startImage"]["name"]);
    $fileTypeStart = pathinfo($target_file_start, PATHINFO_EXTENSION);
    $startImg = getimagesize($_FILES["startImage"]["tmp_name"]);
    $startSize = $_FILES["startImage"]["size"];
    $startOk = checkImage($fileTypeStart, $startImg, $startSize);
} else {
    $startOk = 1;
    $startFile = "na";
}

if ($endFile != "") {
    $target_file_end = $target_dir_end . basename($_FILES["endImage"]["name"]);
    $fileTypeEnd = pathinfo($target_file_end, PATHINFO_EXTENSION);
    $endImg = getimagesize($_FILES["endImage"]["tmp_name"]);
    $endSize = $_FILES["endImage"]["size"];
    $endOk = checkImage($fileTypeEnd, $endImg, $endSize);
} else {
    $endOk = 1;
    $endFile = "na";
}

if($inEd == 1 && ($startOk == 1 && $startFile == "na")&&($endOk == 1 && $endFile == "na")){
    //adding a new sign and everything is okay and there are no images
    $url = insertSign($gloss,$english,$asllvdLink,$fish,$hand,$embr,$domStart,$domEnd,$nonDomStart,$nonDomEnd,$startFile,$endFile);
} elseif($inEd ==1 && ($startOk == 1 && $startFile != "na")&&($endOk == 1 && $endFile != "na")){
    $url = insertSign($gloss,$english,$asllvdLink,$fish,$hand,$embr,$domStart,$domEnd,$nonDomStart,$nonDomEnd,$startFile,$endFile);
    if($url == '../pages/signList.php'){
        
    }
}

function insertSign($g,$e,$a,$f,$h,$embr,$ds,$de,$nds,$nde,$sf,$ef){
    $s = new sign($embr,$g,$ds,$de,$nds,$h,$nde,$e,$sf,$ef,$f,$a);
    $ret = $s->createSign();
    return $ret;
}


function insertAttribute(){
    
}

function insertRelatedSigns(){
    
}

function checkImage($type, $img, $size) {
    if ($img !== FALSE) {
        //it is a file
        $uploadOk = 1;
    } else {
        //not a file
        $uploadOk = 2;
    }

    if ($size > 2000000) {
        //file size is to large
        $uploadOk = 3;
    }
    if ($type != "jpg" && $type != "jpeg" && $type != "png" && $type != "gif") {
        //not a file that we are looking for
        $uploadOk = 4;
    }

    return $uploadOk;
}

header("Location: " . $url);


//echo $gloss  . '<br>';
//echo $english . '<br>';
//echo $asllvdLink . '<br>';
//echo $fish . '<br>';
//echo $hand . '<br>';
//echo $embr . '<br>';
//echo $domStart . '<br>';
//echo $domEnd . '<br>';
//echo $nonDomStart . '<br>';
//echo $nonDomEnd . '<br>';
//echo $startFile . '<br>';
//echo $endFile . '<br>';
//echo $inEd . '<br>';
////php arrays are base 0s
//print_r($relatedSign). '<br>';
//print_r($attList). '<br>';
//print_r($attPropList). '<br>';
//echo array_count_values($attList);
//echo array_count_values($attPropList);