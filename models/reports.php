<?php

class Report {
    private $id;
    private $post_id;
    private $comment_id;
    private $user_id;
    private $report_date;
    private $reason;

    public function __construct($post_id, $comment_id, $user_id, $reason) {
        $this->post_id = $post_id;
        $this->comment_id = $comment_id;
        $this->user_id = $user_id;
        $this->report_date = date('Y-m-d H:i:s'); // Set the current date/time for report
        $this->reason = $reason;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO reports (post_id, comment_id, user_id, report_date, reason) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->post_id, $this->comment_id, $this->user_id, $this->report_date, $this->reason]);
    }
}
?>
