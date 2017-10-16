<?php

function getUsers() {
    //Users class
    require '../classes/usersClass.php';

    $users = array();

    //connection information for the database    
    if ($_SERVER["HTTP_HOST"] == "localhost") { //development
        require '../../../bin/dbConnection.inc.php';
    } else {
        require '../../bin/dbConnection.inc.php';
    }

    //process to open a connection to the database
    include '../include/connection_open.inc.php';

    $sql = "SELECT id,username,password,security_level,first_name,last_name,active,email"
            . " FROM users";



    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {


        $user = new users($row["id"], $row["username"], $row["password"], $row["security_level"], $row["first_name"], $row["last_name"], $row["active"], $row["email"]);
        //$user->setUsername($row["username"]);
        array_push($users, $user);
        //echo $user->getUsername();
    }
    //close the connection
    mysqli_close($conn);
    return $users;
}
