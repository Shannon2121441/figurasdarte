<?php
require_once 'components/connect.php';

class Product {
    private $conn;
    private $table = 'product';

    public $id;
    public $user_id;
    public $name;
    public $category_id;
    public $product_detail;
    public $date_posted;
    public $price;
    public $stock_qty;
    public $status;
    public $image;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new product
    public function create() {
        $query = "INSERT INTO $this->table (user_id, name, category_id, product_detail, date_posted, price, stock_qty, status, image) 
                  VALUES (:user_id, :name, :category_id, :product_detail, :date_posted, :price, :stock_qty, :status, :image)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':product_detail', $this->product_detail);
        $stmt->bindParam(':date_posted', $this->date_posted);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':stock_qty', $this->stock_qty);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':image', $this->image);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Retrieve all products
    public function getAll() {
        $query = "SELECT * FROM $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>
