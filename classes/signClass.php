<?php

class sign {

    private $_embr;
    private $_gloss;
    private $_dominant_start_HS;
    private $_dominant_end_HS;
    private $_nondominant_start_HS;
    private $_handedness;
    private $_nondominant_end_HS;
    private $_english_meaning;
    private $_start_photo;
    private $_end_photo;
    private $_finished;
    private $_asllvd_link;

    function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 9:
                self::__construct9($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8]);
                break;
            case 12:
                self::__construct12($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9], $argv[10], $argv[11]);
                break;
        }
    }

    function __construct1($gloss) {
        $this->_gloss = $gloss;
    }

    function __construct9($gloss, $dominant_start_HS, $dominant_end_HS, $nondominant_start_HS, $nondominant_end_HS, $english_meaning, $start_photo, $end_photo, $finished) {
        $this->_gloss = $gloss;
        $this->_dominant_start_HS = $dominant_start_HS;
        $this->_dominant_end_HS = $dominant_end_HS;
        $this->_nondominant_start_HS = $nondominant_start_HS;
        $this->_nondominant_end_HS = $nondominant_end_HS;
        $this->_english_meaning = $english_meaning;
        $this->_start_photo = $start_photo;
        $this->_end_photo = $end_photo;
        $this->_finished = $finished;
    }

    function __construct12($embr, $gloss, $dominant_start_HS, $dominant_end_HS, $nondominant_start_HS, $handedness, $nondominant_end_HS, $english_meaning, $start_photo, $end_photo, $finished, $asllvd_link) {
        $this->_embr = $embr;
        $this->_gloss = $gloss;
        $this->_dominant_start_HS = $dominant_start_HS;
        $this->_dominant_end_HS = $dominant_end_HS;
        $this->_nondominant_start_HS = $nondominant_start_HS;
        $this->_handedness = $handedness;
        $this->_nondominant_end_HS = $nondominant_end_HS;
        $this->_english_meaning = $english_meaning;
        $this->_start_photo = $start_photo;
        $this->_end_photo = $end_photo;
        $this->_finished = $finished;
        $this->_asllvd_link = $asllvd_link;
    }

    function get_embr() {
        return $this->_embr;
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

    function get_handedness() {
        return $this->_handedness;
    }

    function get_nondominant_end_HS() {
        return $this->_nondominant_end_HS;
    }

    function get_english_meaning() {
        return $this->_english_meaning;
    }

    function get_start_photo() {
        return $this->_start_photo;
    }

    function get_end_photo() {
        return $this->_end_photo;
    }

    function get_finished() {
        return $this->_finished;
    }

    function get_asllvd_link() {
        return $this->_asllvd_link;
    }

    function set_embr($_embr) {
        $this->_embr = $_embr;
        return $this;
    }

    function set_gloss($_gloss) {
        $this->_gloss = $_gloss;
        return $this;
    }

    function set_dominant_start_HS($_dominant_start_HS) {
        $this->_dominant_start_HS = $_dominant_start_HS;
        return $this;
    }

    function set_dominant_end_HS($_dominant_end_HS) {
        $this->_dominant_end_HS = $_dominant_end_HS;
        return $this;
    }

    function set_nondominant_start_HS($_nondominant_start_HS) {
        $this->_nondominant_start_HS = $_nondominant_start_HS;
        return $this;
    }

    function set_handedness($_handedness) {
        $this->_handedness = $_handedness;
        return $this;
    }

    function set_nondominant_end_HS($_nondominant_end_HS) {
        $this->_nondominant_end_HS = $_nondominant_end_HS;
        return $this;
    }

    function set_english_meaning($_english_meaning) {
        $this->_english_meaning = $_english_meaning;
        return $this;
    }

    function set_start_photo($_start_photo) {
        $this->_start_photo = $_start_photo;
        return $this;
    }

    function set_end_photo($_end_photo) {
        $this->_end_photo = $_end_photo;
        return $this;
    }

    function set_finished($_finished) {
        $this->_finished = $_finished;
        return $this;
    }

    function set_asllvd_link($_asllvd_link) {
        $this->_asllvd_link = $_asllvd_link;
        return $this;
    }

    function createSign() {
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $sql = "INSERT INTO sign(embr_xml, gloss, dominant_start_HS, dominant_end_HS, nondominant_start_HS,handedness,nondominant_end_HS,english_meaning, start_photo, end_photo, finished, asllvd_link) " .
                "VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ssiiiiisssis", $this->_embr, $this->_gloss, $this->_dominant_start_HS, $this->_dominant_end_HS, $this->_nondominant_start_HS, $this->_handedness, $this->_nondominant_end_HS, $this->_english_meaning, $this->_start_photo, $this->_end_photo, $this->_finished, $this->_asllvd_link);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        return "ok";
    }

    function xmlCheckDuplicate() {

        $ret = FALSE;
        //connection information for the database    
        if ($_SERVER["HTTP_HOST"] == "localhost") { //development
            require '../../../bin/dbConnection.inc.php';
        } else {
            require '../../bin/dbConnection.inc.php';
        }

        //process to open a connection to the database
        include '../include/connection_open.inc.php';

        $sql = "SELECT gloss FROM sign where gloss ='" . $this->_gloss . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $ret = TRUE;
        }
        //close the connection
        mysqli_close($conn);

        return $ret;
    }

    function getSignInformation() {
        $sql = "SELECT * FROM sign WHERE gloss = '" . $this->_gloss . "'";

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
            $this->_embr = $row['embr_xml'];
            $this->_dominant_start_HS = $row['dominant_start_HS'];
            $this->_dominant_end_HS = $row['dominant_end_HS'];
            $this->_nondominant_start_HS = $row['nondominant_start_HS'];
            $this->_nondominant_end_HS = $row['nondominant_end_HS'];
            $this->_handedness = $row['handedness'];
            $this->_english_meaning = $row['english_meaning'];
            $this->_start_photo = $row['start_photo'];
            $this->_end_photo = $row['end_photo'];
            $this->_finished = $row['finished'];
            $this->_asllvd_link = $row['asllvd_link'];
        }
        //close the connection
        mysqli_close($conn);
    }

}
