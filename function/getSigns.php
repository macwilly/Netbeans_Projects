<?php

function getSign(){
    $sql = "SELECT id, gloss FROM sign";
    
    require '../classes/signClass.php';
    $signs = array();
    
     //connection information for the database    
    if($_SERVER["HTTP_HOST"] == "localhost" ){ //development
        require '../../../bin/dbConnection.inc.php';
    }else{
        require '../../bin/dbConnection.inc.php';
    }

    //process to open a connection to the database
    include '../include/connection_open.inc.php';
    
     $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {

        $sign = new sign($row["id"],$row["gloss"]);

        array_push($signs, $sign);
        //echo $user->getUsername();
    }
    //close the connection
    mysqli_close($conn);
    return $signs;
}
