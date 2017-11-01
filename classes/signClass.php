<?php

class sign {

    private $_id;
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
            case 3:
                self::__construct3($argv[0], $argv[1], $argv[2]);
                break;
            case 4:
                self::__construct4($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
            case 5:
                self::__construct5($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
                break;
            case 12:
                self::__construct12($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9], $argv[10], $argv[11]);
                break;
            case 13:
                self::__construct13($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9], $argv[10], $argv[11], $argv[12]);
                break;
        }
    }
    
    function __construct12($embr,$gloss,$dominant_start_HS,$dominant_end_HS,$nondominant_start_HS,$handedness,$nondominant_end_HS,$english_meaning,$start_photo,$end_photo,$finished,$asllvd_link) {
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
    
    function __construct13($id,$embr,$gloss,$dominant_start_HS,$dominant_end_HS,$nondominant_start_HS,$handedness,$nondominant_end_HS,$english_meaning,$start_photo,$end_photo,$finished,$asllvd_link) {
        $this->_id = $id;
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

    function get_id() {
        return $this->_id;
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

    function set_id($_id) {
        $this->_id = $_id;
        return $this;
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
    
    function createSign(){
        
    }

}
