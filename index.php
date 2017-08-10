<!DOCTYPE html>
<html>
    
    <?php
    echo '1';
    include './include/header.inc.php';
    echo '2';
    //connection information for the database
    require '../../bin/dbConnection.inc.php';
    echo '3';
    //process to open a connection to the database
    include './include/connection_open.inc.php';
    echo '4';

    $sql = "SELECT id,username,CAST(AES_DECRYPT(password, '<password>') AS CHAR(20)) as password_decrypt,security_level,first_name,last_name,active,email"
            . " FROM users";

    echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . "<br>";
            echo "username: " . $row["username"] . "<br>";
            echo "password: " . $row["password_decrypt"] . "<br>";
            echo "security_level: " . $row["securit_level"] . "<br>";
            echo "first name: " . $row["first_name"] . "<br>";
            echo "last name: " . $row["last_name"] . "<br>";
            echo "email: " . $row["email"] . "<br>";
        }
    }

    //close the connection
    mysqli_close($conn);
    ?>
</body>
</html>
