<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signHistoryClass
 *
 * @author mtwil
 */
class signHistoryClass {

    private $_sign;
    private $_date;
    private $_user;
    private $_embr;
    private $_first_name;
    private $_last_name;

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
            case 5:
                self::__construct5($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
                break;
        }
    }

    private function __construct1($sign) {
        $this->_sign = $sign;
    }

    private function __construct3($sign, $user, $embr) {
        $this->_sign = $sign;
        $this->_user = $user;
        $this->_embr = $embr;
    }

    private function __construct4($sign, $date, $user, $embr) {
        $this->_sign = $sign;
        $this->_date = $date;
        $this->_user = $user;
        $this->_embr = $embr;
    }
    
    private function __construct5($sign, $date, $fn, $ln, $embr) {
        $this->_sign = $sign;
        $this->_date = $date;
        $this->_first_name = $fn;
        $this->_last_name = $ln;
        $this->_embr = $embr;
    }

    function get_sign() {
        return $this->_sign;
    }

    function get_date() {
        return $this->_date;
    }

    function get_user() {
        return $this->_user;
    }

    function get_embr() {
        return $this->_embr;
    }

    function get_first_name() {
        return $this->_first_name;
    }

    function get_last_name() {
        return $this->_last_name;
    }

    function set_sign($_sign) {
        $this->_sign = $_sign;
    }

    function set_first_name($_first_name) {
        $this->_first_name = $_first_name;
    }

    function set_last_name($_last_name) {
        $this->_last_name = $_last_name;
    }

    function set_date($_date) {
        $this->_date = $_date;
    }

    function set_user($_user) {
        $this->_user = $_user;
    }

    function set_embr($_embr) {
        $this->_embr = $_embr;
    }

    function insertWithOutDate() {

        $sql = "INSERT INTO sign_history VALUES('" . $this->_sign . "',CURRENT_TIMESTAMP," . $this->_user . ",'" . $this->_embr . "' )";

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

}
