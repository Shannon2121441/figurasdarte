<?php

class Favorite {
    private $user_id;
    private $product_id;

    public function __construct($user_id, $product_id) {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO favorite (user_id, product_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->user_id, $this->product_id]);
    }

    public static function getFavoritesByUserId($user_id) {
        global $conn;
        $sql = "SELECT * FROM favorite WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }
}
?>
