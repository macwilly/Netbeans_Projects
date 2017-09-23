<?php
include './usersClass.php';
$url = "";
$fname = filter_input(INPUT_POST, 'inputUserFirstName', FILTER_SANITIZE_STRING,FILTER_SANITIZE_ENCODED);
$lname = filter_input(INPUT_POST, 'inputUserLastName', FILTER_SANITIZE_STRING,FILTER_SANITIZE_ENCODED);
$uname = filter_input(INPUT_POST, 'inputUserUsername', FILTER_SANITIZE_STRING,FILTER_SANITIZE_ENCODED);
$email = filter_input(INPUT_POST, 'inputUserEmail',FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,'inputUserPassword',FILTER_SANITIZE_ENCODED); 
$active = filter_input(INPUT_POST, 'optionsActive',FILTER_SANITIZE_NUMBER_INT);
$securityLevel = filter_input(INPUT_POST, 'selectSecurityLevel',FILTER_SANITIZE_NUMBER_INT);
$inEdit = filter_input(INPUT_POST, 'insertEdit',FILTER_SANITIZE_NUMBER_INT);

if(! filter_var($email1,FILTER_VALIDATE_EMAIL)){
    $url = "../pages/user.php?error=1";
}else{
    if($inEdit != 1 || $inEdit != 2 ){
        $url = "../pages/user.php?error=1";
    }else{
        if($inEdit == 1){
            $user = new users($uname, $password, $securityLevel,$fname,$lname,$active, $email);
            $user->insertUser();
            $url = "../pages/users.php";
        }else{
            
        }
    }
}
header("Location: " . $url);