<?php

session_start();

if (!isset($_SESSION["editUser"])) {
    $sentId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $_SESSION["editUser"] = $sentId;

    header("Location: ../pages/user.php?type=2");
}else{
    unset($_SESSION["editUser"]);
    header("Location: ../pages/users.php");
}