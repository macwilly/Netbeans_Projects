<?php

session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//information from POST
$uname = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$pword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//second checking of the information that is sent
if (strlen($uname) === 0 || strlen($pword) === 0) {
    header('Location: ../pages/login.php');
    exit();
}
//connection information for the database
require '../../../bin/dbConnection.inc.php';

//process to open a connection to the database
include '../include/connection_open.inc.php';

$sql = "SELECT id,username,CAST(AES_DECRYPT(password, '" . $pword . "') AS CHAR(20)) as password_decrypt,security_level,first_name,last_name,active,email"
        . " FROM users"
        . " WHERE username = '" . $uname . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
//output data of each row
    while ($row = $result->fetch_assoc()) {
        if(strlen($row["password_decrypt"]) > 0){
            $_SESSION["userId"] = $row["id"];
            $_SESSION["userName"] = $row["username"];
            $_SESSION["secLevel"] = $row["security_level"];
            $_SESSION["firstName"] = $row["first_name"];
            $_SESSION["lastName"] = $row["last_name"];
            $_SESSION["userEmail"] = $row["email"];
        }else{
            //close the connection
            mysqli_close($conn);
            header('Location: ../pages/login.php?error=1');
            exit();
        }
        
        

        /*
          echo "security_level: " . $row["security_level"] . "<br>";
          echo "first name: " . $row["first_name"] . "<br>";
          echo "last name: " . $row["last_name"] . "<br>";
          echo "email: " . $row["email"] . "<br>"; */
    }
    //close the connection
    mysqli_close($conn);
} else {
    //close the connection
    mysqli_close($conn);
    header('Location: ../pages/login.php?error=1');
    exit();
}

//echo "Username " . $uname . "<br>";
//echo "Password " . $pword . "<br>";

//header('Location: ../pages/buttons.html');
    //exit();
