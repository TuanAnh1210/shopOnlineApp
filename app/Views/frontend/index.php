<?php ipView('frontend.component.header') ?>



<div class="banner">
    <img style="width: 100%;" src="http://localhost/du_an_mau/public/imgs/banner1.jpg" alt="">
</div>
<div class="subbanner">
    <img style="width: 100%;" src="http://localhost/du_an_mau/public/imgs/subbanner.png" alt="">
</div>

<div class="container">
    <h2 class="product__List--title">SẢN PHẨM MỚI</h2>
    <div class="product__list">

        <div class="owl-carousel owl-theme">
            <?php foreach ($data as $index => $item) : ?>
            <div class="product__item">
                <div class="product__img"><img src="http://localhost/du_an_mau/uploads/<?= $item['image'] ?>" alt="">
                </div>
                <h3 class="product__name"><?= $item['name'] ?></h3>
                <div style="display: flex; justify-content: space-between;">
                    <p class="product__price"><?= $item['price'] ?>đ</p>
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

            <?php endforeach ?>

        </div>



    </div>
</div>

<div class="subbanner">
    <img style="width: 100%;" src="http://localhost/du_an_mau/public/imgs/banner3.webp" alt="">
</div>

<div class="container">
    <h2 class="product__List--title">SẢN PHẨM BÁN CHẠY NHẤT</h2>
    <div class="product__list">

        <div class="owl-carousel owl-theme">
            <?php foreach ($bestseller as $index => $item) :  ?>
            <div class="product__item">
                <div class="product__img"><img src="http://localhost/du_an_mau/uploads/<?= $item['image'] ?>" alt="">
                </div>
                <h3 class="product__name"><?= $item['name'] ?></h3>
                <div style="display: flex; justify-content: space-between;">
                    <p class="product__price"><?= $item['price'] ?>đ</p>
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
            items: 3,
        },
        600: {
            items: 6,
        },
        1000: {
            items: 4,
        },
    },
});
</script>
<?php ipView('frontend.component.footer') ?>