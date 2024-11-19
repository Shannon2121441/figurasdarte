<?php
// models/UserType.php

require_once 'components/connect.php';

class UserType {
    private $conn;
    private $table = 'user_type';

    public $id;
    public $type_name;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all user types
    public function getAll() {
        $query = "SELECT * FROM $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>
