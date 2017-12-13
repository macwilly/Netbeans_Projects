<?php

$q = $_GET["q"];

if ($_SERVER["HTTP_HOST"] == "localhost") { //development
    require '../../../bin/dbConnection.inc.php';
} else {
    require '../../bin/dbConnection.inc.php';
}

//process to open a connection to the database
include '../include/connection_open.inc.php';
$sql = "SELECT gloss FROM sign WHERE gloss = '" . $q . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo ': This is a duplicate gloss. Please make sure that it is unique.';
} else {
    echo 'Ok';
}
mysqli_close($conn);

