<?php

class Transline {
    private $header_id;
    private $product_id;
    private $desc;
    private $price;
    private $qty;
    private $discount;
    private $line_total;

    public function __construct($header_id, $product_id, $desc, $price, $qty, $discount, $line_total) {
        $this->header_id = $header_id;
        $this->product_id = $product_id;
        $this->desc = $desc;
        $this->price = $price;
        $this->qty = $qty;
        $this->discount = $discount;
        $this->line_total = $line_total;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO transline (header_id, product_id, desc, price, qty, discount, line_total) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->header_id, $this->product_id, $this->desc, $this->price, $this->qty, $this->discount, $this->line_total]);
    }
}
?>
