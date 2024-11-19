<?php

class Comment {
    private $id;
    private $post_id;
    private $user_id;
    private $comment_content;
    private $comment_date;

    public function __construct($post_id, $user_id, $comment_content) {
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->comment_content = $comment_content;
        $this->comment_date = date('Y-m-d H:i:s'); // Set the current date/time for comment
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO comments (post_id, user_id, comment_content, comment_date) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->post_id, $this->user_id, $this->comment_content, $this->comment_date]);
    }
}
?>
