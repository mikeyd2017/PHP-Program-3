<?php
    
class Database {
    
    private static $dsn = 'WILL REPLACE WILL AZURE SQL SERVER CONNECTION STRING';
    private static $username = 'HamiltonAdmin';
    private static $password = 'Hamilton#';
    private static $db;
    
    private function __construct() {}
    
    public static function getDB() {      
        
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();

                exit();
            }
        }
        return self::$db;
    }

}

?>