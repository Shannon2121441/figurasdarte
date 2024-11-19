<?php
// models/Category.php

require_once 'components/connect.php';

class Category {
    private $conn;
    private $table = 'category';

    public $id;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all categories
    public function getAll() {
        $query = "SELECT * FROM $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>
