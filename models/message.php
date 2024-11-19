<?php

class Message {
    private $id;
    private $sender_id;
    private $receiver_id;
    private $subject;
    private $message_text;
    private $message_date;
    private $status;

    public function __construct($sender_id, $receiver_id, $subject, $message_text, $status) {
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->subject = $subject;
        $this->message_text = $message_text;
        $this->message_date = date('Y-m-d H:i:s');
        $this->status = $status;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO message (sender_id, receiver_id, subject, message_text, message_date, status) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->sender_id, $this->receiver_id, $this->subject, $this->message_text, $this->message_date, $this->status]);
    }

    public static function getMessagesByReceiverId($receiver_id) {
        global $conn;
        $sql = "SELECT * FROM message WHERE receiver_id = ? ORDER BY message_date DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$receiver_id]);
        return $stmt->fetchAll();
    }

    public function markAsRead() {
        $this->status = 'read';

        global $conn;
        $sql = "UPDATE message SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->status, $this->id]);
    }

    public static function deleteMessage($id) {
        global $conn;
        $sql = "DELETE FROM message WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>
