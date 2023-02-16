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
                            <p>Tạm tính: <span class="totalCoin">0 đ</span></p>
                            <p>Số lượng: <span class="totalPrd">0 sản phẩm</span></p>
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

                        <div class="show__item-cart">
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

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
// handle get data from db and convert arr php to arr js
const data = <?= json_encode($data) ?>


data.forEach(element => {
    for (let i in element) {
        if (!isNaN(Number(i))) {
            delete element[i];
        }
    }
});

const show__item_cart = document.querySelector('.show__item-cart')

show__item_cart.innerHTML = data.map(item => `
                            <div class="box__courses--inner cart">
                                <img src="<?= $GLOBALS["domainPage"] ?>/uploads/${item.image}"
                                    alt="">
                                <div class="box__courses--info cart">
                                    <h4>${item.name}</h4>
                                    <p>Đơn giá: ${(item.price).toLocaleString() }đ</p>
                                </div>
                                <div class="detail__quantity--actions">
                                    <label style="font-size: 14px;" for="">Số lượng:</label>
                                    <input min="1" class="detail__quantity--ipt small" type="number" value="${item.totalProduct}">
                                </div>

                                <button class="cart__btn--delete button-35">Xóa</button>
                                <input data-totalProduct="${item.totalProduct}" data-price="${item.price}" class="cart__btn--check" type="checkbox">

                            </div>
`).join("")

const checkBtns = document.querySelectorAll(".cart__btn--check");

const total_payment = () => {
    let total = 0
    let totalPrdPayment = 0
    checkBtns.forEach(item => {
        if (item.checked) {
            console.log(item.getAttribute("data-price"))
            console.log(item.getAttribute("data-totalProduct"))

            const price = item.getAttribute("data-price")
            const totalProduct = item.getAttribute("data-totalProduct")

            totalPrdPayment += Number(totalProduct)
            total += price * totalProduct
        }
    })

    // inner info payment html
    document.querySelector(".totalCoin").innerHTML = total.toLocaleString() + " đ";
    document.querySelector(".totalPrd").innerHTML = totalPrdPayment.toLocaleString() + " sản phẩm"

}

checkBtns.forEach(item => {

    item.onclick = () => {
        total_payment()

    }
})

const all_cart = document.getElementById("all_cart")

all_cart.onclick = () => {
    if (all_cart.checked) {
        checkBtns.forEach(item => {
            item.checked = true
            total_payment()

        })
    } else {
        checkBtns.forEach(item => {
            item.checked = false
            total_payment()

        })
    }
}
</script>

<?php ipView('frontend.component.footer') ?>