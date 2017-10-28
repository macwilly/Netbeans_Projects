<?php
session_start();

$gloss = finter_input(INPUT_POST,'inputgloss',FILTER_SANITIZE_STRING,FILTER_SANITIZE_ENCODED);
$english = filter_input(INPUT_POST,'inputenglish',FILTER_SANITIZE_STRING,FILTER_SANITIZE_ENCODED);
$asllvdLink = filter_input(INPUT_POST,'inputasllvd');
$fish = filter_input(INPUT_POST, 'optionsFinished',FILTER_SANITIZE_NUMBER_INT);
$hand = filter_input(INPUT_POST, 'optionsHandedness',FILTER_SANITIZE_NUMBER_INT);


