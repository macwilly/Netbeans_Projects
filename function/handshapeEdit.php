<?php

session_start();

if (!isset($_SESSION["editHandshape"])) {
    $sentId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $_SESSION["editHandshape"] = $sentId;

    header("Location: ../pages/handshape.php?type=2");
}else{
    unset($_SESSION["editHandshape"]);
    header("Location: ../pages/handshapes.php");
}