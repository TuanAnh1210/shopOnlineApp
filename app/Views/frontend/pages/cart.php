<?php ipView('frontend.component.header')


?>

<div class="cart__wrapper">
    <div style="margin-top: 32px;" class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="info__user">
                    <div class="profile__user">

                        <div class="profile__user--body">
                            <h3>Thành tiền: <span><i class="fa-regular fa-credit-card"></i></span>
                            </h3>
                            <p>Tạm tính: <span class="totalCoin">255.255.255đ</span></p>
                            <p>Số lượng: <span class="totalPrd">2 sản phẩm</span></p>
                            <div style="display: flex; justify-content: space-between;">
                                <button class="update__profile">Xóa sản phẩm</button>
                                <button class="update__profile">Đặt mua ngay</button>
                            </div>

                        </div>
                        <button class="update__ava--btn">
                            <i class="fa-solid fa-circle-dollar-to-slot"></i>
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-7">

                <div class="box__courses">
                    <div class="box__courses--title">
                        <div style="display: flex; justify-content: space-between;">
                            <h3><span><i class="fa-brands fa-opencart"></i></span> &ensp; GIỎ HÀNG CỦA BẠN</h3>
                            <div class="selectAll--cart">
                                <label for="all_cart">Chọn tất cả</label>
                                <input type="checkbox" id="all_cart">
                            </div>
                        </div>

                        <div class="box__courses--inner cart">
                            <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp"
                                alt="">
                            <div class="box__courses--info cart">
                                <h4>ReactJS</h4>
                                <p>Đơn giá: 1.222.222d</p>
                            </div>
                            <div class="detail__quantity--actions">
                                <label style="font-size: 14px;" for="">Số lượng:</label>
                                <input class="detail__quantity--ipt small" type="number" value="1">
                            </div>

                            <button class="cart__btn--delete button-35">Xóa</button>
                            <input class="cart__btn--check" type="checkbox">

                        </div>
                        <div class="box__courses--inner">
                            <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp"
                                alt="">
                            <div class="box__courses--info">
                                <h4>ReactJS</h4>
                                <p>Ngày bắt đầu: <span>2022-12-10</span></p>
                            </div>
                        </div>
                        <div class="box__courses--inner">
                            <img src="https://aristino.com/Data/ResizeImage/images/product/so-mi-ngan-tay/1ss101s2/ao-so-mi-ngan-tay-nam-aristino-1SS101S2-03x900x900x4.webp"
                                alt="">
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





<?php ipView('frontend.component.footer') ?>