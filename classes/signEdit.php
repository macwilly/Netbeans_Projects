<?php

session_start();

include './attributeClass.php';
include './sign_attributeClass.php';
include './relatedSignClass.php';
include './signClass.php';
include './signHistoryClass.php';
include '../function/getRelatedSigns.php';
include '../function/getAttribute.php';

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
}

//header("Location: " . $url);

function sgEdit() {
    
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
                $c1 +=1;
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
