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
        
        public static function create_user($userName, $firstName, $lastName, $email, $password) {
            $db = Database::getDB();
            $query = "INSERT INTO Users(UserName, FirstName, LastName, Email, Password)
                      VALUES(:userName, :firstName, :lastName, :email, :password)";

            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $userName);
            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password);
            $statement->execute();
            $statement->closeCursor();
        }
        
        public static function get_user($userName) {
            $db = Database::getDB();

            $query = "SELECT UserName, FirstName, LastName, Email, Password FROM users WHERE users.UserName = :userName";
            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $userName);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();

            return $results[0];
        }
        
        public static function isUserAvailable($username)   {
        $db = Database::getDB();

        $query = 'SELECT UserName FROM users WHERE users.UserName = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $users = $statement->fetchAll();
        $statement->closeCursor();

        if(empty($users)) {
            return true;
        } else {
            return false;
        }
    }
    
         public static function isEmailAvailable($email)   {
        $db = Database::getDB();

        $query = 'SELECT Email FROM users WHERE users.Email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $users = $statement->fetchAll();
        $statement->closeCursor();

        if(empty($users)) {
            return true;
        } else {
            return false;
        }
    }
    
    
    
    public static function validPassword($username, $password) {
        $db = Database::getDB();
        
        $query = "SELECT Password FROM users WHERE users.UserName = :username";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $hash = $statement->fetchAll();
        $statement->closeCursor();

        if ($hash != false && !empty($hash)) {
            $hashString = $hash[0]["Password"];
            
            if (password_verify($password, $hashString)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
} 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

