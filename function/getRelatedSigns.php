<?php

function getRealtedSigns($gloss) {

    $sql = "SELECT * FROM related_sign where s_sign ='" . $gloss . "'";


    //handshape class
    require '../classes/relatedSignClass.php';

    $relatedSigns = array();

    //connection information for the database    
    if ($_SERVER["HTTP_HOST"] == "localhost") { //development
        require '../../../bin/dbConnection.inc.php';
    } else {
        require '../../bin/dbConnection.inc.php';
    }

    //process to open a connection to the database
    include '../include/connection_open.inc.php';

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {

        $relatedSign = new relatedSignClass($row["s_sign"], $row["r_sign"]);

        array_push($relatedSigns, $relatedSign);
    }
    //close the connection
    mysqli_close($conn);
    return $relatedSigns;
}
