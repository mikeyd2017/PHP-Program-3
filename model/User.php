<?php

class User {
    private $userName, $firstName, $lastName, $email, $password;
    
    function __construct( $userName, $firstName, $lastName, $email, $password) {
        $this->userName = $userName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }
    
    function getUserName() {
        return $this->userName;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }
    
    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }



}
