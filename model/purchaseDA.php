<?php

class PurchaseDA {
    
        public static function get_all_purchases($userName) {       
            $db = Database::getDB();

            $query = 'SELECT * FROM purchases WHERE UserName = :username';
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();

            $statement->closeCursor();

            return $results;
        }
        
        public static function create_purchase($userName, $date, $total) {
            $db = Database::getDB();
            $query = "INSERT INTO purchases(UserName, Date, Total)
                      VALUES(:userName, :date, :total)";

            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $userName);
            $statement->bindValue(':date', $date);
            $statement->bindValue(':total', $total);
            $statement->execute();
            $statement->closeCursor();
        }
        
        
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

