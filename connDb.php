<?php
require_once 'config.php';

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
