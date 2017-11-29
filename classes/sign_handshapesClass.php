<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sign_handshapesClass
 *
 * @author mtwil
 */
class sign_handshapesClass {

    //put your code here

    private $_gloss;
    private $_dominant_start_HS;
    private $_dominant_end_HS;
    private $_nondominant_start_HS;
    private $_nondominant_end_HS;
    private $_sentSign;

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
            case 6:
                self::__construct6($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);
                break;
        }
    }

    private function __construct5($gloss, $dominant_start_HS, $dominant_end_HS, $nondominant_start_HS, $nondominant_end_HS) {
        $this->_gloss = $gloss;
        $this->_dominant_start_HS = $dominant_start_HS;
        $this->_dominant_end_HS = $dominant_end_HS;
        $this->_nondominant_start_HS = $nondominant_start_HS;
        $this->_nondominant_end_HS = $nondominant_end_HS;
    }

    function get_gloss() {
        return $this->_gloss;
    }

    function get_dominant_start_HS() {
        return $this->_dominant_start_HS;
    }

    function get_dominant_end_HS() {
        return $this->_dominant_end_HS;
    }

    function get_nondominant_start_HS() {
        return $this->_nondominant_start_HS;
    }

    function get_nondominant_end_HS() {
        return $this->_nondominant_end_HS;
    }

    function get_sentSign() {
        return $this->_sentSign;
    }

    function set_gloss($_gloss) {
        $this->_gloss = $_gloss;
    }

    function set_dominant_start_HS($_dominant_start_HS) {
        $this->_dominant_start_HS = $_dominant_start_HS;
    }

    function set_dominant_end_HS($_dominant_end_HS) {
        $this->_dominant_end_HS = $_dominant_end_HS;
    }

    function set_nondominant_start_HS($_nondominant_start_HS) {
        $this->_nondominant_start_HS = $_nondominant_start_HS;
    }

    function set_nondominant_end_HS($_nondominant_end_HS) {
        $this->_nondominant_end_HS = $_nondominant_end_HS;
    }

    function set_sentSign($_sentSign) {
        $this->_sentSign = $_sentSign;
    }

    function insertHandshapes() {
        //connection information for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $sql = "INSERT INTO sign_handshapes (gloss, dominant_start_HS, dominant_end_HS, nondominant_start_HS, nondominant_end_HS) " .
                "VALUES(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siiii", $this->get_gloss(), $this->get_dominant_start_HS(), $this->get_dominant_end_HS(), $this->get_nondominant_start_HS(), $this->get_nondominant_end_HS());
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    function updateHandshapes() {
        
        $sql = "UPDATE sign_handshapes SET dominant_start_HS = " . $this->_dominant_start_HS . ", dominant_end_HS = " . $this->_dominant_end_HS
                . ", nondominant_start_HS = " . $this->_nondominant_start_HS . ", nondominant_end_HS = " . $this->_nondominant_end_HS
                . " WHERE gloss = '" . $this->_gloss . "'";
        //echo $sql . '<br>';
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
