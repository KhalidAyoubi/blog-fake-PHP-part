<?php
    define('DB_SERVER', 'basesdedades');
    define('DB_USERNAME', 'khalid');
    define('DB_PASSWORD', 'secret');
    define('DB_NAME', 'blog');

    function getDBConnection() {
        $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
?>
