<?php

session_start();
include './usersClass.php';
session_start();
$url = "";
$fname = filter_input(INPUT_POST, 'inputUserFirstName', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$lname = filter_input(INPUT_POST, 'inputUserLastName', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$uname = filter_input(INPUT_POST, 'inputUserUsername', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
$email = filter_input(INPUT_POST, 'inputUserEmail', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'inputUserPassword', FILTER_SANITIZE_ENCODED);
$beforeChangePassword = filter_input(INPUT_POST, 'bcp', FILTER_SANITIZE_ENCODED);
$active = filter_input(INPUT_POST, 'optionsActive', FILTER_SANITIZE_NUMBER_INT);

if ($_SESSION['secLevel'] == 1) {
    $securityLevel = $_SESSION['secLevel'];
} else {
    $securityLevel = filter_input(INPUT_POST, 'selectSecurityLevel', FILTER_SANITIZE_NUMBER_INT);
}

$inEdit = filter_input(INPUT_POST, 'insertEdit', FILTER_SANITIZE_NUMBER_INT);

//checking for valid email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $url = "../pages/user.php?type=1&error=1";
} else {
    if ($inEdit != 1 && $inEdit != 2) {
        $url = "../pages/user.php?type=1&error=2";
    } else {
        if ($inEdit == 1) {
            //inserting a new user
            $user = new users($uname, $password, $securityLevel, $fname, $lname, $active, $email);
            $ok = $user->insertUser();
            if ($ok == 0) {
                $url = "../pages/users.php";
            } else {
                $url = "../pages/user.php?type=1&error=" . $ok;
            }
        } else {
            $id = 0;
            $rest = 0;
            if ($_SESSION["editUser"] == "") {
                $id = $_SESSION['userId'];
            } elseif ($_SESSION['userId'] == $_SESSION["editUser"]) {
                $id = $_SESSION['userId'];
                $rest = 1;
            } else {
                $id = $_SESSION["editUser"];
                $rest = 1;
            }

            //editing a user
            $user = new users($id, $uname, $password, $securityLevel, $fname, $lname, $active, $email);
            if ($rest == 1) {
                unset($_SESSION["editUser"]);
            }


            if ($password == $beforeChangePassword) {
                $url = $user->editUser(2);
            } else {
                $url = $user->editUser(1);
            }
        }
    }
}
header("Location: " . $url);
