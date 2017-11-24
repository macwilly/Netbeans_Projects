<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author mackenzie
 */
class attributeClass {

    protected $_aName;
    protected $_sentName;
    protected $_desc;
    protected $_active;

    function __construct() {

        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 2:
                self::__construct2($argv[0], $argv[1]);
                break;
            case 3:
                self::__construct3($argv[0], $argv[1], $argv[2]);
                break;
            case 4:
                self::__construct4($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
        }
    }

    private function __construct1($name) {
        $this->_aName = $name;
    }

    private function __construct2($name, $description) {
        $this->_aName = $name;
        $this->_desc = $description;
    }

    private function __construct3($name, $description, $active) {
        $this->_aName = $name;
        $this->_desc = $description;
        $this->_active = $active;
    }

    private function __construct4($name, $sName, $description, $active) {
        $this->_aName = $name;
        $this->_sentName = $sName;
        $this->_desc = $description;
        $this->_active = $active;
    }

    function get_aName() {
        return $this->_aName;
    }

    function get_desc() {
        return $this->_desc;
    }

    function get_sentName() {
        return $this->_sentName;
    }

    function set_sentName($_sentName) {
        $this->_sentName = $_sentName;
        return $this;
    }

    function get_active() {
        return $this->_active;
    }

    function set_aName($_aName) {
        $this->_aName = $_aName;
        return $this;
    }

    function set_desc($_desc) {
        $this->_desc = $_desc;
        return $this;
    }

    function set_active($_active) {
        $this->_active = $_active;
        return $this;
    }

    function createAttribute() {
        if (!$this->isDuplicate($this->_aName)) {

            //connection information for the database    
            if ($_SERVER["HTTP_HOST"] == "localhost") { //development
                require '../../../bin/dbConnection.inc.php';
            } else {
                require '../../bin/dbConnection.inc.php';
            }

            //process to open a connection to the database
            include '../include/connection_open.inc.php';

            $sql = "INSERT INTO `attribute_list` (`name`, `description`, `active`) " .
                    "VALUES(?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $this->get_aName(), $this->get_desc(), $this->get_active());
            $stmt->execute();
            $stmt->close();
            $conn->close();
            $ret = '../pages/attributes.php';
        } else {
            $ret = '../pages/attribute.php?type=1&error=2'; //used 3 becasue this is what I am returning to the error section for the url 
        }
        return $ret;
    }

    function editAttribute() {
        
        if($this->_aName == $this->_sentName){
            $sql = "UPDATE attribute_list SET  description='" . $this->_desc . "', active = " . $this->_active .
                " WHERE name = '" . $this->_sentName . "'";
            $sql2 = "";
        }else{
            $sql = "UPDATE attribute_list SET name='" . $this->_aName . "', description='" . $this->_desc . "', active = " . $this->_active .
                " WHERE name = '" . $this->_sentName . "'";
            
            $sql2 = "UPDATE sign_attribute SET attribute='" . str_replace(" ", "_", $this->_aName). "' WHERE attribute ='" .str_replace(" ", "_", $this->_sentName)."'";
        }
        
        //connection information for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';
        if ($conn->query($sql) === TRUE) {
            if($sql2!=""){
                $conn->query($sql2);
            }
            $ret = "../pages/attributes.php";
        } else {
            $ret = "../pages/attribute.php?type=2&error=3";
        }
        return $ret;
    }
    
    function deleteAttribute(){
        $sql = "DELETE FROM attribute_list WHERE name = '" . $this->_sentName . "'";
        
        //connection information for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        if ($conn->query($sql) === TRUE) {
            //delete all the connections to the attributes table as well 
            $ret = "../pages/attributes.php";
        } else {
            $ret = "../pages/attribute.php?type=2&error=4";
        }
        return $ret;
    }

    private function isDuplicate($name) {
        $ret = FALSE;
        //connection information for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $sql = "SELECT * FROM attribute_list WHERE name = '" . $name . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $ret = TRUE;
        }
        //close the connection
        mysqli_close($conn);

        return $ret;
    }
    
    public function getAttributeInfo() {
        $sql = "SELECT * FROM attribute_list WHERE attribute_list.name = '" . $this->_aName . "'";

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
            $this->_aName = $row["name"];
            $this->_desc = $row["description"];
            $this->_active = $row["active"];
        }
        //close the connection
        mysqli_close($conn);
    }
    
    

}
