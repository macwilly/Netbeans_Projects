<?php

//opening the connection to the database
//creating the connection
$conn = new mysqli($servername, $username, $password, $dbname);

//checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
