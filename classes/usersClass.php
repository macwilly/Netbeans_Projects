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

    protected $id;
    protected $username;
    protected $password;
    protected $security_level;
    protected $first_name;
    protected $last_name;
    protected $active;
    protected $email;

    function __construct() {

        $argv = func_get_args();
        switch (func_num_args()) {

            case 7:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6]);
                break;
            case 8:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7]);
                break;
        }
    }

    public function __construct1($id, $username, $password, $security_level, $first_name, $last_name, $active, $email) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->security_level = $security_level;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->active = $active;
        $this->email = $email;
    }

    function __construct2($username, $password, $security_level, $first_name, $last_name, $active, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->security_level = $security_level;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->active = $active;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSecurity_level() {
        return $this->security_level;
    }

    public function getFirst_name() {
        return $this->first_name;
    }

    public function getLast_name() {
        return $this->last_name;
    }

    public function getActive() {
        return $this->active;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSecurity_level($security_level) {
        $this->security_level = $security_level;
    }

    public function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    public function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function insertUser() {

        $ret = 0;
        
        $pass = "AES_ENCRYPT(".$this->getPassword().",".$this->getPassword().")";
        //connection information for the database
        require '../../../bin/dbConnection.inc.php';

        //process to open a connection to the database
        include '../include/connection_open.inc.php';
        //$conn = new mysqli($servername, $username, $password, $dbname);
        
        $sql = "INSERT INTO `users`(`username`, `password`, `security_level`, `first_name`, `last_name`, `active`, `email`) " .
            "VALUES(?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissis", $this->getUsername(),$pass,  $this->getSecurity_level(),  $this->getFirst_name(),$this->getLast_name(),$this->getActive(),  $this->getEmail());
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
    }

    public function editUser() {
        
    }

}
