<?php

class Address {
    private $id;
    private $user_id;
    private $addr_line1;
    private $addr_line2;
    private $city;
    private $region;
    private $postal_code;
    private $country;
    private $addr_type;

    public function __construct($user_id, $addr_line1, $addr_line2, $city, $region, $postal_code, $country, $addr_type) {
        $this->user_id = $user_id;
        $this->addr_line1 = $addr_line1;
        $this->addr_line2 = $addr_line2;
        $this->city = $city;
        $this->region = $region;
        $this->postal_code = $postal_code;
        $this->country = $country;
        $this->addr_type = $addr_type;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO address (user_id, addr_line1, addr_line2, city, region, postal_code, country, addr_type)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->user_id, $this->addr_line1, $this->addr_line2, $this->city, $this->region, $this->postal_code, $this->country, $this->addr_type]);
    }
}
?>
