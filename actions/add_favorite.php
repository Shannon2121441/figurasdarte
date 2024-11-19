<?php
// adding products to favorite
if (isset($_POST['add_to_favorite'])) {
    if (!empty($user_id)) {

        if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
            $product_id = $_POST['product_id']; 
        } else {
            $warning_msg[] = 'Product ID is missing';
            return;
        }

        // Check if the product already exists in favorite
        $verify_favorite = $conn->prepare("SELECT * FROM `favorite` WHERE user_id = ? AND product_id = ?");
        $verify_favorite->execute([$user_id, $product_id]);

        // Check if the product is in the cart
        $cart_num = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND product_id = ?");
        $cart_num->execute([$user_id, $product_id]);

        if ($verify_favorite->rowCount() > 0) {
            $warning_msg[] = 'Product already exists in your favorite';
        } elseif ($cart_num->rowCount() > 0) {
            $warning_msg[] = 'Product already exists in your cart';
        } else {
            // Fetch the product price
            $select_price = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1");
            $select_price->execute([$product_id]);
            $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

            // Insert into favorite without specifying `id` (assuming it auto-increments)
            $insert_favorite = $conn->prepare("INSERT INTO `favorite` (user_id, product_id) VALUES(?,?)");
            $insert_favorite->execute([$user_id, $product_id]);

            $success_msg[] = 'Product added to your favorite successfully';
        }
    } else {
        $warning_msg[] = 'Please login to add product to favorite';
    }
}
?>
