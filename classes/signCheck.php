<?php

session_start();

include './signClass.php';
include './relatedSignClass.php';
include './sign_attributeClass.php';

$target_dir_start = "../images/sign/startImg/";
$target_dir_end = "../images/sign/endImg/";

$gloss = filter_input(INPUT_POST, 'inputgloss', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
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

if (sizeof($relatedSign) == 0) {
    $rsStat = "ok";
}
//checking to see if there are active attributes
if ($numOfAtt > 0) {
    //loop through the number of potential attributes
    for ($i = 1; $i <= $numOfAtt; $i++) {
        if ($_POST['selAttr' . $i] != 'none') {
            array_push($attList, $_POST['selAttr' . $i]);
            array_push($attPropList, $_POST['attrProp' . $i]);
        }
    }
    //if there are no attributes filled out
    if(sizeof($attList)== 0){
        $attStat = "ok";
    }
} else {
    $attStat = "ok";
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

if ($inEd == 1 && ($startOk == 1 && $startFile == "na") && ($endOk == 1 && $endFile == "na")) {
    //adding a new sign and everything is okay and there are no images
    $signStat = insertSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile);
    //checking to see if any related signs were selected
    if ($signStat == 'ok' && sizeof($relatedSign) > 0) {
        $rsStat = insertRelatedSigns($gloss, $relatedSign);
    }
    //check to see if any attributes have been added
    if ($signStat == 'ok' && sizeof($attList) > 0) {
        $attStat = insertAttribute($gloss, $attList, $attPropList);
    }

    if ($signStat == "ok" && $rsStat == "ok" && $attStat == "ok") {
        $url = '../pages/signList.php';
    } else {
        $url = '../pages/sign.php?type=1&error=adding&signstat=' . $signStat . '&$rsStat=' . $rsStat. '&attstat=' . $attStat;
    }
} elseif ($inEd == 1 && ($startOk == 1 && $startFile != "na") && ($endOk == 1 && $endFile != "na")) {
    $signStat = insertSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile);
    if ($signStat == 'ok') {
        if (move_uploaded_file($_FILES["startImage"]["tmp_name"], $target_file_start) && move_uploaded_file($_FILES["endImage"]["tmp_name"], $target_file_end)) {
            if (sizeof($relatedSign) > 0) {
                $rsStat = insertRelatedSigns($gloss, $relatedSign);
            }
            //check to see if any attributes have been added
            if ($signStat == 'ok' && sizeof($attList) > 0) {
                $attStat = insertAttribute($gloss, $attList, $attPropList);
            }

            if ($signStat == "ok" && $rsStat == "ok" && $attStat == "ok") {
                $url = '../pages/signList.php';
            } else {
                $url = '../pages/sign.php?type=1&error=adding&signstat=' . $signStat . '&$rsStat=' . $rsStat. '&attstat=' . $attStat;
            }
        } else {
            $url = '../pages/sign.php?type=1&error=fileUpload';
        }
    }
} elseif ($inEd == 1 && ($startOk == 1 && $startFile != "na") && ($endOk == 1 && $endFile == "na")) {
    $signStat = insertSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile);
    if ($signStat == 'ok') {
        if (move_uploaded_file($_FILES["startImage"]["tmp_name"], $target_file_start)) {
            if (sizeof($relatedSign) > 0) {
                $rsStat = insertRelatedSigns($gloss, $relatedSign);
            }
            //check to see if any attributes have been added
            if ($signStat == 'ok' && sizeof($attList) > 0) {
                $attStat = insertAttribute($gloss, $attList, $attPropList);
            }

            if ($signStat == "ok" && $rsStat == "ok" && $attStat == "ok") {
                $url = '../pages/signList.php';
            } else {
                $url = '../pages/sign.php?type=1&error=adding&signstat=' . $signStat . '&$rsStat=' . $rsStat. '&attstat=' . $attStat;
            }
        } else {
            $url = '../pages/sign.php?type=1&error=fileUpload';
        }
    }
} elseif ($inEd == 1 && ($startOk == 1 && $startFile == "na") && ($endOk == 1 && $endFile != "na")) {
    $signStat = insertSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile);
    if ($signStat == 'ok') {
        if (move_uploaded_file($_FILES["startImage"]["tmp_name"], $target_file_end)) {
            if (sizeof($relatedSign) > 0) {
                $rsStat = insertRelatedSigns($gloss, $relatedSign);
            }
            //check to see if any attributes have been added
            if ($signStat == 'ok' && sizeof($attList) > 0) {
                $attStat = insertAttribute($gloss, $attList, $attPropList);
            }

            if ($signStat == "ok" && $rsStat == "ok" && $attStat == "ok") {
                $url = '../pages/signList.php';
            } else {
                $url = '../pages/sign.php?type=1&error=adding&signstat=' . $signStat . '&$rsStat=' . $rsStat. '&attstat=' . $attStat;
            }
        } else {
            $url = '../pages/sign.php?type=1&error=fileUpload';
        }
    }
}

function insertSign($g, $e, $a, $f, $h, $embr, $ds, $de, $nds, $nde, $sf, $ef) {
    $s = new sign($embr, $g, $ds, $de, $nds, $h, $nde, $e, $sf, $ef, $f, $a);
    $ret = $s->createSign();
    return $ret;
}

function insertAttribute($gl, $ats, $props) {
    $count = 0;
    for ($i = 0; $i < sizeof($ats); $i++) {
        $sa = new sign_attributeClass($gl, $ats[$i], $props[$i]);
        $count += $sa->insertSignAttribute();
    }
    if ($count == sizeof($ats)) {
        return "ok";
    } else {
        return "bad";
    }
}

function insertRelatedSigns($gl, $related) {
    $count = 0;
    foreach ($related as $value) {
        $rs = new relatedSignClass();
        $rs->set_s_sign($gl);
        $rs->set_r_sign($value);
        $count += $rs->insertRelatedSign();
        //inserts the opposit way so both will have the relation
        $rsOp = new relatedSignClass($value, $gl);
        $count += $rsOp->insertRelatedSign();
    }
    //inserting twice need to double the check
    if ($count == (sizeof($related) * 2)) {
        return "ok";
    } else {
        return "bad";
    }
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
