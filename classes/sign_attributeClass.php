<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of attributeListClass
 *
 * @author mackenzie
 */
class sign_attributeClass {

    private $_sign;
    private $_attribute;
    private $_description;

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
        }
    }

    private function __construct1($sign) {
        $this->_sign = $sign;
    }

    private function __construct2($sign, $attribute) {
        $this->_sign = $sign;
        $this->_attribute = $attribute;
    }

    private function __construct3($sign, $attribute, $description) {
        $this->_sign = $sign;
        $this->_attribute = $attribute;
        $this->_description = $description;
    }

    function get_sign() {
        return $this->_sign;
    }

    function get_attribute() {
        return $this->_attribute;
    }

    function get_description() {
        return $this->_description;
    }

    function set_sign($_signId) {
        $this->_sign = $_signId;
    }

    function set_attribute($_attribute) {
        $this->_attribute = $_attribute;
    }

    function set_description($_description) {
        $this->_description = $_description;
    }

    function insertSignAttribute() {

        //connection information for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $sql = "INSERT INTO sign_attribute (sign, attribute, description) " .
                "VALUES(?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $this->get_sign(), $this->get_attribute(), $this->get_description());
        $stmt->execute();
        $stmt->close();
        $conn->close();
        $ret = 1;

        return $ret;
    }

    private function isDuplicate($signId, $attribute, $desc) {
        $ret = FALSE;
        //connection information for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $sql = "SELECT * FROM sign_attribute WHERE sign = '" . $signId . "'" .
                " AND attribute =" . $attribute . " AND description = '" . $desc . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $ret = TRUE;
        }
        //close the connection
        mysqli_close($conn);

        return $ret;
    }

    function deleteAttribute() {
        $sql = "DELETE FROM sign_attribute WHERE sign = '" . $this->_sign . "' AND attribute = '" . $this->_attribute . "'";

        //connection information for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $conn->query($sql);
    }

    function updateDescription() {
        $sql = "UPDATE sign_attribute SET description = '".$this->_description."'"
                . " WHERE sign = '" . $this->_sign . "' AND attribute = '" . $this->_attribute . "'";
        
        //connection information for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $conn->query($sql);
    }
    
    /**
     * in This attribute will be the new sign gloss
     */
    function updateSign(){
        
        //connection iÏnformation for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }
        
        $sql = "UPDATE sign_attribute SET sign = '" . $this->_attribute . "' WHERE sign = '" . $this->_sign . "' ";
        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $conn->query($sql);
    }
    
    

}
