<?php
include 'config.php';
session_start();

$warning_msg = []; // Initialize warnings

if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $pass = sha1(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE user_email = ? AND user_password = ?");
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $_SESSION['user_id'] = $row['id'];  
        header('location:home.php');
        exit();
    } else {
        $warning_msg[] = 'Incorrect Email or Password';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Figuras D' Arte - User Login Page</title>
    <link rel="stylesheet" type="text/css" href="assets/css/user_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel='stylesheet'>
</head>
<body>
    <?php include 'components/user_header.php'; ?>

    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data" class="login">
            <h3>Login Now</h3>

            <div class="input-field">
                <p>Your Email <span>*</span></p>
                <input type="email" name="email" placeholder="Email..." maxlength="50" required class="box">
            </div>

            <div class="input-field">
                <p>Your Password <span>*</span></p>
                <input type="password" name="pass" placeholder="Password..." maxlength="50" required class="box">
            </div>            

            <p class="link">Don't have an Account? <a href="register.php">Register Now!</a></p>

            <input type="submit" name="submit" value="Login Now" class="btn">
        </form>
    </div>

    <?php 
    if (!empty($warning_msg)) {
        foreach ($warning_msg as $msg) {
            echo '<script>swal("Error", "' . $msg . '", "error");</script>';
        }
    }
    ?>

    <?php include 'components/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="js/user_script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>
</html>
