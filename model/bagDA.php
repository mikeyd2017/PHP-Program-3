<?php

class BagDA {
    
        public static function get_all_bags() {       
            $db = Database::getDB();

            $query = 'SELECT * FROM bags';
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();

            $statement->closeCursor();

            return $results;
        }
        
        public static function create_bag($title, $description, $price) {
            $db = Database::getDB();
            $query = "INSERT INTO bags(BagID, Title, Description, Price)
                      VALUES(:bagID, :title, :description, :price)";

            $statement = $db->prepare($query);
            $statement->bindValue(':bagID', $bagID);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':decription', $description);
            $statement->bindValue(':price', $price);
            $statement->execute();
            $statement->closeCursor();
        }
        
        public static function get_bag($bagID) {
            $db = Database::getDB();

            $query = "SELECT BagID, Title, Description, Price FROM bags WHERE bags.BagID = :bagID";
            $statement = $db->prepare($query);
            $statement->bindValue(':bagID', $bagID);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();

            return $results[0];
        }
        
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

