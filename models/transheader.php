<?php

class Transheader {
    private $id;
    private $user_id;
    private $date;
    private $total_due;
    private $payment_method;
    private $payment_status;

    public function __construct($user_id, $total_due, $payment_method, $payment_status) {
        $this->user_id = $user_id;
        $this->date = date('Y-m-d H:i:s');
        $this->total_due = $total_due;
        $this->payment_method = $payment_method;
        $this->payment_status = $payment_status;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO transheader (user_id, date, total_due, payment_method, payment_status) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->user_id, $this->date, $this->total_due, $this->payment_method, $this->payment_status]);
    }
}
?>
