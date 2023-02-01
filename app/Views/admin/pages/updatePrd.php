<?php ipView('admin.component.header')  ?>

<div class="dashBoard_content">
    <?php ipView('admin.component.acc') ?>

    <div class="message__delete">
        <h2>Sửa thành công !!</h2>
        <h4>Xem trang danh mục sản phẩm ngay</h4>
        <div class="btn__delete-container">
            <button class="yes">Yes</button>
        </div>
    </div>

    <form class="addNewPrd_form" action="" enctype="multipart/form-data" method="POST">
        <h2>Thêm mới sản phẩm</h2>
        <div class="form_group">
            <label for="">Tên sản phẩm</label>
            <input type="text" placeholder="Nhập tên sản phẩm" name="productName" id="productName"
                value="<?= $data['productName'] ?>">
            <p class="error"></p>
        </div>
        <div class="form_group">
            <label for="">Giá sản phẩm</label>
            <input type="text" placeholder="Nhập giá sản phẩm" name="productPrice" id="productPrice"
                value="<?= $data['productPrice'] ?>">
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label id="labelImage" for="productImage">
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                <p>Upload ảnh</p>
            </label>
            <span style="font-size: 16px;" id="previewText"></span>

            <input class="prdImage" type="file" name="productImage" id="productImage"
                value="<?= $data['productImage'] ?>">
            <img style="height: 200px; object-fit: contain;" src="<?= $data['productImage'] ?>" alt="">
            <p class="error"></p>
        </div>
        <div class="form_group">
            <label for="">Mô tả sản phẩm</label>
            <textarea id="productDesc" name="productDesc" placeholder="Nhập mô tả sản phẩm ở đây" name="" id=""
                cols="30" rows="10"> <?= $data['productDesc'] ?></textarea>
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label for="">Danh mục sản phẩm</label>
            <select name="categoryId" name="" id="categoryId">
                <option value="" disabled selected hidden>Lựa chọn danh mục sản phẩm</option>
                <?php foreach ($listCate as $item) : ?>
                <option <?php
                            if ($item['id'] == $data['categoryId']) {
                                echo 'selected';
                            }



                            ?> value="<?= $item['id'] ?>">

                    <?= $item['categoryName'] ?>
                </option>

                <?php endforeach ?>
            </select>
            <p class="error"></p>

        </div>
        <button class="btn-add-newPrd">Update Product</button>
    </form>

</div>

<script>
const prdImage = document.querySelector('.prdImage')
prdImage.onchange = () => {
    document.getElementById('previewText').innerText = prdImage.value
}

const addNewPrd_form = document.querySelector('.addNewPrd_form')

addNewPrd_form.onsubmit = (e) => {
    e.preventDefault()
    document.querySelector('.message__delete').classList.add('open')
    document.querySelector('.yes').onclick = () => {
        addNewPrd_form.submit()
    }
}
</script>
<?php ipView('admin.component.footer') ?>