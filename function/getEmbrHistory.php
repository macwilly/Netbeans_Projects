<?php
 

function getEmberHistory($sign){
    $sql = "select sign, DATE_FORMAT(date, '%m/%d/%Y %r') as date, users.first_name as first_name,users.last_name as last_name,old_embr"
            . " FROM sign_history LEFT JOIN users ON users.id = sign_history.user"
            . " WHERE sign = '" . $sign ."'"
            . " ORDER BY date DESC";
    
    include '../classes/signHistoryClass.php';
    
    $histories = array();

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

        $history = new signHistoryClass($row["sign"],$row["date"],$row["first_name"],$row["last_name"],$row["old_embr"]);
        array_push($histories, $history);
        
    }
    //close the connection
    mysqli_close($conn);
    return $histories;
}