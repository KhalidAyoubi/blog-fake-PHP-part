<?php

if (!defined('DB_SERVER')) {
    define('DB_SERVER', 'basesdedades');
}
if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'khalid');
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', 'secret');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', 'blog');
}

if (!class_exists('MySQLConfig')) {
    class MySQLConfig
    {
        public static function getDBConnection() {
            $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            return $connection;
        }
    }
}
?>
