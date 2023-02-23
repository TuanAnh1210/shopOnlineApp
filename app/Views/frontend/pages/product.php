<?php ipView('frontend.component.header') ?>



<div class="product__wrapper">
    <div class="container">
        <div class="product--top">
            <h2 style="font-size: 24px; font-weight: 400;">Sản phẩm</h2>

            <div class="search__wrapper">
                <input class="search__wrapper-ipt" type="text" placeholder="Tìm kiếm sản phẩm">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>

            <div class="btn__actions">

                <button class="product__sort--btn">
                    <p>Sắp xếp</p>
                    <i style="font-size: 22px;" class="fa-solid fa-arrow-up-wide-short"></i>
                    <ul class="sort__detail">
                        <li data-sort="az" class="sort__option">Thấp đến cao</li>
                        <li data-sort="za" class="sort__option">Cao đến thấp</li>
                        <li data-sort="best" class="sort__option">Bán chạy nhất</li>
                    </ul>
                </button>
            </div>
        </div>

        <div class="filter__category owl-carousel owl-theme">
            <?php foreach ($listCate as $index => $item) : ?>
                <button class="btn__filter--category"><?= $item['name'] ?></button>

            <?php endforeach ?>

        </div>

        <div class="product__list product__list-prd">
            <div class="row product__list-rd">

            </div>
        </div>

        <div class="pagination">
        </div>
    </div>


</div>


<style>
    /* .owl-nav {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
} */

    .owl-prev,
    .owl-next {
        background-color: #ccc !important;
        width: 42px !important;
        height: 26px;
        border-radius: 6px !important;
        display: flex;
        align-items: center;
    }

    .owl-next span,
    .owl-prev span {
        font-size: 24px;
        display: inline-block;
        height: 100%;
        line-height: 22px;

    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?= $GLOBALS["domainPage"] ?>/public/lib/owl/owl.carousel.min.js"></script>

<script>
    // handle get data from db and convert arr php to arr js
    const data = <?= json_encode($listProduct) ?>


    data.forEach(element => {
        for (let i in element) {
            if (!isNaN(Number(i))) {
                delete element[i];
            }
        }
    });




    // handle quantity btn pagination
    let numberData = 8

    const pagination = document.querySelector('.pagination')

    for (let i = 0; i < Math.ceil(data.length / numberData); i++) {
        pagination.innerHTML += `
        <button class="btn-page">${i + 1}</button>
    `
    }


    let temp = 0

    function render(newList, temp = 0) {
        let target = temp > 0 ? temp * numberData : numberData

        const newData = newList.slice(target - numberData, target)

        document.querySelector('.product__list-rd').innerHTML = newData.map((ele, index) => `
    <div class="col-12 col-md-4 col-lg-3">
    <a href=<?= $GLOBALS["domainPage"] ?>/product/detail?prd&id=${ele.id}>
                    <div class="product__item">
                        <div class="product__img"><img src="<?= $GLOBALS["domainPage"] ?>/uploads/${ele.image}"
                                alt="">
                        </div>
                        <h3 class="product__name">${ele.name}</h3>
                        <div style="display: flex; justify-content: space-between;">
                            <p class="product__price">${(ele.price).toLocaleString() }đ</p>
                            <p style="font-size: 12px; color: #555;">${ele.bought} đã bán</p>
                        </div>
                        <span 
                            ${ele.discount  ? '' : 'hidden'}
                             class="product__discount"> -${ele.discount}%
                        </span>
                        <span 
                            ${ele.view  ? '' : 'hidden'}
                             class="product__discount product__viewed"> ${ele.view}<i class="fa-regular fa-eye"></i>
                        </span>

                      
                    </div>
                    </a>
                </div>
    `).join('')
    }

    function renderPrd(cate, temp = 0) {

        const newList = data.filter(item => item.cate == cate.innerText)

        if (newList.length == 0) {
            document.querySelector('.product__list-rd').innerHTML = `<h2>Danh mục này tạm hết hàng</h2>`
        } else {
            render(newList, temp)
        }
    }

    document.body.onload = () => {
        listCateBtn[0].classList.add('active')
        renderPrd(listCateBtn[0])
    }

    const listCateBtn = document.querySelectorAll('.btn__filter--category')

    const btns = document.querySelectorAll('.btn-page')

    for (let i = 0; i < btns.length; i++) {
        btns[i].onclick = () => {
            renderPrd(document.querySelector('.btn__filter--category.active'), btns[i].innerText)
        }
    }

    // btn__filter--category

    listCateBtn.forEach(item => {
        item.onclick = function() {

            if (document.querySelector('.btn__filter--category.active')) {
                document.querySelector('.btn__filter--category.active').classList.remove('active')
            }

            this.classList.add('active')
            renderPrd(this)
        }
    })


    // sort__option

    function handleSort(item) {
        const cateActive = document.querySelector('.btn__filter--category.active')
        const newList = data.filter(item => item.cate == cateActive.innerText)

        let listReal = []
        if (item.getAttribute("data-sort") == 'az') {
            listReal = newList.sort((a, b) => a.price - b.price)
        } else if (item.getAttribute("data-sort") == 'za') {
            listReal = newList.sort((a, b) => b.price - a.price)
        } else if (item.getAttribute("data-sort") == 'best') {
            listReal = newList.sort((a, b) => b.bought - a.bought)

        }
        render(listReal)

    }

    const sort__options = document.querySelectorAll('.sort__option')
    sort__options.forEach(item => {
        item.onclick = () => {
            console.log(item)
            handleSort(item)
        }
    })
</script>

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