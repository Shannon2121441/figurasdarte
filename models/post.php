<?php
// models/Post.php

require_once 'components/connect.php';

class Post {
    private $conn;
    private $table = 'post';

    public $id;
    public $post_type_id;
    public $post_status;
    public $post_title;
    public $post_content;
    public $post_date;
    public $post_excerpt;
    public $post_author_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new post
    public function create() {
        $query = "INSERT INTO $this->table (post_type_id, post_status, post_title, post_content, post_date, post_excerpt, post_author_id) 
                  VALUES (:post_type_id, :post_status, :post_title, :post_content, :post_date, :post_excerpt, :post_author_id)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':post_type_id', $this->post_type_id);
        $stmt->bindParam(':post_status', $this->post_status);
        $stmt->bindParam(':post_title', $this->post_title);
        $stmt->bindParam(':post_content', $this->post_content);
        $stmt->bindParam(':post_date', $this->post_date);
        $stmt->bindParam(':post_excerpt', $this->post_excerpt);
        $stmt->bindParam(':post_author_id', $this->post_author_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Get all posts
    public function getAll() {
        $query = "SELECT * FROM $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>
