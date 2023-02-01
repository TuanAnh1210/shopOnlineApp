<?php
ipView('frontend.component.header');
?>

<div class="detail__wrapper">
    <div class="message__delete">
        <h2>Bạn chắc chắn muốn xóa !!</h2>
        <h4>Nếu xóa dữ liệu sẽ không thể khôi phục</h4>
        <div class="btn__delete-container">
            <button class="yes">Yes</button>
            <button class="no">No</button>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="detail--img">
                    <img style="width: 100%;" src="<?= $GLOBALS["domainPage"] ?>/uploads/<?= $detailPrd['image'] ?>" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-7">
                <div class="detail__info">
                    <h2 class="detail__title"><?= $detailPrd['name'] ?></h2>
                    <h3 class="detail__price"><?= number_format($detailPrd['price'], 0, "", ".") ?>đ</h3>
                    <div class="detail__more">
                        <p class="detail__more--left">Mã sản phẩm:</p>
                        <p class="detail__more--right">MG<?= $detailPrd['id'] ?></p>
                    </div>
                    <div class="detail__more">
                        <p class="detail__more--left">Thương hiệu:</p>
                        <p class="detail__more--right">Mangostino</p>
                    </div>
                    <div class="detail__more">
                        <p class="detail__more--left">Kích thước:</p>
                        <p class="detail__more--right">S - M - L - XL</p>
                    </div>
                    <form action="" method="post">
                        <div class="detail__quantity">
                            <p class="detail__quantity--text">
                                Chọn số lượng:
                            </p>
                            <div class="detail__quantity--actions">
                                <input class="detail__quantity--ipt" type="number" value="1" name="quantityPrd">
                                <input hidden type="text" name="idPrd" value="<?= $detailPrd['id'] ?>">
                            </div>
                        </div>

                        <div class="button__control">

                            <?php if (empty($_SESSION['auth'])) : ?>

                                <a class="add-cart" href="<?= $GLOBALS["domainPage"] ?>/account">Thêm vào giỏ
                                    hàng</a>
                                <a class="buy-prd" href="<?= $GLOBALS["domainPage"] ?>/account">Mua ngay<a>
                                    <?php endif ?>

                                    <?php if (!empty($_SESSION['auth'])) : ?>

                                        <button class="add-cart">Thêm vào giỏ hàng</button>
                                        <button class="buy-prd">Mua ngay</button>
                                    <?php endif ?>
                        </div>
                    </form>

                    <div class="detail__desc">
                        <h3>MÔ TẢ NGẮN</h3>
                        <p class="detail__desc--text"><?= $detailPrd['desc'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="comment__wrapper">
            <h3 style="margin: 16px 0 24px 0;">Bình luận của khách hàng</h3>
            <div class="row">
                <div class="col-12 col-md-5 col-lg-5">
                    <?php if (!empty($_SESSION['auth'])) : ?>
                        <div class="commentBox">
                            <img class="commentBox--img" src="<?= $GLOBALS["domainPage"] ?>/uploads/<?php echo $_SESSION['auth']['avatar'] ?>" alt="">


                            <form class="form__comment" method="POST" action="<?= $GLOBALS["domainPage"] ?>/comment/addCmt">
                                <input hidden type="text" value="<?= $_GET['id']  ?>" name="idPrd">
                                <textarea required class="commentBox--ipt" name="cmt_user" id="" cols="30" rows="10" placeholder="Gửi bình luận của bạn"></textarea>
                                <button class="send__comment">Gửi bình luận</button>
                            </form>
                        </div>
                    <?php endif ?>

                    <?php if (empty($_SESSION['auth'])) : ?>
                        <div class="notAuth">



                            <a class="notAuth--link" href="<?= $GLOBALS["domainPage"] ?>/account">Đăng nhập để mua sắm và bình
                                luận</a>

                        </div>
                    <?php endif ?>


                </div>
                <div class="col-12 col-md-7 col-lg-7  lc">

                    <?php if (count($listCmt) == 0) : ?>
                        <h4 style="font-style: italic;">Chưa có ai bình luận , hãy là người bình luận đầu tiên...!</h4>
                    <?php endif ?>

                    <?php if (count($listCmt) > 0) : ?>
                        <?php foreach ($listCmt as $index => $item) : ?>
                            <div class="commentBox">
                                <img class="commentBox--img" src="<?= $GLOBALS["domainPage"] ?>/uploads/<?= $item['avatar'] ?>" alt="">

                                <div class="commentBox--right">
                                    <h5><?= $item['fullname'] ?> <span class="comment__time"><?= $item['comment_time'] ?></span>
                                    </h5>
                                    <p class="commentBox--text"><?= $item['content'] ?></p>
                                    <form class="form__update-cmt" action="<?= $GLOBALS["domainPage"] ?>/comment/updateCmt" method="POST">
                                        <input required class="comment__ipt--update" type="text" value="<?= $item['content'] ?>" name="update_cmt">

                                        <input hidden type="text" value="<?= $item['product_id'] ?>" name="curPrd">
                                        <input hidden type="text" value="<?= $item['id_cmt'] ?>" name="curCmt">

                                        <button class="btn__save-cmt">Lưu</button>
                                    </form>

                                    <?php if (!empty($_SESSION['auth']) && $_SESSION['auth']['id'] == $item['id_user']) : ?>
                                        <button data-idPrd="<?= $item['product_id'] ?>" data-idCmt="<?= $item['id_cmt'] ?>" class="delete__comment">Xóa bình
                                            luận</button>

                                        <button onclick="handleUpdateCmt(this)" data-idPrd="<?= $item['product_id'] ?>" data-idCmt="<?= $item['id_cmt'] ?>" class="update__comment">Chỉnh sửa</button>
                                    <?php endif ?>

                                </div>
                            </div>


                        <?php endforeach ?>
                    <?php endif ?>

                </div>
            </div>
        </div>

        <div class="container">
            <h2 class="product__List--title">SẢN PHẨM CÙNG LOẠI</h2>
            <div class="product__list">

                <div class="owl-carousel owl-theme">
                    <?php foreach ($listProduct as $index => $item) :  ?>

                        <a href="<?= $GLOBALS["domainPage"] ?>/product/detail?prd&id=<?= $item['id'] ?>">
                            <div class="product__item">
                                <div class="product__img"><img src="<?= $GLOBALS["domainPage"] ?>/uploads/<?= $item['image'] ?>" alt="">
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

<script>
    // handle delete comment products
    const delete__comments = document.querySelectorAll('.delete__comment')
    const message__delete = document.querySelector('.message__delete')
    const yesBtn = document.querySelector('.yes')
    const noBtn = document.querySelector('.no')

    delete__comments.forEach(item => {
        item.onclick = () => {
            const idCmt = item.getAttribute('data-idCmt')
            const idPrd = item.getAttribute('data-idPrd')
            message__delete.classList.add('open')

            yesBtn.onclick = () => {
                window.location.href =
                    `<?= $GLOBALS["domainPage"] ?>/comment/deleteCmt?id=${idCmt}&prdId=${idPrd}`
            }

            noBtn.onclick = () => {
                message__delete.classList.remove('open')

            }
        }
    })




    // handle update comment
    const update__comments = document.querySelectorAll('.update__comment')

    const handleUpdateCmt = (item) => {
        const commentBox__text = item.parentElement.querySelector('.commentBox--text')
        const comment__ipt = item.parentElement.querySelector('.comment__ipt--update')
        const form__update_cmt = item.parentElement.querySelector('.form__update-cmt')

        commentBox__text.style.display = "none"
        form__update_cmt.classList.add('open')
        comment__ipt.focus()
    }
</script>
<?php
ipView('frontend.component.footer')
?>