<?php
// models/User.php

require_once 'components/connect.php';

class User {
    private $conn;
    private $table = 'user';

    public $id;
    public $user_email;
    public $user_password;
    public $user_name;
    public $user_date_reg;
    public $user_type_id;
    public $image;
    public $number;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new user
    public function create() {
        $query = "INSERT INTO $this->table (user_email, user_password, user_name, user_date_reg, user_type_id, image, number) 
                  VALUES (:user_email, :user_password, :user_name, :user_date_reg, :user_type_id, :image, :number)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_email', $this->user_email);
        $stmt->bindParam(':user_password', password_hash($this->user_password, PASSWORD_BCRYPT));
        $stmt->bindParam(':user_name', $this->user_name);
        $stmt->bindParam(':user_date_reg', $this->user_date_reg);
        $stmt->bindParam(':user_type_id', $this->user_type_id);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':number', $this->number);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Retrieve a user by email
    public function getByEmail() {
        $query = "SELECT * FROM $this->table WHERE user_email = :user_email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_email', $this->user_email);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->user_email = $row['user_email'];
            $this->user_password = $row['user_password'];
            $this->user_name = $row['user_name'];
            $this->user_date_reg = $row['user_date_reg'];
            $this->user_type_id = $row['user_type_id'];
            $this->image = $row['image'];
            $this->number = $row['number'];
            return true;
        }
        return false;
    }
}
?>