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

    private $_signId;
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
        $this->_signId = $sign;
    }

    private function __construct2($sign, $attribute) {
        $this->_signId = $sign;
        $this->_attribute = $attribute;
    }

    private function __construct3($sign, $attribute, $description) {
        $this->_signId = $sign;
        $this->_attribute = $attribute;
        $this->_description = $description;
    }

    
    function get_signId() {
        return $this->_signId;
    }

    function get_attribute() {
        return $this->_attribute;
    }

    function get_description() {
        return $this->_description;
    }

    function set_signId($_signId) {
        $this->_signId = $_signId;
    }

    function set_attribute($_attribute) {
        $this->_attribute = $_attribute;
    }

    function set_description($_description) {
        $this->_description = $_description;
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

            $sql = "INSERT INTO `attribute_sign` (`sign_id`, `attribute`, `description`) " .
                    "VALUES(?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iis", $this->get_signId(), $this->get_attribute(), $this->get_description());
            $stmt->execute();
            $stmt->close();
            $conn->close();
            $ret = '../pages/attributes.php';
        } else {
            $ret = '../pages/attribute.php?type=1&error=2'; //used 3 becasue this is what I am returning to the error section for the url 
        }
        return $ret;
    }
    
    private function isDuplicate($signId,$attribute,$desc) {
        $ret = FALSE;
        //connection information for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $sql = "SELECT * FROM sign_attribute WHERE sign_id = " . $signId .
                " AND attribute =" . $attribute . " AND description = '".$desc."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $ret = TRUE;
        }
        //close the connection
        mysqli_close($conn);

        return $ret;
    }

}
