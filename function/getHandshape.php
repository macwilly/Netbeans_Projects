<?php

function getHandshapes() {
    $sql = "SELECT * FROM hand_shape";

    //Users class
    require '../classes/handShapeClass.php';

    $handShapes = array();

    //connection information for the database
    require '../../../bin/dbConnection.inc.php';

    //process to open a connection to the database
    include '../include/connection_open.inc.php';
    
    $sql = "SELECT * FROM hand_shape";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {

        $handshape = new handShapeClass($row["id"],$row["description"],$row["embr_description"],$row["image"],$row["active"]);

        array_push($handShapes, $handshape);
        //echo $user->getUsername();
    }
    //close the connection
    mysqli_close($conn);
    return $handShapes;
}
