<?php

class LineItemDA {
    
        public static function create_line_item($purchaseID, $bagID, $quantity) {
            $db = Database::getDB();
            $query = "INSERT INTO lineitems(PurchaseID, BagID, quantity)
                      VALUES(:purchaseID, :bagID, :quantity)";

            $statement = $db->prepare($query);
            $statement->bindValue(':purchaseID', $purchaseID);
            $statement->bindValue(':bagID', $bagID);
            $statement->bindValue(':quantity', $quantity);
            $statement->execute();
            $statement->closeCursor();
        }
        
        
        
        
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

