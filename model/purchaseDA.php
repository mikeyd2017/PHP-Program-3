<?php

class PurchaseDA {
    
        public static function get_purchases($userName) {       
            $db = Database::getDB();

            $query = 'SELECT * FROM purchases WHERE UserName = :userName';
            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $userName);
            $statement->execute();
            $results = $statement->fetchAll();

            $statement->closeCursor();

            return $results;
        }
        
        public static function create_purchase($purchaseID, $userName, $total, $date) {
            $db = Database::getDB();
            $query = "INSERT INTO purchases(PurchaseID, UserName, Total, Date)
                      VALUES(:purchaseID, :userName, :total, :date)";

            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $userName);
            $statement->bindValue(':date', $date);
            $statement->bindValue(':total', $total);
            $statement->bindValue(':purchaseID', $purchaseID);
            $statement->execute();
            $statement->closeCursor();
        }
        
        
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

