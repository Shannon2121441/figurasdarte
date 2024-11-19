<?php

class Tag {
    private $id;
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO tag (name) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->name]);
    }

    public static function getById($id) {
        global $conn;
        $sql = "SELECT * FROM tag WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>
