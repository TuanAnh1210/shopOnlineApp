<?php ipView('frontend.component.header') ?>

<div class="product__wrapper">
    <div class="container">
        <div class="product--top">
            <h2 style="font-size: 24px; font-weight: 400;">Sản phẩm</h2>



            <div class="btn__actions">

                <button class="product__sort--btn">
                    <p>Sắp xếp</p>
                    <i style="font-size: 22px;" class="fa-solid fa-arrow-up-wide-short"></i>
                    <ul class="sort__detail">
                        <li>Thấp đến cao</li>
                        <li>Cao đến thấp</li>
                        <li>Yêu thích nhất</li>
                    </ul>
                </button>
            </div>
        </div>

        <div class="filter__category owl-carousel owl-theme">
            <?php foreach ($listCate as $index => $item) : ?>
            <button class="btn__filter--category"><?= $item['name'] ?></button>

            <?php endforeach ?>

        </div>

        <div class="product__list">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="product__item product__item--primary">
                        <div class="product__img"><img src="http://localhost/du_an_mau/public/imgs/ao1.webp" alt="">
                        </div>
                        <h3 class="product__name">Quan au nam dep</h3>
                        <div style="display: flex; justify-content: space-between;">
                            <p class="product__price">895.000đ</p>
                            <p style="font-size: 12px; color: #555;">12 luot xem</p>
                        </div>
                        <span class="product__discount"> -5%</span>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="product__item product__item--primary">
                        <div class="product__img"><img src="http://localhost/du_an_mau/public/imgs/ao1.webp" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="product__item product__item--primary">
                        <div class="product__img"><img src="http://localhost/du_an_mau/public/imgs/ao1.webp" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="product__item product__item--primary">
                        <div class="product__img"><img src="http://localhost/du_an_mau/public/imgs/ao1.webp" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-3">
                    <div class="product__item product__item--primary">
                        <div class="product__img"><img src="http://localhost/du_an_mau/public/imgs/ao1.webp" alt="">
                        </div>
                        <h3 class="product__name">Quan au nam dep</h3>
                        <p class="product__price">895.000đ</p>
                        <span class="product__discount"> -5%</span>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="product__item product__item--primary">
                        <div class="product__img"><img src="http://localhost/du_an_mau/public/imgs/ao1.webp" alt="">
                        </div>
                        <h3 class="product__name">Quan au nam dep</h3>
                        <p class="product__price">895.000đ</p>
                        <span class="product__discount"> -5%</span>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-3">
                    <div class="product__item product__item--primary">
                        <div class="product__img"><img src="http://localhost/du_an_mau/public/imgs/ao1.webp" alt="">
                        </div>
                        <h3 class="product__name">Quan au nam dep</h3>
                        <p class="product__price">895.000đ</p>
                        <span class="product__discount"> -5%</span>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="product__item product__item--primary">
                        <div class="product__img"><img src="http://localhost/du_an_mau/public/imgs/ao1.webp" alt="">
                        </div>
                        <h3 class="product__name">Quan au nam dep</h3>
                        <p class="product__price">895.000đ</p>
                        <span class="product__discount"> -5%</span>
                    </div>
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
    margin: 10,
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
            items: 10,
        },
    },
});
</script>

<?php ipView('frontend.component.footer') ?>