<?php

function search() {
    $sender = filter_input(INPUT_POST, 'sender');

    switch ($sender) {
        case "advance":
            $inputField = filter_input(INPUT_POST, 'mainBar', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
            $handedness = filter_input(INPUT_POST, 'optionsHanded');
            $finished = filter_input(INPUT_POST, 'optionsFinished');
            $handShapes = $_POST['handshapes'];
            print_r($handShapes);
            $searchQuery = sqlBuilder($inputField,$handedness,$finished,$handShapes);
            echo $searchQuery;
            return processQuery($searchQuery);
            break;
        case "main":
            $inputField = filter_input(INPUT_POST, 'mainBar', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
            $searchQuery = "SELECT * FROM sign WHERE gloss LIKE '" . $inputField . "%'"
                    . " AND english_meaning LIKE '" . $inputField . "%'";
            return processQuery($searchQuery);
            break;
        case "nav":
            $inputField = filter_input(INPUT_POST, 'navSearchInput', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
            $searchQuery = "SELECT * FROM sign WHERE gloss LIKE '" . $inputField . "%'"
                    . " AND english_meaning LIKE '" . $inputField . "%'";
            return processQuery($searchQuery);
            break;
        default:
            $searchQuery = "SELECT * FROM sign";
            return processQuery($searchQuery);
            break;
    }
}

function processQuery($sql) {

    require '../classes/signClass.php';
    $signs = array();

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

        $signss = new sign($row["gloss"], $row["dominant_start_HS"], $row["dominant_end_HS"], $row["nondominant_start_HS"], $row["nondominant_end_HS"], $row["english_meaning"], $row["start_photo"], $row["end_photo"], $row["finished"]);

        array_push($signs, $signss);
        //echo $user->getUsername();
    }
    //close the connection
    mysqli_close($conn);
    return $signs;
}

function sqlBuilder($input,$hand,$fish,$HS) {
    $sql = "SELECT * FROM sign";
    
    if($input != ""){
        $sql .= " WHERE gloss LIKE '" . $input . "%' AND english_meaning LIKE '" . $input . "%'";
    }
    
    if((strpos($sql, 'WHERE') == false) && ($hand !="")){
        $sql .= " WHERE handedness =" . $hand . "";
    }elseif((strpos($sql, 'WHERE') !== false) && ($hand !="")){
        $sql .= " AND handedness =" . $hand . "";
    }
    
    if((strpos($sql, 'WHERE') == false) && ($fish !="")){
        $sql .= " WHERE finished =" . $fish . "";
    }elseif((strpos($sql, 'WHERE') !== false) && ($fish !="")){
        $sql .= " AND finished =" . $fish . "";
    }
    
//    if((strpos($sql, 'WHERE') == false) && ($HS !="")){
//    
//    (dominant_start_HS = 85 OR dominant_end_HS = 85 OR nondominant_start_HS = 85 OR nondominant_end_HS = 85)
//        $sql .= " WHERE dominant_start_HS   dominant_end_HS    nondominant_start_HS  nondominant_end_HS =" . $fish . "";
//    }elseif((strpos($sql, 'WHERE') !== false) && ($HS !="")){
//        $sql .= " AND finished =" . $fish . "";
//    }
    
    return $sql;
}
