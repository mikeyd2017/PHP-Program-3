<?php
require_once 'database.php';

class UserDA {
    
        public static function get_all_users() {       
            $db = Database::getDB();

            $query = 'SELECT * FROM users';
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();

            $statement->closeCursor();

            return $results;
        }
        
        public static function create_user($userName, $firstName, $lastName, $password, $email) {
            $db = Database::getDB();
            $query = "INSERT INTO users UserName, FirstName, LastName, Password, Email)
                      VALUES( :userName, :firstName, :lastName, :password, :email)";

            $statement = $db->prepare($query);
            $statement->bindValue(':username', $userName);
            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $statement->closeCursor();
        }
        
        public static function get_user($userName) {
            $db = Database::getDB();

            $query = "SELECT UserName, FirstName, LastName, Email, Password, FileName FROM users WHERE users.UserName = :userName";
            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $userName);
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

