<?php

class CommentLike {
    private $comment_id;
    private $user_id;

    public function __construct($comment_id, $user_id) {
        $this->comment_id = $comment_id;
        $this->user_id = $user_id;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO comment_likes (comment_id, user_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->comment_id, $this->user_id]);
    }
}
?>
