<?php
    
class Database {
    
    private static $dsn = 'sqlsrv:server = tcp:hamiltonroad.database.windows.net,1433; Database = HamiltonRoad';
    private static $username = 'hamiltonroadadmin';
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