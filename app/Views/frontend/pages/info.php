<?php ipView('frontend.component.header') ?>

<div class="info__wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="info__user">
                    <div class="profile__user">
                        <img src="<?= $GLOBALS["domainPage"] ?>/uploads/<?= $_SESSION['auth']['avatar'] ?>" alt="">
                        <div class="profile__user--body">
                            <h3><?= $_SESSION['auth']['fullname'] ?> <span><i style="color: orangered;" class="fa-solid fa-star"></i></span>
                            </h3>
                            <p>Thành viên của Mangostino từ 12-10-2019</p>
                        </div>
                        <button class="update__ava--btn">
                            <i class="fa-solid fa-camera"></i>
                        </button>
                    </div>
                    <div class="profile__user--detail">
                        <div class="profile__user--heading">
                            <h3>Thông tin</h3>
                            <i class="fa-solid fa-user-pen"></i>
                        </div>
                        <div class="profile__user--txt">
                            <p>Tên: &ensp; <br><strong> &ensp;<?= $_SESSION['auth']['fullname'] ?></strong> </p>
                            <p>Email: </p>
                            <strong class="fixText">
                                <?= $_SESSION['auth']['email'] ?></strong>
                            <p>Phone: &ensp;<br><strong> &ensp;<?= $_SESSION['auth']['phone'] ?></strong> </p>
                            <button class="update__profile">Chỉnh sửa</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="box__courses">
                            <div class="box__courses--title">
                                <h3><span><i class="fa-solid fa-box"></i></span> &ensp; Đơn hàng chờ xác nhận</h3>

                                <?php foreach ($data as $key => $value) : ?>
                                    <div class="box__courses--inner">
                                        <img src="<?= $GLOBALS["domainPage"] ?>/uploads/<?= $value['image'] ?>" alt="">
                                        <div class="box__courses--info">
                                            <h4><?= $value['name'] ?></h4>
                                            <p>Số lượng: <span><?= $value['quantityOrd'] ?></span></p>
                                        </div>
                                    </div>

                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="box__courses">
                            <div class="box__courses--title">
                                <h3><span><i class="fa-solid fa-boxes-packing"></i></span> &ensp; Chờ lấy hàng</h3>
                                <div class="box__courses--inner">
                                    <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp" alt="">
                                    <div class="box__courses--info">
                                        <h4>ReactJS</h4>
                                        <p>Ngày bắt đầu: <span>2022-12-10</span></p>
                                    </div>
                                </div>
                                <div class="box__courses--inner">
                                    <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp" alt="">
                                    <div class="box__courses--info">
                                        <h4>ReactJS</h4>
                                        <p>Ngày bắt đầu: <span>2022-12-10</span></p>
                                    </div>
                                </div>
                                <div class="box__courses--inner">
                                    <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp" alt="">
                                    <div class="box__courses--info">
                                        <h4>ReactJS</h4>
                                        <p>Ngày bắt đầu: <span>2022-12-10</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="box__courses mt">
                            <div class="box__courses--title">
                                <h3><span><i class="fa-solid fa-truck"></i></span> &ensp; Đang vận chuyển</h3>
                                <div class="box__courses--inner">
                                    <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp" alt="">
                                    <div class="box__courses--info">
                                        <h4>ReactJS</h4>
                                        <p>Ngày bắt đầu: <span>2022-12-10</span></p>
                                    </div>
                                </div>
                                <div class="box__courses--inner">
                                    <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp" alt="">
                                    <div class="box__courses--info">
                                        <h4>ReactJS</h4>
                                        <p>Ngày bắt đầu: <span>2022-12-10</span></p>
                                    </div>
                                </div>
                                <div class="box__courses--inner">
                                    <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp" alt="">
                                    <div class="box__courses--info">
                                        <h4>ReactJS</h4>
                                        <p>Ngày bắt đầu: <span>2022-12-10</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="box__courses mt">
                            <div class="box__courses--title">
                                <h3><span><i class="fa-solid fa-hand-holding-dollar"></i></span> &ensp; Đơn hàng đã mua
                                </h3>
                                <div class="box__courses--inner">
                                    <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp" alt="">
                                    <div class="box__courses--info">
                                        <h4>ReactJS</h4>
                                        <p>Ngày bắt đầu: <span>2022-12-10</span></p>
                                    </div>
                                </div>
                                <div class="box__courses--inner">
                                    <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp" alt="">
                                    <div class="box__courses--info">
                                        <h4>ReactJS</h4>
                                        <p>Ngày bắt đầu: <span>2022-12-10</span></p>
                                    </div>
                                </div>
                                <div class="box__courses--inner">
                                    <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp" alt="">
                                    <div class="box__courses--info">
                                        <h4>ReactJS</h4>
                                        <p>Ngày bắt đầu: <span>2022-12-10</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ipView('frontend.component.footer') ?>