<?php

require '../classes/attributeClass.php';

$sent = filter_input(INPUT_POST, 'sentName', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);

$attr = new attributeClass();

$attr->set_sentName($sent);

$url = $attr->deleteAttribute();

header('Location: ' . $url);