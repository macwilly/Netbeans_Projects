<?php
session_start();

$target_dir_start = "../images/sign/startImg/";
$target_dir_end = "../images/sign/endImg/";



$gloss = strtoupper(filter_input(INPUT_POST,'inputgloss',FILTER_SANITIZE_STRING,FILTER_SANITIZE_ENCODED));
$english = filter_input(INPUT_POST,'inputenglish',FILTER_SANITIZE_STRING,FILTER_SANITIZE_ENCODED);
$asllvdLink = filter_input(INPUT_POST,'inputasllvd');
$fish = filter_input(INPUT_POST, 'optionsFinished',FILTER_SANITIZE_NUMBER_INT);
$hand = filter_input(INPUT_POST, 'optionsHandedness',FILTER_SANITIZE_NUMBER_INT);
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

echo $gloss  . '<br>';
echo $english . '<br>';
echo $asllvdLink . '<br>';
echo $fish . '<br>';
echo $hand . '<br>';
echo $embr . '<br>';
echo $domStart . '<br>';
echo $domEnd . '<br>';
echo $nonDomStart . '<br>';
echo $nonDomEnd . '<br>';
echo $startFile . '<br>';
echo $endFile . '<br>';
echo $inEd . '<br>';
//php arrays are base 0s
echo $relatedSign[1] . '<br>';