<?php
define('DB_SERVER', 'basesdedades');
define('DB_USERNAME', 'khalid');
define('DB_PASSWORD', 'secret');
define('DB_NAME', 'blog');

class MySQLConfig
{
    private static $connection;

    private function __construct() {}

    public static function getDBConnection() {
        if (!isset(self::$connection)) {
            self::$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if (self::$connection->connect_error) {
                throw new Exception("Connection failed: " . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
}
