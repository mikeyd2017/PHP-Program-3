<?php

class Bag {
    private $title, $description, $price;
    
    private function __construct($title, $description, $price) {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }
    
    function getTitle() {
        return $this->title;
    }
    
    function getDescription() {
        return $this->description;
    }
    
    function getPrice() {
        return $this->price;
    }
    
    function setTitle() {
        $this->title = $title;
    }
    
    function setDescription() {
        $this->description = $description;
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

