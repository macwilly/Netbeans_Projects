<?php

include './signClass.php';


$fileType = pathinfo(basename($_FILES["xmlFile"]["name"]), PATHINFO_EXTENSION);
if ($fileType != 'xml') {
    $url = '../pages/sign.php?type=1&error=notxml';
}


$xml = simplexml_load_file($_FILES["xmlFile"]["tmp_name"]) or die(header('Location: ../pages/sign.php?type=1&error=load'));
//will store the gloss of any signs that have an issue
$errorSigns = array();
//will store sign objects.  If there are no errors will insert all
//    if there are errors will insert none
$signsArray = array();
//these are signs that have already by checked from this xml and making sure 
// there are no duplicates in it 
$checkedSigns = array();
foreach ($xml->children() as $signs) {
    $hand = $signs->handedness;
    $fish = $sign->finished;
    if (checkHandedness($hand) == TRUE && checkFinished($fish) == TRUE) {
        $s = new sign();
        $s->set_gloss($signs->gloss);
        $s->set_embr($signs->embr);
        $s->set_dominant_start_HS(convertHandshape($signs->dominant_stat_HS));
        $s->set_dominant_end_HS(convertHandshape($signs->dominant_end_HS));
        $s->set_nondominant_start_HS(convertHandshape($signs->nondominant_stat_HS));
        $s->set_nondominant_end_HS(convertHandshape($signs->nondominant_end_HS));
        $s->set_handedness($signs->handedness);
        $s->set_english_meaning($signs->english);
        $s->set_start_photo($signs->start_photo);
        $s->set_end_photo($signs->end_photo);
        $s->set_finished($signs->finished);
        $s->set_asllvd_link($signs->asllvd_link);

        if (sizeof($checkedSigns) > 0) {
            if (in_array($$signs->gloss, $checkedSigns)) {
                array_push($errorSigns, $signs->gloss);
            } else{
                if ($s->xmlCheckDuplicate() == TRUE) {
                array_push($errorSigns, $signs->gloss);
            } else {
                array_push($signsArray, $s);
            }
            }
        } else {
            if ($s->xmlCheckDuplicate() == TRUE) {
                array_push($errorSigns, $signs->gloss);
            } else {
                array_push($signsArray, $s);
            }
        }
    } else {
        array_push($errorSigns, $signs->gloss);
    }
}

//there are no errors added the sign into the database
if (sizeof($errorSigns) == 0) {
    foreach ($signsArray as $si) {
        $si->createSign();
    }
}

//header('Location: ' . $url);

function convertHandshape($handshape) {
    $sql = "SELECT id from hand_shape where description = '" . $handshape . "'";

//connection information for the database    
    if ($_SERVER["HTTP_HOST"] == "localhost") { //development
        require '../../../bin/dbConnection.inc.php';
    } else {
        require '../../bin/dbConnection.inc.php';
    }

    //process to open a connection to the database
    include '../include/connection_open.inc.php';

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {

        $handshape = $row["id"];
    }
    //close the connection
    mysqli_close($conn);
    return $handshape;
}

function checkHandedness($h) {
    $ret = TRUE;
    if ($h !== 1 || $h !== 2) {
        $ret = FALSE;
    }
    return $ret;
}

function checkFinished($f) {
    $ret = TRUE;
    if ($f !== 1 || $f !== 0) {
        $ret = FALSE;
    }
    return $ret;
}
