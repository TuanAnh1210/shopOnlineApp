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

    <form class="addNewPrd_form" action="<?= $GLOBALS['domainPage'] ?>/users/handleEditUser"
        enctype="multipart/form-data" method="POST">
        <h2>Cập nhật thông tin</h2>
        <div class="form_group">
            <label for="">Họ và tên</label>
            <input type="text" placeholder="Nhập họ tên" name="fullname" id="fullname"
                value="<?= $curUser['fullname'] ?>">
            <p class="error"></p>
        </div>
        <div class="form_group">
            <label for="">Email</label>
            <input type="text" placeholder="Nhập email" name="email" id="email" value="<?= $curUser['email'] ?>">
            <p class="error"></p>

        </div>
        <div class="form_group">
            <label id="labelImage" for="avatar">
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                <p>Upload ảnh</p>
            </label>
            <span style="font-size: 16px;" id="previewText"></span>

            <input hidden class="prdImage" type="file" name="avatar" id="avatar">
            <img style="height: 200px; object-fit: contain;"
                src="<?= $GLOBALS["domainPage"] ?>/uploads/<?= $curUser['avatar'] ?>" alt="">
            <p class="error"></p>
        </div>
        <div class="form_group">
            <label for="">Địa chỉ</label>
            <input type="text" placeholder="Nhập địa chỉ" name="address" id="address"
                value="<?= $curUser['address'] ?>">
            <p class="error"></p>
        </div>
        <div class="form_group">
            <label for="">Mật khẩu</label>
            <input type="text" placeholder="Nhập password" name="password" id="password"
                value="<?= $curUser['password'] ?>">
            <p class="error"></p>
        </div>
        <div class="form_group">
            <label for="">Số điện thoại</label>
            <input type="text" placeholder="Nhập Số điện thoại" name="phone" id="phone"
                value="<?= $curUser['phone'] ?>">
            <p class="error"></p>
        </div>

        <div class="form_group">
            <label for="">Phân quyền</label>

            <select name="role" id="">
                <option value="1" <?php if ($curUser['role'] == 1) {
                                        echo "selected";
                                    } ?>>Quản trị
                </option>
                <option value="0" <?php if ($curUser['role'] == 0) {
                                        echo "selected";
                                    } ?>>Khách hàng
                </option>
            </select>

            <p class="error"></p>
        </div>
        <input hidden type="text" value="<?= $curUser['avatar'] ?>" name="oldAvatar">
        <input hidden type="text" value="<?= $id ?>" name="curIdUser">



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