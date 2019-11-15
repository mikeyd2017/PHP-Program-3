<?php
//Not sure about this class yet, need to do more research on the user session.
class CartDA {
    
        public static function create_cart($username, $total) {
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
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

