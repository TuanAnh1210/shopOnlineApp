<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/du_an_mau/public/lib/owl/owl.theme.default.min.css">
    <link rel="stylesheet" href="http://localhost/du_an_mau/public/lib/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= gridmap_css() ?>" />
    <link rel="stylesheet" href="<?= grid_css() ?>" />
    <link rel="stylesheet" href="<?= css_file() ?>" />
    <link rel="stylesheet" href="<?= css_responsive() ?>" />
</head>

<body>
    <div class="main">
        <header>
            <div class="header__heading--wrapper">
                <div class="container">
                    <h2 class="header__heading">
                        <?php if (empty($_SESSION)) : ?>

                        <a href="http://localhost/du_an_mau/account">
                            <span>Đăng nhập</span>
                            <i class="fa-regular fa-circle-user"></i>
                        </a>
                        <?php endif ?>

                        <?php if (!empty($_SESSION)) : ?>
                        <div class="login__user">
                            <span>Hi, <?php echo $_SESSION['auth']['fullname'] ?></span>
                            <img style="width: 28px; height: 28px; border-radius: 50%; display: inline-block;"
                                src="http://localhost/du_an_mau/uploads/<?php echo $_SESSION['auth']['avatar'] ?>"
                                alt="">
                            <ul class="login__actions">
                                <li><a href="#">Tài khoản</a></li>
                                <li><a href="#">Đơn hàng</a></li>
                                <li><a href="#">Admin</a></li>
                                <li><a href="http://localhost/du_an_mau/account/logout">Đăng xuất</a></li>
                            </ul>
                        </div>
                        <?php endif ?>

                    </h2>
                </div>
            </div>

            <div class="container">
                <div class="header__primary">
                    <div class="header__bar">
                        <i class="fa-solid fa-chart-bar"></i>
                    </div>
                    <a href="http://localhost/du_an_mau">
                        <div class="header__logo">
                            <img src="http://localhost/du_an_mau/public/imgs/logo.png" alt="">
                        </div>
                    </a>
                    <nav class="header__nav">
                        <p class="close__item">
                            <i class="fa-regular fa-circle-xmark close-btn"></i>
                        </p>
                        <a data-item="" class="header__item" href="http://localhost/du_an_mau/">Trang chủ</a>
                        <a data-item="product" class="header__item" href="http://localhost/du_an_mau/product">Sản
                            phẩm</a>
                        <a data-item="gioi-thieu" class="header__item" href="http://localhost/du_an_mau/gioi-thieu">Giới
                            thiệu</a>

                        <a data-item="lien-he" class="header__item" href="http://localhost/du_an_mau/lien-he">Liên
                            hệ</a>
                    </nav>
                    <div class="header__actions">

                        <p class="header__carts">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="quantity__carts">12</span>
                        </p>
                    </div>
                </div>
            </div>

        </header>