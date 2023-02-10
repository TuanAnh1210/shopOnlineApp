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

    <form class="addNewPrd_form" action="<?= $GLOBALS['domainPage'] ?>/admin/handleEditProduct"
        enctype="multipart/form-data" method="POST">
        <h2>Cập nhật sản phẩm</h2>
        <div class="form_group">
            <label for="">Tên sản phẩm</label>
            <input type="text" placeholder="Nhập tên sản phẩm" name="name" id="name" value="<?= $data['name'] ?>">
            <p class="error"></p>
        </div>
        <div class="form_group">
            <label for="">Giá sản phẩm</label>
            <input type="text" placeholder="Nhập giá sản phẩm" name="price" id="price" value="<?= $data['price'] ?>">
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label id="labelImage" for="image">
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                <p>Upload ảnh</p>
            </label>
            <span style="font-size: 16px;" id="previewText"></span>

            <input hidden class="prdImage" type="file" name="image" id="image">
            <img style="height: 200px; object-fit: contain;"
                src="<?= $GLOBALS["domainPage"] ?>/uploads/<?= $data['image'] ?>" alt="">
            <p class="error"></p>
        </div>
        <div class="form_group">
            <label for="">Giảm giá %</label>
            <input type="text" placeholder="Nhập giá sản phẩm" name="discount" id="discount"
                value="<?= $data['discount'] ?>">
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label for="">Số lượng</label>
            <input type="text" placeholder="Nhập giá sản phẩm" name="quantity" id="quantity"
                value="<?= $data['quantity'] ?>">
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label for="">Mô tả sản phẩm</label>
            <textarea id="description" name="description" placeholder="Nhập mô tả sản phẩm ở đây" cols="30"
                rows="10"> <?= $data['description'] ?></textarea>
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label for="">Danh mục sản phẩm</label>
            <select name="category_id" id="category_id">
                <option value="" disabled selected hidden>Lựa chọn danh mục sản phẩm</option>
                <?php foreach ($listCate as $item) : ?>
                <option <?php
                            if ($item['id'] == $data['category_id']) {
                                echo 'selected';
                            }



                            ?> value="<?= $item['id'] ?>">

                    <?= $item['name'] ?>
                </option>

                <?php endforeach ?>
            </select>
            <p class="error"></p>

        </div>

        <input hidden type="text" name="oldImage" value="<?= $data['image'] ?>">
        <input hidden type="text" name="curIdProduct" value="<?= $data['id'] ?>">
        <button class="btn-add-newPrd">Cập nhật</button>
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