<?php
require_once 'includes.php'; // Include your database connection
require_once 'models/users.php';   // Include the User class

$sellers = $user->fetchSellers();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Figuras D' Arte - Sellers</title>
    <link rel="stylesheet" type="text/css" href="css/user_style.css">
</head>
<body>
    <?php include 'components/user_header.php'; ?>

    <div class="seller-list">
        <div class="heading">
            <h1>Our Sellers</h1>
            <p>Meet our talented artists and sellers!</p>
            <img src="image/separator-img.png">
        </div>
        <div class="box-container">
            <?php if (!empty($sellers)): ?>
                <?php foreach ($sellers as $seller): ?>
                    <div class="box">
                        <img src="images/users/<?php echo htmlspecialchars($seller['image']); ?>" alt="Seller Image">
                        <div>
                            <h1><?php echo htmlspecialchars($seller['user_name']); ?></h1>
                            <p>Email: <?php echo htmlspecialchars($seller['user_email']); ?></p>
                            <p>Contact: <?php echo htmlspecialchars($seller['number']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No sellers found.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>
    <script src="js/user_script.js"></script>
</body>
</html>
