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

    function __construct($id, $username, $password, $security_level, $first_name, $last_name, $active, $email) {
        $this->id = $id;
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

}
