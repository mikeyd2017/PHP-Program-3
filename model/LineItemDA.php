<?php
require_once 'database.php';
class LineItemDA {
    
        public static function create_line_item($userName, $bagTitle, $quantity, $price) {
            $db = Database::getDB();
            $query = "INSERT INTO lineitems(userName, BagTitle, quantity, price)
                      VALUES(:userName, :bagTitle, :quantity, :price)";

            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $userName);
            $statement->bindValue(':bagTitle', $bagTitle);
            $statement->bindValue(':quantity', $quantity);
            $statement->bindValue(':price', $price);
            $statement->execute();
            $statement->closeCursor();
        }
        
        public static function get_all_lineItems($userName) {       
            $db = Database::getDB();

            $query = 'SELECT * FROM lineitems WHERE lineitems.UserName = :userName';
            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $userName);
            $statement->execute();
            $results = $statement->fetchAll();

            $statement->closeCursor();

            return $results;
        }
        
        public static function delete_all_lineItems($userName) {
            $db = Database::getDB();
            
            $query = 'DELETE FROM lineitems WHERE lineitems.UserName = :userName';
            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $userName);
            $statement->execute();

            $statement->closeCursor();

        }
        
        public static function delete_lineItem($lineItemID) {
            $db = Database::getDB();
            
            $query = 'DELETE FROM lineitems WHERE lineitems.LineItemID = :lineItemID';
            $statement = $db->prepare($query);
            $statement->bindValue(':lineItemID', $lineItemID);
            $statement->execute();

            $statement->closeCursor();

        }
        
        
        
        
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

