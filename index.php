<!DOCTYPE html>
<!---->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo "<p>Hello</p>";
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "animated_sign";
            
            //creating the connection
            $conn = new mysqli($servername,$username,$password,$dbname);
            //checking the connection
            if ($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
                echo "" . $conn->connect_error;
            }
            
            $sql = "SELECT * FROM users";
            
            $result = $conn->query($sql);
            
            if($result->num_rows > 0){
                //output data of each row
                while($row = $result->fetch_assoc()){
                    echo "id: " . $row["id"] . "<br>";
                }
            }
            
        ?>
    </body>
</html>
