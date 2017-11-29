<?php

session_start();

include './attributeClass.php';
include './sign_attributeClass.php';
include './relatedSignClass.php';
include './signClass.php';
include './sign_handshapesClass.php';
include './signHistoryClass.php';
include '../function/getRelatedSigns.php';
include '../function/getAttribute.php';

$target_dir_start = "../images/sign/startImg/";
$target_dir_end = "../images/sign/endImg/";

$inEd = filter_input(INPUT_POST, 'insertEdit');
$sentSign = filter_input(INPUT_POST, 'startSign');
$user = $_SESSION['userId'];
$embr = filter_input(INPUT_POST, 'embrtext');
$dbRelated = getRelatedSignArray($sentSign);
$dbAttribute = getAttributeArray($sentSign);

$gloss = filter_input(INPUT_POST, 'inputgloss', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$english = filter_input(INPUT_POST, 'inputenglish', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$asllvdLink = filter_input(INPUT_POST, 'inputasllvd');
$fish = filter_input(INPUT_POST, 'optionsFinished', FILTER_SANITIZE_NUMBER_INT);
$hand = filter_input(INPUT_POST, 'optionsHandedness', FILTER_SANITIZE_NUMBER_INT);
$domStart = filter_input(INPUT_POST, 'sdh');
$domEnd = filter_input(INPUT_POST, 'edh');
$nonDomStart = filter_input(INPUT_POST, 'sndh');
$nonDomEnd = filter_input(INPUT_POST, 'endh');
$startFile = basename($_FILES["startImage"]["name"]);
$endFile = basename($_FILES["endImage"]["name"]);
$sentRelated = $_POST['relatedsigns'];
$numOfAtt = filter_input(INPUT_POST, 'numberOfAttributes', FILTER_SANITIZE_NUMBER_INT);
$attList = array();
$attPropList = array();

if ($inEd == "embr") {

    $url = embrEd($sentSign, $embr, $user);
} elseif ($inEd == "sign") {

    checkRelatedSigns($sentRelated, $dbRelated, $sentSign);

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
        if (sizeof($attList) == 0) {
            $attStat = "ok";
        }
    } else {
        $attStat = "ok";
    }
    checkSignAttributes($attList, $dbAttribute, $attPropList, $sentSign);


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

    if (($startOk == 1 && $startFile == "na") && ($endOk == 1 && $endFile == "na")) {
        //adding a new sign and everything is okay and there are no images
        $signStat = updateSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile, $sentSign);
        
        $url = '../pages/signList.php';
    } elseif (($startOk == 1 && $startFile != "na") && ($endOk == 1 && $endFile != "na")) {
        $signStat = updateSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile, $sentSign);
        if ($signStat == 'ok') {
            if (move_uploaded_file($_FILES["startImage"]["tmp_name"], $target_file_start) && move_uploaded_file($_FILES["endImage"]["tmp_name"], $target_file_end)) {
                if ($signStat == "ok") {
                    $url = '../pages/signList.php';
                } else {
                    $url = '../pages/sign.php?type=1&error=adding&signstat=' . $signStat;
                }
            } else {
                $url = '../pages/sign.php?type=1&error=fileUpload';
            }
        }
    } elseif (($startOk == 1 && $startFile != "na") && ($endOk == 1 && $endFile == "na")) {
        $signStat = updateSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile, $sentSign);
        if ($signStat == 'ok') {
            if (move_uploaded_file($_FILES["startImage"]["tmp_name"], $target_file_start)) {

                if ($signStat == "ok") {
                    $url = '../pages/signList.php';
                } else {
                    $url = '../pages/sign.php?type=1&error=adding&signstat=' . $signStat;
                }
            } else {
                $url = '../pages/sign.php?type=1&error=fileUpload';
            }
        }
    } elseif (($startOk == 1 && $startFile == "na") && ($endOk == 1 && $endFile != "na")) {
        $signStat = updateSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile, $sentSign);
        if ($signStat == 'ok') {
            if (move_uploaded_file($_FILES["endImage"]["tmp_name"], $target_file_end)) {

                if ($signStat == "ok") {
                    $url = '../pages/signList.php';
                } else {
                    $url = '../pages/sign.php?type=1&error=adding&signstat=' . $signStat;
                }
            } else {
                $url = '../pages/sign.php?type=1&error=fileUpload';
            }
        }
    }
} elseif ($inEd == 'both') {
    embrEd($sentSign, $embr, $user);
    checkRelatedSigns($sentRelated, $dbRelated, $sentSign);

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
        if (sizeof($attList) == 0) {
            $attStat = "ok";
        }
    } else {
        $attStat = "ok";
    }
    checkSignAttributes($attList, $dbAttribute, $attPropList, $sentSign);


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

    if (($startOk == 1 && $startFile == "na") && ($endOk == 1 && $endFile == "na")) {
        //adding a new sign and everything is okay and there are no images
        $signStat = updateSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile, $sentSign);
        $url = '../pages/signList.php';
    } elseif (($startOk == 1 && $startFile != "na") && ($endOk == 1 && $endFile != "na")) {
        $signStat = updateSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile, $sentSign);
        if ($signStat == 'ok') {
            if (move_uploaded_file($_FILES["startImage"]["tmp_name"], $target_file_start) && move_uploaded_file($_FILES["endImage"]["tmp_name"], $target_file_end)) {
                if ($signStat == "ok") {
                    $url = '../pages/signList.php';
                } else {
                    $url = '../pages/sign.php?type=1&error=adding&signstat=' . $signStat;
                }
            } else {
                $url = '../pages/sign.php?type=1&error=fileUpload';
            }
        }
    } elseif (($startOk == 1 && $startFile != "na") && ($endOk == 1 && $endFile == "na")) {
        $signStat = updateSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile, $sentSign);
        if ($signStat == 'ok') {
            if (move_uploaded_file($_FILES["startImage"]["tmp_name"], $target_file_start)) {

                if ($signStat == "ok") {
                    $url = '../pages/signList.php';
                } else {
                    $url = '../pages/sign.php?type=1&error=adding&signstat=' . $signStat;
                }
            } else {
                $url = '../pages/sign.php?type=1&error=fileUpload';
            }
        }
    } elseif (($startOk == 1 && $startFile == "na") && ($endOk == 1 && $endFile != "na")) {
        $signStat = updateSign($gloss, $english, $asllvdLink, $fish, $hand, $embr, $domStart, $domEnd, $nonDomStart, $nonDomEnd, $startFile, $endFile, $sentSign);
        if ($signStat == 'ok') {
            if (move_uploaded_file($_FILES["endImage"]["tmp_name"], $target_file_end)) {

                if ($signStat == "ok") {
                    $url = '../pages/signList.php';
                } else {
                    $url = '../pages/sign.php?type=1&error=adding&signstat=' . $signStat;
                }
            } else {
                $url = '../pages/sign.php?type=1&error=fileUpload';
            }
        }
    }
}

function updateSign($g, $e, $a, $f, $h, $embr, $ds, $de, $nds, $nde, $sf, $ef, $ss) {
    
    
    $s = new sign($embr, $g, $ds, $de, $nds, $h, $nde, $e, $sf, $ef, $f, $a, $ss);
    if ($sf == 'na' && $ef == 'na') {
        $type = 1;
    } elseif ($ef == 'na') {
        $type = 2;
    } elseif ($sf == 'na') {
        $type = 3;
    } else {
        $type = 4;
    }
    
    //if the gloss has changed no need to make unnecessary database calls
    if($g != $ss){
        $relat = new relatedSignClass($g, $ss);
        $relat->UpdateSign();
        
        $attribute = new sign_attributeClass($ss, $g);
        $attribute->updateSign();
    
        $embrHist = new signHistoryClass($g, $ss);
        $embrHist->updateSign();
    }
    
    $ret = $s->updateSignInfo($type);
    
    //editing the handshapes
    $shand =  new sign_handshapesClass($g, $ds, $de, $nds, $nde);
    $shand->updateHandshapes();

    return $ret;
}

function embrEd($_sentSign, $_embr, $_user) {
    $s = new sign($_sentSign);
    $s->set_embr($_embr);
    $sh = new signHistoryClass($_sentSign, $_user, $_embr);
    $sh->insertWithOutDate();
    $ret = $s->updateEmbr();

    return $ret;
}

function checkRelatedSigns($sentRelated, $dbRelated, $ssign) {
    if ($sentRelated != $dbRelated) {
        //adding new related signs
        foreach ($sentRelated as $sRel) {
            if (!in_array($sRel, $dbRelated)) {
                $rs = new relatedSignClass($ssign, $sRel);
                $rs->insertRelatedSign();
                //inserts the opposit way so both will have the relation
                $rsOp = new relatedSignClass($sRel, $ssign);
                $rsOp->insertRelatedSign();
            }
        }

        //deleting signs that were no longer in the list 
        foreach ($dbRelated as $dbr) {
            if (!in_array($dbr, $sentRelated)) {
                $rs = new relatedSignClass($ssign, $dbr);
                $rs->removeRelatedSign();
            }
        }
    }
}

function checkSignAttributes($_sentAttribute, $_dbAttribute, $_attPropList, $_ssing) {
//see if the two lists match
    if ($_sentAttribute != $_dbAttribute) {
        $c1 = 0;
        if (sizeof($_dbAttribute) == 0) { //there were no attributes in the db
            for ($i = 0; $i < sizeof($_sentAttribute); $i++) {
                $as = new sign_attributeClass($_ssing, $_sentAttribute[$i], $_attPropList[$i]);
                $as->insertSignAttribute();
            }
        } else {
            foreach ($_sentAttribute as $sa) {
                if (!in_array($sa, $_dbAttribute)) {
                    //could use the $sa for this but want to make sure that the att and prop match
                    $signAt = new sign_attributeClass($_ssing, $_sentAttribute[$c1], $_attPropList[$c1]);
                    $signAt->insertSignAttribute();
                }
                $c1 += 1;
            }

            foreach ($_dbAttribute as $dba) {
                if (!in_array($dba, $_sentAttribute)) {
                    $dbSignAt = new sign_attributeClass($_ssing, $dba);
                    $dbSignAt->deleteAttribute();
                }
            }
        }
    } else {
        //check the properties and see if they are the same
        for ($i = 0; $i < sizeof($_sentAttribute); $i++) {
            if (getAttributeDesc($_ssing, $_sentAttribute[$i]) != $_attPropList[$i]) {
                $propSignAt = new sign_attributeClass($_ssing, $_sentAttribute[$i], $_attPropList[$i]);
                $propSignAt->updateDescription();
            }
        }
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

