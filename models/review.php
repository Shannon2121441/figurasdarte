<?php
require_once 'components/connect.php';

class Review {
    private $conn;
    private $table = 'review';

    public $id;
    public $product_id;
    public $rating;
    public $comment;
    public $posted_by_id;
    public $date_posted;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new review
    public function create() {
        $query = "INSERT INTO $this->table (product_id, rating, comment, posted_by_id, date_posted) 
                  VALUES (:product_id, :rating, :comment, :posted_by_id, :date_posted)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':product_id', $this->product_id);
        $stmt->bindParam(':rating', $this->rating);
        $stmt->bindParam(':comment', $this->comment);
        $stmt->bindParam(':posted_by_id', $this->posted_by_id);
        $stmt->bindParam(':date_posted', $this->date_posted);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Get all reviews for a product
    public function getByProduct() {
        $query = "SELECT * FROM $this->table WHERE product_id = :product_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $this->product_id);

        $stmt->execute();

        return $stmt;
    }
}
?>
