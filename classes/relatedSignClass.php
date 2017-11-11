<?php

class relatedSignClass {

    private $_s_sign;
    private $_r_sign;

    function __construct() {

        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 2:
                self::__construct2($argv[0], $argv[1]);
                break;
        }
    }

    private function __construct1($sentSign) {
        $this->_s_sign = $sentSign;
    }

    private function __construct2($sentSign, $relatedSign) {
        $this->_s_sign = $sentSign;
        $this->_r_sign = $relatedSign;
    }

    function get_s_sign() {
        return $this->_s_sign;
    }

    function get_r_sign() {
        return $this->_r_sign;
    }

    function set_s_sign($_s_sign) {
        $this->_s_sign = $_s_sign;
    }

    function set_r_sign($_r_sign) {
        $this->_r_sign = $_r_sign;
    }

    function insertRelatedSign() {

        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $sql = "INSERT INTO related_sign(s_sign,r_sign) " .
                "VALUES(?,?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ss", $this->_s_sign, $this->_r_sign);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        return 1;
    }

    function removeRelatedSign() {
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';
        
        $sql = "DELETE FROM related_sign WHERE s_sign ='" . $this->_s_sign . "' AND r_sign ='" . $this->_r_sign . "'";
        $conn->query($sql);
        
        $sql = "DELETE FROM related_sign WHERE s_sign ='" . $this->_r_sign . "' AND r_sign ='" . $this->_s_sign . "'";
        $conn->query($sql);
    }

}
