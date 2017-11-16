<?php

//include '../function/getAttribute.php';

function search() {
    $sender = filter_input(INPUT_POST, 'sender');

    switch ($sender) {
        case "advance":
            $inputField = filter_input(INPUT_POST, 'mainBar', FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
            $handedness = filter_input(INPUT_POST, 'optionsHanded');
            $finished = filter_input(INPUT_POST, 'optionsFinished');
            $handShapes = implode(",", $_POST['handshapes']);
            $attrs = getAttributeSearch();
            $atSQL = attChecker($attrs);
            $searchQuery = sqlBuilder($inputField, $handedness, $finished, $handShapes, $atSQL);
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

function attChecker($atAr) {
    $ret = "";
    $atSearch = array();
    //getting information from the search area if there is any 
    foreach ($atAr as $a) {
        if (filter_input(INPUT_POST, $a, FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED) != "") {
            $b = filter_input(INPUT_POST, $a, FILTER_SANITIZE_STRING, FILTER_SANITIZE_ENCODED);
            $atSearch[$a] = $b;
        }
    }
    $i = 0;
    $len = sizeof($atSearch);
    //building the prtial query.  no need to check for sizeof() == 0
    foreach ($atSearch as $x => $x_value) {
        $ret .= " (sign_attribute.attribute = '" . $x . "' AND sign_attribute.description = '" . $x_value . "') ";
        if ($i != $len - 1) {
            $ret .= " AND ";
        }

        $i++;
    }
    return $ret;
}

function sqlBuilder($input, $hand, $fish, $HS, $at) {
    $sql = "SELECT * FROM sign";
    if ($at != "") {
        $sql .= " JOIN sign_attribute ON sign.gloss = sign_attribute.sign";
    }

    if ($input != "") {
        $sql .= " WHERE gloss LIKE '" . $input . "%' AND english_meaning LIKE '" . $input . "%'";
    }

    if ((strpos($sql, 'WHERE') == false) && ($hand != "")) {
        $sql .= " WHERE handedness =" . $hand . "";
    } elseif ((strpos($sql, 'WHERE') !== false) && ($hand != "")) {
        $sql .= " AND handedness =" . $hand . "";
    }

    if ((strpos($sql, 'WHERE') == false) && ($fish != "")) {
        $sql .= " WHERE finished =" . $fish . "";
    } elseif ((strpos($sql, 'WHERE') !== false) && ($fish != "")) {
        $sql .= " AND finished =" . $fish . "";
    }

    if ((strpos($sql, 'WHERE') == false) && ($HS != "")) {

        $sql .= " WHERE (dominant_start_HS IN(" . $HS . ") OR dominant_end_HS IN(" . $HS . ")"
                . " OR nondominant_start_HS IN(" . $HS . ") OR nondominant_end_HS IN(" . $HS . "))";
    } elseif ((strpos($sql, 'WHERE') !== false) && ($HS != "")) {
        $sql .= " AND (dominant_start_HS IN(" . $HS . ") OR dominant_end_HS IN(" . $HS . ")"
                . " OR nondominant_start_HS IN(" . $HS . ") OR nondominant_end_HS IN(" . $HS . "))";
    }

    if ((strpos($sql, 'WHERE') == false) && ($at != "")) {

        $sql .= " WHERE " . $at . " ";
    } elseif ((strpos($sql, 'WHERE') !== false) && ($at != "")) {
        $sql .= " AND " . $at . " ";
    }

    return $sql;
}
