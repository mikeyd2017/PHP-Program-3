<?php

require_once 'database.php';
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
            $query = "INSERT INTO bags(Title, Description, Price)
                      VALUES(:title, :description, :price)";

            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $description);
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
        
        public static function isUniqueImageName($fileName) {
            $db = Database::getDB();

            $query = 'SELECT FileName FROM bags WHERE bags.FileName = :fileName';
            $statement = $db->prepare($query);
            $statement->bindValue(':fileName', $fileName);
            $statement->execute();
            $bags = $statement->fetchAll();
            $statement->closeCursor();

            if(empty($bags)) {
                return true;
            } else {
                return false;
            }
        }
        
        public static function insertImage($path, $bagTitle) {
        $db = Database::getDB();
        $query = 'UPDATE bags '
               . 'SET FileName = :path '
               . 'WHERE Title = :bagTitle';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':path', $path);
        $statement->bindValue(':bagTitle', $bagTitle);
        $statement->execute();
        $statement->closeCursor();
    }
        
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

