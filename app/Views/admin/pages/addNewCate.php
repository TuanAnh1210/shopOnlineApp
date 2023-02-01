<?php ipView("admin.component.header") ?>

<div class="dashBoard_content">
    <?php ipView('admin.component.acc') ?>

    <form class="addNewPrd_form" action="http://localhost/php1_ass_ph29220/admin/cateManage" method="POST">
        <h2>Thêm mới danh mục</h2>
        <div class="form_group">
            <label for="">Tên danh mục</label>
            <input type="text" placeholder="Nhập tên danh mục" name="cateName" id="cateName" required>
        </div>

        <button class="btn-add-newPrd">Add New Category</button>
    </form>

</div>
<?php ipView("admin.component.footer") ?>