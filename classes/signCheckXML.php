<?php

session_start();
include './signClass.php';
include './signHistoryClass.php';
//unsetting all of the errorsign variables
for ($e = 0; $e < sizeof($_SESSION); $e++) {
    if (isset($_SESSION['errorsign' . $e])) {
        unset($_SESSION['errorsign' . $e]);
    }
}


$url = "";
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

//this array is for the embr history 
$history = array();
foreach ($xml->children() as $signs) {
    $hand = $signs->handedness;
    $fish = $signs->finished;
    //changing gloss into a string so that is can be easily checked
    $gloss = $signs->gloss->__toString();
    if (checkHandedness($hand) == TRUE && checkFinished($fish) == TRUE) {
        $s = new sign();
        $s->set_gloss($signs->gloss);
        $s->set_embr($signs->embr);
        $s->set_dominant_start_HS(convertHandshape($signs->dominant_start_HS));
        $s->set_dominant_end_HS(convertHandshape($signs->dominant_end_HS));
        $s->set_nondominant_start_HS(convertHandshape($signs->nondominant_start_HS));
        $s->set_nondominant_end_HS(convertHandshape($signs->nondominant_end_HS));
        $s->set_handedness($signs->handedness);
        $s->set_english_meaning($signs->english);
        $s->set_start_photo($signs->start_photo);
        $s->set_end_photo($signs->end_photo);
        $s->set_finished($signs->finished);
        $s->set_asllvd_link(str_replace("amp;", "&", $signs->asllvd_link->__toString()));
        
        $sh = new signHistoryClass();
        $sh->set_sign($gloss);
        $sh->set_user($_SESSION['userId']);
        $sh->set_embr($signs->embr);

        //checking to see if there are duplicate signs in the xml 
        if (sizeof($checkedSigns) > 0) {
            //is the sign in the array of signs already checked
            if (in_array($gloss, $checkedSigns)) {
                array_push($errorSigns, $gloss);
                $url = '../pages/sign.php?type=1&error=xmlDuplicate';
            } else {
                //check to see if the sign is in the database
                if ($s->xmlCheckDuplicate() == TRUE) {
                    array_push($errorSigns, $gloss);
                } else {
                    array_push($signsArray, $s);
                    array_push($history, $sh);
                }
            }
            array_push($checkedSigns, $gloss);
        } else {
            //check to see if the sign is in the database
            if ($s->xmlCheckDuplicate() == TRUE) {
                array_push($errorSigns, $gloss);
            } else {
                array_push($signsArray, $s);
                array_push($history, $sh);
            }
            array_push($checkedSigns, $gloss);
        }
    } else {
        array_push($errorSigns, $gloss);
        $url = '../pages/sign.php?type=1&error=dataError';
    }
}

//there are no errors added the sign into the database
if (sizeof($errorSigns) == 0) {
    foreach ($signsArray as $si) {
        $si->createSign();
    }
    foreach($history as $h){
        $h->insertWithOutDate();
    }
    
    $url = '../pages/signList.php';
} else {
    for ($i = 0; $i < sizeof($errorSigns); $i++) {
        $_SESSION['errorsign' . $i] = $errorSigns[$i];
    }
    if ($url == "") {
        $url = '../pages/sign.php?type=1&error=duplicateGloss';
    }
}

header('Location: ' . $url);

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
    if ($h != 1 && $h != 2) {
        $ret = FALSE;
    }
    return $ret;
}

function checkFinished($f) {
    $ret = TRUE;
    if ($f != 1 && $f != 0) {
        $ret = FALSE;
    }
    return $ret;
}
