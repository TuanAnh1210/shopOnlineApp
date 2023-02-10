<?php ipView('admin.component.header') ?>

<div class="dashBoard_content">
    <?php ipView('admin.component.acc') ?>

    <div class="message__delete">
        <h2>Thêm mới thành công</h2>
        <h4>Xem trang danh mục sản phẩm ngay</h4>
        <div class="btn__delete-container">
            <button class="yes">Yes</button>
        </div>
    </div>

    <form class="addNewPrd_form" action="" enctype="multipart/form-data" method="POST">
        <h2>Thêm mới sản phẩm</h2>
        <div class="form_group">
            <label for="">Tên sản phẩm</label>
            <input type="text" placeholder="Nhập tên sản phẩm" name="name" id="name">
            <p class="error"></p>
        </div>
        <div class="form_group">
            <label for="">Giá sản phẩm</label>
            <input type="text" placeholder="Nhập giá sản phẩm" name="price" id="price">
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label id="labelImage" for="image">
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                <p>Upload ảnh</p>
            </label>
            <span style="font-size: 16px;" id="previewText"></span>
            <input hidden class="prdImage" type="file" name="image" id="image">
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label for="">Khuyến mại %</label>
            <input type="text" placeholder="Nhập khuyến mại cho sản phẩm" name="discount" id="discount">
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label for="">Mô tả sản phẩm</label>
            <textarea id="description" name="description" placeholder="Nhập mô tả sản phẩm ở đây" cols="30"
                rows="10"></textarea>
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label for="">Số lượng</label>
            <input type="text" placeholder="Nhập số lượng sản phẩm" name="quantity" id="quantity">
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label for="">Danh mục sản phẩm</label>
            <select name="category_id" name="" id="category_id">
                <option value="" disabled selected hidden>Lựa chọn danh mục sản phẩm</option>
                <?php foreach ($listCate as $item) : ?>
                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>

                <?php endforeach ?>
            </select>
            <p class="error"></p>

        </div>
        <button class="btn-add-newPrd">Add New Product</button>
    </form>

</div>

<script>
const prdImage = document.querySelector('.prdImage')
prdImage.onchange = () => {
    document.getElementById('previewText').innerText = prdImage.value
}


const addNewPrd_form = document.querySelector('.addNewPrd_form')
const formField = ['name',
    'price',
    'image',
    'discount',
    'description',
    'quantity',
    'category_id'
]

const regImg = /\.(gif|jpe?g|tiff?|png|webp|bmp)$/i;

addNewPrd_form.onsubmit = (e) => {
    let isError = true
    e.preventDefault()
    formField.forEach(field => {
        const ele = document.getElementById(field)
        if (field == 'name') {
            if (ele.value.length < 5) {
                ele.nextElementSibling.innerText = 'Tên sản phẩm tối thiểu 5 kí tự'
                ele.style.border = "1px solid red"
                isError = false
            }
        }

        if (field == 'price') {
            if (Number(ele.value) < 0 || isNaN(ele.value)) {
                ele.nextElementSibling.innerText = 'giá sản phẩm phải là số dương'
                ele.style.border = "1px solid red"
                isError = false

            }
        }

        if (field == 'quantity') {
            if (Number(ele.value) < 0 || isNaN(ele.value)) {
                ele.nextElementSibling.innerText = 'Số lượng sản phẩm phải là số dương'
                ele.style.border = "1px solid red"
                isError = false

            }
        }

        if (field == 'discount') {
            if (Number(ele.value) < 0 || isNaN(ele.value)) {
                ele.nextElementSibling.innerText = 'Khuyến mại sản phẩm phải là số dương'
                ele.style.border = "1px solid red"
                isError = false

            }
        }

        if (field == "image") {
            if (regImg.test(ele.value) == false) {
                ele.nextElementSibling.innerText =
                    'Chỉ chấp nhận ảnh đuôi gif/png/jpg/jpeg/webp/svg/psd/bmp/tif'
                isError = false

            }
        }

        if (field == 'description') {
            if (ele.value.length < 8) {
                ele.nextElementSibling.innerText = 'Mô tả sản phẩm tối thiểu 16 kí tự'
                ele.style.border = "1px solid red"
                isError = false

            }
        }

        if (ele.value.trim() == '') {
            ele.nextElementSibling.innerText = 'Dữ liệu không được để trống'
            ele.style.border = "1px solid red"
            isError = false

        }

        ele.oninput = () => {
            ele.nextElementSibling.innerText = ''
            ele.style.border = ""
            isError = false

        }
    })

    if (isError) {
        document.querySelector('.message__delete').classList.add('open')
        document.querySelector('.yes').onclick = () => {
            addNewPrd_form.submit()
        }
    }
}
</script>

<?php ipView('admin.component.footer') ?>