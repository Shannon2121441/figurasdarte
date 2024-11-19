<?php
class User
{
    private $conn;
    private $table = 'users';

    public $id;
    public $user_email;
    public $user_password;
    public $user_name;
    public $user_date_reg;
    public $user_type_id;
    public $image;
    public $number;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create a new user
    public function create()
    {
        try {
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
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    // Retrieve a user by email
    public function getByEmail()
    {
        try {
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
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    // Validate user login
    public function validateUser($user_email, $user_password)
    {
        try {
            $return = false;

            $query = "SELECT * FROM $this->table WHERE user_email = :user_email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':user_email', $user_email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                if (password_verify($user_password, $row['user_password'])) {
                    session_start();
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["user_email"] = $row['user_email'];
                    $_SESSION["user_name"] = $row['user_name'];
                    $_SESSION["user_type_id"] = $row['user_type_id'];
                    $return = true;
                }
            }

            return $return;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    // Update user details
    public function update()
    {
        try {
            $query = "UPDATE $this->table SET user_name = :user_name, user_password = :user_password, 
                      user_type_id = :user_type_id, image = :image, number = :number 
                      WHERE id = :id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':user_name', $this->user_name);
            $stmt->bindParam(':user_password', password_hash($this->user_password, PASSWORD_BCRYPT));
            $stmt->bindParam(':user_type_id', $this->user_type_id);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':number', $this->number);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    // Delete user
    public function delete($id)
    {
        try {
            $query = "DELETE FROM $this->table WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fetchSellers() {
        $query = "SELECT user_name, user_email, number, image FROM users WHERE user_type = 'seller'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
