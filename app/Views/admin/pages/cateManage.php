<?php ipView('admin.component.header') ?>

<div class="dashBoard_content">
    <?php ipView('admin.component.acc') ?>
    <div class="message__delete">
        <h2>Bạn chắc chắn muốn xóa !!</h2>
        <h4>Nếu xóa dữ liệu sẽ không thể khôi phục</h4>
        <div class="btn__delete-container">
            <button class="yes">Yes</button>
            <button class="no">No</button>

        </div>
    </div>

    <div class="dashBoard_banner">
        <h2>Quản lý danh mục</h2>
    </div>

    <div class="prdManage_header">
        <div class="prdManage_tit">
            <h3>Danh sách danh mục</h3>
            <div class="prdManage_form">
                <div class="prdManage_form-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search category">
                </div>
                <a href="http://localhost/php1_ass_ph29220/admin/addNewCate"><button class="btn_addPrd">Add New
                        Category</button></a>
            </div>
        </div>



        <table class="table_prd">
            <thead>
                <tr>
                    <td width="15%">STT</td>
                    <td width="35%">Category Name</td>
                    <td width="25%">Quantity product</td>
                    <td width="25%">Action</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <div class="pagination">
        </div>
    </div>



</div>



<script>
// handle get data from db and convert arr php to arr js
const data = <?= json_encode($listCate) ?>

data.forEach(element => {
    for (let i in element) {
        if (!isNaN(Number(i))) {
            delete element[i];
        }
    }
});

// handle quantity btn pagination
let numberData = 4

const pagination = document.querySelector('.pagination')

for (let i = 0; i < Math.ceil(data.length / numberData); i++) {
    pagination.innerHTML += `
        <button class="btn-page">${i + 1}</button>
    `
}

// handle pagination 

let temp = 0

function render(temp) {
    let target = temp > 0 ? temp * numberData : numberData

    const newData = data.slice(target - numberData, target)

    document.querySelector('tbody').innerHTML = newData.map((ele, index) => `
             <form action="" method="POST">
                 <tr>
                        <td>${ele.id}</td>
                        <td class="productNameItem">
                            <p class="cateNameP">${ele.categoryName}</p>
                            <input class="iptUpdateCate" type="text" value="${ele.categoryName}" />
                        </td>
                       
                        <td>${ele.quantity}</td>
                        <td style="text-align: center;">
                            <button onclick="handleUpdateCate(${ele.id}, this)" class="btn-update btn-update-cate">Update</button>
                            <button onclick="confirmDelete(${ele.id})" class="btn-delete">Delete</button>
                        </td>
                    </tr>
             </form>

    `).join('')
}




render(temp)
const btnUpdateCate = document.querySelectorAll('.btn-update')



const btns = document.querySelectorAll('.btn-page')

for (let i = 0; i < btns.length; i++) {
    btns[i].onclick = () => {

        render(btns[i].innerText)
    }
}

// handle delete
const btn_delete = document.querySelector('.btn-delete')
const message__delete = document.querySelector('.message__delete')
const yes_btn = document.querySelector('.yes')
const no = document.querySelector('.no')
const delete_links = document.querySelectorAll('.delete_links')

function confirmDelete(id) {
    message__delete.classList.add('open')
    yes_btn.onclick = () => {
        window.location = `http://localhost/php1_ass_ph29220/admin/cateManage?delete&id=${id}`
    }
}

no.onclick = () => {
    message__delete.classList.remove('open')
}


// const cateNameP = document.querySelectorAll('.cateNameP')
// const iptUpdateCate = document.querySelectorAll('.iptUpdateCate')

function handleUpdateCate(id, item) {
    const cateRow = item.parentElement.parentElement.querySelector('.productNameItem');
    cateNameP = cateRow.querySelector('.cateNameP')
    iptUpdateCate = cateRow.querySelector('.iptUpdateCate')
    if (cateNameP.classList == 'cateNameP' && iptUpdateCate.classList == 'iptUpdateCate') {
        cateNameP.classList.add('close')
        iptUpdateCate.classList.add('open')
        iptUpdateCate.focus()
    } else if (cateNameP.classList == 'cateNameP close' && iptUpdateCate.classList == 'iptUpdateCate open') {
        window.location =
            `http://localhost/php1_ass_ph29220/admin/cateManage?update&id=${id}&value=${iptUpdateCate.value}`
    }
}


// btnUpdateCate.onclick = (e) => {
//     e.preventDefault()
//     if (iptUpdateCate.style.display == 'none' && cateNameP.style.display == 'block') {
//         iptUpdateCate.style.display == 'block';
//         cateNameP.style.display == 'none';
//     }
// }
</script>


<?php ipView('admin.component.footer') ?>