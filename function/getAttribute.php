<?php

function getAttributes($active) {
    if($active){
        $sql = "SELECT * FROM attribute_list where active=1 ORDER BY name";
    }else{
        $sql = "SELECT * FROM attribute_list";
    }
    
    
    require '../classes/attributeClass.php';

    $attributes = array();

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

        $attribute = new attributeClass($row["name"],$row["description"],$row["active"]);

        array_push($attributes, $attribute);
        //echo $user->getUsername();
    }
    //close the connection
    mysqli_close($conn);
    return $attributes;
}

function getSignAttributes($sign){
    $sql = "SELECT * FROM sign_attribute WHERE sign = '" .$sign . "'";
    
    require '../classes/sign_attributeClass.php';

    $attributes = array();

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

        $attribute = new sign_attributeClass($row["sign"],$row["attribute"],$row["description"]);

        array_push($attributes, $attribute);
        //echo $user->getUsername();
    }
    //close the connection
    mysqli_close($conn);
    return $attributes;
}