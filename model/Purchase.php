<?php

class Purchase {
    private $userName, $date, $total;
    
    function __construct($userName, $date, $total) {
        $this->username = $username;
        $this->date = $date;
        $this->total = $total;
    }
    
    function getUserName() {
        return $this->userName;
    }
    
    function getDate() {
        return $this->date;
    }
    
    function getTotal() {
        return $this->total;
    }
    
    function setUserName(){ 
        $this->userName = $userName;
    }
    
    function setDate(){ 
        $this->date = $date;
    }
    
    function setTotal() {
        $this->total = $total;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

