<?php

class LineItem {
    private $purchaseID, $bagTitle, $quantity, $price;
    
    function __construct($purchaseID, $bagTitle, $quantity, $price)
    {
        $this->purchaseID = $purchaseID;
        $this->bagTitle = $bagTitle;
        $this->quantity = $quantity;
    }
    
    function getPurchaseID() {
        return $this->purchaseID;
    }
    
    function getBagTitle() {
        return $this->bagTitle;
    }
    
    function getQuantity() {
        return $this->quantity;
    }
    
    function getPrice() {
        return $this->price;
    }
    
    function setPurchaseID() {
        $this->purchaseID = $purchaseID;
    }
    
    function setBagTitle() {
        $this->bagTitle = $bagTitle;
    }
    
    function setQuantity() {
        $this->quantity = $quantity;
    }
    
    function setPrice() {
        $this->price = $price;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

