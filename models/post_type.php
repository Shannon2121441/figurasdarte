<?php

class PostType {
    private $id;
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO post_type (name) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->name]);
    }

    public static function getById($id) {
        global $conn;
        $sql = "SELECT * FROM post_type WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>
