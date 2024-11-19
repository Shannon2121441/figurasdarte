<?php
include '../includes.php';

if (isset($_COOKIE['seller_id'])) {
    $seller_id = $_COOKIE['seller_id'];
} else {
    $seller_id = '';
    header('location:login.php');
}

// Fetch sellers
$select_sellers = $conn->prepare("SELECT * FROM `users` WHERE `user_type_id` = 2");
$select_sellers->execute();

$sellers = [];
if ($select_sellers->rowCount() > 0) {
    while ($fetch_sellers = $select_sellers->fetch(PDO::FETCH_ASSOC)) {
        $sellers[] = $fetch_sellers;
    }
}
?>
