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

    public function _construct($_id, $_username, $_password, $_security_level, $_first_name, $_last_name, $_active, $_email) {
        $this->id = $_id;
        $this->username = $_username;
        $this->password = $_password;
        $this->security_level = $_security_level;
        $this->first_name = $_first_name;
        $this->last_name = $_last_name;
        $this->active = $_active;
        $this->email = $_email;
    }

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getSecurity_level() {
        return $this->security_level;
    }

    function getFirst_name() {
        return $this->first_name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getActive() {
        return $this->active;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setSecurity_level($security_level) {
        $this->security_level = $security_level;
    }

    function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    function setActive($active) {
        $this->active = $active;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    

}
