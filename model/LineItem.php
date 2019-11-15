<?php

class LineItem {
    private $purchaseID, $bagID, $quantity;
    
    function __construct($purchaseID, $bagID, $quantity)
    {
        $this->purchaseID = $purchaseID;
        $this->bagID = $bagID;
        $this->quantity = $quantity;
    }
    
    function getPurchaseID() {
        return $this->purchaseID;
    }
    
    function getBagID() {
        return $this->bagID;
    }
    
    function getQuantity() {
        return $this->quantity;
    }
    
    function setPurchaseID() {
        $this->purchaseID = $purchaseID;
    }
    
    function setBagID() {
        $this->bagID = $bagID;
    }
    
    function setQuantity() {
        $this->quantity = $quantity;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

