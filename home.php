<?php
    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
    }else{
        $user_id = '';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Figuras D' Arte - Home Page</title>
        <link rel="stylesheet" type="text/css" href="assets/css/user_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel='stylesheet'>
    </head>
    <body>
        <?php include 'components/user_header.php'; ?>

        <!--- Slider section start--->
        <div class="slider-container">
            <div class="slider">
                <div class="slideBox active">
                    <div class="textBox">
                        <h1>U-Week</h1>
                        <a href="menu.php" class="btn">Join Now!</a>
                    </div>
                    <div class="imgBox">
                        <img src="image/event1.png">
                    </div>
                </div>
                <div class="slideBox">
                    <div class="textBox">
                        <h1>GLYFtober</h1>
                        <a href="menu.php" class="btn">Join Now!</a>
                    </div>
                    <div class="imgBox">
                        <img src="image/event2.jpg">
                    </div>
                </div>
                <div class="slideBox">
                    <div class="textBox">
                        <h1>GLYFtober</h1>
                        <a href="menu.php" class="btn">Join Now!</a>
                    </div>
                    <div class="imgBox">
                        <img src="image/event3.jpg">
                    </div>
                </div>
            </div>
            <ul class="controls">
                <li onclick="nextSlide();" class="next"><i class="bx bx-right-arrow-alt"></i></li>
                <li onclick="prevSlide();" class="prev"><i class="bx bx-left-arrow-alt"></i></li>
            </ul>
        </div>
        <!--- Slider section end--->
        <!--- Categories section start--->
        <div class="categories">
            <div class="heading">
                <h1>Categories Features</h1>
                <img src="image/separator-img.png">
            </div>
            <div class="box-container">
                <div class="box">
                    <img src="image/accessories.webp">
                    <a href="menu.php" class="btn">Accessories</a>
                </div>
                <div class="box">
                    <img src="image/paintings.jpg">
                    <a href="menu.php" class="btn">Paintings</a>
                </div>
                <div class="box">
                    <img src="image/prints.webp">
                    <a href="menu.php" class="btn">Prints</a>
                </div>
                <div class="box">
                    <img src="image/merch.jpg">
                    <a href="menu.php" class="btn">Merchandise</a>
                </div>
            </div>
        </div>
        <!--- Categories section end--->
        <div class="taste">
            <div class="heading">
                <h1>Buy 1 Get 1</h1>
                <img src="image/separator-img.png">
            </div>
            <div class="box-container">
                <div class="box">
                    <img src="image/logo.png">
                    <div class="detail">
                        <h2>Natural</h2>
                        <h1>Vanilla</h1>
                    </div>
                </div>
                <div class="box">
                    <img src="image/logo.png">
                    <div class="detail">
                        <h2>Natural</h2>
                        <h1>Vanilla</h1>
                    </div>
                </div>
                <div class="box">
                    <img src="image/logo.png">
                    <div class="detail">
                        <h2>Natural</h2>
                        <h1>Vanilla</h1>
                    </div>
                </div>
            </div>
        </div>
        <!--- Categories section end--->
        <!--- Container section starts--->
        <div class="another-container">
            <div class="overlay"></div>
            <div class="detail">
                <h1>I loooove art wow</h1>
                <p>blabalbalbalbalbalba</p>
                <a href="menu.php" class="btn">Shop Now</a>
            </div>
        </div>
        <!--- Container section end--->
        <!--- Categories section start--->
        <div class="taste2">
            <div class="t-banner">
                <div class="overlay"></div>
                <div class="detail">
                    <h1>Find what you want</h1>
                    <p>asdasdasdas</p>
                    <a href="menu.php" class="btn">Shop Now</a>
                </div>
            </div>
            <div class="box-container">
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/logo.png">
                    <div class="box-details fadeIn-bottom">
                        <h1>Paintings</h1>
                        <p>dmkslmdfksmdf</p>
                        <a href="menu.php" class="btn">Explore More</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/logo.png">
                    <div class="box-details fadeIn-bottom">
                        <h1>Paintings</h1>
                        <p>dmkslmdfksmdf</p>
                        <a href="menu.php" class="btn">Explore More</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/logo.png">
                    <div class="box-details fadeIn-bottom">
                        <h1>Paintings</h1>
                        <p>dmkslmdfksmdf</p>
                        <a href="menu.php" class="btn">Explore More</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/logo.png">
                    <div class="box-details fadeIn-bottom">
                        <h1>Paintings</h1>
                        <p>dmkslmdfksmdf</p>
                        <a href="menu.php" class="btn">Explore More</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/logo.png">
                    <div class="box-details fadeIn-bottom">
                        <h1>Paintings</h1>
                        <p>dmkslmdfksmdf</p>
                        <a href="menu.php" class="btn">Explore More</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-overlay"></div>
                    <img src="image/logo.png">
                    <div class="box-details fadeIn-bottom">
                        <h1>Paintings</h1>
                        <p>dmkslmdfksmdf</p>
                        <a href="menu.php" class="btn">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
        <!--- Categories section end--->
        <!--- Flavor section starts--->
        <div class="flavor">
            <div class="box-container">
                <img src="image/logo.png">
                <div class="detail">
                    <h1>Hot Dealssss</h1>
                    <p>clearance imnida</p>
                    <a href="menu.php" class="btn">Shop now</a>
                </div>
            </div>
        </div>
        <!--- Flavor section end--->
        <!--- Pride section starts--->
        <div class="pride">
            <div class="detail">
                <h1>We Pride Ourselves on</h1>
                <p>nsdkfjsnjfnsdsdjfbdvkdjfnndf</p>
                <a href="menu.php" class="btn">Shop Now</a>
            </div>
        </div>
        <!--- Pride section end--->
        <?php include 'components/footer.php'; ?>
        <script src="assets/js/user_script.js"></script>
    </body>
</html>