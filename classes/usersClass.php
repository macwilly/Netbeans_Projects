<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author mackenzie
 */
class users {

    //put your code here

    protected $_id;
    protected $_username;
    protected $_password;
    protected $_security_level;
    protected $_first_name;
    protected $_last_name;
    protected $_active;
    protected $_email;

    function __construct() {

        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 7:
                self::__construct7($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6]);
                break;
            case 8:
                self::__construct8($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7]);
                break;
        }
    }

    public function __construct1($id) {
        $this->_id = $id;
    }

    function __construct7($username, $password, $security_level, $first_name, $last_name, $active, $email) {
        $this->_username = $username;
        $this->_password = $password;
        $this->_security_level = $security_level;
        $this->_first_name = $first_name;
        $this->_last_name = $last_name;
        $this->_active = $active;
        $this->_email = $email;
    }

    public function __construct8($id, $username, $password, $security_level, $first_name, $last_name, $active, $email) {
        $this->_id = $id;
        $this->_username = $username;
        $this->_password = $password;
        $this->_security_level = $security_level;
        $this->_first_name = $first_name;
        $this->_last_name = $last_name;
        $this->_active = $active;
        $this->_email = $email;
    }

    public function getId() {
        return $this->_id;
    }

    public function getUsername() {
        return $this->_username;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function getSecurity_level() {
        return $this->_security_level;
    }

    public function getFirst_name() {
        return $this->_first_name;
    }

    public function getLast_name() {
        return $this->_last_name;
    }

    public function getActive() {
        return $this->_active;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setUsername($username) {
        $this->_username = $username;
    }

    public function setPassword($password) {
        $this->_password = $password;
    }

    public function setSecurity_level($security_level) {
        $this->_security_level = $security_level;
    }

    public function setFirst_name($first_name) {
        $this->_first_name = $first_name;
    }

    public function setLast_name($last_name) {
        $this->_last_name = $last_name;
    }

    public function setActive($active) {
        $this->_active = $active;
    }

    public function setEmail($email) {
        $this->_email = $email;
    }

    public function insertUser() {
        // need to set up functionality to check and see if a user was inserted 
        $ret = 0;

        if (!$this->isDuplicate($this->_username)) {
            //connection information for the database
            require '../../../bin/dbConnection.inc.php';

            //process to open a connection to the database
            include '../include/connection_open.inc.php';
            //$conn = new mysqli($servername, $username, $password, $dbname);

            $sql = "INSERT INTO `users`(`username`, `password`, `security_level`, `first_name`, `last_name`, `active`, `email`) " .
                    "VALUES(?,AES_ENCRYPT(?,?),?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssissis", $this->getUsername(), $this->getPassword(), $this->getPassword(), $this->getSecurity_level(), $this->getFirst_name(), $this->getLast_name(), $this->getActive(), $this->getEmail());
            $stmt->execute();
            $stmt->close();
            $conn->close();
        } else {
            $ret = 3; //used 3 becasue this is what I am returning to the error section for the url 
            return $ret;
        }
    }

    public function editUser() {
        if (!$this->isDuplicate2($this->_username, $this->_id)) {
            $sql = "UPDATE users SET username='" . $this->_username . "', password= AES_ENCRYPT('" . $this->_password . "','" . $this->_password . "'), security_level=" . $this->_security_level . ", " .
                    "first_name = '" . $this->_first_name . "', last_name = '" . $this->_last_name . "', active = " . $this->_active . ", email = '" . $this->_email . "' " .
                    "WHERE users.id = " . $this->_id;

            //connection information for the database
            require '../../../bin/dbConnection.inc.php';

            //process to open a connection to the database
            include '../include/connection_open.inc.php';

            if ($conn->query($sql) === TRUE) {
                $ret = "../pages/users.php";
            } else {
                $ret = "../pages/user.php?type=2&error=3";
            }
        }else{
            $ret = "../pages/users.php?&error=1";
        }

        return $ret;
    }

    public function getUserInfo() {
        $sql = "SELECT * FROM users WHERE users.id = " . $this->_id;

        //connection information for the database
        require '../../../bin/dbConnection.inc.php';

        //process to open a connection to the database
        include '../include/connection_open.inc.php';
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {

            $this->_username = $row["username"];
            $this->_password = $row["password"];
            $this->_security_level = $row["security_level"];
            $this->_first_name = $row["first_name"];
            $this->_last_name = $row["last_name"];
            $this->_active = $row["active"];
            $this->_email = $row["email"];
        }
        //close the connection
        mysqli_close($conn);
    }

    /**
     *  isDuplicate
     *  
     * Checkes to see if there is another user in the database with the same username 
     * @param string $checkUserName Username that is being checked
     * @return boolean 
     */
    protected function isDuplicate($checkUserName) {
        $ret = FALSE;
        //connection information for the database
        require '../../../bin/dbConnection.inc.php';

        //process to open a connection to the database
        include '../include/connection_open.inc.php';
        $sql = "SELECT id FROM users where username ='" . $checkUserName . "'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $ret = TRUE;
        }
        //close the connection
        mysqli_close($conn);

        return ret;
    }

    /**
     * isDuplicate2
     * 
     * Checkes to see if there is another user in the database with the same username and same id 
     * for editing users
     * @param string $checkUserName
     * @param int $checkId
     * @return boolean
     */
    protected function isDuplicate2($checkUserName, $checkId) {
        $ret = FALSE;
        $retUsername = "";
        $retId = 0;
        //connection information for the database
        require '../../../bin/dbConnection.inc.php';

        //process to open a connection to the database
        include '../include/connection_open.inc.php';
        $sql = "SELECT username FROM users where id =" . $checkId;

        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $retUsername = $row["username"];
        }

        //this is showing that the username and the id match
        if ($checkUserName == $retUsername) {
            $ret = FALSE;
        } else {
            //the username does not match the one accosiated with this id
            //this means there is a name change
            $sql = "SELECT id FROM users WHERE username = '" . $checkUserName . "'";
            $result = $conn->query($sql);

            //this means that there is another username with that id and this will be a duplicate username
            if ($result->num_rows > 0) {
                $ret = TRUE;
            }
        }
        //close the connection
        mysqli_close($conn);
        return ret;
    }

}
