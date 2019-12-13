<?php

class Purchase {
    private $userName, $date, $total , $purchaseID;
    
    function __construct($purchaseID, $userName, $date, $total) {
        $this->username = $username;
        $this->date = $date;
        $this->total = $total;
        $this->purchaseID = $purchaseID;
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
    
    function getPurchaseID() {
        return $this->purchaseID;
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
    
    function setPurchaseID() {
        $this->purchaseID = $purchaseID;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

