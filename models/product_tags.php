<?php

class ProductTags {
    private $id;
    private $product_id;
    private $tag_id;

    public function __construct($product_id, $tag_id) {
        $this->product_id = $product_id;
        $this->tag_id = $tag_id;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO product_tags (product_id, tag_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->product_id, $this->tag_id]);
    }
}
?>
