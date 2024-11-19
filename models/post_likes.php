<?php

class PostLike {
    private $post_id;
    private $user_id;

    public function __construct($post_id, $user_id) {
        $this->post_id = $post_id;
        $this->user_id = $user_id;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO post_likes (post_id, user_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->post_id, $this->user_id]);
    }
}
?>
