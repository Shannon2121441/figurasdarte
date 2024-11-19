<?php

class Cart {
    private $user_id;
    private $product_id;
    private $price;
    private $qty;
    private $discount;
    private $line_total;

    public function __construct($user_id, $product_id, $price, $qty, $discount) {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->price = $price;
        $this->qty = $qty;
        $this->discount = $discount;
        $this->line_total = ($price - $discount) * $qty;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO cart (user_id, product_id, price, qty, discount, line_total) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->user_id, $this->product_id, $this->price, $this->qty, $this->discount, $this->line_total]);
    }

    public static function getCartItemsByUserId($user_id) {
        global $conn;
        $sql = "SELECT * FROM cart WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    public function updateQty($new_qty) {
        $this->qty = $new_qty;
        $this->line_total = ($this->price - $this->discount) * $this->qty;

        global $conn;
        $sql = "UPDATE cart SET qty = ?, line_total = ? WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->qty, $this->line_total, $this->user_id, $this->product_id]);
    }

    public function remove() {
        global $conn;
        $sql = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->user_id, $this->product_id]);
    }
}
?>
