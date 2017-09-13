<?php

session_start();

//Users class
require '/classes/users.php';

function getUsers() {

    //connection information for the database
    require '../../../bin/dbConnection.inc.php';

    //process to open a connection to the database
    include '../include/connection_open.inc.php';

    $sql = "SELECT id,username,password,security_level,first_name,last_name,active,email"
            . " FROM users";



    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        
        $user = new users($row["id"],$row["username"],$row["password"],$row["security_level"],$row["first_name"],$row["last_name"],$row[active],$row["email"]);
        
    }
    //close the connection
    mysqli_close($conn);
}
