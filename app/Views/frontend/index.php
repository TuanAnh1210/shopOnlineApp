<?php

ipView('frontend.component.header');
?>



<div class="content">
    <div class=" banner1">
        <img class="banner--img" src="<?= $GLOBALS["domainPage"] ?>/public/imgs/about1.png" alt="">

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
        <img class="banner--img" src="<?= $GLOBALS["domainPage"] ?>/public/imgs/about2.png" alt="">
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
        <img class="banner--img" src="<?= $GLOBALS["domainPage"] ?>/public/imgs/about3.png" alt="">
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
        <img class="banner--img" src="<?= $GLOBALS["domainPage"] ?>/public/imgs/banner1.jpg" alt="">
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
    <img style="width: 100%;" src="<?= $GLOBALS["domainPage"] ?>/public/imgs/subbanner.png" alt="">
</div>

<div class="container">
    <h2 class="product__List--title">S???N PH???M M???I</h2>
    <div class="product__list">

        <div class="owl-carousel owl-theme">
            <?php foreach ($data as $index => $item) : ?>
                <a href="<?= $GLOBALS['domainPage'] ?>/product/detail?prd&id=<?= $item['id'] ?>">
                    <div class="product__item">
                        <div class="product__img"><img src="<?= $GLOBALS['domainPage'] ?>/uploads/<?= $item['image'] ?>" alt="">
                        </div>
                        <h3 class="product__name"><?= $item['name'] ?></h3>
                        <div style="display: flex; justify-content: space-between;">
                            <p class="product__price"><?= number_format($item['price'], 0, "", ".") ?>??</p>
                            <p style="font-size: 12px; color: #555;"><?= $item['bought'] ?> ???? b??n</p>
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
                                ?> class="product__discount product__viewed"> <?= $item['view'] ?><i class="fa-regular fa-eye"></i></span>
                    </div>
                </a>

            <?php endforeach ?>

        </div>



    </div>
</div>

<div class="subbanner">
    <img style="width: 100%;" src="<?= $GLOBALS["domainPage"] ?>/public/imgs/banner3.webp" alt="">
</div>

<div class="container">
    <h2 class="product__List--title">TOP 10 S???N PH???M Y??U TH??CH NH???T</h2>
    <div class="product__list">

        <div class="owl-carousel owl-theme">
            <?php foreach ($bestseller as $index => $item) :  ?>
                <a href="<?= $GLOBALS['domainPage'] ?>/product/detail?prd&id=<?= $item['id'] ?>">
                    <div class="product__item">
                        <div class="product__img"><img src="<?= $GLOBALS['domainPage'] ?>/uploads/<?= $item['image'] ?>" alt="">
                        </div>
                        <h3 class="product__name"><?= $item['name'] ?></h3>
                        <div style="display: flex; justify-content: space-between;">
                            <p class="product__price"><?= number_format($item['price'], 0, "", ".") ?>??</p>
                            <p style="font-size: 12px; color: #555;"><?= $item['bought'] ?> ???? b??n</p>
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
                    <img src="<?= $GLOBALS["domainPage"] ?>/public/imgs/ab1.png" alt="">
                    <h4>GIAO H??NG NHANH CH??NG</h4>
                    <p>Freeship v???i ????n h??ng c?? gi?? tr??? tr??n 200.000??</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="section__about">
                    <img src="<?= $GLOBALS["domainPage"] ?>/public/imgs/ab4.png" alt="">
                    <h4>H??? TR??? 24/7</h4>
                    <p>?????i ng?? b??n h??ng tr???c tuy???n lu??n s???n s??ng h??? tr??? b???n</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="section__about">
                    <img src="<?= $GLOBALS["domainPage"] ?>/public/imgs/ab2.png" alt="">
                    <h4>V?? V??N QU?? T???NG</h4>
                    <p>H??ng tr??m m?? coupon gi???m gi?? m???i ng??y</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="section__about">
                    <img src="<?= $GLOBALS["domainPage"] ?>/public/imgs/ab3.png" alt="">
                    <h4>D??? D??NG ?????I TR???</h4>
                    <p>Freeship v???i ????n h??ng c?? gi?? tr??? tr??n 200.000??</p>
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
<script src="<?= $GLOBALS["domainPage"] ?>/public/lib/owl/owl.carousel.min.js"></script>

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