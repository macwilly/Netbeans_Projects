<?php

require './attributeClass.php';

$aName = filter_input(INPUT_POST, 'attributeName', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$sName = filter_input(INPUT_POST, 'sentName', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$desc = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$active = filter_input(INPUT_POST, 'optionsActive', FILTER_SANITIZE_NUMBER_INT);
$ie = filter_input(INPUT_POST, 'insertEdit', FILTER_SANITIZE_NUMBER_INT);
$error = 0;
if ($aName == "") {
    $error +=1;
}
if ($desc == "") {
    $error +=1;
}

if ($error == 0) {

    if ($ie == 1) {
        $at = new attributeClass($aName, $desc, $active);
        $url = $at->createAttribute();
    } else {
        $at = new attributeClass($aName, $sName, $desc, $active);
        $url = $at->editAttribute();
    }
} else {
    $url = '../pages/attribute.php?type=1&error=1';
}
header("Location: " . $url);


