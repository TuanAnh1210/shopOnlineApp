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
                        <span>Đăng nhập</span>
                        <i class="fa-regular fa-circle-user"></i>
                    </h2>
                </div>
            </div>

            <div class="container">
                <div class="header__primary">
                    <div class="header__bar">
                        <i class="fa-solid fa-chart-bar"></i>
                    </div>
                    <div class="header__logo">
                        <img src="http://localhost/du_an_mau/public/imgs/logo.png" alt="">
                    </div>
                    <nav class="header__nav">
                        <p class="close__item">
                            <i class="fa-regular fa-circle-xmark close-btn"></i>
                        </p>
                        <a data-item="" class="header__item" href="http://localhost/du_an_mau/">Trang chủ</a>
                        <a data-item="product" class="header__item" href="http://localhost/du_an_mau/product">Sản
                            phẩm</a>
                        <a data-item="gioi-thieu" class="header__item" href="http://localhost/du_an_mau/gioi-thieu">Giới
                            thiệu</a>
                        <a data-item="tin-tuc" class="header__item" href="http://localhost/du_an_mau/tin-tuc">Tin
                            tức</a>
                        <a data-item="lien-he" class="header__item" href="http://localhost/du_an_mau/lien-he">Liên
                            hệ</a>
                    </nav>
                    <div class="header__actions">
                        <p class="header__search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </p>
                        <p class="header__carts">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </p>
                    </div>
                </div>
            </div>

        </header>