<?php

ipView('frontend.component.header');
$test = date("Y-m-d H:i:s");
?>



<div class="content">
    <div class=" banner1">
        <img class="banner--img" src="http://localhost/du_an_mau/public/imgs/about1.png" alt="">

        <div class="slider__scrool-textbox">
            <span class="textbox-town">Paris</span>
            <div class="textbox-town--wrapper">
                <div class="textbox-town-sub">
                    <strong>TOUR</strong>
                    EIFFEL
                </div>

                <div class="textbox-town--tour">
                    <p>CITY</p>
                    <span>TOUR</span>
                </div>
            </div>
        </div>
    </div>
    <div class=" banner2">
        <img class="banner--img" src="http://localhost/du_an_mau/public/imgs/about2.png" alt="">
        <div class="slider__scrool-textbox">
            <span class="textbox-town">Paris</span>
            <div class="textbox-town--wrapper">
                <div class="textbox-town-sub">
                    <strong>TOUR</strong>
                    EIFFEL
                </div>

                <div class="textbox-town--tour">
                    <p>CITY</p>
                    <span>TOUR</span>
                </div>
            </div>
        </div>
    </div>
    <div class=" banner3">
        <img class="banner--img" src="http://localhost/du_an_mau/public/imgs/about3.png" alt="">
        <div class="slider__scrool-textbox">
            <span class="textbox-town">Paris</span>
            <div class="textbox-town--wrapper">
                <div class="textbox-town-sub">
                    <strong>TOUR</strong>
                    EIFFEL
                </div>

                <div class="textbox-town--tour">
                    <p>CITY</p>
                    <span>TOUR</span>
                </div>
            </div>
        </div>
    </div>
    <div class="banner4">
        <img class="banner--img" src="http://localhost/du_an_mau/public/imgs/banner1.jpg" alt="">
        <div class="slider__scrool-textbox">
            <span class="textbox-town">Paris</span>
            <div class="textbox-town--wrapper">
                <div class="textbox-town-sub">
                    <strong>TOUR</strong>
                    EIFFEL
                </div>

                <div class="textbox-town--tour">
                    <p>CITY</p>
                    <span>TOUR</span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="subbanner">
    <img style="width: 100%;" src="http://localhost/du_an_mau/public/imgs/subbanner.png" alt="">
</div>

<div class="container">
    <h2 class="product__List--title">SẢN PHẨM MỚI</h2>
    <div class="product__list">

        <div class="owl-carousel owl-theme">
            <?php foreach ($data as $index => $item) : ?>
            <a href="http://localhost/du_an_mau/product/detail?prd&id=<?= $item['id'] ?>">
                <div class="product__item">
                    <div class="product__img"><img src="http://localhost/du_an_mau/uploads/<?= $item['image'] ?>"
                            alt="">
                    </div>
                    <h3 class="product__name"><?= $item['name'] ?></h3>
                    <div style="display: flex; justify-content: space-between;">
                        <p class="product__price"><?= number_format($item['price'], 0, "", ".") ?>đ</p>
                        <p style="font-size: 12px; color: #555;"><?= $item['bought'] ?> đã bán</p>
                    </div>
                    <span <?php
                                if (!$item['discount']) {
                                    echo "hidden";
                                }
                                ?> class="product__discount"> -<?= $item['discount'] ?>%</span>

                    <span <?php
                                if (!$item['discount']) {
                                    echo "hidden";
                                }
                                ?> class="product__discount product__viewed"> <?= $item['view'] ?><i
                            class="fa-regular fa-eye"></i></span>
                </div>
            </a>

            <?php endforeach ?>

        </div>



    </div>
</div>

<div class="subbanner">
    <img style="width: 100%;" src="http://localhost/du_an_mau/public/imgs/banner3.webp" alt="">
</div>

<div class="container">
    <h2 class="product__List--title">TOP 10 SẢN PHẨM YÊU THÍCH NHẤT</h2>
    <div class="product__list">

        <div class="owl-carousel owl-theme">
            <?php foreach ($bestseller as $index => $item) :  ?>
            <a href="http://localhost/du_an_mau/product/detail?prd&id=<?= $item['id'] ?>">
                <div class="product__item">
                    <div class="product__img"><img src="http://localhost/du_an_mau/uploads/<?= $item['image'] ?>"
                            alt="">
                    </div>
                    <h3 class="product__name"><?= $item['name'] ?></h3>
                    <div style="display: flex; justify-content: space-between;">
                        <p class="product__price"><?= number_format($item['price'], 0, "", ".") ?>đ</p>
                        <p style="font-size: 12px; color: #555;"><?= $item['bought'] ?> đã bán</p>
                    </div>
                    <span <?php
                                if (!$item['discount']) {
                                    echo "hidden";
                                }
                                ?> class="product__discount"> -<?= $item['discount'] ?>%</span>

                    <span <?php
                                if (!$item['discount']) {
                                    echo "hidden";
                                }
                                ?> class="product__discount product__viewed"> <?= $item['view'] ?>
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </div>
            </a>

            <?php endforeach  ?>

        </div>



    </div>
</div>

<div class="sAbout">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="section__about">
                    <img src="http://localhost/du_an_mau/public/imgs/ab1.png" alt="">
                    <h4>GIAO HÀNG NHANH CHÓNG</h4>
                    <p>Freeship với đơn hàng có giá trị trên 200.000đ</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="section__about">
                    <img src="http://localhost/du_an_mau/public/imgs/ab4.png" alt="">
                    <h4>HỖ TRỢ 24/7</h4>
                    <p>Đội ngũ bán hàng trực tuyến luôn sẵn sàng hỗ trợ bạn</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="section__about">
                    <img src="http://localhost/du_an_mau/public/imgs/ab2.png" alt="">
                    <h4>VÔ VÀN QUÀ TẶNG</h4>
                    <p>Hàng trăm mã coupon giảm giá mỗi ngày</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="section__about">
                    <img src="http://localhost/du_an_mau/public/imgs/ab3.png" alt="">
                    <h4>DỄ DÀNG ĐỔI TRẢ</h4>
                    <p>Freeship với đơn hàng có giá trị trên 200.000đ</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.owl-nav {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
}

.owl-prev,
.owl-next {
    background-color: #ccc !important;
    width: 42px;
    height: 42px;
    border-radius: 50% !important;
    display: flex;
    align-items: center;
}

.owl-next span,
.owl-prev span {
    font-size: 34px;
    display: inline-block;
    height: 100%;
    line-height: 36px;

}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="http://localhost/du_an_mau/public/lib/owl/owl.carousel.min.js"></script>

<script>
$(document).ready(function() {
    $(".owl-carousel").owlCarousel();
});
$(".owl-carousel").owlCarousel({
    loop: true,
    margin: 28,
    // autoplay: true,
    // autoplayTimeout: 3000,
    nav: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 4,
        },
    },
});
</script>
<?php ipView('frontend.component.footer') ?>