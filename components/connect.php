<?php
define('DB_SERVER', 's2121441.heliohost.st');
define('DB_USERNAME', 's2121441_shannon');
define('DB_PASSWORD', 'Sjzw43~64');
define('DB_DATABASE', 's2121441_arte_db');

function getDbConnection(): PDO {
    static $conn = null;
    if ($conn === null) {
        try {
            // Create a new PDO connection
            $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle connection errors
            die("Database connection failed: " . $e->getMessage());
        }
    }
    return $conn;
}
?>
